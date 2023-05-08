<?php
/*
Display the user orders according to the status of the order
*/
?>
<!-- Header -->
        <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableordercountser" name="wshk_enableordercountser" value='8822' <?php if(get_option('wshk_enableordercountser')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableordercountser></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Display the user orders according to the status of the order', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'MOVED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Expand for see the functions and shortcodes', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/display-the-user-orders-according-to-the-status-of-the-order/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcodes', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br>
<p>
    <?php esc_html_e( 'To understand how they work, these shortcodes show the total number of orders placed by the user in your store. This will allow the user to know how many orders they have made according to their status. To use them, you only need to copy the shortcode and paste it into the page my account or some other private page, since the user must have logged in to see the results of the shortcode. You can add text before or after the shortcode.', 'woo-shortcodes-kit' ); ?></p><br /><br /> 


<table width="100%">
    <tr><th class="wshkhidefuncol" style="padding-left:20px;"><?php esc_html_e( 'FUNCTIONS', 'woo-shortcodes-kit' ); ?></th>
    <th style="padding-left:20px;"><?php esc_html_e( 'SHORTCODES', 'woo-shortcodes-kit' ); ?></th></tr>
    <tr>
        <td class="wshkhidefuncol" style="width:40%;">
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total orders', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total pending', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total on hold', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total in process', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total completed', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total cancelled', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total refunded', 'woo-shortcodes-kit' ); ?></p>
            <p style="border-bottom:1px solid grey;padding-left:20px;"><?php esc_html_e( 'Total failed', 'woo-shortcodes-kit' ); ?></p>
        </td>
        
        <td class="forsmalldropdowns" style="width:40%;">
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-pending]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-onhold]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-process]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-completed]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-cancelled]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-refunded]</p>
            <p style="border-bottom:1px solid grey;padding-left:20px;">[woo-order-count-failed]</p>
        </td>
    </tr>
</table>

    <br />
    <br />
    </div>
