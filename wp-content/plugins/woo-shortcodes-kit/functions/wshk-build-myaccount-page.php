<?php

//Since v.1.6.6

//ORDERS LIST SHORTCODE
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_myorders]

//Since v.1.7.8 - v.1.9.1
    
$getenableorderscontrol = get_option('wshk_enableorderscontrol');
if ( isset($getenableorderscontrol) && $getenableorderscontrol =='140')
    {

    function wshk_newstyle_myorders() {
        /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
        
       
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            
            ob_start();
            if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                        
                //require ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/my-orders.php';
                require dirname( __DIR__ ) . '/mytemplates/my-orders.php';
                        
            } else {
                
                require dirname( __DIR__ ) . '/mytemplates/my-orders.php'; 
            }
        
        
            global $wp;
    
        if ( ! empty( $wp->query_vars ) ) {
            foreach ( $wp->query_vars as $key => $value ) {
                    
            // Ignore pagename param.
            
            if ( 'edit-address' === $key ) {
              continue;
            }
            
            if ( 'add-payment-method' === $key ) {
              continue;
            }
            
            //Since v.1.8.2 - v.1.9.1
        
            $getenablesubscriptionshortcode = get_option('wshk_enablesubscriptionshortcode');
            if ( isset($getenablesubscriptionshortcode) && $getenablesubscriptionshortcode =='3003')
                {
                    
                if ( 'view-subscription' === $key ) {
                  continue;
        
                }//Activar solo si se usa el shortcode
            }
            
            //Since v.1.9.3 - v.1.1.3 pro
            
            $getwebtoffeesubsht = get_option('wshk_enablewebtoffeesubsht');
            if ( isset($getwebtoffeesubsht) && $getwebtoffeesubsht =='3005')
                {
                    
                if ( 'view-subscription' === $key ) {
                  continue;
        
                }//Activar solo si se usa el shortcode
            }
            
            if ( 'payment-methods' === $key ) {
              continue;
            }
            
            if ( 'members-area' === $key ) {
                  continue;
                }
    
            if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
              do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
              return ob_get_clean();
              
            }
          }
        }
    
        // No endpoint found? Default to dashboard.
        /*wc_get_template( 'myaccount/', array(
          'current_user' => get_user_by( 'id', get_current_user_id() ),
        ) );*/
        return ob_get_clean();
        } 
    }
    add_shortcode ('woo_myorders', 'wshk_newstyle_myorders');
    
    //Sustituir plantilla del tema por la del plugin
    $disableorderstemplate = get_option('wshk_disableorderstemplate');
    if ( isset($disableorderstemplate) && $disableorderstemplate =='22092021')
    {
    /*add_filter( 'wc_get_template', 'wshk_cma_get_templatee', 10, 5 );*/
    } else {
        add_filter( 'wc_get_template', 'wshk_cma_get_templatee', 10, 5 );
    }
    function wshk_cma_get_templatee( $located, $template_name, $args, $template_path, $default_path ) {    
        if ( 'myaccount/view-order.php' == $template_name ) {
            $located = plugin_dir_path( __DIR__ ) . 'mytemplates/view-order.php';
        }
        
        return $located;
    }
    
}



//Since v.1.6.6 - updated v.2.0.0

//SHOW THE DOWNLOADS
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_mydownloads]

//Since v.1.7.8 - v.1.9.1

$getenablemydownloadsht = get_option('wshk_enablemydownloadsht');
if ( isset($getenablemydownloadsht) && $getenablemydownloadsht =='2000')
    {

    function wshk_newstyle_mydownloads() {
        /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            
            $downloadsoptionone = '1';
            
            ob_start();
            if ($downloadsoptionone == '1'){
                require dirname( __DIR__ ) . '/mytemplates/freedownloads.php';
            } elseif ($downloadsoptionone == '2') {
                require dirname( __DIR__ ) . '/mytemplates/my-downloads.php';
            }
            return ob_get_clean();
        }
    }
    add_shortcode ('woo_mydownloads', 'wshk_newstyle_mydownloads');
    
    //Sustituir plantilla del tema por la del plugin
    
    function wshk_downloads_get_template( $located, $template_name, $args, $template_path, $default_path ) {
        
            
            if ( 'myaccount/downloads.php' == $template_name ) {
                $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freedownloads.php';
            }
            
        return $located;
    }
    //Since 1.8.7
    add_filter( 'wc_get_template', 'wshk_downloads_get_template', 10, 5 );
}



//Since v.1.6.6 - updated v.2.0.0

//BILLING AND SHIPPING ADDRESSES SHORTCODE
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_myaddress]

//Since v.1.7.8 - v.1.9.1

