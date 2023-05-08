<?php 
/*
Products per page manager
*/
?>
<!-- Header -->
<div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
        <th><p><input type="checkbox" class="testininputclass" id="wshk_perpage" name="wshk_perpage" value='3' <?php if(get_option('wshk_perpage')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_perpage></label><br /></th> <th class="forcontainertitles"
 style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Products per page Manager', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>      
        </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/products-per-page-manager/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Write the number of products to display per page', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'This function is also compatible with the functions: Show only/Exclude products from specific categories on the shop page', 'woo-shortcodes-kit' ); ?></small></p>
<br><br>
    <table cellspacing="50">
        <tr>
        <td style="width:50%;">    
        <p><?php esc_html_e( 'Number of products per page in shop page:', 'woo-shortcodes-kit' ); ?><br /><br /> <input type="number" class="testininputclass" id="wshk_nperpage" name="wshk_nperpage" value="<?php if(get_option('wshk_nperpage')!=''){ echo get_option('wshk_nperpage'); }?>" placeholder="<?php esc_html_e( "-1 to show all products", "woo-shortcodes-kit" ); ?>"/ size="20"><small> <?php esc_html_e( 'Write -1 to display All products', 'woo-shortcodes-kit' ); ?></small><br /></p>
        </td>
        <td>
            <p><?php esc_html_e( 'Number of products per page in products categories pages:', 'woo-shortcodes-kit' ); ?><br /><br /> <input type="number" class="testininputclass" id="wshk_nperpagecats" name="wshk_nperpagecats" value="<?php if(get_option('wshk_nperpagecats')!=''){ echo get_option('wshk_nperpagecats'); }?>" placeholder="<?php esc_html_e( "-1 to show all products", "woo-shortcodes-kit" ); ?>"/ size="20"><small> <?php esc_html_e( 'Write -1 to display All products', 'woo-shortcodes-kit' ); ?></small><br /></p>
        </td>
        </tr>
        </table>
        <br><br>
        <p style="border: 1px solid #ddd;padding:10px;color:#a46497"><b><?php esc_html_e( 'This function is prepared to be compatible if you are using a DIVI theme, but sometimes it is not effective.', 'woo-shortcodes-kit' ); ?></b><br><small style="color:grey;"><?php esc_html_e( 'This is because DIVI already offers this function, so preference is given to the native function.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'If you are using DIVI and the function is not working, go to: Divi Theme Options > General > Number of Products displayed on WooCommerce archive pages to configure it.', 'woo-shortcodes-kit' ); ?></small></p>
        <br />
        <br />
        </div>