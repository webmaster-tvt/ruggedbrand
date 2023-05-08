<?php 

//TOTAL SHOP SALES COUNTER
// If you want to show the global orders/downloads counter on any page or post, use this Shortcode: [woo_global_sales]

// It will display the total of the orders with status: completed, on-hold and processing

// It will subtract the refunded orders from the total

$getenablethetotsalessht = get_option('wshk_enablethetotsalessht');
if ( isset($getenablethetotsalessht) && $getenablethetotsalessht =='2008')
    {

    function wshk_my_global_sales() {
    
        global $wpdb;
        
        $order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
        
        SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
        
        LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
        
        WHERE meta.meta_key = '_order_total'
        
        AND posts.post_type = 'shop_order'
        
        AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
        
        " ) );
        ob_start();
        return absint( $order_totals->total_orders).ob_get_clean();
    }
    add_shortcode('woo_global_sales', 'wshk_my_global_sales');
}



//TOTAL SHOP SALES AMOUNT COUNTER
// If you want to show the total shop sales amount counter on any page or post, use this Shortcode: [woo_total_amount]

// It will display the total amount of the orders with status: completed, on-hold and processing


//Since 1.8.4 - updated v.1.9.1

$getenablethetotsalesamount = get_option('wshk_enablethetotsalesamount');
if ( isset($getenablethetotsalesamount) && $getenablethetotsalesamount =='18401')
    {

    function wshk_get_total_sales() {
    
	    global $wpdb;

	    $order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	        SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts
	        LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	        LEFT JOIN {$wpdb->term_relationships} AS rel ON posts.ID=rel.object_ID
	        LEFT JOIN {$wpdb->term_taxonomy} AS tax USING( term_taxonomy_id )
	        LEFT JOIN {$wpdb->terms} AS term USING( term_id )
	        WHERE   meta.meta_key       = '_order_total'
	        AND     posts.post_type     = 'shop_order'
	        AND     posts.post_status   IN ( 'wc-" . implode( "','wc-", apply_filters( 'woocommerce_reports_order_statuses', array( 'completed','on-hold', 'processing' ) ) ) . "' )
	    " ) );

	    return $order_totals->total_sales;
    }
    add_shortcode('woo_total_amount', 'wshk_get_total_sales');
}



//TOTAL SHOP PRODUCTS COUNTER
//If you want to show total products on any page or post, use this Shortcode: [woo_total_product_count] 

// If you want exclude any category from the total count just add [woo_total_product_count cat_id="Here write the category ID number"]

// Now you can exclude more than one category. Just follow using the cat_id2="" and cat_id3="" attributes on the shortcode.

//Updated v.1.8.7 - v.1.9.1

$getenablethetotprosht = get_option('wshk_enablethetotprosht');
if ( isset($getenablethetotprosht) && $getenablethetotprosht =='2009')
    {

    function wshk_product_count_shortcode( $atts ) {
        
        ob_start();
        extract( shortcode_atts( array(
                'product_count' => 0
            ), $atts ) );
    
        $data = shortcode_atts( array(
            'cat_id' => '',
            'cat_id2' => '',
            'cat_id3' => '',
            'taxonomy'  => 'product_cat'
        ), $atts );
        
        // loop through all categories to collect the count.
        /*foreach (get_terms('product_cat') as $term) {
        $product_count += $term->count;
        }*/
    
       //Since v.1.3 - updated v.1.8.7
    
        $category = get_term($data['cat_id'], $data['taxonomy']);
        $categorytwo = get_term($data['cat_id2'], $data['taxonomy']);
        $categorythree = get_term($data['cat_id3'], $data['taxonomy']); 
        $count = !empty($category->count)?$category->count:0;
        $counttwo = !empty($categorytwo->count)?$categorytwo->count:0;
        $countthree = !empty($categorythree->count)?$categorythree->count:0;
        $count_posts = wp_count_posts( 'product' );
        
        //Since v.1.9.3 and v.1.1.3 PRO
        $getfakeaddprodincounter = get_option('wshk_fakeaddprodincounter');
        if(!empty($getfakeaddprodincounter)){
        $addfakecounterinc = $getfakeaddprodincounter;
        } else {
            $addfakecounterinc = '';
        }
        
        return (int)$count_posts->publish + (int)$addfakecounterinc - (int)$count - (int)$counttwo - (int)$countthree.ob_get_clean();
    }
    add_shortcode( 'woo_total_product_count', 'wshk_product_count_shortcode' );
}



