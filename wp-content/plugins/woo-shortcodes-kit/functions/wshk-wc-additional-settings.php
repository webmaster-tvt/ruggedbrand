<?php

//Since v.1.6.8 - Updated v.1.8.0 - v.1.9.1

//AUTOCOMPLETE THE VIRTUAL PRODUCTS ORDERS

//With this function your orders will be completed automaticlly, just active it and forget the processing status.

$getenableautocom = get_option('wshk_enableautocom');
if ( isset($getenableautocom) && $getenableautocom =='84')
    {

    add_action('woocommerce_order_status_changed', 'ts_auto_complete_virtual');
    function ts_auto_complete_virtual($order_id) {
    
        if ( ! $order_id ) {
        return;
        }
        
        global $product;
        $order = wc_get_order( $order_id );
        
        if ($order->data['status'] == 'processing') {
        
            $virtual_order = null;
        
            if ( count( $order->get_items() ) > 0 ) {
            
                foreach( $order->get_items() as $item ) {
                
                if ( 'line_item' == $item['type'] ) {
                
                $_product = $order->get_product_from_item( $item );
                
                if ( ! $_product->is_virtual() ) {
                // once we find one non-virtual product, break out of the loop
                    $virtual_order = false;
                break;
                } else {
                    $virtual_order = true;
                }
                }
                }
            }
        
            // if all are virtual products, mark as completed
            if ( $virtual_order ) {
            $order->update_status( 'completed' );
            }
        }
    }
}



//Since v.1.6.8 - updated v.1.9.1
    
//CUSTOM THANK YOU PAGES

//If you want redirect the users to a custom thank you page if buy some product (max 3 differents products) or redirect to a general custom thank you page, just need use this function.
    
$getenableacustomthankyoupage = get_option('wshk_enableacustomthankyoupage');
if ( isset($getenableacustomthankyoupage) && $getenableacustomthankyoupage =='87')
    {

    
    function wcs_redirect_product_based_men ( $order_id ){
    	$order = wc_get_order( $order_id );
    	
    	$myproductone = get_option('wshk_customthankyouone');
    	$myproductoneid = get_option('wshk_customthankyouoneid');
    	
    	$myproducttwo = get_option('wshk_customthankyoutwo');
    	$myproducttwoid = get_option('wshk_customthankyoutwoid');
    	
    	$myproductthree = get_option('wshk_customthankyouthree');
    	$myproductthreeid = get_option('wshk_customthankyouthreeid');
    	
    	$myproducsgeneral = get_option('wshk_customthankyougeneral');
    	
    	$miurlm = get_option( 'siteurl' );
 
    	foreach( $order->get_items() as $item ) {
    		$_product = wc_get_product( $item['product_id'] );
    		
    	  
    	  // PRODUCT ONE
    		if ( $item['product_id'] == $myproductoneid ) {
    			// change to the URL that you want to send your customer to  
                    	wp_redirect($miurlm . '/' . $myproductone);
    		}
    	  
    	  // PRODUCT TWO
    	  else if ( $item['product_id'] == $myproducttwoid ) {
    			// change to the URL that you want to send your customer to  
                    	wp_redirect($miurlm . '/' . $myproducttwo);
    		}
    	  
    	  //PRODUCT THREE
    	  else if ( $item['product_id'] == $myproductthreeid ) {
    			// change to the URL that you want to send your customer to  
                    	wp_redirect($miurlm . '/' . $myproductthree);
    		}
    	  
    	  //GENERAL OR OTHER PRODUCTS
    	  else {
    			// change to the URL that you want to send your customer to  
                    	wp_redirect($miurlm . '/' . $myproducsgeneral);
    		}
    	  
    	}
    }
    add_action( 'woocommerce_thankyou', 'wcs_redirect_product_based_men' );
}



//Since 1.8.5 - updated v.1.9.1

//DISABLE THE NEW WOOCOMMERCE DASHBOARD

$getdisablenewdashboardwc = get_option('wshk_disablenewdashboardwc');
if ( isset($getdisablenewdashboardwc) && $getdisablenewdashboardwc =='1851')
    {
    
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        add_filter( 'woocommerce_admin_disabled', '__return_true' );
    }
}



