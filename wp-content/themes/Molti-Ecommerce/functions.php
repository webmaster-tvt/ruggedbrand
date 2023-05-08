<?php

//Getting all styles and scripts
///// Gettings CSS/JS
function molti_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/slick/slick.min.js', array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'molti_enqueue_styles' );


// Every Divi Layout as Shortcode with the Below Code
add_filter( 'manage_et_pb_layout_posts_columns', 'sj_create_shortcode_column', 5 );
add_action( 'manage_et_pb_layout_posts_custom_column', 'sj_shortcode_content', 5, 2 );
// register new shortcode
add_shortcode('sj_layout', 'sj_shortcode_mod');
// New Admin Column
function sj_create_shortcode_column( $columns ) {
$columns['sj_shortcode_id'] = 'Module Shortcode';
return $columns;
}
//Display Shortcode
function sj_shortcode_content( $column, $id ) {
if( 'sj_shortcode_id' == $column ) {
?>
<p>[sj_layout id="<?php echo $id ?>"]</p>
<?php
}
}
// Create New Shortcode
function sj_shortcode_mod($sj_mod_id) {
extract(shortcode_atts(array('id' =>'*'),$sj_mod_id));
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}



// This code will show "Add to Cart" and "Quick View" and "Wishlist" button on Shop Cards
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );






// ====================== Molti EcommerceCustomizer Settings ======================

function starter_customize_register( $wp_customize ) 
{

    $wp_customize->add_panel('molti_panel',array(
    'title'=>'Molti Ecommerce',
    'priority'=> 0,
    ) );

    $wp_customize->add_section( 'accent_color' , array(
        'title'    => __( 'Molti Ecommerce Accent Colors', 'starter' ),
        'priority' => 0,
        'panel'=>'molti_panel',
    ) );  

    
     $wp_customize->add_setting( 'accent_color_setting' , array(
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color_control', array(
        'label'    => __( 'Accent Color', 'starter' ),
		'description'    => __( 'Easily Change the Color Scheme of your site, This allows you to change most of the Molti Ecommerce Orange Colors to your Brand Colors easily.'),
        'section'  => 'accent_color',
        'settings' => 'accent_color_setting',
        
    ) ) );
	
	$wp_customize->add_setting( 'top_bar_color_setting' , array(
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_control', array(
        'label'    => __( 'Top Bar Color', 'starter' ),
		'description'    => __( 'Here you can Change the Top Bar Color in the Main Header of the site.'),
        'section'  => 'accent_color',
        'settings' => 'top_bar_color_setting',
        
    ) ) );
    
    }

