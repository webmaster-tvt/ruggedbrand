<?php
/*
Username shortcode
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableusername" name="wshk_enableusername" value='11' <?php if(get_option('wshk_enableusername')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableusername></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Username shortcode', 'woo-shortcodes-kit' ); ?></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/username-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_user_name]" id="woomyusername" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionusername()" onmouseout="outFuncusername()">
  <span class="tooltiptext" id="myTooltipusername"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyusername").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionusername() {
  var copyText = document.getElementById("woomyusername");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipusername = document.getElementById("myTooltipusername");
  tooltipusername.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncusername() {
  var tooltipusername = document.getElementById("myTooltipusername");
  tooltipusername.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>

    
    
    <br><br><br>
    <p><b>2.- <?php esc_html_e( 'Function and Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but you must complete the fields for the username to be displayed', 'woo-shortcodes-kit' ); ?></small></p>
    <br /><br />
    
    
    
    <table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px; width: 50%;"><br>
    <p> <?php esc_html_e( 'Text prefix:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_textusernmpf" name="wshk_textusernmpf" value="<?php if(get_option('wshk_textusernmpf')!=''){ echo get_option('wshk_textusernmpf'); }?>" placeholder="<?php esc_html_e( "Hello", "woo-shortcodes-kit" ); ?>"/ size="50"><br /></p>
    
    <p> <?php esc_html_e( 'Text suffix:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_textusernmsf" name="wshk_textusernmsf" value="<?php if(get_option('wshk_textusernmsf')!=''){ echo get_option('wshk_textusernmsf'); }?>" placeholder="!"/ size="50"><br /></p> 
    
     <p> <?php esc_html_e( 'Choose the option that you want display with this shortcode', 'woo-shortcodes-kit' ); ?><br /><br /> <select name="wshk_showusername" id="wshk_showusername" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_showusername') == 'showus') { ?>selected="true" <?php }; ?> value="showus"><?php esc_html_e( 'Login user', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_showusername') == 'showonly') { ?>selected="true" <?php }; ?> value="showonly"><?php esc_html_e( 'Only the name', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_showusername') == 'showdispl') { ?>selected="true" <?php }; ?> value="showdispl"><?php esc_html_e( 'Display name', 'woo-shortcodes-kit' ); ?></option> </select> <br /></p>
    <br /><br /><br />
    </td>
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid; width: 50%;">    
    
    <p> <?php esc_html_e( 'Text color:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_usernmtc" name="wshk_usernmtc" value="<?php if(get_option('wshk_usernmtc')!=''){ echo get_option('wshk_usernmtc'); }?>" placeholder="#ffffff"/ size="20"><br /></p>
    
    <p> <?php esc_html_e( 'Text size:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_usernmts" name="wshk_usernmts" value="<?php if(get_option('wshk_usernmts')!=''){ echo get_option('wshk_usernmts'); }?>" placeholder="16"/ size="20"><br /></p>
    
    <p> <?php esc_html_e( 'Text align:', 'woo-shortcodes-kit' ); ?><br /><br /> 
    
    <select name="wshk_usernmta" id="wshk_usernmta" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_usernmta') == 'left') { ?>selected="true" <?php }; ?> value="left"><?php esc_html_e( 'Left', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_usernmta') == 'center') { ?>selected="true" <?php }; ?> value="center"><?php esc_html_e( 'Center', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_usernmta') == 'right') { ?>selected="true" <?php }; ?> value="right"><?php esc_html_e( 'Right', 'woo-shortcodes-kit' ); ?></option> </select>
    <br /></p>
    <br /><br /></td>
    
    
    </tr>
    </table>
    <br />
    <br />
    </div>