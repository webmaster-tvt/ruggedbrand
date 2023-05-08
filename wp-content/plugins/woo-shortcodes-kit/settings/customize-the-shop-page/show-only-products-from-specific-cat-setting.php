<?php
/*
Show only products from specific categories on the shop page
*/
?>

<!-- Header -->
          <div class="accordion">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enablecat" name="wshk_enablecat" value='4' <?php if(get_option('wshk_enablecat')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecat></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Show only products from specific categories on the shop page', 'woo-shortcodes-kit' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small><?php esc_html_e( 'Activate the function and click here to configure it', 'woo-shortcodes-kit' ); ?></small></p></th>
         </table>
</div>
<!-- Content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/show-only-products-from-specific-categories-on-the-shop-page/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'woo-shortcodes-kit' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'woo-shortcodes-kit' ); ?></a></td></tr></table>
    <br /><br />
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Choose the category you want to display on the shop page.', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can add 3 different categories to display', 'woo-shortcodes-kit' ); ?>:</small></p>
    <table width="100%">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'First Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        <select id="wshk_firstcat" name="wshk_firstcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
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
    $getopcatfirst = get_option('wshk_firstcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatfirst; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatfirst): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>

        </td>
        
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'Second Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        <select id="wshk_secondcat" name="wshk_secondcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
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
        
    }
    
    $getopcatsecond = get_option('wshk_secondcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatsecond; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatsecond): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>
        </td>
        
        <td class="forsmalldropdowns" style="width: 33%; padding-left: 30px;"><p><big><strong><?php esc_html_e( 'Third Category:', 'woo-shortcodes-kit' ); ?></strong></big><br /></p>
        
        <select id="wshk_thirdcat" name="wshk_thirdcat" style="border:1px solid #ddd !important;border-radius:13px;padding:10px;width:100%;"> 
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
        
    }
    $getopcatthird = get_option('wshk_thirdcat');
    ?>
    <option style="background-color:#a46497;color:white;" value="<?php echo $getopcatthird; ?>" selected ><?php esc_html_e( 'Selected: ', 'woo-shortcodes-kit' );  foreach($categories as $category): if($category->slug == $getopcatthird): echo $category->name .' ('.$category->category_count.')'; endif; endforeach; ?></option>
</select>
        </td></tr>
        
        <br />
        <br />
        </table>
        <br><br>
        <p><b>2.- <?php esc_html_e( 'Display options', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'By default this function will work on the shop page and in the products search form. So if you choose to show 3 categories only those will be shown, but now you can decide if you want to limit the function to work only on the shop page and allow the search for product from other categories in the product search form.', 'woo-shortcodes-kit' ); ?></small></p><br>
    
    <p class="wshkfunctinputs"><input type="checkbox" id="wshk_display_cats_search" name="wshk_display_cats_search" value='catsearchopt' <?php if(get_option('wshk_display_cats_search')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_display_cats_search"><?php esc_html_e( 'Allow the search for products from other categories in the product search form.', 'woo-shortcodes-kit' ); ?></label></p>
    
    <p><input type="checkbox" id="wshk_hide_prodin_cats" name="wshk_hide_prodin_cats" value='prodincats' <?php if(get_option('wshk_hide_prodin_cats')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_hide_prodin_cats"><?php esc_html_e( 'Hide products of non selected categories in category page.', 'woo-shortcodes-kit' ); ?></label></p><br>
    
        
        <br><br><br>
        </div>