<?php

//Since v.1.6.8 - updated v.1.9.1

//GPRD GLOBAL SETTINGS

//If you want adjust the function settings you need enable it.

$getgprdsettings = get_option('wshk_gprdsettings');
if ( isset($getgprdsettings) && $getgprdsettings =='88')
    {

    $gprdurlslug = get_option('wshk_gprdurlslug');
    $gprdiread = get_option('wshk_gprdiread');
    $gprdpolit = get_option('wshk_gprdpolit');
    $gprderror = get_option('wshk_gprderror');
    $gprduserlegalinfo = get_option('wshk_gprduserlegalinfo');
    $gprdcomveri = get_option('wshk_gprdcomveri');
}



//Since v.1.6.8 - updated v.1.9.1

//GDPR ON WP COMMENTS

//If you want to show the GPRD checkbox in the comments form, just need activate this function.

$getgprdcomments = get_option('wshk_gprdcomments');
if ( isset($getgprdcomments) && $getgprdcomments =='89')
    {

    
    //Since v.1.6.8
    
    /*CHECKBOX*/
    
    function wshk_custom_fields($fields) {
    
    
    	// Multilingual strings
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
    	$url = '/' . get_option('wshk_gprdurlslug'); /*get_permalink ( get_option( 'wpcpc_policy_page_id' ) );*/
    	$read_and_accept =  get_option('wshk_gprdiread');//__( 'He leido y ACEPTO la ', 'wp-comment-policy-checkbox' );
    	$getgdprcommentsprivacylink = get_option('wshk_gdpr_comments_link_text');
    	
    	if (get_option('wshk_gprdireadcomments')!='') {
    	    //function field
            $readandcomments = get_option('wshk_gprdireadcomments');
        } else {
            //Global field
            $readandcomments = get_option('wshk_gprdiread');
        }
        
        
        
        //Privacy policy link text
        if($getgdprcommentsprivacylink !='') {
            //function field
            $gdprcommentsprivacylinktext = $getgdprcommentsprivacylink;
        } else {
            //Global text
            $gdprcommentsprivacylinktext = __('Privacy Policy' , 'woo-shortcodes-kit');
        }
     
     
    
        $fields[ 'policy' ] =
            '<p class="comment-form-policy">'.
                '<label for="policy">
                    <input name="policy" value="policy-key" class="comment-form-policy__input" type="checkbox" style="width:auto"' . $aria_req . ' aria-req="true" />
                    ' . $readandcomments . '
                    <a href="' . esc_url( $url ) . '" target="_blank" class="comment-form-policy__see-more-link">' . $gdprcommentsprivacylinktext . '</a>
                    <span class="comment-form-policy__required required">*</span>
                </label>
            </p>';
    
        return $fields;
    }
    
    add_filter('comment_form_default_fields', 'wshk_custom_fields');

    //Since v.1.6.8
    
    /*CHECKBOX VERIFICATOR*/
    
    //javascript validation
    add_action('wp_footer','wshk_validate_privacy_comment_javascript');
    function wshk_validate_privacy_comment_javascript(){
        if (! is_user_logged_in() && is_single() && comments_open()){
            wp_enqueue_script('jquery');
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function($){
                $("#submit").click(function(e){
                    if (!$('.comment-form-policy__input').prop('checked')){
                        e.preventDefault();
                        alert('You must agree to our privacy term by checking the box', 'woo-shortcodes-kit');
                        return false;
                    }
                })
            });
            </script>
            <?php
        }
    }

    //Since v.1.6.8
    
    /*LEGAL TEXT*/
    
    add_action('comment_form_after','wshk_my_comment_form_before');
    function wshk_my_comment_form_before() {
        
        
      if (! is_product() ) {
          
          $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
        $gprdcomveri = get_option('wshk_gprdcomveri');
        
        $gprdcommentsbdsize = get_option('wshk_gprdcommentsbdsize');
        $gprdcommentsbdtype = get_option('wshk_gprdcommentsbdtype');
        $gprdcommentsbdcolor = get_option('wshk_gprdcommentsbdcolor');
        $gprdcommentsbdradius = get_option('wshk_gprdcommentsbdradius');
        $gprdcommentspadding = get_option('wshk_gprdcommentspadding');
        $gprdcommentsbgcolor = get_option('wshk_gprdcommentsbgcolor');
        
        
    ?>
      
      <div style="border: <?php echo $gprdcommentsbdsize ;?>px <?php echo $gprdcommentsbdtype ;?> <?php echo $gprdcommentsbdcolor ;?>;border-radius: <?php echo $gprdcommentsbdradius ;?>px;padding:<?php echo $gprdcommentspadding ;?>px;background-color:<?php echo $gprdcommentsbgcolor ;?>;margin-top: 20px;"><?php echo $gprdcomveri; ?>
      
    <!--<h4 style="letter-spacing: 1px;"><span class="fa fa-info-circle"></span> Información relativa a los datos que proporcionas al dejar tu comentario</h4>
    
    <p><strong>Responsable:</strong> Alberto Gómez Orta</p>
    
    <p><strong>Finalidad:</strong> moderación de comentarios</p>
    
    <p><strong>Legitimación:</strong> tu consentimiento, mediante marcación de botón.</p>
    
    <p><strong>Destinatarios:</strong> servidores de Webempresa (actual hosting de esta web).</p>
    
    <p><strong>Derechos:</strong> acceso, rectificación, limitación y/o supresión de tus datos.</p>--></div><br /><?php
    }   
    }

    //Since v.1.6.8
    
    /* COMMENTS VERIFICATION */
    add_filter('comment_notification_text', 'wshk_my_comment_notification_text');
    add_filter('comment_moderation_text', 'wshk_my_comment_notification_text');
    
    
    function wshk_my_comment_notification_text($notify_message)
    {
         $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
        
        
    return $notify_message . $gprduserlegalinfoo;
    }
}