$getenablemyaddressessht = get_option('wshk_enablemyaddressessht');
if ( isset($getenablemyaddressessht) && $getenablemyaddressessht =='2001')
    {

    function wshk_newstyle_myaddress() {
        /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
        
        if (  is_user_logged_in() && ( is_account_page() ) ) {
        
            ob_start();    
            
            if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                    
                require WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premmy-address.php';
            } else {
                
                require dirname( __DIR__ ) . '/mytemplates/freemy-address.php'; 
                }
        
            global $wp;
    
            if ( ! empty( $wp->query_vars ) ) {
                foreach ( $wp->query_vars as $key => $value ) {
                
                // Ignore pagename param.
                if ( 'view-order' === $key ) {
                  continue;
                }
            
                if ( 'add-payment-method' === $key ) {
                  continue;
                }
            
                if ( 'view-subscription' === $key ) {
                  continue;
                }
            
                if ( 'payment-methods' === $key ) {
                  continue;
                }
                
                if ( 'members-area' === $key ) {
                  continue;
                }
    
                if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
                  //ob_start();
                  do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
                  //return ob_get_clean();
                    }
                }
            }
    
            // No endpoint found? Default to dashboard.
            /* wc_get_template( 'myaccount/', array(
              'current_user' => get_user_by( 'id', get_current_user_id() ),
            ) );*/
            return ob_get_clean();    
        }
    
    }
    add_shortcode ('woo_myaddress', 'wshk_newstyle_myaddress');
    
    //Sustituir plantilla del tema por la del plugin
    
    function wshk_addresses_get_template( $located, $template_name, $args, $template_path, $default_path ) {
        
        if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
            
            if ( 'myaccount/my-address.php' == $template_name ) {
                $located = WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premmy-address.php';
            }
            
            if ( 'myaccount/form-edit-address.php' == $template_name ) {
                $located = WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premform-edit-address.php';
            }
        }
        
        else {
            
            if ( 'myaccount/my-address.php' == $template_name ) {
                $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freemy-address.php';
            }
            
            if ( 'myaccount/form-edit-address.php' == $template_name ) {
                $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freeform-edit-address.php';
            }
            
        }
            
        
        return $located;
    }
    /*Since 1.8.7*/
    add_filter( 'wc_get_template', 'wshk_addresses_get_template', 10, 5 );
    
}



//Since v.1.6.6 - updated v.2.0.0

//PAYMENT METHODS SHORTCODE
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_mypayment]


//Since v.1.7.8 - v.1.9.1

$getenablemypaymentsht = get_option('wshk_enablemypaymentsht');
if ( isset($getenablemypaymentsht) && $getenablemypaymentsht =='2002')
    {

    function wshk_newstyle_mypayment() {
        
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            
            ob_start();
            if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                
                require WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/prempayment-methods.php';
                
            } else {
                
                require dirname( __DIR__ ) . '/mytemplates/freepayment-methods.php';
            }
            
            ?><br /><br /><br /><br /><?php
        
            global $wp;
    
            if ( ! empty( $wp->query_vars ) ) {
                
                foreach ( $wp->query_vars as $key => $value ) {
                  
                    // Ignore pagename param.
            
                    if ( 'edit-address' === $key ) {
                      continue;
                    }
                    
                    if ( 'view-order' === $key ) {
                      continue;
                    }
                    
                    if ( 'view-subscription' === $key ) {
                      continue;
                    }
                    
                    if ( 'payment-methods' === $key ) {
                      continue;
                    }
                    
                    if ( 'members-area' === $key ) {
                  continue;
                }
            
                    if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
                        //ob_start();
                      do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
                      return ob_get_clean();
                    }
                }
            }
            
            // No endpoint found? Default to dashboard.
            /* wc_get_template( 'myaccount/', array(
              'current_user' => get_user_by( 'id', get_current_user_id() ),
            ) );*/
            return ob_get_clean();
        }
    }
    add_shortcode ('woo_mypayment', 'wshk_newstyle_mypayment');
    
    
    //Sustituir plantilla del tema por la del plugin
    
    function wshk_payments_get_template( $located, $template_name, $args, $template_path, $default_path ) {
        
        if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
            
            if ( 'myaccount/form-add-payment-method.php' == $template_name ) {
                $located = WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premform-add-payment-method.php';
            }
            
            if ( 'myaccount/payment-methods.php' == $template_name ) {
                $located = WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/prempayment-methods.php';
            }
        }
        
        else {
            
            if ( 'myaccount/form-add-payment-method.php' == $template_name ) {
                $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freeform-add-payment-method.php';
            }
            
            if ( 'myaccount/payment-methods.php' == $template_name ) {
                $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freepayment-methods.php';
            }
            
        }
        return $located;
    }
    /*Since 1.8.7*/
    add_filter( 'wc_get_template', 'wshk_payments_get_template', 10, 5 );
    
}



