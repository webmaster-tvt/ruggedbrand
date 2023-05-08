<?php 

/*User role settings*/

?>

<!-- Header -->
  <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableuserrole" name="wshk_enableuserrole" value='050222' <?php if(get_option('wshk_enableuserrole')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableuserrole></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'User role shortcode', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate, configure the setting and paste the shortcode!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>

<!-- content -->
<div class="panel"> 
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/user-role-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />

<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table class="copyshortcodebox" style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[wshk-user-role]" id="wshkuserrole" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkuserrole()" onmouseout="outFuncwshkuserrole()">
  <span class="tooltiptext" id="myTooltipwshkuserrole"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkuserrole").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkuserrole() {
  var copyText = document.getElementById("wshkuserrole");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkuserrole = document.getElementById("myTooltipwshkuserrole");
  tooltipwshkuserrole.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncwshkuserrole() {
  var tooltipwshkuserrole = document.getElementById("myTooltipwshkuserrole");
  tooltipwshkuserrole.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
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
    
    <select name="wshk_userroleoptions" id="wshk_userroleoptions" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 100%;"> 
    
    <option <?php if (get_option('wshk_userroleoptions') == '2') { ?>selected="true" <?php }; ?> value="2"><?php esc_html_e( 'Main user role', 'woo-shortcodes-kit' ); ?></option> 
    
    <option <?php if (get_option('wshk_userroleoptions') == '1') { ?>selected="true" <?php }; ?> value="1"><?php esc_html_e( 'All user roles', 'woo-shortcodes-kit' ); ?></option> 
    
    </select> 
    
    <br />
    
    </p>
<br><br><br>

    </div>