//Since v.1.6.8 - updated v.1.9.1

//ADD THE NAME AND SURNAME FIELDS IN WC REGISTER FORM

$getwcregisterformfieldsextra = get_option('wshk_wcregisterformfieldsextra');
if ( isset($getwcregisterformfieldsextra) && $getwcregisterformfieldsextra =='93')
    {

    // 1. ADDING
     
    add_action( 'woocommerce_register_form_start', 'wshk_add_name_woo_account_registration' );
     
    function wshk_add_name_woo_account_registration() {
        ?>
     
        <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
        </p>
     
        <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
        </p>
     
        <div class="clear"></div>
     
        <?php
    }
     
    
    // VALIDATING
     
    add_filter( 'woocommerce_registration_errors', 'wshk_validate_name_fields', 10, 3 );
     
    function wshk_validate_name_fields( $errors, $username, $email ) {
        if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
            $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
        }
        if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
            $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
        }
        return $errors;
    }
     
    
    // SAVING
     
    add_action( 'woocommerce_created_customer', 'wshk_save_name_fields' );
     
    function wshk_save_name_fields( $customer_id ) {
        if ( isset( $_POST['billing_first_name'] ) ) {
            update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
            update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
        }
        if ( isset( $_POST['billing_last_name'] ) ) {
            update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
            update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
        }
     
    }

}



//Since v.1.7.1 - updated v.1.9.1

//SKIP CART AND GO STRAIGHT TO CHECKOUT PAGE

//If you want send the users directly to the checkout page after press the add to cart button, just need enable this function.

$getenableskipcart = get_option('wshk_enableskipcart');
if ( isset($getenableskipcart) && $getenableskipcart =='96')
    {

    add_filter('woocommerce_add_to_cart_redirect', 'wshk_add_to_cart_redirect');
    function wshk_add_to_cart_redirect() {
     global $woocommerce;
     $checkout_url = wc_get_checkout_url();
     return $checkout_url;
    }
}



//Since v.1.3 - updated v.1.9.1

//PRODUCT THUMBNAIL IN EMAIL ORDERS

//If you want show the product image in the Order email, just enable this function.

$gettest = get_option('wshk_test');
if ( isset($gettest) && $gettest =='2')
    {    
    
    add_filter( 'woocommerce_email_order_items_args', 'wshk_woocommerce_email_order_items_args', 10, 1 );
     
    function wshk_woocommerce_email_order_items_args( $args ) {
    $emailordersizes = get_option('wshk_emailordersizes');
     
        $args['show_image'] = true;
        $args['image_size'] = array( $emailordersizes, $emailordersizes );
     
        return $args;
     
    }
}



//Since v.1.7.3 - updated v.1.9.8

//PRODUCT IMAGE IN THE ORDER DETAILS

$getenableproimage = get_option('wshk_enableproimage');
if ( isset($getenableproimage) && $getenableproimage =='8833')
    {


    add_filter( 'woocommerce_order_item_name', 'wshk_display_product_image_on_order_view_myaccount', 20, 3 );
    function wshk_display_product_image_on_order_view_myaccount( $item_name, $item, $is_visible ) {
    
        if( is_wc_endpoint_url( 'view-order' ) ) {
            
            
        $prodimagesize = get_option('wshk_prodimagesize');
        $prodbordsize = get_option('wshk_prodimagebordsize');
        $prodbordtype = get_option('wshk_prodimagebordtype');
        $prodbordcolor = get_option('wshk_prodimagebordcolor');
        $prodbordradius = get_option('wshk_prodimagebordradius');
        
        $product   = $item->get_product();
        $thumbnail = $product->get_image(array( $prodimagesize, $prodimagesize)); // change width and height into whatever you like
            if( $product->get_image_id() > 0 ) {
            
            ?>
            <style> 
            div.item-thumbnail > span > img[class*=attachment-] {
            border:<?php echo $prodbordsize;?>px <?php echo $prodbordtype;?> <?php echo $prodbordcolor;?>; 
            border-radius:<?php echo $prodbordradius;?>%;
            }
            </style>
            <?php
            
            $item_name = '
            <div class="item-thumbnail">
            <span style="margin-right:16px;">'.$thumbnail.'</span>
            </div>'.$item_name;
            }
        }
        return $item_name;
    }
}



