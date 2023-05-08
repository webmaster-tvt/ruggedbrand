<?php
/*
Customer reviews shortcode
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="1">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablereviews" name="wshk_enablereviews" value='9' <?php if(get_option('wshk_enablereviews')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablereviews></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Customer reviews shortcode', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/customer-reviews-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Use it only in your custom account page', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 23%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_review_products]" id="woomyreviewpro" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionreviewpro()" onmouseout="outFuncreviewpro()">
  <span class="tooltiptext" id="myTooltipreviewpro"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyreviewpro").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionreviewpro() {
  var copyText = document.getElementById("woomyreviewpro");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipreviewpro = document.getElementById("myTooltipreviewpro");
  tooltipreviewpro.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncreviewpro() {
  var tooltipreviewpro = document.getElementById("myTooltipreviewpro");
  tooltipreviewpro.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 53%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
    
    <p><b>2.- <?php esc_html_e( 'Function and Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but you must complete the fields for the review products to be displayed', 'woo-shortcodes-kit' ); ?></small></p>
    <br><br>
    <table>
    <tr>    
    <td class="forsmalldropdowns" style="padding: 30px; width: 35%;"><h4><span class="dashicons dashicons-admin-users"></span> <?php esc_html_e( 'Customize the avatar', 'woo-shortcodes-kit' ); ?></h4>
    <p> <?php esc_html_e( 'Avatar size:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" id="wshk_textavsize" name="wshk_textavsize"  value="<?php if(get_option('wshk_textavsize')!=''){ echo get_option('wshk_textavsize'); }?>" placeholder="78px"/ size="20" ></p>     
    <p> <?php esc_html_e( 'Avatar border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textavbdsize" id="wshk_textavbdsize" value="<?php if(get_option('wshk_textavbdsize')!=''){ echo get_option('wshk_textavbdsize'); }?>" placeholder="2px" size="10" /></p>    
    <p> <?php esc_html_e( 'Avatar border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textavbdradius" id="wshk_avbdradius" value="<?php if(get_option('wshk_textavbdradius')!=''){ echo get_option('wshk_textavbdradius'); }?>" placeholder="100%" size="10" /></p>    
   <p> <?php esc_html_e( 'Avatar border (type):', 'woo-shortcodes-kit' ); ?><br />
   <select name="wshk_textavbdtype" id="wshk_textavbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_textavbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textavbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textavbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_textavbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
   </p>   
    <p> <?php esc_html_e( 'Avatar border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textavbdcolor" id="wshk_textavbdcolor" value="<?php if(get_option('wshk_textavbdcolor')!=''){ echo get_option('wshk_textavbdcolor'); }?>" placeholder="#ffffff" size="10" /></p>
    <p> <?php esc_html_e( 'Avatar cell (width):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_texttbwsize" id="wshk_texttbwsize" value="<?php if(get_option('wshk_texttbwsize')!=''){ echo get_option('wshk_texttbwsize'); }?>" placeholder="100px" size="10" /></p>
    <p> <?php esc_html_e( 'Avatar shadow:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_avshadow" id="wshk_avshadow" value="<?php if(get_option('wshk_avshadow')!=''){ echo get_option('wshk_avshadow'); }?>" placeholder="5px 5px 5px #c2c2c2" size="10" /></p>
     
    <br /><br />
    </td> 
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid; width: 35%;"><h4><span class="dashicons dashicons-id"></span> <?php esc_html_e( 'Customize the box', 'woo-shortcodes-kit' ); ?></h4>
    <p> <?php esc_html_e( 'Box Font (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbxfsize" id="wshk_textbxfsize" value="<?php if(get_option('wshk_textbxfsize')!=''){ echo get_option('wshk_textbxfsize'); }?>" placeholder="16px" size="10" /></p>        
    <p> <?php esc_html_e( 'Box border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbxbdsize" id="wshk_textbxbdsize" value="<?php if(get_option('wshk_textbxbdsize')!=''){ echo get_option('wshk_textbxbdsize'); }?>" placeholder="1px" size="10" /></p>    
    <p> <?php esc_html_e( 'Box border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbxbdradius" id="wshk_textbxbdradius" value="<?php if(get_option('wshk_textbxbdradius')!=''){ echo get_option('wshk_textbxbdradius'); }?>" placeholder="13%" size="10" /></p>    
   <p> <?php esc_html_e( 'Box border (type):', 'woo-shortcodes-kit' ); ?><br />
   <select name="wshk_textbxbdtype" id="wshk_textbxbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_textbxbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textbxbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textbxbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_textbxbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
   </p>   
    <p> <?php esc_html_e( 'Box border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbxbdcolor" id="wshk_textbxbdcolor" value="<?php if(get_option('wshk_textbxbdcolor')!=''){ echo get_option('wshk_textbxbdcolor'); }?>" placeholder="#a46497" size="10%" /></p>
    <p> <?php esc_html_e( 'Box background (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbxbgcolor" id="wshk_textbxbgcolor" value="<?php if(get_option('wshk_textbxbgcolor')!=''){ echo get_option('wshk_textbxbgcolor'); }?>" placeholder="#ffffff" size="10%" /></p>
    <p> <?php esc_html_e( 'Box padding:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbxpadding" id="wshk_textbxpadding" value="<?php if(get_option('wshk_textbxpadding')!=''){ echo get_option('wshk_textbxpadding'); }?>" placeholder="20px" size="10" /></p>  
    <br /><br />
    </td> 
     <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid; witdh: 35%;"><h4><span class="dashicons dashicons-slides"></span> <?php esc_html_e( 'Customize the button', 'woo-shortcodes-kit' ); ?></h4>         
    <p> <?php esc_html_e( 'Button border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbtnbdsize" id="wshk_textbtnbdsize" value="<?php if(get_option('wshk_textbtnbdsize')!=''){ echo get_option('wshk_textbtnbdsize'); }?>" placeholder="1px" size="10" /></p>
    <p> <?php esc_html_e( 'Button border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_textbtnbdradius" id="wshk_textbtnbdradius" value="<?php if(get_option('wshk_textbtnbdradius')!=''){ echo get_option('wshk_textbtnbdradius'); }?>" placeholder="13%" size="10" /></p>
   
    <p> <?php esc_html_e( 'Button border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbtnbdcolor" id="wshk_textbtnbdcolor" value="<?php if(get_option('wshk_textbtnbdcolor')!=''){ echo get_option('wshk_textbtnbdcolor'); }?>" placeholder="#a46497" size="10" /></p>
    <p> <?php esc_html_e( 'Button border (type):', 'woo-shortcodes-kit' ); ?><br /> 
   <select name="wshk_textbtnbdtype" id="wshk_textbtnbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_textbtnbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textbtnbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_textbtnbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_textbtnbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
   </p>
    <p> <?php esc_html_e( 'Button target:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbtntarget" id="wshk_textbtntarget" value="<?php if(get_option('wshk_textbtntarget')!=''){ echo get_option('wshk_textbtntarget'); }?>" placeholder="_blank" size="10" /></p>
    <p> <?php esc_html_e( 'Button text-decoration:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbtntxd" id="wshk_textbtntxd" value="<?php if(get_option('wshk_textbtntxd')!=''){ echo get_option('wshk_textbtntxd'); }?>" placeholder="none" size="10" /></p>
    <p> <?php esc_html_e( 'Button text:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_textbtntxt" id="wshk_textbtntxt" value="<?php if(get_option('wshk_textbtntxt')!=''){ echo get_option('wshk_textbtntxt'); }?>" placeholder="<?php esc_html_e( "View product", "woo-shortcodes-kit" ); ?>" size="10" /></p>
    <br /><br />
    </td>                    
    </tr>
   
    </table>
    <br/><br>
    <p><b>3.- <?php esc_html_e( 'How many reviews want display?', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Write all to show all reviews or a specific number to show this number of reviews', 'woo-shortcodes-kit' ); ?></small></p><br>
    <p style="max-width:500px;"><input class="testininputclass" type="text" name="wshk_numbrevdis" id="wshk_numbrevdis" value="<?php if(get_option('wshk_numbrevdis')!=''){ echo get_option('wshk_numbrevdis'); }?>" placeholder="5" size="10" /><small><?php esc_html_e( 'When the user has made more reviews than the set number, the pagination will appear below the reviews to navigate between the previous reviews.', 'woo-shortcodes-kit' ); ?></small></p>
    <br /><br />
    
    </div>