//Since v.1.6.6 - updated v.2.0.0

//EDIT ACCOUNT SHORTCODE
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_myedit_account]

//Since v.1.7.8 - v.1.9.1

$getenablemyeditaccsht = get_option('wshk_enablemyeditaccsht');
if ( isset($getenablemyeditaccsht) && $getenablemyeditaccsht =='2003')
    {

    function wshk_newstyle_myeditaccount() {
        /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            ob_start();
            
            if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                
                require WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premform-edit-account.php';
                
            } else {
            
            require dirname( __DIR__ ) . '/mytemplates/freeform-edit-account.php';
            
            }
            
            return ob_get_clean();
        }
    }
    add_shortcode ('woo_myedit_account', 'wshk_newstyle_myeditaccount');
    
    //Sustituir plantilla del tema por la del plugin
    
    function wshk_editaccount_get_template( $located, $template_name, $args, $template_path, $default_path ) {
        
        if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            
            if ( 'myaccount/form-edit-account.php' == $template_name ) {
                $located = WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/mytemplates/premform-edit-account.php';
            }
            
        } else {
            
            if ( 'myaccount/form-edit-account.php' == $template_name ) {
            $located = plugin_dir_path( __DIR__ ) . 'mytemplates/freeform-edit-account.php';
            }
            
        }
        
        return $located;
    }
    /*Since 1.8.7*/
    add_filter( 'wc_get_template', 'wshk_editaccount_get_template', 10, 5 );
    
}



//Since v.1.6.6

//DASHBOARD SHORTCODE
//Display the account edit form and let customize the data, If you want display in any page or post, use this shortcode [woo_mydashboard]

//Since v.1.7.8 - v.1.9.1

$getenabledashbsht = get_option('wshk_enabledashbsht');
if ( isset($getenabledashbsht) && $getenabledashbsht =='2004')
    {

    function wshk_newstyle_mydashboard() {
        /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            ob_start();
            require dirname( __DIR__ ) . '/mytemplates/dashboard.php';
            return ob_get_clean();
        }
    }
    add_shortcode ('woo_mydashboard', 'wshk_newstyle_mydashboard');
}



//Since v.1.5 - Updated v.1.8.0 - v.1.9.1

//USER GRAVATAR IMAGE SHORTCODE
//Display the user's Gravatar image, if you want show the Gravata'r image in any page or post, use this shortcode [woo_gravatar_image]

$getenablegravatar = get_option('wshk_enablegravatar');
if ( isset($getenablegravatar) && $getenablegravatar =='15')
    {
        
    

    function wshk_gravatar_image(){
        if (is_user_logged_in()){ 
        $textgravasize = get_option('wshk_textgravasize');
        $textgravashd = get_option('wshk_textgravashd');
        $textgravabdsz = get_option('wshk_textgravabdsz');
        $textgravabdtp = get_option('wshk_textgravabdtp');
        $textgravabdcl = get_option('wshk_textgravabdcl');
        $textgravabdrd = get_option('wshk_textgravabdrd');
        $user_id = get_current_user_id();
        
        ob_start();
        
        $id_or_email = wp_get_current_user();
        
        //Since v.1.7.9
        //Updated styles compatibility with builders
        //Can control the image style: size, shadow, border (size,type,color,radius)
        
        echo '<style> img.avatar.avatar-'.$textgravasize.'.photo { height: '.$textgravasize.'px;
          width: '.$textgravasize.'px;
          border: '.$textgravabdsz.'px '.$textgravabdtp.' '.$textgravabdcl.' !important;  
          border-radius: '.$textgravabdrd.'% !important;
          box-shadow: '.$textgravashd.';
          overflow: hidden;
          margin: auto;}</style>';
          
        echo get_avatar( $id_or_email, $textgravasize, '', '', '' );
        return ob_get_clean();
    }
        }
    add_shortcode( 'woo_gravatar_image', 'wshk_gravatar_image' );
}



//Since v.1.5 - updated v.1.9.1

//USERNAME SHORTCODE
//If you are building your own myaccount page, maybe need this function to get the username. Just need activate and use this shortcode: [woo_user_name]

