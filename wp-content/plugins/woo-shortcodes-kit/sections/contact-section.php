<?php
/*
Contact Section
*/
?>
<!-- Contact tab -->

<div class="last wshk-tab" id="div-wshk-contact">
    
    <!-- White box start -->
    
    <div class="wshkpagewhitebg">
        
        <!-- Contact info box -->
        
   <!--<div style="background-color: white; width: 100%; padding: 20px 20px 20px 20px;border: 1px solid white; border-radius: 13px;">-->
    
    
        <div class="wshkinfoboxes">
             
            <h2 class="wshkinfoboxtitle"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Help & Support!', 'woo-shortcodes-kit' ); ?>
            </h2>
            
            <p class="wshkinfoboxdesc">
            
            <span><?php esc_html_e( 'Learn more about Woo Shortcodes Kit and how to customize your WooCommerce store!', 'woo-shortcodes-kit' ); ?>
            </span>
            <br />
            
            <span><?php esc_html_e( 'If you need help related to the plugin, you can use the contact form', 'woo-shortcodes-kit' ); ?>
            </span>
            
            <span style="color: #969696; font-size: 13px;font-style: italic;"> <?php esc_html_e( '(Available on the official website)', 'woo-shortcodes-kit' ); ?>
            </span>
            
            </p>
   
        </div>
        
        <!-- END News info box-->
    
    
    
    <style>
    /*@import url(https://fonts.googleapis.com/css?family=Graduate|Oleo+Script);*/

    /*mbody {
      margin-top: 5em;
      text-align: center;
      color: #414142;
      background: rgb(246,241,232);
      background: -moz-radial-gradient(center, ellipse cover,  rgba(246,241,232,1) 39%, rgba(212,204,186,1) 100%);
      background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(39%,rgba(246,241,232,1)), color-stop(100%,rgba(212,204,186,1)));
      background: -webkit-radial-gradient(center, ellipse cover,  rgba(246,241,232,1) 39%,rgba(212,204,186,1) 100%);
      background: -o-radial-gradient(center, ellipse cover,  rgba(246,241,232,1) 39%,rgba(212,204,186,1) 100%);
      background: -ms-radial-gradient(center, ellipse cover,  rgba(246,241,232,1) 39%,rgba(212,204,186,1) 100%);
      background: radial-gradient(center, ellipse cover,  rgba(246,241,232,1) 39%,rgba(212,204,186,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6f1e8', endColorstr='#d4ccba',GradientType=1 );
    }*/

    a {
        color: #414142;
        font-style: normal;
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    /*.container {
        display: block;
        margin: 0 auto;
        width: 100%;
    }*/
  
    /*#information {
        color: red;
        font-size: 14px;
    }*/
  
    .wrapper {
        display: inline-block;
        width: 310px;
        height: 100px;
        vertical-align: top;
        margin: 1em 1.5em 2em 0;
        cursor: pointer;
        position: relative;
        font-family: Tahoma, Arial;
        -webkit-perspective: 4000px;
        -moz-perspective: 4000px;
        -ms-perspective: 4000px;
        -o-perspective: 4000px;
            perspective: 4000px;
    }
  
    .mitem {
        height: 40px;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        -o-transform-style: preserve-3d;
           transform-style: preserve-3d;
        -webkit-transition: -webkit-transform .6s;
        -moz-transition: -moz-transform .6s;
        -ms-transition: -ms-transform .6s;
        -o-transition: -o-transform .6s;
           transition: transform .6s;
    }
  
    .mitem:hover {
        -webkit-transform: translateZ(-50px) rotateX(95deg);
        -moz-transform: translateZ(-50px) rotateX(95deg);
        -ms-transform: translateZ(-50px) rotateX(95deg);
        -o-transform: translateZ(-50px) rotateX(95deg);
           transform: translateZ(-50px) rotateX(95deg);
    }
    
    .mitem:hover img {
        box-shadow: none;
        border-radius: 15px;
    }
      
    .mitem:hover .information {
        #box-shadow: 0px 3px 8px rgba(0,0,0,0.3);
        border-radius: 3px;
    }

    .mitem img {
        display: block;
        #position: absolute;
        top: 0;
        border-radius: 3px;
        -webkit-transform: translateZ(50px);
        -moz-transform: translateZ(50px);
        -ms-transform: translateZ(50px);
        -o-transform: translateZ(50px);
           transform: translateZ(50px);
        -webkit-transition: all .6s;
        -moz-transition: all .6s;
        -ms-transition: all .6s;
        -o-transition: all .6s;
           transition: all .6s;
    }
    
    .mitem .information {
        display: block;
        position: absolute;
        top: 0;
        height: 70px;
        width: 290px;
        text-align: left;
        border-radius: 15px;
        padding: 0px;          
        font-size: 12px;
        #text-shadow: 1px 1px 1px rgba(255,255,255,0.5);
        box-shadow: none;
        background: #321A51;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ecf1f4', endColorstr='#becad9',GradientType=0 );
        -webkit-transform: rotateX(-90deg) translateZ(50px);
        -moz-transform: rotateX(-90deg) translateZ(50px);
        -ms-transform: rotateX(-90deg) translateZ(50px);
        -o-transform: rotateX(-90deg) translateZ(50px);
           transform: rotateX(-90deg) translateZ(50px);
        -webkit-transition: all .6s;
        -moz-transition: all .6s;
        -ms-transition: all .6s;
        -o-transition: all .6s;
           transition: all .6s;
    }
    
    .information strong {
        display: block;
        margin: .4em 0 .5em 0;
        font-size: 20px;
        color: #ffffff;
        background: #321A51;
    }
    </style>
    
    <div id="container" class="container" style="width: 100%;">
    
    <table>
        <tr>
            <td>
    
            <div class="wrapper">
                <a href="https://disespubli.com/wshk-features/#contact" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-email-alt" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'CONTACT', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Do you need help or have ideas to add?', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'SEND A MESSAGE!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
    
   
            <div class="wrapper">
                <a href="https://disespubli.com/docs-category/changelog/" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color #321A51;"><span  class="dashicons dashicons-admin-tools" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'CHANGELOG', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Do you want to check the new changes?', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'CHECK NOW!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
            
    
            <div class="wrapper">
                <a href="http://bit.ly/wshkdocs" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-index-card" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'DOCUMENTATION', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Learn all about how WSHK works!', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'VIEW DOC!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
    
    
            <div class="wrapper">
                <a href="http://bit.ly/wshkhome" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-admin-home" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'THE WEB', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Visit the official WSHK website!', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'VISIT NOW!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
    
    
            <div class="wrapper">
                <a href="https://www.facebook.com/disespubli/" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-facebook" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'THE FANPAGE', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Follow all the news!', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'FOLLOW THE NEWS!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
            
    
            <div class="wrapper">
                <a href="https://wordpress.org/support/plugin/woo-shortcodes-kit/reviews/#new-post" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-star-half" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'RATE IT!', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Help WSHK keep growing!', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'ADD YOUR REVIEW!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
            
    
            <div class="wrapper">
                <a href="https://www.instagram.com/disespubli/" target="_blank">
                    
                <div class="mitem">
                <p style="font-size: 26px; color: #321A51;"><span  class="dashicons dashicons-instagram" style="font-size: 48px; color: #321A51; padding-right: 50px;" ></span><?php esc_html_e( 'INSTANEWS', 'woo-shortcodes-kit' ); ?> <br /><span style="font-size: 14px;"><strong><?php esc_html_e( 'Follow WSHK on Instagram!', 'woo-shortcodes-kit' ); ?></strong></span>
                </p>
                <span class="information">
                    <center><p style="margin-top:20px;"><strong><?php esc_html_e( 'FOLLOW NOW!', 'woo-shortcodes-kit' ); ?></strong></p>
                    </center>
                </span>
                </div>
                </a>
            </div>
            
            </td>
            
            <td class="wshkcontactvideosbox" style="width: 25%">
            <br /><br /><br />
            
            <div style="border:1px solid #60329b;border-radius:3px;padding:20px;">
            <center>
                <h3 style="color: #60329b;"><big><?php esc_html_e( 'STAY UPDATED!', 'woo-shortcodes-kit' ); ?></big><br><small><?php esc_html_e( 'NEW TUTORIALS COMMING SOON!', 'woo-shortcodes-kit' ); ?></small>
                </h3>
            </center>
            <br>
            <center>
            <a class="wshksubscribenowbtncontact" href="http://bit.ly/wshknews" style="margin-bottom:30px;text-align:center;border-radius:13px;padding:10px;background-color:#60329b;color:white;font-size:14px;text-transfrom:uppercase;text-decoration:none;" target="_blank"><?php esc_html_e( 'SUBSCRIBE NOW', 'woo-shortcodes-kit' ); ?>
            </a>
            </center>
            <br>
            </div>
            
            
            <a  href="http://bit.ly/WCModding" target="_blank" style="text-align: center;">
            <div style="margin-top:20px;background: #60329b; border: 1px solid #60329b; border-radius: 3px; height: auto; padding: 15px;">
                <center><img src="<?php echo  plugins_url( 'images/play-button.png', __DIR__ );?>" width="64" height="64" />
                </center>
                <center><span style="color: white; font-size: 16px; "><strong><?php esc_html_e( 'Modding WooCommerce', 'woo-shortcodes-kit' ); ?><br /><?php esc_html_e( 'with WSHK', 'woo-shortcodes-kit' ); ?></strong></span>
                </center>
            </div>
            </a>
            
            <br />
            
            <a  href="https://www.youtube.com/playlist?list=PLAI7D4M9MLQCjV0ep5CxLFtwKvd6EgWNu" target="_blank" style="text-align: center;">
            <div style="background: #321A51; border: 1px solid #321A51; border-radius: 3px; height: auto; padding: 15px;">
                <center><img src="<?php echo  plugins_url( 'images/play-button.png', __DIR__ );?>" width="64" height="64" />
                </center>
                <center><span style="color: white; font-size: 16px; "><strong><?php esc_html_e( 'Learn how work', 'woo-shortcodes-kit' ); ?><br /><?php esc_html_e( 'the WSHK templates!', 'woo-shortcodes-kit' ); ?></strong></span>
                </center>
            </div>
            </a>

            <br />
            
            <a  href="https://www.youtube.com/playlist?list=PLAI7D4M9MLQCNYSJGX65bvm2Rgzkx--6S" target="_blank" style="text-align: center;">
            <div style="background: #321A51; border: 1px solid #321A51; border-radius: 3px; height: auto; padding: 15px;">
                <center><img src="<?php echo  plugins_url( 'images/play-button.png', __DIR__ );?>" width="64" height="64" />
                </center>
                <center><span style="color: white; font-size: 16px; "><strong><?php esc_html_e( 'Enhance your shop', 'woo-shortcodes-kit' ); ?><br /><?php esc_html_e( 'with WSHK PRO!', 'woo-shortcodes-kit' ); ?></strong></span>
                </center>
            </div>
            </a>
    
            <br />

            </td>
        </tr>
    </table>
    
    <br />
   
    
    </div> 
   
  <!--</div>-->      
    
    </div>
</div>