function molti_accent_color_change() {
echo '<style type="text/css">


/*Color*/

div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_4 > div.et_pb_with_border.et_pb_column_1_3.et_pb_column.et_pb_column_7.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span:nth-child(1), div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span:nth-child(2) > strong > span, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_1 > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_3 > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_4 > div.et_pb_with_border.et_pb_column_1_3.et_pb_column.et_pb_column_7.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span:nth-child(2), div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_5 > div > div.et_pb_module.et_pb_text.et_pb_text_4.et_pb_text_align_left.et_pb_bg_layout_light > div > h3, div > div > div > div.et_pb_section.et_pb_section_4.features-section.et_section_regular > div.et_pb_row.et_pb_row_7 > div > div.et_pb_module.et_pb_text.et_pb_text_5.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_5.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_11 > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_15 > div > div > div > h2 > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_8.et_pb_text_align_left.et_pb_bg_layout_light > div > h1, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_31.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_11.et_pb_text_align_left.et_pb_bg_layout_light > div > h1, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_32.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_14.et_pb_text_align_left.et_pb_bg_layout_light > div > h1, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_9.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(1) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_9.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(2) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_9.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(4) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_31.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_12.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(1) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_31.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_12.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(2) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_31.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_12.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(4) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_32.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_15.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(1) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_32.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_15.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(2) > span, div > div > div > div.et_pb_section.et_pb_section_6.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_32.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_15.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(4) > span, div > div > div > div.et_pb_section.et_pb_section_7.et_section_regular > div.et_pb_row.et_pb_row_17 > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_7.et_section_regular > div.et_pb_row.et_pb_row_19 > div > div > div > p > a, div > div > div > div.et_pb_section.et_pb_section_8.et_section_regular > div.et_pb_row.et_pb_row_20 > div > div > div > h2 > span, div > div > div > div.et_pb_section.et_pb_section_9.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_20.et_pb_text_align_left.et_pb_bg_layout_light > div > h2 > span, .et_pb_blog_0 .et_pb_post:hover .entry-title a, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough > div > div > div.et_pb_blurb_container > h4, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_4.et_pb_css_mix_blend_mode_passthrough > div > div > div.et_pb_blurb_container > h4, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_5.et_pb_css_mix_blend_mode_passthrough.et-last-child > div > div > div.et_pb_blurb_container > h4, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough > div > div > div.et_pb_blurb_container > div > p:nth-child(2) > span, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_4.et_pb_css_mix_blend_mode_passthrough > div > div > div.et_pb_blurb_container > div > p:nth-child(2) > span, div > div > div > div.et_pb_section.et_pb_section_1.our-services-section.et_section_regular > div.et_pb_row.et_pb_row_2 > div.et_pb_column.et_pb_column_1_3.et_pb_column_5.et_pb_css_mix_blend_mode_passthrough.et-last-child > div > div > div.et_pb_blurb_container > div > p:nth-child(2) > span,  div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span:nth-child(1),  div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span:nth-child(3),  div > div > div > div.et_pb_section.et_pb_section_3.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_4 > div > div > div > h1,  div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.inline-buttons-row.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span > strong, #read > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_2.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, #read > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_blurb.et_pb_blurb_0.et_pb_text_align_left.et_pb_blurb_position_left.et_pb_bg_layout_light > div > div.et_pb_main_blurb_image > span > span, #read > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_blurb.et_pb_blurb_1.et_pb_text_align_left.et_pb_blurb_position_left.et_pb_bg_layout_light > div > div.et_pb_main_blurb_image > span > span, #read > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_blurb.et_pb_blurb_2.et_pb_text_align_left.et_pb_blurb_position_left.et_pb_bg_layout_light > div > div.et_pb_main_blurb_image > span > span,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_3 > div > div > div > h3 > span,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_4 > div.et_pb_column.et_pb_column_1_3.et_pb_column_6.member-card.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_7.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_6.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_29.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_28.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_4 > div.et_pb_column.et_pb_column_1_3.et_pb_column_7.member-card.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_9.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_4 > div.et_pb_column.et_pb_column_1_3.et_pb_column_8.member-card.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_11.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_5 > div.et_pb_column.et_pb_column_1_3.et_pb_column_9.member-card.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_13.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_5 > div.et_pb_column.et_pb_column_1_3.et_pb_column_10.member-card.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_15.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div.et_pb_row.et_pb_row_5 > div.et_pb_column.et_pb_column_1_3.et_pb_column_11.member-card.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_17.et_pb_text_align_left.et_pb_bg_layout_light > div > p,  div > div > div > div.et_pb_section.et_pb_section_6.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_30.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span,  div > div > div > div.et_pb_section.et_pb_section_6.et_section_regular > div.et_pb_row.et_pb_row_16 > div.et_pb_column.et_pb_column_1_3.et_pb_column_31.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_32.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span, #reveal-1 > div.et_pb_column.et_pb_column_1_3.et_pb_column_32.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_34.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span, #reveal-1 > div.et_pb_column.et_pb_column_1_3.et_pb_column_33.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_36.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span, #reveal-1 > div.et_pb_column.et_pb_column_1_3.et_pb_column_34.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_38.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > div > div > p > span,  div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_0 > div > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span,  div > div > div > div.et_pb_section.et_pb_section_1.faq-section-contact-page.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_9.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span,  div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span,  div > div > div > div.et_pb_section.et_pb_section_1.et_pb_with_background.et_section_specialty > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et_pb_column_single > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span:nth-child(1),  div > div > div > div.et_pb_section.et_pb_section_1.et_pb_with_background.et_section_specialty > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et_pb_column_single > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span:nth-child(2),  div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_1 > div > div.et_pb_module.et_pb_text.et_pb_text_5.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, #jobs > div.et_pb_row.et_pb_row_3 > div > div > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_blurb.et_pb_blurb_0.et_pb_text_align_left.et_pb_blurb_position_left.et_pb_bg_layout_light > div > div.et_pb_main_blurb_image > span > span, #main-content > div > div > div > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_1_tb_body.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_0_tb_body.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.inline-buttons-row.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_1.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_2.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_4.et_pb_css_mix_blend_mode_passthrough > div > div > h3 > span, #services > div > div > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_5.et_pb_equal_columns.et_section_specialty > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_25.et_pb_css_mix_blend_mode_passthrough.et_pb_column_single > div.et_pb_module.et_pb_text.et_pb_text_11.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_7.et_pb_with_background.et_section_regular > div > div.et_pb_column.et_pb_column_2_5.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_22.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_7.et_pb_with_background.et_section_regular > div > div.et_pb_column.et_pb_column_2_5.et_pb_column_30.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_22.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.inline-buttons-row.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_1.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, #process > div.et_pb_row.et_pb_row_2 > div > div > div > h1 > span, #process > div.et_pb_row.et_pb_row_7.molti-custom-tabs-content-4 > div.et_pb_column.et_pb_column_1_2.et_pb_column_16.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_10.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_11.et_pb_text_align_center.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.inline-buttons-row.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_section_regular > div > div.et_pb_column.et_pb_column_3_5.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_specialty > div > div.et_pb_column.et_pb_column_2_3.et_pb_column_2.et_pb_specialty_column.et_pb_css_mix_blend_mode_passthrough > div.et_pb_row_inner.et_pb_row_inner_0 > div > div > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_specialty > div > div.et_pb_column.et_pb_column_2_3.et_pb_column_2.et_pb_specialty_column.et_pb_css_mix_blend_mode_passthrough > div.et_pb_row_inner.et_pb_row_inner_4 > div > div.et_pb_module.et_pb_text.et_pb_text_5.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_specialty > div > div.et_pb_column.et_pb_column_2_3.et_pb_column_2.et_pb_specialty_column.et_pb_css_mix_blend_mode_passthrough > div.et_pb_row_inner.et_pb_row_inner_2 > div > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, #main-content > div > div > div.et_pb_section.et_pb_section_0_tb_body.et_section_regular > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_0_tb_body.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_2_tb_body.molti-discussion.et_pb_text_align_left.et_pb_bg_layout_light > div, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider > div.et_pb_row.et_pb_row_0.inline-buttons-row.et_pb_equal_columns > div.et_pb_column.et_pb_column_1_2.et_pb_column_0.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_0.et_pb_text_align_left.et_pb_bg_layout_light > div > h1 > span, .et_pb_portfolio_filters li a, div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_1.et_pb_text_align_left.et_pb_bg_layout_light > div > p:nth-child(1), div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_1.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, 
div > div > div > div.et_pb_section.et_pb_section_0.et_section_regular > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_1.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_4.et_clickable.et_pb_text_align_left.et_pb_bg_layout_light > div > h4, div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_2 > div > div > div > h1 > span, div > div > div > div.et_pb_section.et_pb_section_3.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_12.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_4.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_5 > div > div > div > h2 > span, div > div > div > div.et_pb_section.et_pb_section_5.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_21.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_6.molti-category-section.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_8 > div.et_pb_column.et_pb_column_1_2.et_pb_column_15.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_24.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_7.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_28.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_8.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_12 > div > div.et_pb_module.et_pb_text.et_pb_text_30.et_pb_text_align_left.et_pb_bg_layout_light > div > h2 > span, div > div > div > div.et_pb_section.et_pb_section_8.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_13.et_pb_equal_columns > div.et_pb_column.et_pb_column_3_5.et_pb_column_22.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_32.molti-tab-testimonials-content-1.et_pb_text_align_left.et_pb_bg_layout_light > div > h5, div > div > div > div.et_pb_section.et_pb_section_8.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_13.et_pb_equal_columns > div.et_pb_column.et_pb_column_3_5.et_pb_column_22.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_34.molti-tab-testimonials-content-2.et_pb_text_align_left.et_pb_bg_layout_light > div > h5, div > div > div > div.et_pb_section.et_pb_section_8.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_13.et_pb_equal_columns > div.et_pb_column.et_pb_column_3_5.et_pb_column_22.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_36.molti-tab-testimonials-content-3.et_pb_text_align_left.et_pb_bg_layout_light > div > h5, div > div > div > div.et_pb_section.et_pb_section_9.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_38.et_pb_text_align_left.et_pb_bg_layout_light > div > h2 > span, div > div > div > div.et_pb_section.et_pb_section_8.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_13.et_pb_equal_columns > div.et_pb_column.et_pb_column_2_5.et_pb_column_21.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_31.link-effect.et_pb_text_align_center.et_pb_bg_layout_light > div > p > a, div > div > div > div.et_pb_section.et_pb_section_1.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_1 > div.et_pb_column.et_pb_column_1_2.et_pb_column_1.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_2.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_3.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_5.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span > strong, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_2.molti-faq-1-content > div > div.et_pb_module.et_pb_text.et_pb_text_1.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_3.molti-faq-2-content > div > div.et_pb_module.et_pb_text.et_pb_text_3.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_4.molti-faq-3-content > div > div.et_pb_module.et_pb_text.et_pb_text_5.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div.et_pb_row.et_pb_row_5.molti-faq-4-content > div > div.et_pb_module.et_pb_text.et_pb_text_7.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_section_regular > div > div.et_pb_column.et_pb_column_1_4.et_pb_column_1.et_pb_css_mix_blend_mode_passthrough > div.et_pb_module.et_pb_text.et_pb_text_2.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, #main-content > div.et-l.et-l--body > div > div.et_pb_section.et_pb_section_2_tb_body.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_1_tb_body.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_0.et_section_regular > div.et_pb_row.et_pb_row_0 > div > div > div > h3 > span, div > div > div > div > div.et_pb_row.et_pb_row_0 > div > div > div > h3 > span, div > div > div > div.et_pb_section.et_pb_section_1.et_pb_with_background.et_section_regular > div > div > div.et_pb_module.et_pb_text.et_pb_text_1.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_8.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_47.login-text.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, div > div > div > div > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_8.et_pb_css_mix_blend_mode_passthrough.et-last-child > div.et_pb_module.et_pb_text.et_pb_text_49.reg-text.et_pb_text_align_left.et_pb_bg_layout_light > div > h3 > span, 

mark-shy-text, .molti-faq.et_pb_toggle_open .et_pb_toggle_title:before, .et_pb_menu ul li.current-menu-item a, .et_pb_menu .nav li ul.sub-menu a:hover, mark-history, .member-card li.et_pb_social_icon a.icon:before, .et_pb_blurb_2 .et-pb-icon, .et_pb_blurb_5 .et-pb-icon, .et_pb_blurb_16 .et-pb-icon, .et_pb_blurb_4 .et-pb-icon, .et_pb_blurb_15 .et-pb-icon, .et_pb_blurb_13 .et-pb-icon, .et_pb_blurb_12 .et-pb-icon, .et_pb_blurb_9 .et-pb-icon, .et_pb_blurb_0 .et-pb-icon, .et_pb_blurb_11 .et-pb-icon, .et_pb_blurb_1 .et-pb-icon, .service-card-2 h5 > span, .why-choose-us .et-waypoint.et_pb_animation_off, .single-service-section-2 .et-waypoint:not(.et_pb_counters).et_pb_animation_off, .active-tab.et_pb_blurb h4, .process-tabs .et_pb_blurb:after, .molti-sidebar .widget_categories ul li:hover a, .molti-sidebar .widget_categories ul li:hover a:before, .et_pb_video_play:before,  .mobile_menu_bar:before, 

.molti-active-faq h3, .et_pb_wc_breadcrumb_tb_body.et_pb_wc_breadcrumb .woocommerce-breadcrumb a, .woocommerce .star-rating span::before, .price .amount, .reset_variations, .molti-single-product-hero .tinv-wishlist *, .woocommerce p.stars a::before, .woocommerce .woocommerce-error a, .woocommerce .woocommerce-info a, .woocommerce .woocommerce-message a, .molti-checkout td.product-name:before, .molti-wishlist a, .ftinvwl-check:before, .molti-account-area a, .mea-button:hover:after, .meb-button:hover:after, .mpm-button:hover:after, .w-button:hover:after, #cpops-floating-cart .cpops-floating-cart__count, .yith-wcqv-main .posted_in a, .yith-wcqv-main .tagged_as a, nav.woocommerce-pagination ul li, nav.woocommerce-pagination ul li a:hover, .page-numbers

{color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}


/*Background Color*/
.feature .et_pb_animation_off, .et-menu-nav .et-menu li li a:hover:before, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_1.et_pb_equal_columns.et_pb_row_4col > div.et_pb_column.et_pb_column_1_4.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough, div > div > div > div.et_pb_section.et_pb_section_0.et_pb_with_background.et_section_regular > div.et_pb_row.et_pb_row_1.et_pb_equal_columns.et_pb_row_4col > div.et_pb_column.et_pb_column_1_4.et_pb_column_3.et_pb_css_mix_blend_mode_passthrough, .molti-info-icon, .molti-info-icon:hover:after, .service-card-2:before, .active-link-application:before, .active-link:after, div > div > div > div.et_pb_section.et_pb_section_2.et_pb_with_background.et_section_regular.section_has_divider.et_pb_bottom_divider.et_pb_section_sticky.et_pb_section_sticky_mobile, #process .number, .blog-hero input.et_pb_searchsubmit, .molti-view-category, .et_pb_portfolio_filters li a.active, .menu-closed.menu-open:before, 

.slick-prev, .slick-next, .slick-prev:hover, .slick-next:hover, .molti-blog-grid .post-meta a, .et_pb_portfolio_item .post-meta a, .wpf_slider.ui-slider .ui-widget-header, .wpf_item_count, .wpf_reset_btn, nav.woocommerce-pagination ul li span.current, .et_pb_tabs_controls li.et_pb_tab_active, .et_pb_tab_active a:hover, .woocommerce .cart .button, .woocommerce .cart input.button, a.button.checkout-button, .woocommerce-page #payment #place_order, .woocommerce-form-login .woocommerce-form-login__submit, .checkout_coupon button, .woocommerce-form-register__submit, a.button.view, a.woocommerce-MyAccount-downloads-file.button, a.wshkcomment, #reset-pass-submit, .molti-wishlist .button, .molti-account-area .button, .tinvwl_added_to_wishlist.tinv-modal button.button, .woocommerce #review_form #respond .form-submit input, .dgwt-wcas-pd-addtc-form .button, .woocommerce a.remove:hover, .woocommerce a.remove:hover:after, .molti-checkout .button, .molti-checkout .button:hover, .tinv-wishlist .product-remove button:hover, .tinv-wishlist .product-remove button:hover:after, td.product-action > button, td.product-action > button:hover, .molti-account-area-tab-items, .mea-button:hover, .meb-button:hover, .mpm-button:hover, .w-button:hover, .molti-account-area-2 .woocommerce-MyAccount-navigation, mark, .molti-new-icon:before, .et_pb_shop a.button.add_to_cart_button, .et_pb_shop a.button.product_type_simple, .et_pb_shop a.button.product_type_grouped, .et_pb_shop a.button.product_type_external, .et_pb_shop a.button.add_to_cart_button, .et_pb_shop a.button.product_type_simple, .et_pb_shop a.button.product_type_grouped, .et_pb_shop a.button.product_type_external, .et_pb_shop li.product a.button.yith-wcqv-button, .et_pb_shop li.product .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:before, .et_pb_shop li.product .tinvwl_already_on_wishlist-text, .et_pb_shop li.product .tinvwl_add_to_wishlist-text, .et_pb_shop li.product a.button.yith-wcqv-button:hover, .et_pb_shop li.product a.button.yith-wcqv-button:hover:after, .et_pb_shop li.product .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:hover:before, .cartpops-cart--items-indicator-bubble .cartpops-cart__toggle .cartpops-cart__container-counter, #cpops-floating-cart button, #cpops-floating-cart button:hover, .molti-header-7-8 .wishlist_products_counter_number, .active-pages-toggle, .et_pb_menu .nav li ul.sub-menu li.current-menu-item a:before

{background-color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*Border Top*/
.process-divider.et_pb_divider:before 
{border-top-color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*Border Right*/
.molti-info-icon:hover:before, .molti-view-category:before 
{border-right-color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*Border Left*/
.woocommerce a.remove:hover:before, .tinv-wishlist .product-remove button:hover:before
{border-left-color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*Border Color*/
.service-card:hover, .active-link-application:before, .active-link:after, .active-link-read:after, .active-link-discussion:after, .et_pb_portfolio_filters li a 
{border-color: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*Dropdown Line Colors*/

.line
{stroke: ' . esc_attr(get_theme_mod('accent_color_setting','#ff8057')) . '!important;}

/*For Top Bar Color*/
.molti-top-bar
{background-color: ' . esc_attr(get_theme_mod('top_bar_color_setting','#ff8057')) . '!important;}

</style>';
}
add_action( 'wp_head', 'molti_accent_color_change');
add_action( 'customize_register', 'starter_customize_register');






function molti_js() { ?>
<script type = "text/javascript" > ///Jquery for Pricing Table COLUMN 1 on homepage
    jQuery(document).ready(function() {
        jQuery('#reveal').hide();
        jQuery('.reveal-button').click(function(e) {
            e.preventDefault();
            jQuery("#reveal").slideToggle();
            jQuery('.reveal-button');
        });
    }); 
  </script>
<script type = "text/javascript" > //Jquery for Pricing Table COLUMN 2 on homepage
    jQuery(document).ready(function() {
        // Hide the div
        jQuery('#reveal-1').hide();
        jQuery('.reveal-button-1').click(function(e) {
            e.preventDefault();
            jQuery("#reveal-1").slideToggle();
            jQuery('.reveal-button-1');
        });
    }); 
  </script>

<script type = "text/javascript" > //Jquery for Pricing Table COLUMN 3 on homepage
    jQuery(document).ready(function() {
        // Hide the div
        jQuery('#reveal-2').hide();
        jQuery('.reveal-button-2').click(function(e) {
            e.preventDefault();
            jQuery("#reveal-2").slideToggle();
            jQuery('.reveal-button-2');
        });
    }); 
  </script>




<script type = "text/javascript" > ///JQUERY FOR Custom Dropdown in Header
    jQuery(document).ready(function() {
        jQuery('.molti-custom-menu-text').show();
        jQuery('.molti-custom-menu').click(function(e) {
            e.preventDefault();
            jQuery(".molti-custom-menu-text").toggle();
        });
    });
</script>
<script type = "text/javascript" >
    jQuery(document).ready(function() {
        jQuery('.molti-custom-dropdown-content').hide();
        jQuery('.molti-custom-menu ').click(function(e) {
            e.preventDefault();
            jQuery(".molti-custom-dropdown-content").toggle();
        });
    });
jQuery(document).ready(function() {
        jQuery('#et-main-area').on('click', function(event) {
            jQuery('.molti-custom-dropdown-content').hide(0);
        });
    });
  ///END HERE FOR Custom Dropdown in Header
</script>





<script>/// Molti Testimonial - Active Image Switcher for Services Page

  ///Image 1 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-1").click(function(){
  jQuery(".molti-testimonial-image-1").addClass("active-img");
});
        jQuery(".molti-testimonial-image-1").click(function(){
  jQuery(".molti-testimonial-image-2, .molti-testimonial-image-3, .molti-testimonial-image-4").removeClass("active-img");
});
});
  ///Image 2 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-2").click(function(){
  jQuery(".molti-testimonial-image-2").addClass("active-img");
});
        jQuery(".molti-testimonial-image-2").click(function(){
  jQuery(".molti-testimonial-image-1, .molti-testimonial-image-3, .molti-testimonial-image-4").removeClass("active-img");
});
});
  ///Image 3 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-3").click(function(){
  jQuery(".molti-testimonial-image-3").addClass("active-img");
});
        jQuery(".molti-testimonial-image-3").click(function(){
  jQuery(".molti-testimonial-image-1, .molti-testimonial-image-2, .molti-testimonial-image-4").removeClass("active-img");
});
});
  ///Image 4 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-4").click(function(){
  jQuery(".molti-testimonial-image-4").addClass("active-img");
});
        jQuery(".molti-testimonial-image-4").click(function(){
  jQuery(".molti-testimonial-image-1, .molti-testimonial-image-2, .molti-testimonial-image-3").removeClass("active-img");
});
});
</script>
<script>/// Molti Testimonial - Text Switches for active testimonial
  ///Image 1 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-1").click(function(){
  jQuery(".molti-testimonial-text-1").addClass("active-text");
});
        jQuery(".molti-testimonial-image-1").click(function(){
  jQuery(".molti-testimonial-text-2, .molti-testimonial-text-3, .molti-testimonial-text-4").removeClass("active-text");
});
});
  ///Image 2 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-2").click(function(){
  jQuery(".molti-testimonial-text-2").addClass("active-text");
});
        jQuery(".molti-testimonial-image-2").click(function(){
  jQuery(".molti-testimonial-text-1, .molti-testimonial-text-3, .molti-testimonial-text-4").removeClass("active-text");
});
});
  ///Image 3 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-3").click(function(){
  jQuery(".molti-testimonial-text-3").addClass("active-text");
});
        jQuery(".molti-testimonial-image-3").click(function(){
  jQuery(".molti-testimonial-text-1, .molti-testimonial-text-2, .molti-testimonial-text-4").removeClass("active-text");
});
});
  ///Image 4 Click
    jQuery(document).ready(function() {
        jQuery(".molti-testimonial-image-4").click(function(){
  jQuery(".molti-testimonial-text-4").addClass("active-text");
});
        jQuery(".molti-testimonial-image-4").click(function(){
  jQuery(".molti-testimonial-text-1, .molti-testimonial-text-2, .molti-testimonial-text-3").removeClass("active-text");
});
      ///All of them
       jQuery(".molti-testimonial-image-2").click(function(){
  jQuery(".molti-testimonial-text-1").addClass("not-active-text");
});
      jQuery(".molti-testimonial-image-3").click(function(){
  jQuery(".molti-testimonial-text-1").addClass("not-active-text");
});
      jQuery(".molti-testimonial-image-4").click(function(){
  jQuery(".molti-testimonial-text-1").addClass("not-active-text");
});
});
</script>




