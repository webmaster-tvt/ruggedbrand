<?php 



//Since v.1.5 - Updated in v.1.7.9 -v.1.9.1

//CUSTOMER PURCHASED PRODUCTS LOOP
//if you want display which products has bought a user, use this Shortcode: [woo_bought_products]

//Can control the number of columns to display the bought products loop.

$getenabletheboughtsht = get_option('wshk_enabletheboughtsht');
if ( isset($getenabletheboughtsht) && $getenabletheboughtsht =='2010')
    {

    add_shortcode( 'woo_bought_products', 'wshk_user_products_bought' );
     
    function wshk_user_products_bought() {
        //global $product, $woocommerce, $woocommerce_loop;
        $columns = get_option('wshk_bougcolumnum');
     
        // GET USER
        $current_user = wp_get_current_user();
        
        // GET USER ORDERS (COMPLETED + PROCESSING)
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => $current_user->ID,
            'post_type'   => wc_get_order_types(),
            //'post_status' => array_keys( wc_get_order_statuses() ),
            'post_status' => array_keys( wc_get_is_paid_statuses() ),
        ) );
    
     
        // LOOP THROUGH ORDERS AND GET PRODUCT IDS
        if ( ! $customer_orders ) return;
        $product_ids = array();
        foreach ( $customer_orders as $customer_order ) {
            $order = new WC_Order( $customer_order->ID );
            //$order = wc_get_order( $customer_order->ID );
            $items = $order->get_items();
            foreach ( $items as $item ) {
                $product_id = $item->get_product_id();
                $product_ids[] = $product_id;
            }
        }
        $product_ids = array_unique( $product_ids );
     
        // QUERY PRODUCTS
        $args = array(
           'post_type' => 'product',
           'post__in' => $product_ids,
        );
        $loop = new WP_Query( $args );
     
        // GENERATE WC LOOP
        ob_start();
        woocommerce_product_loop_start();
        while ( $loop->have_posts() ) : $loop->the_post();
        wc_get_template_part( 'content', 'product' ); 
        endwhile; 
        woocommerce_product_loop_end();
        woocommerce_reset_loop();
        wp_reset_postdata();
    
        //DISPLAY CONTENT
          return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
    }
    

    //Since v.1.9.1 - Change number or products per row
    //Customize the class - products columns-$columns
     
    add_filter('loop_shop_columns', 'loop_columns', 999);
    if (!function_exists('loop_columns') ) {
        
    	function loop_columns() {
    	    $columns = get_option('wshk_bougcolumnum');
    	    //Since v.1.9.7
    	    if(is_product_category()){
    	        return;
    	    }else{
    		return $columns; // change the products per row 
    	    }
    	} 
    }
}



//Since v.1.5 - updated v.1.9.1

//CONDITIONAL MESSAGE TO THE CUSTOMER ACCORDING TO THEIR NUMBER OF ORDERS
//Show a custom message if the customer has a number of orders made, if you want display in any page or post, use this shortcode: [woo_message]

$getenablewmessage = get_option('wshk_enablewmessage');
if ( isset($getenablewmessage) && $getenablewmessage =='8')
    {

    function wshk_detect_customer_total_orders() {
        
        // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) );
        
        $customer = wp_get_current_user();
      
        // Order count for a "loyal" customer
        $setnumber =  get_option('wshk_wmorders');
        $textwmssg =  get_option('wshk_textwmssg');
        $textnonotice = get_option('wshk_nonotice');
        $textmorenotice = get_option('wshk_morenotice');
        $orders_count =  $setnumber;
        //$descuento = 20;
        
       
        ob_start();
        // Check if the message is empty for don't display nothing
        $notice_text = sprintf( $textwmssg, $customer->display_name, $orders_count );
        if (empty($textwmssg)) {
        return false;
        }
         // Display this notice if the customer has less orders than the orders number selected in the plugin settings.
        if ( count( $customer_orders ) < $orders_count ) {
            echo $textnonotice;
        }
         // Display this notice if the customer has more orders than the orders number selected in the plugin settings.
        if ( count( $customer_orders ) > $orders_count ) {
            echo $textmorenotice;
        }
        // Display the message if the customer has the same number of orders than the orders number selected in the plugin settings.
        if ( count( $customer_orders ) == $orders_count ) {
            //wc_print_notice( $notice_text, 'notice' );
            echo $notice_text;
        }
        return ob_get_clean();
    }
    add_shortcode( 'woo_message', 'wshk_detect_customer_total_orders' );
}