$getenableusername = get_option('wshk_enableusername');
if ( isset($getenableusername) && $getenableusername =='11')
    {
    
    add_shortcode('woo_user_name', 'wshk_get_user');
    function wshk_get_user() {
    
        ob_start();
    	if ( is_user_logged_in()) {
    	    
        $usernmtc = get_option('wshk_usernmtc');
        $usernmts = get_option('wshk_usernmts');
        $usernmta = get_option('wshk_usernmta');
        $textusernmpf = get_option('wshk_textusernmpf');
        $textusernmsf = get_option('wshk_textusernmsf');
        $user = wp_get_current_user();
        		
    	//CONDITION TO CHANGE THE SHORTCODE DISPLAY FUNCTION
        
        $getshowusername = get_option('wshk_showusername');
        if ( isset($getshowusername) && $getshowusername =='showus') {
        
            echo '<p style="color:' . ' ' . $usernmtc . '; text-align:' . ' ' . $usernmta . '; font-size:' . ' ' . $usernmts . 'px;">' . $textusernmpf . ' ' . $user->user_login . ' ' . $textusernmsf . '</p>';
            
        } else if (isset($getshowusername) && $getshowusername =='showonly') 
        {
            
            echo '<p style="color:' . ' ' . $usernmtc . '; text-align:' . ' ' . $usernmta . '; font-size:' . ' ' . $usernmts . 'px;">' . $textusernmpf . ' ' . $user->user_firstname . ' ' . $textusernmsf . '</p>';
            
        } else {
        
           echo '<p style="color:' . ' ' . $usernmtc . '; text-align:' . ' ' . $usernmta . '; font-size:' . ' ' . $usernmts . 'px;">' . $textusernmpf . ' ' . $user->display_name . ' ' . $textusernmsf . '</p>';
        }
    		
		/*echo '<p style="color:' . ' ' . $usernmtc . '; text-align:' . ' ' . $usernmta . '; font-size:' . ' ' . $usernmts . 'px;">' . $textusernmpf . ' ' . $user->display_name . ' ' . $textusernmsf . '</p>';*/
    		
		return ob_get_clean();
    	}
    }
}



//Since v.1.5 - updated v.1.9.1 - updated v.2.0.0

//LOGOUT BUTTON SHORTCODE
//If you are building your own myaccount page, you will need this function to let the user make a logout. Just need activate and use this shortcode: [woo_logout_button]

$getenablelogoutbtn = get_option('wshk_enablelogoutbtn');
if ( isset($getenablelogoutbtn) && $getenablelogoutbtn =='12')
    {

    add_shortcode ('woo_logout_button', 'wshk_logout_button');
    function wshk_logout_button() {    
        
        if ( is_user_logged_in() && ( is_account_page() ) ) {
            
        $logbtnbdsize = get_option('wshk_logbtnbdsize');
        $logbtnbdradius = get_option('wshk_logbtnbdradius');
        $logbtnbdtype = get_option('wshk_logbtnbdtype');
        $logbtnbdcolor = get_option('wshk_logbtnbdcolor');
        $logbtntext = get_option('wshk_logbtntext');
        $logbtntd = get_option('wshk_logbtntd');
        $logbtnta = get_option('wshk_logbtnta');
        $logbtnwd = get_option('wshk_logbtnwd');
        
        //the get page id myaccount can be changed for shop to redirect after logout to the shop page
        
        ob_start();
        print '<a class="woocommerce-Button button wshkclose" style="border:' . ' ' . $logbtnbdsize . 'px' . ' ' . $logbtnbdtype . ' ' . $logbtnbdcolor . '; border-radius:' . ' ' . $logbtnbdradius . 'px; text-decoration:' . ' ' . $logbtntd . '; margin: 0 auto;  text-align:' . ' ' . $logbtnta . '; display:block; width:' . ' ' . $logbtnwd . 'px;" href="' . wc_logout_url( get_permalink( wc_get_page_id( "myaccount" ) ) ) . '">' . ' ' . $logbtntext . ' ' . '</a>';
        
        return ob_get_clean();
        
        }
    }

    //Since 1.6.6
    /*Redirect after logout to a custom page*/

    function wshk_custom_logout_redirect() {
        
        $clogpage = get_option( 'wshk_btnlogoutredi' );
        $baselink = home_url( '/' . $clogpage );
        if (!empty ($clogpage)) {
            wp_redirect($baselink);
            exit();
        }
    }
    add_action('wp_logout', 'wshk_custom_logout_redirect', PHP_INT_MAX);
}



//Since v.1.5 - Updated v.1.8.0 - v.1.9.1

//LOGIN & REGISTER FORM SHORTCODE
//If you are building your own myaccount page, you need use this function to display the login/register form. Just need use this shortcode [woo_login_form]