<script>/// Single Job Page - Tabs
    jQuery(document).ready(function() {
        jQuery(".molti-careers-application-link").click(function(){
  jQuery(".molti-careers-application-link").addClass("active-link-application");
  jQuery(".molti-careers-overview-link").removeClass("active-link");
});
      jQuery(".molti-careers-overview-link").click(function(){
  jQuery(".molti-careers-overview-link").addClass("active-link");
  jQuery(".molti-careers-application-link").removeClass("active-link-application");
});
});
</script>

<script>/// Single Job Page - Working of tabs
    jQuery(document).ready(function() {
  jQuery(".application").hide();
  jQuery(".molti-careers-application-link").click(function(){
  jQuery(".application").show();
  jQuery(".role-overview").hide();
});
  jQuery(".molti-careers-overview-link").click(function(){
  jQuery(".role-overview").show();
  jQuery(".application").hide();
});
});
</script>


<script>/// Molti Pricing page - Pricing Switcher for Yearly and Monthly Button
  ///Image 1 Click
    jQuery(document).ready(function() {
        jQuery(".yearly-button").click(function(){
  jQuery(".yearly-button").addClass("molti-active-switch-button");
  jQuery(".monthly-button").removeClass("molti-active-switch-button");
});
        jQuery(".monthly-button").click(function(){
  jQuery(".monthly-button").addClass("molti-active-switch-button");
  jQuery(".yearly-button").removeClass("molti-active-switch-button");
});
});
</script>


