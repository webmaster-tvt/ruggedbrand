<?php
/*
Exclude products from specific categories on the shop page
*/
?>
<!-- Header -->
        <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_excludecat" name="wshk_excludecat" value='16' <?php if(get_option('wshk_excludecat')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_excludecat></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big> <?php esc_html_e( 'Exclude products from specific categories on the shop page', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- content -->
<div class="panel">
<br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/exclude-products-from-specific-categories-on-the-shop-page/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
        <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Choose the category you want to exclude on the shop page.', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can add 3 different categories to exclude', 'woo-shortcodes-kit' ); ?>:</small></p>
    <table width="100%">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'First Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        
        
        <select id="wshk_exfirstcat" name="wshk_exfirstcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
  <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
  
    <?php 
    
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for no, 0 for yes
  $pad_counts   = 0;      // 1 for no, 0 for yes
  $hierarchical = 1;      // 1 for no, 0 for yes 
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
    $categories = get_categories($args); 
    foreach ( $categories as $category ) {
        printf( '<option value="%1$s">%2$s (%3$s)</option>',
            esc_html( $category->slug ),
            esc_html( $category->cat_name ),
            esc_html( $category->category_count )
        );
        //echo '<option value="'.$category->slug.'">'.$category->name.' ('.$category->category_count.')</option>';
        
    }
    $getopcatfirstex = get_option('wshk_exfirstcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatfirstex; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatfirstex): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>
        
        
        </td>
        
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'Second Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        
        
        <select id="wshk_exsecondcat" name="wshk_exsecondcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
  <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
  
    <?php 
    
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for no, 0 for yes
  $pad_counts   = 0;      // 1 for no, 0 for yes
  $hierarchical = 1;      // 1 for no, 0 for yes 
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
    $categories = get_categories($args); 
    foreach ( $categories as $category ) {
        printf( '<option value="%1$s">%2$s (%3$s)</option>',
            esc_html( $category->slug ),
            esc_html( $category->cat_name ),
            esc_html( $category->category_count )
        );
        //echo '<option value="'.$category->slug.'">'.$category->name.' ('.$category->category_count.')</option>';
        
    }
    $getopcatsecondex = get_option('wshk_exsecondcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatsecondex; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatsecondex): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>
        
        
        </td>
        
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'Third Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        
        <select id="wshk_exthirdcat" name="wshk_exthirdcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
  <option value=""><?php esc_html_e( 'None', 'woo-shortcodes-kit' ); ?></option>
  
    <?php 
    
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for no, 0 for yes
  $pad_counts   = 0;      // 1 for no, 0 for yes
  $hierarchical = 1;      // 1 for no, 0 for yes 
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
    $categories = get_categories($args); 
    foreach ( $categories as $category ) {
        printf( '<option value="%1$s">%2$s (%3$s)</option>',
            esc_html( $category->slug ),
            esc_html( $category->cat_name ),
            esc_html( $category->category_count )
        );
        //echo '<option value="'.$category->slug.'">'.$category->name.' ('.$category->category_count.')</option>';
        
    }
    $getopcatthirdex = get_option('wshk_exthirdcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatthirdex; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatthirdex): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>
        
        
        
        </td></tr>
        
        <br />
        <br />
        </table>
        <br><br>
        <p><b>2.- <?php esc_html_e( 'Display options', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By default this function will work on the shop page and in the products search form. So if you choose to show 3 categories only those will be excluded, but now you can decide if you want to limit the function to work only on the shop page and allow the search for product from the selected categories in the product search form.', 'woo-shortcodes-kit' ); ?></small></p><br>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_display_excats_search" name="wshk_display_excats_search" value='excatsearchopt' <?php if(get_option('wshk_display_excats_search')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_display_excats_search"><?php esc_html_e( 'Allow the search for products from the selected categories in the product search form.', 'woo-shortcodes-kit' ); ?></label></p>
    
    <p><input type="checkbox" id="wshk_hide_exprodin_cats" name="wshk_hide_exprodin_cats" value='exprodincats' <?php if(get_option('wshk_hide_exprodin_cats')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_hide_exprodin_cats"><?php esc_html_e( 'Hide products of selected categories in category page.', 'woo-shortcodes-kit' ); ?></label></p><br>
        
        <br><br><br>
        </div>