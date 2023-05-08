<?php
/*
Customer total orders counter
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablectbo" name="wshk_enablectbo" value='7' <?php if(get_option('wshk_enablectbo')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablectbo></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Customer total orders counter', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/customer-total-orders-counter/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 29%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_customer_total_orders]" id="woomycustotalord" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 21%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctioncustotalord()" onmouseout="outFunccustotalord()">
  <span class="tooltiptext" id="myTooltipcustotalord"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomycustotalord").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctioncustotalord() {
  var copyText = document.getElementById("woomycustotalord");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipcustotalord = document.getElementById("myTooltipcustotalord");
  tooltipcustotalord.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunccustotalord() {
  var tooltipcustotalord = document.getElementById("myTooltipcustotalord");
  tooltipcustotalord.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 50%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom post or page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
    <p><b>2.- <?php esc_html_e( 'Write the prefix and suffix texts to show.', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but by default it only will show the quantity of orders, you must complete the fields that will be displayed', 'woo-shortcodes-kit' ); ?></small></p>
    <br /><br /><table>
    <tr>
    <td class="forsmalldropdowns"><p> <?php esc_html_e( 'Write here the text prefix:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_tordersprefix" name="wshk_tordersprefix" value="<?php if(get_option('wshk_tordersprefix')!=''){ echo get_option('wshk_tordersprefix'); }?>" placeholder="<?php esc_html_e( "You have made", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'You can leave empty to show nothing', 'woo-shortcodes-kit' ); ?></small><br /></p>
    <br /><br /></td>
    
    <td class="forsmalldropdowns"><p> <?php esc_html_e( 'Write here the text singular suffix:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_torderssuffix" name="wshk_torderssuffix" value="<?php if(get_option('wshk_torderssuffix')!=''){ echo get_option('wshk_torderssuffix'); }?>" placeholder="<?php esc_html_e( "order", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'You can leave empty to show nothing', 'woo-shortcodes-kit' ); ?></small><br /></p>
    <br /><br /></td>
    
    <td class="forsmalldropdowns"><p> <?php esc_html_e( 'Write here the text plural suffix:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_torderspsuffix" name="wshk_torderspsuffix" value="<?php if(get_option('wshk_torderspsuffix')!=''){ echo get_option('wshk_torderspsuffix'); }?>" placeholder="<?php esc_html_e( "orders", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'You can leave empty to show nothing', 'woo-shortcodes-kit' ); ?></small><br /></p>
    <br /><br /></td>
    
    <td class="forsmalldropdowns"><p> <?php esc_html_e( 'Text when dont have made any order:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_textnobo" name="wshk_textnobo" value="<?php if(get_option('wshk_textnobo')!=''){ echo get_option('wshk_textnobo'); }?>" placeholder="<?php esc_html_e( "You dont have any orders made yet", "woo-shortcodes-kit" ); ?>"/ size="36"><small><?php esc_html_e( 'You can leave empty to show nothing', 'woo-shortcodes-kit' ); ?></small><br /></p>
    <br /><br />
    </td>
    </tr>
    </table>
    <br />
    <p><b>3.- <?php esc_html_e( 'Function and Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can choose the text alignment and fix the shortcode if it is not displayed correctly', 'woo-shortcodes-kit' ); ?></small></p>
    <br>
<p>
<select name="wshk_aligntheorders" id="wshk_aligntheorders" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 100%;"> <option <?php if (get_option('wshk_aligntheorders') == 'left') { ?>selected="true" <?php }; ?> value="left"><?php esc_html_e( 'Left', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_aligntheorders') == 'center') { ?>selected="true" <?php }; ?> value="center"><?php esc_html_e( 'Center', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_aligntheorders') == 'right') { ?>selected="true" <?php }; ?> value="right"><?php esc_html_e( 'Right', 'woo-shortcodes-kit' ); ?></option> </select>
</p>
    <br />
    
    
<p> <span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Sometimes the result of the shortcode can appear out of his site. It if happen, choose the option that you need to view correctly the shortcode', 'woo-shortcodes-kit' ); ?><br /><small style="padding-left:25px;"><?php esc_html_e( 'By default is selected the option to show the shortcode without the solution, if you dont see the shortcode in his place, please choose the other option.', 'woo-shortcodes-kit' ); ?></small><br /><br /><br> 
<select name="wshk_yesenable" id="wshk_yesenable" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 100%;"><option <?php if (get_option('wshk_yesenable') == 'wshk_nnoenable') { ?>selected="true" <?php }; ?> value="wshk_nnoenable"><?php esc_html_e( 'Im fine and view the shortcode result correctly', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_yesenable') == 'wshk_yesenable') { ?>selected="true" <?php }; ?> value="wshk_yesenable"><?php esc_html_e( 'Enable for view the shortcode result correctly', 'woo-shortcodes-kit' ); ?></option>  </select> <br /></p>
    <br>
    <br>
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
    
    //Integrate
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__) ) {
    ?>
    
    
    
    <p><b>4.- <?php esc_html_e( 'Get data from specific number of days', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small><?php esc_html_e( 'By default the function display data of the last 365 days, but now you can modify it with your custom number of days.', 'woo-shortcodes-kit' ); ?></small>
    </p>
    
    <p style="max-width:320px;width:100%;"> <?php esc_html_e( 'Write here the number of days:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_custotordcoundays" name="wshk_custotordcoundays" value="<?php if(get_option('wshk_custotordcoundays')!=''){ echo get_option('wshk_custotordcoundays'); }?>" placeholder="<?php esc_html_e( "365", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'If you leave the field empty, the data will be of the last 365 days.', 'woo-shortcodes-kit' ); ?></small><br /></p>
    
    <br><br>
    <p><b>5.- <?php esc_html_e( 'Animate the counter', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small><?php esc_html_e( 'Just need check this option and the counter will be animated.', 'woo-shortcodes-kit' ); ?></small>
    </p>
    
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_animatedcounterord" name="wshk_animatedcounterord" value='wshk_enableanimatedorde' <?php if(get_option('wshk_animatedcounterord')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_animatedcounterord"><?php esc_html_e( 'Animate the customer total orders counter', 'woo-shortcodes-kit' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></label></p>
    
    <?php 
    } 
    // GET WSHK PRO
    else {
    ?>    
    <p><b>4.- <?php esc_html_e( 'Get data from specific number of days', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'By default the function display data of the last 365 days, but now you can modify it with your custom number of days.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>
    
    <br><br>
    <p><b>5.- <?php esc_html_e( 'Animate the counter', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'By default the function display a static counter, with this option the number will be animated.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>
    
    
    
    <?php
    }
    ?>
    
    
    <br />
    </div>