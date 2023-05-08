<?php
/*
Logout button shortcode
*/
?>
<!-- Header -->
     <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablelogoutbtn" name="wshk_enablelogoutbtn" value='12' <?php if(get_option('wshk_enablelogoutbtn')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablelogoutbtn></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Logout button shortcode', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/logout-button-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Use it only in your custom account page', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_logout_button]" id="woomylogout" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionlogout()" onmouseout="outFunclogout()">
  <span class="tooltiptext" id="myTooltiplogout"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomylogout").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionlogout() {
  var copyText = document.getElementById("woomylogout");
  copyText.select();
  document.execCommand("copy");
  
  var tooltiplogout = document.getElementById("myTooltiplogout");
  tooltiplogout.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunclogout() {
  var tooltiplogout = document.getElementById("myTooltiplogout");
  tooltiplogout.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
    <p><b>2.- <?php esc_html_e( 'Function and Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but you must complete the fields for the Logout button to be displayed', 'woo-shortcodes-kit' ); ?></small></p>
    
    
    
    
    
    
    <br /><br /><table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px;">
           
    <p> <?php esc_html_e( 'Button border (size):', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" name="wshk_logbtnbdsize" id="wshk_logbtnbdsize" value="<?php if(get_option('wshk_logbtnbdsize')!=''){ echo get_option('wshk_logbtnbdsize'); }?>" placeholder="1px" size="50" /></p>    
    <p> <?php esc_html_e( 'Button border (radius):', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" name="wshk_logbtnbdradius" id="wshk_logbtnbdradius" value="<?php if(get_option('wshk_logbtnbdradius')!=''){ echo get_option('wshk_logbtnbdradius'); }?>" placeholder="13%" size="50" /></p>
    <p> <?php esc_html_e( 'Button border (color):', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_logbtnbdcolor" id="wshk_logbtnbdcolor" value="<?php if(get_option('wshk_logbtnbdcolor')!=''){ echo get_option('wshk_logbtnbdcolor'); }?>" placeholder="#a46497" size="50" /></p>
    <p> <?php esc_html_e( 'Button border (type):', 'woo-shortcodes-kit' ); ?><br /><br />
    <select name="wshk_logbtnbdtype" id="wshk_logbtnbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_logbtnbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_logbtnbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_logbtnbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_logbtnbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
    </p> 
    
    <br /><br />
    </td> 
     <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;">         
    <p> <?php esc_html_e( 'Button text:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_logbtntext" id="wshk_logbtntext" value="<?php if(get_option('wshk_logbtntext')!=''){ echo get_option('wshk_logbtntext'); }?>" placeholder="<?php esc_html_e( "Logout", "woo-shortcodes-kit" ); ?>" size="50" /></p>
    <p> <?php esc_html_e( 'Button text-decoration:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_logbtntd" id="wshk_logbtntd" value="<?php if(get_option('wshk_logbtntd')!=''){ echo get_option('wshk_logbtntd'); }?>" placeholder="<?php esc_html_e( "none", "woo-shortcodes-kit" ); ?>" size="50" /></p>
    <p> <?php esc_html_e( 'Button width:', 'woo-shortcodes-kit' ); ?><br /><br /> <input class="testininputclass" type="number" name="wshk_logbtnwd" id="wshk_logbtnwd" value="<?php if(get_option('wshk_logbtnwd')!=''){ echo get_option('wshk_logbtnwd'); }?>" placeholder="100px" size="50" /></p>
    <p> <?php esc_html_e( 'Button text-align:', 'woo-shortcodes-kit' ); ?><br /><br />
    <select name="wshk_logbtnta" id="wshk_logbtnta" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_logbtnta') == 'left') { ?>selected="true" <?php }; ?> value="left"><?php esc_html_e( 'Left', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_logbtnta') == 'center') { ?>selected="true" <?php }; ?> value="center"><?php esc_html_e( 'Center', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_logbtnta') == 'right') { ?>selected="true" <?php }; ?> value="right"><?php esc_html_e( 'Right', 'woo-shortcodes-kit' ); ?></option> </select>
    </p>
    
    <br /><br />
    </td>                    
    
    </tr>
    </table>
    <br />
    <br />
    <p><b>3.- <?php esc_html_e( 'Choose the page to redirect the user after logging out', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By default the logout button will redirect the users to the WooCommerce my account page, but you can change it for your custom page.', 'woo-shortcodes-kit' ); ?></small></p>
    <div style="padding: 30px;">
        
            <p>
            
            
            <select id="wshk_btnlogoutredi" name="wshk_btnlogoutredi" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
 <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
      
      printf( '<option value="%1$s">%2$s</option>',
            //esc_html( get_page_link( $page->ID ) ),
            esc_html( $page->post_name ),
            esc_html( $page->post_title )
            
        );
          //var_dump($pages);
      
    /*$option = '<option value="' . get_page_link( $page->ID ) . '">';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;*/
  }
$getopculogout = get_option('wshk_btnlogoutredi');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getopculogout; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getopculogout): echo $page->post_title; endif; endforeach; ?></option>
</select><br>
            
            
            <small><?php esc_html_e( 'Use it if you are building your own myaccount page and want redirect the user to a specific page after the logout.', 'woo-shortcodes-kit' ); ?></small></p>    
    
    
    <br /><br />
        
    </div>
    
    </div>