//CUSTOMER PURCHASED PRODUCTS COUNTER
//With a shortcode you can show the number of products that a user bought. If you want show in any page or post, use this shortcode : [woo_total_bought_products]

//Can be added a custom preffix, suffix with singular and plural text, and text to display when the customer dont have any product bought.

//Can control the message alignment: left, center or right

//Can fix the shortcode displaying position: Im fine = not fix , Enable for view = apply fix

//Since v.1.5 - updated v.1.9.1
    
$getenablectbp = get_option('wshk_enablectbp');
if ( isset($getenablectbp) && $getenablectbp =='6')
    {

    add_shortcode( 'woo_total_bought_products', 'wshk_current_customer_month_count' );
    function wshk_current_customer_month_count( $user_id=null ) {
        
        
        
        if ( empty($user_id) ){
            $user_id = get_current_user_id();
        }
        
        // Date calculations to limit the query
        
        $today_year = date( 'Y' );
        $today_month = date( 'm' );
        $day = date( 'd' );
        
        if ($today_month == '01') {
            $month = '12';
            $year = $today_year - 1;
        } else{
            $month = $today_month - 1;
            $month = sprintf("%02d", $month);
            $year = $today_year - 1;
        }
    
        // ORDERS FOR LAST 365 DAYS (Time calculations)
        
        $wshkdefaultdays = '365';
        $getcuspurprocoundays = get_option('wshk_cuspurprocoundays');
        
        if(!empty($getcuspurprocoundays)) {
            $cuspurprocoundate = $getcuspurprocoundays;
        } else {
            $cuspurprocoundate = $wshkdefaultdays;
        }
        
        $now = strtotime('now');
        // Set the gap time (here 365 days)
        $gap_days = $cuspurprocoundate;//days
        $gap_days_in_seconds = 60*60*24*$gap_days;
        $gap_time = $now - $gap_days_in_seconds;
    
        // The query arguments
        $args = array(
            // WC orders post type
            'post_type'   => 'shop_order',        
            // Only orders with status "completed" (others common status: 'wc-on-hold' or 'wc-processing')
            'post_status' => 'wc-completed', 
            // all posts
            'numberposts' => -1,
            // for current user id
            'meta_key'    => '_customer_user',
            'meta_value'  => $user_id,
            /*'date_query' => array(
                //orders published on last 30 days
                'relation' => 'OR',
                array(
                    'year' => $today_year,
                    'month' => $today_month,
                ),
                array(
                    'year' => $year,
                    'month' => $month,
                ),
            ),*/
        );
        
        //Updated v.1.9.1
        $getyesenabletwo = get_option('wshk_yesenabletwo');
        //$getnnoenabletwo = get_option('wshk_nnoenabletwo');
        if ( isset($getyesenabletwo) && $getyesenabletwo =='wshk_yesenabletwo')
            {    
          ob_start();
        }
        else if(isset($getyesenabletwo) && $getyesenabletwo =='wshk_nnoenabletwo') {
              //ob_start();
        }
    
        // Get all customer products
        $customer_orders = get_posts( $args );
        $textprefix = get_option('wshk_textprefix');
        $textsuffix = get_option('wshk_textsuffix');
        $textpsuffix = get_option('wshk_textpsuffix');
        $textnobp = get_option('wshk_textnobp');
        $aligntheproducts = get_option('wshk_aligntheproducts');
        $caunt = 1;
        $count = 0;
        
        
        
        if (!empty($customer_orders)) {
            $customer_orders_date = array();
            // Going through each current customer orders
            foreach ( $customer_orders as $customer_order ){
                // Conveting order dates in seconds
                $customer_order_date = strtotime($customer_order->post_date);
                // Only past 365 days orders
                if ( $customer_order_date > $gap_time ) {
                    $customer_order_date;
                    $order = new WC_Order( $customer_order->ID );
                    $order_items = $order->get_items();
                    // Going through each current customer items in the order
                    foreach ( $order_items as $order_item ){
                        $count++;
                    }                
                } 
            }
        }
        
        
        //Since v.1.9.4 - v.1.1.4 PRO
        
        $getanimatedcounterpro = get_option('wshk_animatedcounterpro');
        if ( isset($getanimatedcounterpro) && $getanimatedcounterpro =='wshk_enableanimatedprod')
            {   
            
          
            echo '<p id="custopurchprod" class="wshkcounters" style="text-align:' . $aligntheproducts .';">'.$count.'</p>';
            
            
            include( WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/js/animated-counter.php' );
            
        } else {
        
            if ($count > $caunt){
            echo '<p class="wshkcounters" style="text-align:' . $aligntheproducts .';">' . $textprefix . ' ' . $count . ' ' . $textpsuffix . '</p>';
        
            }
        
            else if ($count == $caunt){
            echo '<p class="wshkcounters" style="text-align:' . $aligntheproducts .';">' . $textprefix . ' ' . $count . ' ' . $textsuffix . '</p>';
            
            } else{
                echo '<p class="wshkcounters" style="text-align:' . $aligntheproducts .';">' . $textnobp . '</p>';
                }
            
        }
               
        //Updated v.1.9.1
        $getyesenabletwo = get_option('wshk_yesenabletwo');
        //$getnnoenabletwo = get_option('wshk_nnoenabletwo');
    
        if ( isset($getyesenabletwo) && $getyesenabletwo =='wshk_yesenabletwo')
            {
          return ob_get_clean(); 
        }
        else if(isset($getyesenabletwo) && $getyesenabletwo =='wshk_nnoenabletwo') {
              //return ob_get_clean();
        }
    }
}



//CUSTOMER TOTAL ORDERS COUNTER
//Show the total orders that a user have made, if you want display in any page or post, use this shortcode: [woo_customer_total_orders]

//Can be added a custom preffix, suffix with singular and plural text, and text to display when the customer dont have any order maded.

//Can control the message alignment: left, center or right

//Can fix the shortcode displaying position: Im fine = not fix , Enable for view = apply fix

//Since v.1.5 - updated v.1.9.1
    
$getenablectbo = get_option('wshk_enablectbo');
if ( isset($getenablectbo) && $getenablectbo =='7')
    {

    add_shortcode( 'woo_customer_total_orders', 'wshk_get_customer_total_orders' );
    function wshk_get_customer_total_orders( $user_id=null ) {
    
        if ( empty($user_id) ){
            $user_id = get_current_user_id();
        }
        
        // Date calculations to limit the query
        $today_year = date( 'Y' );
        $today_month = date( 'm' );
        $day = date( 'd' );
        
        if ($today_month == '01') {
            $month = '12';
            $year = $today_year - 1;
        } else{
            $month = $today_month - 1;
            $month = sprintf("%02d", $month);
            $year = $today_year - 1;
        }
    
        // ORDERS FOR LAST 365 DAYS (Time calculations)
        
        $wshkdefaultdaysor = '365';
        $getcustotordcoundays = get_option('wshk_custotordcoundays');
        
        if(!empty($getcustotordcoundays)) {
            $custotordcoundate = $getcustotordcoundays;
        } else {
            $custotordcoundate = $wshkdefaultdaysor;
        }
        
        $now = strtotime('now');
        // Set the gap time (here 365 days)
        $gap_days = $custotordcoundate;//days
        $gap_days_in_seconds = 60*60*24*$gap_days;
        $gap_time = $now - $gap_days_in_seconds;
    
        // The query arguments
        $args = array(
            // WC orders post type
            'post_type'   => 'shop_order',        
            // Only orders with status "completed" (others common status: 'wc-on-hold' or 'wc-processing')
            'post_status' => 'wc-completed', 
            // all posts
            'numberposts' => -1,
            // for current user id
            'meta_key'    => '_customer_user',
            'meta_value'  => $user_id,
            /*'date_query' => array(
                //orders published on last 30 days
                'relation' => 'OR',
                array(
                    'year' => $today_year,
                    'month' => $today_month
                    
                ),
                array(
                    'year' => $year,
                    'month' => $month
                ),
            ),*/
            
        );
        
        
        $getyesenable = get_option('wshk_yesenable');
        if ( isset($getyesenable) && $getyesenable =='wshk_yesenable')
            {
          ob_start();
        } else if(isset($getyesenable) && $getyesenable =='wshk_nnoenable') {
              //ob_start();
          }
          
        // Get all customer orders
        
        $customer_orders = get_posts( $args );
        $tordersprefix = get_option('wshk_tordersprefix');
        $torderssuffix = get_option('wshk_torderssuffix');
        $torderspsuffix = get_option('wshk_torderspsuffix');
        $textnobo = get_option('wshk_textnobo');
        $aligntheorders = get_option('wshk_aligntheorders');
        $caunt = 1;
        $count = 0;
        
    
        if (!empty($customer_orders)) {
            $customer_orders_date = array();
            // Going through each current customer orders
            foreach ( $customer_orders as $customer_order ){
                // Conveting order dates in seconds
                $customer_order_date = strtotime($customer_order->post_date);
                // Only past 365 days orders
                if ( $customer_order_date > $gap_time ) {
                    $customer_order_date;
                    $order = new WC_Order( $customer_order->ID );
                    
                        $count++;
                                    
                }
            }
            
        }    
        
        //Since v.1.9.4 - v.1.1.4 PRO
        
        
        $getanimatedcounterord = get_option('wshk_animatedcounterord');
        if ( isset($getanimatedcounterord) && $getanimatedcounterord =='wshk_enableanimatedorde')
            {    
            
          
            echo '<p id="custototords" class="wshkcounters" style="text-align:' . $aligntheorders .';">'.$count.'</p>';
            
            
            include( WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/js/animated-counter-ord.php' );
            
        } else {
        
        
        
        
        if ($count > $caunt){
            
        echo '<p class="wshkcounters" style="text-align:' . $aligntheorders .';">' .$tordersprefix . ' ' . $count . ' ' . $torderspsuffix . '</p>' ;
        }
        
        
        else if ($count == $caunt){
            
            echo '<p class="wshkcounters" style="text-align:' . $aligntheorders .';">' . $tordersprefix . ' ' . $count . ' ' . $torderssuffix . '</p>' ;
            
        } else{
            
            echo '<p class="wshkcounters" style="text-align:' . $aligntheorders .';">' . $textnobo . '</p>';
        }
               
        
        }
        
        if(isset($getyesenable) && $getyesenable =='wshk_yesenable')
        {
          return ob_get_clean();
            
        } else if(isset($getyesenable) && $getyesenable =='wshk_nnoenable') {
            //return ob_get_clean();
        }
    
        
    
    }
}



//CUSTOMER TOTAL REVIEWS COUNTER
//Display a product reviews counter made by a user, If you want display in any page or post, use this shortcode [woo_total_count_reviews]

//Can be added a custom preffix, suffix with singular and plural text, and text to display when the customer dont have any review maded.

//Can control the message alignment: left, center or right

//Can fix the shortcode displaying position: Im fine = not fix , Enable for view = apply fix

//Since v.1.5 - Updated v.1.9.1

$getenablerwcounter = get_option('wshk_enablerwcounter');
if ( isset($getenablerwcounter) && $getenablerwcounter =='10')
    {
add_shortcode( 'woo_total_count_reviews', 'wshk_count_reviews_by_user' );
    function wshk_count_reviews_by_user(){
        $user_id = get_current_user_id();
        $args = array(
        	'user_id' => $user_id, // get the user by ID
        	'post_type' => 'product',	
                'count' => true //return only the count
        );
            
        
        $getyesenablethree = get_option('wshk_yesenablethree');
        if ( isset($getyesenablethree) && $getyesenablethree =='wshk_yesenablethree')
            {
            ob_start();
        }else if(isset($getyesenablethree) && $getyesenablethree =='wshk_nnoenablethree') {
              //ob_start();
        }
        
        $treviewprefix = get_option('wshk_treviewprefix');
        $treviewsuffix = get_option('wshk_treviewsuffix');
        $treviewpsuffix = get_option('wshk_treviewpsuffix');
        $textnoreview = get_option('wshk_textnoreview');
        $alignthereviews = get_option('wshk_alignthereviews');
        
        $comments = get_comments($args);
        
        
        //Since v.1.9.4 - v.1.1.4 PRO
        
        $getanimatedcounterrev = get_option('wshk_animatedcounterrev');
        if ( isset($getanimatedcounterrev) && $getanimatedcounterrev =='wshk_enableanimatedrevi')
            {
            
          
            echo '<p id="custoprorev" class="wshkcounters" style="text-align:' . $alignthereviews .';">'.$comments.'</p>';
            
            
            require( WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/js/animated-counter-rev.php' );
            
        } else {
        
        
        
         // Display the message if the customer has 1 review.
            if ( $comments == 1 ) {
                echo '<p class="wshkcounters" style="text-align:' . $alignthereviews .';">' . $treviewprefix . ' '  . $comments . ' ' . $treviewsuffix. '</p>';
               
            } 
             // Display this notice if the customer has more than 1 review.
            else if( $comments >= 2 ) {
                echo '<p class="wshkcounters" style="text-align:' . $alignthereviews .';">' . $treviewprefix . ' ' . $comments . ' ' . $treviewpsuffix. '</p>';
            } 
            // Display this notice if the customer hasn't reviews yet. 
            else {
                echo '<p class="wshkcounters" style="text-align:' . $alignthereviews .';">' . $textnoreview. '</p>';
            }
            
        }
        
        
        if(isset($getyesenablethree) && $getyesenablethree =='wshk_yesenablethree')
        {
            return ob_get_clean();
        }else if(isset($getyesenablethree) && $getyesenablethree =='wshk_nnoenablethree') {
              //return ob_get_clean();
        }
        
    }
    
}



//PRODUCT DOWNLOADS/SALES COUNTER 
// If you want to show the invididual product sales/downloads with an automatic counter just need activate the function.

// Can detect automatically if a product is virtual or not, to display downloads or sales.

// Can add custom text for each case: Downloads and Sales

// Can control when display the counter: All (always) custom number (when the product get these number of downloads/sales)

// Can control the style using the wshk classes

// Can be filtered with a custom shortcode to display the downloads/sales of a specific product by ID

	

/** Check if is active */

//Updated v.1.9.1 
$getenable = get_option('wshk_enable');
if ( isset($getenable) && $getenable =='1')
    {
        
    //since 1.8.9
    //Use it with the shortcode [wshk_product_sales id="ID NUMBER HERE"]
    
    $getactivationfour = get_option('wshk_sales_sht_four');
    if ( isset($getactivationfour) && $getactivationfour =='saleshtfour') {
        add_shortcode( 'wshk_product_sales', 'wshk_sales_by_product_id' );
    }
        
    function wshk_sales_by_product_id( $atts ) {
            
       $atts = shortcode_atts( array(
          'id' => ''
       ), $atts );
        
       $units_sold = get_post_meta( $atts['id'], 'total_sales', true );
       return $units_sold;
    }
    
    
	/* Start Sales Count Code */

    if(!function_exists('wshk_product_sold_count')):
          
    $getactivationone = get_option('wshk_sales_sht_one');
    if ( isset($getactivationone) && $getactivationone =='saleshtone')
    {
	    add_action( 'woocommerce_single_product_summary', 'wshk_product_sold_count', 11 );
    }
    
    $getactivationthree = get_option('wshk_sales_sht_three');
    if ( isset($getactivationthree) && $getactivationthree =='saleshtthree')
    {
	    add_action( 'woocommerce_before_add_to_cart_form', 'wshk_product_sold_count', 11 );
    }
    
    $getactivationtwo = get_option('wshk_sales_sht_two');
    if ( isset($getactivationtwo) && $getactivationtwo =='saleshttwo')
    {	
	    add_action( 'woocommerce_after_shop_loop_item', 'wshk_product_sold_count', 11 );
    }
    
    function wshk_product_sold_count() {
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $post, $woocommerce, $product;
    
    if ($product->is_downloadable('yes')) {
        
        //It will happen if the product is downloable.
    		
    		$gettext = get_option('wshk_text');
            if ( isset($gettext) && $gettext !='') {
    			$salesTxt = $gettext;
    		}else {
    			$salesTxt = __( "Downloads", "woo-shortcodes-kit" );
    		}
    		
    		$units_sold = get_post_meta( $product->id, 'total_sales', true );
    
            //Since v.1.4
    		
    		if($units_sold >= get_option('wshk_min')){
    		
    		echo '<p class="wshk wshkdow" style="margin-top:20px;"><span class="dashicons dashicons-download wshkicondow" style="padding-right:5px;"></span>' . sprintf( __( '<span class="wshk-count wshkcoudow">%s</span> <span class="wshk-text wshktxtdow">%s</span>', 'woocommerce' ), $units_sold,$salesTxt ) . '</p>';
    		
    		}
    		
    } else {
    	    
    	    // It will happen if the product is not downloable
    	    
    		$gettextsales = get_option('wshk_textsales');
            if ( isset($gettextsales) && $gettextsales !='') {
    			$saleTxt = $gettextsales;
    		}else {
    			$saleTxt = __( "Sales", "woo-shortcodes-kit" );
    		}
    		
    		$units_sold = get_post_meta( $product->id, 'total_sales', true );
    
            //Since v.1.4
    		
    		if($units_sold >= get_option('wshk_minsales')){
    		
    		echo '<p class="wshk wshksa" style="margin-top:20px;"><span class="dashicons dashicons-cart wshkiconsa" style="padding-right:5px;"></span>' . sprintf( __( '<span class="wshk-count wshkcousa">%s</span> <span class="wshk-text wshktxtsa">%s</span>', 'woocommerce' ), $units_sold,$saleTxt ) . '</p>';
    		   
    		}
    	} 
    } 
    endif;
}


//PRODUCT PURCHASES BY CURRENT LOGGED IN USER COUNTER

$getpropurchbyuseropt = get_option('wshk_enablepropurchtimes');
if ( isset($getpropurchbyuseropt) && $getpropurchbyuseropt =='200720190')
    {
        
    // Product purchases by current logged in user
    //SHORTCODE SYNTAX: [woo_product_purchases id="123"]
  
    add_shortcode( 'woo_product_purchases', 'wshk_user_logged_in_product_bought' );
    function wshk_user_logged_in_product_bought( $atts ) {
        
       // GET PRODUCT ID FROM SHORTCODE
       $atts = shortcode_atts( array(
            'id' => '0'
        ), $atts );
        
       // GET CURRENT USER ORDERS
       /*$current_user = wp_get_current_user();   
       $customer_orders = wc_get_orders(
          array(
             'limit'    => -1,
             'status'   => array( 'completed', 'processing'),
             'customer' => get_current_user_id(),
          )
       );*/
       
       
       if ( empty($user_id) ){
            $user_id = get_current_user_id();
        }
        // The query arguments
        $args = array(
            // WC orders post type
            'post_type'   => 'shop_order',        
            // Only orders with status "completed" (others common status: 'wc-on-hold' or 'wc-processing')
            'post_status' => 'wc-completed', 
            // all posts
            'numberposts' => -1,
            // for current user id
            'meta_key'    => '_customer_user',
            'meta_value'  => $user_id,
            
        );
        
        $customer_orders = get_posts( $args );
        
       // LOOP THROUGH ORDERS AND SUM QUANTITIES PURCHASED
       $count = 0;
       foreach ( $customer_orders as $customer_order ) {
          $order = new WC_Order( $customer_order->ID );
          $items = $order->get_items();
          foreach ( $items as $item ) {
             $product_id = $item->get_product_id();
             if ( $product_id == $atts['id'] ) {
                //$count = $count + absint( $item['qty'] ); 
                $count++;
             }
          }
       }
        
       // RETURN HTML
       return $count;
        
    }
}





/*function wshk_get_purchased_products() {
    $products = array();

    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => - 1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed' // Only orders with status "completed"
    ) );

    // Going through each current customer orders
    foreach ( $customer_orders as $customer_order ) {
        $order    = wc_get_order( $customer_order );
        $items    = $order->get_items();

        // Going through each current customer products bought in the order
        foreach ( $items as $item ) {
            $id = $item['product_id'];

            // If product not in array, add it
            if ( ! array_key_exists( $item['product_id'], $products ) ) {
                $products[ $id ] = array(
                    'name' => $item['name'],
                    'count' => 0,
                );
            }

            // Increment Product `count` from cart quantity
            $products[ $id ]['count'] += $item['qty'];
        }
        
       
    }
 //foreach ( $products as $id => $product ) {
     //$thumbnail = get_the_post_thumbnail_url($id);
     //$tumbn = '<img src="'.$thumbnail.'" style="max-width:100px;height:100px !important;border-radius:100%;" />';
    //echo "<p>$tumbn <b>$product[name]</b> bought $product[count] times</p>";
    
//}
    //return $products;
    //var_dump($products);
    
}*/

/*add_shortcode('user_bought_products_list','el_shortocde');
function el_shortocde($products){
     
    echo'
    <style>
    #wshkprodbougtable th
    {
    text-align: center; 
    vertical-align: middle;
    }
    
    #wshkprodbougtable td
    {
    text-align: center; 
    vertical-align: middle;
    }
    
    .divdeprueb {
        display: table-cell;
        vertical-align:middle;
    }
    
    .prodidlinktitle{
        color:#321a51;
        ;
    }
    
    .prodidlink {
        background-color:#321a51;
        color:white !important;
        padding:10px 20px;
        border-radius:6px;
        font-weight:400;
        font-size:17px;
        line-height:1.5;
    }
    </style>
    <table width="100%" id="wshkprodbougtable" style="width:100%;">
    <tr>
    <th>Product</th>
    <th>Times bought</th>
    <th>Actions</th>
    </tr>
    
    ';
foreach ( wshk_get_purchased_products() as $id => $product ) {
    $prodidlink = get_permalink($id);
     $thumbnail = get_the_post_thumbnail_url($id);
     $tumbn = '<img src="'.$thumbnail.'" style="height: 64px;width: 64px; border-radius: 50%; object-fit: cover" />';
    //echo "<p>$tumbn <b>$product[name]</b> bought $product[count] times</p>";
    echo'
    <tr>
    <td style="text-align:left !important;vertical-align: middle;">
    <div class="divdeprueb" style="padding:10px;">'.$tumbn.'</div> <div class="divdeprueb" style="font-size:20px;"><a class="prodidlinktitle" href="'.$prodidlink.'" target="_blank">'.$product['name'].'</a></div></td>
    <td>'.$product['count'].'</td>
    <td><a class="prodidlink" href="'.$prodidlink.'" target="_blank">View Product</a></td>
    </tr>';
}
echo'</table>';
//var_dump($product);
}*/


?>