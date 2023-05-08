<?php
/*
Conditional Add to cart button for purchased products
*/
?>
<!-- Header -->
        <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
  <tr>
  
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablebought" name="wshk_enablebought" value='5' <?php if(get_option('wshk_enablebought')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablebought></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big>    <?php esc_html_e( 'Conditional "Add to cart" button for purchased products', 'woo-shortcodes-kit' ); ?></big><br />
        <small><?php esc_html_e( 'Activate the function and clic here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
</table>


        
</div>

<!-- Content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/conditional-add-to-cart-button-for-purchased-products/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Change the text of the "Add to cart" button if the user has already purchased the product', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'The button will be modified on the store page, product summary and product archives.', 'woo-shortcodes-kit' ); ?></small></p>
<br><br>
        <table>
    <tr>
    
    <td><p> <?php esc_html_e( 'Write here the text to display in the button:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_buttontext" name="wshk_buttontext" value="<?php if(get_option('wshk_buttontext')!=''){ echo get_option('wshk_buttontext'); }?>" placeholder="<?php esc_html_e( "Downloaded/Bought", "woo-shortcodes-kit" ); ?>"/ size="20"><br /></p>
    <br /></td>
    </tr>
    </table> 
    
        <br />      
        <br />
        </div>