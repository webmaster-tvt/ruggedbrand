<?php
/*
Custom thank you pages
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enableacustomthankyoupage" name="wshk_enableacustomthankyoupage" value='87' <?php if(get_option('wshk_enableacustomthankyoupage')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableacustomthankyoupage></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Custom thank you pages', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- content -->
<div class="panel">
     <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/custom-thank-you-pages/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b><?php esc_html_e( 'Function settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can set up a different thank you page in up to 3 products. You can also add a different thank you page for the rest of the shop products.', 'woo-shortcodes-kit' ); ?></small></p>
    <br>
    <table width="90%">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><?php esc_html_e( 'Product one:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyouoneid" name="wshk_customthankyouoneid" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
 $all_ids = get_posts( array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
) );
  foreach ( $all_ids as $id ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $id ),
            esc_html( get_the_title($id) )
            
        );
        ;
  }
  
$getopthkoneid = get_option('wshk_customthankyouoneid');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkoneid; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($all_ids as $id): if($id == $getopthkoneid): echo get_the_title($id); endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> <p><?php esc_html_e( 'Custom thank you page for product one:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyouone" name="wshk_customthankyouone" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          
  }
$getopthkpage = get_option('wshk_customthankyouone');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkpage; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopthkpage): echo $page->post_title; endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> </td>
        
        <td class="forsmalldropdowns"style="width: 33%; padding-left: 30px;"><p><?php esc_html_e( 'Product two:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyoutwoid" name="wshk_customthankyoutwoid" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
 /*$all_ids = get_posts( array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
) );*/
  foreach ( $all_ids as $id ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $id ),
            esc_html( get_the_title($id) )
            
        );
        ;
  }
  
$getopthktwoid = get_option('wshk_customthankyoutwoid');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthktwoid; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($all_ids as $id): if($id == $getopthktwoid): echo get_the_title($id); endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> <p><?php esc_html_e( 'Custom thank you page for product two:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyoutwo" name="wshk_customthankyoutwo" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          
  }
$getopthkpagetwo = get_option('wshk_customthankyoutwo');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkpagetwo; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopthkpagetwo): echo $page->post_title; endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> </td>
        
        <td class="forsmalldropdowns" style="width: 34%; padding-left: 30px;"><p><?php esc_html_e( 'Product three:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyouthreeid" name="wshk_customthankyouthreeid" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
 /*$all_ids = get_posts( array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
) );*/
  foreach ( $all_ids as $id ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $id ),
            esc_html( get_the_title($id) )
            
        );
        ;
  }
  
$getopthkthreeid = get_option('wshk_customthankyouthreeid');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkthreeid; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($all_ids as $id): if($id == $getopthkthreeid): echo get_the_title($id); endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> <p><?php esc_html_e( 'Custom thank you page for product three:', 'woo-shortcodes-kit' ); ?><br /><br />
        <select id="wshk_customthankyouthree" name="wshk_customthankyouthree" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          
  }
$getopthkpagethree = get_option('wshk_customthankyouthree');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkpagethree; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopthkpagethree): echo $page->post_title; endif; endforeach; ?></option>
</select>
        <br /></p><br /><br /> </td>
        
       </tr>
        
        <br />
        <br />
        </table>
        
      <p class="forsmalldropdowns" style="width:50%;padding-left:30px;"><?php esc_html_e( 'Global custom thank you page or for the rest of products:', 'woo-shortcodes-kit' ); ?><br /><br />
      <select id="wshk_customthankyougeneral" name="wshk_customthankyougeneral" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          
  }
$getopthkpagegene = get_option('wshk_customthankyougeneral');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopthkpagegene; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopthkpagegene): echo $page->post_title; endif; endforeach; ?></option>
</select>
      <br /></p><br /><br />
        
        </div>