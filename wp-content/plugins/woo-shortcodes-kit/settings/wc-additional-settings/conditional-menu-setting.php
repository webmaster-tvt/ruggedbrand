<?php 

/*Conditional menu settings*/

?>


<!-- Header -->
<div class="accordion">
<table>
<colgroup>
<col span="2">
</colgroup>
<tr>
    <th>
        <p><input type="checkbox" class="testininputclass" id="wshk_enablecustomenu" name="wshk_enablecustomenu" value='17' <?php if(get_option('wshk_enablecustomenu')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecustomenu></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Conditional menu', 'woo-shortcodes-kit' ); ?></big><br /><small> <?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p>
    </th>
</tr>
</table>
</div>

<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/conditional-menu/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr>
    </table>
    <br /><br />
<?php

$menus = get_registered_nav_menus(); ?>

<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Choose the location from the menu where you want to apply the changes', 'woo-shortcodes-kit' ); ?></b><br />

<small><?php esc_html_e( 'Menu locations detected: ', 'woo-shortcodes-kit' ); echo count($menus);?></small>
</p>
<br /> 
<select name="wshk_menulocation" id="wshk_menulocation" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;">
<option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
<?php
foreach($menus as $location => $description):
echo '<option value="'.$location.'">'.$description.'</option>';
endforeach;
$getopciones = get_option('wshk_menulocation');
?>
<option style="background-color:#a46497;color:white;" value="<?php echo $getopciones; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($menus as $location => $description): if($location == $getopciones): echo $description; endif; endforeach; ?></option>
</select>


<br /><br /><br />
<?php $menutt = wp_get_nav_menus(); ?>
<p><b>2.- <?php esc_html_e( 'Indicates which menu each user will see, according to the status of their session', 'woo-shortcodes-kit' ); ?></b><br />

<small><?php esc_html_e( 'Menus detected: ', 'woo-shortcodes-kit' ); echo count($menutt);?></small>
<br /><br />
<table>
    <tr>
    <td class="forsmalldropdowns" style="padding: 30px;">
           
    <p><?php esc_html_e( 'Choose the menu for logged in users:', 'woo-shortcodes-kit' ); ?><br /><br /> 
    
   <select name="wshk_logmenu" id="wshk_logmenu" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;">
<option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
<?php
$menutt = wp_get_nav_menus();
foreach( $menutt as $menuti):
    
echo '<option value="'.$menuti->name.'">'.$menuti->name.'</option>';

endforeach;
$getopcionett = get_option('wshk_logmenu');

?>
<option style="background-color:#a46497;color:white;" value="<?php echo $getopcionett; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($menutt as $menuti): if($menuti->name == $getopcionett): echo $menuti->name; endif; endforeach; ?></option>
</select><br>
    
    
    
    
    
    
    <small><?php esc_html_e( 'You can choose a menu from those available or', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/nav-menus.php?action=edit&menu=0" target="_blank"><?php esc_html_e( 'create a new menu', 'woo-shortcodes-kit' ); ?></a></small></p>    
    
    
    <br /><br />
    </td> 
     <td class="forsmalldropdowns" style="padding: 30px; border-left: 1px solid;">         
    <p><?php esc_html_e( 'Choose the menu for non logged in users:', 'woo-shortcodes-kit' ); ?><br /><br /> 
    
    
    
    <select name="wshk_nonlogmenu" id="wshk_nonlogmenu" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;">
<option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
<?php
$menutt = wp_get_nav_menus();
foreach( $menutt as $menuti):
    
echo '<option value="'.$menuti->name.'">'.$menuti->name.'</option>';

endforeach;
$getopcionettt = get_option('wshk_nonlogmenu');

?>
<option style="background-color:#a46497;color:white;" value="<?php echo $getopcionettt; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($menutt as $menuti): if($menuti->name == $getopcionettt): echo $menuti->name; endif; endforeach; ?></option>
</select>
<br>

     <small><?php esc_html_e( 'You can choose a different menu from those available or', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="/wp-admin/nav-menus.php?action=edit&menu=0" target="_blank"><?php esc_html_e( 'create a new menu', 'woo-shortcodes-kit' ); ?></a></small></p>
    
    
    <br /><br />
    </td>                    
    
    </tr>
    </table>
    <br />
    
    <p><b>3.- <?php esc_html_e( 'Remember Save the changes!', 'woo-shortcodes-kit' ); ?></b></p>
    <small><?php esc_html_e( 'The settings will only be applied from the moment you save the settings. You can continue to configure other functions, although it is recommended, before continuing ', 'woo-shortcodes-kit' ); ?> <a style="color:#a46497;text-decoration:underline;" href="#toggle" ><?php esc_html_e( 'save the settings', 'woo-shortcodes-kit' ); ?></a></small></p>
    
    <br /><br />
    </div>