$getenableloginform = get_option('wshk_enableloginform');
if ( isset($getenableloginform) && $getenableloginform =='13')
    {
        
    add_shortcode ('woo_login_form', 'wshk_login_form');
    function wshk_login_form() {
    
        if ( ! is_user_logged_in() ) {
            
             return do_shortcode( '[woocommerce_my_account]' );
        } 
    }

    //Sustituir plantilla del tema por la del plugin
    
    add_filter( 'wc_get_template', 'wshk_logma_get_templatee', 10, 5 );
    function wshk_logma_get_templatee( $located, $template_name, $args, $template_path, $default_path ) {
        
        $theme = wp_get_theme(); // gets the current theme
    
        if ( 'myaccount/form-login.php' == $template_name ) {
            $located = plugin_dir_path( __DIR__ ) . 'mytemplates/form-login.php';
            
        } elseif($theme = get_option('Storefront') ) {
            
            $located = do_shortcode('[woocommerce_my_account]');
        }
        
        return $located;
        
    }

    //Since v.1.5 - Updated v.1.8.9 - v.1.9.3
    //Redirect users to custom URL based on their role after login
    
    function wshk_custom_user_redirect( $redirect, $user ) {
    
    
    	// Get the first of all the roles assigned to the user
    	$loginredi = get_option('wshk_loginredi');
    	$role = $user->roles[0];
    	$dashboard = admin_url();
    	$myaccount = home_url( '/' . $loginredi );
    	$wshk_checkouturl = get_permalink( get_option( 'woocommerce_checkout_page_id' ) );
    	
    	//Since v.1.9.3
    	$getenablepreviousvisited = get_option('wshk_enablepreviousvisited');
        if ( !empty($getenablepreviousvisited)){
    
        //Redirect any role to the previous visited page or, if not available, to the selected page
        $redirect = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : $myaccount;
    
        }else{
    	
    	if( $role == 'administrator' ) {
    		//Redirect administrators to the dashboard
    		//$redirect = $dashboard;
    		$redirect = $myaccount;
    	} elseif ( $role == 'shop-manager' ) {
    		//Redirect shop managers to the dashboard
    		//$redirect = $dashboard;
    		$redirect = $myaccount;
    	} elseif ( $role == 'editor' ) {
    		//Redirect editors to the dashboard
    		//$redirect = $dashboard;
    		$redirect = $myaccount;
    	} elseif ( $role == 'author' ) {
    		//Redirect authors to the dashboard
    		//$redirect = $dashboard;
    		$redirect = $myaccount;
    	} elseif ( WC()->cart->is_empty() or is_account_page() && $role == 'customer' || $role == 'subscriber' ) {
    	    //$redirect = $mytestreditest;
    	    $redirect = $myaccount;
    	    //$redirect = $wshkurl;
    	} else {
    	    
    		//Redirect any other role to the previous visited page or, if not available, to the home
    		//$redirect = wp_get_referer() ? wp_get_referer() : home_url();
    		//$redirect = $myaccount;
    		$redirect = $wshk_checkouturl;
    	}
    	}//nuevo
    	return $redirect;
    }
    
    add_filter( 'woocommerce_login_redirect', 'wshk_custom_user_redirect', 99, 99 );
}



//Since v.1.5 - Updated in v.1.8.0 - v.1.9.1

//CUSTOMER REVIEWS SHORTCODE
//Display all the products reviews made by a user with just a shortcode, If you want display in any page or post, use this shortcode [woo_review_products]

