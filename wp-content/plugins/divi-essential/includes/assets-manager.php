<?php

namespace Divi_Essential\Includes;

defined( 'ABSPATH' ) || die();

class AssetsManager {

        public function __construct(){

        add_action('wp_enqueue_scripts', array($this, 'dnxte_enqueue_assets'));

        add_action('wp_enqueue_scripts', array($this, 'dnxte_enqueue_style_for_builder'));

        add_action('admin_enqueue_scripts', array($this, 'dnxte_admin_enqueue_assets'));

        add_action('plugins_loaded', array($this, 'i18n'));
    }

    public function get_styles() {
        return array(
            'dnext_reveal_animation'         =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/reveal-animation.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_hvr_common_css'      =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/hover-common.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_msnary_hvr_css'  => array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/msnary-hvr-css.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_msnary_filterbar_css'  => array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/msnary-filterbar.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_twentytwenty_css'    =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/twentytwenty.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_swiper-min-css'          =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/swiper.min.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_magnify_css'         =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/magnify.min.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_magnific_popup'  =>  array(
                'src'               =>  plugin_dir_url(__FILE__) . '../styles/magnific-popup.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
        );
    }

    public function get_scripts() {
        return array(
            'dnext_wow-public'      =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/wow.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_wow-activation'      =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/wow-activation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array(),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_svg_shape_frontend'   =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/shape.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_swiper_frontend'      =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/swiper.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnxt_divinexttexts-public'=>  array(
                'src'           =>  plugin_dir_url(__FILE__) . 'modules/NextTextAnimation/dnxt-text-animation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnxtblrb_divinextblurb-public'       =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '.././scripts/vanilla-tilt.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_default_value'=>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/default-value.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  true,
                'piroty'        =>  true
            ),
            'dnext_bodymovin'   =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/bodymovin.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_magnific_popup'   =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/magnific-popup.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_coverflow_lightbox'   =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/coverflow_lightbox.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_imagesloaded'=>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/imagesloaded.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  true,
                'piroty'        =>  true
            ),
            'dnext_isotope'=>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/isotope.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_magnifier'   =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/magnify.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_facebook_sdk'=>  array(
                'src'           =>  "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0",
                'version'       =>  '',
                'deps'          =>  '',
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_twitter_widgets'     =>  array(
                'src'           =>  "https://platform.twitter.com/widgets.js",
                'version'       =>  '',
                'deps'          =>  '',
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_event_move'  =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/event-move.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_twentytwenty_js'=>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/twentytwenty.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_scripts-public'     =>  array(
                'src'           =>  plugin_dir_url(__FILE__) . '../scripts/scripts.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            )
        );
    }

    public function dnxte_enqueue_assets() {

        $styles     = $this->get_styles();

        $scripts    = $this->get_scripts();

        foreach ($styles as $handle => $style ) {

            $deps       = isset( $style['deps'] ) ? $style['deps']  : false;

            if ( $style['enqueue'] ) {

                wp_enqueue_style(   $handle, $style['src'], $deps, $style['version'] );

            }elseif ( $style['enqueue'] == false ) {
                wp_register_style(  $handle, $style['src'], $deps, $style['version'] );
            }
        }

        foreach ($scripts as $handle => $script ) {

            $deps   = isset( $script['deps'] ) ? $script['deps']  : false;

            if ( $script['enqueue'] ) {

                wp_enqueue_script(  $handle, $script['src'], $deps, $script['version'], $script['piroty'] );

            }elseif ( $script['enqueue'] == false ) {

                wp_register_script(  $handle, $script['src'], $deps, $script['version'], $script['piroty'] );

            }
        }
    }

    public function dnxte_admin_enqueue_assets() {

        wp_verify_nonce('dnext_admin_module_css');

        global $pagenow;

        if (("admin.php" === $pagenow) && (isset($_GET['page']) && 'et_theme_builder' === $_GET['page'])) {
            $src = plugin_dir_url(__FILE__) . '../styles/admin-module.css';
            wp_enqueue_style('dnext_admin_module_css', $src, array(), DIVI_ESSENTIAL_VERSION, 'all');
        }
    }

    public function dnxte_enqueue_style_for_builder(){
        if ( function_exists( 'et_core_is_fb_enabled' ) ) {
			if ( et_core_is_fb_enabled() ) {
                $src = plugin_dir_url(__FILE__) . '../assets/admin/css/admin.css';
				wp_enqueue_style( 'dnext_admin_module_css_for_builder', $src, array(), DIVI_ESSENTIAL_VERSION, 'all' );
			}
		}
    }

    public function i18n(){
        load_plugin_textdomain( 'dnxte-divi-essential',false ,plugin_dir_path(__FILE__) . '/languages/');
    }
}