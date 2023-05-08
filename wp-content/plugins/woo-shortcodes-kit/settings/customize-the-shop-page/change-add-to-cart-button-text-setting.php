<?php
/*
change the add to cart button text
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
  <tr>
  
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableaddtocarttxt" name="wshk_enableaddtocarttxt" value='14' <?php if(get_option('wshk_enableaddtocarttxt')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableaddtocarttxt></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Change the "Add to cart" button text', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small>  <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
</table>


        
</div>
<!-- Content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/change-the-add-to-cart-button-text/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Change the text of the Add to cart button and write a different text in each case', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'If you dont need to modify the text for some type of product, the default text will be displayed.', 'woo-shortcodes-kit' ); ?></small><br><small><?php esc_html_e( 'This function is compatible with the modification of the button text if the user has purchased the product.', 'woo-shortcodes-kit' ); ?></small></p>
<br><br>
        <table>
    <tr>
    
    <td class="forsmalldropdowns" style="padding: 30px;">
    <p> <?php esc_html_e( 'Write here the text to display in the', 'woo-shortcodes-kit' ); ?> <strong><?php esc_html_e( 'external', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'products:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_atctxtexternal" name="wshk_atctxtexternal" value="<?php if(get_option('wshk_atctxtexternal')!=''){ echo get_option('wshk_atctxtexternal'); }?>" placeholder="<?php esc_html_e( "Buy this product", "woo-shortcodes-kit" ); ?>"/ size="50"><br /></p>
    
    <p> <?php esc_html_e( 'Write here the text to display in the', 'woo-shortcodes-kit' ); ?> <strong><?php esc_html_e( 'grouped', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'products:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_atctxtgrouped" name="wshk_atctxtgrouped" value="<?php if(get_option('wshk_atctxtgrouped')!=''){ echo get_option('wshk_atctxtgrouped'); }?>" placeholder="<?php esc_html_e( "View products", "woo-shortcodes-kit" ); ?>"/ size="50"><br /></p>
    
   
    </td>    
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;">
        
         <p> <?php esc_html_e( 'Write here the text to display in the', 'woo-shortcodes-kit' ); ?> <strong><?php esc_html_e( 'simple', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'products:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_atctxtsimple" name="wshk_atctxtsimple" value="<?php if(get_option('wshk_atctxtsimple')!=''){ echo get_option('wshk_atctxtsimple'); }?>" placeholder="<?php esc_html_e( "Add to cart", "woo-shortcodes-kit" ); ?>"/ size="50"><br /></p>
        
        <p> <?php esc_html_e( 'Write here the text to display in the', 'woo-shortcodes-kit' ); ?> <strong><?php esc_html_e( 'variable', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'products:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_atctxtvariable" name="wshk_atctxtvariable" value="<?php if(get_option('wshk_atctxtvariable')!=''){ echo get_option('wshk_atctxtvariable'); }?>" placeholder="<?php esc_html_e( "Select options", "woo-shortcodes-kit" ); ?>"/ size="20"><br /></p>
    
        <p> <?php esc_html_e( 'Write here the text to display in the', 'woo-shortcodes-kit' ); ?> <strong><?php esc_html_e( 'downloadable', 'woo-shortcodes-kit' ); ?></strong> <?php esc_html_e( 'products:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_customtxtdownbtn" name="wshk_customtxtdownbtn" value="<?php if(get_option('wshk_customtxtdownbtn')!=''){ echo get_option('wshk_customtxtdownbtn'); }?>" placeholder="<?php esc_html_e( "Download", "woo-shortcodes-kit" ); ?>"/ size="20"><br /></p>
    </td>
    </tr>
    </table> 
    
        <br />      
        <br />
        </div>