<?php 
/*
Display max or min price on variable products
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
        <th><p><input type="checkbox" class="testininputclass" id="wshk_enablemaxminvariablepro" name="wshk_enablemaxminvariablepro" value='34' <?php if(get_option('wshk_enablemaxminvariablepro')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablemaxminvariablepro></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Display max or min price on variable products', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>--></span></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>      
        </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;">
        <tr>
            <td><a class="miraqueben" href="https://disespubli.com/docs/display-max-or-min-price-on-variable-products/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a>
            </td>
        </tr>
    </table>
    <br><br><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'After enable this function, if you have any variable products it will display the max or min price... depending of what do you have choosed on the function options.', 'woo-shortcodes-kit' ); ?>
    </p> 
    <p><?php esc_html_e( 'It also works with variable products on sale!', 'woo-shortcodes-kit' ); ?>
    </p> 
    <br><br>
    <p><b>1.- <?php esc_html_e( 'Choose between display the max or min price:', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By default is selected the option to display the max price.', 'woo-shortcodes-kit' ); ?></small>
    </p>
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
    ?>
    
    
    <select name="wshk_minpricevarpro" id="wshk_minpricevarpro" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 50%;" <?php //echo $getdisableopt;?>>
        <option <?php if (get_option('wshk_minpricevarpro') == 'wshk_maxpricevarpro') { ?>selected="true" <?php }; ?> value="wshk_maxpricevarpro"><?php esc_html_e( 'Display the max price on variable products', 'woo-shortcodes-kit' ); ?></option> 
        
        <option <?php if (get_option('wshk_minpricevarpro') == 'wshk_minpricevarpro') { ?>selected="true" <?php }; ?> value="wshk_minpricevarpro"><?php esc_html_e( 'Display the min price on variable products', 'woo-shortcodes-kit' ); ?></option>  
    </select>
    <br /></p>
    <br><br>
    <?php
    
    //Integrate
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__) ) {?>
        
        <p><b>2.- <?php esc_html_e( 'Add your custom prefix', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'By default the function will show a prefix, but you can replace it with your custom prefix and also add a custom suffix.', 'woo-shortcodes-kit' ); ?></small>
        </p>
        <br>
        <div class="maxminprobox" style="margin-left:30px;">
        <p style="width:350px;">    
        <table cellspacing="25" style="width:800px;">
            <tr>
                <td class="forsmalldropdowns" style="width:50%;">
                <span><b><?php esc_html_e( 'Prefix for min price on variable products', 'woo-shortcodes-kit' ); ?></b></span>
                
                <input class="testininputclass" type="text" name="wshk_mintextvarpro" id="wshk_mintextvarpro" value="<?php if(get_option('wshk_mintextvarpro')!=''){ echo get_option('wshk_mintextvarpro'); }/*else {echo 'From';}*/?>" placeholder="From" size="10" />
        
                 <span><b><?php esc_html_e( 'Prefix for max price on variable products', 'woo-shortcodes-kit' ); ?></b></span>
        
                <input class="testininputclass" type="text" name="wshk_maxtextvarpro" id="wshk_maxtextvarpro" value="<?php if(get_option('wshk_maxtextvarpro')!=''){ echo get_option('wshk_maxtextvarpro'); }/*else {echo 'Up to';}*/?>" placeholder="Up to" size="10" /> 
                </td>
                <td class="forsmalldropdowns">
                <span><b><?php esc_html_e( 'Suffix for min price on variable products', 'woo-shortcodes-kit' ); ?></b></span>
                
                <input class="testininputclass" type="text" name="wshk_sufmintextvarpro" id="wshk_sufmintextvarpro" value="<?php if(get_option('wshk_sufmintextvarpro')!=''){ echo get_option('wshk_sufmintextvarpro'); }/*else {echo 'From';}*/?>" placeholder="More text min" size="10" />
                
                <span><b><?php esc_html_e( 'Suffix for max price on variable products', 'woo-shortcodes-kit' ); ?></b></span>
                
                <input class="testininputclass" type="text" name="wshk_sufmaxtextvarpro" id="wshk_sufmaxtextvarpro" value="<?php if(get_option('wshk_sufmaxtextvarpro')!=''){ echo get_option('wshk_sufmaxtextvarpro'); }/*else {echo 'Up to';}*/?>" placeholder="More text max" size="10" />
                </td>
            </tr>
        </table>
        </p>
        <br><br>
        </div>
        <?php
    }
    // GET WSHK PRO
    else {
    ?>    
    <p><b>2.- <?php esc_html_e( 'Add your custom Prefix and Suffix', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'By default the function will show a prefix, but you can replace it with your custom prefix and also add a custom suffix.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>
    <?php
    }
    ?>
    <br><br>
</div>