$getenablereviews = get_option('wshk_enablereviews');
if ( isset($getenablereviews) && $getenablereviews =='9')
    {

    function wshk_show_reviews_by_user(){
        
        ob_start();
        $user_id = get_current_user_id();
    
        $acreviews =  get_option('wshk_enablereviews');
        $textavsize =  get_option('wshk_textavsize');
        $textavbdsize = get_option('wshk_textavbdsize');
        $textavbdradius = get_option('wshk_textavbdradius');
        $textavbdtype = get_option('wshk_textavbdtype');
        $textavbdcolor = get_option('wshk_textavbdcolor');
        $texttbwsize = get_option('wshk_texttbwsize');
        $textbxfsize =  get_option('wshk_textbxfsize');
        $textbxbdsize = get_option('wshk_textbxbdsize');
        $textbxbdradius = get_option('wshk_textbxbdradius');
        $textbxbdtype = get_option('wshk_textbxbdtype');
        $textbxbdcolor = get_option('wshk_textbxbdcolor');
        $textbxbgcolor = get_option('wshk_textbxbgcolor');
        $textbtnbdsize = get_option('wshk_textbtnbdsize');
        $textbtnbdradius = get_option('wshk_textbtnbdradius');
        $textbtnbdtype = get_option('wshk_textbtnbdtype');
        $textbtnbdcolor = get_option('wshk_textbtnbdcolor');
        $textbtntarget = get_option('wshk_textbtntarget');
        $textbtntxd = get_option('wshk_textbtntxd');
        $textbxpadding = get_option('wshk_textbxpadding');
        $textbtntxt = get_option('wshk_textbtntxt');
        $avshadow = get_option('wshk_avshadow');
        
        $id_or_email = get_current_user_id();
        $numbrevdis = get_option('wshk_numbrevdis');
        $count = 0;
        $html_r = "";
        $title="";
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $number = $numbrevdis ; 
        //$tesunoo = '1'; //updated v.1.7.3
        // all for show all the comments, for other quantity just write the number 1,2,3,4...
        //$offset = ( $paged - $tesunoo ) * $number; //updated v.1.7.3 - hide v.1.9.1
    
        global $product;
        global $comment;
        $args = array(
        	'user_id' => $user_id, // get the user by ID
        	'post_type' => 'product',
        	'number' => $number,//'1',
            'offset' => '',//$offset,
            'paged' => $paged,
        	'post_ID' =>$product,  // Product Id  
        	'meta_key' => '',
        	'meta_value' => '',
        	'status' => "approve", // Status you can also use 'hold', 'spam', 'trash'
        );
    
        $acreviews =  get_option('wshk_enablereviews');
        $textavsize =  get_option('wshk_textavsize');
        $textavbdsize = get_option('wshk_textavbdsize');
        $textavbdradius = get_option('wshk_textavbdradius');
        $textavbdtype = get_option('wshk_textavbdtype');
        $textavbdcolor = get_option('wshk_textavbdcolor');
        $texttbwsize = get_option('wshk_texttbwsize');
        $textbxfsize =  get_option('wshk_textbxfsize');
        $textbxbdsize = get_option('wshk_textbxbdsize');
        $textbxbdradius = get_option('wshk_textbxbdradius');
        $textbxbdtype = get_option('wshk_textbxbdtype');
        $textbxbdcolor = get_option('wshk_textbxbdcolor');
        $textbxbgcolor = get_option('wshk_textbxbgcolor');
        $textbtnbdsize = get_option('wshk_textbtnbdsize');
        $textbtnbdradius = get_option('wshk_textbtnbdradius');
        $textbtnbdtype = get_option('wshk_textbtnbdtype');
        $textbtnbdcolor = get_option('wshk_textbtnbdcolor');
        $textbtntarget = get_option('wshk_textbtntarget');
        $textbtntxd = get_option('wshk_textbtntxd');
        $textbxpadding = get_option('wshk_textbxpadding');
        $textbtntxt = get_option('wshk_textbtntxt');
        $avshadow = get_option('wshk_avshadow');
        
        $gravatar = get_avatar( $id_or_email, $textavsize) . ' ';
        $url = get_option( 'siteurl' );
        $comments = get_comments($args);
    
        //REVIEWS PAGINATION - v 1.9.1
    
        $args2 = array(
        	'user_id' => $user_id, // get the user by ID
        	'post_type' => 'product',
            'count' => true //return only the count
        );
    
        $cocomments = get_comments($args2);
        $total_rev_records = $cocomments;
    
        if ( !empty($number) && ($number != 'all' || $number == '0')) {
            
            $total_rev_pages = ceil($total_rev_records / $number);
            
        } else {
          
            $total_rev_pages = '1';
        }
    
        if (!empty ($comments)){
        foreach($comments as $comment) :
        ?>
        <style>
        .mcon-image-container {
          height: <?php echo $textavsize ?>px !important;
          width: <?php echo $textavsize ?>px !important;
          border: <?php echo $textavbdsize ?>px <?php echo $textavbdtype ?> <?php echo $textavbdcolor ?> !important;  
          border-radius: <?php echo $textavbdradius ?>% !important;
          box-shadow: <?php echo $avshadow ?>;
            overflow: hidden;  
        }
        
        
        /*star rating for products*/
        .wshkdiv.product .woocommerce-product-rating {
            margin-bottom: 1.618em;
        }
        
        .wshk.woocommerce-product-rating .star-rating {
            margin: .5em 4px 0 0;
            float: left;
        }
        
        .wshk.woocommerce-product-rating::after, .wshk.woocommerce-product-rating::before {
        
            content: ' ';
            display: table;
        
        }
        
        .wshk.woocommerce-product-rating {
            line-height: 2;
        }
        
        .wshk.star-rating {
            float: right;
            overflow: hidden;
            position: relative;
            height: 1em;
            line-height: 1;
            font-size: 1em;
            width: 5.4em;
            font-family: star;
            /*color:yellow;*/
        }
        
        .wshk.star-rating::before {
            content: '\73\73\73\73\73';
            /*color: #d3ced2;*/
            float: left;
            top: 0;
            left: 0;
            position: absolute;
        }
        
        .wshk.star-rating {
            line-height: 1;
            font-size: 1em;
            font-family: star;
        }
        
        .wshk.star-rating span {
            overflow: hidden;
            float: left;
            top: 0;
            left: 0;
            position: absolute;
            padding-top: 1.5em;
        }
        
        .wshk.star-rating span::before {
            content: '\53\53\53\53\53';
            top: 0;
            position: absolute;
            left: 0;
        }
        
        .wshk.star-rating span {
        
            overflow: hidden;
            float: left;
            top: 0;
            left: 0;
            position: absolute;
            padding-top: 1.5em;
        
        }
        
        .wshk.star-rating {
            
            /*float:right;*/
        }
        
        ul.userreviewswshk {
            
            margin: 0px !important;
        }
        
        div.wshkreviewbox {
            
            padding-left:25px;
        }
        
        th.wshktableth {
            
            background-color:transparent;
        }
        </style>
        <?php
    
        //Detect Storefront, GeneratePress themes
    
        $wshk_storefront_my_theme = wp_get_theme( 'storefront' );
        $wshk_generatepress_my_theme = wp_get_theme( 'generatepress' );
        $wshk_hello_my_theme = wp_get_theme( 'hello-elementor' );
        $wshk_theseven_my_theme = wp_get_theme( 'dt-the7' );
        
        if ( $wshk_storefront_my_theme->exists() ) {
            
            $commentstablink = 'tab-reviews';
            
        } else if ( $wshk_generatepress_my_theme->exists() ) {
            
            $commentstablink = 'tab-reviews';
            
        } else if ( $wshk_hello_my_theme->exists() ) {
            
            $commentstablink = 'tab-reviews';
            
        } else if ( $wshk_hello_my_theme->exists() ) {
            
            $commentstablink = 'comments';
            
        } else {
            
            $commentstablink = 'tab-reviews';
        }
    
        $product = wc_get_product( $comment->comment_post_ID );
        $teprodu = $product->get_name();
        $tspermalink = get_permalink($comment->comment_post_ID);
        
        //Updated - v.1.7.9
        
        echo('<div class="wshkreviewcontainer" style="background:' .$textbxbgcolor . '; font-size:' . $textbxfsize . 'px; border:' . $textbxbdsize . 'px' . ' ' . $textbxbdtype . ' ' . $textbxbdcolor . '; border-radius:' . $textbxbdradius . 'px; padding:' . $textbxpadding . 'px;">' . '<ul class="userreviewswshk"><table><tr><th class="wshktableth" style="width:' . $texttbwsize . 'px;"><div class="mcon-image-container">' . $gravatar . '</div></th><th class="wshktableth">' . '<div class="wshk star-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><span style="width:' . ( get_comment_meta( $comment->comment_ID, 'rating', true ) / 5 ) * 100 . '%"><strong itemprop="ratingValue">' . get_comment_meta( $comment->comment_ID, 'rating', true ) . '</strong></span></div><a href="' . $tspermalink . '#comment-' . (strval($comment->comment_ID)) . '" target="' .$textbtntarget . '">' . $teprodu . '</a><br /><strong>' . $comment->comment_author . '</strong><br /><small>' . get_comment_date( '', $comment) . '</small></th></tr></table><div class="wshkreviewbox">' . $comment->comment_content . '</div><br /><br />' . '<div class="wshkproductbuttonlink"><a class="woocommerce-Button button wshkcomment" target="' .$textbtntarget . '" style="border:' . $textbtnbdsize . 'px' . ' ' . $textbtnbdtype . ' ' . $textbtnbdcolor . '; border-radius:' . $textbtnbdradius . 'px; text-decoration:' . $textbtntxd . ';" href="' . $tspermalink . '#comment-' . (strval($comment->comment_ID)) . '">' . $textbtntxt . '</a></div>' . '</ul>' . '</div>' . '<br />');
    
    
        endforeach;
        ?>
        <div class="pagination">
            <?php
            $big = 999999999;
            $argss = array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?page=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $total_rev_pages,
                'show_all' => false,
                'end_size' => 1,
                'mid_size' => 2,
                'prev_next' => true,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
                'type' => 'button',
                'add_args' => false,
                'add_fragment' => ''
            );
            echo paginate_links($argss);
            ?>
        </div>
        <?php
        } else {
        
            //Updated v.1.9.1
            $getenableacustomshopage = get_option('wshk_enableacustomshopage');
            if ( isset($getenableacustomshopage) && $getenableacustomshopage =='85')
            {
        
                $tesprue = sprintf( __( 'No reviews has been made yet.', 'woo-shortcodes-kit' ) );
                
                $tesbuton = sprintf( __( 'Make your first review', 'woo-shortcodes-kit' ) );
                $mycustomshopurl = get_option('wshk_shopageslug');
                $miurl = get_option( 'siteurl' );
            	//return $miurl. '/' .$mycustomshopurl;
                    echo '
                <div class="woocommerce-Message woocommerce-Message--info woocommerce-info test">
                '. $tesprue . '
            		<a class="woocommerce-Button button" href="' . $miurl. '/' .$mycustomshopurl . '">' . $tesbuton . '</a><br />
            	</div>
                ';
            
            
           } else {
               
                $mbaselink = wc_get_page_permalink( 'shop' );
                //$linksh = wc_get_page_permalink( 'shop' );
                $tesprue = sprintf( __( 'No reviews has been made yet.', 'woo-shortcodes-kit' ) );
            
                $tesbuton = sprintf( __( 'Make your first review', 'woo-shortcodes-kit' ) );
               
                 echo '
                <div class="woocommerce-Message woocommerce-Message--info woocommerce-info test">
                '. $tesprue . '
        		<a class="woocommerce-Button button" href="' . $mbaselink . '">' . $tesbuton . '</a><br />
        	    </div>
                ';
            }
        }
        return ob_get_clean();
    }
    add_shortcode( 'woo_review_products', 'wshk_show_reviews_by_user' );
}




