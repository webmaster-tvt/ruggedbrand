<?php 

//Since v.1.5

//SHOW ONLY PRODUCTS FROM SPECIFIC CATEGORIES ON THE SHOP PAGE
//if you want display only specifics categories in the shop page, just write the slug of each category

$getenablecat = get_option('wshk_enablecat');
if ( isset($getenablecat) && $getenablecat =='4')
    {

    function wshk_specifics_categories( $q ) {
    
    //Since 1.6.2 - To fix the problem was hide the products in categories page.
    //New Display options since v.1.9.0
    
    $catsearchopt = get_option('wshk_display_cats_search');
    $prodincats = get_option('wshk_hide_prodin_cats');
    $psearchh = ($catsearchopt == 'catsearchopt') ? !is_search(): is_shop();
    $pcatee = ($prodincats == 'prodincats') ? is_product_category(): is_shop() && !is_search();
    
        if (! is_admin() && is_shop() && $psearchh || $pcatee){  
    
        $cat1 = get_option('wshk_firstcat');
        $cat2 = get_option('wshk_secondcat');
        $cat3 = get_option('wshk_thirdcat');
        $tax_query = (array) $q->get( 'tax_query' );
        
        $tax_query[] = array(
               'taxonomy' => 'product_cat',
               'field' => 'slug',
               'terms' => array( $cat1, $cat2, $cat3 ), // Display only products of these categories on the shop page.
               'operator' => 'IN'
        );
        $q->set( 'tax_query', $tax_query );
        }
    }
    add_action( 'woocommerce_product_query', 'wshk_specifics_categories' );
}



//Since v.1.6.4

//EXCLUDE PRODUCTS FROM SPECIFIC CATEGORIES ON THE SHOP PAGE
//If you want exclude products of some categories, just need enable this function and write the category slug to exlude in each field. You can exclude 3 categories how much by now.
    
$getexcludecat = get_option('wshk_excludecat');
if ( isset($getexcludecat) && $getexcludecat =='16')
    {
    
    function wshk_exclude_categories( $q ) {
        
    //New Display options since v.1.9.0
    
    $excatsearchopt = get_option('wshk_display_excats_search');
    $exprodincats = get_option('wshk_hide_exprodin_cats');
    $expsearchh = ($excatsearchopt == 'excatsearchopt') ? !is_search(): is_shop();
    $expcatee = ($exprodincats == 'exprodincats') ? is_product_category(): is_shop() && !is_search();
        
        if ( ! is_admin() && is_shop() && $expsearchh || $expcatee){ 
        $excat1 = get_option('wshk_exfirstcat');
        $excat2 = get_option('wshk_exsecondcat');
        $excat3 = get_option('wshk_exthirdcat');
        $tax_query = (array) $q->get( 'tax_query' );
        
        $tax_query[] = array(
               'taxonomy' => 'product_cat',
               'field' => 'slug',
               'terms' => array( $excat1, $excat2, $excat3 ),
               'operator' => 'NOT IN'
        );
        $q->set( 'tax_query', $tax_query );
        }
    }
    add_action( 'woocommerce_product_query', 'wshk_exclude_categories' );
}



//Since v.1.4

//PRODUCTS PER PAGE MANAGER
//if you want manage the product per page to display in shop page, just enable the function and write the number of products to display (Write -1 to show all product in the same page)