//Since v.1.6.8 - updated v.1.9.1

//GDPR ON WC CHECKOUT PAGE

$getgprdorders = get_option('wshk_gprdorders');
if ( isset($getgprdorders) && $getgprdorders =='90')
    {


    add_action( 'woocommerce_review_order_before_submit', 'wshk_add_checkout_tickbox', 9 );
      
    function wshk_add_checkout_tickbox() {
     $readandaccept = get_option('wshk_gprdiread');
     $urlpol = '/' . get_option('wshk_gprdurlslug');
     //$pollink = __('Privacy Policy', 'woo-shortcodes-kit');
     $getgdprcheckoutprivacylink = get_option('wshk_gdpr_checkout_link_text');
    
    
     if (get_option('wshk_gprdireadcheckout')!='') { 
         //function field
         $readandcheckout = get_option('wshk_gprdireadcheckout');
     } else { 
         //global field
         $readandcheckout = get_option('wshk_gprdiread');
     }
     
     //Privacy policy link text
        if($getgdprcheckoutprivacylink !='') {
            //function field
            $gdprcheckoutprivacylinktext = $getgdprcheckoutprivacylink;
        } else {
            //Global text
            $gdprcheckoutprivacylinktext = __('Privacy Policy' , 'woo-shortcodes-kit');
        }
      
      if(! is_user_logged_in() ) {
          
          
          woocommerce_form_field( 'privacy_policy', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => $readandcheckout . ' <a href="' . $urlpol .'" target="_blank">' . $gdprcheckoutprivacylinktext . '</a>',
    )); 
    
    ?> 
    <!--<p class="form-row privacy" style="font-size: 16px;">
      
      <input name="deliverycheck" id="deliverycheck" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" required style="width:auto">
                    <?php echo $readandcheckout ; ?>
                    <a href="<?php echo $urlpol;  ?>" target="_blank" class="comment-form-policy__see-more-link"><?php echo $pollink ;?></a>
      
    
    </p>-->
    <?php
      } else {
          
          
          $getpolhide = get_option('wshk_get_pol_hide');
          
          if ( isset($getpolhide) && $getpolhide =='hide') {
              $getpolhideval = 'none';
              $getpolcheckedval = '1';
          //}
          ?>
          <style>
              .pol { display:<?php echo $getpolhideval ?>;}
          </style>
          <?php
          } else { $getpolcheckedval = '0';}
          woocommerce_form_field( 'privacy_policy', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy pol'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'default' => $getpolcheckedval,//checked 1 Unchecked 0
        'label'         => $readandcheckout . ' <a href="' . $urlpol .'" target="_blank">' . $gdprcheckoutprivacylinktext . '</a>',
    )); 
    	?>
      
    	<!--<p class="form-row privacy" style="display:none;">
      
      <input name="deliverycheck" id="deliverycheck" class="comment-form-policy__input" type="checkbox" required style="width:auto"checked>
                    <?php echo $readandcheckout ; ?>
                    <a href="<?php echo $urlpol; ?>" target="_blank" class="comment-form-policy__see-more-link"><?php echo $pollink ;?></a>
      
    
    </p>-->
      <?php
      }
    
     
    }
 
    // Show notice if customer does not tick
      
    add_action( 'woocommerce_checkout_process', 'wshk_not_approved_delivery' );
     
    function wshk_not_approved_delivery() {
        if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
            wc_add_notice( __( '<b>Privacy Policy</b> is a required field', 'woo-shortcodes-kit'), 'error' );
        }
    }
    
    
    // Since v.1.9.3
    // Custom Privacy policy log on orders page
    
    // 1. Save Privacy policy as Order Meta
  
    add_action( 'woocommerce_checkout_update_order_meta', 'wshk_save_privacy_policy_acceptance' );
      
    function wshk_save_privacy_policy_acceptance( $order_id ) {
    if ( $_POST['privacy_policy'] ) update_post_meta( $order_id, 'privacy_policy', esc_attr( $_POST['privacy_policy'] ) );
    }
      
    // 2. Display Privacy policy @ Single Order Page
      
    add_action( 'woocommerce_admin_order_data_after_billing_address', 'wshk_display_privacy_policy_acceptance' );
      
    function wshk_display_privacy_policy_acceptance( $order ) {
        $nosignoptoutt = get_post_meta( $order->get_id(), 'privacy_policy', true );
        if ( $nosignoptoutt == 1) {
            $Privptextaccepted = __( 'Accepted', 'woo-shortcodes-kit' );
            echo '<p><strong>Privacy Policy: </strong>'.$Privptextaccepted.'  <span class="dashicons dashicons-yes-alt" style="color:#aadb4a;"></span></p>';
        } else echo '<p><strong>Privacy Policy: </strong>N/A</p>';
    }

    //Since v.1.6.8
    
    /*ADD LEGAL TEXT IN CHECKOUT PAGE*/
    
    add_action( 'woocommerce_review_order_after_submit', 'wshk_gprd_law_info_text', 9 );
    
    function wshk_gprd_law_info_text()  {
    $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
    $gprdordveri = get_option('wshk_gprdordveri');
    
    $gprdcheckoutbdsize = get_option('wshk_gprdcheckoutbdsize');
    $gprdcheckoutbdtype = get_option('wshk_gprdcheckoutbdtype');
    $gprdcheckoutbdcolor = get_option('wshk_gprdcheckoutbdcolor');
    $gprdcheckoutbdradius = get_option('wshk_gprdcheckoutbdradius');
    $gprdcheckoutpadding = get_option('wshk_gprdcheckoutpadding');
    $gprdcheckoutbgcolor = get_option('wshk_gprdcheckoutbgcolor');
    ?>
      <br />
      <br />
      <div style="border: <?php echo $gprdcheckoutbdsize; ?>px <?php echo $gprdcheckoutbdtype; ?> <?php echo $gprdcheckoutbdcolor; ?>;border-radius: <?php echo $gprdcheckoutbdradius; ?>px; padding: <?php echo $gprdcheckoutpadding; ?>px; background-color: <?php echo $gprdcheckoutbgcolor; ?>;">
          <?php echo $gprdordveri; ?>
          
    <!--<h4 style="letter-spacing: 1px;font-size: 14px !important"><span class="fa fa-info-circle"></span> Información relativa a los datos que proporcionas al realizar tu pedido</h4>
    
    <p><strong>Responsable:</strong> Alberto Gómez Orta</p>
    
    <p><strong>Finalidad:</strong> realizar compra en tienda online</p>
    
    <p><strong>Legitimación:</strong> tu consentimiento, mediante marcación de botón.</p>
    
    <p><strong>Destinatarios:</strong> servidores de Webempresa (actual hosting de esta web).</p>
    
    <p><strong>Derechos:</strong> acceso, rectificación, limitación y/o supresión de tus datos.</p>--></div><br /><?php
    }


    //Since v.1.6.8
    
    /*ADD VERIFICATION IN EMAIL ORDER*/
    
    //add_action( 'woocommerce_email_customer_details', 'blz_fua_show_user_agent_admin_order' );
    add_action( 'woocommerce_email_customer_details', 'wshk_add_content_', 50, 4 ); 
    function wshk_add_content_( $order, $sent_to_admin, $plain_text, $email ) {
        
        $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
        
        
        if ( $sent_to_admin ) {
            echo $gprduserlegalinfoo;
            
            // Just for admin new order notification
        /*if( 'new_order' == $email->id ){
            // WC3+ compatibility
            $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
            //var_dump(get_post_meta($order_id));
            //$sacala = get_post_meta( $order_id, '_customer_user_agent', true );
            
            echo '<h2 style="
            color: #96588a;
            display: block;
            font-size: 18px;
            font-weight: bold;
            line-height: 130%;
            margin-top: 36px;
            text-align: left;">Customer validation</h2><div style="border:1px solid #e5e5e5;padding:20px;font-size:14px;">
            <p>Completely independent of the security measures applied by the payment platforms used (Paypal, Stripe). This website uses a validation method that validates three key data about the user, as well as:<br>
    <ul>
    <li>Something the client KNOWS: their IP address</li>
    
    <li>Something the customer HAS: their browser / device</li>
    
    <li>Something that the client IS:</p></li>
    </ul>
            <p><strong>Customer IP address:</strong> '. get_post_meta( $order_id, '_customer_ip_address', true ).'</p>
            
            <p><strong>Customer browser/device:</strong> '. get_post_meta( $order_id, '_customer_user_agent', true ).'</p>
            
            <p><strong>Validation date <small style="font-size:10px;">(YY/MM/DD H/M/S)</small>:</strong> '. get_post_meta( $order_id, '_paid_date', true ).'</p></div>';
        }*/
        }
    }
}