<script>/// Pricing Page - Pricing Switcher - Working of Tables
    jQuery(document).ready(function() {
  jQuery(".yearly-pricing").hide();
  jQuery(".yearly-button").click(function(){
  jQuery(".yearly-pricing").show();
  jQuery(".monthly-pricing").hide();
});
  jQuery(".monthly-button").click(function(){
  jQuery(".monthly-pricing").show();
  jQuery(".yearly-pricing").hide();
});
});
</script>


<script>/// Molti - Single Service Page - Custom Tabs 
    jQuery(document).ready(function() {
      jQuery(".molti-custom-tab-1").click(function(){
  jQuery(".molti-custom-tab-1").addClass("active-tab");
  jQuery(".molti-custom-tab-2").removeClass("active-tab");
  jQuery(".molti-custom-tab-3").removeClass("active-tab");
  jQuery(".molti-custom-tab-4").removeClass("active-tab");
});
        jQuery(".molti-custom-tab-2").click(function(){
  jQuery(".molti-custom-tab-2").addClass("active-tab");
  jQuery(".molti-custom-tab-3").removeClass("active-tab");
  jQuery(".molti-custom-tab-4").removeClass("active-tab");
});
        jQuery(".molti-custom-tab-3").click(function(){
  jQuery(".molti-custom-tab-3").addClass("active-tab");
  jQuery(".molti-custom-tab-2").addClass("active-tab");
  jQuery(".molti-custom-tab-4").removeClass("active-tab");
});
       jQuery(".molti-custom-tab-4").click(function(){
  jQuery(".molti-custom-tab-4").addClass("active-tab");
  jQuery(".molti-custom-tab-2").addClass("active-tab");
  jQuery(".molti-custom-tab-3").addClass("active-tab");
});
});
</script>