$getperpage = get_option('wshk_perpage');
if ( isset($getperpage) && $getperpage =='3')
    {

    //Updated v.1.7.8
    
    $theme = wp_get_theme(); // gets the current theme
    if ( 'Divi' == $theme->name || 'Divi' == $theme->parent_theme ) {
        
        // if you're here Divi is the active theme or is
        // the current theme's parent theme
        
        add_filter( 'option_et_divi', function( $option ){
    	$option['divi_woocommerce_archive_num_posts'] = get_option("wshk_nperpage");
    	return $option;
    } );
        
    } else {
    
    function wshk_loop_shop_per_page( $cols ) {
        
    // $cols contains the current number of products per page.
    // Return the number of products you wanna show per page.
    
      $cols = get_option("wshk_nperpage");
      $catcols = get_option("wshk_nperpagecats");
      //Since v.1.9.8
    	    if(is_product_category()){
    	        return $catcols;
    	    }else{
      return $cols;
    	    }
    }
    add_filter( 'loop_shop_per_page', 'wshk_loop_shop_per_page', 999 );
    //add_filter( 'loop_shop_per_page', create_function( '$cols', 'return get_option("wshk_nperpage");' ), 20 );
    }
}



//Since v.1.5

//CONDITIONAL ADD TO CART BUTTON FOR PURCHASED PRODUCTS
// The button's text will change in the single product shop page loop & single product summary, when the user have purchase the product. Just need Enable the function and write the text to show.
    
$getenablebought = get_option('wshk_enablebought');
if ( isset($getenablebought) && $getenablebought =='5')
    {

    add_filter('woocommerce_loop_add_to_cart_link','wshk_add_to_cart_link_customer_has_bought');
    //add_filter( 'woocommerce_product_single_add_to_cart_text', 'wshk_add_to_cart_link_customer_has_bought' );

    function wshk_add_to_cart_link_customer_has_bought() {

        global $product;

        if( empty( $product->id ) ){

            $wc_pf = new WC_Product_Factory();
            $product = $wc_pf->get_product( $id );

        }

        $current_user = wp_get_current_user();

        if( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id ) ){

            $product_url = get_permalink();
            $textbutton = get_option('wshk_buttontext');
            $button_label =  $textbutton;  

        } else {

            $product_url =  $product->add_to_cart_url();  
            $button_label = $product->add_to_cart_text();

        };
        
        /*OLD class = single_%s button product_type_simple add_to_cart_button ajax_add_to_cart single_add_to_cart_button button alt*/
        
        echo sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class=" single_%s button product_type_simple ajax_add_to_cart" style="text-decoration:none;">%s</a>',       
            esc_url( $product_url ),
            esc_attr( $product->id ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            //esc_attr( $product->product_type ),
            esc_html( $button_label )
        );
    }
    
    
    
    /*Compatible with change ADD TO CART text function*/
    //Since v.1.7.9
    function wshk_compatibles(){
        
    //Check if change add to cart text function is enabled
        
    $getenableaddtocarttxt = get_option('wshk_enableaddtocarttxt');
    if ( isset($getenableaddtocarttxt) && $getenableaddtocarttxt =='14')
    {
        //Do nothing
       
    } else {
        
        global $product;
        global $post;

        if( empty( $product->id ) ){

            $wc_pf = new WC_Product_Factory();
            $product = $wc_pf->get_product( $id );
        }

        $current_user = wp_get_current_user();

        if( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id ) ){

            $product_url = get_permalink();
            $textbutton = get_option('wshk_buttontext');
            $button_label =  $textbutton;  

        } else {

            $product_url =  $product->add_to_cart_url();  
            $button_label = $product->add_to_cart_text();

        };
    
    /*Check if is external product*/
    
    if( $product->is_type('external') ){
        
        return $button_label = $product->add_to_cart_text();
      
    } else {
    
        echo sprintf( '<span style="text-decoration:none;">' .$button_label. '</span>'
        );
     };  // FIN external product check
    }; // FIN compatibilidad
    }// Fin funcion principal
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'wshk_compatibles' );
} // FIN condicional



//Since v1.5

//CHANGE THE ADD TO CART BUTTON TEXT
//If you want change the add to cart button text for: external, grouped, simple, and variable products, just activate this function and change the texts. If the function is active, you need complet all the fields.  

//You can combine the function with the external button text from the product page, just leave blank the field and it will display the button text configured from the product page settings.

