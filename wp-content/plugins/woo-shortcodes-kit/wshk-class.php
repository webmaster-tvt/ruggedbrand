<?php

/*
 * Woo Shortcodes Kit
 * @get_cf7as_sidebar_options()
 * @get_cf7as_sidebar_content()
 * */
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function get_wshk_sidebar_options() {
		global $wpdb;
		$ctOptions = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE 'wshk_%'");				
		foreach ($ctOptions as $option) {
			$ctOptions[$option->option_name] =  $option->option_value;
		}
		return $ctOptions;	
	}

 
/*global $pluginOptionsVal;
$pluginOptionsVal=get_wshk_sidebar_options();*/

include_once(__DIR__ . '/functions/wshk-dynamic-navigation-menu.php');
include_once(__DIR__ . '/functions/wshk-customize-shop-page.php');
include_once(__DIR__ . '/functions/wshk-build-myaccount-page.php');
include_once(__DIR__ . '/functions/wshk-counters.php');
include_once(__DIR__ . '/functions/wshk-additional-shortcodes.php');
include_once(__DIR__ . '/functions/wshk-restrict-content.php');
include_once(__DIR__ . '/functions/wshk-wc-additional-settings.php');
include_once(__DIR__ . '/functions/wshk-adapt-to-gdpr.php');
include_once(__DIR__ . '/functions/wshk-add-security.php');



//SINCE v.1.6.6 
//CHECK IF EASY MY ACCOUNT BUILDER IS ACTIVE

if ( in_array( 'easy-myaccount-builder/easy-myaccount-builder-for-wshk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
       include( ABSPATH . '/wp-content/plugins/easy-myaccount-builder/emab-functions.php' );

        }


//Since v.1.6.8 
//CHECK IF CUSTOM REDIRECTIONS IS ACTIVE

//if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
        //include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/functions/wshk-woosubs-compat.php' );
    
        //include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/functions/wshk-woo-pro-templates.php' );

        //}
/*function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );*/