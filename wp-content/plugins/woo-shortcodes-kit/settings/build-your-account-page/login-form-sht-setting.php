<?php
/*
Login form shortcode
*/
?>
<!-- Header -->
     <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enableloginform" name="wshk_enableloginform" value='13' <?php if(get_option('wshk_enableloginform')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableloginform></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Login form shortcode', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/login-form-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <!--<p class="wshkfirststepfunc wshkintrobox"><?php /*esc_html_e( 'With this shortcode you can display the WooCommerce login form where you need. Its works as the by default login form. When the user is not logged in, the login form will be displayed and when is logged in the shortcode not display anything. Also you can manage where redirect the user after login choosing a specific page or the previously visited page.', 'woo-shortcodes-kit' );*/ ?></p>-->
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it in your custom account page and also in other pages, posts, products pages and where you need!', 'woo-shortcodes-kit' ); ?></small></p>
    <br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_login_form]" id="woomyloginform" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionloginform()" onmouseout="outFuncloginform()">
  <span class="tooltiptext" id="myTooltiploginform"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyloginform").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionloginform() {
  var copyText = document.getElementById("woomyloginform");
  copyText.select();
  document.execCommand("copy");
  
  var tooltiploginform = document.getElementById("myTooltiploginform");
  tooltiploginform.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncloginform() {
  var tooltiploginform = document.getElementById("myTooltiploginform");
  tooltiploginform.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
    
    
   <p><b>2.- <?php esc_html_e( 'Choose the page to redirect the user after login', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Use it if you are building your own myaccount page or want redirect the user to a specific page after the login.', 'woo-shortcodes-kit' ); ?></small></p> 
    
    
    <table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px;width:50%;">
           
    <p>
    
    <select id="wshk_loginredi" name="wshk_loginredi" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
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
$getoplogin = get_option('wshk_loginredi');
 ?>
 <option style="background-color:#a46497;color:white;" value="<?php echo $getoplogin; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($pages as $page): if($page->post_name == $getoplogin): echo $page->post_title; endif; endforeach; ?></option>
</select>
    </p>
    <br><br>
    <p><b>2.1.- <?php esc_html_e( 'Redirect to previous visited page', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'After the login, the user will be redirected to the previously visited page and, if this is not possible, will be redirected to the page selected in step 2.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'When this option is enabled, it replaces the page selected in step 2', 'woo-shortcodes-kit' ); ?></small></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_enablepreviousvisited" name="wshk_enablepreviousvisited" value='previousactiv' <?php if(get_option('wshk_enablepreviousvisited')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_enablepreviousvisited"><?php esc_html_e( 'Redirect the user to the previously visited page', 'woo-shortcodes-kit' ); ?></label></p>
    <br />
    <br />
    </td>
    </tr>
    </table>
    
    <!--<p><b>3.- <?php esc_html_e( 'Custom redirections by role', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'After the login the users with a specific role will be redirected to the selected page.', 'woo-shortcodes-kit' ); ?><br><?php esc_html_e( 'This option is compatible with all the options availables on the step 2.', 'woo-shortcodes-kit' ); ?></small></p>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_enablecustrediroladmin" name="wshk_enablecustrediroladmin" value='wshkroladminactiv' <?php if(get_option('wshk_enablecustrediroladmin')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_enablecustrediroladmin"><?php esc_html_e( 'Redirection for Admin role', 'woo-shortcodes-kit' ); ?></label></p>
    <br />
    <br />-->
    </div>