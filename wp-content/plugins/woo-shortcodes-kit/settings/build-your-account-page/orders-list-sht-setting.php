<?php 
/*
Orders list shortcode
*/
?>
<!-- Header -->
    <div class="accordion">
        <table>
        <colgroup><col span="1"></colgroup>
            <tr>
                <th>
                    <p><input type="checkbox" class="testininputclass" id="wshk_enableorderscontrol" name="wshk_enableorderscontrol" value='140' <?php if(get_option('wshk_enableorderscontrol')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableorderscontrol></label>
                    <br />
                </th>
                <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Orders list shortcode', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small>
                    </p>
                </th>
            </tr>
        </table>
    </div>
    
<!-- content -->
    <div class="panel">
    <br><br>
        <table style="float:right;">
            <tr>
                <td><a class="miraqueben" href="https://disespubli.com/docs/orders-list-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a>
                </td>
                <td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a>
                </td>
            </tr>
        </table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Use it only in your custom account page', 'woo-shortcodes-kit' ); ?></small>
    </p>
    <br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
        <table style="margin-top:-20px;">
        <colgroup><col span="3"></colgroup>
            <tr>
                <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_myorders]" id="woomyorders" readonly></big><br /><br /></p>
                </td>
                <td class="shtboxtwo" style="width: 23%; padding-left: 30px;">
                    <p><big>
                    <div class="tooltip">
                        <button class="wshkshtboxesbtn" type="button" onclick="myFunction()" onmouseout="outFunc()">
                          <span class="tooltiptext" id="myTooltip"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
                          <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
                        </button>
                    </div>
                    <script>
                    
                    document.getElementById("woomyorders").addEventListener("mousedown", function(event){
                      event.preventDefault();
                    });
                    
                    function myFunction() {
                      var copyText = document.getElementById("woomyorders");
                      copyText.select();
                      document.execCommand("copy");
                      
                      var tooltip = document.getElementById("myTooltip");
                      tooltip.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
                    }
                    
                    function outFunc() {
                      var tooltip = document.getElementById("myTooltip");
                      tooltip.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
                    }
                    </script>
                    
                </big><br /><br /> 
                </p>
                </td>
                <td class="shtboxthree" style="width: 53%; padding-left: 30px;">
                <p><span class="dashicons dashicons-warning"></span> <big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br />
                </p>
                </td>
            </tr>
        <br /><br />
        </table>
    </div>
    <br><br>
    
        <table class="funcordersteptwo" width="50%">
            <tr>    
                <td style="width: 35%;">
                    <p><b>2.- <?php esc_html_e( 'Set the orders to display', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By default 15 orders per page will be displayed', 'woo-shortcodes-kit' ); ?></small>
                    </p>
                <br>
                <div style="padding-left:30px;">
                    <p> <?php esc_html_e( 'Number of orders', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" id="wshk_numeropedidosnew" name="wshk_numeropedidosnew"  value="<?php if(get_option('wshk_numeropedidosnew')!=''){ echo get_option('wshk_numeropedidosnew'); }?>" placeholder="15"/ size="10" >
                    </p>     
                    <small><?php esc_html_e( 'When the user has placed more orders than the established number, the pagination will appear below the table to navigate among the previous orders.', 'woo-shortcodes-kit' ); ?>
                    </small>
                </div>
                </td> 
            
            </tr>
            <br /><br />
        </table>
        <br>
        
        <br><br>
    <p><b>2.1.- <?php esc_html_e( 'Dont load custom WSHK view order template', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By activating this option, the custom WSHK View Order template will not be loaded and the default WooCommerce View Order template will be loaded by default.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'Just turn it on if you have any compatibility issues loading this template.', 'woo-shortcodes-kit' ); ?></small></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_disableorderstemplate" name="wshk_disableorderstemplate" value='22092021' <?php if(get_option('wshk_disableorderstemplate')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_disableorderstemplate"><?php esc_html_e( 'Disable custom WSHK View order template', 'woo-shortcodes-kit' ); ?></label></p>
    <br />
    <br />
        
        
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
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__) ) {
    ?>

        <p><b>3.- <?php esc_html_e( 'Link the function with his account container', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'This shortcode have an advanced action (view order details) and needs to be linked to a container.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need go to the WSHK PRO section called WOO SHORTCODES KIT PRO SETTINGS and look for the function called Custom redirections for advanced actions of WooCommerce my account.', 'woo-shortcodes-kit' ); ?></small>
        </p>
    <?php
    } else {
    ?>
        <p><b>3.- <?php esc_html_e( 'Link the function with his account container', 'woo-shortcodes-kit' ); ?></b> <span style="background-color:#a46497;padding:5px;color:white;border-radius:6px;font-weight:bold;font-size:10px;line-height:2;">WSHK PRO</span><br><small style="margin-top:5px;"><?php esc_html_e( 'This shortcode have an advanced action (view order details) and needs to be linked to a container.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'and activate your', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/admin.php?page=custom-redirections-for-wshk" target="_blank"><?php esc_html_e( 'License key', 'woo-shortcodes-kit' ); ?></a>.</small></p>	
    <?php
    }
    ?>
    <!--<p><b>3.- <?php esc_html_e( 'Link the function with his account container', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'This shortcode have an advanced action (view order details) and needs to be linked to a container.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'To get it, you need the addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/easy-my-account-builder-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Easy My Account Builder', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( 'or the premium addon', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><?php esc_html_e( 'Woo Shortcodes Kit PRO', 'woo-shortcodes-kit' ); ?></a></small></p>-->
    <br /><br />
    </div>