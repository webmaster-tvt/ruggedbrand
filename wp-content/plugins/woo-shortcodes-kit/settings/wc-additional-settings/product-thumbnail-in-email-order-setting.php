<?php
/*
Product thumbnail in email orders
*/
?>
<!-- Header -->
        <div class="accordion">
    <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
    <th><p><input type="checkbox" class="testininputclass" id="wshk_test" name="wshk_test" value='2' <?php if(get_option('wshk_test')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_test></label><br /></th>
    <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Product thumbnail in email orders', 'woo-shortcodes-kit' ); ?>    </big><br /><small>  <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
    
 
</table>
</div>


<!-- content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/product-thumbnail-in-email-orders-2/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
<table>
<tr>
<td>
<p class="wshkfirststepfunc forsmalldropdowns" style="width: 100%; padding-left: 30px;"> <?php esc_html_e( 'Set the size for the product thumbnail:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_emailordersizes" name="wshk_emailordersizes" value="<?php if(get_option('wshk_emailordersizes')!=''){ echo get_option('wshk_emailordersizes'); }?>" placeholder="100px"/ size="20"><br /></p></td>
</tr>
</table>
<br /><br />
</div>