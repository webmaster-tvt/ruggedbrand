<?php
/*
Skip cart and go straight to checkout page
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enableskipcart" name="wshk_enableskipcart" value='96' <?php if(get_option('wshk_enableskipcart')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableskipcart></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Skip Cart and go straight to Checkout page', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>



<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/skip-cart-and-go-straight-to-checkout-page/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
            
             <p class="wshkfirststepfunc forsmalldropdowns" style="width: 100%; padding-left: 30px;"><?php esc_html_e( 'After enable the function and save the settings...', 'woo-shortcodes-kit' ); ?><br>  <?php esc_html_e( 'Remember go to ', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;font-weight:600;text-decoration:underline;" href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=wc-settings&tab=products" target="_blank"><?php esc_html_e( 'WooCommerce settings', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( ' to disable option: Redirect to the cart page after successful addition', 'woo-shortcodes-kit' ); ?><br /></p><br /><br /> </td>
        
      
        <br />
        <br />
        </div>