//Since v.1.6.6 - Updated v.1.8.0 -v.1.9.1

//DISPLAY ALL THE PRODUCTS REVIEWS WHERE YOU WANT
//Display the product valorations made by all the users, If you want display in any page or post, use this shortcode [woo_display_reviews]

$getenabledisplayreviews = get_option('wshk_enabledisplayreviews');
if ( isset($getenabledisplayreviews) && $getenabledisplayreviews =='40')
    {

    function wshk_get_woo_reviews($atts, $content = null) {
        
    ob_start();
    $disreacreviews =  get_option('wshk_enabledisplayreviews');
    $disretextavsize =  get_option('wshk_disretextavsize');
    $disretextavbdsize = get_option('wshk_disretextavbdsize');
    $disretextavbdradius = get_option('wshk_disretextavbdradius');
    $disretextavbdtype = get_option('wshk_disretextavbdtype');
    $disretextavbdcolor = get_option('wshk_disretextavbdcolor');
    $disretexttbwsize = get_option('wshk_disretexttbwsize');
    
    $disretextbxfsize =  get_option('wshk_disretextbxfsize');
    
    $disretextbxbdsize = get_option('wshk_disretextbxbdsize');
    $disretextbxbdradius = get_option('wshk_disretextbxbdradius');
    $disretextbxbdtype = get_option('wshk_disretextbxbdtype');
    $disretextbxbdcolor = get_option('wshk_disretextbxbdcolor');
    $disretextbxbgcolor = get_option('wshk_disretextbxbgcolor');
    $disretextbxpadding = get_option('wshk_disretextbxpadding');
    $disretextbxminheight = get_option('wshk_disretextbxminheight');
    
    $disretextlinktarget = get_option('wshk_disretextlinktarget');
    $disretextlinktxd = get_option('wshk_disretextlinktxd');
    $disretextlinktxtsize = get_option('wshk_disretextlinktxtsize');
    $disretextlinktxtcolor = get_option('wshk_disretextlinktxtcolor');
    
    $disredisplaynumber = get_option('wshk_disredisplaynumber');
    $disrecolumnsnumber = get_option('wshk_disrecolumnsnumber');
    $disretextmargintop = get_option('wshk_disretextmargintop');
    $disretextcolor = get_option('wshk_disretextcolor');
    $limitationtype = get_option('wshk_showpoints');
    $llimitlinktext = get_option('wshk_readmoretextlim');
    
    
    if(!isset($llimitlinktext) || trim($llimitlinktext) == ''){
       $limitlinktext = __('Read more', 'woo-shortcodes-kit');
    } else {
       $limitlinktext = $llimitlinktext; 
    }
    
    
    $limitcomm = get_option('wshk_limitcomm');
    
    if(!isset($limitcomm) || trim($limitcomm) == ''){
        $limitationquantity = '300'; 
    } else {
        $limitationquantity = get_option('wshk_limitcomm');  
    }
    
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
    
    
    /* Updated in v.1.8.3 */
    
    //Now you can use the shortcode in differents pages and display different number of reviews in each one. 
    //Just need use this shortcode [woo_display_reviews number="all"] you can replace all with the number of reviews that you want display.
        
    $count = 0;
    $html_r = "";
    $title="";
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $number = $disredisplaynumber; // all for show all the comments, for other quantity just write the number 1,2,3,4...
    
    $offset = ( (int)$paged - 1 ) * (int)$number;
    $args = shortcode_atts(array(
      'number' => $number,
        'offset' => $offset,
        'paged' => $paged,
    'post_type' => 'product',
    ), $atts);
    ?> 
      <style>
      .wshk-grava {
    border: <?php echo $disretextavbdsize ?>px <?php echo $disretextavbdtype ?> <?php echo $disretextavbdcolor ?> !important;
    border-radius: <?php echo $disretextavbdradius ?>% !important;
    margin-top: <?php echo $disretextmargintop ?>px !important;
    
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
        float: right !important;
        overflow: hidden;
        position: relative;
        height: 1em;
        line-height: 1 !important;
        font-size: 1em;
        width: 5.4em;
        font-family: star !important;
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
    
    
    @media screen and (max-width: 659px) and (min-width: 320px) { 
       .wshk-reviews{ 
        display: initial;
       }
    }
    </style>
    
    <?php
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
    $id_or_email = get_current_user_id();
    
    
    $ccomments = get_comments($args);
    $publishedby = __( 'Published by', 'woo-shortcodes-kit' );  
    $publishedon = __( 'on', 'woo-shortcodes-kit' );
    
    foreach($comments as $comment) :
        
    //Since v.1.8.1
    // strip tags to avoid breaking any html
    $comment->comment_content = strip_tags($comment->comment_content);
    if (strlen($comment->comment_content) > $limitationquantity) {
    $url = home_url();
        // truncate string
        $stringCut = substr($comment->comment_content, 0, $limitationquantity);
        $endPoint = strrpos($stringCut, ' ');
    
        //if the string doesn't contain any space then it will cut without word basis.
        $comment->comment_content = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        
        if ($limitationtype == 'showlin') {
            
        $comment->comment_content .= '... <a href="' . $url . '/?p=' . $comment->comment_post_ID . '/#'.$commentstablink. '" target="'.$disretextlinktarget . '">'.$limitlinktext.'</a>'; 
        } else {
        $comment->comment_content .= '...';
            
        }
    }
        
        
        
        $ccomment = get_comments($args);
     /*New from v.1.6.9.a - Updated v.1.8.0*/
        
      $coauema = $comment->comment_author_email;
      $tspermalink = get_permalink($comment->comment_post_ID);
      $ggravatar = get_avatar( $coauema, $disretextavsize, null, null, array('class' => array('wshk-grava') ) ) . ' ';
      
      // Updated v.1.8.3
    $title = '<div style="border:'. $disretextbxbdsize. 'px ' . $disretextbxbdtype . ' ' .  $disretextbxbdcolor .'; border-radius:' . $disretextbxbdradius .'px;background-color:' .$disretextbxbgcolor .';color: '.$disretextcolor .' ;padding:' . $disretextbxpadding . 'px;max-width:100%;min-height:' . $disretextbxminheight .'px;max-height:' . $disretextbxminheight .'px;height:100%;margin-bottom: 20px;font-size:' .$disretextbxfsize . 'px;"><a class="wshkreviprolink" style="position:absolute;font-size:' . $disretextlinktxtsize . 'px; color:' . $disretextlinktxtcolor . ';text-decoration:' . $disretextlinktxd . ';" href="' . $tspermalink . '#comment-' . (strval($comment->comment_ID)) . '" target="' .$disretextlinktarget . '">'.get_the_title( $comment->comment_post_ID ).'</a>';
    
    
      //Updated v.1.8.3
    $html_r = $html_r. $title.'<span style="float:right;" class="wshk star-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><span style="width:' . ( get_comment_meta( $comment->comment_ID, 'rating', true ) / 5 ) * 100 . '%"><strong itemprop="ratingValue">' . get_comment_meta( $comment->comment_ID, 'rating', true ) . '</strong></span></span><br />';
      
    $html_r = $html_r. '
    <table class="wshktabborder" style="border: 0px solid transparent;"><tr><td class="wshkreviewsgrav" width="' .$disretexttbwsize . 'px"><span>' .$ggravatar.'</span></td>';
    
    
    $html_r = $html_r.'<td class="wshkreviewsgravdata"><span class="wshkpublishedtext"><small>'. $publishedby .'</small></span><span class="wshkcomauthor"><small><strong>'.' '.$comment->comment_author. '</strong></small></span><span class="wshkontext"><small>'. ' ' .$publishedon.'</small></span><span class="wshkcomdate"><small> '. get_comment_date( "", $comment) . '</small></span></td></tr></table>';
    
    $html_r = $html_r. '<div class="wshkcommenttext" style="padding-left: 0px;">' .$comment->comment_content.'<br /></div></div>';
    
    
    /*$html_r = $html_r."<small>Publicado por ".$comment->comment_author." el ".$comment->comment_date. "</small></div>";*/
      
        
    endforeach;
    //Since v.1.8.3
    
      if($disrecolumnsnumber == 2){
    return '
    <style>
      span.allwshk.star-rating {
          float:right;
      }
      .wshk-grava {
          border: '.$disretextavbdsize.'px '.$disretextavbdtype.' '.$disretextavbdcolor.';
    border-radius: '.$disretextavbdradius.'%;
         
      }
      
    
    
    td.wshkreviewsgrav {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    td.wshkreviewsgravdata {
        padding: 0em 0em !important;
        background:none !important;
    }
    @media only screen and (max-width: 799px) { 
        
        div.wshk-reviews {
            display:block !important;
             grid-gap: 15px !important;
        }
    }
    
    @media screen and (max-width: 1024px) and (min-width: 800px) {
    div.wshk-reviews {
            
             grid-gap: 30px !important;
        }
    }
    </style>
    
    <div class="wshk-reviews" style="display: grid; grid-template-columns: 48.5% 48.5%; grid-gap: 30px;grid-row-gap: 15px;width: 100%;">'.$html_r.'</div>';
    }
    elseif($disrecolumnsnumber == 1){
    return '
    <style>
      span.allwshk.star-rating {
          float:right;
      }
      .wshk-grava {
          border: '.$disretextavbdsize.'px '.$disretextavbdtype.' '.$disretextavbdcolor.';
    border-radius: '.$disretextavbdradius.'%;
         
      }
      
     
    
    td.wshkreviewsgrav {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    td.wshkreviewsgravdata {
        padding: 0em 0em !important;
        background:none !important;
    }
    </style>
    
    <div class="wshk-reviews" style="display: block; grid-template-columns: 550px; width: 100%;">'.$html_r.'</div>';
    }
    
    elseif($disrecolumnsnumber == 3){
    return '
    <style>
      span.allwshk.star-rating {
          float:right;
      }
      .wshk-grava {
          border: '.$disretextavbdsize.'px '.$disretextavbdtype.' '.$disretextavbdcolor.';
    border-radius: '.$disretextavbdradius.'%;
         
      }
      
     
    
    td.wshkreviewsgrav {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    td.wshkreviewsgravdata {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    @media only screen and (max-width: 799px) { 
        
        div.wshk-reviews {
            display:block !important;
             grid-gap: 15px !important;
        }
    }
    
    @media screen and (max-width: 1024px) and (min-width: 800px) {
    div.wshk-reviews {
            
             grid-gap: 15px !important;
        }
    }
    </style>
    
    <div class="wshk-reviews" style="display: grid; grid-template-columns: 32.5% 32.5% 32.5%; grid-gap: 10px;grid-row-gap: 15px;width: 100%;margin:auto;">'.$html_r.'</div>';
    }
    
    
    elseif($disrecolumnsnumber == 4){
    return '
    <style>
      span.allwshk.star-rating {
          float:right;
      }
      .wshk-grava {
          border: '.$disretextavbdsize.'px '.$disretextavbdtype.' '.$disretextavbdcolor.';
    border-radius: '.$disretextavbdradius.'%;
         
      }
      
     
    
    td.wshkreviewsgrav {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    td.wshkreviewsgravdata {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    @media only screen and (max-width: 799px) { 
        
        div.wshk-reviews {
            display:block !important;
             grid-gap: 15px !important;
        }
    }
    
    @media screen and (max-width: 1024px) and (min-width: 800px) {
    div.wshk-reviews {
            
             grid-gap: 30px !important;
        }
    }
    </style>
    
    <div class="wshk-reviews" style="display: grid; grid-template-columns: 24% 24% 24% 24%; grid-gap: 10px;grid-row-gap: 15px;width: 100%;">'.$html_r.'</div>';
    }
    
    else {
    return '
    <style>
      span.allwshk.star-rating {
          float:right;
      }
      .wshk-grava {
          border: '.$disretextavbdsize.'px '.$disretextavbdtype.' '.$disretextavbdcolor.';
    border-radius: '.$disretextavbdradius.'%;
         
      }
      
     
    
    td.wshkreviewsgrav {
        padding: 0em 0em !important;
        background:none !important;
    }
    
    td.wshkreviewsgravdata {
        padding: 0em 0em !important;
        background:none !important;
    }
    </style>
    
    <div class="wshk-reviews" style="display: block; grid-template-columns: 550px; width: 100%;">'.$html_r.'</div>';
    }
    
    
      //display:block;column-count:' .$disrecolumnsnumber . '; width: 100%;
    
    ob_get_clean();
    }
    
    add_shortcode('woo_display_reviews', 'wshk_get_woo_reviews');
}



//DISPLAY THE USER BILLING DATA SEPARATELY

//Since 1.7.3 - updated v.1.9.1

$getenablebillinguserdata = get_option('wshk_enablebillinguserdata');
if ( isset($getenablebillinguserdata) && $getenablebillinguserdata =='819')
    {

    //Display Billing user data
    
    //ID
    function wshk_billing_id(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      $billingid = $customer->ID;
      ob_start();
      echo $billingid;  
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-id','wshk_billing_id');
    
    //NAME
    function wshk_billing_user_name(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingname = $customer->billing_first_name;
      ob_start();
      echo $billingname; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-name','wshk_billing_user_name');
    
    
    //LAST NAME
    function wshk_billing_lastname(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billinglastname = $customer->billing_last_name;
      ob_start();
      echo $billinglastname;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-lastname','wshk_billing_lastname');
    
    
    //ADDRESS
    function wshk_billing_address(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingaddress = $customer->billing_address_1;
      ob_start();
      echo $billingaddress;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-address','wshk_billing_address');
    
    
    //ADDRESS 2 v.1.9.9
    function wshk_billing_addresstwo(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingaddresstwo = $customer->billing_address_2;
      ob_start();
      echo $billingaddresstwo;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-address-two','wshk_billing_addresstwo');
    
    
    //POSTCODE
    function wshk_billing_postcode(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingpostcode = $customer->billing_postcode;
      ob_start();
      echo $billingpostcode;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-postcode','wshk_billing_postcode');
    
    
    //CITY
    function wshk_billing_city(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $billingcity = $customer->billing_city;
      ob_start();
      echo $billingcity;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-city','wshk_billing_city');
    
    
    //PROVINCE - STATE (code) v.1.9.9
    function wshk_billing_provincecode(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $billingprovince = $customer->billing_state;
      ob_start();
      echo $billingprovince;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-statecode','wshk_billing_provincecode');
    
    
    //PROVINCE - STATE (name) v.1.9.9
    function wshk_billing_provincename(){
      global $wpdb;
      $customer = wp_get_current_user();
      $country = $customer->billing_country;
      $state = $customer->billing_state;
      
     
      $billingprovince = $customer->billing_state;
      ob_start();
      echo WC()->countries->get_states( $country )[$state];
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-statename','wshk_billing_provincename');
    
    
    //COUNTRY (code) v.1.9.9
    function wshk_billing_country(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $billingcountry = $customer->billing_country;
      ob_start();
      echo $billingcountry;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-countrycode','wshk_billing_country');
    
    
    //COUNTRY (name) v.1.9.9
    function wshk_billing_countryname(){
      global $wpdb;
      $customer = wp_get_current_user();
      $country = $customer->billing_country;
      $state = $customer->billing_state;
     
      $billingcountry = $customer->billing_country;
      ob_start();
      echo WC()->countries->get_countries( $country )[$country];
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-countryname','wshk_billing_countryname');
    
    
    //PHONE
    function wshk_billing_phone(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingphone = $customer->billing_phone;
      ob_start();
      echo $billingphone;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-phone','wshk_billing_phone');
    
    
    //EMAIL
    function wshk_billing_email(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $billingemail = $customer->billing_email;
      ob_start();
      echo $billingemail;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-email','wshk_billing_email');
    
    //COMPANY
    function wshk_billing_company(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $billingcompany = $customer->billing_company;
      ob_start();
      echo $billingcompany;
      return ob_get_clean();
    }
    
    add_shortcode('woo-billing-company','wshk_billing_company');
}



//Since 1.7.3 - updated v.1.9.1

//DISPLAY THE USER SHIPPING DATA SEPARATELY

$getenableshippinguserdata = get_option('wshk_enableshippinguserdata');
if ( isset($getenableshippinguserdata) && $getenableshippinguserdata =='820')
    {

    //ID
    function wshk_shipping_id(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      $shippingid = $customer->ID;
      ob_start();
      echo $shippingid;  
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-id','wshk_shipping_id');
    
    //NAME
    function wshk_shipping_user_name(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingname = $customer->shipping_first_name;
      ob_start();
      echo $shippingname; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-name','wshk_shipping_user_name');
    
    
    //LAST NAME
    function wshk_shipping_lastname(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippinglastname = $customer->shipping_last_name;
      ob_start();
      echo $shippinglastname;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-lastname','wshk_shipping_lastname');
    
    
    //ADDRESS
    function wshk_shipping_address(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingaddress = $customer->shipping_address_1;
      ob_start();
      echo $shippingaddress;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-address','wshk_shipping_address');
    
    
    //ADDRESS 2 - NEW v.1.9.9
    function wshk_shipping_addresstwo(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingaddresstwo = $customer->shipping_address_2;
      ob_start();
      echo $shippingaddresstwo;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-address-two','wshk_shipping_addresstwo');
    
    
    //POSTCODE
    function wshk_shipping_postcode(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingpostcode = $customer->shipping_postcode;
      ob_start();
      echo $shippingpostcode;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-postcode','wshk_shipping_postcode');
    
    
    //CITY
    function wshk_shipping_city(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $shippingcity = $customer->shipping_city;
      ob_start();
      echo $shippingcity;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-city','wshk_shipping_city');
    
    
    //PROVINCE - STATE (code) v.1.9.9
    function wshk_shipping_provincecode(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $shippingprovince = $customer->shipping_state;
      ob_start();
      echo $shippingprovince;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-statecode','wshk_shipping_provincecode');
    
    
    //PROVINCE - STATE (name) v.1.9.9
    function wshk_shipping_provincename(){
      global $wpdb;
      $customer = wp_get_current_user();
      $country = $customer->shipping_country;
      $state = $customer->shipping_state;
      
     
      $shippingprovince = $customer->shipping_state;
      ob_start();
      echo WC()->countries->get_states( $country )[$state];
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-statename','wshk_shipping_provincename');
    
    
    //COUNTRY (code) v.1.9.9
    function wshk_shipping_country(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $shippingcountry = $customer->shipping_country;
      ob_start();
      echo $shippingcountry;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-countrycode','wshk_shipping_country');
    
    
    //COUNTRY (name) v.1.9.9
    function wshk_shipping_countryname(){
      global $wpdb;
      $customer = wp_get_current_user();
      $country = $customer->shipping_country;
      $state = $customer->shipping_state;
     
      $shippingcountry = $customer->shipping_country;
      ob_start();
      echo WC()->countries->get_countries( $country )[$country];
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-countryname','wshk_shipping_countryname');
    
    
    //PHONE
    function wshk_shipping_phone(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingphone = $customer->shipping_phone;
      ob_start();
      echo $shippingphone;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-phone','wshk_shipping_phone');
    
    
    //EMAIL
    function wshk_shipping_email(){
      global $wpdb;
      $customer = wp_get_current_user();
      
      
      $shippingemail = $customer->shipping_email;
      ob_start();
      echo $shippingemail;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-email','wshk_shipping_email');
    
    //COMPANY
    function wshk_shipping_company(){
      global $wpdb;
      $customer = wp_get_current_user();
      
     
      $shippingcompany = $customer->shipping_company;
      ob_start();
      echo $shippingcompany;
      return ob_get_clean();
    }
    
    add_shortcode('woo-shipping-company','wshk_shipping_company');
}



//Since 1.7.3 - updated v.1.9.1

//DISPLAY THE USER TOTAL SPENT ACCORDING TO THE ORDER STATUS

$getenabletotalspender = get_option('wshk_enabletotalspender');
if ( isset($getenabletotalspender) && $getenabletotalspender =='8821')
    {

    //TOTAL BALANCE
    function wshk_new_test_balance(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-balance','wshk_new_test_balance');
    
    
    
    //PENDING
    function wshk_new_test_pending(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-pending' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-pending','wshk_new_test_pending');
    
    
    
    //ON HOLD
    function wshk_new_test_on_hold(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-on-hold' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-on-hold','wshk_new_test_on_hold');
    
    
    
    //PROCESSING
    function wshk_new_test_processing(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-processing' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-processing','wshk_new_test_processing');
    
    
    
    //COMPLETED
    function wshk_new_test_completed(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-completed' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-completed','wshk_new_test_completed');
    
    
    
    //CANCELLED
    function wshk_new_test_cancelled(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-cancelled' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-cancelled','wshk_new_test_cancelled');
    
    
    
    //REFUNDED
    function wshk_new_test_refunded(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-refunded' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-refunded','wshk_new_test_refunded');
    
    
    //FAILED
    function wshk_new_test_failed(){
      // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => array( 'shop_order' ),
            'post_status' => array( 'wc-failed' )
        ) );
        
        $total = 0;
        foreach ( $customer_orders as $customer_order ) {
            $order = wc_get_order( $customer_order );
            $total += $order->get_total();
        }
    
        return $total;
      
    }
    add_shortcode('woo-total-orders-failed','wshk_new_test_failed');
}



//Since 1.7.3 - updated v.1.9.1

//DISPLAY THE USER ORDERS ACCORDING TO THE ORDER STATUS

$getenableordercountser = get_option('wshk_enableordercountser');
if ( isset($getenableordercountser) && $getenableordercountser =='8822')
    {

    //TOTAL ORDERS COUNT
    
    function wshk_test_get_customer_order_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytest = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytest; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count','wshk_test_get_customer_order_count');
    
    
    //PENDING
    function wshk_test_get_customer_order_pending_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-pending' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestpend = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestpend; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-pending','wshk_test_get_customer_order_pending_count');
    
    
    
    //ON HOLD
    function wshk_test_get_customer_order_onhold_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-on-hold' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestpen = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestpen; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-onhold','wshk_test_get_customer_order_onhold_count');
    
    
    
    //PROCESSING
    function wshk_test_get_customer_order_process_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-processing' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestpro = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestpro; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-process','wshk_test_get_customer_order_process_count');
    
    
    
    //COMPLETED
    function wshk_test_get_customer_order_completed_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-completed' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestcomp = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestcomp; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-completed','wshk_test_get_customer_order_completed_count');
    
    
    
    //CANCELLED
    function wshk_test_get_customer_order_cancelled_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-cancelled' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestcan = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestcan; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-cancelled','wshk_test_get_customer_order_cancelled_count');
    
    
    
    //REFUNDED
    function wshk_test_get_customer_order_refunded_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-refunded' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestrefu = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestrefu; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-refunded','wshk_test_get_customer_order_refunded_count');
    
    
    
    //FAILED
    
    function wshk_test_get_customer_order_failed_count() {
      
       // Get all customer orders
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array( 'wc-failed' ),
        ) );
        
        $customer = wp_get_current_user();  
       
        // count orders
       
      	$testmytestfail = count($customer_orders);
        
        // Display total order number
       ob_start();
    	  echo $testmytestfail; 
      return ob_get_clean();
    }
    
    add_shortcode('woo-order-count-failed','wshk_test_get_customer_order_failed_count');
}



//Since 1.8.7 - updated v.2.0.1

//DISPLAY WOOCOMMERCE NOTICES
//You can add the shortcode on any site, recommended custom myaccount page or custom shop page. [wshk_display_notices]

$getdisplaywoonotices = get_option('wshk_displaywoonotices');
if ( isset($getdisplaywoonotices) && $getdisplaywoonotices =='18701')
    {

    function wshk_displaynotices() {
        ob_start();
        //wc_print_notices();
        if ( function_exists( 'wc_print_notices' ) ) {
			wc_print_notices();
		}
       return ob_get_clean();
    }
    add_shortcode('wshk_display_notices', 'wshk_displaynotices');
}
?>