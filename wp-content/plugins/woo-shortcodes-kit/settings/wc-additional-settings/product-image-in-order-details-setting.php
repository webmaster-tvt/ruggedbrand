<?php
/*
Product image in the order details
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableproimage" name="wshk_enableproimage" value='8833' <?php if(get_option('wshk_enableproimage')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableproimage></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Product image in the order details', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate and customize the style!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/product-image-in-the-order-details/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />

<p class="wshkfirststepfunc"><br /><br>
    <?php esc_html_e( 'To understand how it work, this function display the product image in the order details after make click in the view order button. To use them, you only need enable the function. The user must have logged in to see the order details. You can add your custom styles for the product image too.', 'woo-shortcodes-kit' ); ?></p><br /><br /> 

<h3><?php esc_html_e( 'Customize the product image style', 'woo-shortcodes-kit' ); ?></h3>
<p> <?php esc_html_e( 'Image size:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_prodimagesize" id="wshk_prodimagesize" value="<?php if(get_option('wshk_prodimagesize')!=''){ echo get_option('wshk_prodimagesize'); }?>" placeholder="100px" size="10" /></p>

<p> <?php esc_html_e( 'Image border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_prodimagebordsize" id="wshk_prodimagebordsize" value="<?php if(get_option('wshk_prodimagebordsize')!=''){ echo get_option('wshk_prodimagebordsize'); }?>" placeholder="1px" size="10" /></p> 

<p> <?php esc_html_e( 'Image border (type):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_prodimagebordtype" id="wshk_prodimagebordtype" value="<?php if(get_option('wshk_prodimagebordtype')!=''){ echo get_option('wshk_prodimagebordtype'); }?>" placeholder="solid" size="10" /></p>

<p> <?php esc_html_e( 'Image border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_prodimagebordcolor" id="wshk_prodimagebordcolor" value="<?php if(get_option('wshk_prodimagebordcolor')!=''){ echo get_option('wshk_prodimagebordcolor'); }?>" placeholder="#a46497" size="10" /></p>

<p> <?php esc_html_e( 'Image border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_prodimagebordradius" id="wshk_prodimagebordradius" value="<?php if(get_option('wshk_prodimagebordradius')!=''){ echo get_option('wshk_prodimagebordradius'); }?>" placeholder="100%" size="10" /></p>
    <br />
    <br />
    </div>