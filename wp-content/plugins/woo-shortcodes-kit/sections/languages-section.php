<?php 
/*
Languages section
*/
?>
<div class="wshk-tab" id="div-wshk-languages">
    <div style="width: 90%;">
     <div style="background-color: white; width: 100%; padding: 20px 20px 20px 20px;border: 1px solid white; border-radius: 13px;">
     <!-- caja info ajustes -->
        
         <div style="background-color: white; padding-left: 10px;padding: 20px; color: #a46497;border: 1px solid #a46497; border-radius: 13px;">
             
             <!-- contenido caja info ajustes -->
             
    <h2 class="wshkinfoboxtitle"><span style="color:#a46497; font-size: 26px;"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'TRANSLATE THE PLUGIN! ', 'woo-shortcodes-kit' ); ?></span></h2>
    <div style="color: #808080; font-size: 15px;padding-left: 30px;">
        <h4 class="wshkinfoboxdesc"><small><span style="color: #808080; font-size: 15px;"><?php esc_html_e( 'Now you can easily copy or update the ready language files, with just one click.', 'woo-shortcodes-kit' ); ?></span><br><span style="color: #cccccc; font-size: 15px;"><?php esc_html_e( 'If in a new version the plugin does not translate all the strings correctly, you only need to click on the update button and the files will be copied automatically.', 'woo-shortcodes-kit' ); ?></span></small></h4></div>
   
    </div> 
    <br /><br />
    <!-- fin caja info ajustes-->
    
    <?php 
    
    //WSHK FILES FINDER
    
    $poplugin_dir = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/woo-shortcodes-kit-es_ES.po';
    
    $moplugin_dir = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/woo-shortcodes-kit-es_ES.mo';
    
  	
  	$pathmo = WP_CONTENT_DIR . '/languages/plugins/woo-shortcodes-kit-es_ES.mo';
  	$pathpo = WP_CONTENT_DIR . '/languages/plugins/woo-shortcodes-kit-es_ES.po';
    
    
    $pathmosin = WP_CONTENT_DIR . '/languages/plugins/';
    $pathposin = WP_CONTENT_DIR . '/languages/plugins/';
    
    /*Brazil*/
    
    $brazpoplugin_dir = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/woo-shortcodes-kit-pt_BR.po';
    
    $brazmoplugin_dir = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/woo-shortcodes-kit-pt_BR.mo';
    
    $brapathmo = WP_CONTENT_DIR . '/languages/plugins/woo-shortcodes-kit-pt_BR.mo';
  	$brapathpo = WP_CONTENT_DIR . '/languages/plugins/woo-shortcodes-kit-pt_BR.po';
    
    
    
     //CHECK IF CUSTOM REDIRECTIONS EXISTS
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        $adddestino = WP_CONTENT_DIR . '/plugins/custom-redirections-for-wshk/languages/wshk-custom-redirections-es_ES.po';
        
        $addmodestino = WP_CONTENT_DIR . '/plugins/custom-redirections-for-wshk/languages/wshk-custom-redirections-es_ES.mo';
        
    
    $sysadddestino = WP_CONTENT_DIR . '/languages/plugins/wshk-custom-redirections-es_ES.po';
    
    $sysaddmodestino = WP_CONTENT_DIR . '/languages/plugins/wshk-custom-redirections-es_ES.mo';
    }
    
    
    
     
     
    
    
    add_action('copy_wshk_files_es','wshk_custom_shortcode');
function wshk_custom_shortcode( $atts, $content= NULL) {   
    
/*$ruta= plugin_dir_path( __FILE__ ) . '/languages/';*/
$ruta = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/';
$destino= WP_CONTENT_DIR . '/languages/plugins/';
$archivos= glob($ruta.'woo-shortcodes-kit-es_ES.*o');


foreach ($archivos as $archivo){
$archivo_copiar= str_replace($ruta, $destino, $archivo);
copy($archivo, $archivo_copiar);
}

}


add_action('copy_wshk_files_br','wshk_custom_shortcodebr');
function wshk_custom_shortcodebr( $atts, $content= NULL) {   
    
/*$ruta= plugin_dir_path( __FILE__ ) . '/languages/';*/
$rutabra = WP_CONTENT_DIR . '/plugins/woo-shortcodes-kit/languages/';
$destinobra = WP_CONTENT_DIR . '/languages/plugins/';
$archivosbra = glob($rutabra.'woo-shortcodes-kit-pt_BR.*o');


foreach ($archivosbra as $archivobra){
$archivo_copiarbra= str_replace($rutabra, $destinobra, $archivobra);
copy($archivobra, $archivo_copiarbra);
}

}


 if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    add_action('copy_cbar_files_es','wshk_custom_shortcodeadd');
