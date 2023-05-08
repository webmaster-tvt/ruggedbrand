<?php 

/*Username in menu title*/

?>

<!-- Header -->
  <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableuserinmenu" name="wshk_enableuserinmenu" value='19' <?php if(get_option('wshk_enableuserinmenu')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableuserinmenu></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Username in menu title', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate and paste the shortcode in your menu item title!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>

<!-- content -->
<div class="panel"> 
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/username-in-menu-title/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />

<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table class="copyshortcodebox" style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[wshk_user_in_menu]" id="wshkuserinmenu" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkuserinmenu()" onmouseout="outFuncwshkuserinmenu()">
  <span class="tooltiptext" id="myTooltipwshkuserinmenu"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkuserinmenu").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkuserinmenu() {
  var copyText = document.getElementById("wshkuserinmenu");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkuserinmenu = document.getElementById("myTooltipwshkuserinmenu");
  tooltipwshkuserinmenu.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncwshkuserinmenu() {
  var tooltipwshkuserinmenu = document.getElementById("myTooltipwshkuserinmenu");
  tooltipwshkuserinmenu.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste on any page or post', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>


<br><br><br>
    <p><b>2.- <?php esc_html_e( 'Display options', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Choose what should display the shortcode', 'woo-shortcodes-kit' ); ?></small></p>
    <br />


    <!--<p> <?php esc_html_e( 'Choose the option that you want display with this shortcode', 'woo-shortcodes-kit' ); ?>-->
    
    <!--<br /><br /> -->
    
    <select name="wshk_userinmenuoptions" id="wshk_userinmenuoptions" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 100%;"> 
    
    <option <?php if (get_option('wshk_userinmenuoptions') == 'showus') { ?>selected="true" <?php }; ?> value="showus"><?php esc_html_e( 'Login user', 'woo-shortcodes-kit' ); ?></option> 
    
    <option <?php if (get_option('wshk_userinmenuoptions') == 'showonly') { ?>selected="true" <?php }; ?> value="showonly"><?php esc_html_e( 'Only the name', 'woo-shortcodes-kit' ); ?></option> 
    
    <option <?php if (get_option('wshk_userinmenuoptions') == 'showdispl') { ?>selected="true" <?php }; ?> value="showdispl"><?php esc_html_e( 'Display name', 'woo-shortcodes-kit' ); ?></option> 
    
    </select> 
    
    <br />
    
    </p>
<br><br><br>

    </div>