//Since v.1.8.0 - updated v.1.9.1

//LIMIT THE NUMBER OF PRODUCTS IN THE CART

$getonlyoneincartt = get_option('wshk_onlyoneincartt');
if ( isset($getonlyoneincartt) && $getonlyoneincartt =='2009')
    {  

    add_filter( 'woocommerce_add_to_cart_validation', 'wshk_only_one_in_cart', 99, 2 );
    
    function wshk_only_one_in_cart( $passed, $added_product_id ) {
    
    global $woocommerce;
    
    // empty cart: new item will replace previous
    $_cartQty = count( $woocommerce->cart->get_cart() );
    $proincartlimit = get_option('wshk_productsincart');
    if($_cartQty >= $proincartlimit){
        $woocommerce->cart->empty_cart();   
    }
    
    // display a message if you like
    //wc_add_notice( 'Product added to cart!', 'notice' );
    
    return $passed;
    }
}



//Since v.1.8.0 - updated v.1.9.1

//CHANGE THE RETURN TO SHOP BUTTON TEXT AND ADD CUSTOM REDIRECTION

$getreturntoshopbtn = get_option('wshk_returntoshopbtn');
if ( isset($getreturntoshopbtn) && $getreturntoshopbtn =='2011')
    {    
        
    //custom button text    
    
    //Sustituir plantilla del tema por la del plugin
    add_filter( 'wc_get_template', 'wshk_cma_get_templatebtntext', 10, 5 );
    function wshk_cma_get_templatebtntext( $located, $template_name, $args, $template_path, $default_path ) {    
        if ( 'cart/cart-empty.php' == $template_name ) {
           
            $located = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/mytemplates/cart-empty.php';
        }
        
        return $located;
    }
     
    //custom redirection 
     
    $retushopurlredi = get_option('wshk_retshopurlredi'); 
    if(!isset($retushopurlredi) || trim($retushopurlredi) == ''){
    
    add_filter( 'woocommerce_return_to_shop_redirect', 'wshk_change_return_shop_url' );
     
    function wshk_change_return_shop_url() {
    return get_permalink( wc_get_page_id( 'shop' ) );
    }
    
    }else {
        
    add_filter( 'woocommerce_return_to_shop_redirect', 'wshk_change_return_shop_url' );
     
    function wshk_change_return_shop_url() {
     $retushopurlredi = get_option('wshk_retshopurlredi'); 
    return home_url($retushopurlredi);    
    }
    }
}



//Since v.1.9.1
//DISPLAY SAVING PRICE AND PERCENTAGES ON SALE PRODUCTS

