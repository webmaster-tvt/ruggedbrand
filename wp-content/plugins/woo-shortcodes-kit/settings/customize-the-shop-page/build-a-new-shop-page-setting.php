<?php
/*
Build a new shop page from scratch
*/
?>
<!-- Header-->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enableacustomshopage" name="wshk_enableacustomshopage" value='85' <?php if(get_option('wshk_enableacustomshopage')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableacustomshopage></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Build a new shop page from scratch', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Just need activate the function and add your custom shop page slug!', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>



<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/build-a-new-shop-page-from-scratch/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Choose the page of your new shop page', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'This function is compatible with any theme and page builder. You can design your new page in the same way as the others.', 'woo-shortcodes-kit' ); ?></small></p>

    <table>
          <colgroup>
    <!--<col span="3">
   
  </colgroup>-->
         <tr>
        <td style="width: 100%;">
        
        <select id="wshk_shopageslug" name="wshk_shopageslug" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          //var_dump($pages);
      
    /*$option = '<option value="' . get_page_link( $page->ID ) . '">';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;*/
  }
$getopcushop = get_option('wshk_shopageslug');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopcushop; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopcushop): echo $page->post_title; endif; endforeach; ?></option>
</select>
        <br><br><br>
        <p><b>2.- <?php esc_html_e( 'Remember go to ', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;font-weight:600;text-decoration:underline;" href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=wc-settings&tab=products" target="_blank"><?php esc_html_e( 'WooCommerce settings', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( ' to disable the shop page option', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( ' Just need click in the WooCommerce settings link and remove the page from the shop page field.', 'woo-shortcodes-kit' ); ?></small></p>
        <br /><br /><br /> </td>
        
       </tr>
        
        <br />
        <br />
        </table>
        
        <p style="border: 1px solid #ddd;padding:10px;color:#a46497"><b><?php esc_html_e( 'If you use this function, some of the previous functions will no longer be useful.', 'woo-shortcodes-kit' ); ?></b><br><small style="color:grey;"><?php esc_html_e( 'Check that the following functions are not activated:', 'woo-shortcodes-kit' ); ?><br><br><?php esc_html_e( 'Show only products from specific categories on the shop page', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'Exclude products from specific categories on the shop page', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'Products per page manager', 'woo-shortcodes-kit' ); ?></small></p>
        <br />
        <br />
        </div>