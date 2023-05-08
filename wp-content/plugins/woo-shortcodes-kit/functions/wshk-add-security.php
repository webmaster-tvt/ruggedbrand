<?php

//Since 1.6.6 - updated v.1.9.1

//BLOCK USERS ACCESS TO WP-ADMIN & WP-LOGIN-PHP + CUSTOM REDIRECTION

//If you want block the access to this urls and redirect to the custom login form, just need activate this function. Can be used with the WooCommerce's custom myaccount shortcode and with your custom myaccount page.

$getenablesloginsec = get_option('wshk_enablesloginsec');
if ( isset($getenablesloginsec) && $getenablesloginsec =='20')
    {   

    function wshk_redirect_custom_account_page(){
    
        // Get the user current page
        $blockadmredirect = get_option('wshk_blockadmredirect');
        $page_viewed = basename( $_SERVER['REQUEST_URI'] );
    
        // Get permalink to the account page
        
        $caccount_page  = get_permalink( get_option('woocommerce_myaccount_page_id') );
          
    	/* Check if a non logged in user is trying to view wp-login.php */
    	
    	global $pagenow;
        if ($pagenow == 'wp-login.php' && !is_user_logged_in())
            {
                if(get_option('wshk_blockadmredirect') !='') {
                // Redirect
                wp_redirect( $blockadmredirect );
                exit();
                } else {
                    // Redirect
                wp_redirect( $caccount_page );
                exit(); 
                }
            }
    
        // Block wp-login for logged in users
        if( $page_viewed == "wp-login.php" && is_user_logged_in()) {
             if(get_option('wshk_blockadmredirect') !='') {
                // Redirect
                wp_redirect( $blockadmredirect );
                exit();
                } else {
                    // Redirect
                wp_redirect( $caccount_page );
                exit(); 
                }
        }
        
         
    }
    
    add_action( 'init','wshk_redirect_custom_account_page' );
}



//Since 1.6.6 - Updated 1.7.5 - v.1.9.1

//BLOCK USERS ACCES TO THE BACKEND FROM THE TOP ADMIN BAR

//If you want block the access via admin top bar to the non admins users, just need activate this function.

$getenablesadminbar = get_option('wshk_enablesadminbar');
if ( isset($getenablesadminbar) && $getenablesadminbar =='21')
    {   

    function wshk_hide_admin_bar_if_non_admin( $show ) {
        $user = wp_get_current_user();
        $role = $user->roles[0];
        if ( ! current_user_can( 'administrator' ) ) $show = false;
        elseif ( $role == 'shop-manager' ) $show = true;
        elseif ( $role == 'editor' ) $show = true;
        elseif ( $role == 'author' ) $show = true;
        return $show;
    }
     
    add_filter( 'show_admin_bar', 'wshk_hide_admin_bar_if_non_admin', 20, 1 );
}



//Since v.1.6.8 - updated v.1.9.1

//HIDE LOGIN ERRORS IN THE LOGIN FORM

//If you wont display the login errors while the user is loging, just need enable this function.

$getenablehidelogerror = get_option('wshk_enablehidelogerror');
if ( isset($getenablehidelogerror) && $getenablehidelogerror =='86')
    {

    function wshk_no_wordpress_errors(){
        $mycustomessageforlogin = get_option('wshk_hidelogerrorcustomessage');
        
      return $mycustomessageforlogin;
    }
    add_filter( 'login_errors', 'wshk_no_wordpress_errors' );
}



// Since 1.8.5 - updated v.1.9.1

//PREVENT SEND USERS ON WP UPDATES CHECK

$getnosendusers = get_option('wshk_nosendusers');
if ( isset($getnosendusers) && $getnosendusers =='1850')
    {

    add_action( 'wp_version_check', 'wshk_user_blog_count', 1 );
    
    function wshk_user_blog_count() {
       add_filter( 'pre_site_option_blog_count', '__return_zero' );
       add_filter( 'pre_site_option_user_count', '__return_zero' );
    }
}



//Since v.1.7.1 - Updated v.1.7.9 - v.1.9.1

//ADD SECURITY HEADERS IN YOUR WEBSITE

//If you wont let use your website in another website how a iframe and prevent the clickjacking attacks, just need enable this function.

$getenablesecheaders = get_option('wshk_enablesecheaders');
if ( isset($getenablesecheaders) && $getenablesecheaders =='95')
    {
    
    
    function wshk_add_security_headers() {
        
    // Enforce the use of HTTPS
	header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
	// Prevent Clickjacking
	header("X-Frame-Options: SAMEORIGIN");
	// Prevent XSS Attack
	header ("Content-Security-Policy: object-src 'none'; base-uri 'none';"); // FF 23+ Chrome 25+ Safari 7+ Opera 19+
	header("X-Content-Security-Policy: default-src 'self';"); // IE 10+
	// Block Access If XSS Attack Is Suspected
	header("X-XSS-Protection: 1; mode=block");
	// Prevent MIME-Type Sniffing
	header("X-Content-Type-Options: nosniff");
	// Referrer Policy
	header("Referrer-Policy: no-referrer-when-downgrade");
	// Feature Policy
    header("Feature-Policy: vibrate 'self'");
    }
    add_action( 'send_headers', 'wshk_add_security_headers' );
}


//Since v.1.9.6

//SSL VERIFY SOLUTION

add_filter( 'https_ssl_verify', '__return_true', PHP_INT_MAX );
add_filter( 'http_request_args', 'http_request_force_ssl_verify', PHP_INT_MAX );
 
function http_request_force_ssl_verify( $args ) {
 
        $args[ 'sslverify' ] = true;
        return $args;
}
?>