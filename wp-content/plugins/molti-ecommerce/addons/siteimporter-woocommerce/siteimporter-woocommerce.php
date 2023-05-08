<?php

if (!class_exists('eti_woo_siteimporter')) {
    class eti_woo_siteimporter {
        public $eti;

        function __construct() {
            global $eti;
            $this->eti = $eti;

            add_filter('eti_settings_toggles', array($this, 'settings_toggles'));
            add_filter('eti_settings_js', array($this, 'settings_js'));
            add_filter('eti_known_endpoints', array($this, 'ajax_endpoints'), 10, 2);
            add_filter('eti_api_actions', array($this, 'ajax_actions'), 10, 2);
            add_filter('eti_file_summary', array($this, 'file_summary'));

            add_action('eti_import_complete_mop_up', array($this, 'import_complete_mop_up'));
            add_action('eti_pre_import_taxonomies', array($this, 'handle_import_woo_taxonomy_data'));

        }

        function file_summary($return) {

            if ($this->eti->import_file_exists('woo_settings.json')) {
                $return['settings'] = $this->file_summary_settings();
            }

            return $return;
        }

        function ajax_endpoints($endpoints) {

            if (!is_array($endpoints)) {
                $endpoints = array();
            }

            $endpoints[] = 'import-woo_settings';

            return $endpoints;
        }

        function ajax_actions($return, $action) {

            if ($action == 'import-woo_settings') {
                $return = $this->handle_import_settings();
            }

            return $return;
        }

        function settings_js($functions_merged) {

            if ($this->eti->import_file_exists('woo_settings.json') && $this->eti->post('eti_woo_inc_settings')) {
                $functions_merged = array_merge($functions_merged, $this->js_import_settings());
            }

            return $functions_merged;
        }

        function js_import_settings() {
            $js = array();

            if ($content = $this->file_summary_settings()) {
                $js[] = array('import-woo_settings', '', 'woo_settings', __('WooCommerce Settings', 'sitepresser'));
            }

            return $js;
        }

        function handle_import_settings() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->file_summary_settings()) {
                if (!empty($content['options'])) {
                    if ($options = $content['options']) {
                        foreach ($options as $option_name => $option_value) {
                            $option_value = wp_unslash($option_value);

                            if (is_serialized($option_value)) {
                                $option_value = unserialize($option_value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                            }

                            $this->eti->update_option($option_name, $option_value);

                            $option_name_pretty = $this->eti->prettify_log_output($option_name);
                            $msg = sprintf(__('Setting %s Updated', 'sitepresser'), $option_name_pretty);
                            $msgs[] = array('msg' => $msg, 'severity' => 'low');
                        }
                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function file_summary_settings() {
            $return = array();

            if ($file_data = $this->eti->get_file_content('woo_settings.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function handle_import_woo_taxonomy_data() {
            global $wpdb;

            //get settings taxonomy content and insert/update DB table
            if ($content = $this->file_summary_settings()) {
                if (!empty($content['woo_taxonomies'])) {
                    foreach ($content['woo_taxonomies'] as $taxonomy) {
                        //attribute_id, attribute_name, attribute_label, attribute_type, attribute_orderby, attribute_public

                        $sql_pattern = 'SELECT attribute_id 
                                        FROM ' . $wpdb->prefix . 'woocommerce_attribute_taxonomies
                                        WHERE attribute_name = %s';
                        $prepped_sql = $wpdb->prepare($sql_pattern, $taxonomy['attribute_name']); // phpcs:ignore WordPress.DB

                        if (!$wpdb->get_var($prepped_sql)) { // phpcs:ignore WordPress.DB
                            $insert_format = array('%s', '%s', '%s', '%s', '%d');
                            $insert_data = array(
                                'attribute_label'   => $taxonomy['attribute_label'],
                                'attribute_name'    => $taxonomy['attribute_name'],
                                'attribute_type'    => $taxonomy['attribute_type'],
                                'attribute_orderby' => $taxonomy['attribute_orderby'],
                                'attribute_public'  => $taxonomy['attribute_public']
                            );

                            $wpdb->insert($wpdb->prefix . 'woocommerce_attribute_taxonomies', $insert_data, $insert_format);
                        }
                    }
                }
            }
        }

        function pt_import_meta($value, $key, $post_id, $old_post_id) {
            //$post_id = (int)$post_id;
            //$old_post_id = (int)$old_post_id;

            //product ids is woocommerce memberships
            //children is for grouped products
            if (in_array($key, ['_product_ids', '_children', '_upsell_ids', '_crosssell_ids'])) {
                $value = unserialize($value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                if (is_array($value)) { //should be an array of ids: a:1:{i:0;i:153;}
                    foreach ($value as &$val) {
                        if ($new_post_id = $this->eti->get_mapped_id($val)) {
                            $val = $new_post_id;
                        }
                    }
                }
            } else if (in_array($key, ['_product_image_gallery'])) { //woo gallery images
                //should be a csv of ids: 180,179,167
                if ($value_arr = explode(',', $value)) {
                    foreach ($value_arr as &$val) {
                        if ($new_post_id = $this->eti->get_mapped_id($val)) {
                            $val = $new_post_id;
                        }
                    }

                    $value = implode(',', $value_arr); //reform the csv
                }
            }

            return $value;
        }

        function import_complete_mop_up() {
            global $eti_imported_ids;

            foreach ($eti_imported_ids as $old_post_id => $post_id) {
                if ($all_meta = get_post_meta($post_id)) {
                    foreach ($all_meta as $meta_key => $meta_vals) {
                        if ($meta_val = $meta_vals[0]) {
                            if ($new_value = $this->pt_import_meta($meta_val, $meta_key, $post_id, $old_post_id)) {
                                if ($new_value != $meta_val) {
                                    update_post_meta($post_id, $meta_key, $new_value);
                                }
                            }
                        }
                    }
                }
            }

            //for options that map to ids. this list will expand over time
            $options = [
                'wc_memberships_redirect_page_id',
                'woocommerce_terms_page_id',
                'woocommerce_myaccount_page_id',
                'woocommerce_checkout_page_id',
                'woocommerce_cart_page_id',
                'woocommerce_shop_page_id',
                'woocommerce_placeholder_image',
                'wc_memberships_redirect_page_id',
            ];                                            //ids only

            foreach ($options as $option) {
                if ($option_id = get_option($option)) {
                    if ($option_id) {
                        if ($new_option_id = $this->eti->get_mapped_id($option_id)) {
                            if ($option_id != $new_option_id) {
                                $this->eti->update_option($option, $new_option_id);
                            }
                        }
                    }
                }
            }

            //for options that map to urls. this list will expand over time
            $options = array('wc_subscriptions_siteurl'); //strings only

            foreach ($options as $option) {
                if ($option_value = get_option($option)) {
                    if ($option_value) {
                        if ($new_option_value = $this->eti->replace_urls_in_string($option_value)) {
                            if ($option_value != $new_option_value) {
                                $this->eti->update_option($option, $new_option_value);
                            }
                        }
                    }
                }
            }

            //it is likely we have changed info that will have been cached. clear the caches/transients here

            wp_schedule_single_event(time(), 'woocommerce_flush_rewrite_rules'); //for CPT/taxonomies
            delete_transient('wc_attribute_taxonomies');                         //clear temporary cache for attributes

            if (method_exists('WC_Cache_Helper', 'invalidate_cache_group')) {
                WC_Cache_Helper::invalidate_cache_group('woocommerce-attributes'); //WC cache for attributes
            }
        }

        function settings_toggles($html) {
            $html .= $this->eti->box_start(esc_html__('Include WooCommerce Settings/Config', 'sitepresser'));

            if ($this->eti->import_file_exists('woo_settings.json')) {
                $desc = esc_html__('All settings from WooCommerce (not license/API keys)', 'sitepresser');
                $html .= $this->eti->render_toggle('eti_woo_inc_settings', __('WooCommerce Settings', 'sitepresser'), 1, $desc);
            }

            $html .= $this->eti->box_end();

            return $html;
        }

    }
}

$eti_woo = new eti_woo_siteimporter();
