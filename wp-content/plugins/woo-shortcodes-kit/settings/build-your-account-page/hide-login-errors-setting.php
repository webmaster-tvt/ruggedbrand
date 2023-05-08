<?php
/*
Hide WC login form errors
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablehidelogerror" name="wshk_enablehidelogerror" value='86' <?php if(get_option('wshk_enablehidelogerror')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablehidelogerror></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Hide login errors in the login form', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/hide-login-errors-in-the-login-form/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
  <p class="wshkfirststepfunc"><?php esc_html_e( '
By default, WooCommerce shows form failures when entering an incorrect field.

For example, if you add the password incorrectly, it will indicate that the password is incorrect. The same happens if you make a mistake in the user.

This function prevents this type of information from being displayed and also allows you to add a personalized message.', 'woo-shortcodes-kit' ); ?></p><br>
    <p><?php esc_html_e( 'Write a custom message to display if something go bad while the login:
', 'woo-shortcodes-kit' ); ?> <br /><br /> <table><tr><td style="width: 50%;"><input class="testininputclass" type="text" name="wshk_hidelogerrorcustomessage" id="wshk_hidelogerrorcustomessage" value="<?php if(get_option('wshk_hidelogerrorcustomessage')!=''){ echo get_option('wshk_hidelogerrorcustomessage'); }?>" placeholder="<?php esc_html_e( "Write your custom message", "woo-shortcodes-kit" ); ?>" size="60" /></td></tr></table></p>
    <br />
    <br />
    </div>