<script>/// Molti Custom tabs - Single Service Page - For Content 
    jQuery(document).ready(function() {
  jQuery(".molti-custom-tabs-content-2").hide();
  jQuery(".molti-custom-tabs-content-3").hide();
  jQuery(".molti-custom-tabs-content-4").hide();
      
  jQuery(".molti-custom-tab-1").click(function(){
  jQuery(".molti-custom-tabs-content-1").show();
  jQuery(".molti-custom-tabs-content-2, .molti-custom-tabs-content-3, .molti-custom-tabs-content-4").hide();
});  
  jQuery(".molti-custom-tab-2").click(function(){
  jQuery(".molti-custom-tabs-content-2").show();
  jQuery(".molti-custom-tabs-content-1, .molti-custom-tabs-content-3, .molti-custom-tabs-content-4").hide();
});
  jQuery(".molti-custom-tab-3").click(function(){
  jQuery(".molti-custom-tabs-content-3").show();
  jQuery(".molti-custom-tabs-content-1, .molti-custom-tabs-content-2, .molti-custom-tabs-content-4").hide();
});
  jQuery(".molti-custom-tab-4").click(function(){
  jQuery(".molti-custom-tabs-content-4").show();
  jQuery(".molti-custom-tabs-content-1, .molti-custom-tabs-content-2, .molti-custom-tabs-content-3").hide();
});
});
</script>




