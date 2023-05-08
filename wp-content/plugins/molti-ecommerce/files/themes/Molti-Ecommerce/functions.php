<?php

//Getting all styles and scripts
///// Gettings CSS
function molti_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/slick/slick.min.js', array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'molti_enqueue_styles' );

///Redirect to My Account after log out
add_action('wp_logout','auto_redirect_external_after_logout');
function auto_redirect_external_after_logout(){
  wp_redirect( '/my-account' );
  exit();
}

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
  <li><a href="https://docs.samarj.com/" target="_blank">Documentations</a></li>
  <li><a href="https://www.facebook.com/groups/samarj" target="_blank">Join Our Facebook Group</a></li>
  <li><a href="https://samarj.com/contact" target="_blank">Contact Us</a></li>
</ul></p>';
}
//END


?>