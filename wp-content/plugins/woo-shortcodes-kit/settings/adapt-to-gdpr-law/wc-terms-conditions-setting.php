<?php
/*
WC custom Terms and conditions
*/
?>
<!-- Header -->
     <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_wcnewtermsbox" name="wshk_wcnewtermsbox" value='94' <?php if(get_option('wshk_wcnewtermsbox')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_wcnewtermsbox></label></th> <th class="forcontainertitles" style="padding: 30px 20px 0px 20px;"> <big><br /><?php esc_html_e( 'Custom terms and conditions checkbox in WooCommece checkout page', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p><br /></th>
         </table>
</div>



<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/custom-terms-and-conditions-checkbox-in-woocommerce-checkout-page/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    <table width="100%">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="forsmalldropdowns" style="width: 100%; padding-left: 30px;">
            
            <table width="100%">
                <tr>
                    <td class="forsmalldropdowns" style="width: 36%; padding-left: 0px;"><p class="wshkfirststepfunc" style="font-weight:600;font-size:14px;">1.- <?php esc_html_e( "Write the checkbox initial text", "woo-shortcodes-kit" ); ?></p> <input class="testininputclass" type="text" id="wshk_termstexto" name="wshk_termstexto" value="<?php if(get_option('wshk_termstexto')!=''){ echo get_option('wshk_termstexto'); }?>" placeholder="<?php esc_html_e( "add your custom text here", "woo-shortcodes-kit" ); ?>"/ size="20"></td>
                    
                    
                    <td class="forsmalldropdowns" style="width: 36%; padding-left: 10px;"><p style="font-weight:600;font-size:14px;">2.- <?php esc_html_e( "Choose the terms and conditions page", "woo-shortcodes-kit" ); ?></p> 
                    
                    
                    
                    <select id="wshk_termslink" name="wshk_termslink" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          
  }
$gettermpagslug = get_option('wshk_termslink');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $gettermpagslug; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $gettermpagslug): echo $page->post_title; endif; endforeach; ?></option>
</select>
                    
                    
                    </td>
                    
                    
                    <td class="forsmalldropdowns" style="width: 31%;"><p style="font-weight:600;font-size:14px;">3.- <?php esc_html_e( "Write your custom text link", "woo-shortcodes-kit" ); ?></p> <input class="testininputclass" type="text" id="wshk_termstextlink" name="wshk_termstextlink" value="<?php if(get_option('wshk_termstextlink')!=''){ echo get_option('wshk_termstextlink'); }?>" placeholder="<?php esc_html_e( "add your custom link text here", "woo-shortcodes-kit" ); ?>"/ size="20"></td>
                </tr>
            </table>
            
             <p> <?php esc_html_e( 'Remember go to ', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;font-weight:600;text-decoration:underline;" href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=wc-settings&tab=advanced" target="_blank"><?php esc_html_e( 'WooCommerce settings', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( ' to disable the WooCommerce terms and conditions default page option', 'woo-shortcodes-kit' ); ?><br /></p><br /><br /> </td>
        
       </tr>
        
        <br />
        <br />
        </table>
        
        <div style="padding-left:30px;">
    <p><b>4.- <?php esc_html_e( 'Display options', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can choose if you want to show or hide the terms and conditions checkbox for logged in users. If your users have accepted the terms and conditions and you want to skip this step for the following orders, just check the option and it will be hide and checked automatically.', 'woo-shortcodes-kit' ); ?></small></p><br>
    <input type="checkbox" id="wshk_get_terms_hide" name="wshk_get_terms_hide" value='hide' <?php if(get_option('wshk_get_terms_hide')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_get_terms_hide"><?php esc_html_e( 'Hide Terms and conditions checkbox for logged in users', 'woo-shortcodes-kit' ); ?></label><br><br><br>
    <p style="color:grey;border:1px solid grey; border-radius:13px;padding:15px;"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Since version 1.9.3 this function allows to verify the acceptance of the terms and conditions of the website and can be consulted from the order page that the user has made. It is not necessary to carry out any additional configuration, once you have activated this function, each time the user places an order by checking the acceptance box of the Terms and Conditions, a verification message will be seen on the order page.', 'woo-shortcodes-kit' ); ?></p>
    <br><br><br>
</div>

        </div>