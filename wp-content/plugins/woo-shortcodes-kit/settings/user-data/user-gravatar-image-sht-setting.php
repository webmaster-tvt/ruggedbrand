<?php
/*
User Gravatar image shortcode
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablegravatar" name="wshk_enablegravatar" value='15' <?php if(get_option('wshk_enablegravatar')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablegravatar></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'User gravatar image shortcode', 'woo-shortcodes-kit' ); ?></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/user-gravatar-image-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_gravatar_image]" id="woomygravatar" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctiongravatar()" onmouseout="outFuncgravatar()">
  <span class="tooltiptext" id="myTooltipgravatar"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomygravatar").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctiongravatar() {
  var copyText = document.getElementById("woomygravatar");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipgravatar = document.getElementById("myTooltipgravatar");
  tooltipgravatar.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncgravatar() {
  var tooltipgravatar = document.getElementById("myTooltipgravatar");
  tooltipgravatar.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
    
    
    <p><b>2.- <?php esc_html_e( 'Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but you must complete the fields for the image to be displayed', 'woo-shortcodes-kit' ); ?></small></p>
    
    
    <br /><br /><table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px; width: 50%;">
    <p> <?php esc_html_e( 'Gravatar size:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_textgravasize" name="wshk_textgravasize" value="<?php if(get_option('wshk_textgravasize')!=''){ echo get_option('wshk_textgravasize'); }?>" placeholder="128px"/ size="50"><br /></p>
    
    <p> <?php esc_html_e( 'Gravatar shadow:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_textgravashd" name="wshk_textgravashd" value="<?php if(get_option('wshk_textgravashd')!=''){ echo get_option('wshk_textgravashd'); }?>" placeholder="5px 5px 5px #c6adc2"/ size="50"><br /></p>
    
     <p> <?php esc_html_e( 'Border size:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_textgravabdsz" name="wshk_textgravabdsz" value="<?php if(get_option('wshk_textgravabdsz')!=''){ echo get_option('wshk_textgravabdsz'); }?>" placeholder="4px"/ size="20"><br /></p>
    <br /><br />
    </td>
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid; width: 50%;">    
    
   
    
    <p> <?php esc_html_e( 'Border type:', 'woo-shortcodes-kit' ); ?><br><br />
    <select name="wshk_textgravabdtp" id="wshk_textgravabdtp" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_textgravabdtp') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textgravabdtp') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textgravabdtp') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_textgravabdtp') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select><br><br /></p>
    
    <p> <?php esc_html_e( 'Boder color:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_textgravabdcl" name="wshk_textgravabdcl" value="<?php if(get_option('wshk_textgravabdcl')!=''){ echo get_option('wshk_textgravabdcl'); }?>" placeholder="#ffffff"/ size="20"><br /></p>    
    
    <p> <?php esc_html_e( 'Border radius:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" id="wshk_textgravabdrd" name="wshk_textgravabdrd" value="<?php if(get_option('wshk_textgravabdrd')!=''){ echo get_option('wshk_textgravabdrd'); }?>" placeholder="100%"/ size="20"><br /></p>
    <br /><br /></td>
    
    
    </tr>
    </table>
    <br><br><br>
    <?php 
//Integrate
if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        //Checking
        require_once( WP_CONTENT_DIR .'/plugins/custom-redirections-for-wshk/CustomBlocksandRedirectionsBase.php' ); 
        $licenseCode=get_option("CustomBlocksandRedirections_lic_Key","");
        $licenseEmail=get_option( "CustomBlocksandRedirections_lic_email","");
        CustomBlocksandRedirectionsBase::addOnDelete(function(){
           delete_option("CustomBlocksandRedirections_lic_Key");
        });
    }
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__) ) {?>

    <p><b>3.- <?php esc_html_e( 'Customer avatar uploader', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'You can provide to your customers the possibility to upload a custom profile image from the edit account form and also display it with a shortcode where you need.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need go to the WSHK PRO section called WOO SHORTCODES KIT PRO SETTINGS and look for the function called Customer avatar uploader on edit account and the function called Display customer avatar with a shortcode.', 'woo-shortcodes-kit' ); ?></small>
    </p>
    <?php
    } else {
    ?>
    <p><b>3.- <?php esc_html_e( 'Customer avatar uploader', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'You can provide to your customers the possibility to upload a custom profile image from the edit account form and also display it with a shortcode where you need.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>	
    <?php
    }
    ?>
    <!--<p><b>3.- <?php esc_html_e( 'Customer avatar uploader', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can provide to your customers the possibility to upload a custom profile image from the edit account form.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a></small></p>-->
    <br /><br />
    </div>