//Since v.1.6.8 - Updated v.1.7.9 - v.1.9.1

//GDPR ON WOOCOMMERCE REVIEWS

$getgprdreviews = get_option('wshk_gprdreviews');
if ( isset($getgprdreviews) && $getgprdreviews =='91')
    {    
    
    
    $urlpoli = '/' . get_option('wshk_gprdurlslug');
        
    //Since v.1.6.8
    
    /*WC CHECKBOX*/
    
    add_action('comment_form_after_fields','my_revie_form_after_fields');
    function my_revie_form_after_fields() {
      $readandaccepto = get_option('wshk_gprdiread');
     $urlpoli = '/' . get_option('wshk_gprdurlslug');
     //$polilink = __('Privacy Policy', 'woo-shortcodes-kit');
     $getgdprreviewsprivacylink = get_option('wshk_gdpr_reviews_link_text');
     
     if (get_option('wshk_gprdireadreviews')!='') { 
         //function field
         $readandreviews = get_option('wshk_gprdireadreviews');
     } else { 
         //global field
         $readandreviews = get_option('wshk_gprdiread');
     }
     
     
     //Privacy policy link text
        if($getgdprreviewsprivacylink !='') {
            //function field
            $gdprreviewsprivacylinktext = $getgdprreviewsprivacylink;
        } else {
            //Global text
            $gdprreviewsprivacylinktext = __('Privacy Policy' , 'woo-shortcodes-kit');
        }
     
     
     
      if ( is_product() ) {
    ?>
      <p class="form-row terms" style="font-size: 12px;">
      
      <input name="deliverycheck" id="deliverycheck" class="comment-form-policy__input" type="checkbox" required style="width:auto">
                    <?php echo $readandreviews ; ?>
                    <a href="<?php echo $urlpoli;  ?>" target="_blank" class="comment-form-policy__see-more-link"><?php echo $gdprreviewsprivacylinktext ;?></a>
      
    
    </p>
      <?php
    }   
    }

    //Since v.1.6.8
    
    /*WC REVIEWS LEGAL TEXT*/
    
    // define the woocommerce_review_after_comment_text callback 
    function action_woocommerce_review_after_comment_text( $comment ) { 
        // make action magic happen here... 
      $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
      $gprdrewveri = get_option('wshk_gprdrewveri');
      
      
    $gprdreviewsbdsize = get_option('wshk_gprdreviewsbdsize');
    $gprdreviewsbdtype = get_option('wshk_gprdreviewsbdtype');
    $gprdreviewsbdcolor = get_option('wshk_gprdreviewsbdcolor');
    $gprdreviewsbdradius = get_option('wshk_gprdreviewsbdradius');
    $gprdreviewspadding = get_option('wshk_gprdreviewspadding');
    $gprdreviewsbgcolor = get_option('wshk_gprdreviewsbgcolor');
      
      
      if ( is_product() ) {
      ?>
    	
    	<br />
      <div style="border: <?php echo $gprdreviewsbdsize;?>px <?php echo $gprdreviewsbdtype;?> <?php echo $gprdreviewsbdcolor;?>;border-radius: <?php echo $gprdreviewsbdradius;?>px;padding:<?php echo $gprdreviewspadding;?>px;background-color:<?php echo $gprdreviewsbgcolor;?>;">
          <?php echo $gprdrewveri;?>
    <!--<h4 style="letter-spacing: 1px;"><span class="fa fa-info-circle"></span> Información relativa a los datos que proporcionas al dejar tu valoración</h4>
    
    <p><strong>Responsable:</strong> Alberto Gómez Orta</p>
    
    <p><strong>Finalidad:</strong> moderación de valoraciones</p>
    
    <p><strong>Legitimación:</strong> tu consentimiento, mediante marcación de botón.</p>
    
    <p><strong>Destinatarios:</strong> servidores de Webempresa (actual hosting de esta web).</p>
    
    <p><strong>Derechos:</strong> acceso, rectificación, limitación y/o supresión de tus datos.</p>--></div><br />
    	
    	<?php
    	
      }
    }; 
             
    // add the action 
    add_action( 'comment_form_after', 'action_woocommerce_review_after_comment_text', 50, 4 );
}