//Since 1.8.7 - You can combine this function with Woo subscriptions, the function will detect if the product type is subscription and will display the text added from the WooCommerce > Settings > Subscritions.

$getenableaddtocarttxt = get_option('wshk_enableaddtocarttxt');
if ( isset($getenableaddtocarttxt) && $getenableaddtocarttxt =='14')
    {

    function wshk_custom_woocommerce_product_add_to_cart_text() {
    
    	global $product;
    	
    	$atctxtexternal = get_option('wshk_atctxtexternal');
    	$atctxtgrouped = get_option('wshk_atctxtgrouped');
    	$atctxtsimple = get_option('wshk_atctxtsimple');
    	$atctxtvariable = get_option('wshk_atctxtvariable');
    	//$product_type = $product->product_type;
    	$getcustomtxtdownbtn = get_option('wshk_customtxtdownbtn');
    	
    	
    	//Since v.1.9.1 - Compatibility with WCM
    	
    	if ( in_array( 'woocommerce-memberships/woocommerce-memberships.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    	    
        	$frontend = wc_memberships()->get_frontend_instance();
    		$members_area = $frontend ? $frontend->get_members_area_instance() : null;
    		
    		if ( $members_area && is_account_page() ) {
    		    $product_type = $product;
    		    
    		} else {
    		    $product_type = $product->product_type;
    		}
    		
    	} else {
    	    $product_type = $product->product_type;
    	}
    	
    	//since v.1.9.1 - detect the downloadable products
    	if ($product && $product->is_downloadable('yes')) {
    	//if ($product->is_downloadable('yes')) {
    	
    	    if(! empty($getcustomtxtdownbtn)){
		        return __( $getcustomtxtdownbtn, 'woocommerce' );
    	    } else {
    	        
    	        //if downloadable field is empty on function, display the text by product type
    	        switch ( $product_type ) {
        		case 'external' :
        		    if(! empty($atctxtexternal)){
        			return __( $atctxtexternal, 'woocommerce' );
        		    } else {
        		        return $product->button_text;
        		        
        		    }
        		break;
        		    
        		case 'grouped':
        		    if(! empty($atctxtgrouped)){
        			return __( $atctxtgrouped, 'woocommerce' );
        		    } else {
        		       return __( 'View products', 'woocommerce' );
        		       
        		        
        		    }
        		break;
        		
        		case 'simple':
        		    if(! empty($atctxtsimple)){
        			return __( $atctxtsimple, 'woocommerce' );
        		    } else {
        		        return __( 'Add to cart', 'woocommerce' );
        		        
        		    }
        		break;
        		
        		case 'subscription':
        		    if(! empty(get_option('woocommerce_subscriptions_add_to_cart_button_text'))){
        			return __( get_option('woocommerce_subscriptions_add_to_cart_button_text'), 'woocommerce' );
        		    } else {
        		        return __( get_option('woocommerce_subscriptions_add_to_cart_button_text'), 'woocommerce' );
        		        
        		    }
        		break;
        		
        		case 'variable':
        		    if(! empty($atctxtvariable)){
        			return __( $atctxtvariable, 'woocommerce' );
        		    } else {
        		        return __( 'Select options', 'woocommerce' );
        		        
        		    }
        	    } 
    	    }
		
	    } else {
    	//if not is downloadable product then check between product types
    	switch ( $product_type ) {
    		case 'external' :
    		    if(! empty($atctxtexternal)){
    			return __( $atctxtexternal, 'woocommerce' );
    		    } else {
    		        return $product->button_text;
    		        
    		    }
    		break;
    		    
    		case 'grouped':
    		    if(! empty($atctxtgrouped)){
    			return __( $atctxtgrouped, 'woocommerce' );
    		    } else {
    		       return __( 'View products', 'woocommerce' );
    		       
    		        
    		    }
    		break;
    		
    		case 'simple':
    		    if(! empty($atctxtsimple)){
    			return __( $atctxtsimple, 'woocommerce' );
    		    } else {
    		        return __( 'Add to cart', 'woocommerce' );
    		        
    		    }
    		break;
    		
    		case 'subscription':
    		    if(! empty(get_option('woocommerce_subscriptions_add_to_cart_button_text'))){
    			return __( get_option('woocommerce_subscriptions_add_to_cart_button_text'), 'woocommerce' );
    		    } else {
    		        return __( get_option('woocommerce_subscriptions_add_to_cart_button_text'), 'woocommerce' );
    		        
    		    }
    		break;
    		
    		case 'variable':
    		    if(! empty($atctxtvariable)){
    			return __( $atctxtvariable, 'woocommerce' );
    		    } else {
    		        return __( 'Select options', 'woocommerce' );
    		        
    		    }
    	} }
    	//Since v.1.9.1 - Compatibility with WCM
    	if ( $members_area && is_account_page() ) {
    	    $wcmcustombtntxt = '';
    	    if(! empty($wcmcustombtntxt)){
    			return __( $wcmcustombtntxt, 'woocommerce' );
    		    } else {
    		        return __( 'Add to cart', 'woocommerce' );
    		        
    		    }
    	    
    	}
    }
    
    add_filter( 'woocommerce_product_add_to_cart_text' , 'wshk_custom_woocommerce_product_add_to_cart_text' ); 
    
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'wshk_custom_woocommerce_product_add_to_cart_text' );
}



