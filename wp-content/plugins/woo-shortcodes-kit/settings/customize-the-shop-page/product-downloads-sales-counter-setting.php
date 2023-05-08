<?php
/*
Product Download/Sales counter
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enable" name="wshk_enable" value='1' <?php if(get_option('wshk_enable')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enable></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Product Download/Sales Counter', 'woo-shortcodes-kit' ); ?>  <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?> </small></p></th>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/product-download-sales-counter/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Enter the text you want to display under each product', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Add a different text for the downloadable products and another for the rest of the products.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( '(You can also set a minimum number of downloads or sales that a product must have to display the message below)', 'woo-shortcodes-kit' ); ?></small></p>
    <br><br>
    <table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px;"><p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Downloable products (text)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'Write here the text to display below the product:', 'woo-shortcodes-kit' ); ?></small></p><p><input type="text" class="testininputclass" id="wshk_text" name="wshk_text" value="<?php if(get_option('wshk_text')!=''){ echo get_option('wshk_text'); }?>" placeholder="<?php esc_html_e( "Downloads", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'If you have not completed the field, a default text will be displayed', 'woo-shortcodes-kit' ); ?></small><br /></p>
    
    <br /><br /><p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Downloable products (condition)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'The message will be displayed if the product have a number of downloads:', 'woo-shortcodes-kit' ); ?></small></p><p><input class="testininputclass" type="number" id="wshk_min" name="wshk_min" value="<?php if(get_option('wshk_min')!=''){ echo get_option('wshk_min'); }?>" placeholder="<?php esc_html_e( "All", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'By default, it will display the message without counting the number of downloads.', 'woo-shortcodes-kit' ); ?></small><br /></p>
    
    <br /><br />
    
    <p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Downloable products (style control)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'You can use these classes to customize the message style:', 'woo-shortcodes-kit' ); ?></small></p>
    <div>
        <table width="100%">
            <tr>
                <td style="width:25%;">
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'BOX:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'ICON:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'COUNTER:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'TEXT:', 'woo-shortcodes-kit' ); ?></p>
                </td>
                
                <td style="width:75%;">
                    <p style="color:grey;">.wshkdow</p>
                    <p style="color:grey;">.wshkicondow</p>
                    <p style="color:grey;">.wshkcoudow</p>
                    <p style="color:grey;">.wshktxtdow</p>
                </td>
            </tr>
        </table>
    </div>
    
    </td>
    
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;"><p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Sales products (text)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'Write here the text to display below the product:', 'woo-shortcodes-kit' ); ?></small></p><p><input class="testininputclass" type="text" id="wshk_textsales" name="wshk_textsales" value="<?php if(get_option('wshk_textsales')!=''){ echo get_option('wshk_textsales'); }?>" placeholder="<?php esc_html_e( "Sales", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'If you have not completed the field, a default text will be displayed', 'woo-shortcodes-kit' ); ?></small><br /></p>
    
    <br /><br /><p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Sales products (condition)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'The message will be displayed if the product have a number of sales:', 'woo-shortcodes-kit' ); ?></small></p><input type="number" class="testininputclass" id="wshk_minsales" name="wshk_minsales" value="<?php if(get_option('wshk_minsales')!=''){ echo get_option('wshk_minsales'); }?>" placeholder="<?php esc_html_e( "All", "woo-shortcodes-kit" ); ?>"/ size="20"><small><?php esc_html_e( 'By default, it will display the message without counting the number of sales.', 'woo-shortcodes-kit' ); ?></small><br /></p>
    
     <br /><br />
    
    <p style="color:#a46497;font-size:14px;"><?php esc_html_e( 'Sales products (style control)', 'woo-shortcodes-kit' ); ?><br><small style="color:grey;"><?php esc_html_e( 'You can use these classes to customize the message style:', 'woo-shortcodes-kit' ); ?></small></p>
    <div>
        <table width="100%">
            <tr>
                <td style="width:35%;">
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'BOX:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'ICON:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'COUNTER:', 'woo-shortcodes-kit' ); ?></p>
                    <p style="color:#a46497;letter-spacing:1px;"><?php esc_html_e( 'TEXT:', 'woo-shortcodes-kit' ); ?></p>
                </td>
                
                <td style="width:65%;">
                    <p style="color:grey;">.wshksa</p>
                    <p style="color:grey;">.wshkiconsa</p>
                    <p style="color:grey;">.wshkcousa</p>
                    <p style="color:grey;">.wshktxtsa</p>
                </td>
            </tr>
        </table>
    </div>
    
    
    </td>
    </tr>
    </table>
    <br />
    <br />
    <p><b>2.- <?php esc_html_e( 'Shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can display a specific product sales by ID on any page or post.', 'woo-shortcodes-kit' ); ?></small></p><br>
    <p><?php esc_html_e( 'Just need to use the following shortcode and replace the PRODUCT ID HERE with the product ID number.', 'woo-shortcodes-kit' ); ?></p>
    <p style="color:#a46497;"><strong>[wshk_product_sales id="PRODUCT ID HERE"]</strong></p>
    <br />
    <br />
    <p><b>3.- <?php esc_html_e( 'Display options', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can choose how to display it. If you were using this function before v.1.8.9 you should choose the display options, the first and second option were the ones used in older versions.', 'woo-shortcodes-kit' ); ?></small></p><br>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_sales_sht_one" name="wshk_sales_sht_one" value='saleshtone' <?php if(get_option('wshk_sales_sht_one')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_sales_sht_one"><?php esc_html_e( 'Single product summary', 'woo-shortcodes-kit' ); ?></label></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_sales_sht_two" name="wshk_sales_sht_two" value='saleshttwo' <?php if(get_option('wshk_sales_sht_two')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_sales_sht_two"><?php esc_html_e( 'After shop loop item', 'woo-shortcodes-kit' ); ?></label></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_sales_sht_three" name="wshk_sales_sht_three" value='saleshtthree' <?php if(get_option('wshk_sales_sht_three')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_sales_sht_three"><?php esc_html_e( 'Before add to cart form', 'woo-shortcodes-kit' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></label></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_sales_sht_four" name="wshk_sales_sht_four" value='saleshtfour' <?php if(get_option('wshk_sales_sht_four')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_sales_sht_four"><?php esc_html_e( 'Use shortcode', 'woo-shortcodes-kit' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></label></p>
    
    <br />
    <br />
    </div>