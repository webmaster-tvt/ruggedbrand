<?php 
/*
Display saving price and percentages on sale products
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
        <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesavingprices" name="wshk_enablesavingprices" value='24' <?php if(get_option('wshk_enablesavingprices')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesavingprices></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Display saving price and percentages on sale products', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>      
        </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;">
        <tr>
            <td><a class="miraqueben" href="https://disespubli.com/docs/display-saving-price-and-percentages-on-sale-products/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a>
            </td>
        </tr>
    </table>
    <br><br><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'After enable this function, if you have any product on sale... a badge with the saving price and percentages will be displayed under each product price.', 'woo-shortcodes-kit' ); ?></p>
    <p><?php esc_html_e( 'It works with all products types, variable products included.', 'woo-shortcodes-kit' ); ?></p>
    <br><br>
    <p><b>1.- <?php esc_html_e( 'Customize the badge style:', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field have a default value, so when you enable the function and save the settings, the badge will display the style by default.', 'woo-shortcodes-kit' ); ?></small></p>
    <br>
    <table style="width:100%;">
        <tr>    
            <td class="forsmalldropdowns" style="padding: 30px; width: 50%;">
            <p> <?php esc_html_e( 'Background color:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" id="wshk_onsalebg" name="wshk_onsalebg"  value="<?php if(get_option('wshk_onsalebg')!=''){ echo get_option('wshk_onsalebg'); } else {echo 'white';}?>" placeholder="#ffffff"/ size="20" ></p>
            <p> <?php esc_html_e( 'Border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_onsalebdsize" id="wshk_onsalebdsize" value="<?php if(get_option('wshk_onsalebdsize')!=''){ echo get_option('wshk_onsalebdsize'); }else {echo '2';}?>" placeholder="2px" size="10" /></p>
           <p> <?php esc_html_e( 'Border (type):', 'woo-shortcodes-kit' ); ?><br />
           <select name="wshk_onsalebdtype" id="wshk_onsalebdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;">
                
               <option <?php if (get_option('wshk_onsalebdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> 
               <option <?php if (get_option('wshk_onsalebdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option>
               <option <?php if (get_option('wshk_onsalebdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option>
               <option <?php if (get_option('wshk_onsalebdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
               
           </select>
           </p>
            <p> <?php esc_html_e( 'Border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsalebdcolor" id="wshk_onsalebdcolor" value="<?php if(get_option('wshk_onsalebdcolor')!=''){ echo get_option('wshk_onsalebdcolor'); }else {echo 'red';}?>" placeholder="red" size="10" /></p>
            <p> <?php esc_html_e( 'Border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsalebdradius" id="wshk_onsalebdradius" value="<?php if(get_option('wshk_onsalebdradius')!=''){ echo get_option('wshk_onsalebdradius'); }else {echo '0';}?>" placeholder="0px" size="10" /></p>
            <br /><br />
            </td> 
            <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid; width: 50%;">
        
            <p> <?php esc_html_e( 'Font (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsaletextsize" id="wshk_onsaletextsize" value="<?php if(get_option('wshk_onsaletextsize')!=''){ echo get_option('wshk_onsaletextsize'); }else {echo '80%';}?>" placeholder="80%" size="10" /></p>
            <p> <?php esc_html_e( 'Font (weight):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsaletxtweight" id="wshk_onsaletxtweight" value="<?php if(get_option('wshk_onsaletxtweight')!=''){ echo get_option('wshk_onsaletxtweight'); }else {echo '700';}?>" placeholder="700" size="10" /></p>
            <p> <?php esc_html_e( 'Font color:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsaleftcolor" id="wshk_onsaleftcolor" value="<?php if(get_option('wshk_onsaleftcolor')!=''){ echo get_option('wshk_onsaleftcolor'); }else {echo 'red';}?>" placeholder="red" size="10" /></p>
            <p> <?php esc_html_e( 'Text transform:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsaletxttransf" id="wshk_onsaletxttransf" value="<?php if(get_option('wshk_onsaletxttransf')!=''){ echo get_option('wshk_onsaletxttransf'); }else {echo 'uppercase';}?>" placeholder="uppercase" size="10" /></p>
            <p> <?php esc_html_e( 'Padding:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_onsalepadding" id="wshk_onsalepadding" value="<?php if(get_option('wshk_onsalepadding')!=''){ echo get_option('wshk_onsalepadding'); }else {echo '8px 13px';}?>" placeholder="8px 13px" size="10" /></p>
            <br /><br />
            </td>
        </tr>
    </table>
    <br><br>
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
        //Run
    	if(CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__)){
        
            $getwshksalebadgesht = get_option('wshk_salebadge_sht');
            if ( isset($getwshksalebadgesht) && $getwshksalebadgesht =='shtsalebadgeon'){
                 $getdisableopt = 'disabled';
                 $getdisablenotice = __( 'This option is blocked while using the shortcode.', 'woo-shortcodes-kit' );
            } else {
                $getdisableopt = 'true';
                $getdisablenotice = '';
            }
        }else {
                $getdisableopt = 'true';
                $getdisablenotice = '';
        }
    }
    ?>
        <p class="forsmalldropdowns"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'This function hide the by default on sale product badge, but you can choose between hide or show the badge from the following dropdown:', 'woo-shortcodes-kit' ); ?><br /><small style="padding-left:25px;"><?php esc_html_e( 'By default is selected the option to hide the by default badge.', 'woo-shortcodes-kit' ); ?></small>
        <br /><br /><br> 
        <select name="wshk_yessalebadge" id="wshk_yessalebadge" style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px;width: 50%;" <?php if(!empty($getdisableopt)) {echo $getdisableopt;}?>>
            <option <?php if (get_option('wshk_yessalebadge') == 'wshk_nosalebadge') { ?>selected="true" <?php }; ?> value="wshk_nosalebadge"><?php esc_html_e( 'Hide the by default on sale badge', 'woo-shortcodes-kit' ); ?></option>
            <option <?php if (get_option('wshk_yessalebadge') == 'wshk_yessalebadge') { ?>selected="true" <?php }; ?> value="wshk_yessalebadge"><?php esc_html_e( 'Show the by default on sale badge', 'woo-shortcodes-kit' ); ?></option>  
        </select> <span style="color:red"><?php if(!empty($getdisablenotice)){echo $getdisablenotice;}?></span> <br />
        </p>
        <br><br><br>
    <?php
    //Integrate
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__) ) {?>
            
        <p><b>2.- <?php esc_html_e( 'Display the badge with a shortcode', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'If you are building your custom product pages, for example with Elementor, you can display the on sale badge with the savings prices and percentages by adding a shortcode.', 'woo-shortcodes-kit' ); ?></small>
        </p>
        <br>
        <div style="margin-left:30px;">
            <p><b>2.1- <?php esc_html_e( 'First choose the display options by clicking the checkbox', 'woo-shortcodes-kit' ); ?></b>
            </p>
            
            <p class="wshkfunctinputs"><input type="checkbox" id="wshk_salebadge_sht" name="wshk_salebadge_sht" value='shtsalebadgeon' <?php if(get_option('wshk_salebadge_sht')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_salebadge_sht"><?php esc_html_e( 'Use shortcode', 'woo-shortcodes-kit' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></label></p>
            <p class="wshkfunctinputs"><input type="checkbox" id="wshkhide_salebadge" name="wshkhide_salebadge" value='shtsalebadgeonly' <?php if(get_option('wshkhide_salebadge')!=''){ echo ' checked="checked"'; }?> /><label for="wshkhide_salebadge"><?php esc_html_e( 'Display only shortcode', 'woo-shortcodes-kit' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></label></p><br>
            
            <p><b>2.2- <?php esc_html_e( 'After choosing the display options, you just need to use the following shortcode on your product page or product template', 'woo-shortcodes-kit' ); ?></b>
            </p>
            <p style="color:#a46497;font-size:16px;"><strong>[woo_sale_badge]</strong>
            </p>
            <br>
        </div>
        <?php
        } else {
        //get WSHK PRO 
        ?>    
        <p><b>2.- <?php esc_html_e( 'Display the badge with a shortcode', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'If you are building your custom product pages, for example with Elementor, you can display the on sale badge with the savings prices and percentages by adding a shortcode.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small>
        </p>
        <?php    
        }
        ?>
    <br /><br />
</div>