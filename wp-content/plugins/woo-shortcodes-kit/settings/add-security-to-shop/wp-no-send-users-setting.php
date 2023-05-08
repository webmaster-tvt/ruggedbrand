<?php
/*
Prevent send users on WP updates check
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_nosendusers" name="wshk_nosendusers" value='1850' <?php if(get_option('wshk_nosendusers')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_nosendusers></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Prevent send users on WP updates check', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate the function and nothing more!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/prevent-send-users-on-wp-updates-check/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'This function adds security rules to avoid knowing the number of users on your website.', 'woo-shortcodes-kit' ); ?> <br /><?php esc_html_e( 'Since 2010, every time WordPress checks for updates, it sends the number of users of your website.', 'woo-shortcodes-kit' ); ?><br /><?php esc_html_e( 'This can be used by attackers to find out the number of users a website has and see if it is of interest to establish them as the target to attack.', 'woo-shortcodes-kit' ); ?></p>
    
    <br />
    <p><?php esc_html_e( 'Activating this function we make sure to zero the blog and the number of users.', 'woo-shortcodes-kit' ); ?></p>
    <br />
    </div>