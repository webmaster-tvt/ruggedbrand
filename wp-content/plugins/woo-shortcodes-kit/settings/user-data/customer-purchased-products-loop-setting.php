<?php
/*
Customer purchased products loop
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enabletheboughtsht" name="wshk_enabletheboughtsht" value='2010' <?php if(get_option('wshk_enabletheboughtsht')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enabletheboughtsht></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Customer purchased products loop', 'woo-shortcodes-kit' ); ?></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/customer-purchased-products-loop/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_bought_products]" id="woomyuserbouprod" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionuserbouprod()" onmouseout="outFuncuserbouprod()">
  <span class="tooltiptext" id="myTooltipuserbouprod"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyuserbouprod").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionuserbouprod() {
  var copyText = document.getElementById("woomyuserbouprod");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipuserbouprod = document.getElementById("myTooltipuserbouprod");
  tooltipuserbouprod.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncuserbouprod() {
  var tooltipuserbouprod = document.getElementById("myTooltipuserbouprod");
  tooltipuserbouprod.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br/><br>
    <p><b>2.- <?php esc_html_e( 'Function settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Choose the number of columns to display the products loop', 'woo-shortcodes-kit' ); ?></small></p><br>
    <p style="max-width:500px;padding-left:30px;">
        <select name="wshk_bougcolumnum" id="wshk_bougcolumnum" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 100%;"> <option <?php if (get_option('wshk_bougcolumnum') == '1') { ?>selected="true" <?php }; ?> value="1"><?php esc_html_e( '1', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_bougcolumnum') == '2') { ?>selected="true" <?php }; ?> value="2"><?php esc_html_e( '2', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_bougcolumnum') == '3') { ?>selected="true" <?php }; ?> value="3"><?php esc_html_e( '3', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_bougcolumnum') == '4') { ?>selected="true" <?php }; ?> value="4"><?php esc_html_e( '4', 'woo-shortcodes-kit' ); ?></option> </select>
        
        </p>
    <br /><br />
        </div>