function wshk_custom_shortcodeadd( $atts, $content= NULL) {   
    
$rutacbar= WP_CONTENT_DIR . '/plugins/custom-redirections-for-wshk/languages/';
$destinoadd= WP_CONTENT_DIR . '/languages/plugins/';
$archivosadd= glob($rutacbar.'wshk-custom-redirections-es_ES.*o');

 
  
foreach ($archivosadd as $archivoadd){
$archivo_copiarr= str_replace($rutacbar, $destinoadd, $archivoadd);
copy($archivoadd, $archivo_copiarr);
}

        
 }

}


//Copy files if button is clicked
  
  if(isset($_POST['wshkesfiles'])) { do_action('copy_wshk_files_es'); }
  if(isset($_POST['wshkbrafiles'])) { do_action('copy_wshk_files_br'); }
  if(isset($_POST['cbaresfiles'])) { do_action('copy_cbar_files_es'); }
  
  
//Change the action button text

  if(file_exists($pathpo)) {
    
    $wstitle = __( 'UPDATE', 'woo-shortcodes-kit' );
    
    } else {
    $wstitle = __( 'COPY', 'woo-shortcodes-kit' );
    }
    
     if(file_exists($brapathpo)) {
    
    $wstitlebr = __( 'UPDATE', 'woo-shortcodes-kit' );
    
    } else {
    $wstitlebr = __( 'COPY', 'woo-shortcodes-kit' );
    }
    
     if(!empty($sysadddestino) && file_exists($sysadddestino)) {
    
    $wstitlee = __( 'UPDATE', 'woo-shortcodes-kit' );
    
    } else {
    $wstitlee = __( 'COPY', 'woo-shortcodes-kit' );
    }
    ?>
    
    
    <h3 style="background-color:#a46497;color:white;padding:15px;border:1px solid #a46497;border-radius:13px;margin-bottom:-15px;"><?php esc_html_e( 'Plugin files', 'woo-shortcodes-kit' ); ?></h3>
    <table width="100%" bgcolor="#fbfbfb" style="color:#000000;border: 1px solid #fbfbfb;border-radius:13px;" cellpading="10" align="center">
         <thead>
    <tr>
      <th width="10%" style="padding:10px;"><?php esc_html_e( 'LANGUAGE', 'woo-shortcodes-kit' ); ?></th>
      
      <th class="wshklangroot" width="70%" style="padding:10px;"><?php esc_html_e( 'ROOT', 'woo-shortcodes-kit' ); ?></th>
      <th class="wshklangavail" width="10%" style="padding:10px;"><?php esc_html_e( 'AVAILABLE', 'woo-shortcodes-kit' ); ?></th>
      <th width="10%" style="padding:10px;"><?php esc_html_e( 'ACTION', 'woo-shortcodes-kit' ); ?></th>
    </tr>
  </thead>
  <br>
  <tbody>
        <tr style="text-align:center;padding-bottom:20px;">
        <td rowspan="2"><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

        
        <td class="wshklangrootdesc" style="font-size:12px;"><?php if(file_exists($poplugin_dir)) {echo $poplugin_dir; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td class="wshklangavaildesc" ><?php if(file_exists($poplugin_dir)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        <td rowspan="2"><?php if(file_exists($poplugin_dir)) {echo '<form method="post"><button style="cursor:pointer;padding:10px 15px 10px 15px;background-color:#a46497;border:1px solid #a46497;border-radius:13px;color:white;" name="wshkesfiles">'.$wstitle.'</button></form>'; } else { echo esc_html_e( 'No available options', 'woo-shortcodes-kit' );} ?></td>
        </tr>
        <tr style="text-align:center;">
        <!--<td><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td>-->

        <!--<td></td>-->
        <td class="wshklangavaildesc" style="font-size:12px;"><?php if(file_exists($moplugin_dir)) {echo $moplugin_dir; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td class="wshklangavaildesc"><?php if(file_exists($moplugin_dir)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <!-- BRAZIL-->
        <tr style="text-align:center;padding-top:20px;">
        <td style="padding-top:20px;" rowspan="2"><img src="<?php echo  plugins_url( 'images/brazil.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

        
        <td class="wshklangrootdesc" style="padding-top:20px;font-size:12px;"><?php if(file_exists($brazpoplugin_dir)) {echo $brazpoplugin_dir; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td class="wshklangavaildesc" style="padding-top:20px;"><?php if(file_exists($brazpoplugin_dir)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        <td style="padding-top:20px;" rowspan="2"><?php if(file_exists($brazpoplugin_dir)) {echo '<form method="post"><button style="cursor:pointer;padding:10px 15px 10px 15px;background-color:#a46497;border:1px solid #a46497;border-radius:13px;color:white;" name="wshkbrafiles">'.$wstitlebr.'</button></form>'; } else { echo esc_html_e( 'No available options', 'woo-shortcodes-kit' );} ?></td>
        </tr>
        <tr style="text-align:center;">
        <!--<td><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td>-->

        <!--<td></td>-->
        <td class="wshklangavaildesc" style="font-size:12px;"><?php if(file_exists($brazmoplugin_dir)) {echo $brazmoplugin_dir; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td class="wshklangavaildesc"><?php if(file_exists($brazmoplugin_dir)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <!-- ADDON CBAR-->
        
        <?php
        
        //CHECK IF CUSTOM REDIRECTIONS EXISTS
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        ?>
        
        <tr style="text-align:center;">
        <td style="padding-top:20px;"  rowspan="2"><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

       
        
        <td class="wshklangrootdesc" style="padding-top:20px;font-size:12px;" ><?php if(file_exists($adddestino)) {echo $adddestino; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        
        <td class="wshklangavaildesc" style="padding-top:20px;" ><?php if(file_exists($adddestino)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        <td style="padding-top:20px;"  rowspan="2"><?php if(file_exists($adddestino)) {echo '<form method="post"><button style="cursor:pointer; padding:10px 15px 10px 15px;background-color:#a46497;border:1px solid #a46497;border-radius:13px;color:white;" name="cbaresfiles">'.$wstitlee.'</button></form>'; } else { echo esc_html_e( 'No available options', 'woo-shortcodes-kit' );} ?></td>
        </tr>
        
        <tr style="text-align:center;">
        <!--<td><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td>-->

        <!--<td></td>-->
        <td class="wshklangavaildesc" style="font-size:12px;"><?php if(file_exists($addmodestino)) {echo $addmodestino; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td class="wshklangavaildesc"><?php if(file_exists($addmodestino)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    
    <br><br>
    
    <h3 style="background-color:#a46497;color:white;padding:15px;border:1px solid #a46497;border-radius:13px;margin-bottom:-15px;"><?php esc_html_e( 'System files', 'woo-shortcodes-kit' ); ?></h3>
    <table width="100%" bgcolor="#fbfbfb" style="color:#000000;border: 1px solid #fbfbfb;border-radius:13px;" cellpading="10" align="center">
         <thead>
    <tr>
      <th width="10%" style="padding:10px;"><?php esc_html_e( 'LANGUAGE', 'woo-shortcodes-kit' ); ?></th>
      <th class="wshklangroot" width="80%" style="padding:10px;"><?php esc_html_e( 'ROOT', 'woo-shortcodes-kit' ); ?></th>
      <th width="10%" style="padding:10px;"><?php esc_html_e( 'AVAILABLE', 'woo-shortcodes-kit' ); ?></th>
    </tr>
  </thead>
  <br>
  <tbody>
        <tr style="text-align:center;">
        <td rowspan="2"><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

        
        <td class="wshklangrootdesc"><?php if(file_exists($pathpo)) {echo $pathpo; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td><?php if(file_exists($pathpo)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <tr style="text-align:center;">
        <!--<td><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td>-->

        
        <td class="wshklangrootdesc"><?php if(file_exists($pathmo)) {echo $pathmo; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td><?php if(file_exists($pathmo)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <!-- BRAZIL -->
        
        <tr style="text-align:center;">
        <td rowspan="2" style="padding-top:20px;"><img src="<?php echo  plugins_url( 'images/brazil.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

        
        <td class="wshklangrootdesc" style="padding-top:20px;"><?php if(file_exists($brapathpo)) {echo $brapathpo; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td style="padding-top:20px;"><?php if(file_exists($brapathpo)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <tr style="text-align:center;">
        <!-- <td><img src="<?php echo  plugins_url( 'images/brazil.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td> -->
        <td class="wshklangrootdesc"><?php if(file_exists($brapathmo)) {echo $brapathmo; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td><?php if(file_exists($brapathmo)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <!--ADDON CBAR-->
        
        <?php
        
        //CHECK IF CUSTOM REDIRECTIONS EXISTS
    
    if ( in_array( 'custom-redirections-for-wshk/custom-redirections-for-whsk.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        ?>
        
        <tr style="text-align:center;">
        <td rowspan="2" style="padding-top:20px;"><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 48px; height: 48px;padding-bottom: 5px;"></td>

        
        <td class="wshklangrootdesc" style="padding-top:20px;"><?php if(file_exists($sysadddestino)) {echo $sysadddestino; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td style="padding-top:20px;"><?php if(file_exists($sysadddestino)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <tr style="text-align:center;">
        <!-- <td><img src="<?php echo  plugins_url( 'images/spain.png
' , __DIR__ );?>" style="width: 24px; height: 24px;padding-bottom: 5px;"></td> -->
        
        <td class="wshklangrootdesc"><?php if(file_exists($sysaddmodestino)) {echo $sysaddmodestino; } else { echo esc_html_e( 'The file not exist', 'woo-shortcodes-kit' );} ?></td>
        <td><?php if(file_exists($sysaddmodestino)) {echo '<span style="color:#aadb4a;"class="dashicons dashicons-yes"></span>'; } else { echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';} ?></td>
        </tr>
        
        <?php } ?>
        
        </tbody>
    </table>
    
  
  <br><br>
   
    
    
    
    
    
   
    
    
    
    
    
    
    </div></div></div>
