<?php
/*
Block admin top bar for non admins
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesadminbar" name="wshk_enablesadminbar" value='21' <?php if(get_option('wshk_enablesadminbar')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesadminbar></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Block users access to the backend from the top administrator bar', 'woo-shortcodes-kit' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate the function and nothing more!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/block-users-access-to-the-backend-from-the-top-administrator-bar/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'After activating this function, no user can access the backend from the top bar of the administrator, because it will be hidden.', 'woo-shortcodes-kit' ); ?></p>
    <br />
    <br />
    </div>
