<?php
/*
Block access to WP-ADMIN and WP-LOGIN.php and redirect
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesloginsec" name="wshk_enablesloginsec" value='20' <?php if(get_option('wshk_enablesloginsec')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesloginsec></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Block users access to wp-admin and wp-login.php', 'woo-shortcodes-kit' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate the function and nothing more!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/block-users-access-to-wp-admin-and-wp-login-php/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'After activating this function, nobody will be able to access wp-admin or wp-login.php , you can choose the page to redirect the users or will be redirected to the "My Account" page of WooCommerce by default.', 'woo-shortcodes-kit' ); ?></p>
    <br />
    <p class="forsmalldropdowns" style="padding-left: 30px;"> <?php esc_html_e( 'Choose the page to redirect', 'woo-shortcodes-kit' ); ?><br /><br /> 
             
             <select id="wshk_blockadmredirect" name="wshk_blockadmredirect" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
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
$blockadmredirect = get_option('wshk_blockadmredirect');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $blockadmredirect; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $blockadmredirect): echo $page->post_title; endif; endforeach; ?></option>
</select>
             <br />
             <br />
             <br />
    </div>