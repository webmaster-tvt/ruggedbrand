<?php

/*
		 * Plugin Name: Molti Ecommerce
		 * Plugin URI:  https://samarj.com
		 * Description: Demo Content Importer for &quot;Molti Ecommerce&quot; by SamarJ. A Multipurpose Business/Ecommerce Child Theme for Divi.
		 * Author:      SamarJ
		 * Version:     1.0.6
		 * Author URI:  https://samarj.com
		 * Text Domain: sitepresser
		 * Domain Path: /languages
		 * SitePresser Version: 1.8
		 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$eti_import_map = array(); //this will be checked for interference with each use of it's contents
$eti_image_lookup = false; //this is an array of image information populated for the import only and will be sanitized during use

if (!class_exists('eti_siteimporter')) {
    class eti_siteimporter {
        public $plugin_root = '';
        public $plugin_name = '';
        public $plugin_data_dir = '';
        public $plugin_files_dir = '';
        public $plugin_addons_dir = '';

        public $plugin_url = '';
        public $plugin_assets_url = '';
        public $plugin_files_url = '';

        function __construct($file, $plugin_name) {
            $this->plugin_name = $plugin_name;

            add_action('init', array($this, 'init'));

            //constants instead of global scope variables to avoid interception and editing
            $this->plugin_root = trailingslashit(dirname($file));
            $this->plugin_data_dir = $this->plugin_root . 'data/';
            $this->plugin_files_dir = $this->plugin_root . 'files/';
            $this->plugin_addons_dir = $this->plugin_root . 'addons/';

            $this->plugin_url = trailingslashit(plugin_dir_url($file));
            $this->plugin_assets_url = $this->plugin_url . 'assets/';
            $this->plugin_files_url = $this->plugin_url . 'files/';

            //set up language files here
            //text domain is 'sitepresser'
            // __( '', 'sitepresser' );

            //no nonce check needed as we are simply checking for the existence of a QS variable so we can send the headers to prevent a redirect
            if (!empty($_GET['eti_ajax_action'])) { // phpcs:ignore WordPress.Security.NonceVerification
                echo 'NO-REDIRECT-THANKS';
            }

        }

        function init() {
            add_action('wp_loaded', array($this, 'loaded'));
            add_action('activated_plugin', array($this, 'activation_redirect'));

            if ($importer_config = $this->file_summary_config()) {
                if ($importer_config['addons']) {
                    foreach ($importer_config['addons'] as $addon_path => $addon_data) {
                        if ($file_path = $this->addon_file_exists($addon_path . '/' . $addon_path . '.php')) {
                            require_once($file_path);
                        }
                    }
                }
            }
        }

        function activation_redirect($plugin) {
            if ($plugin == plugin_basename(__FILE__)) {
                wp_safe_redirect(admin_url('admin.php?page=eti'));
                exit;
            }
        }

        function loaded() {

            //This plugin is designed for admin use. For security, do not include any items unless the user is an admin
            if (!current_user_can('manage_options')) {
                return; //admin only
            }

            add_action('admin_menu', array($this, 'submenu'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_enqueue_scripts', array($this, 'stop_heartbeat'), 1);
            add_action('admin_print_footer_scripts-toplevel_page_eti', array($this, 'render_import_js'));

            add_filter('eti_post_content', array($this, 'post_content'), 10, 4);

            $this->api();
        }

        function post($name, $type = 'text', $default = false) {
            return $this->get_global('post', $name, $type, $default);
        }

        function get($name, $type = 'text', $default = false) {
            return $this->get_global('get', $name, $type, $default);
        }

        function get_global($global_name, $name, $type = 'text', $default = false) {
            $return = $default;

            if (in_array($global_name, array('post', 'get'))) {
                // The following two sections are ignored from nonce and sanitize check because below the input is sanitized by type
                // and nonces are checked on the admin pages before this is ever used

                if ($global_name == 'get') {
                    if (isset($_GET[$name])) {              // phpcs:ignore WordPress.Security.NonceVerification
                        $return = wp_unslash($_GET[$name]); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.EscapeOutput, WordPress.Security.NonceVerification
                    }
                } else if ($global_name == 'post') {
                    if (isset($_POST[$name])) {              // phpcs:ignore WordPress.Security.NonceVerification
                        $return = wp_unslash($_POST[$name]); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.EscapeOutput, WordPress.Security.NonceVerification
                    }
                }

                if ($return) {
                    if ($type == 'array') {
                        if (is_array($return)) {
                            $return = array_map('sanitize_text_field', $return);
                        } else {
                            $return = sanitize_text_field($return);
                        }
                    } else if ($type == 'text') {
                        $return = sanitize_text_field($return);
                    } else if ($type == 'textarea') {
                        $return = sanitize_textarea_field($return);
                    } else if ($type == 'url') {
                        $return = esc_url_raw($return);
                    } else if ($type == 'int') {
                        $return = sanitize_text_field($return); //strips out any rubbish
                        $return = (int)$return;                 //force to int. improve later as whilst this isn't hackable it might cause odd results
                    } else {
                        $return = sanitize_text_field($return);
                    }
                }
            }

            return $return;
        }

        function enqueue($suffix) {
            if ($suffix == 'toplevel_page_eti') {
                wp_enqueue_style('eti_admin_css', $this->plugin_assets_url . 'admin.css');

                if (!current_user_can('manage_options')) {
                    return; //admin only
                }

                //quick sanity check before output. check the nonce to make sure we want to export this
                if (isset($_POST['eti_import_submit'], $_POST['eti_nonce']) && wp_verify_nonce(sanitize_key($_POST['eti_nonce']), 'eti_handle_import')) {
                    wp_register_script('eti_admin_js', $this->plugin_assets_url . 'admin.min.js', array('jquery'), false, true);

                    $loc_array = array(
                        'api_url'         => trailingslashit(admin_url()) . '?eti_nonce=' . wp_create_nonce('eti_api'),
                        'ajax_loader_url' => $this->plugin_assets_url . 'ajax-loader.gif'
                    );
                    wp_localize_script('eti_admin_js', 'sitepresser_obj', $loc_array);

                    wp_enqueue_script('eti_admin_js');
                }

            }
        }

        function stop_heartbeat($suffix) {
            if ($suffix == 'toplevel_page_eti') {
                wp_deregister_script('heartbeat');
            }
        }

        function handle_import() {
            $html = '';

            $html .= $this->box_start(esc_attr__('Importing your site/settings', 'sitepresser'), 'eti_feature_box eti_import_summary');
            $html .= '<div class="eti_import_complete"></div>';
            $html .= $this->box_end();

            $html .= $this->box_start('Import Progress Log');

            $html .= '<div class="eti_import_progress">
                        <div class="eti_current_progress"><span>&nbsp;</span></div>
                    </div>';

            $html .= '<div class="eti_import_feedback"></div>';
            $html .= $this->box_end();

            return $html;
        }

        function render_import_js() {

            if (isset($_POST['eti_import_submit'], $_POST['eti_nonce']) && wp_verify_nonce(sanitize_key($_POST['eti_nonce']), 'eti_handle_import')) {

                $functions_merged = array();
                $functions_merged = array_merge($functions_merged, $this->js_prerequisite_check());

                if ($this->import_file_exists('plugins.json') && !empty($_POST['eti_inc_plugins'])) { //just a check. sanitized in the import plugins functions
                    $functions_merged = array_merge($functions_merged, $this->js_import_plugins());
                }
                if ($this->import_file_exists('themes.json') && $this->post('eti_inc_themes')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_themes());
                }
                if ($this->import_file_exists('content.json') && $this->post('eti_inc_content')) {
                    //$functions_merged = array_merge($functions_merged, $this->js_import_media());
                    $functions_merged = array_merge($functions_merged, $this->js_import_media_bulk());
                    $functions_merged = array_merge($functions_merged, $this->js_import_content());
                }
                if ($this->import_file_exists('customizer.json') && $this->post('eti_inc_customizer')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_customizer());
                }
                if ($this->import_file_exists('homepage.json') && $this->post('eti_inc_homepage')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_homepage());
                }

                $functions_merged = apply_filters('eti_settings_js', $functions_merged);

                if ($this->import_file_exists('menus.json') && $this->post('eti_inc_menus')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_menus());
                }
                if ($this->import_file_exists('widgets.json') && $this->post('eti_inc_widgets')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_widgets());
                }
                if ($this->import_file_exists('custom_css.json') && $this->post('eti_inc_custom_css')) {
                    $functions_merged = array_merge($functions_merged, $this->js_import_custom_css());
                }

                $i = 0;
                $js_funcs = array();

                if (count($functions_merged) > 0) {
                    foreach ($functions_merged as $function_call) {
                        $i++;
                        $next = ($i <= count($functions_merged) ? ', ' . $i : '');
                        $js_funcs[] = 'function () { eti_send_action_request("' . $function_call[0] . '", "' . $function_call[1] . '", "' . $function_call[2] . '", "' . $function_call[3] . '"' . $next . '); }' . "\n";
                    }

                    $addon_js = apply_filters('eti_api_js', ''); //This is used by addons to hook in and add their js. Elementor uses this to clear their CSS cache for instance

                    $js = '<script>
				var eti_ajax_queue = [' . implode(', ', $js_funcs) . '];

				jQuery(document).ready(function() {
				    if (eti_ajax_queue.length) {
				    	eti_ajax_queue[0](); // kick off the queue
				    } else {
				        eti_ajax_complete("complete");
				    }
				});
				
				' . $addon_js . '
			</script>';

                    echo wp_kses($js, array('script' => [])); //script only, nothing else. Even if it outputs html this will be cleared
                }
            }
        }

        function api_known_endpoints() {
            $default_endpoints = array(
                'install-parent-theme',
                'import-media-item',
                'import-media-items',
                'prereq-check',
                'import-content',
                'import-homepage',
                'import-customizer',
                'import-widgets',
                'import-custom_css',
                'import-menu',
                'install-theme',
                'install-repo-plugin',
                'install-non-repo-plugin',
                'import-start',
                'import-complete',
                'import-failed',
            );

            if ($extra_endpoints = apply_filters('eti_known_endpoints', array())) {
                if (is_array($extra_endpoints)) {
                    $extra_endpoints = array_map('sanitize_text_field', $extra_endpoints); //make sure the array is clean
                    $default_endpoints = array_merge($default_endpoints, $extra_endpoints);
                }
            }

            return $default_endpoints;
        }

        function api() {
            global $eti_imported_ids, $eti_import_map;

            if (!current_user_can('manage_options')) {
                return; //admin only
            }

            if (!isset($_GET['eti_nonce']) || !wp_verify_nonce(sanitize_key($_GET['eti_nonce']), 'eti_api')) {
                return; //nonce failure
            }

            if ($ajax_action = $this->get('eti_ajax_action')) {
                if ($known_endpoints = $this->api_known_endpoints()) {
                    if (!in_array($ajax_action, $known_endpoints)) {
                        $return = array(
                            'success' => false,
                            'log'     => array(
                                array(
                                    'msg'      => __('Failure. Unknown endpoint', 'sitepresser') . ': ' . $ajax_action,
                                    'severity' => 'low'
                                )
                            )
                        ); //not known so bail out here.

                    } else {

                        $this->init_filesystem();

                        $return = false;
                        $found_endpoint = true;
                        $eti_imported_ids = get_option('eti_imported_ids', array()); //get import ids for use as a cache to be deleted after import is complete
                        $eti_import_map = get_option('eti_import_map', array());     //get import ids for use as a cache to be deleted after import is complete

                        if (!is_array($eti_imported_ids)) {
                            $eti_imported_ids = array(); //kill it. it should be an array so if it isn't then someone has messed with it
                        }
                        if (!is_array($eti_import_map)) {
                            $eti_import_map = array(); //kill it. it should be an array so if it isn't then someone has messed with it
                        }

                        $eti_import_map = array_map('sanitize_text_field', $eti_import_map);     //make sure the array is clean
                        $eti_imported_ids = array_map('sanitize_text_field', $eti_imported_ids); //make sure the array is clean

                        add_filter('upload_mimes', array($this, 'upload_custom_mime_types'), 9999);
                        add_filter('wp_check_filetype_and_ext', array($this, 'files_ext_webp'), 10, 4);

                        switch ($ajax_action) {
                            case 'install-parent-theme':
                                if ($theme = $this->get('theme')) { //check if theme allowed in next step
                                    $return = $this->handle_install_theme($theme);
                                }
                                break;
                            case 'import-media-item':
                                if ($media_id = $this->get('id', 'int')) {
                                    $return = $this->handle_import_media_item($media_id);
                                }
                                break;
                            case 'import-media-items':
                                if ($media_ids = $this->get('ids')) {
                                    $return = $this->handle_import_media_items($media_ids);
                                }
                                break;
                            case 'prereq-check':
                                $return = $this->handle_prerequisite_check();
                                break;
                            case 'import-content':
                                $return = $this->handle_import_content();
                                break;
                            case 'import-homepage':
                                $return = $this->handle_import_homepage();
                                break;
                            case 'import-customizer':
                                $return = $this->handle_import_customizer();
                                break;
                            case 'import-widgets':
                                $return = $this->handle_import_widgets();
                                break;
                            case 'import-custom_css':
                                $return = $this->handle_import_custom_css();
                                break;
                            case 'import-menu':
                                if ($slug = $this->get('slug')) {
                                    $return = $this->handle_import_menu($slug);
                                }
                                break;
                            case 'install-theme':
                                if ($theme = $this->get('theme')) {
                                    $return = $this->handle_install_theme($theme, true);
                                }
                                break;
                            case 'install-repo-plugin':
                                if ($plugin = $this->get('plugin')) { //check if plugin allowed in next step
                                    $return = $this->handle_repo_install_plugin($plugin);
                                }
                                break;
                            case 'install-non-repo-plugin':
                                if ($plugin = $this->get('plugin')) { //check if plugin allowed in next step
                                    $return = $this->handle_nonrepo_install_plugin($plugin);
                                }
                                break;
                            case 'import-start':
                                $return = $this->handle_pre_import_setup();
                                break;
                            case 'import-complete':
                                $return = $this->handle_post_import_mop_up();
                                break;
                            case 'import-failed':
                                $return = $this->handle_import_failed_mop_up();
                                break;
                            default:
                                $found_endpoint = false;
                        }

                        if (!$found_endpoint) {
                            $return = apply_filters('eti_api_actions', $return, $ajax_action);
                        }

                        update_option('eti_imported_ids', $eti_imported_ids);
                        update_option('eti_import_map', $eti_import_map);
                    }

                    echo wp_json_encode($return);
                    die;
                }
            }
        }

        function submenu() {
            add_menu_page(
                $this->plugin_name,
                $this->plugin_name,
                'manage_options',
                'eti',
                array($this, 'submenu_cb'),
                'dashicons-upload'
            );
        }

        function get_file_summary() {
            $return = array(
                'plugins'    => array(),
                'themes'     => array(),
                'content'    => array(),
                'widgets'    => array(),
                'menus'      => array(),
                'customizer' => array(),
                'custom_css' => array()
            );

            if ($this->import_file_exists('importer_config.json')) {
                $return['config'] = $this->file_summary_config();
            }
            if ($this->import_file_exists('plugins.json')) {
                $return['plugins'] = $this->file_summary_plugins();
            }
            if ($this->import_file_exists('themes.json')) {
                $return['themes'] = $this->file_summary_themes();
            }
            if ($this->import_file_exists('content.json')) {
                $return['content'] = $this->file_summary_content();
            }
            if ($this->import_file_exists('widgets.json')) {
                $return['widgets'] = $this->file_summary_widgets();
            }
            if ($this->import_file_exists('menus.json')) {
                $return['menus'] = $this->file_summary_menus();
            }
            if ($this->import_file_exists('customizer.json')) {
                $return['customizer'] = $this->file_summary_customizer();
            }
            if ($this->import_file_exists('custom_css.json')) {
                $return['custom_css'] = $this->file_summary_css();
            }

            $return = apply_filters('eti_file_summary', $return);

            return $return;
        }

        function file_summary_themes() {
            $return = array();

            if ($file_data = $this->get_file_content('themes.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_content() {
            $return = array();

            if ($file_data = $this->get_file_content('content.json')) {
                foreach ($file_data as $post_type => $data) {
                    $return['post_types'][$post_type] = count($data);
                }
            }

            return $return;
        }

        function file_summary_widgets() {
            $return = array();

            if ($file_data = $this->get_file_content('widgets.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_menus() {
            $return = array();

            if ($file_data = $this->get_file_content('menus.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_config() {
            $return = array();

            if ($file_data = $this->get_file_content('importer_config.json')) {
                $return = $file_data;

                if (!$return['importer_logo']) {
                    $return['importer_logo'] = $this->plugin_assets_url . 'sitepresser-logo.png';
                }

                if (!$return['importer_name']) {
                    $return['importer_name'] = 'SitePresser';
                }
            }

            return $return;
        }

        function file_summary_customizer() {
            $return = array();

            if ($file_data = $this->get_file_content('customizer.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_plugins() {
            $return = array();

            if ($file_data = $this->get_file_content('plugins.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function file_summary_css() {
            $return = array();

            if ($file_data = $this->get_file_content('custom_css.json')) {
                $return = $file_data;
            }

            return $return;
        }

        function render_tick_non_toggle($plugin_name, $desc = '') {
            return '<p class="eti_tick_non_toggle">
                        <span title="' . esc_attr__('Item Currently Present', 'sitepresser') . '" class="dashicons dashicons-yes-alt"></span>
                        <span class="eti_on_off_label">' . esc_html(wp_strip_all_tags($plugin_name)) . '</span>
                    </p>' . ($desc ? wp_kses($desc, $this->kses_get_allowed_tags()) : '');
        }

        function render_toggle($name, $label = false, $checked = false, $desc = '', $value = 1) {
            return '<p>
				<label class="eti_on_off_switch">
					<input value="' . esc_attr($value) . '" name="' . esc_attr($name) . '" type="checkbox" ' . ($checked ? 'checked="checked"' : '') . '/>
					<span class="eti_on_off_slider"></span>
				</label>
				' . ($label ? '<span class="eti_on_off_label">' . esc_html($label) . '</span>' : '') . '
				' . ($desc ? '<span class="eti_desc eti_indent">' . wp_kses($desc, $this->kses_get_allowed_tags()) . '</span>' : '') . '
			</p>';
        }

        function post_activate_tasks($plugin, $plugin_path = false) {
            do_action('eti_post_activate_tasks', $plugin, $plugin_path);
        }

        function init_filesystem() {
            global $wp_filesystem;

            if (!$wp_filesystem) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                WP_Filesystem();
            }

            return $wp_filesystem;
        }

        function submenu_cb() {
            if (!current_user_can('manage_options')) {
                return; //admin only
            }

            $this->init_filesystem();

            $html = '<div class="wrap"><div id="icon-tools" class="icon32"></div>';

            if ($importer_config = $this->file_summary_config()) {
                $html .= '<h2><img class="eti_logo" src="' . $importer_config['importer_logo'] . '" /></h2>';
            } else {
                $html .= '<h2><img class="eti_logo" src="' . $this->plugin_assets_url . 'sitepresser-logo.png" /></h2>';
            }

            $html .= '<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2 eti_settings">';

            if (isset($_POST['eti_import_submit'], $_POST['eti_nonce']) && wp_verify_nonce(sanitize_key($_POST['eti_nonce']), 'eti_handle_import')) {
                $html .= $this->handle_import();

            } else {
                $summaries = $this->get_file_summary();

                $html .= '<form method="POST" class="eti_form">
        					<div style="clear: both;">';

                if ($importer_config) {
                    $html .= $this->box_start(__('Welcome!', 'sitepresser'));

                    if ($date = get_option('eti_import_file_date')) {
                        $date = strtotime($date);
                        $date = gmdate('jS F Y', $date);

                        $html .= '<div class="eti_message">
						<div class="eti_updated">
							' . wpautop(__('The site has been imported already. Doing so again may cause duplicate content/files. Site imported date:', 'sitepresser') . ' ' . $date) . '
						</div>
					</div>';
                    }

                    $html .= wpautop(__('Welcome! This page allows you to import everything you need to get your new site up and running from the theme package. This includes content, menus, widgets, plugins and the theme itself. Please choose form the options below to start the import. Once complete you can delete this plugin and start making your site.', 'sitepresser'));

                    if (isset($importer_config['importer_video']) && $importer_config['importer_video']) {
                        $html .= '<div class="docs_video">' . wp_oembed_get($importer_config['importer_video'], array('width' => 800)) . '</div>';
                    }

                    $html .= '<div class="docs_links">';

                    if (isset($importer_config['importer_docs']) && $importer_config['importer_docs']) {
                        $html .= '<div class="docs_link"><a href="' . $importer_config['importer_docs'] . '" target="_blank"><span class="dashicons dashicons-welcome-learn-more"></span>' . __('Documentation', 'sitepresser') . '</a></div>';
                    }

                    if (isset($importer_config['importer_support']) && $importer_config['importer_support']) {
                        if (stripos($importer_config['importer_support'], 'mailto:') !== false) {
                            $html .= '<div class="docs_link"><a href="' . $importer_config['importer_support'] . '" target="_blank"><span class="dashicons dashicons-email"></span>' . __('Contact', 'sitepresser') . '</a></div>';
                        } else {
                            $html .= '<div class="docs_link"><a href="' . $importer_config['importer_support'] . '" target="_blank"><span class="dashicons dashicons-editor-help"></span>' . __('Support', 'sitepresser') . '</a></div>';
                        }
                    }

                    $html .= '</div>';
                    $html .= $this->box_end();
                }

                if ($this->import_file_exists('content.json')) {
                    $summary = '';

                    if (isset($summaries['content']['post_types'])) {
                        $summary .= '<div class="eti_summary eti_content_summary">
                                        <table>
                                            <tr>
                                            <th><strong>' . __('Content Type', 'sitepresser') . '</strong></th>
                                            <th><strong>' . __('Number of Items', 'sitepresser') . '</strong></th>
                                        </tr>';

                        foreach ($summaries['content']['post_types'] as $pt => $count) {
                            if (!in_array($pt, array('taxonomies', 'image_lookup'))) {
                                $summary .= '<tr><td>' . ucwords($pt) . '</td><td>' . $count . '</td></tr>';
                            }
                        }

                        $summary .= '</table>
							        </div>';
                    }

                    $html .= $this->box_start(__('Include Content', 'sitepresser'));

                    $desc = __('Posts, pages, products etc...', 'sitepresser') . ' ' . ($summary ? '<a onclick="jQuery(\'.eti_content_summary\').slideToggle();">' . __('Show Summary', 'sitepresser') . '</a>' : '');
                    $html .= $this->render_toggle('eti_inc_content', __('Content', 'sitepresser'), 1, $desc);
                    $html .= $summary;

                    $desc = __('Homepage and blog pages set to new content?', 'sitepresser');
                    $html .= $this->render_toggle('eti_inc_homepage', __('Set Homepage?', 'sitepresser'), 1, $desc);

                    $html .= $this->box_end();

                }

                $html .= $this->box_start(__('Include Site Structure', 'sitepresser'));

                if ($this->import_file_exists('widgets.json')) {
                    $desc = __('The widgets for each sidebar in the theme', 'sitepresser');
                    $html .= $this->render_toggle('eti_inc_widgets', __('Widgets', 'sitepresser'), 1, $desc);
                }

                if ($this->import_file_exists('menus.json')) {
                    $desc = __('Menus with an active/assigned theme location', 'sitepresser');
                    $html .= $this->render_toggle('eti_inc_menus', __('Menus', 'sitepresser'), 1, $desc);
                }

                $html .= $this->box_end();
                $html .= apply_filters('eti_settings_toggles', '');

                if ($this->import_file_exists('plugins.json')) {
                    if (!empty($summaries['plugins']['in_repo']) && count($summaries['plugins']['in_repo'])) {
                        $html .= $this->box_start(__('WordPress Repository (Free/Hosted) Plugins', 'sitepresser'));

                        $html .= wpautop(__('The following plugins are available for free in the WordPress Repository.', 'sitepresser'));

                        foreach ($summaries['plugins']['in_repo'] as $plugin_name => $plugin_data) {
                            $checkbox = $this->render_toggle('eti_inc_plugins[in_repo][' . $plugin_name . ']', $plugin_data['name'], 1, $plugin_data['desc'], $plugin_data['name']);

                            if ($plugin_path = $this->is_plugin_present($plugin_name)) { //Perhaps perform a version check here also
                                if (is_plugin_active($plugin_path)) {
                                    $checkbox = $this->render_tick_non_toggle($plugin_data['name'], $plugin_data['desc']);
                                }
                            }

                            $html .= $checkbox;
                        }

                        $html .= $this->box_end();
                    }

                    if (!empty($summaries['plugins']['not_in_repo']) && count($summaries['plugins']['not_in_repo']) > 0) {
                        $html .= $this->box_start(__('Non-WordPress Repository (Premium/3rd Party) Plugins', 'sitepresser'));

                        $html .= wpautop(__('The following plugins are NOT available in the WordPress Repository. Licenses and settings are not imported so you may need to consult the package documentation for instructions on importing the demo configuration fully.', 'sitepresser'));

                        foreach ($summaries['plugins']['not_in_repo'] as $plugin_name => $plugin_data) {
                            $checkbox = $this->render_toggle('eti_inc_plugins[not_in_repo][' . $plugin_name . ']', $plugin_data['name'], 1, $plugin_data['desc'], $plugin_data['name']);

                            if ($plugin_path = $this->is_plugin_present($plugin_name)) { //Perhaps perform a version check here also
                                if (is_plugin_active($plugin_path)) {
                                    $checkbox = $this->render_tick_non_toggle($plugin_data['name'], $plugin_data['desc']);
                                }
                            }

                            $html .= $checkbox;
                        }

                        $html .= $this->box_end();
                    }
                }

                if ($this->import_file_exists('themes.json')) {
                    $parent_theme_name = '';

                    $html .= $this->box_start(__('Theme Information', 'sitepresser'));

                    if ($theme = wp_get_theme()) {
                        $theme_name = $theme->get('Name');
                        $theme_version = $theme->get('Version');

                        if (is_child_theme()) {
                            if ($parent = $theme->parent()) {
                                $parent_theme_name = $parent->get('Name');
                                $parent_theme_version = $parent->get('Version');
                            }

                            $html .= wpautop(__('You are currently using a child theme called "' . $theme_name . '" (v' . $theme_version . ') which has a parent theme called "' . $parent_theme_name . '" (v' . $parent_theme_version . ')', 'sitepresser'));

                        } else {
                            $html .= wpautop(__('Your current theme is "' . $theme_name . '" (v' . $theme_version . '). There is no child theme in use.', 'sitepresser'));
                        }
                    }

                    if (isset($summaries['themes']['theme']['prereq']) && $summaries['themes']['theme']['prereq']) {
                        $html .= wpautop('<strong>' . __('The theme ' . $summaries['themes']['theme']['name'] . ' is required by this package but is not provided. Please ensure that it is installed (but not necessarily activated) before running the importer.', 'sitepresser') . '</strong>');
                    }
                    if (isset($summaries['themes']['parent_theme']['prereq']) && $summaries['themes']['parent_theme']['prereq']) {
                        $html .= wpautop('<strong>' . __('The theme ' . $summaries['themes']['parent_theme']['name'] . ' is required by this package but is not provided. Please ensure that it is installed (but not necessarily activated) before running the importer.', 'sitepresser') . '</strong>');
                    }

                    $summary = '<div class="eti_summary eti_theme_summary">
							<table>
								<tr>
									<th><strong>' . __('Type', 'sitepresser') . '</strong></th>
									<th><strong>' . __('Name', 'sitepresser') . '</strong></th>
									<th><strong>' . __('Version', 'sitepresser') . '</strong></th>
								</tr>';

                    $import_child_theme_label = __('Theme', 'sitepresser');

                    if (isset($summaries['themes']['parent_theme'])) {
                        $import_child_theme_label = __('Child Theme', 'sitepresser');

                        $summary .= '	<tr>
									<td>' . __('Parent Theme', 'sitepresser') . '</td>
									<td>' . $summaries['themes']['parent_theme']['name'] . '</td>
									<td>' . $summaries['themes']['parent_theme']['version'] . '</td>
								</tr>';
                    }

                    $summary .= '		<tr>
									<td>' . $import_child_theme_label . '</td>
									<td>' . $summaries['themes']['theme']['name'] . '</td>
									<td>' . $summaries['themes']['theme']['version'] . '</td>
								</tr>
							</table>
						</div>';

                    if ($theme_name == $summaries['themes']['theme']['name']) {
                        if ($parent_theme_name) {
                            if ($parent_theme_name == $summaries['themes']['parent_theme']['name']) {
                                $html .= $this->render_tick_non_toggle($summaries['themes']['parent_theme']['name']);
                            }

                            $html .= $this->render_tick_non_toggle($summaries['themes']['theme']['name']);

                        } else {
                            $html .= $this->render_tick_non_toggle($summaries['themes']['theme']['name']);
                        }
                    } else {
                        $toggle_label = __('Import/Activate "' . $summaries['themes']['theme']['name'] . '" ' . (isset($summaries['themes']['parent_theme']) ? 'and it\'s parent theme "' . $summaries['themes']['parent_theme']['name'] . '"' : '') . '?', 'sitepresser');
                        $html .= $this->render_toggle('eti_inc_themes', $toggle_label, 1);
                    }

                    $html .= wpautop('<small>' . __('Theme and Parent Theme is present', 'sitepresser') . ' ' . ($summary ? '<a onclick="jQuery(\'.eti_theme_summary\').slideToggle();">' . __('Show Summary', 'sitepresser') . '</a>' : '') . '</small>');
                    $html .= $summary;

                    if ($this->import_file_exists('customizer.json')) { //dependent on theme
                        $desc = __('Customizer settings', 'sitepresser');
                        $html .= $this->render_toggle('eti_inc_customizer', __('Customizer', 'sitepresser'), 1, $desc);
                    }

                    if ($this->import_file_exists('custom_css.json')) {
                        $desc = __('Custom CSS. Normally stored in the Customizer', 'sitepresser');
                        $html .= $this->render_toggle('eti_inc_custom_css', __('Custom CSS', 'sitepresser'), 1, $desc);
                    }

                    $html .= $this->box_end();
                }

                $html .= '	</div>
                            <input type="hidden" name="eti_nonce" value="' . wp_create_nonce('eti_handle_import') . '" />
                            <input type="submit" name="eti_import_submit" class="eti_button eti_edit_submit" value="' . __('Begin site import!', 'sitepresser') . '" />
                        </form>';
            }

            $html .= '	</div>
                    </div>
                </div>';

            echo wp_kses($html, $this->kses_get_allowed_tags());
        }

        function kses_get_allowed_tags() {
            $allowed_tags = wp_kses_allowed_html('post');

            //normal post based tags but our settings page needs a form so the following applies
            $allowed_tags['form'] = array(
                'method' => true,
                'action' => true,
            );
            $allowed_tags['input'] = array(
                'id'      => true,
                'type'    => true,
                'style'   => true,
                'class'   => true,
                'name'    => true,
                'value'   => true,
                'checked' => true,
            );
            $allowed_tags['select'] = array(
                'id'    => true,
                'style' => true,
                'class' => true,
                'name'  => true,
            );
            $allowed_tags['option'] = array(
                'id'       => true,
                'value'    => true,
                'selected' => true,
            );

            //video intro for the settings page can have a video. normally using oembed for vimeo or YT
            $allowed_tags['iframe'] = array(
                'id'              => true,
                'class'           => true,
                'style'           => true,
                'title'           => true,
                'width'           => true,
                'height'          => true,
                'allow'           => true,
                'allowfullscreen' => true,
                'frameborder'     => true,
                'src'             => true,
                'class'           => true,
            );

            $allowed_tags['a'] = array('onclick' => true, 'href' => true);

            return $allowed_tags;
        }

        function get_repo_plugin_info($plugin_slug) {
            $req = serialize((object)array('slug' => esc_html($plugin_slug))); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions

            $get_plugin_repo_data = array(
                'action'  => 'plugin_information',
                'request' => $req
            );

            $repo_data = wp_remote_post('http://api.wordpress.org/plugins/info/1.0/', array('body' => $get_plugin_repo_data));

            return $repo_data['body'];
        }

        function get_repo_theme_info($plugin_slug) {
            $get_plugin_repo_data = array(
                'action'  => 'theme_information',
                'request' => array('slug' => esc_html($plugin_slug))
            );

            $repo_data = wp_remote_post('http://api.wordpress.org/themes/info/1.1/', array('body' => $get_plugin_repo_data));

            if ($repo_data['body'] == 'false') {
                $repo_data['body'] = false;
            }

            return $repo_data['body'];
        }

        function box_start($title, $class = '') {
            return wp_kses_post(
                '<div class="' . esc_attr('postbox ' . $class) . '">
                    <h2 class="hndle">' . esc_html(wp_strip_all_tags($title)) . '</h2>
                    <div class="inside" style="clear: both;">'
            );
        }

        function box_end() {
            return wp_kses_post('<div class="eti_box_clear"></div></div></div>');
        }

        //specifically for addons
        function addon_file_exists($file_path) {
            $return = false;

            if ($file = $this->sanitize_file_path($this->plugin_addons_dir . $file_path)) {
                if (file_exists($file)) {
                    $return = $file;
                }
            }

            return $return;

        }

        //specifically for data
        function import_file_exists($file_name) {
            $return = false;

            if ($file = $this->sanitize_file_path($this->plugin_data_dir . $file_name)) {
                if (file_exists($file)) {
                    $return = $file;
                }
            }

            return $return;

        }

        function prettify_log_output($string, $add_classes = '') {
            $string = (strlen(wp_strip_all_tags($string)) > 50 ? substr(wp_strip_all_tags($string), 0, 47) . '...' : $string); //if the file name is long then shorten accordingly

            return '<span class="eti_path_output ' . $add_classes . '">' . $string . '</span>';
        }

        function sanitize_file_path($path) {
            if (stripos($path, '..') !== false) { //avoid ../../ type file paths.
                $path = '';
            }

            return $path;
        }

        function sanitize_path_for_output($path) {
            if (stripos($path, ABSPATH) !== false) {
                $path = str_replace(trailingslashit(ABSPATH), '/', $path);
                $path = $this->prettify_log_output($path);
            }

            return $path;
        }

        function get_file_content($file_name, $not_assoc=false) {
            global $wp_filesystem;

            $content = '';
            $path = $this->sanitize_file_path($this->plugin_data_dir . $file_name);

            if ($path) {
                if (!$wp_filesystem) {
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    WP_Filesystem();
                }

                if ($wp_filesystem) {
                    if ($content = $wp_filesystem->get_contents($path)) {
                        $content = json_decode($content, !$not_assoc);
                    }
                }
            }

            return $content;
        }

        function quiet_skin_class() {
            if (!class_exists('ETIQuietSkin')) {
                /*class ETIQuietSkin extends \WP_Upgrader_Skin
                {
                    public function feedback($string, ...$args)
                    {
                    }
                }*/
            }
        }

        function init_plugin_includes() {
            require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/misc.php');
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

            $this->quiet_skin_class();
        }

        function init_theme_includes() {
            require_once(ABSPATH . 'wp-admin/includes/theme-install.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/misc.php');
            require_once(ABSPATH . 'wp-admin/includes/theme.php');
            require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

            $this->quiet_skin_class();
        }

        function clear_previous_import_mappings() {
            global $wpdb;

            delete_option('eti_exporter_url');
            delete_option('eti_import_file_date');

            $sql = 'DELETE FROM ' . $wpdb->postmeta . ' WHERE meta_key = "eti_old_post_id"';
            $wpdb->query($sql); // phpcs:ignore WordPress.DB

            $sql = 'DELETE FROM ' . $wpdb->termmeta . ' WHERE meta_key = "eti_old_term_id"';
            $wpdb->query($sql); // phpcs:ignore WordPress.DB
        }

        function handle_pre_import_setup() {
            $msgs = array();

            delete_option('eti_imported_ids');

            do_action('eti_pre_import_setup'); //hook added to allow 3rd parties to perform their pre import setup

            if ($old_export_url = get_option('eti_exporter_url', '')) {
                $importer_config = $this->file_summary_config();
                $exporter_url = trailingslashit($importer_config['exporter_url']);

                if ($exporter_url != $old_export_url) {
                    $this->clear_previous_import_mappings();

                    $msgs[] = array('msg' => __('Previous import mappings found. Beginning new import log', 'sitepresser'), 'severity' => 'low');
                }
            }

            $msgs[] = array('msg' => __('Setup Complete. Beginning import process!', 'sitepresser'), 'severity' => 'low');

            return array('success' => true, 'log' => $msgs, 'debug' => '');
        }

        function handle_post_import_mop_up() {
            global $eti_imported_ids, $eti_import_map;

            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            wp_clean_plugins_cache(true); //let the site know to check for updates and forget old plugins

            $this->import_complete_mop_up();         //this relinks and remaps any ids that we have yet to do.
            do_action('eti_import_complete_mop_up'); //hook added to allow 3rd parties to perform their post import remapping of their own

            $importer_config = $this->file_summary_config();
            $exporter_url = trailingslashit($importer_config['exporter_url']);

            update_option('eti_exporter_url', $exporter_url);
            update_option('eti_import_file_date', gmdate('Y-m-d H:i'));

            $eti_imported_ids = $eti_import_map = array(); //empty array to show completed import. Updated at the end of the API function

            return array(
                'success'       => true,
                'feedback_html' => wpautop('<span class="eti_feedback_headline">' . __('Your site package has been imported!', 'sitepresser') . '</span>' . __('You should now remove this plugin from your site as it is no longer necessary.', 'sitepresser'))
            );
        }

        function handle_import_failed_mop_up() {
            do_action('eti_import_failed_mop_up'); //any other business? plugins/ themes can hook in here

            return array(
                'success'       => true,
                'feedback_html' => wpautop('<span class="eti_feedback_headline">' . __('Oh no! Something went wrong!', 'sitepresser') . '</span>' . __('Check the logs below for more info. Click the arrows to see information about each step and, if necessary, contact support.', 'sitepresser'))
            );
        }

        function handle_nonrepo_install_plugin($plugin) {
            ob_start();
            $this->init_plugin_includes();

            $plugin_pretty = $this->prettify_log_output($plugin);
            $plugin_dir = WP_PLUGIN_DIR . '/' . $plugin;
            $plugin_url = $this->get_plugin_url($plugin);
            $success = false;

            /*$api = plugins_api('plugin_information',
                array('slug' => $plugin, 'fields' => array('sections' => false,))
            );*/

            //$skin = new WP_Upgrader_Skin(array('api' => $api));
            //$upgrader = new Plugin_Upgrader($skin);

            if (!is_dir($plugin_dir)) {
                $install = $this->copy_dir($plugin_url, $plugin_dir);
                //$install = $upgrader->install($plugin_url);

                if ($install !== true) {
                    $error = __('Unknown Reason', 'sitepresser');
                    if (is_wp_error($install)) {
                        $error = $install->get_error_message();
                    }

                    $msgs[] = array(
                        'msg'      => __('Plugin Install Failed', 'sitepresser') . ': ' . $plugin_pretty . ' - ' . $error,
                        'severity' => 'high'
                    );
                } else {
                    $success = true;
                    $msgs[] = array(
                        'msg'      => __('Plugin Install Complete', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'low'
                    );
                }
            } else {
                $msgs[] = array('msg' => __('Plugin Exists', 'sitepresser') . ': ' . $plugin_pretty, 'severity' => 'med');
                $success = true;
            }

            if ($success) {
                if ($activated = $this->activate_plugin($plugin)) {
                    $msgs[] = array(
                        'msg'      => __('Plugin Activated', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'low'
                    );
                } else {
                    $msgs[] = array(
                        'msg'      => __('Plugin Activation Failed', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'high'
                    );
                }
            }

            ob_end_clean();

            $return = array('success' => $success, 'log' => $msgs, 'debug' => '');

            return $return;
        }

        function handle_repo_install_plugin($plugin) {
            ob_start();
            $this->init_plugin_includes();

            $plugin_pretty = $this->prettify_log_output($plugin);
            $plugin_dir = WP_PLUGIN_DIR . '/' . $plugin;
            $success = false;

            $api = plugins_api(
                'plugin_information',
                array('slug' => $plugin, 'fields' => array('sections' => false,))
            );

            $skin = new WP_Upgrader_Skin(array('api' => $api));
            $upgrader = new Plugin_Upgrader($skin);

            if (!is_dir($plugin_dir)) {
                $install = $upgrader->install($api->download_link);

                if ($install !== true) {
                    $error = __('Unknown Reason', 'sitepresser');
                    if (is_wp_error($install)) {
                        $error = $install->get_error_message();
                    }

                    $msgs[] = array(
                        'msg'      => __('Plugin Install Failed', 'sitepresser') . ': ' . $plugin_pretty . ' - ' . $error,
                        'severity' => 'high'
                    );
                } else {
                    $success = true;
                    $msgs[] = array(
                        'msg'      => __('Plugin Install Complete', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'low'
                    );
                }
            } else {
                $msgs[] = array('msg' => __('Plugin Exists', 'sitepresser') . ': ' . $plugin_pretty, 'severity' => 'med');
                $success = true;
            }

            if ($success) {
                if ($activated = $this->activate_plugin($plugin)) {
                    $msgs[] = array(
                        'msg'      => __('Plugin Activated', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'low'
                    );
                } else {
                    $msgs[] = array(
                        'msg'      => __('Plugin Activation Failed', 'sitepresser') . ': ' . $plugin_pretty,
                        'severity' => 'high'
                    );
                }
            }

            ob_end_clean();

            $return = array('success' => $success, 'log' => $msgs, 'debug' => '');

            return $return;
        }

        function handle_install_theme($theme, $activate = false) {
            $success = false;
            $theme_info = false;
            $skin_args = false;
            $msgs = array();

            $theme_pretty = $this->prettify_log_output($theme);
            $theme_summary = $this->file_summary_themes(); //this may contain the parent theme or reference one so we need to check that also

            if (isset($theme_summary['theme']['directory_name']) && $theme_summary['theme']['directory_name'] == $theme) {
                $theme_info = $theme_summary['theme'];
            } else if (isset($theme_summary['parent_theme']['directory_name']) && $theme_summary['parent_theme']['directory_name'] == $theme) {
                $theme_info = $theme_summary['parent_theme'];
            }

            //by this stage the theme should be identified

            if ($theme_info) {
                ob_start();

                $this->init_theme_includes();

                $theme_dir = WP_CONTENT_DIR . '/themes/' . $theme;

                if (!is_dir($theme_dir)) {
                    if ($theme_info['in_repo']) {
                        $api = themes_api(
                            'theme_information',
                            array('slug' => $theme, 'fields' => array('downloadlink' => true, 'parent' => true))
                        ); //throws error for non repo

                        $skin_args = array('api' => $api);
                        $theme_url = $api->download_link;

                        $skin = new WP_Upgrader_Skin($skin_args);
                        $upgrader = new Theme_Upgrader($skin);
                        $install = $upgrader->install($theme_url);
                    } else {
                        $theme_url = $this->get_theme_url($theme_info);

                        $install = $this->copy_dir($theme_url, $theme_dir);
                    }

                    if ($install !== true) {
                        $error = __('Unknown Reason', 'sitepresser');
                        if (is_wp_error($install)) {
                            $error = $install->get_error_message();
                        }

                        $msgs[] = array(
                            'msg'      => __('Theme Install Failed', 'sitepresser') . ': ' . $theme_pretty . ' - ' . $error,
                            'severity' => 'high'
                        );
                    } else {
                        $success = true;
                        $msgs[] = array(
                            'msg'      => __('Theme Installed Successfully', 'sitepresser') . ': ' . $theme_pretty,
                            'severity' => 'low'
                        );
                    }
                } else {
                    $msgs[] = array(
                        'msg'      => __('Theme Exists', 'sitepresser') . ': ' . $theme_pretty,
                        'severity' => 'med'
                    );
                    $success = true;
                }

                if ($success) {
                    if ($activate) {
                        $this->handle_activate_theme($theme);
                        $msgs[] = array('msg' => __('Theme Activated', 'sitepresser'), 'severity' => 'low');
                    }
                }

                ob_end_clean();
            }

            $return = array('success' => $success, 'log' => $msgs, 'debug' => '');

            return $return;
        }

        function copy_dir($from, $to) {
            global $wp_filesystem;

            $return = false;

            if (!$wp_filesystem) {
                $this->init_filesystem();
            }

            if ($wp_filesystem) {
                if ($wp_filesystem->mkdir($to)) {
                    $copy = copy_dir($from, $to);

                    if (!is_wp_error($copy)) {
                        $return = true;
                    }
                }
            }

            return $return;
        }

        function handle_activate_theme($theme) {
            switch_theme($theme);
            //eti_post_activate_tasks( $theme );
        }

        function is_plugin_present($plugin) {
            $return = false;
            $plugin_dir = $plugin;

            wp_cache_delete('plugins', 'plugins'); //clear reference to the active plugins in the cache so that get_plugins works properly

            if (stripos($plugin, '/') !== false) {
                $exploded_plugin = explode('/', $plugin);
                $plugin_dir = $exploded_plugin[0];
            }

            if ($plugin_file = get_plugins('/' . $plugin_dir)) {
                $return = $plugin . '/' . array_keys($plugin_file)[0];
            }

            return $return;
        }

        function activate_plugin($plugin) {
            $return = false;

            if ($plugin_path = $this->is_plugin_present($plugin)) {
                $return['plugin_path'] = $plugin_path;

                if (is_wp_error(activate_plugin($plugin_path))) {

                    //the non official route if the first fails for any reason
                    if ($plugins = get_option('active_plugins', array())) {
                        if (!in_array($plugin_path, $plugins)) {
                            array_push($plugins, $plugin);
                            $this->update_option('active_plugins', $plugins);

                            $return = true;
                        }
                    }
                } else {
                    $return = true;
                }

                $this->post_activate_tasks($plugin, $plugin_path);
            }

            return $return;
        }

        function get_plugin_url($plugin) {
            $return = '';

            if ($plugins = $this->get_file_content('plugins.json')) {
                if ($return = $plugins['not_in_repo'][$plugin]['file']) {
                    $return = $this->plugin_files_dir . 'plugins/' . $return;
                }
            }

            return $return;
        }

        function get_theme_url($theme_info) {
            $return = '';

            if ($file = $theme_info['file']) {
                $return = $this->sanitize_file_path($this->plugin_files_dir . 'themes/' . $file);
            }

            return $return;
        }

        function js_import_plugins() {
            $js = array();

            if (isset($_POST['eti_import_submit'], $_POST['eti_nonce']) && wp_verify_nonce(sanitize_key($_POST['eti_nonce']), 'eti_handle_import')) {
                if ($plugins = $this->get_file_content('plugins.json')) {

                    if (!empty($_POST['eti_inc_plugins']['in_repo'])) {
                        if ($repo_selected = array_map('sanitize_text_field', wp_unslash($_POST['eti_inc_plugins']['in_repo']))) {
                            if (is_array($repo_selected)) {
                                foreach ($repo_selected as $plugin => $plugin_label) {
                                    $js[] = array(
                                        'install-repo-plugin',
                                        'plugin=' . esc_html($plugin),
                                        'plugin_' . esc_html($plugin),
                                        $plugin_label
                                    );
                                }
                            }
                        }
                    }

                    if (!empty($_POST['eti_inc_plugins']['not_in_repo'])) {
                        if ($non_repo_selected = array_map('sanitize_text_field', wp_unslash($_POST['eti_inc_plugins']['not_in_repo']))) {
                            if (is_array($non_repo_selected)) {
                                foreach ($non_repo_selected as $plugin => $plugin_label) {
                                    $js[] = array(
                                        'install-non-repo-plugin',
                                        'plugin=' . esc_html($plugin),
                                        'plugin_' . esc_html($plugin),
                                        $plugin_label
                                    );
                                }
                            }
                        }
                    }

                }
            }

            return $js;
        }

        function js_import_themes() {
            $js = array();

            if ($content = $this->get_file_content('themes.json')) {
                if (isset($content['parent_theme'])) {
                    $parent_dirname = $content['parent_theme']['directory_name'];
                    $js[] = array(
                        'install-parent-theme',
                        'theme=' . esc_html($parent_dirname),
                        'theme_' . esc_html($parent_dirname),
                        __('Parent Theme Install', 'sitepresser') . ': ' . esc_html($parent_dirname)
                    );
                }

                $theme_dirname = $content['theme']['directory_name'];
                $js[] = array(
                    'install-theme',
                    'theme=' . esc_html($theme_dirname),
                    'theme_' . esc_html($theme_dirname),
                    __('Theme Install', 'sitepresser') . ': ' . esc_html($theme_dirname)
                );
            }

            return $js;
        }

        function js_prerequisite_check() {
            $js = array();
            $js[] = array('import-start', '', 'setup', __('Starting Import', 'sitepresser'));
            $js[] = array('prereq-check', '', 'prereq', __('Checking Prerequisites', 'sitepresser'));

            //filter for plugins to add their own pre-req check. ensure value is array and merge so existing filters can not be removed
            if ($new_js = apply_filters('eti_js_pre_requisite_check', array())) {
                if (is_array($new_js) && count($new_js)) {
                    $js = array_merge($js, $new_js);
                }
            }

            return $js;
        }

        function js_import_content() {
            $js = array();

            if ($content = $this->get_file_content('content.json')) {
                $js[] = array('import-content', '', 'content', __('Content', 'sitepresser'));
            }

            return $js;
        }

        function js_import_homepage() {
            $js = array();

            if ($content = $this->get_file_content('homepage.json')) {
                $js[] = array('import-homepage', '', 'homepage', __('Homepage', 'sitepresser'));
            }

            return $js;
        }

        function js_import_custom_css() {
            $js = array();

            if ($content = $this->get_file_content('custom_css.json')) {
                $js[] = array('import-custom_css', '', 'custom_css', __('Custom CSS', 'sitepresser'));
            }

            return $js;
        }

        function js_import_widgets() {
            $js = array();

            if ($content = $this->get_file_content('widgets.json')) {
                $js[] = array('import-widgets', '', 'widgets', __('Widgets', 'sitepresser'));
            }

            return $js;
        }

        function js_import_customizer() {
            $js = array();

            if ($content = $this->get_file_content('customizer.json')) {
                $js[] = array('import-customizer', '', 'customizer', __('Customizer', 'sitepresser'));
            }

            return $js;
        }

        function js_import_menus() {
            $js = array();

            if ($content = $this->get_file_content('menus.json')) {
                if (isset($content['menus'])) {
                    foreach ($content['menus'] as $menu_slug => $menu) {
                        $js[] = array(
                            'import-menu',
                            'slug=' . esc_html($menu_slug),
                            'menu_' . esc_html($menu_slug),
                            __('Menu', 'sitepresser') . ': ' . esc_html($menu['name'])
                        );
                    }
                }
            }

            return $js;
        }

        function js_import_media() {
            $js = array();

            if ($content = $this->get_file_content('content.json')) {
                if ($posts = $content['attachment']) {

                    //maybe batch together here depending on number and size
                    foreach ($posts as $post) {
                        if (!$this->get_mapped_id($post['data']['ID'])) {
                            $title = ($post['data']['post_title'] ? $post['data']['post_title'] : basename($post['data']['guid']));
                            if ($path_info = pathinfo($title)) {
                                if (isset($path_info['extension']) && $path_info['extension'] == 'css') { //disallowed type
                                    continue;
                                }
                            }

                            $title = (strlen(wp_strip_all_tags($title)) > 50 ? substr(wp_strip_all_tags($title), 0, 47) . '...' : $title); //shorten long names

                            $js[] = array(
                                'import-media-item',
                                'id=' . (int)$post['data']['ID'],
                                'pt_' . (int)$post['data']['ID'],
                                __('Media Item', 'sitepresser') . ': ' . esc_html($title)
                            );
                        }
                    }
                }
            }

            return $js;
        }

        function js_import_media_bulk() {
            $js = array();

            if ($content = $this->get_file_content('content.json')) {
                if ($posts = $content['attachment']) {

                    $js_blocks = [];
                    $block_size = 5;
                    $current_block = 0;

                    //maybe batch together here depending on number and size
                    foreach ($posts as $post) {
                        if (!$this->get_mapped_id($post['data']['ID'])) {
                            $title = ($post['data']['post_title'] ? $post['data']['post_title'] : basename($post['data']['guid']));
                            if ($path_info = pathinfo($title)) {
                                if (isset($path_info['extension']) && $path_info['extension'] == 'css') { //disallowed type
                                    continue;
                                }
                            }

                            $js_blocks[$current_block][] = $post['data']['ID'];

                            if (count($js_blocks[$current_block]) >= $block_size) {
                                $current_block++;
                            }
                        }
                    }

                    $total_blocks = count($js_blocks);

                    foreach ($js_blocks as $block_id => $js_block) {
                        $keys = implode(',', $js_block);

                        $js[] = array(
                            'import-media-items',
                            'ids=' . $keys,
                            'pt_' . sanitize_title($keys),
                            __('Media Items Block', 'sitepresser') . ': ' . ($block_id + 1) . '/' . $total_blocks
                        );
                    }
                }
            }

            return $js;
        }

        public function files_ext_webp($types, $file, $filename, $mimes) {
            if (false !== strpos($filename, '.webp')) {
                $types['ext'] = 'webp';
                $types['type'] = 'image/webp';
            }
            if (false !== strpos($filename, '.ogg')) {
                $types['ext'] = 'ogg';
                $types['type'] = 'audio/ogg';
            }
            if (false !== strpos($filename, '.woff')) {
                $types['ext'] = 'woff';
                $types['type'] = 'font/woff|application/font-woff|application/x-font-woff|application/octet-stream';
            }
            if (false !== strpos($filename, '.woff2')) {
                $types['ext'] = 'woff2';
                $types['type'] = 'font/woff2|application/octet-stream|font/x-woff2';
            }
            return $types;
        }

        function upload_custom_mime_types($mimes) {
            $mimes['svg'] = 'image/svg+xml';                                                                                        //icons
            $mimes['woff'] = 'font/woff|application/font-woff|application/x-font-woff|application/octet-stream';                    //font
            $mimes['woff2'] = 'font/woff2|application/octet-stream|font/x-woff2';                                                   //font
            $mimes['eot'] = 'application/vnd.ms-fontobject';                                                                        //font
            $mimes['otf'] = 'application/x-font-otf|font/opentype';                                                                 //font
            $mimes['ttf'] = 'application/x-font-ttf|application/font-sfnt|font/opentype';                                           //font
            $mimes['json'] = 'application/json';                                                                                    //json files for settings etc
            //$mimes['css']   = 'text/css'; //css files

            return $mimes;
        }

        function handle_import_image($file_name, $title) {
            $return = array('success' => false, 'msg' => '', 'severity' => 'low', 'attachment_id' => false);
            $file_name_pretty = $this->prettify_log_output($file_name);

            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            if ($file_path = $this->sanitize_file_path($this->plugin_files_dir . 'media/' . $file_name)) {
                if (file_exists($file_path)) {
                    if ($file_content = file_get_contents($file_path)) {
                        $upload_result = wp_upload_bits($file_name, null, $file_content);

                        if ($upload_result['error']) {
                            $return['msg'] = __('File Import Error for', 'sitepresser') . ' "' . $file_name_pretty . '" (' . $upload_result['error'] . ')';
                            $return['severity'] = 'high';
                            $return['success'] = true; //don't stop the import because of a failed file. We can run it again to re-import later if need be
                        } else {
                            $attachment = [
                                'guid'           => $upload_result['url'],
                                'post_mime_type' => $upload_result['type'],
                                'post_title'     => preg_replace('/\.[^.]+$/', '', $file_name),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            ];

                            $attachment_id = wp_insert_attachment($attachment, $upload_result['file'], 0);

                            //resizes the image subsizes
                            if (!isset($_GET['eti_skip_thumbs'])) {
                                //add_filter('wp_generate_attachment_metadata', 'eti_filter_image_resize_array');
                                $attach_data = wp_generate_attachment_metadata($attachment_id, $upload_result['file']);
                                wp_update_attachment_metadata($attachment_id, $attach_data);
                                //remove_filter('wp_generate_attachment_metadata', 'eti_filter_image_resize_array');
                            }

                            $return['msg'] = __('File Import Complete for', 'sitepresser') . ' ' . $file_name_pretty;
                            $return['success'] = true;
                            $return['attachment_id'] = $attachment_id;
                        }
                    } else {
                        $return['msg'] = __('Could not get file content from ', 'sitepresser') . ' ' . $file_name_pretty;
                        $return['severity'] = 'high';
                    }
                } else {
                    $return['msg'] = __('Media file does not exist in the package to import', 'sitepresser') . ' ' . $file_name_pretty;
                    $return['severity'] = 'high';
                }
            } else {
                $return['msg'] = __('Failed to import image. Bad file path.', 'sitepresser') . ' ' . $file_name_pretty;
                $return['severity'] = 'high';
            }

            return $return;
        }

        function eti_filter_image_resize_array($source_sizes) {
            //@todo
            //echo '<pre>';
            //print_r($source_sizes);
            //echo '</pre>';

            return [];
        }

        function handle_import_media_item($old_attachment_id) {
            $msgs = array();
            $success = false;

            if ($content = $this->get_file_content('content.json')) {
                if ($post = $content['attachment'][$old_attachment_id]) {
                    $data = $post['data'];
                    $file_name = basename($data['guid']);

                    if (!$this->get_mapped_id($old_attachment_id)) {
                        $attachment = $this->handle_import_image($file_name, $data['post_title']);

                        if ($attachment['attachment_id']) {
                            update_post_meta($attachment['attachment_id'], 'eti_old_post_id', $old_attachment_id);
                        }

                        $success = $attachment['success'];
                        $msgs[] = array('msg' => $attachment['msg'], 'severity' => $attachment['severity']);

                    } else {
                        $success = true;
                        $msg = __('Skipped Importing this item as it was imported previously', 'sitepresser') . ' ' . $this->prettify_log_output($data['post_title']);
                        $msgs[] = array('msg' => $msg, 'severity' => 'med');
                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function handle_import_media_items($old_attachment_ids) {
            $msgs = array();
            $success = true;

            if ($old_attachment_ids = explode(',', $old_attachment_ids)) {
                foreach ($old_attachment_ids as $attachment_id) {
                    $import_item = $this->handle_import_media_item($attachment_id);

                    if ($msg = array_pop($import_item['log'])) {
                        $msgs[] = $msg; //append individual import feedback into main log
                    }

                    if (!$import_item['success']) {
                        $success = false;
                        $msg = __('Stopping import of images in this block due to an image failure', 'sitepresser');
                        $msgs[] = array('msg' => $msg, 'severity' => 'high');

                        break; //add another log message to explain
                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function get_mapped_id($old_post_id) {
            global $wpdb;

            $sql_pattern = 'SELECT p.ID
					FROM 
						' . $wpdb->posts . ' p
						JOIN ' . $wpdb->postmeta . ' pm ON (
							p.ID = pm.post_id 
							AND pm.meta_key = "eti_old_post_id" 
							AND pm.meta_value = %d 
						)
					WHERE p.post_status IN ("draft", "publish", "inherit")';

            $prepped_sql = $wpdb->prepare($sql_pattern, (int)$old_post_id); // phpcs:ignore WordPress.DB

            return $wpdb->get_var($prepped_sql); // phpcs:ignore WordPress.DB
        }

        function get_mapped_term_id($old_term_id) {
            global $wpdb;

            $sql_pattern = 'SELECT term_id
					FROM ' . $wpdb->termmeta . ' 
					WHERE
						meta_key = "eti_old_term_id" 
						AND meta_value = %d';

            return $wpdb->get_var($wpdb->prepare($sql_pattern, (int)$old_term_id)); // phpcs:ignore WordPress.DB
        }

        function update_option($option_name, $option_value) {
            $return = false;
            $disallowed_options = $this->get_import_option_blacklist();

            if (!in_array($option_name, $disallowed_options)) {
                $return = true;
                update_option($option_name, $option_value);
            }

            return $return;
        }

        function handle_import_homepage() {

            if ($content = $this->get_file_content('homepage.json')) {
                if ($options = $content['settings']) {
                    foreach ($options as $option_name => $option_value) {
                        if ($option_value) {
                            if ($option_value_mapped = $this->get_mapped_id($option_value)) {
                                $option_value = $option_value_mapped;
                            }
                        }

                        $this->update_option($option_name, $option_value);
                    }
                }
            }

            $msg = array('msg' => __('Homepage Set', 'sitepresser'), 'severity' => 'low');

            return array('success' => true, 'log' => array($msg), 'debug' => '');
        }

        //a mirrored version of the version in sitepresser. That way the export should never contain these options but if they do then they still won't be imported
        function get_import_option_blacklist() {
            $disallowed_options = array(
                'siteurl',
                'home',
                'blogname',
                'blogdescription',
                'users_can_register',
                'admin_email',
                'start_of_week',
                'use_balanceTags',
                'use_smilies',
                'require_name_email',
                'comments_notify',
                'posts_per_rss',
                'rss_use_excerpt',
                'mailserver_url',
                'mailserver_login',
                'mailserver_pass',
                'mailserver_port',
                'default_category',
                'default_comment_status',
                'default_ping_status',
                'default_pingback_flag',
                'date_format',
                'time_format',
                'links_updated_date_format',
                'comment_moderation',
                'moderation_notify',
                'permalink_structure',
                'hack_file',
                'blog_charset',
                'moderation_keys',
                'category_base',
                'ping_sites',
                'comment_max_links',
                'gmt_offset',
                'default_email_category',
                'recently_edited',
                'comment_whitelist',
                'blacklist_keys',
                'comment_registration',
                'html_type',
                'use_trackback',
                'default_role',
                'db_version',
                'uploads_use_yearmonth_folders',
                'upload_path',
                'blog_public',
                'default_link_category',
                'tag_base',
                'show_avatars',
                'avatar_rating',
                'upload_url_path',
                'thumbnail_size_w',
                'thumbnail_size_h',
                'thumbnail_crop',
                'medium_size_w',
                'medium_size_h',
                'avatar_default',
                'large_size_w',
                'large_size_h',
                'image_default_link_type',
                'image_default_size',
                'image_default_align',
                'close_comments_for_old_posts',
                'close_comments_days_old',
                'thread_comments',
                'thread_comments_depth',
                'page_comments',
                'comments_per_page',
                'default_comments_page',
                'comment_order',
                'sticky_posts',
                'uninstall_plugins',
                'timezone_string',
                'default_post_format',
                'link_manager_enabled'
            );

            //a blacklist for plugin authors to add to. Also a means for sitepresser addons to add their own items to the blacklist
            if (!is_array($user_submitted = apply_filters('eti_disallowed_options', array()))) {
                $user_submitted = array();
            }

            //sanitize filtered options
            $user_submitted = array_map('sanitize_text_field', $user_submitted);

            //merge in filtered options
            $disallowed_options = array_merge($disallowed_options, $user_submitted);

            return $disallowed_options;
        }

        function handle_import_customizer() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->get_file_content('customizer.json')) {

                if (isset($content['options'])) {
                    if ($options = $content['options']) {
                        foreach ($options as $option_name => $option_value) {
                            $option_value = wp_unslash($option_value);

                            if (is_serialized($option_value)) {
                                $option_value = unserialize($option_value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                            }

                            $this->update_option($option_name, $option_value);

                            $msg = __('Site Setting Updated', 'sitepresser') . ': ' . $this->prettify_log_output($option_name);
                            $msgs[] = array('msg' => $msg, 'severity' => 'low');
                        }
                    }
                }

                if ($mods = $content['customizer']) {
                    foreach ($mods as $option_name => $option_value) {
                        if ($option_value) {
                            $option_value = wp_unslash($option_value);

                            if (is_serialized($option_value)) {
                                $option_value = unserialize($option_value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                            } else {
                                switch ($option_name) {
                                    case 'custom_logo':
                                        if ($option_value) {
                                            $option_value = $this->get_mapped_id($option_value);
                                        }
                                        break;
                                }
                            }

                            set_theme_mod($option_name, $option_value); //mods are ok because we do need to be able to change every item. that's what the plugin does primarily

                            $msg = __('Customizer Setting Updated', 'sitepresser') . ': ' . $this->prettify_log_output($option_name);
                            $msgs[] = array('msg' => $msg, 'severity' => 'low');
                        }
                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function handle_import_widgets() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->get_file_content('widgets.json')) {

                if ($this->update_option('sidebars_widgets', $content['sidebars'])) {
                    $msgs[] = array('msg' => __('Sidebars updated', 'sitepresser'), 'severity' => 'low');
                }

                if ($options = $content['widgets']) {
                    foreach ($options as $option_name => $option_value) {
                        $option_value = wp_unslash($option_value);

                        if (is_serialized($option_value)) {
                            $option_value = unserialize($option_value); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                        }

                        if (count($option_value) == 1 && isset($option_value['_multiwidget'])) {
                            continue;
                        }

                        $allowed_widgets = apply_filters(
                            'eti_widget_allowed_replace', array(
                                                            'widget_elementor-library',
                                                            'widget_nav_menu',
                                                            'widget_custom_html',
                                                            'widget_text',
                                                            'widget_media_image',
                                                            'widget_media_gallery',
                                                            'widget_responsive_lightbox_gallery_widget'
                                                        )
                        );

                        if (in_array($option_name, $allowed_widgets)) {
                            foreach ($option_value as $widget_id => &$widget) {
                                if ($widget_id == '_multiwidget') {
                                    continue;
                                }
                                if (isset($widget['text'])) {
                                    $widget['text'] = $this->replace_urls_in_string($widget['text']);
                                }
                                if (isset($widget['content'])) {
                                    $widget['content'] = $this->replace_urls_in_string($widget['content']);
                                }
                                if (isset($widget['url'])) {
                                    $widget['url'] = $this->replace_urls_in_string($widget['url']);
                                }

                                //old to new tax id
                                if (!empty($widget['nav_menu'])) {
                                    if ($new_menu_id = $this->get_mapped_term_id($widget['nav_menu'])) {
                                        $widget['nav_menu'] = $new_menu_id;
                                    }
                                }

                                //old to new post_id
                                if (!empty($widget['attachment_id'])) {
                                    if ($new_template_id = $this->get_mapped_id($widget['attachment_id'])) {
                                        $widget['attachment_id'] = $new_template_id;
                                    }
                                }
                                if (!empty($widget['ids'])) {
                                    if (is_array($widget['ids'])) {
                                        foreach ($widget['ids'] as &$image_id) {
                                            if ($new_image_id = $this->get_mapped_id($image_id)) {
                                                $image_id = $new_image_id;
                                            }
                                        }
                                    } else {
                                        if ($ids_arr = explode(',', $widget['ids'])) {
                                            foreach ($ids_arr as &$image_id) {
                                                if ($new_image_id = $this->get_mapped_id($image_id)) {
                                                    $image_id = $new_image_id;
                                                }
                                            }

                                            $widget['ids'] = implode(',', $widget['ids']);
                                        }
                                    }
                                }
                                if (!empty($widget['template_id'])) {
                                    if ($new_template_id = $this->get_mapped_id($widget['template_id'])) {
                                        $widget['template_id'] = $new_template_id;
                                    }
                                }

                                $widget = apply_filters('eti_widget_array', $widget, $option_name);
                            }
                        }

                        $this->update_option($option_name, $option_value);

                        $msgs[] = array(
                            'msg'      => __('Widget Settings Updated', 'sitepresser') . ': ' . $this->prettify_log_output($option_name),
                            'severity' => 'low'
                        );
                    }

                    $msgs[] = array('msg' => __('Widgets updated', 'sitepresser'), 'severity' => 'low');
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function replace_atts_in_shortcode($shortcode) {
            $expression = '/(\S+)=["\']?((?:.(?!["\']?\s+(?:\S+)=|[>"\']))+.)["\']?/'; //matches key value pairs

            if (preg_match_all($expression, $shortcode, $matches, PREG_SET_ORDER, 0)) {
                //[elementor-tag id=\"9533da7\" name=\"popup\" settings=\"%7B%22popup%22%3A%226682%22%7D\"]

                foreach ($matches as $match) {
                    if ($match[1] == 'settings') { //settings replacement for now, more later as necessary
                        if ($settings = urldecode($match[2])) {
                            if ($settings = json_decode($settings, true)) {
                                if (isset($settings['popup'])) {
                                    $settings['popup'] = $this->get_mapped_id($settings['popup']);
                                }
                            }

                            $replace = 'settings="' . rawurlencode(wp_json_encode($settings)) . '"';
                            $shortcode = str_replace($match[0], $replace, $shortcode);
                        }
                    }
                }
            }

            return $shortcode;
        }

        function replace_urls_in_string($text) {
            $image_lookup = $this->get_image_lookup();
            $importer_config = $this->file_summary_config();
            $exporter_url = trailingslashit($importer_config['exporter_url']);

            //we can extend this later. for now it's just a way to replace images and urls for site transfer purposes rather than nulling urls for security
            $regex = '/https?\:\/\/[^\" \n]+/i';
            preg_match_all($regex, $text, $matches);

            $matches[0] = array_unique($matches[0]);

            foreach ($matches[0] as $url) {
                if (stripos($url, $exporter_url) !== false) {
                    if ($relative_url = str_replace($exporter_url, '', $url)) {
                        if (!empty($image_lookup[$relative_url])) {
                            $replace_image_arr = $image_lookup[$relative_url];

                            if (!empty($replace_image_arr['thumbnail_id'])) {
                                if ($new_attachment_id = $this->get_mapped_id($replace_image_arr['thumbnail_id'])) {
                                    if ($replace_image = wp_get_attachment_image_src($new_attachment_id, $replace_image_arr['image_size_name'])) {
                                        $text = str_ireplace($url, $replace_image[0], $text);
                                    }
                                }
                            }
                        } else {
                            //not an image or no replacement.
                            if ($path_info = pathinfo($relative_url)) { //check for a file extension.. we don't want one.
                                if (!isset($path_info['extension']) || !$path_info['extension']) { //no extension
                                    $abs_url = trailingslashit(site_url()) . ltrim($relative_url, '/');
                                    $text = str_replace($url, $abs_url, $text);
                                }
                            }
                        }
                    }
                }
            }

            return $text;
        }

        function handle_import_custom_css() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again
            if ($content = $this->get_file_content('custom_css.json')) {
                $css_return = wp_update_custom_css_post($content['css']);

                if (!is_wp_error($css_return)) {
                    $msgs[] = array('msg' => __('Custom CSS Set', 'sitepresser'), 'severity' => 'low');
                } else {
                    $msg = __('Custom CSS Set Failed:', 'sitepresser') . ' ' . $css_return->get_error_message();
                    $msgs[] = array('msg' => $msg, 'severity' => 'high');
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function handle_import_menu($menu_slug) {
            $importer_config = $this->file_summary_config();
            $importer_url = rtrim(site_url(), '/'); //we need this not to have a trailing slash to catch all urls
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->get_file_content('menus.json')) {
                if (isset($content['menus'][$menu_slug])) {
                    if (isset($content['nav_items'][$menu_slug])) {
                        //at this point we have converted the slug into the menu array and a list of items to process

                        $nav_items = $content['nav_items'][$menu_slug];
                        $menu = $content['menus'][$menu_slug];
                        $taxonomy = 'nav_menu';
                        $inserted_to_map = array();
                        $old_menu_term_id = $menu['old_term_id'];

                        if (!$menu_term_id = $this->get_mapped_term_id($old_menu_term_id)) {
                            $db_term = term_exists($menu['name'], $taxonomy, 0);

                            if (!$db_term && !is_wp_error($db_term)) {
                                if ($db_term = wp_insert_term($menu['name'], $taxonomy)) {
                                    if (!is_wp_error($db_term)) {
                                        $menu_term_id = $db_term['term_id'];
                                        $msgs[] = array(
                                            'msg'      => __('Menu Added', 'sitepresser') . ': ' . $this->prettify_log_output($menu['name']),
                                            'severity' => 'low'
                                        );

                                        update_term_meta($menu_term_id, 'eti_old_term_id', $menu['old_term_id']);
                                    } else {
                                        $success = false;
                                        $msgs[] = array(
                                            'msg'      => __('Failed to add menu', 'sitepresser') . ': ' . $this->prettify_log_output($menu['name']) . ' - ' . $db_term->get_error_message(),
                                            'severity' => 'high'
                                        );
                                    }
                                }
                            } else {
                                $menu_term_id = $db_term['term_id'];
                                $msgs[] = array('msg' => __('Menu Exists', 'sitepresser'), 'severity' => 'med');
                            }
                        } else {
                            $msgs[] = array('msg' => __('Menu Exists', 'sitepresser'), 'severity' => 'med');
                        }

                        //and now for the items
                        if ($menu_term_id) { //only if we have inserted or retrieved the menu id
                            foreach ($nav_items as $old_post_id => $nav_item) {
                                $item_insert = $this->handle_import_pt_object($nav_item, $old_post_id);

                                if (isset($item_insert['post_id']) && $item_insert['post_id']) {
                                    //potentially also check $item_insert['existing'] if this becomes too arduous and log heavy. or silence logs perhaps
                                    $inserted_to_map[$old_post_id] = $item_insert['post_id'];
                                }

                                $msgs[] = $item_insert; //for the message itself.
                            }

                            if (count($inserted_to_map) > 0) {
                                //link meta parents up and attach all to menu
                                foreach ($inserted_to_map as $old_post_id => $new_post_id) {
                                    $old_object = $nav_items[$old_post_id];
                                    $old_meta = $old_object['meta'];

                                    //link to menu
                                    wp_set_object_terms($new_post_id, array((int)$menu_term_id), 'nav_menu', true);

                                    //remap parent id - PT NOT TERM
                                    if (isset($old_meta['_menu_item_menu_item_parent']) && $old_meta['_menu_item_menu_item_parent']) {
                                        if ($new_object_id = $this->get_mapped_id($old_meta['_menu_item_menu_item_parent'])) {
                                            update_post_meta($new_post_id, '_menu_item_menu_item_parent', $new_object_id);
                                        }
                                    }

                                    //remap custom url
                                    if (isset($old_meta['_menu_item_url']) && $old_meta['_menu_item_url']) {
                                        if ($new_value = str_replace(rtrim($importer_config['exporter_url'], '/'), $importer_url, $old_meta['_menu_item_url'])) {
                                            if ($new_value != $old_meta['_menu_item_url']) {
                                                update_post_meta($new_post_id, '_menu_item_url', $new_value);
                                            }
                                        }
                                    }

                                    //set meta links up
                                    if (isset($old_meta['_menu_item_type']) && $old_meta['_menu_item_type']) {
                                        if (isset($old_meta['_menu_item_object_id']) && $old_meta['_menu_item_object_id']) {

                                            if ($old_meta['_menu_item_type'] == 'taxonomy') { //it's a term
                                                $new_object_id = $this->get_mapped_term_id($old_meta['_menu_item_object_id']);
                                            } else { //it's a PT
                                                $new_object_id = $this->get_mapped_id($old_meta['_menu_item_object_id']);
                                            }

                                            //was there a result and was there a change?
                                            if ($new_object_id && $new_object_id != $old_meta['_menu_item_object_id']) {
                                                update_post_meta($new_post_id, '_menu_item_object_id', $new_object_id);
                                            }

                                        }
                                    }
                                }
                            }

                            if (isset($content['theme_locations']) && $content['theme_locations']) {
                                if (is_array($content['theme_locations'])) {
                                    $existing_locs = get_theme_mod('nav_menu_locations', array());
                                    $changed = false;

                                    foreach ($content['theme_locations'] as $loc_name => $old_linked_menu) {
                                        if ($old_menu_term_id == $old_linked_menu) {
                                            if (!isset($existing_locs[$loc_name]) || $existing_locs[$loc_name] != $menu_term_id) {
                                                $existing_locs[$loc_name] = $menu_term_id; //set the linked menu to the new menu id
                                                $changed = true;
                                            }

                                            break;
                                        }
                                    }

                                    if ($changed) {
                                        $msgs[] = array(
                                            'msg'      => __('Linked Menu to location', 'sitepresser') . ': ' . $this->prettify_log_output($loc_name),
                                            'severity' => 'low'
                                        );

                                        set_theme_mod('nav_menu_locations', $existing_locs);
                                    } else {
                                        $msgs[] = array(
                                            'msg'      => __('Menu already linked to location', 'sitepresser') . ': ' . $this->prettify_log_output($loc_name),
                                            'severity' => 'med'
                                        );
                                    }
                                }
                            }
                        }

                    }
                }
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function get_image_lookup() {
            global $eti_image_lookup;

            if (!$eti_image_lookup) {
                if ($content = $this->get_file_content('content.json')) {
                    if (isset($content['image_lookup'])) {
                        $eti_image_lookup = $content['image_lookup'];
                    }
                }
            }

            return $eti_image_lookup;
        }

        function remap_post_meta($post_id) {
            if ($images = get_post_meta($post_id, '_rl_images', true)) { //responsive lightbox & gallery plugin
                if (!empty($images['media']['attachments']['ids']) && is_array($images['media']['attachments']['ids'])) {
                    foreach ($images['media']['attachments']['ids'] as &$attachment_id) {
                        if ($new_attachment_id = $this->get_mapped_id($attachment_id)) {
                            $attachment_id = $new_attachment_id;
                        }
                    }

                    update_post_meta($post_id, '_rl_images', $images);
                }
            }
        }

        function import_complete_mop_up() {
            global $eti_imported_ids, $eti_import_map;

            foreach ($eti_imported_ids as $old_post_id => $post_id) {
                $this->remap_post_meta($post_id);

                if ($item = get_post($post_id)) {
                    $new_parent = ($item->post_parent ? $this->get_mapped_id($item->post_parent) : 0);
                    $new_content = $this->post_content($item->post_content, $post_id, true);

                    //update the content if necessary
                    if ($new_content != $item->post_content) {
                        $updated_post = array(
                            'ID'           => $item->ID,
                            'post_content' => $new_content
                        );
                        wp_update_post($updated_post);
                    }

                    //update the parent id if necessary
                    if ($new_parent != $item->post_parent) {
                        $updated_post = array(
                            'ID'          => $item->ID,
                            'post_parent' => $new_parent
                        );
                        wp_update_post($updated_post);
                    }
                }
            }

            //remap parent/child relationships if set
            /*if (!empty($eti_import_map['children'])) {
                foreach ($eti_import_map['children'] as $new_parent_id => $children) {
                    foreach ($children as $old_child_id) {
                        if ($new_child_id = $this->get_mapped_id($old_child_id)) { //if we have the id stored then get it
                            $this->set_parent($new_child_id, $new_parent_id);      //set the parent to the new id to match up the hierarchy
                        }
                    }
                }
            }*/
        }

        function post_content($post_content, $post_id, $mop_up_pass = false) {

            if ($mop_up_pass) {
                if (!$remapped = get_post_meta($post_id, 'eti_remapped', true)) {
                    $remapped = array();
                }

                //process out shortcodes. where id is used we assume it is a post id.
                // @todo: examine the logic in case an ID relates to a term_id or something else. id is too generic
                $shortcode_atts = array_unique(apply_filters('eti_remap_keys', array('id', 'ids', 'attachment_id')));

                foreach ($shortcode_atts as $shortcode_att) {
                    if (!in_array($shortcode_att, $remapped)) {
                        preg_match_all('/' . $shortcode_att . '="([^"]*)"/', $post_content, $matches);

                        if (isset($matches[1]) && count($matches[1]) > 0) {
                            foreach ($matches[1] as $layout_ids) {
                                if ($layout_ids_arr = explode(',', $layout_ids)) {
                                    $layout_ids_new = array();
                                    foreach ($layout_ids_arr as $layout_id) {
                                        if ($layout_id) {
                                            if ($new_layout_id = $this->get_mapped_id($layout_id)) {
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

                update_post_meta($post_id, 'eti_remapped', $remapped);
            }

            /*$term_shortcode_atts = array( 'include_categories' );

            foreach ( $term_shortcode_atts as $shortcode_att ) {
                preg_match_all( '/' . $shortcode_att . '="([^"]*)"/', $post_content, $matches );

                if ( isset( $matches[1] ) && count( $matches[1] ) > 0 ) {
                    foreach ( $matches[1] as $term_ids ) {
                        if ( $term_ids = explode( ',', $term_ids ) ) {
                            foreach ( $term_ids as $term_id ) {
                                if ( $term_id ) {
                                    if ( $new_term_id = $this->get_mapped_term_id( $term_id ) ) {
                                        $post_content = str_replace( $term_id, $new_term_id, $post_content );
                                    }
                                }
                            }
                        }
                    }
                }
            }*/

            //replace out urls.. this is limited to page, post, product and project for now but may get more intelligent later
            $post_content = $this->replace_urls_in_string($post_content);

            //add additional function to remove calls to certain js? not 100% necessary at this stage but thoughts for later for sure!

            return $post_content;
        }

        function handle_import_pt_object($post, $old_post_id = false) {
            global $eti_import_map, $eti_imported_ids;

            $severity = 'low';
            $importer_config = $this->file_summary_config();
            $image_lookup = $this->get_image_lookup();
            $post_id = false;
            $existing = false;
            $meta_blacklist = array('eti_old_post_id', 'eti_remapped');

            if ($data = @$post['data']) { //phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
                $post_type_label = ucwords(str_replace('_', ' ', $data['post_type']));

                if (!$post_id = $this->get_mapped_id($old_post_id)) {
                    $post_content = $data['post_content'];

                    //replacing out the internal images
                    if ($image_lookup) {
                        if ($post_images = @$post['images']) { //phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
                            foreach ($post_images as $image_url) {
                                $relative_image_url = str_replace($importer_config['exporter_url'], '', $image_url);

                                if (isset($image_lookup[$relative_image_url])) {
                                    $replace_image_arr = $image_lookup[$relative_image_url];
                                    if ($new_attachment_id = $this->get_mapped_id($replace_image_arr['thumbnail_id'])) {
                                        if ($replace_image = wp_get_attachment_image_src($new_attachment_id, $replace_image_arr['image_size_name'])) {
                                            $post_content = str_ireplace($image_url, $replace_image[0], $post_content);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //END replacing out the internal images

                    $post_data = array(
                        'post_content' => apply_filters('eti_post_content', $post_content, $post_id),
                        'post_title'   => $data['post_title'],
                        'post_excerpt' => $data['post_excerpt'],
                        'post_status'  => $data['post_status'],
                        'post_name'    => $data['post_name'],
                        'post_type'    => $data['post_type'],
                        'post_parent'  => $data['post_parent'],
                        'post_date'    => $data['post_date'],
                        'menu_order'   => $data['menu_order']
                    );

                    if ($post_id = wp_insert_post($post_data)) {
                        $label = ($data['post_title'] ? '<a href="' . get_permalink($post_id) . '">' . $this->prettify_log_output($data['post_title']) . '</a>' : $this->prettify_log_output('ID: ' . $post_id));
                        $msg = 'Imported ' . $post_type_label . ': ' . $this->prettify_log_output($label);

                        update_post_meta($post_id, 'eti_old_post_id', $old_post_id);

                        $existing = true; //so on the other end we can determine whether this was just added or not

                        if ($meta = $post['meta']) {
                            foreach ($meta as $key => $value) {
                                if (in_array($key, $meta_blacklist)) {
                                    continue;
                                }

                                if (is_serialized($value)) {
                                    if ($value_obj = @unserialize($value)) { // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                        $value = $value_obj;
                                    } else if ($value_obj = @unserialize(wp_unslash($value))) { // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                        $value = $value_obj;
                                    }
                                }

                                if ($key == '_thumbnail_id') {
                                    if (isset($eti_import_map['image_ids'][$value])) {
                                        $value = $eti_import_map['image_ids'][$value]; //add media, check the import map
                                    } else if ($old_image_id = $this->get_mapped_id($value)) {
                                        $value = $old_image_id;
                                    } else {
                                        $value = false; //clear it so we don't get a broken link
                                    }
                                } else {
                                    $value = apply_filters('eti_pt_import_meta_' . sanitize_title($data['post_type']), $value, $key, $post_id, $old_post_id); //for targeted replacement of meta
                                    $value = apply_filters('eti_pt_import_meta', $value, $key, $post_id, $old_post_id, $data['post_type']);                   //for blanket rules. not recommended
                                }

                                if ($value) {
                                    update_post_meta($post_id, $key, $value);
                                }
                            }
                        }

                        if ($meta = $post['meta_multi']) {
                            foreach ($meta as $key => $values) {
                                foreach ($values as $value) {
                                    $old_val = $value;

                                    if (is_serialized($value)) {
                                        if ($value_obj = @unserialize($value)) { // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                            $value = $value_obj;
                                        } else if ($value_obj = @unserialize(wp_unslash($value))) { // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions
                                            $value = $value_obj;
                                        }
                                    }

                                    $value = apply_filters('eti_pt_import_meta_' . sanitize_title($data['post_type']), $value, $key, $post_id, $old_post_id);
                                    $value = apply_filters('eti_pt_import_meta', $value, $key, $post_id, $old_post_id, $data['post_type']);

                                    if ($value) {
                                        delete_post_meta($post_id, $key, $old_val);
                                        add_post_meta($post_id, $key, $value);
                                    }
                                }
                            }
                        }

                        if (isset($post['taxonomy'])) {
                            if ($tags = $post['taxonomy']) {
                                foreach ($tags as $unused => $terms) {
                                    foreach ($terms as $term) {
                                        if ($term['term_id']) {
                                            $this->set_tax_term($term, $data['post_type'], $post_id);
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($post['children']) && count($post['children']) > 0) {
                            //store the new id and a list of the OLD child ids
                            $eti_import_map['children'][$post_id] = $post['children'];

                            /*foreach ($post['children'] as $old_child_id) {
                                if ($new_child_id = $this->get_mapped_id($old_child_id)) {
                                    $this->set_parent($new_child_id, $post_id); //set the parent to the new id to match up the hierarchy
                                }
                            }*/
                        }

                        do_action('eti_pt_item_import', $post_id, $data['post_type']);
                        do_action('eti_' . $data['post_type'] . '_item_import', $post_id);
                    } else {
                        $msg = __('Failed Importing', 'sitepresser') . ' ' . $post_type_label . ' "' . $data['post_title'] . '"';
                        $severity = 'high';
                    }
                } else {
                    $label = ($data['post_title'] ? '<a href="' . get_permalink($post_id) . '">' . $data['post_title'] . '</a>' : __('ID', 'sitepresser') . ': ' . $post_id);
                    $msg = __('Skipped Importing content as it was imported previously', 'sitepresser') . '. ' . $post_type_label . ' ' . $this->prettify_log_output($label);
                    $severity = 'med';
                }
            } else {
                $severity = 'med';
                $msg = __('No data to import for this post item', 'sitepresser');
            }

            $eti_imported_ids[$old_post_id] = $post_id; //save the id for processing later

            return array('msg' => $msg, 'severity' => $severity, 'post_id' => $post_id, 'existing' => $existing);
        }

        function set_tax_term($term, $pt = 'post', $post_id = false) {
            global $eti_import_map;

            $old_term_id = $term['term_id'];
            $taxonomy = $term['taxonomy'];
            $name = $term['name'];
            //$parent = $term['parent']; //unused for now

            if (!isset($eti_import_map['taxonomies'][$old_term_id])) {
                if (!taxonomy_exists($taxonomy)) {
                    register_taxonomy($taxonomy, $pt);
                }

                $db_term = term_exists($name, $taxonomy, 0); //parent will feature here in a future version

                if (!$db_term && !is_wp_error($db_term)) {
                    if ($db_term = wp_insert_term($name, $taxonomy)) {
                        if (!is_wp_error($db_term)) {
                            update_term_meta($db_term['term_id'], 'eti_old_term_id', $old_term_id);
                        }
                    }
                }

                if (isset($db_term['term_id'])) {
                    $eti_import_map['taxonomies'][$old_term_id] = (int)$db_term['term_id'];
                }
            }

            if ($post_id) {
                wp_set_object_terms($post_id, $eti_import_map['taxonomies'][$old_term_id], $taxonomy, true);
            }
        }

        function set_parent($post_id, $new_parent_id) {
            global $wpdb;

            $sql_pattern = 'UPDATE ' . $wpdb->posts . ' 
                            SET post_parent = %d 
                            WHERE ID = %d';

            $wpdb->query(
                $wpdb->prepare(
                    $sql_pattern, array( // phpcs:ignore WordPress.DB
                                         (int)$new_parent_id,
                                         (int)$post_id
                                )
                )
            );
        }

        function handle_prerequisite_check() {
            $msgs = array();
            $success = true;

            $theme_summary = $this->file_summary_themes();
            $installed_themes = wp_get_themes();

            $plugin_summary = $this->file_summary_plugins();

            if (isset($theme_summary['theme']['prereq']) && $theme_summary['theme']['prereq']) {
                //check for theme presence
                if (in_array($theme_summary['theme']['name'], array_keys($installed_themes))) {
                    $msgs[] = array(
                        'msg'      => __('Theme required and IS present', 'sitepresser') . ': ' . $this->prettify_log_output($theme_summary['theme']['name']),
                        'severity' => 'low'
                    );
                } else {
                    $msgs[] = array(
                        'msg'      => __('Theme required and IS NOT present. Please re-run this importer after installing', 'sitepresser') . ' ' . $this->prettify_log_output($theme_summary['theme']['name']),
                        'severity' => 'high'
                    );
                    $success = false;
                }
            }
            if (isset($theme_summary['parent_theme']['prereq']) && $theme_summary['parent_theme']['prereq']) {
                //check for theme presence
                if (in_array($theme_summary['parent_theme']['name'], array_keys($installed_themes))) {
                    $msgs[] = array(
                        'msg'      => __('Theme required and IS present', 'sitepresser') . ': ' . $this->prettify_log_output($theme_summary['parent_theme']['name']),
                        'severity' => 'low'
                    );
                } else {
                    $msgs[] = array(
                        'msg'      => __('Theme required and IS NOT present. Please re-run this importer after installing', 'sitepresser') . ': ' . $this->prettify_log_output($theme_summary['parent_theme']['name']),
                        'severity' => 'high'
                    );
                    $success = false;
                }
            }

            if (isset($plugin_summary['not_in_repo'])) {
                foreach ($plugin_summary['not_in_repo'] as $plugin) {
                    if (isset($plugin['prereq']) && $plugin['prereq']) {
                        //check for plugin presence
                        if ($plugin_path = $this->is_plugin_present($plugin['slug'])) {
                            $msgs[] = array(
                                'msg'      => __('Plugin required and IS present', 'sitepresser') . ': ' . $this->prettify_log_output($plugin['name']),
                                'severity' => 'low'
                            );
                        } else {
                            $msgs[] = array(
                                'msg'      => __('Plugin required and IS NOT present. Please re-run this importer after installing', 'sitepresser') . ': ' . $this->prettify_log_output($plugin['name']),
                                'severity' => 'high'
                            );
                            $success = false;
                        }
                    }
                }
            }

            if ($success) { //generic feedback if no issues
                $msgs[] = array(
                    'msg'      => __('Check complete. No issues found', 'sitepresser'),
                    'severity' => 'low'
                );
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

        function handle_import_taxonomies($taxonomies) {
            foreach ($taxonomies as $taxonomy => $terms) {
                foreach ($terms as $term) {
                    if (!empty($term['term_id']) && is_numeric($term['term_id'])) {
                        $this->set_tax_term($term);
                    }
                }
            }
        }

        function handle_import_content() {
            $msgs = array();
            $success = true; //defaults to true because this can be re-run without having to reload every one again

            if ($content = $this->get_file_content('content.json')) {
                //bin hello world post as it'll mess up any blog feeds in demo themes
                if ($defaultPost = get_posts(array('title' => __('Hello World!')))) {
                    if (isset($defaultPost[0])) {
                        wp_delete_post($defaultPost[0]->ID, true);
                    }
                }

                do_action('eti_pre_import_taxonomies');

                if (isset($content['taxonomies'])) {
                    $this->handle_import_taxonomies($content['taxonomies']);
                }

                do_action('eti_pre_import_content');

                foreach ($content as $post_type => $posts) {
                    if (in_array($post_type, array('attachment', 'image_lookup', 'taxonomies'))) {
                        continue;
                    }

                    foreach ($posts as $old_post_id => $post) {
                        $msgs[] = $this->handle_import_pt_object($post, $old_post_id);
                    }
                }

                do_action('eti_post_import_content');
            }

            return array('success' => $success, 'log' => $msgs, 'debug' => '');
        }

    }
}

$eti = new eti_siteimporter(__FILE__, 'Molti Ecommerce');