//Since v.1.6.8

//USER IP SHORTCODE
// If you want to show the user IP address in any page, just use this shortcode [woo_display_ip]

//Since v.1.7.8 - updated v.1.9.1

$getenabletheipsht = get_option('wshk_enabletheipsht');
if ( isset($getenabletheipsht) && $getenabletheipsht =='2005')
    {

    function wshk_display_user_ip() {
        $ip = $_SERVER['REMOTE_ADDR'];
        return $ip;
    }
    add_shortcode('woo_display_ip', 'wshk_display_user_ip');
}



//Since v.1.6.8

//USER NAME AND SURNAME SHORTCODE
// If you want to show the user name and surname, just use this shortcode [woo_display_nsurname]

//Since v.1.7.8 - updated v.1.9.1

$getenablethenamesurnsht = get_option('wshk_enablethenamesurnsht');
if ( isset($getenablethenamesurnsht) && $getenablethenamesurnsht =='2006')
    {

    function wshk_displayuserapell_short(){
        $theuserapell = wp_get_current_user();
        return $theuserapell->first_name . " " . $theuserapell->last_name . "\n";
    }
    add_shortcode( 'woo_display_nsurname' , 'wshk_displayuserapell_short' );
}


//Since v.1.6.8

//USER EMAIL SHORTCODE
// If you want to show the user email, just use this shortcode [woo_display_email]

