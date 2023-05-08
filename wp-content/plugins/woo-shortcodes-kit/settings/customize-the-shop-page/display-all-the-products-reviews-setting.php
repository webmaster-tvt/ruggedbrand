<?php
/*
Display all the products reviews where you want
*/
?>
<!-- Header -->
    <div class="accordion">
  <table>
  <colgroup>
    <col span="1">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enabledisplayreviews" name="wshk_enabledisplayreviews" value='40' <?php if(get_option('wshk_enabledisplayreviews')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enabledisplayreviews></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Display all the products reviews where you want', 'woo-shortcodes-kit' ); ?></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th></tr>
    </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/display-all-the-products-reviews-where-you-want/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_display_reviews]" id="woomyallreviews" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionallreviews()" onmouseout="outFuncallreviews()">
  <span class="tooltiptext" id="myTooltipallreviews"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woomyallreviews").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionallreviews() {
  var copyText = document.getElementById("woomyallreviews");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipallreviews = document.getElementById("myTooltipallreviews");
  tooltipallreviews.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncallreviews() {
  var tooltipallreviews = document.getElementById("myTooltipallreviews");
  tooltipallreviews.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
<p><b>2.- <?php esc_html_e( 'Function and Style settings', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Each field shows an example of what to write, but by default it only will show the quantity of reviews, you must complete the fields that will be displayed', 'woo-shortcodes-kit' ); ?></small></p><br>
    <br /><table width="100%">
    <tr>    
    <td class="forsmalldropdowns" style="padding: 30px; width: 50%;"><h4 style=""><span class="dashicons dashicons-admin-users"></span> <?php esc_html_e( 'Customize the avatar', 'woo-shortcodes-kit' ); ?></h4>
    <p> <?php esc_html_e( 'Avatar size:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" id="wshk_disretextavsize" name="wshk_disretextavsize"  value="<?php if(get_option('wshk_disretextavsize')!=''){ echo get_option('wshk_disretextavsize'); }?>" placeholder="48px"/ size="20" ></p>     
    <p> <?php esc_html_e( 'Avatar border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextavbdsize" id="wshk_disretextavbdsize" value="<?php if(get_option('wshk_disretextavbdsize')!=''){ echo get_option('wshk_disretextavbdsize'); }?>" placeholder="1px" size="10" /></p>    
    <p> <?php esc_html_e( 'Avatar border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextavbdradius" id="wshk_disretextavbdradius" value="<?php if(get_option('wshk_disretextavbdradius')!=''){ echo get_option('wshk_disretextavbdradius'); }?>" placeholder="100%" size="10" /></p>    
   <p> <?php esc_html_e( 'Avatar border (type):', 'woo-shortcodes-kit' ); ?><br />
   <select name="wshk_disretextavbdtype" id="wshk_disretextavbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_disretextavbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disretextavbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disretextavbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_disretextavbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
   </p>   
    <p> <?php esc_html_e( 'Avatar border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextavbdcolor" id="wshk_disretextavbdcolor" value="<?php if(get_option('wshk_disretextavbdcolor')!=''){ echo get_option('wshk_disretextavbdcolor'); }?>" placeholder="#ffffff" size="10" /></p>
    <p> <?php esc_html_e( 'Avatar cell (width):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretexttbwsize" id="wshk_disretexttbwsize" value="<?php if(get_option('wshk_disretexttbwsize')!=''){ echo get_option('wshk_disretexttbwsize'); }?>" placeholder="100px" size="10" /></p>
    <p> <?php esc_html_e( 'Avatar margin top:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextmargintop" id="wshk_disretextmargintop" value="<?php if(get_option('wshk_disretextmargintop')!=''){ echo get_option('wshk_disretextmargintop'); }?>" placeholder="15px" size="10" /></p>
    <!--<p> <?php esc_html_e( 'Avatar shadow:', 'woo-shortcodes-kit' ); ?><br /> <input type="text" name="wshk_avshadow" id="wshk_avshadow" value="<?php if(get_option('wshk_avshadow')!=''){ echo get_option('wshk_avshadow'); }?>" placeholder="5px 5px 5px #c2c2c2" size="10" /></p>-->
    <br><br>
    
    <h4 style=""><span class="dashicons dashicons-edit"></span> <?php esc_html_e( 'Customize the title', 'woo-shortcodes-kit' ); ?></h4>
    
    <p> <?php esc_html_e( 'Title text size:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextlinktxtsize" id="wshk_disretextlinktxtsize" value="<?php if(get_option('wshk_disretextlinktxtsize')!=''){ echo get_option('wshk_disretextlinktxtsize'); }?>" placeholder="24px" size="10" /></p>
    <p> <?php esc_html_e( 'Title text color:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextlinktxtcolor" id="wshk_disretextlinktxtcolor" value="<?php if(get_option('wshk_disretextlinktxtcolor')!=''){ echo get_option('wshk_disretextlinktxtcolor'); }?>" placeholder="#ffffff" size="10" /></p>
    <p> <?php esc_html_e( 'Title text-decoration:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextlinktxd" id="wshk_disretextlinktxd" value="<?php if(get_option('wshk_disretextlinktxd')!=''){ echo get_option('wshk_disretextlinktxd'); }?>" placeholder="none" size="10" /></p>
    <p> <?php esc_html_e( 'Title link target:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextlinktarget" id="wshk_disretextlinktarget" value="<?php if(get_option('wshk_disretextlinktarget')!=''){ echo get_option('wshk_disretextlinktarget'); }?>" placeholder="_blank" size="10" /></p>
    <!--<br />-->
     
    <!--<br /><br /><br /><br />-->
    </td> 
    <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;"><h4><span class="dashicons dashicons-id"></span> <?php esc_html_e( 'Customize the box', 'woo-shortcodes-kit' ); ?></h4>
    <p> <?php esc_html_e( 'Box Font (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextbxfsize" id="wshk_disretextbxfsize" value="<?php if(get_option('wshk_disretextbxfsize')!=''){ echo get_option('wshk_disretextbxfsize'); }?>" placeholder="16px" size="10" /></p>        
    <p> <?php esc_html_e( 'Box border (size):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextbxbdsize" id="wshk_disretextbxbdsize" value="<?php if(get_option('wshk_disretextbxbdsize')!=''){ echo get_option('wshk_disretextbxbdsize'); }?>" placeholder="1px" size="10" /></p>    
    <p> <?php esc_html_e( 'Box border (radius):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextbxbdradius" id="wshk_disretextbxbdradius" value="<?php if(get_option('wshk_disretextbxbdradius')!=''){ echo get_option('wshk_disretextbxbdradius'); }?>" placeholder="13%" size="10" /></p>    
   <p> <?php esc_html_e( 'Box border (type):', 'woo-shortcodes-kit' ); ?><br />
   <select name="wshk_disretextbxbdtype" id="wshk_disretextbxbdtype" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_disretextbxbdtype') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disretextbxbdtype') == 'solid') { ?>selected="true" <?php }; ?> value="solid"><?php esc_html_e( 'Solid', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disretextbxbdtype') == 'dashed') { ?>selected="true" <?php }; ?> value="dashed"><?php esc_html_e( 'Dashed', 'woo-shortcodes-kit' ); ?></option><option <?php if (get_option('wshk_disretextbxbdtype') == 'dotted') { ?>selected="true" <?php }; ?> value="dotted"><?php esc_html_e( 'Dotted', 'woo-shortcodes-kit' ); ?></option></select>
   </p>   
    <p> <?php esc_html_e( 'Box border (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextbxbdcolor" id="wshk_disretextbxbdcolor" value="<?php if(get_option('wshk_disretextbxbdcolor')!=''){ echo get_option('wshk_disretextbxbdcolor'); }?>" placeholder="#a46497" size="10%" /></p>
    <p> <?php esc_html_e( 'Box background (color):', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextbxbgcolor" id="wshk_disretextbxbgcolor" value="<?php if(get_option('wshk_disretextbxbgcolor')!=''){ echo get_option('wshk_disretextbxbgcolor'); }?>" placeholder="#ffffff" size="10%" /></p>
    <p> <?php esc_html_e( 'Box padding:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextbxpadding" id="wshk_disretextbxpadding" value="<?php if(get_option('wshk_disretextbxpadding')!=''){ echo get_option('wshk_disretextbxpadding'); }?>" placeholder="20px" size="10" /></p>
    <p> <?php esc_html_e( 'Box height:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_disretextbxminheight" id="wshk_disretextbxminheight" value="<?php if(get_option('wshk_disretextbxminheight')!=''){ echo get_option('wshk_disretextbxminheight'); }?>" placeholder="200px" size="10" /></p>
    
    <p> <?php esc_html_e( 'Box text color:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_disretextcolor" id="wshk_disretextcolor" value="<?php if(get_option('wshk_disretextcolor')!=''){ echo get_option('wshk_disretextcolor'); }?>" placeholder="black" size="10" /></p>
    
    <p> <?php esc_html_e( 'Comment character limit:', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="number" name="wshk_limitcomm" id="wshk_limitcomm" value="<?php if(get_option('wshk_limitcomm')!=''){ echo get_option('wshk_limitcomm'); }?>" placeholder="300" size="10" /></p>
    
    <p> <?php esc_html_e( 'Type of limiter:', 'woo-shortcodes-kit' ); ?><br /> <select name="wshk_showpoints" id="wshk_showpoints" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_showpoints') == 'showpo') { ?>selected="true" <?php }; ?> value="showpo"><?php esc_html_e( 'Points only (...)', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_showpoints') == 'showlin') { ?>selected="true" <?php }; ?> value="showlin"><?php esc_html_e( 'Points and link (...Read More)', 'woo-shortcodes-kit' ); ?></option> </select> <br /></p>
    
    
    
    <?php
    
    $limitationtype = get_option('wshk_showpoints');
  if ($limitationtype == 'showpo') {
    
    $addtextstyle = 'none'; 
} else {
     $addtextstyle = 'block';  
}
    
    ?>
    <p> <?php esc_html_e( 'Add your custom link text', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" type="text" name="wshk_readmoretextlim" id="wshk_readmoretextlim" value="<?php if(get_option('wshk_readmoretextlim')!=''){ echo get_option('wshk_readmoretextlim'); }?>" placeholder="Read more" size="10" /></p>
    
    
    </td> 
     <!--<td style="padding: 30px; border-left: 1px solid; witdh: 35%;"><h4 style="margin-top: -355px;"><span class="dashicons dashicons-edit"></span> <?php esc_html_e( 'Customize the title', 'woo-shortcodes-kit' ); ?></h4>
    
    <p> <?php esc_html_e( 'Title text size:', 'woo-shortcodes-kit' ); ?><br /> <input type="number" name="wshk_disretextlinktxtsize" id="wshk_disretextlinktxtsize" value="<?php if(get_option('wshk_disretextlinktxtsize')!=''){ echo get_option('wshk_disretextlinktxtsize'); }?>" placeholder="24px" size="10" /></p>
    <p> <?php esc_html_e( 'Title text color:', 'woo-shortcodes-kit' ); ?><br /> <input type="text" name="wshk_disretextlinktxtcolor" id="wshk_disretextlinktxtcolor" value="<?php if(get_option('wshk_disretextlinktxtcolor')!=''){ echo get_option('wshk_disretextlinktxtcolor'); }?>" placeholder="#ffffff" size="10" /></p>
    <p> <?php esc_html_e( 'Title text-decoration:', 'woo-shortcodes-kit' ); ?><br /> <input type="text" name="wshk_disretextlinktxd" id="wshk_disretextlinktxd" value="<?php if(get_option('wshk_disretextlinktxd')!=''){ echo get_option('wshk_disretextlinktxd'); }?>" placeholder="none" size="10" /></p>
    <p> <?php esc_html_e( 'Title link target:', 'woo-shortcodes-kit' ); ?><br /> <input type="text" name="wshk_disretextlinktarget" id="wshk_disretextlinktarget" value="<?php if(get_option('wshk_disretextlinktarget')!=''){ echo get_option('wshk_disretextlinktarget'); }?>" placeholder="_blank" size="10" /></p>
    <br />
    </td>-->                    
    </tr>
   <br />
    </table>
    <!--<br /><br /><br />-->
    <table width="100%">
        <tr>
            <td class="forsmalldropdowns" style="padding: 30px;" width="50%"><p><br><?php esc_html_e( 'How many reviews want display?', 'woo-shortcodes-kit' ); ?><br /> <input class="testininputclass" style="padding:10px;width:100%;" type="text" name="wshk_disredisplaynumber" id="wshk_disredisplaynumber" value="<?php if(get_option('wshk_disredisplaynumber')!=''){ echo get_option('wshk_disredisplaynumber'); }?>" placeholder="all" size="10" /></p><br /><small><?php esc_html_e( 'Write all to show all reviews or a specific number
            to show this number of reviews.', 'woo-shortcodes-kit' ); ?></small></td>
            
            <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;" width="50%"><p> <?php esc_html_e( 'How many columns want display?:', 'woo-shortcodes-kit' ); ?><br /> 
            <select name="wshk_disrecolumnsnumber" id="wshk_disrecolumnsnumber" style="border-bottom:1px solid #ddd !important;border-radius:4px;padding:10px;width:100%;"> <option <?php if (get_option('wshk_disrecolumnsnumber') == '1') { ?>selected="true" <?php }; ?> value="1"><?php esc_html_e( '1', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disrecolumnsnumber') == '2') { ?>selected="true" <?php }; ?> value="2"><?php esc_html_e( '2', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disrecolumnsnumber') == '3') { ?>selected="true" <?php }; ?> value="3"><?php esc_html_e( '3', 'woo-shortcodes-kit' ); ?></option> <option <?php if (get_option('wshk_disrecolumnsnumber') == '4') { ?>selected="true" <?php }; ?> value="4"><?php esc_html_e( '4', 'woo-shortcodes-kit' ); ?></option> </select>
            </p><br /><small style="margin-right:15px;"><?php esc_html_e( 'Choose the number of columns that you want display the reviews', 'woo-shortcodes-kit' ); ?></small></td>
        </tr>
    </table>
    <br><br>
    <p><b>3.- <?php esc_html_e( 'Additional shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'Now you can use the shortcode in differents pages and display a different number of reviews in each one', 'woo-shortcodes-kit' ); ?></small></p>
    <br>
    <code>[woo_display_reviews number="all"]</code><br>
    <small><?php esc_html_e( 'Just need copy this shortcode, and paste whatever you want. Can control the number of reviews to display from the shortcode replacing the number value', 'woo-shortcodes-kit' ); ?></small>
    <br /><br />
    </div>