<?php

if (!class_exists('eti_divi_siteimporter')) {
    class eti_divi_siteimporter {
        public $eti;

        function __construct() {
            global $eti;
            $this->eti = $eti;

            add_filter('eti_settings_toggles', array($this, 'settings_toggles'));
            add_filter('eti_settings_js', array($this, 'settings_js'));
            add_filter('eti_known_endpoints', array($this, 'ajax_endpoints'), 10, 2);
            add_filter('eti_api_actions', array($this, 'ajax_actions'), 10, 2);
            add_filter('eti_file_summary', array($this, 'file_summary'));

            add_filter('eti_divi_update_meta', array($this, 'update_meta'), 10, 4);
            add_filter('eti_import_complete_mop_up', array($this, 'import_complete_mop_up'));
        }

        function file_summary($return) {
            if ($this->eti->import_file_exists('divi_library.json')) {
                $return['divi_library'] = $this->file_summary_library();
            }
            if ($this->eti->import_file_exists('divi_theme_builder.json')) {
                $return['divi_theme_builder'] = $this->file_summary_theme_builder();
            }
            if ($this->eti->import_file_exists('divi_settings.json')) {
                $return['divi_settings'] = $this->file_summary_settings();
            }

            return $return;
        }

        function ajax_endpoints($endpoints) {

            if (!is_array($endpoints)) {
                $endpoints = array();
            }

            $endpoints[] = 'import-divi_library';
            $endpoints[] = 'import-divi_theme_builder';
            $endpoints[] = 'import-divi_settings';

            return $endpoints;
        }

        function ajax_actions($return, $action) {

            if ($action = sanitize_title($action)) {
                if ($action == 'import-divi_library') {
                    $return = $this->handle_import_library();
                } else if ($action == 'import-divi_theme_builder') {
                    $return = $this->handle_import_theme_builder();
                } else if ($action == 'import-divi_settings') {
                    $return = $this->handle_import_settings();
                }
            }

            return $return;
        }

        function import_complete_mop_up($unused) {
            global $eti_imported_ids;

            if ($importer_config = $this->eti->file_summary_config()) {

                foreach ($eti_imported_ids as $old_post_id => $post_id) {
                    if ($item = get_post($post_id)) {
                        $new_content = $this->post_content($item->post_content, $item->ID, true);

                        if ($new_content != $item->post_content) {
                            $updated_post = array(
                                'ID'           => $item->ID,
                                'post_content' => $new_content
                            );
                            wp_update_post($updated_post);
                        }
                    }
                }
            }

            return $unused;
        }

        function process_dynamic_content($value) {
            if ($arr = explode('@', $value)) {
                if ($arr[1] == 'ET-DC') {
                    if ($dc = base64_decode($arr[2])) { // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                        $dc = json_decode($dc, true);

                        if (is_array($dc) && isset($dc['settings']) && is_array($dc['settings'])) {
                            if (isset($dc['settings']['post_id']) && is_numeric($dc['settings']['post_id'])) {
                                if ($new_post_id = $this->eti->get_mapped_id($dc['settings']['post_id'])) {
                                    //$dc['settings']['post_id'] = (string)$new_post_id; //might need to be a string
                                    $dc['settings']['post_id'] = (string)$new_post_id;

                                    $arr[2] = base64_encode(wp_json_encode($dc)); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                    $value = implode('@', $arr);
                                }
                            }
                        }
                    }
                }
            }

            return $value;
        }

        function post_content($post_content, $post_id, $mop_up = false) {

            if ($mop_up) {
                if (!$remapped = get_post_meta($post_id, 'eti_remapped', true)) {
                    $remapped = array();
                }

                $shortcode_atts = array('global_module', 'loop_layout', 'gallery_ids', 'button_url'); //extend to include more

                foreach ($shortcode_atts as $shortcode_att) {
                    if (!in_array($shortcode_att, $remapped)) {
                        preg_match_all('/' . $shortcode_att . '="([^"]*)"/', $post_content, $matches);

                        if (isset($matches[1]) && count($matches[1]) > 0) {
                            foreach ($matches[1] as $layout_ids) {

                                if (stripos($layout_ids, 'ET-DC') !== false) {
                                    if ($new_layout_ids = $this->process_dynamic_content($layout_ids)) {
                                        if ($new_layout_ids != $layout_ids) {
                                            $post_content = str_replace($layout_ids, $new_layout_ids, $post_content);
                                        }
                                    }
                                } else {
                                    if ($layout_ids_arr = explode(',', $layout_ids)) {
                                        $layout_ids_new = array();
                                        foreach ($layout_ids_arr as $layout_id) {
                                            if ($layout_id) {
                                                if ($new_layout_id = $this->eti->get_mapped_id($layout_id)) {
                                                    $layout_id = $new_layout_id;
                                                }

                                                $layout_ids_new[] = $layout_id;
                                            }
                                        }

                                        if ($layout_ids_new = implode(',', $layout_ids_new)) {
                                            if ($layout_ids_new != $layout_ids) {
                                                $tot_layout_ids = $shortcode_att . '="' . $layout_ids . '"';
                                                $tot_layout_ids_new = $shortcode_att . '="' . $layout_ids_new . '"';
                                                $post_content = str_replace($tot_layout_ids, $tot_layout_ids_new, $post_content);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $term_shortcode_atts = array(
                    'include_categories',
                    'menu_id'
                ); //extend to include more taxonomy based shortcode atts

                foreach ($term_shortcode_atts as $shortcode_att) {
                    if (!in_array($shortcode_att, $remapped)) {
                        preg_match_all('/' . $shortcode_att . '="([^"]*)"/', $post_content, $matches);

                        if (isset($matches[1]) && count($matches[1]) > 0) {
                            foreach ($matches[1] as $term_ids) {

                                if ($term_ids_arr = explode(',', $term_ids)) {
                                    $term_ids_new = array();
                                    foreach ($term_ids_arr as $term_id) {
                                        if ($term_id) {
                                            if ($new_term_id = $this->eti->get_mapped_term_id($term_id)) {
                                                $term_id = $new_term_id;
                                            }

                                            $term_ids_new[] = $term_id;
                                        }
                                    }

                                    if ($term_ids_new = implode(',', $term_ids_new)) {
                                        if ($term_ids_new != $term_ids) {
                                            $tot_layout_ids = $shortcode_att . '="' . $term_ids . '"';
                                            $tot_layout_ids_new = $shortcode_att . '="' . $term_ids_new . '"';
                                            $post_content = str_replace($tot_layout_ids, $tot_layout_ids_new, $post_content);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                update_post_meta($post_id, 'eti_remapped', $remapped);
            }

            //also cover taxonomy ids here. filters for project and blog modules
            //extend for woocommerce modules also

            return $post_content;
        }

        function settings_js($functions_merged) {
            if ($this->eti->import_file_exists('divi_settings.json') && $this->eti->post('eti_divi_inc_settings')) {
                $functions_merged = array_merge($functions_merged, $this->js_import_settings());
            }
            if ($this->eti->import_file_exists('divi_theme_builder.json') && $this->eti->post('eti_divi_inc_theme_builder')) {
                $functions_merged = array_merge($functions_merged, $this->js_import_theme_builder());
            }
            if ($this->eti->import_file_exists('divi_library.json') && $this->eti->post('eti_divi_inc_library')) {
                $functions_merged = array_merge($functions_merged, $this->js_import_library());
            }

            return $functions_merged;
        }

        function js_import_library() {
            $js = array();

            if ($content = $this->eti->get_file_content('divi_library.json')) {
                $js[] = array('import-divi_library', '', 'divi_library', esc_html__('Divi Library', 'sitepresser'));
            }

            return $js;
        }

        function js_import_theme_builder() {
            $js = array();

            if ($content = $this->eti->get_file_content('divi_theme_builder.json')) {
                $js[] = array(
                    'import-divi_theme_builder',
                    '',
                    'divi_theme_builder',
                    esc_html__('Divi Theme Builder', 'sitepresser')
                );
            }

            return $js;
        }

        function js_import_settings() {
            $js = array();

            if ($content = $this->eti->get_file_content('divi_settings.json')) {
                $js[] = array(
                    'import-divi_settings',
                    '',
                    'divi_settings',
                    esc_html__('Divi Settings / Theme Options', 'sitepresser')
                );
            }

            return $js;
        }

        function update_meta($value, $name) {

            if ($name == 'et_divi') {
                $content_orig = $this->eti->get_file_content('divi_settings.json', true); //not associative so $content_orig->options->et_divi would be used
                $et_divi_original_format = $content_orig->options->et_divi;

                $value['divi_logo'] = $this->eti->replace_urls_in_string($value['divi_logo']);

                $value['builder_custom_defaults'] = $et_divi_original_format->builder_custom_defaults; //maybe?
                $value['builder_global_presets'] = $et_divi_original_format->builder_global_presets;
                $value['builder_global_presets_history'] = $et_divi_original_format->builder_global_presets_history;
            }

            return $value;
        }

        function handle_import_settings() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            $excludes = array();

            if ($content = $this->eti->get_file_content('divi_settings.json')) {
                if (!empty($content['options'])) {
                    if ($options = $content['options']) {
                        foreach ($options as $option_name => $option_value) {
                            if (!in_array($option_name, $excludes)) {
                                $option_value = wp_unslash($option_value);

                                if (is_serialized($option_value)) {
                                    $option_value = unserialize($option_value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                }

                                $option_value = apply_filters('eti_divi_update_meta', $option_value, $option_name);

                                $this->eti->update_option($option_name, $option_value);

                                $option_name_pretty = $this->eti->prettify_log_output($option_name);
                                $msg = sprintf(__('Setting %s Updated', 'sitepresser'), $option_name_pretty);
                                $msgs[] = array('msg' => $msg, 'severity' => 'low');
                            }
                        }
                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function file_summary_settings() {
            $return = array();

            if ($file_data = $this->eti->get_file_content('divi_settings.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_library() {
            $return = array();

            if ($file_data = $this->eti->get_file_content('divi_library.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_theme_builder() {
            $return = array();

            if ($file_data = $this->eti->get_file_content('divi_theme_builder.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function handle_import_library() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->eti->get_file_content('divi_library.json')) {
                $post_type = 'et_pb_layout';
                $posts_imported = array();

                if (isset($content[$post_type])) {
                    if ($posts = $content[$post_type]) {
                        foreach ($posts as $old_post_id => $post) {
                            $post_import = $this->eti->handle_import_pt_object($post, $old_post_id);
                            $posts_imported[$post_import['post_id']] = $post_import['post_id'];
                            $msgs[] = $post_import;
                        }
                    }
                }

                foreach ($posts_imported as $post_imported_id) {
                    $this->remap_post_meta($post_imported_id);
                }

            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function handle_import_theme_builder() {
            $msgs = array();
            $posts_imported = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->eti->get_file_content('divi_theme_builder.json')) {
                //delete existing theme builder config

                $post_types = array(
                    'et_theme_builder',
                    'et_template',
                    'et_body_layout',
                    'et_header_layout',
                    'et_footer_layout'
                );

                if ($old_posts = get_posts(array('post_type' => $post_types, 'posts_per_page' => -1))) {
                    foreach ($old_posts as $old_post) {
                        wp_delete_post($old_post->ID, true);
                    }
                }

                //import theme builder
                foreach ($post_types as $post_type) {
                    if (isset($content[$post_type])) {
                        if ($posts = $content[$post_type]) {
                            foreach ($posts as $old_post_id => $post) {
                                $post_import = $this->eti->handle_import_pt_object($post, $old_post_id);

                                if (is_numeric($post_import['post_id'])) {
                                    $posts_imported[$post_import['post_id']] = $post_import['post_id'];
                                }

                                $msgs[] = $post_import;
                            }
                        }
                    }
                }

                foreach ($posts_imported as $post_imported_id) {
                    $this->remap_post_meta($post_imported_id);
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function remap_post_meta($post_id) {
            $possible_meta_keys = array(
                '_et_footer_layout_id',
                '_et_body_layout_id',
                '_et_header_layout_id',
                '_et_template'
            );

            //a filter for more plugins to hook in. note only applies to divi library and divi theme builder for now
            $possible_meta_keys = apply_filters('eti_divi_possible_meta', $possible_meta_keys, $post_id);

            foreach ($possible_meta_keys as $possible_meta_key) {
                if ($layout_ids = get_post_meta($post_id, $possible_meta_key)) {
                    foreach ($layout_ids as $layout_id) {
                        if ($new_layout_id = $this->eti->get_mapped_id($layout_id)) {
                            update_post_meta($post_id, $possible_meta_key, $new_layout_id, $layout_id);
                        }
                    }
                }
            }

            if ($used_on = get_post_meta($post_id, '_et_use_on')) { //not single!
                //process_used_on archive:post_type:post singular:taxonomy:category:term:id:27 singular:post_type:post:id:87
                foreach ($used_on as $old_used) {
                    if ($used = explode(':', $old_used)) {
                        $type = $used[1];

                        switch ($type) {
                            case 'post_type':
                                if (isset($used[3]) && $used[3] == 'id') {
                                    if (isset($used[4]) && $used[4]) {
                                        if ($new_id = $this->eti->get_mapped_id($used[4])) {
                                            $used[4] = $new_id;
                                        }
                                    }
                                }
                                break;
                            case 'taxonomy':
                                if (isset($used[3]) && $used[3] == 'term') {
                                    if (isset($used[4]) && $used[4] == 'id') {
                                        if (isset($used[5]) && $used[5]) {
                                            if ($new_term_id = $this->eti->get_mapped_term_id($used[5])) {
                                                $used[5] = $new_term_id;
                                            }
                                        }
                                    }
                                }
                                break;
                        }

                        $new_used = implode(':', $used);

                        if ($new_used != $old_used) {
                            delete_post_meta($post_id, '_et_use_on', $old_used);
                            add_post_meta($post_id, '_et_use_on', $new_used);
                        }
                    }
                }
            }

            if ($split_track = get_post_meta($post_id, '_et_pb_ab_current_shortcode', true)) {
                //process_split_testing 	[et_pb_split_track id="2497" /]
                preg_match_all('/id="([^"]*)"/', $split_track, $matches);

                if (isset($matches[1]) && count($matches[1]) > 0) {
                    foreach ($matches[1] as $layout_id) {
                        if ($new_layout_id = $this->eti->get_mapped_id($layout_id)) {
                            $split_track = str_replace($layout_id, $new_layout_id, $split_track);
                        }
                    }

                    update_post_meta($post_id, '_et_pb_ab_current_shortcode', $split_track);
                }
            }
        }

        function settings_toggles($html) {
            $html .= $this->eti->box_start(esc_html__('Include Divi / Extra', 'sitepresser'));

            if ($this->eti->import_file_exists('divi_library.json')) {
                $desc = esc_html__('Layouts from the Divi Library', 'sitepresser');
                $html .= $this->eti->render_toggle('eti_divi_inc_library', esc_html__('Divi Library Templates', 'sitepresser'), 1, $desc);
            }

            if ($this->eti->import_file_exists('divi_theme_builder.json')) {
                $desc = esc_html__('Layouts and configuration of the Divi Theme Builder', 'sitepresser');
                $html .= $this->eti->render_toggle('eti_divi_inc_theme_builder', esc_html__('Divi Theme Builder', 'sitepresser'), 1, $desc);
            }

            if ($this->eti->import_file_exists('divi_settings.json')) {
                $desc = esc_html__('All settings from Divi Theme Options / Divi Customizer (not license/API keys)', 'sitepresser');
                $html .= $this->eti->render_toggle('eti_divi_inc_settings', esc_html__('Divi Settings', 'sitepresser'), 1, $desc);
            }

            $html .= $this->eti->box_end();

            return $html;
        }

    }
}

$eti_divi = new eti_divi_siteimporter();
