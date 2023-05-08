<?php
/*
Recommends section
*/
?>
<!-- Recommends tab -->

<div class="last author wshk-tab" id="div-wshk-recom">
    
    <!-- White box start -->
    
    <div class="wshkpagewhitebg">
        
        <!-- Recommends info box -->
        
     <!--<div style="background-color: white; width: 100%;border-radius:13px;padding:20px;">-->
        
        <div class="wshkinfoboxes">
             
            <h2 class="wshkinfoboxtitle"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Get to know the plugins recommended by WSHK', 'woo-shortcodes-kit' ); ?>
            </h2>
            
            <p class="wshkinfoboxdesc">
            
            <span><?php esc_html_e( 'From here you can directly access each recommendation with just one click.', 'woo-shortcodes-kit' ); ?>
            </span>
            <br />
            
            <span><?php esc_html_e( 'Here you will find WSHK plugins and third party plugins!', 'woo-shortcodes-kit' ); ?>
            </span>
            
            <span style="color: #969696; font-size: 13px;font-style: italic;"> <?php esc_html_e( '(All plugins have been tried before.)', 'woo-shortcodes-kit' ); ?>
            </span>
            
            </p>
   
        </div>
        
        <!-- END News info box-->
        
            
        <style>
        .row {
            display: flex;
        }
        
        .column {
            flex: 50%;
            padding:30px;
            border:1px solid #eee;
            border-radius:13px;
            margin:15px;
        }
        
        /*Titles*/
        
        .wshkrecomtitles {
           font-size:18px; 
           color:#321A51;
           letter-spacing:1px;
           font-weight:300;
        }
        
        
        /*Buttons*/
        
        .wshkrecombutton {
            float:right;
            background-color:white;
            padding:10px;
            border:1px solid #321A51;
            border-radius:3px;
            color:#321A51;
            font-size:14px;    
        }
        
        
        .wshkrecombutton:hover {
            float:right;
            background-color:#321A51;
            padding:10px;
            border-radius:3px;
            color:white;
            font-size:14px;    
        }
        
        
        .wshkaddonbadge {
            margin-top: -30px;
            background-color: #faf8fc;
            color: #60329b;
            padding: 7px;
            float: right;
            margin-right: -30px;
            height: 20px;
            border-radius: 0px 13px 0px 13px;
            font-weight: 500;
            font-size: 10px;
        }
        
        </style>
        
        <br><br>
        
        <!-- NEW ROW -->
        <div class="row">
                
            <div class="column">
                <span class="wshkaddonbadge">WSHK ADDON</span>
            
                <table>
                    <tr>
                        <td style="padding-right:30px;">
                            <img src="<?php echo  plugins_url( 'images/emablogon-150x150.png' , __DIR__ );?>" style="width: 64px; height: 64px;" ;>
                        </td>
                        <td>
                            <a href="https://disespubli.com/producto/easy-my-account-builder-addon-for-wshk/" target="_blank"><span class="wshkrecomtitles">Easy My Account Builder</span>
                            </a>
                            <br>
                            <small>Author: <a href="https://profiles.wordpress.org/disespubli/" target="_blank">Alberto G - Disespubli</a>
                            </small> 
                        </td>
                    </tr>
                </table>
                        
                <p><?php esc_html_e( 'With Easy My Account builder, just need write a shortcode in your new and custom account page.It will build a full login and private user zone like WooCommerce by default,with the difference that you can manage the tabs, the containers and the content.', 'woo-shortcodes-kit' ); ?>
                </p>
                <br>
                <a href="https://bit.ly/emabrecom" target="_blank" class="wshkrecombutton"><?php esc_html_e( 'EXPLORE NOW', 'woo-shortcodes-kit' ); ?>
                </a>
            </div>
                
            <div class="column">
                <span class="wshkaddonbadge">WSHK ADDON</span>
                    
                <table>
                    <tr>
                        <td style="padding-right:30px;">
                            <img src="<?php echo  plugins_url( 'images/logowshkpro-150x150.png' , __DIR__ );?>" style="width: 64px; height: 64px;" ;>
                        </td>
                        <td>
                            <a href="https://disespubli.com/producto/custom-blocks-and-redirections-addon-for-wshk/" target="_blank"><span class="wshkrecomtitles">Woo Shortcodes Kit PRO</span>
                            </a>
                            <br>
                            <small>Author: <a href="https://profiles.wordpress.org/disespubli/" target="_blank">Alberto G - Disespubli</a>
                            </small> 
                        </td>
                    </tr>
                </table>
                            
                <p><?php esc_html_e( 'Start from scratch your custom account page with your favorite builder without limits and get extra functions to your shop. High compatibility with third party plugin as Elementor, Visual composer, DIVI, WooCommerce Subscriptions, WooCommerce Memberships and Webtoffee Subscriptions.', 'woo-shortcodes-kit' ); ?>
                </p>
                <br>
                <a href="https://bit.ly/wshkpro" target="_blank" class="wshkrecombutton"><?php esc_html_e( 'EXPLORE NOW', 'woo-shortcodes-kit' ); ?>
                </a>
            </div>
        </div>
        <!-- END ROW -->
        
        
        <!-- NEW ROW -->
        <!--<div class="row">
                
            <div class="column">
            
                <table>
                    <tr>
                        <td style="padding-right:30px;">
                            <img src="<?php echo  plugins_url( 'images/waw-logo-dark.png' , __DIR__ );?>" style="width: 64px; height: 64px;" ;>
                        </td>
                        <td>
                            <a href="https://wawelementor.com/" target="_blank"><span class="wshkrecomtitles">Woo Account Widgets for Elementor</span>
                            </a>
                            <br>
                            <small>Author: <a href="https://wawelementor.com/" target="_blank">Alberto G - Disespubli</a>
                            </small> 
                        </td>
                    </tr>
                </table>
                        
                <p><?php esc_html_e( 'Build your custom WooCommerce account page without limits and using your favourite page builder. "Woo Account Widgets for Elementor" does not work alone. It is originally created to use with WooCommerce and Elementor, also is compatible with WooCommerce Subscriptions, WooCommerce Memberships and Woo Shortcodes Kit.', 'woo-shortcodes-kit' ); ?>
                </p>
                <br>
                <a href="https://wawelementor.com/" target="_blank" class="wshkrecombutton"><?php esc_html_e( 'EXPLORE NOW', 'woo-shortcodes-kit' ); ?>
                </a>
            </div>
                
            <div class="column">
                    
                <table>
                    <tr>
                        <td style="padding-right:30px;">
                            <img src="<?php echo  plugins_url( 'images/icon-256x256-peachpay.png' , __DIR__ );?>" style="width: 64px; height: 64px;" ;>
                        </td>
                        <td>
                            <a href="https://wordpress.org/plugins/peachpay-for-woocommerce/" target="_blank"><span class="wshkrecomtitles">PeachPay for WooCommerce | One-Click Checkout</span>
                            </a>
                            <br>
                            <small>Author: <a href="https://peachpay.app/" target="_blank">PeachPay, Inc.</a>
                            </small> 
                        </td>
                    </tr>
                </table>
                        
                <p><?php esc_html_e( 'PeachPay for WooCommerce brings one-click checkout to your WooCommerce store. An “Express checkout” button is added to your product and cart pages. After clicking the button, there is a simple form that a customer only sees once. It saves the customer’s information so that they never have to fill in their information on your site or any other site using PeachPay again.', 'woo-shortcodes-kit' ); ?>
                </p>
                <br>
                <a href="https://wordpress.org/plugins/peachpay-for-woocommerce/" target="_blank" class="wshkrecombutton"><?php esc_html_e( 'EXPLORE NOW', 'woo-shortcodes-kit' ); ?>
                </a>
            </div>
        </div>-->
        <!-- END ROW -->

            
        <!--</div>-->
    </div>
</div>