<script>///For Blog Module with Text Overlay
  (function ($) {
    $(document).ready(function () {
        $(".molti-blog-latest .et_pb_post").each(function () {
          $(this).find(".entry-title, .post-meta, .post-content ").wrapAll('<div class="molti-blog-content"></div>');
        });
    });
  })(jQuery); 
</script>

<script>/// Molti -> Advanced Blog Page - Post Switcher 
    jQuery(document).ready(function() {
      jQuery(".recent-button").click(function(){
  jQuery(".recent-button").addClass("active-blog");
  jQuery(".featured-button").removeClass("active-blog");
});
    jQuery(".featured-button").click(function(){
  jQuery(".featured-button").addClass("active-blog");
  jQuery(".recent-button").removeClass("active-blog");
});
});
</script>
<script>///Working of the Switcher - To Switch content
    jQuery(document).ready(function() {
  jQuery(".recent").hide(); 
  jQuery(".recent-button").click(function(){
  jQuery(".recent").show();
  jQuery(".featured").hide();
  });
  jQuery(".featured-button").click(function(){
  jQuery(".featured").show();
  jQuery(".recent").hide();
  });
  }); 
</script>



<script>///Single Post Page Tabs
    jQuery(document).ready(function() {
      jQuery(".molti-discussion").click(function(){
  jQuery(".molti-discussion").addClass("active-link-discussion");
  jQuery(".active-link-read").removeClass("active-link-read");
});
    jQuery(".molti-read").click(function(){
  jQuery(".molti-read").addClass("active-link-read");
  jQuery(".molti-discussion").removeClass("active-link-discussion");
});
});
</script>
<script>///Single Post Page Working of tabs to change content
    jQuery(document).ready(function() {
  jQuery(".molti-comments").hide(); 
  jQuery(".molti-read").click(function(){
  jQuery(".molti-article").show();
  jQuery(".molti-comments").hide();
  });
  jQuery(".molti-discussion").click(function(){
  jQuery(".molti-comments").show();
  jQuery(".molti-article").hide();
  });
  }); 
</script>


<script>/// To Collapse Submenu in Mobile Menu
(function($) { 
    function setup_collapsible_submenus() {
        // mobile menu
        $('.mobile_nav .menu-item-has-children > a').after('<span class="menu-closed"></span>');
        $('.mobile_nav .menu-item-has-children > a').each(function() {
            $(this).next().next('.sub-menu').toggleClass('hide',1000);
        });
        $('.mobile_nav .menu-item-has-children > a + span').on('click', function(event) {
            event.preventDefault();
            $(this).toggleClass('menu-open');
            $(this).next('.sub-menu').toggleClass('hide',1000);
        });
    }
    $(window).load(function() {
        setTimeout(function() {
            setup_collapsible_submenus();
        }, 0);
    });
})(jQuery);
</script>

<script>///Code For Showcase Page
    jQuery(document).ready(function() {
  jQuery(".buy").click(function(){
  jQuery(".options").removeClass("hide-dp");
  });
  jQuery(".close").click(function(){
  jQuery(".options").addClass("hide-dp");
  });  
});
</script>

<script type = "text/javascript" >
    jQuery(document).ready(function() {
        jQuery('.info-btn').click(function(e) {
            e.preventDefault();
            jQuery(".info-content").toggleClass("hide-dp");
        });
    }); 
  </script>
<script>    
    jQuery('.info-btn').on('click', function(e) {
      jQuery('.info-btn').toggleClass("info-button open");
      e.preventDefault();
    });///END HERE
</script>


<script> /// jQuery for the Carousel
	jQuery(function($){
  $('.molti-carousel-content').slick({
    infinite: false, // Loop the Carousel If you wish
    slidesToShow: 5, // Slides to Show in the Carousel
    slidesToScroll: 2, // Slides to scroll
  });
});
</script>
<script> /// jQuery for the Carousel - Mobile
	jQuery(function($){
  $('.molti-carousel-content-mobile').slick({
    infinite: false, // Loop the Carousel If you wish
    slidesToShow: 2, // Slides to Show in the Carousel
    slidesToScroll: 2, // Slides to scroll
  });
});
</script>


<script>/// Molti Testimoniai tabs - Shop HomePage - For Content 
    jQuery(document).ready(function() {
  jQuery(".molti-tab-testimonials-content-2").hide();
  jQuery(".molti-tab-testimonials-content-3").hide();
      
  jQuery(".molti-tab-testimonials-1").click(function(){
  jQuery(".molti-tab-testimonials-content-1").show();
  jQuery(".molti-tab-testimonials-content-2, .molti-tab-testimonials-content-3").hide();
});
		jQuery(".molti-tab-testimonials-2").click(function(){
  jQuery(".molti-tab-testimonials-content-2").show();
  jQuery(".molti-tab-testimonials-content-1, .molti-tab-testimonials-content-3").hide();
}); 
		jQuery(".molti-tab-testimonials-3").click(function(){
  jQuery(".molti-tab-testimonials-content-3").show();
  jQuery(".molti-tab-testimonials-content-2, .molti-tab-testimonials-content-1").hide();
});
});
</script>


