<?php
/*
Total shop sales counter
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enablethetotsalessht" name="wshk_enablethetotsalessht" value='2008' <?php if(get_option('wshk_enablethetotsalessht')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablethetotsalessht></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Total shop sales counter', 'woo-shortcodes-kit' ); ?></big><br /><small><?php esc_html_e( 'Just need activate the function and copy the shortcode on any page or post!', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/total-shop-sales-counter/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes"class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_global_sales]" id="woomyglobalsal" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionglobalsal()" onmouseout="outFuncglobalsal()">
  <span class="tooltiptext" id="myTooltipglobalsal"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
<?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyglobalsal").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionglobalsal() {
  var copyText = document.getElementById("woomyglobalsal");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipglobalsal = document.getElementById("myTooltipglobalsal");
  tooltipglobalsal.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncglobalsal() {
  var tooltipglobalsal = document.getElementById("myTooltipglobalsal");
  tooltipglobalsal.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom post or page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>
<p style="padding-left:30px;"><?php esc_html_e( 'This shortcode shows total store sales, adding orders with status processing, completed and on hold', 'woo-shortcodes-kit' ); ?></p>
<br><br><br>
        </div>