//Since v.1.7.8 - updated v.1.9.1

$getenabletheuseremailsht = get_option('wshk_enabletheuseremailsht');
if ( isset($getenabletheuseremailsht) && $getenabletheuseremailsht =='2007')
    {

    function wshk_displayemail_on_menu(){
        $theeuser = wp_get_current_user();
        return $theeuser->user_email;
    }
    add_shortcode( 'woo_display_email' , 'wshk_displayemail_on_menu' );
}


//Since v.2.0.0

//USER ROLE SHORTCODE
// If you want so shot the user role or roles, just use this shortcode      [wshk-user-role] and configure the settings

$getenabletheuserrolesht = get_option('wshk_enableuserrole');
if ( isset($getenabletheuserrolesht) && $getenabletheuserrolesht =='050222')
    {

function wshk_display_user_role(){
	
$current_user = wp_get_current_user();
    $roles = $current_user->roles;
	$allroles = get_option('wshk_userroleoptions');
	$roleslist = 1;	
	
	//Show all user roles in a list, you can add custom styles to the global list and to each list item
	if($allroles == 1) {
		ob_start();
		echo '<ul class="wshk-roles-list">';
		foreach($roles as $role) {			
			echo '<li class="wshk-role-'.$roleslist++.'">' . $role . '</li>';
		}
		echo '</ul>';
		return ob_get_clean();
	}
	else {
	//Show main role, can be integrated into a line of text as well
		ob_start();    
		echo $roles[0];	
		return ob_get_clean();
	}
}
add_shortcode('wshk-user-role','wshk_display_user_role');
}
?>