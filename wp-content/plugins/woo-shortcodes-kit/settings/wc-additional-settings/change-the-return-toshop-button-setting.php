<?php
/*
Change the return to shop button text and add custom redirection
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_returntoshopbtn" name="wshk_returntoshopbtn" value='2011' <?php if(get_option('wshk_returntoshopbtn')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_returntoshopbtn></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Change the return to shop button text and add custom redirection', 'woo-shortcodes-kit' ); ?> </big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>



<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/change-the-return-to-shop-button-text-and-add-custom-redirection/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    
             <p class="wshkfirststepfunc forsmalldropdowns" style="padding-left: 30px;"><?php esc_html_e( 'When you activate this function, you must add a custom text for the button and it will change.', 'woo-shortcodes-kit' ); ?><br><br> <?php esc_html_e( 'The URL can be empty if you want to redirect users to the default store page. If you want to redirect to another page, simply choose the page.', 'woo-shortcodes-kit' ); ?><br /></p><br />
            
             <p class="forsmalldropdowns" style="width:350px;padding-left: 30px;"> <?php esc_html_e( 'Write the button text', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_retshopbtntext" name="wshk_retshopbtntext" value="<?php if(get_option('wshk_retshopbtntext')!=''){ echo get_option('wshk_retshopbtntext'); }?>" placeholder="Return"/ size="20"><br /></p>
             
             
             <p class="forsmalldropdowns" style="padding-left: 30px;"> <?php esc_html_e( 'Choose the page to redirect', 'woo-shortcodes-kit' ); ?><br /><br /> 
             
             <select id="wshk_retshopurlredi" name="wshk_retshopurlredi" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
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
$getopbtnredishop = get_option('wshk_retshopurlredi');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopbtnredishop; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopbtnredishop): echo $page->post_title; endif; endforeach; ?></option>
</select>
             <br /></p>
             <br><br>
             
             <p style="border: 1px solid #ddd;padding: 10px;color: #a46497;"><?php esc_html_e( 'Example', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'By default, the button shows the text "Return to shop" and redirects to the default store page, but for example, you can type the text "Go to the store" and choose a different page to redirect.', 'woo-shortcodes-kit' ); ?></small></p>
             </td>
        
      
        <br />
        <br />
        </div>