//Since v.1.6.8 - updated v.1.9.1

//GDPR ON WC REGISTER FORM

$getgprdwcregisterform = get_option('wshk_gprdwcregisterform');
if ( isset($getgprdwcregisterform) && $getgprdwcregisterform =='9292')
    {


    add_action( 'woocommerce_register_form', 'wshk_add_registration_privacy_policy', 11 );
       
    function wshk_add_registration_privacy_policy() {
        
        $readandaccepto = get_option('wshk_gprdiread');
     $urlpoli = '/' . get_option('wshk_gprdurlslug');
     //$polilink = __('Privacy Policy', 'woo-shortcodes-kit');
     $getgdprregisterformprivacylink = get_option('wshk_gdpr_regform_link_text');
     
     if (get_option('wshk_gprdireadregister')!='') { 
         //function field
         $readandregister = get_option('wshk_gprdireadregister');
     } else { 
         //global field
         $readandregister = get_option('wshk_gprdiread');
     }
     
     
     //Privacy policy link text
        if($getgdprregisterformprivacylink !='') {
            //function field
            $gdprregformprivacylinktext = $getgdprregisterformprivacylink;
        } else {
            //Global text
            $gdprregformprivacylinktext = __('Privacy Policy' , 'woo-shortcodes-kit');
        }
     
     
     
     
    woocommerce_form_field( 'privacy_policy_reg', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => $readandregister . ' <a href="' . $urlpoli . '" target="_blank">' . $gdprregformprivacylinktext . '</a>',
    ));
      
    }
  
    // Show error if user does not tick
       
    add_filter( 'woocommerce_registration_errors', 'wshk_validate_privacy_registration', 10, 3 );
      
    function wshk_validate_privacy_registration( $errors, $username, $email ) {
    if ( ! is_checkout() ) {
        if ( ! (int) isset( $_POST['privacy_policy_reg'] ) ) {
            $errors->add( 'privacy_policy_reg_error', __( 'You must agree to our privacy term by checking the box', 'woo-shortcodes-kit') );
        }
    }
    return $errors;
    }