<script>/// Molti - Single Service Page - Custom Tabs 
    jQuery(document).ready(function() {
      jQuery(".molti-tab-testimonials-1").click(function(){
  jQuery(".molti-tab-testimonials-1").addClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-2").removeClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-3").removeClass("active-testimonial-tab");
});
        jQuery(".molti-tab-testimonials-2").click(function(){
  jQuery(".molti-tab-testimonials-2").addClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-1").removeClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-3").removeClass("active-testimonial-tab");
});
        jQuery(".molti-tab-testimonials-3").click(function(){
  jQuery(".molti-tab-testimonials-3").addClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-1").removeClass("active-testimonial-tab");
  jQuery(".molti-tab-testimonials-2").removeClass("active-testimonial-tab");
});
});
</script>


<script>/// Molti Login Page - Toggle for Content
	(function ($) {
  $(document).ready(function () {
	$(".molti-login-area .woocommerce .col2-set .col-2, .woocommerce-page .col2-set .col-2, .reg-text").hide(0);
    $(".molti-register-button").click(function (e) {
      $(".molti-login-area .woocommerce .col2-set .col-2, .woocommerce-page .col2-set .col-2, .reg-text").show();
	  $(".molti-login-area .woocommerce .col2-set .col-1, .woocommerce-page .col2-set .col-1, .login-text").hide(0);
 });
	  $(".molti-login-button").click(function (e) {
      $(".molti-login-area .woocommerce .col2-set .col-1, .woocommerce-page .col2-set .col-1, .login-text").show();
	  $(".molti-login-area .woocommerce .col2-set .col-2, .woocommerce-page .col2-set .col-2, .reg-text").hide(0);
    });
  });
})(jQuery);
</script>

