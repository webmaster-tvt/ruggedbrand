<?php
/*
Total shop products counter
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enablethetotprosht" name="wshk_enablethetotprosht" value='2009' <?php if(get_option('wshk_enablethetotprosht')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablethetotprosht></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Total shop products counter', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Just need activate the function and copy the shortcode on any page or post!', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/total-shop-products-counter/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_total_product_count]" id="woomytotalproco" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctiontotalproco()" onmouseout="outFunctotalproco()">
  <span class="tooltiptext" id="myTooltiptotalproco"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomytotalproco").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctiontotalproco() {
  var copyText = document.getElementById("woomytotalproco");
  copyText.select();
  document.execCommand("copy");
  
  var tooltiptotalproco = document.getElementById("myTooltiptotalproco");
  tooltiptotalproco.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunctotalproco() {
  var tooltiptotalproco = document.getElementById("myTooltiptotalproco");
  tooltiptotalproco.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom post or page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>
        <p style="padding-left:30px;"><?php esc_html_e( 'if you want exclude any category from the total count use', 'woo-shortcodes-kit' ); ?><strong> [woo_total_product_count cat_id="<?php esc_html_e( 'Here write the category ID number', 'woo-shortcodes-kit' ); ?>"]</strong></p>
        <br>
        <p style="padding-left:30px;"><?php esc_html_e( 'Now you can exclude up to 3 differents categories, for example', 'woo-shortcodes-kit' ); ?>:<br><strong> [woo_total_product_count cat_id="26" cat_id2="28" cat_id3="23"]</strong></p>
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
    
    
    
    <p><b>2.- <?php esc_html_e( 'Increase the total shop products counter', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small><?php esc_html_e( 'By default the function display the total shop products, but now you can modify it manually and increase the quantity.', 'woo-shortcodes-kit' ); ?></small>
    </p>
    
    <p style="max-width:320px;width:100%;"> <?php esc_html_e( 'Write here the quantity to increase:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" id="wshk_fakeaddprodincounter" name="wshk_fakeaddprodincounter" value="<?php if(get_option('wshk_fakeaddprodincounter')!=''){ echo get_option('wshk_fakeaddprodincounter'); }?>" placeholder="<?php esc_html_e( "50", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'Also you can use negative quantity to decrease the total.', 'woo-shortcodes-kit' ); ?></small><br /></p>
    <?php 
    } 
    // GET WSHK PRO
    else {
    ?>    
    <p><b>4.- <?php esc_html_e( 'Increase the total shop products counter', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'By default the function display the total shop products, but now you can modify it manually and increase the quantity.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>
    <?php
    }
    ?>
        
        <br><br>
        </div>