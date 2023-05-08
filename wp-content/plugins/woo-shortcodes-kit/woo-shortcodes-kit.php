<?php

/**
* Plugin Name: Woo Shortcodes Kit
* Plugin URI: https://disespubli.com/
* Description: Customize your WooCommerce store with more than 60 functions and shortcodes, ranging from the important points of your store such as: Access, My account page, shop page, thank you pages among others, to additional content to reinforce: as content restriction, adaptation to the new law of data protection, security, advanced user data, messages according to the number of orders among many more advantages. This plugin not work alone, you need install WooCommerce before.
* Author: Alberto G.
* Version: 2.0.2
* Tested up to: 5.9
* WC requires at least: 4.0
* WC tested up to: 6.4
* Author URI: https://disespubli.com/
* Text Domain: woo-shortcodes-kit
* Domain Path: /languages
* License: GPLv3
* URI: http://www.gnu.org/licenses/gpl-3.0.html

    Woo Shortcodes Kit is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.
 
    Woo Shortcodes Kit is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with Woocommerce Shortcodes Kit. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
  */

    //Let's go!
    
     if ( ! defined( 'ABSPATH' ) ) {
	    exit;
    }
    
    
    //Make sure WooCommerce is active - updated 1.9.6
    
    function woocommerce_wshk_missing_wc_notice() {
    	
    	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Woo Shortcodes Kit requires WooCommerce to be installed and active. You can download %s here.', 'woo-shortcodes-kit' ), '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
    }
    
    
    add_action( 'plugins_loaded', 'woocommerce_wshk_init' );
    function woocommerce_wshk_init() {
        
        if ( ! class_exists( 'WooCommerce' ) ) {
            add_action( 'admin_notices', 'woocommerce_wshk_missing_wc_notice' );
        	return;
        }
    }
    
    
    // Register admin menu
    
    add_action('admin_menu', 'register_woo_shortcodes_kit');
    if(!function_exists('register_woo_shortcodes_kit')):

	function register_woo_shortcodes_kit() {
    	add_submenu_page( 'woocommerce', 'Woo Shortcodes Kit', 'WSHK', 'manage_options', 'woo-shortcodes-kit', 'init_woo_shortcodes_kit_admin_page_html' ); 
	}
	endif;
	
	
	// Load translations
        
    add_action('plugins_loaded', 'wshk_load_textdomain');
    function wshk_load_textdomain() {
        load_plugin_textdomain( 'woo-shortcodes-kit', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
    }

    
	// Add settings link to plugin list page
	
    if(!function_exists('wshk_add_settings_link')):
        
        function wshk_add_settings_link( $links ) {
            $mysettingslink = __('Settings','woo-shortcodes-kit');
            $myratelink = __('Please rate the plugin','woo-shortcodes-kit');
            $myvideolink = __('Learn how work all the functions','woo-shortcodes-kit');
            $settings_link = array('<a href="admin.php?page=woo-shortcodes-kit"'.' title="'.$mysettingslink.'">' . __( 'Settings', 'woo-shortcodes-kit' ) . '</a>'.' | '.'<a href="https://wordpress.org/support/plugin/woo-shortcodes-kit/reviews/#new-post" target="_blank" title="'.$myratelink.'">' . __( 'Please rate the plugin', 'woo-shortcodes-kit' ) . '</a>'.' | '.'<a href="https://disespubli.com/docs/" target="_blank" title="'.$myvideolink.'">' . __( 'Learn how work all the functions', 'woo-shortcodes-kit' ) . '</a>');
            return array_merge( $links, $settings_link );;
        } 
	endif;
	
	
	
	$plugin = plugin_basename( __FILE__ );
	add_filter( "plugin_action_links_$plugin", 'wshk_add_settings_link' );
	

    // Register settings
    
    require plugin_dir_path( __FILE__ ).'settings/wshk-options.php';


    // Define plugin settings page html

	//if(!function_exists('init_woo_shortcodes_kit_admin_page_html')):
    if(!function_exists('init_woo_shortcodes_kit_admin_page_html')){
	function init_woo_shortcodes_kit_admin_page_html() {
	    
   
    // Settings page style
    
    require plugin_dir_path( __FILE__ ).'settings/wshk-settings-page.php';
    $wshk_pl = plugins_url();
    ?>

    <!-- HTML START -->

    <!-- page -->
    
    <div class="wshkpagebg">
        
 
    <!-- Header -->
    
    <div class="wshkheadertitle" style="width: 100%;background-color: #321A51; border: 1px solid #321A51; border-radius: 13px; padding: 20px;">
		
		<img class="wshkheadlogo" src="<?php echo $wshk_pl.'/woo-shortcodes-kit/images/new-wshk-2-dark-128.png'; ?>" />
         
        <h1 class="wshkplutitle"><span style="color: white;">Woo Shortcodes Kit <small>v.2.0.2</small></span></h1>
         
        <span class="wshkquerys"><?php  echo get_num_queries(); ?> <?php esc_html_e( 'Queries in', 'woo-shortcodes-kit' ); ?> <?php timer_stop(1); ?>  <?php esc_html_e( 'seconds', 'woo-shortcodes-kit' ); ?></span>
        
    </div>
    
 
    <!-- Start Options Form -->
 
    <form action="options.php" method="post" id="wshk-sidebar-admin-form">    
     &nbsp;
     <br />
 
    <!-- Navigation tabs -->
 
    <div id="wshk-tab-menu" style="width:100%;font-weight: 700;font-family: 'Roboto';">
     
     <a id="wshk-general" class="wshk-tab-links active" ><img src="<?php echo  plugins_url( 'images/newsett.png' , __FILE__ );?> " style="width: 48px; height: 48px; padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Settings', 'woo-shortcodes-kit' ); ?></span></a>
     
     
     <a  id="wshk-news" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/notification2.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;" ;><br /><span style="margin-left: -5px;"><?php esc_html_e( 'News', 'woo-shortcodes-kit' ); ?></span></a>
     

     <!--<a  id="wshk-languages" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/languageswshk.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Languages', 'woo-shortcodes-kit' ); ?></span></a>-->
     
     
     <a  id="wshk-recom" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/recomend.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;" ;><br /><span style="margin-left: -20px;"><?php esc_html_e( 'Recommended', 'woo-shortcodes-kit' ); ?></span></a>
     
     <a  id="wshk-contact" class="wshk-tab-links"><img src="<?php echo  plugins_url( 'images/newcont.png' , __FILE__ );?>" style="width: 48px; height: 48px;padding-bottom: 15px;"><span style="text-align: center;"><br /><?php esc_html_e( 'Contact', 'woo-shortcodes-kit' ); ?></span></a>

    </div>
 
 
    <!-- General Setting -->
    
    <div class="wshk-setting" id="flux">
      
    <br />
     
     <!-- Settings tab -->
     
    <div class="first wshk-tab" id="div-wshk-general">
        
        
    <!-- White box start -->
    
    <div class="wshkpagewhitebg">
        
        
    <!-- Settings info box -->
        
    <div class="wshkinfoboxes">
    
        <h2 class="wshkinfoboxtitle">
            <span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Functions and Shortcodes', 'woo-shortcodes-kit' ); ?>
        </h2>        
    
        <p class="wshkinfoboxdesc">
            
            <span><?php esc_html_e( 'Just need make a click in each section to view the functions and shortcodes.', 'woo-shortcodes-kit' ); ?>
            </span>
            <br />
            
            <span><?php esc_html_e( 'Enable & configure the functions.', 'woo-shortcodes-kit' ); ?>
            </span>
            
            <span style="color: #969696; font-size: 13px;font-style: italic;"> <?php esc_html_e( '(Some functions use a shortcode to be displayed in the Frontend)', 'woo-shortcodes-kit' ); ?>
            </span>
            
        </p>
    
    </div>
    
    <!-- END Settings info box-->
    

    <!-- Sections accordions -->
    
    <div class="pcontainer">
    <ul class="acc">
    
    
    <!-- Section one - ACCOUNT PAGE -->
    <li>
      
        <div class="acc_ctrl">
            <h3 class="wshksettitles">
              <span class="dashicons dashicons-buddicons-buddypress-logo"></span> <?php esc_html_e( 'ACCOUNT PAGE', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions related to build your custom account page from scratch', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
      
        <!-- Section one - Content -->
      
        <div class="acc_panel">
            <br /><br />
          
            <!-- Orders list shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/orders-list-sht-setting.php'; ?>
               
            <!-- Downloads list shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/downloads-list-sht-setting.php'; ?>
               
            <!-- Billing and shipping addresses shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/billing-and-shipping-addresses-sht-setting.php'; ?>
               
            <!-- Payment methods shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/payment-methods-sht-setting.php'; ?>
               
            <!-- Edit account shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/edit-account-sht-setting.php'; ?>
           
            <!-- dashboard shortcode -->
            <?php //require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/dashboard-sht-setting.php'; ?>
           
            <!-- Customer reviews shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/customer-reviews-sht-setting.php'; ?>
           
            <!-- Display WooCommerce notices -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/display-wc-notices-setting.php'; ?>
           
            <!-- Logout button with a shortcode-->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/logout-button-sht-setting.php'; ?>
           
            <!-- Login form shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/login-form-sht-setting.php'; ?>
           
            <!-- HIDE LOGIN ERROR MESSAGE -->
            <?php require plugin_dir_path( __FILE__ ).'settings/build-your-account-page/hide-login-errors-setting.php'; ?>
           
        </div>
    </li>
    <!-- END Section one - ACCOUNT PAGE -->
    
    
    <!-- Section two - USER DATA -->
    <li>
      
        <div class="acc_ctrl">
            <h3 class="wshksettitles">
                <span class="dashicons dashicons-admin-users"></span> <?php esc_html_e( 'USER DATA', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions related to display data about the user', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
      
        <!-- Section two - Content -->
      
        <div class="acc_panel">
            <br /><br />
        
            <!-- Username in menu title -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/username-in-menu-title-setting.php'; ?>
            
            <!-- User email shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/user-email-sht-setting.php'; ?>
            
            <!-- user gravatar image -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/user-gravatar-image-sht-setting.php'; ?>
               
            <!-- IP shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/user-ip-sht-setting.php'; ?>   
            
            <!-- Name and surname shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/username-and-surname-sht-setting.php'; ?>   
               
            <!-- Username shortcode -->  
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/username-sht-setting.php'; ?>
           
            <!-- Conditional message to the customer -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/conditional-message-setting.php'; ?>
               
            <!-- Display the user billing data separately -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/display-user-billing-data-setting.php'; ?>
           
            <!-- Display the user shipping data separately -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/display-user-shipping-data-setting.php'; ?>
           
            <!-- Customer purchased products loop -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/customer-purchased-products-loop-setting.php'; ?>
               
            <!-- Product purchases by current logged in user -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/product-purchases-by-current-user-setting.php'; ?>
           
            <!-- Customer purchased products counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/customer-purchased-products-counter-setting.php'; ?>
               
            <!-- Customer total orders counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/customer-total-orders-counter-setting.php'; ?>
           
            <!-- Customer total reviews counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/customer-total-reviews-counter-setting.php'; ?>
           
            <!--Display the user total spent according to the order status -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/display-user-total-spent-setting.php'; ?>
               
            <!--Display the user orders according to the status of the order -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/display-user-orders-by-status-setting.php'; ?>
            
            <!--Display the user role shortcode -->
            <?php require plugin_dir_path( __FILE__ ).'settings/user-data/user-role-sht-setting.php'; ?>
  
        </div>
    </li>
    <!-- END Section two - USER DATA -->
    
     
    <!-- Section three - SECURITY -->
    <li>
     
       <div class="acc_ctrl">
            <h3 class="wshksettitles">
               <span class="dashicons dashicons-shield"></span> <?php esc_html_e( 'SECURITY', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions related to enhance your website security', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
       
        <!-- Section three - Content -->
       
        <div class="acc_panel">
            <br /><br />
          
            <!-- Restrict content to users if they are not logged in -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/restrict-content-to-nonlogged-in-users-setting.php'; ?>
            
            <!-- Restrict content to users if they are logged in -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/restrict-content-to-logged-in-users-setting.php'; ?>
          
            <!--NO SEND USERS -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/wp-no-send-users-setting.php'; ?>
          
            <!-- BLOCK ADMIN TOP BAR -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/block-admintopbar-setting.php'; ?>
          
            <!-- BLOCK WP-ADMIN and WP-LOGIN ACCESS -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/block-wpadmin-login-setting.php'; ?>

            <!--SECURITY HEADERS -->
            <?php require plugin_dir_path( __FILE__ ).'settings/add-security-to-shop/security-headers-setting.php'; ?>
            
        </div>
    </li>
    <!-- END Section three - SECURITY --> 
  
  
    <!-- Section four - SHOP PAGE -->
    <li>
      
        <div class="acc_ctrl">
            <h3 class="wshksettitles">
                <span class="dashicons dashicons-store"></span> <?php esc_html_e( 'SHOP PAGE', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions related to customizing the store page or building a new one.', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
      
        <!-- Section four - Content -->
      
        <div class="acc_panel">
            <br /><br />
          
            <!-- Display only products of specifics categories -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/show-only-products-from-specific-cat-setting.php'; ?>
          
            <!-- Exclude products of specifics categories -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/exclude-products-from-specific-cat-setting.php'; ?>
        
            <!-- Display saving price and percentages on sale products -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/saving-price-and-percentages-onsale-products.php'; ?>
        
            <!-- products per page manager -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/products-per-page-manager-setting.php'; ?>
        
            <!-- Display max or min price on variable products -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/display-max-or-min-price-on-variableproducts-setting.php'; ?>
        
            <!-- Product Downloads/sales counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/product-downloads-sales-counter-setting.php'; ?>
       
            <!-- Total shop sales counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/total-shop-sales-counter-setting.php'; ?>
           
            <!-- Total shop sales amount counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/total-shop-sales-amount-counter-setting.php'; ?>
       
            <!-- Total products in the shop counter -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/total-shop-products-counter-setting.php'; ?>
       
            <!-- Display all products reviews where you want -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/display-all-the-products-reviews-setting.php'; ?>
        
            <!-- Conditional add to cart button for purchased products -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/conditional-add-to-cart-button.php'; ?>
            
            <!-- customize add to cart button by product type -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/change-add-to-cart-button-text-setting.php'; ?>
            
            <!-- Build a new shop page from scratch -->
            <?php require plugin_dir_path( __FILE__ ).'settings/customize-the-shop-page/build-a-new-shop-page-setting.php'; ?>
        
        </div>
    </li>
    <!--END section four - SHOP PAGE -->
    
    
    <!-- Section five - GDPR LAW-->
    <li>
     
        <div class="acc_ctrl">
            <h3 class="wshksettitles">
                <span class="dashicons dashicons-thumbs-up"></span> <?php esc_html_e( 'GDPR LAW', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions related to adapt your shop to respect the GDPR law', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
       
        <!-- Section five - Content -->
       
        <div class="acc_panel">
            <br /><br />
          
            <!-- GPRD law global settings --> 
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/global-settings-setting.php'; ?>
    
            <!-- GPRD law on blog comments -->
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/blog-comments-setting.php'; ?>
    
            <!-- GPRD law on checkout page -->
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/checkout-page-setting.php'; ?>
    
            <!-- GPRD law on WooCommerce reviews -->
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-reviews-setting.php'; ?>
    
            <!-- GPRD law in register form-->
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-register-form-setting.php'; ?>
    
            <!-- add custom terms and conditions -->   
            <?php require plugin_dir_path( __FILE__ ).'settings/adapt-to-gdpr-law/wc-terms-conditions-setting.php'; ?>
    
        </div>
    </li>
    <!--END Section five - GDPR LAW -->
   
   
    <!-- Section six - ADDITIONAL SETTINGS -->
    <li>
     
        <div class="acc_ctrl">
            <h3 class="wshksettitles">
                <span class="dashicons dashicons-admin-generic"></span> <?php esc_html_e( 'ADDITIONAL SETTINGS', 'woo-shortcodes-kit' ); ?>
            </h3>
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions to enhance the WooCommerce possibilities', 'woo-shortcodes-kit' ); ?>
            </p>
        </div>
       
        <!-- Section six - content -->
       
        <div class="acc_panel">
            <br /><br />
          
            <!-- autocomplete orders -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/autocomplete-virtual-orders-setting.php'; ?>
            
            <!-- Disable the new WooCommerce dashboard -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/disable-new-wc-dashboard-setting.php'; ?>
            
            <!-- Display product thumbnail in email order -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/product-thumbnail-in-email-order-setting.php'; ?>
            
            <!-- Product image in the order details -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/product-image-in-order-details-setting.php'; ?>
            
            <!-- Conditional menu -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/conditional-menu-setting.php'; ?>
            
            <!-- Shortcodes in menu titles -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/shortcodes-in-menu-titles-setting.php'; ?>
            
            <!-- custom thank you page -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/custom-thank-you-pages-setting.php'; ?>
            
            <!-- Change the return to shop button text -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/change-the-return-toshop-button-setting.php'; ?>
            
            <!-- Limit the number of products in the cart -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/limit-the-number-of-products-inthe-cart-setting.php'; ?>
            
            <!-- Skip cart and go straight to checkout page -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/skip-cart-and-goto-checkout-setting.php'; ?>
            
            <!-- Add name and surname fields in WC register form -->
            <?php require plugin_dir_path( __FILE__ ).'settings/wc-additional-settings/add-name-and-surname-fields-wc-register-form-setting.php'; ?>
    
        </div>
    </li>
    <!-- END Section six - ADDITIONAL SETTINGS -->
   
    

    <!-- PRO Sections - EMAB & WSHK PRO-->
    
    
    <?php
    
    // Since 1.6.6
    //CHECK IF EASY MY ACCOUNT BUILDER EXISTS
    
    if ( in_array( 'easy-myaccount-builder/easy-myaccount-builder-for-wshk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       /*include( ABSPATH . '/wp-content/plugins/easy-myaccount-builder/emab-settings.php' );*/
       include( WP_CONTENT_DIR .'/plugins/easy-myaccount-builder/emab-settings.php');
    }
        
    //Since 1.6.7
    //CHECK IF CUSTOM REDIRECTIONS EXISTS
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       /*include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/cusre-settings.php' );*/
       include( WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/cusre-settings.php');
    }
    
    ?>
    
    </ul>
    </div>
    <!-- END Section accordions -->
    
    </div>
    <br /><br /><br /><br />
    <!--END White box-->
    
        
    <center>
        <button class="probando" type="submit" id="toggle" onclick="click()"><img id="btnimg" class="wshksetimg" src="<?php echo  plugins_url( 'images/wshk-save-settings.png' , __FILE__ );?>" ;> <span id="btntx" class="wshksettextbtn"><?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?></span>
        </button>
    </center>
    
    <button title="<?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?>" class="probandote" type="submit" id="toggle" onclick="click()"><img id="btnimgo" class="wshksetimgo" src="<?php echo  plugins_url( 'images/wshk-save-settings.png' , __FILE__ );?>" ;> <span id="btntx" class="wshksettexto"><?php esc_html_e( 'SAVE SETTINGS', 'woo-shortcodes-kit' ); ?></span>
    </button>
    
    <?php settings_fields('wshk_options');?>
    
    </form>
    <!-- End Options Form -->
    
    <!-- Floating save settings button -->
    <script>
        
    var $window = $(window),
    $document = $(document),
    button = $('.probando');
    buttn = $('.probandote');

    button.css({
        opacity: 1
    });
    
    buttn.css({
        opacity: 1
    });

    $window.on('scroll', function () {
        if (($window.scrollTop() + $window.height()) == $document.height()) {
            
            button.stop(true).animate({
                opacity: 1
            }, 250);
            
            buttn.stop(true).animate({
                opacity: 0
            }, 250);
            
        } else {
            
            button.stop(true).animate({
                opacity: 0
            }, 250);
            
            buttn.stop(true).animate({
                opacity: 1
            }, 250);
            
        }
    });
        
    </script>
    <!-- END Floating save settings button -->
   
    </div>
    <!-- END Settings tab -->
   
   
    <!-- News - from v.1.8.0 -->
    <?php require plugin_dir_path( __FILE__ ).'sections/news-section.php'; ?>
   
    <!-- Languages -->
    <?php require plugin_dir_path( __FILE__ ).'sections/languages-section.php'; ?>
    
    <!-- recomends - from v.1.8.7 -->
    <?php require plugin_dir_path( __FILE__ ).'sections/recommends-section.php'; ?>
    
    <!-- Contact -->
    <?php require plugin_dir_path( __FILE__ ).'sections/contact-section.php'; ?>
    <?php
    
    	}
    //endif;
    //END - Define plugin settings page html
    }

    /*Hide admin notices on WSHK page*/
    if (isset($_GET['page']) && $_GET['page'] == 'woo-shortcodes-kit') {
    function hide_notices_dashboard() {
        global $wp_filter;
     
        if (is_network_admin() and isset($wp_filter["network_admin_notices"])) {
            unset($wp_filter['network_admin_notices']);
        } elseif(is_user_admin() and isset($wp_filter["user_admin_notices"])) {
            unset($wp_filter['user_admin_notices']);
        } else {
            if(isset($wp_filter["admin_notices"])) {
                unset($wp_filter['admin_notices']);
            }
        }
     
        if (isset($wp_filter["all_admin_notices"])) {
            unset($wp_filter['all_admin_notices']);
        }
    }
    add_action( 'admin_init', 'hide_notices_dashboard' );
    }

    /** add js into admin footer */
    if (isset($_GET['page']) && $_GET['page'] == 'woo-shortcodes-kit') {
       add_action('admin_footer','init_wshk_admin_scripts');
    }
    
    // Tabs style and script
    if(!function_exists('init_wshk_admin_scripts')):
    function init_wshk_admin_scripts()
    {
    wp_register_style( 'wshk_admin_style', plugins_url( 'css/wshk-admin-min.css',__FILE__ ) );
    wp_enqueue_style( 'wshk_admin_style' );
    
    echo $script='<script type="text/javascript">
        /* Protect WP-Admin js for admin */
        jQuery(document).ready(function(){
            jQuery(".wshk-tab").hide();
            jQuery("#div-wshk-general").show();
            jQuery(".wshk-tab-links").click(function(){
            var divid=jQuery(this).attr("id");
            jQuery(".wshk-tab-links").removeClass("active");
            jQuery(".wshk-tab").hide();
            jQuery("#"+divid).addClass("active");
            jQuery("#div-"+divid).fadeIn();
            });
            })
        </script>';
    }
    endif;

    /** Include class file **/
    
    //Updated v.1.7.8
    require plugin_dir_path( __FILE__ ).'wshk-class.php';
?>