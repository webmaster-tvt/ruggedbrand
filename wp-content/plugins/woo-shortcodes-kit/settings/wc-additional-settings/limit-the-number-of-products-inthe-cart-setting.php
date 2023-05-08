<?php
/*
Limit the number of products in the cart
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_onlyoneincartt" name="wshk_onlyoneincartt" value='2009' <?php if(get_option('wshk_onlyoneincartt')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_onlyoneincartt></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Limit the number of products in the cart', 'woo-shortcodes-kit' ); ?></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>



<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/limit-the-number-of-products-in-the-cart/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
            
             <p class="wshkfirststepfunc forsmalldropdowns" style="width: 100%; padding-left: 30px;"><?php esc_html_e( 'When you activate this function, you must add a number of products to determine how many products can be added to the cart.', 'woo-shortcodes-kit' ); ?><br><br> <?php esc_html_e( 'This value will allow only the number of established products to be added to the cart, which means that if the user adds more products than the established number, the cart will restart with the last product added.', 'woo-shortcodes-kit' ); ?><br /></p><br />
             
             <p class="forsmalldropdowns" style="width:350px;padding-left: 30px;"> <?php esc_html_e( 'Set the numbers of products allowed to add in the cart:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_productsincart" name="wshk_productsincart" value="<?php if(get_option('wshk_productsincart')!=''){ echo get_option('wshk_productsincart'); }?>" placeholder="1"/ size="20"><br /></p>
             
             <p style="border: 1px solid #ddd;padding: 10px;color: #a46497;"><?php esc_html_e( 'Example', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'If you set that only 2 products can be added to the cart and a customer adds 3 products, only the third product added will be shown in the cart. Since it had 2 products added, which is the maximum established and has added one more, it causes the cart to restart and pass to have only the product that was added as a third product.', 'woo-shortcodes-kit' ); ?></small></p>
             </td>
        
      
        <br />
        <br />
        </div>