//}


    //Since v.1.6.8
    
    /*WC REGISTER FORM LEGAL TEXT*/
    
    // define the woocommerce_review_after_comment_text callback 
    function action_woocommerce_register_form() { 
        // make action magic happen here... 
      
    $gprdregveri = get_option('wshk_gprdregveri');
      
    $gprdregisterbdsize = get_option('wshk_gprdregisterbdsize');
    $gprdregisterbdtype = get_option('wshk_gprdregisterbdtype');
    $gprdregisterbdcolor = get_option('wshk_gprdregisterbdcolor');
    $gprdregisterbdradius = get_option('wshk_gprdregisterbdradius');
    $gprdregisterpadding = get_option('wshk_gprdregisterpadding');
    $gprdregisterbgcolor = get_option('wshk_gprdregisterbgcolor');
      
      ?>
    	
    	<br />
      <div style="border: <?php echo $gprdregisterbdsize;?>px <?php echo $gprdregisterbdtype;?> <?php echo $gprdregisterbdcolor;?>;border-radius: <?php echo $gprdregisterbdradius;?>px;padding: <?php echo $gprdregisterpadding;?>px;background-color:<?php echo $gprdregisterbgcolor;?>;">
          <?php echo $gprdregveri;?></div><br />
    	
    	<?php
    	
      
    }; 
             
    // add the action 
    add_action( 'woocommerce_register_form_end', 'action_woocommerce_register_form', 12 );



    //Since v.1.6.8
    
    /*SEND CUSTOM ADMIN EMAIL IF SOME USER MAKE A ACCOUNT @ REGISTER FORM VALIDATION*/
    
    function wshk_customer_registration_email_alert( $user_id ) {
        
        $gprduserlegalinfoo = get_option('wshk_gprduserlegalinfo');
        $user    = get_userdata( $user_id );
        $first_name = null;
        $last_name = null;
        $role = $user->roles;
        $email   = $user->user_email;
        $miasunto = __('New Customer Registration', 'woo-shortcodes-kit');
        $admiemail = get_option( 'admin_email' );
       
        if ( isset( $_POST['billing_first_name'] ) ) {
            $first_name = $_POST['billing_first_name'];
        }
        if ( isset( $_POST['billing_last_name'] ) ) {
            $last_name = $_POST['billing_last_name'];
        }
        $message = sprintf( __('Rejoice someone loves us! 
        A new customer %1$s %2$s with the email %3$s has registered.
        
        ', 'woo-shortcodes-kit' ), $first_name, $last_name, $email ) . $gprduserlegalinfoo ;
        
        
       
        // If new account doesn't have the 'customer' role don't do anything.
        if( !in_array( 'customer', $role ) ) {
            return;
        }
        
        $content_type = function() { return 'text/html'; };
        add_filter( 'wp_mail_content_type', $content_type );
        wp_mail( $admiemail , $miasunto , $message );
        remove_filter( 'wp_mail_content_type', $content_type );
        
        
        
    }
    add_action( 'user_register', 'wshk_customer_registration_email_alert' );
}



//Since v.1.6.8 - updated v.1.9.1

//CUSTOM TERMS AND CONDITIONS CHECKBOX IN WC CHECKOUT PAGE

$getwcnewtermsbox = get_option('wshk_wcnewtermsbox');
if ( isset($getwcnewtermsbox) && $getwcnewtermsbox =='94')
    {

    add_action( 'woocommerce_review_order_before_submit', 'wshk_add_checkout_privacy_policy', 9 );
       
    function wshk_add_checkout_privacy_policy() {
      $termstexto = get_option('wshk_termstexto');
      $termslink = '/' . get_option('wshk_termslink');
      $termstextlink = get_option('wshk_termstextlink');
      
      if(! is_user_logged_in() ) {
    woocommerce_form_field( 'privacy_terms', array(
        'type'          => 'checkbox',
        //'name' => 'privacy_terms',
        'class'         => array('form-row privacy'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => $termstexto . ' <a href="' . $termslink .'" target="_blank">' . $termstextlink . '</a>',
    )); 
    
    }else { 
        $gettermshide = get_option('wshk_get_terms_hide');
        
        if ( isset($gettermshide) && $gettermshide =='hide') {
              $gettermshideval = 'none';
              $gettermscheckedval = '1';
          } else {
              $gettermshideval = 'block';
              $gettermscheckedval = '0';
          }
          ?>
          <style>
              .ter { display:<?php echo $gettermshideval ?>;}
          </style>
          <?php
     woocommerce_form_field( 'privacy_terms', array(
        'type'          => 'checkbox',
        //'name' => 'privacy_terms',
        'class'         => array('form-row privacy ter'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'default' => $gettermscheckedval,//checked
        'label'         => $termstexto . ' <a href="' . $termslink .'" target="_blank">' . $termstextlink . '</a>',
    )); 
          
    }
      
    }
  
    // Show notice if customer does not tick
       
    add_action( 'woocommerce_checkout_process', 'wshk_not_approved_privacy' );
      
    function wshk_not_approved_privacy() {
        if ( ! (int) isset( $_POST['privacy_terms'] ) ) {
            wc_add_notice( __( '<b>Terms & Conditions</b> is a required field', 'woo-shortcodes-kit' ), 'error' );
        }
    }
    
    //Since v.1.9.3
    // Custom Terms and conditions log on orders page
    
    // 1. Save T&C as Order Meta
  
    add_action( 'woocommerce_checkout_update_order_meta', 'wshk_save_terms_conditions_acceptance' );
      
    function wshk_save_terms_conditions_acceptance( $order_id ) {
    if ( $_POST['privacy_terms'] ) update_post_meta( $order_id, 'privacy_terms', esc_attr( $_POST['privacy_terms'] ) );
    }
      
    // 2. Display T&C @ Single Order Page
      
    add_action( 'woocommerce_admin_order_data_after_billing_address', 'wshk_display_terms_conditions_acceptance' );
      
    function wshk_display_terms_conditions_acceptance( $order ) {
        $nosignoptout = get_post_meta( $order->get_id(), 'privacy_terms', true );
        if ( $nosignoptout == 1) {
            $tyctextaccepted = __( 'Accepted', 'woo-shortcodes-kit' );
            echo '<p><strong>Terms & Conditions: </strong> '.$tyctextaccepted.' <span class="dashicons dashicons-yes-alt" style="color:#aadb4a;"></span></p>';
        } else echo '<p><strong>Terms & Conditions: </strong>N/A</p>';
    }
}
?>