$getenablesavingprices = get_option('wshk_enablesavingprices');
if ( isset($getenablesavingprices) && $getenablesavingprices =='24')
    {
        
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        //Check for use only the shortcode
        $getwshkhidesalebadge = get_option('wshkhide_salebadge');
        if ( isset($getwshkhidesalebadge) && $getwshkhidesalebadge =='shtsalebadgeonly')
            {
                //add_filter( 'woocommerce_get_price_html', 'wshk_display_savings_price_and_percentages', 20, 2 );
            } else {
                
                add_filter( 'woocommerce_get_price_html', 'wshk_display_savings_price_and_percentages', 20, 2 );
                
                
                
            }
    } else {
    
        add_filter( 'woocommerce_get_price_html', 'wshk_display_savings_price_and_percentages', 20, 2 );
        
    }
	
	function wshk_display_savings_price_and_percentages( $price_html, $product ) {
		
		$getonsalebg = get_option('wshk_onsalebg');
		$getonsalebdsize = get_option('wshk_onsalebdsize');
		$getonsalebdtype = get_option('wshk_onsalebdtype');
		$getonsalebdcolor = get_option('wshk_onsalebdcolor');
		$getonsalebdradius = get_option('wshk_onsalebdradius');
		
		$getonsaletextsize = get_option('wshk_onsaletextsize');
		$getonsaletxtweight = get_option('wshk_onsaletxtweight');
		$getonsaleftcolor = get_option('wshk_onsaleftcolor');
		$getonsaletxttransf = get_option('wshk_onsaletxttransf');
		$getonsalepadding = get_option('wshk_onsalepadding');
		
		// Only on frontend and for on sale products
		if( is_admin() || ! $product->is_on_sale() )
			return $price_html;

		// Only on archives pages - updated v.2.0
		if( ! ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_product_taxonomy() ) )
			return $price_html;

		// Variable product type
		if( $product->is_type('variable')){
			$percentages = $savings = array(); // Initializing

			// Get all variation prices
			$prices = $product->get_variation_prices();

			// Loop through variation prices
			foreach( $prices['price'] as $key => $price ){
				// Only on sale variations
				if( $prices['regular_price'][$key] !== $price ){
					// Calculate and set in the array the percentage for each variation on sale
					$percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100), 1 );
					// Calculate and set in the array the savings for each variation on sale
					$savings[]     = $prices['regular_price'][$key] - $prices['sale_price'][$key];
				}
			}

			$save_price = wc_price( max($savings) );

			if( min($percentages) !== max($percentages) ){
				$save_percentage = min($percentages) . '-' . max($percentages) . '%';
				$save_text       = __( 'Save up to:', 'woo-shortcodes-kit' );
			} else {
				$save_percentage = max($percentages) . '%';
				$save_text       = __( 'Save:', 'woo-shortcodes-kit' );
			}
		}		
		// All other product types
		else {
			$regular_price   = $product->get_regular_price();
			$sale_price      = $product->get_sale_price();
			$save_price      = wc_price( $regular_price - $sale_price );
			$save_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';
			$save_text       = __( 'Save:', 'woo-shortcodes-kit' );
		}

		return $price_html.'
		<div class="wshk-box-onsale">
		<p class="wshk-on-sale" style="
		background-color:'.$getonsalebg.';
			color:'.$getonsaleftcolor.';
			border:'.$getonsalebdsize.'px '.$getonsalebdtype.' '. $getonsalebdcolor .';
			border-radius:'.$getonsalebdradius.';
			padding:'.$getonsalepadding.';   
			text-transform:'.$getonsaletxttransf.';
			font-weight:'.$getonsaletxtweight.';
			font-size:'.$getonsaletextsize.';		
			width:fit-content;">' . sprintf( '%s %s (%s)', $save_text, $save_price, $save_percentage ) . '</p></div>';	
	}

	//Hide default sale badge - wshk_yessalebadge
	$getyessalebadge = get_option('wshk_yessalebadge');
    if ( isset($getyessalebadge) && $getyessalebadge =='wshk_nosalebadge')
    {
    	add_filter('woocommerce_sale_flash', 'wshk_custom_hide_sales_flash');
    	function wshk_custom_hide_sales_flash() {
    	return false;
    	}
    }
}



//Since v.1.9.3
//DISPLAY MAX OR MIN PRICE ON VARIABLE PRODUCTS

