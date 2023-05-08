<?php
/*
GDPR - Global settings
*/
?>
<!-- Header -->
          <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_gprdsettings" name="wshk_gprdsettings" value='88' <?php if(get_option('wshk_gprdsettings')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_gprdsettings></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Global settings', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big> <br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/global-settings/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
<p class="wshkfirststepfunc forsmalldropdowns" style="padding-left: 30px;"><?php esc_html_e( 'This settings will be used for 4 different cases (WordPress comments, WooCommerce reviews, register form and checkout page).', 'woo-shortcodes-kit' ); ?></p>

<table style="width: 100%;"><tr><td class="forsmalldropdowns" style="width: 50%;padding-left:30px;">
    <p style="color:grey;border:1px solid grey; border-radius:13px;padding:15px;"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'The checkbox message can be configured from here globally or from each function to add a different message in each case.', 'woo-shortcodes-kit' ); ?></p><br>
    <p><b>1. <?php esc_html_e( 'Write your message for the checkbox:', 'woo-shortcodes-kit' ); ?> </b><br /><small style="color:grey;"><?php esc_html_e( 'Example: I have read and accept the privacy policy', 'woo-shortcodes-kit' ); ?></small><br /> <table><tr><td class="forsmalldropdowns"style="width: 50%;"><input class="testininputclass" type="text" name="wshk_gprdiread" id="wshk_gprdiread" value="<?php if(get_option('wshk_gprdiread')!=''){ echo get_option('wshk_gprdiread'); }?>" placeholder="<?php esc_html_e( "Write your custom checkbox message", "woo-shortcodes-kit" ); ?>" size="60" /></td></tr></table></p>
    
    
     <p><b>2. <?php esc_html_e( 'Set your custom privacy policy page:
', 'woo-shortcodes-kit' ); ?> </b><br /><small style="color:grey;"><?php esc_html_e( 'The choosed page will be linked with the checkbox message', 'woo-shortcodes-kit' ); ?></small><br /> <table><tr><td class="forsmalldropdowns" style="width: 50%;">
    
    <select id="wshk_gprdurlslug" name="wshk_gprdurlslug" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:250px;"> 
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
$getopprivpoli = get_option('wshk_gprdurlslug');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopprivpoli; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopprivpoli): echo $page->post_title; endif; endforeach; ?></option>
</select>

    </td></tr></table></p><br>



<!--<p style="font-weight: bolder; font-size: 16px;">3. <?php esc_html_e( 'Set your custom link text:', 'woo-shortcodes-kit' ); ?> <br /><br /> <table><tr><td style="width: 50%;"><input type="text" name="wshk_gprdpolit" id="wshk_gprdpolit" value="<?php if(get_option('wshk_gprdpolit')!=''){ echo get_option('wshk_gprdpolit'); }?>" placeholder="<?php esc_html_e( "Write your custom link text", "woo-shortcodes-kit" ); ?>" size="60" /></td></tr></table></p>-->

<!--<p style="font-weight: bolder; font-size: 16px;">4. <?php esc_html_e( 'Set your custom error text:', 'woo-shortcodes-kit' ); ?> <br /><br /> <table><tr><td style="width: 50%;"><input type="text" name="wshk_gprderror" id="wshk_gprderror" value="<?php if(get_option('wshk_gprderror')!=''){ echo get_option('wshk_gprderror'); }?>" placeholder="<?php esc_html_e( "Write your custom error text", "woo-shortcodes-kit" ); ?>" size="60" /></td></tr></table></p>-->

</td>

<td class="forsmalldropdowns" style="padding-left: 30px;width:50%;padding-top:25px;">
    <br />
<p><b>3. <?php esc_html_e( 'Set your verification message:', 'woo-shortcodes-kit' ); ?></b><br /><small style="color:grey;"><?php esc_html_e( 'This message will be shown in the emails of the administrator in each case, allowing that in any case of problems with the user, you can demonstrate that the user has accepted the privacy policy before performing the action.', 'woo-shortcodes-kit' ); ?></small><br /><br> <textarea name="wshk_gprduserlegalinfo" id="wshk_gprduserlegalinfo" class="textarea"  cols="100" rows="100" id="wshk_gprduserlegalinfo" placeholder="<?php esc_html_e( 'For example: This user has read and accepted the privacy policy before performing this action on the web. The data provided by the user, are treated in accordance with the provisions of the privacy policy of this website. In case of disagreement, this email can be used as proof, to prove it.', 'woo-shortcodes-kit' ); ?>" size="30%" style="height:400px;overflow: auto; -webkit-overflow-scrolling: touch;border:1px solid #ddd !Important;"><?php if(get_option('wshk_gprduserlegalinfo')!=''){ echo get_option('wshk_gprduserlegalinfo'); } else { echo'
<h1>WSHK EXAMPLE</h1>
<h2 style="color: #96588a;
    display: block;
    font-size: 18px;
    font-weight: bold;
    line-height: 130%;
    margin: 0 0 18px;
    text-align: left;">
Order validation
</h2>

<div style="border:1px solid #e5e5e5;padding:20px;font-size:14px;">
<p>This user has <strong>READ</strong>, <strong>UNDERSTOOD</strong> and <strong>ACCEPTED</strong> both the Privacy Policy of this website, as well as the Terms and Conditions.</p>


<p>No user can register, make a comment, order or rating without having accepted both checkboxes.</p>

<p>So any user, comment, order or rating that appears on this website has been 100% done with the consent of the user in question and moderated by the person in charge of the web, who can use this message as evidence in the event of a refund dispute and in the event that the Spanish Data Protection Agency requires it.</p>
</div>
';}?></textarea><br /></p>




</td>
</tr></table>
 <p style="padding-left:30px;"> <?php esc_html_e( 'Remember go to ', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;font-weight:600;text-decoration:underline;" href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=wc-settings&tab=account" target="_blank"><?php esc_html_e( 'WooCommerce settings', 'woo-shortcodes-kit' ); ?></a> <?php esc_html_e( ' to disable the WooCommerce Privacy page option and remove the Privacy policy default texts', 'woo-shortcodes-kit' ); ?><br /></p><br /><br />
    <br />
    <br />
    </div>