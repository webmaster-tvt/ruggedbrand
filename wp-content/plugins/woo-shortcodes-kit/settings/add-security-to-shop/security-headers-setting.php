<?php
/*
Security headers
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesecheaders" name="wshk_enablesecheaders" value='95' <?php if(get_option('wshk_enablesecheaders')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesecheaders></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Add security headers in your website', 'woo-shortcodes-kit' ); ?> </big><br /><small> <?php esc_html_e( 'Just need activate the function and nothing more!', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- Content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/add-security-headers-in-your-website/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br /><br>
    <p class="wshkfirststepfunc"><?php esc_html_e( 'This function adds security rules to your website and helps you prevent different types of attacks.', 'woo-shortcodes-kit' ); ?> <br /><br /></p>
    <?php
    global $pluginOptionsVal;
$pluginOptionsVal=get_wshk_sidebar_options();
      if(isset($pluginOptionsVal['wshk_enablesecheaders']) && $pluginOptionsVal['wshk_enablesecheaders']==95)
{
    ?>
    <div>
        <table class="wshksecheadtab" width="600px">
            
            <tr><td width="70%" style="font-weight:bold;"><?php esc_html_e( 'HEADERS', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="font-weight:bold;"><?php esc_html_e( 'STATUS', 'woo-shortcodes-kit' ); ?></td></tr><br><br>
            
            <tr><td width="70%"><?php esc_html_e( 'Enforce the use of HTTPS', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent Clickjacking', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent XSS Attack', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Block Access If XSS Attack Is Suspected', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent MIME-Type Sniffing', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Referrer Policy', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Feature Policy', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:green;"><?php esc_html_e( 'ENABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-yes"></span></td></tr>
        
        </table>
        <br><br>
        <?php 
        $siteurlwshk = get_site_url();
        $testurlwshk = 'https://securityheaders.com/?q='.$siteurlwshk.'&hide=on&followRedirects=on';
        ?>
        <div><h3 style="font-weight:bold;letter-spacing:1px;"><span style="border-radius: 12px;font-family: Arial,Helvetica,sans-serif;text-align: center;margin: auto;width: 65px;height: 65px;font-size: 90px;line-height: 65px;color: #fff;font-weight: 700;background-color: #34af00;border: 2px solid #309d00;font-size:16px;padding:5px;">A+</span> <?php esc_html_e( 'SECURITY HEADERS SCAN', 'woo-shortcodes-kit' ); ?> <a style="border:1px solid transparent; border-radius:13px;padding:10px;background-color:#60329b;color:white;font-size:14px;" href="<?php echo $testurlwshk; ?>" target="_blank"><?php esc_html_e( 'CHECK YOUR SITE NOW', 'woo-shortcodes-kit' ); ?></a></h3><p><?php esc_html_e( 'If your test result follow in red, please close the test and wait 30-60 seconds before to check your site again', 'woo-shortcodes-kit' ); ?>.</p></div>
        
    </div>
    <?php } else {?>
    <div>
        <table width="600px">
            
            <tr><td width="70%" style="font-weight:bold;"><?php esc_html_e( 'HEADERS', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="font-weight:bold;"><?php esc_html_e( 'STATUS', 'woo-shortcodes-kit' ); ?></td></tr><br><br>
            
            <tr><td width="70%"><?php esc_html_e( 'Enforce the use of HTTPS', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent Clickjacking', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent XSS Attack', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Block Access If XSS Attack Is Suspected', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Prevent MIME-Type Sniffing', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Referrer Policy', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
            
            <tr><td width="70%"><?php esc_html_e( 'Feature Policy', 'woo-shortcodes-kit' ); ?></td><td width="30%" style="color:red;"><?php esc_html_e( 'DISABLED', 'woo-shortcodes-kit' ); ?> <span class="dashicons dashicons-no-alt"></span></td></tr>
        
        </table>
        <br><br>
    <?php 
        $siteurlwshk = get_site_url();
        $testurlwshk = 'https://securityheaders.com/?q='.$siteurlwshk.'&hide=on&followRedirects=on';
        ?>
    <div><h3 style="font-weight:bold;letter-spacing:1px;"><span style="border-radius: 12px;font-family: Arial,Helvetica,sans-serif;text-align: center;margin: auto;width: 85px;height: 65px;font-size: 90px;line-height: 65px;color: #fff;font-weight: 700;background-color: red;border: 2px solid darkred;font-size:16px;padding:5px;">F</span> <?php esc_html_e( 'SECURITY HEADERS SCAN', 'woo-shortcodes-kit' ); ?> <a style="border:1px solid transparent; border-radius:13px;padding:10px;background-color:#60329b;color:white;font-size:14px;" href="<?php echo $testurlwshk; ?>" target="_blank"><?php esc_html_e( 'CHECK YOUR SITE NOW', 'woo-shortcodes-kit' ); ?></a></h3></div>
    <?php } ?>
    <br />
    <br />
    </div>

    
    <!--</div>-->