//Since v.1.6.8

//BUILD A NEW SHOP PAGE FROM SCRATCH
//If you want make your custom shop page, just need use this function.

$getenableacustomshopage = get_option('wshk_enableacustomshopage');
if ( isset($getenableacustomshopage) && $getenableacustomshopage =='85')
    {
    
    // Add to cart page
    
    /*add_action( 'woocommerce_check_cart_items', 'skyverge_empty_cart_notice' );*/
    add_action( 'woocommerce_cart_is_empty', 'wshk_empty_cart_notice', 99 );

    function wc_empty_cart_redirect_url() {
        
        $mycustomshopurl = get_option('wshk_shopageslug');
        $miurl = get_option( 'siteurl' );
    	return $miurl. '/' .$mycustomshopurl;
        
    }
    add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );

    function wshk_empty_cart_notice() {
        
    	if ( WC()->cart->get_cart_contents_count() == 0 ) {
    	/*wc_print_notice( __( 'Get free shipping if your order is over &#36;60!', 'woocommerce' ), 'notice' );*/
    	
    	// Change notice text as desired
    	  
    	 ?><p class="return-to-shop">
    		<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
    			<?php _e( 'Return to shop', 'woocommerce' ) ?>
    		</a>
    	</p><?php
    	}
    }
    

//Since 1.8.7

    //remove visit store link on wp admin bar
    function wshk_remove_admin_bar_links() {
        
        global $wp_admin_bar;
        
        //$wp_admin_bar->remove_menu('view-site');  // Remove the view site link
        $wp_admin_bar->remove_menu('view-store'); // Remove the view store link
        //$wp_admin_bar->remove_menu('site-name');  // Remove the site name menu
    }    
    add_action( 'wp_before_admin_bar_render', 'wshk_remove_admin_bar_links' );


//Since 1.8.7

    // Add Custom Visit store Link on wp admin bar
    function wshk_toolbar_link($wp_admin_bar) {
        $args = array(
            'parent' => 'site-name',
            'id' => 'wshkcustomshop',
            'title' => __( 'Visit Store', 'woocommerce' ),
            'href' => esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ),
            'meta' => array(
                'class' => 'wshkcustomshop',
                'title' => __( 'Visit Store', 'woocommerce' )
            )
        );
        $wp_admin_bar -> add_node($args);
    }
    add_action('admin_bar_menu', 'wshk_toolbar_link', 999);
}
?>