$getenablemaxminvariablepro = get_option('wshk_enablemaxminvariablepro');
if ( isset($getenablemaxminvariablepro) && $getenablemaxminvariablepro =='34')
    {
        
        $getminpricevarpro = get_option('wshk_minpricevarpro');
        $getmaxpricevarpro = get_option('wshk_maxpricevarpro');
        
        
        //MAX
        function wshk_variation_price_formatup( $price, $product ) {
            
        if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {    
        $getmaxtextvarpro = get_option('wshk_maxtextvarpro');
        $getmaxsuftextvarpro = get_option('wshk_sufmaxtextvarpro');
        }
        
        // Main Price
        $prices = array( $product->get_variation_price( 'max', true ), $product->get_variation_price( 'min', true ) );
        
        //Suffix empty
        if(!empty($getmaxtextvarpro) && empty($getmaxsuftextvarpro)){
            
        $price = $prices[0] !== $prices[1] ? sprintf( $getmaxtextvarpro.' '.' %s', wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        } 
        
        //Nothing empty
        else if(!empty($getmaxtextvarpro) && !empty($getmaxsuftextvarpro) ){
            
        $price = $prices[0] !== $prices[1] ? sprintf( $getmaxtextvarpro.' '.' %s'.$getmaxsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Prefix empty
        else if(empty($getmaxtextvarpro) && !empty($getmaxsuftextvarpro) ){
            
        $price = $prices[0] !== $prices[1] ? sprintf( ' %s'.$getmaxsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Default
        else {
        
        $price = $prices[0] !== $prices[1] ? sprintf( __( 'Up To: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        
        // Sale Price
        $prices = array( $product->get_variation_regular_price( 'max', true ), $product->get_variation_regular_price( 'min', true ) );
        sort( $prices );
        
        
        //Suffix empty
        if(!empty($getmaxtextvarpro) && empty($getmaxsuftextvarpro)){ 
              
        $saleprice = $prices[0] !== $prices[1] ? sprintf( $getmaxtextvarpro.' '.' %s', wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Nothing empty
        else if(!empty($getmaxtextvarpro) && !empty($getmaxsuftextvarpro) ){
            
        $saleprice = $prices[0] !== $prices[1] ? sprintf( $getmaxtextvarpro.' '.' %s'.$getmaxsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Prefix empty
        else if(empty($getmaxtextvarpro) && !empty($getmaxsuftextvarpro) ){
        $saleprice = $prices[0] !== $prices[1] ? sprintf( ' %s'.$getmaxsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Default
        else{
        $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Up To: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //grey
       
        if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
        }
        return $price;
        }
        
        //MIN
        function wshk_variation_price_format( $price, $product ) {
            
        if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {    
        $getmintextvarpro = get_option('wshk_mintextvarpro');
        $getminsuftextvarpro = get_option('wshk_sufmintextvarpro');
        }
        
        // Main Price
        $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
        
        //Suffix empty
        if(!empty($getmintextvarpro) && empty($getminsuftextvarpro)){
        
        $price = $prices[0] !== $prices[1] ? sprintf( $getmintextvarpro.' '.'%s', wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Nothing empty
        else if(!empty($getmintextvarpro) && !empty($getminsuftextvarpro)){
            
        $price = $prices[0] !== $prices[1] ? sprintf( $getmintextvarpro.' '.'%s'.$getminsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Preffix empty
        else if(empty($getmintextvarpro) && !empty($getminsuftextvarpro)){
            
        $price = $prices[0] !== $prices[1] ? sprintf( '%s'.$getminsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Default
        else {
        $price = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
         
        // Sale Price
        $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
        sort( $prices );
        
        //Suffix empty
        if(!empty($getmintextvarpro) && empty($getminsuftextvarpro)){
             
        $saleprice = $prices[0] !== $prices[1] ? sprintf( $getmintextvarpro.' '.'%s', wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Nothing empty
        else if(!empty($getmintextvarpro) && !empty($getminsuftextvarpro)){
            
        $saleprice = $prices[0] !== $prices[1] ? sprintf( $getmintextvarpro.' '.'%s'.$getminsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
        
        //Preffix empty
        else if(empty($getmintextvarpro) && !empty($getminsuftextvarpro)){
            
        $saleprice = $prices[0] !== $prices[1] ? sprintf( '%s'.$getminsuftextvarpro, wc_price( $prices[0] ) ) : wc_price( $prices[0] );    
        }
        
        //Default
        else{
            
        $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        }
         
        if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
        }
        
        return $price;
        
        }
        
        
        if ( isset($getminpricevarpro) && $getminpricevarpro =='wshk_minpricevarpro') {
            
        add_filter( 'woocommerce_variable_sale_price_html', 'wshk_variation_price_format', 10, 2 );
        add_filter( 'woocommerce_variable_price_html', 'wshk_variation_price_format', 10, 2 );
        } else {
            
        add_filter( 'woocommerce_variable_sale_price_html', 'wshk_variation_price_formatup', 10, 2 );
        add_filter( 'woocommerce_variable_price_html', 'wshk_variation_price_formatup', 10, 2 );
        }
}
?>