<script>/// Molti - Login Page - Custom Tabs Toggle switch
    jQuery(document).ready(function() {
      jQuery(".molti-register-button").click(function(){
  jQuery(this).addClass("active-blog");
  jQuery(".molti-login-button").removeClass("active-blog");
});
		jQuery(".molti-login-button").click(function(){
  jQuery(this).addClass("active-blog");
  jQuery(".molti-register-button").removeClass("active-blog");
});
});
</script>
<script>/// Molti Account Page Tabs - For Content
	jQuery(document).ready(function() {
  jQuery(".moc, .mdc, .mmsc, .mrc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
  jQuery(".mdac-button").click(function(){
  jQuery(".mdac").show();
  jQuery(".moc, .mdc, .mmsc, .mrc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
});
		jQuery(".moc-button").click(function(){
  jQuery(".moc").show();
  jQuery(".mdac, .mdc, .mmsc, .mrc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
}); 
		jQuery(".md-button").click(function(){
  jQuery(".mdc").show();
  jQuery(".mdac, .moc, .mmsc, .mrc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
});
		jQuery(".mmsc-button").click(function(){
  jQuery(".mmsc").show();
  jQuery(".mdac, .moc, .mdc, .mrc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
});
		jQuery(".mrc-button").click(function(){
  jQuery(".mrc").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mtc, .mlcc, .mea, .meb, .mpm").hide();
});
		jQuery(".mtc-button").click(function(){
  jQuery(".mtc").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mrc, .mlcc, .mea, .meb, .mpm").hide();
});
		jQuery(".mlcc-button").click(function(){
  jQuery(".mlcc").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mrc, .mtc, .mea, .meb, .mpm").hide();
});
		jQuery(".mea-button").click(function(){
  jQuery(".mea").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mrc, .mtc, .mlcc, .meb, .mpm").hide();
});
		jQuery(".meb-button").click(function(){
  jQuery(".meb").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mrc, .mtc, .mlcc, .mea, .mpm").hide();
});
		jQuery(".mpm-button").click(function(){
  jQuery(".mpm").show();
  jQuery(".mdac, .moc, .mdc, .mmsc, .mrc, .mtc, .mlcc, .mea, .meb").hide();
});
});
</script>



<script>/// Molti My Account Page - Active indication
    jQuery(document).ready(function() {
      jQuery(".mdac-button").click(function(){
  jQuery(".mdac-button").addClass("active-aa");
  jQuery(".moc-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
        jQuery(".moc-button").click(function(){
  jQuery(".moc-button").addClass("active-aa");
  jQuery(".mdac-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".md-button").click(function(){
  jQuery(".md-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mmsc-button").click(function(){
  jQuery(".mmsc-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mrc-button").click(function(){
  jQuery(".mrc-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mtc-button").click(function(){
  jQuery(".mtc-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mrc-button, .mlcc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mlcc-button").click(function(){
  jQuery(".mlcc-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mea-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mea-button").click(function(){
  jQuery(".mea-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .meb-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".meb-button").click(function(){
  jQuery(".meb-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .mpm-button").removeClass("active-aa");
});
		jQuery(".mpm-button").click(function(){
  jQuery(".mpm-button").addClass("active-aa");
  jQuery(".mdac-button, .moc-button, .md-button, .mmsc-button, .mrc-button, .mtc-button, .mlcc-button, .mea-button, .meb-button").removeClass("active-aa");
});
});
</script>

<script type="text/javascript"> /// To change the text of View Review Button on the under the Review tab in My Account Page
jQuery(document).ready(function(){
jQuery(".wshkcomment").text("View Review");
});
</script>

<script>/// Molti My Account Page - Profile Dropdown
	(function ($) {
  $(document).ready(function () {
	$(".maa-dropdown").hide(0);
    $(".molti-user-card").click(function (e) {
      e.preventDefault();
      $(".maa-dropdown").fadeToggle(0);
    });
  });
})(jQuery);
</script>

<script> /// Molti My Account Page - Icon rotation effect on click
	jQuery(document).ready(function() {
      jQuery(".molti-user-card").click(function(){
  jQuery(this).toggleClass("maa-dropdown-click");
});
});
</script>



<script>/// To Show the Search Dropdown on Search Icon Click in Main Header
	(function ($) {
  $(document).ready(function () {
    $(".molti-search-button").click(function (e) {
      e.preventDefault();
      $(".molti-search-slide").toggleClass("hide-dp")
    });
  });
})(jQuery);
</script>

<script>/// Some Adjustments for the the Search Dropdown
    jQuery(document).ready(function() {
      jQuery(".molti-search-button").click(function(){
  jQuery(this).toggleClass("molti-search-close");
});
		jQuery("#et-main-area, .molti-dropdown-2").click(function(){
  jQuery(".molti-search-button").removeClass("molti-search-close");
});
		jQuery("#et-main-area, .molti-dropdown-2").click(function(){
    jQuery(".molti-search-slide").addClass("hide-dp");
});
});
</script>


<script type="text/javascript">/// Molti Advanced Dropdown V2 - For Content
 jQuery(document).ready(function() {
jQuery('.molti-dropdown-2').click(function(e){
e.preventDefault();jQuery(".molti-dropdown-2-content").toggleClass("hide-dp");
    jQuery(".molti-search-slide").addClass("hide-dp");
});
});
</script>



<script>/// Molti FAQ page for content
    jQuery(document).ready(function() {
  jQuery(".molti-faq-2-content, .molti-faq-3-content, .molti-faq-4-content").hide();
      
  jQuery(".molti-faq-1").click(function(){
  jQuery(".molti-faq-1-content").show();
  jQuery(".molti-faq-2-content, .molti-faq-3-content, .molti-faq-4-content").hide();
});
		jQuery(".molti-faq-2").click(function(){
  jQuery(".molti-faq-2-content").show();
  jQuery(".molti-faq-1-content, .molti-faq-3-content, .molti-faq-4-content").hide();
});
		jQuery(".molti-faq-3").click(function(){
  jQuery(".molti-faq-3-content").show();
  jQuery(".molti-faq-1-content, .molti-faq-2-content, .molti-faq-4-content").hide();
});
		jQuery(".molti-faq-4").click(function(){
  jQuery(".molti-faq-4-content").show();
  jQuery(".molti-faq-1-content, .molti-faq-2-content, .molti-faq-3-content").hide();
});
});
</script>

<script>/// Molti - Active Indication
    jQuery(document).ready(function() {
      jQuery(".molti-faq-1").click(function(){
  jQuery(this).addClass("molti-active-faq");
  jQuery(".molti-faq-2, .molti-faq-3, .molti-faq-4").removeClass("molti-active-faq");
});
		jQuery(".molti-faq-2").click(function(){
  jQuery(this).addClass("molti-active-faq");
  jQuery(".molti-faq-1, .molti-faq-3, .molti-faq-4").removeClass("molti-active-faq");
});
		jQuery(".molti-faq-3").click(function(){
  jQuery(this).addClass("molti-active-faq");
  jQuery(".molti-faq-1, .molti-faq-2, .molti-faq-4").removeClass("molti-active-faq");
});
		jQuery(".molti-faq-4").click(function(){
  jQuery(this).addClass("molti-active-faq");
  jQuery(".molti-faq-1, .molti-faq-2, .molti-faq-3").removeClass("molti-active-faq");
});
});
</script>


<script>/// Creating a Pages toggle on Showcase Page - for Content
    jQuery(document).ready(function() {
  jQuery(".the-new-pages-content").hide();      
  jQuery(".the-new").click(function(){
  jQuery(".the-new-pages-content").show();
  jQuery(".all-pages-content").hide();
});
		jQuery(".all-pages").click(function(){
  jQuery(".all-pages-content").show();
  jQuery(".the-new-pages-content").hide();
});
});
</script>
<script>//// Showcase Page - Active Indication
    jQuery(document).ready(function() {
      jQuery(".the-new").click(function(){
  jQuery(this).addClass("active-pages-toggle");
  jQuery(".all-pages").removeClass("active-pages-toggle");
});
		   jQuery(".all-pages").click(function(){
  jQuery(this).addClass("active-pages-toggle");
  jQuery(".the-new").removeClass("active-pages-toggle");
});
});
</script>

<script type="text/javascript">/// Fixing Divi Flash of Unstyled Content On Page Load
var elm=document.getElementsByTagName("html")[0];
elm.style.display="none";
document.addEventListener("DOMContentLoaded",function(event) {elm.style.display="block"; });
</script>

<?php }
add_action('wp_footer', 'molti_js', 100);


//======================================================================
// CUSTOM DASHBOARD
//======================================================================
// ADMIN FOOTER TEXT
function molti_remove_footer_admin () {
    echo "Molti Ecommerce Child theme by SamarJ";
} 
add_action('wp_dashboard_setup', 'molti_my_custom_dashboard_widgets');

function molti_my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('molti_custom_help_widget', 'Molti Ecommerce Child Theme', 'molti_custom_dashboard_help');
}

function molti_custom_dashboard_help() {
echo '<p>Thank you for Purchasing <strong>Molti Ecommerce</strong> Child Theme by SamarJ. If you have any problem while using it use the links below for Support:
<ul>
  <li><a href="https://docs.samarj.com/molti-ecommerce" target="_blank">Documentations</a></li>
  <li><a href="https://headwayapp.co/molti-ecommerce-changelog" target="_blank">Molti Ecommerce Changelog</a></li>
  <li><a href="https://www.facebook.com/groups/samarj" target="_blank">Join Our Facebook Group</a></li>
  <li><a href="https://samarj.com/contact" target="_blank">Contact Us</a></li>
</ul></p>';
}
//END


// Adding Images to each Product in the list on Checkout Page
add_filter( 'woocommerce_cart_item_name', 'molti_checkout_product_image_on_checkout', 10, 3 );
function molti_checkout_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {

if ( ! is_checkout() )
return $name;

$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

$thumbnail = $_product->get_image();

$image = '<div class="molti-checkout-product-image">'
. $thumbnail .
'</div>';

return $image . $name;
}

?>