<?php
/*
Old shortcodes grid section
*/
?>
<div class="author wshk-tab" id="div-wshk-support">
    &nbsp;
   
    
     <!-- caja info ajustes -->
        
         <div style="background-color: white; padding-left: 10px;padding: 20px; color: #a46497;border: 1px solid #a46497; border-radius: 13px;">
             
             <!-- contenido caja info ajustes -->
             
    <h2><span style="color:#a46497; font-size: 26px;"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Shortcodes Panel', 'woo-shortcodes-kit' ); ?></span></h2>
    <h4><small><span style="color: #808080; font-size: 15px;padding-left: 30px;"><?php esc_html_e( 'Hover the elements to see the shortcodes.', 'woo-shortcodes-kit' ); ?></span></small><br /><small><span style="color: #808080; font-size: 15px;padding-left: 30px;"><?php esc_html_e( 'Copy the shortcode and paste where you want.', 'woo-shortcodes-kit' ); ?></span></small><small><span style="color: #ccc; font-size: 13px;font-style: italic;"> <?php esc_html_e( '(Some shortcodes need enable his function to work)', 'woo-shortcodes-kit' ); ?></span></small></h4>
   
    </div> 
    <!-- fin caja info ajustes-->
    
     <!--NUEVO PANEL -->
 
    &nbsp;
    <style>
    .featured .featured-columns .item {
  height: 230px;
  background-size: cover;
  position: relative;
  cursor: pointer;
  margin: 10px;
  width: 30%;
  float:left;
  border: 1px solid #a46497;
  border-radius: 13px;
}
.featured .featured-columns .item .widget-title {
  text-align: center;
  color: white;
  position: relative;
  top: 50px;
  font-weight: 700;
}
.featured .featured-columns .item .textwidget {
  background-color: white;
  position: absolute;
  top: 0;
  width: 100%;
  height: 170px;
  padding: 30px 0px;
  opacity: 0;
  -webkit-transition: opacity 0.3s ease-in-out;
  -moz-transition: opacity 0.3s ease-in-out;
  -ms-transition: opacity 0.3s ease-in-out;
  -o-transition: opacity 0.3s ease-in-out;
  transition: opacity 0.3s ease-in-out;
  box-shadow: 1px 1px 12px #ccc;
  border: 1px solid white;
  border-radius: 13px;
}
.featured .featured-columns .item:hover .textwidget,
.featured .featured-columns .item:focus .textwidget {
  opacity: 1;
}


	.featured .featured-columns .item[data-badge]:after {
		content:attr(data-badge);
		position:absolute;
		top:-10px;
		right:-10px;
		font-size:.7em;
		background:#aadb4a;
		color:white;
		width:40px;height:18px;
		text-align:center;
		line-height:18px;
		border-radius:13px;
		box-shadow:0 0 1px #333;
		letter-spacing: 1px;
		padding: 5px;
	}
	



    </style>
    
    
    <div class='featured'>
        
       <style>
           
           .wshkrow {
    /*margin: 10px -16px;*/
}

/* Add padding BETWEEN each column */
.wshkrow,
.wshkrow > .wshkcolumn {
    /*padding: 8px;*/
}

/* Create three equal columns that floats next to each other */
.wshkcolumn {
    /*float: left;
    width: 33.33%;*/
    display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.wshkrow:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.wshkcontent {
    /*background-color: white;
    padding: 10px;*/
}

/* The "show" class is added to the filtered elements */
.wshkshow {
  display: block;
}

/* Style the buttons */
.wshkbtn {
  border: 1px solid #c6adc2;
  border-radius: 13px;
  outline: none;
  padding: 12px 16px;
  background-color: #c6adc2;
  color: white;
  cursor: pointer;
  margin-right: 10px;
  text-transform: uppercase;
}

.wshkbtn:hover {
  background-color: #a46497;
  color: white;
}

.wshkbtn.wshkactive {
  background-color: #a46497;
  color: white;
  border:1px solid #a46497;
  border-radius: 13px;
}
           
       </style>
<div id="myBtnContainer">
  <!--<button class="wshkbtn wshkactive" onclick="filterSelection('all')"> Show all</button>
  <button class="wshkbtn" onclick="filterSelection('myaccount')"> Build myaccount</button>
  <button class="wshkbtn" onclick="filterSelection('counters')"> counters</button>
  <button class="wshkbtn" onclick="filterSelection('addons')"> addons</button>-->
  <br />
  
  <a href="#" class="wshkbtn wshkactive" onclick="filterSelection('all')"><?php esc_html_e( 'Show all', 'woo-shortcodes-kit' ); ?></a>
  <a href="#" class="wshkbtn" onclick="filterSelection('myaccount')"><?php esc_html_e( 'Build my account', 'woo-shortcodes-kit' ); ?></a>
  <a href="#" class="wshkbtn" onclick="filterSelection('counters')"><?php esc_html_e( 'Counters', 'woo-shortcodes-kit' ); ?></a>
  <a href="#" class="wshkbtn" style="margin-left: 4px;" onclick="filterSelection('addons')"><?php esc_html_e( 'Addons', 'woo-shortcodes-kit' ); ?></a>
  <a href="#" class="wshkbtn" style="margin-left: 4px;" onclick="filterSelection('mustbe')"><?php esc_html_e( 'Required function Activation', 'woo-shortcodes-kit' ); ?></a>
  <br />
  
</div>
            
<div class="featured-columns panel-widget-style">
    <div id="pl-w57502fd8c7513">
        <div class="panel-grid" id="pg-w57502fd8c7513-0">
            
            <div class="wshkrow">
            <br />
            <br />
             <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/orderslist.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Orders list', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show user the purchase my-orders table, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_myorders]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn counters">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/globalsales.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Global sales', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the global sales/downloads counter use this shortcode:', 'woo-shortcodes-kit' ); ?> <br /><br /><small>[woo_global_sales]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
           
            <div class="wshkcolumn counters">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/totalproducts.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Total Products counter', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the total products on any page or post, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_total_product_count]</small><br /><p><small><span style="color: #666666"><?php esc_html_e( 'if you want exclude any category use:', 'woo-shortcodes-kit' ); ?></span><span style="color: #808080">[woo_total_product_count cat_id="<?php esc_html_e( 'here the category ID number', 'woo-shortcodes-kit' ); ?>"]</span></small></p></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
                    
              <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/olddownloadslist.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Downloads list', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show user the downloads table, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_mydownloads]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            <div class="wshkcolumn addons">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/bought.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Bought products', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                 <h3><center><?php esc_html_e( 'If you want show user the products that have bought, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_bought_products]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/gravatarthumb.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Gravatar image', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the user Gravatar image, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_gravatar_image]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            <div class="wshkcolumn counters mustbe">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/woototalproductsbyuser.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Total products by user', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the total bought products by user, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_total_bought_products]</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn counters mustbe">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/woototalordersbyuser.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Total orders by user', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the total orders made by user, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_customer_total_orders]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn counters mustbe">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/rwcounter.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Total reviews by user', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the total reviews made by a user, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_total_count_reviews]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
                                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/cstmreviews.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Reviews by user', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the products reviews made by a user, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_review_products]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
                                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                    
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/display-the-reviews.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Display Reviews', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the products reviews made by all the users, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_display_reviews]</small></center></h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/newusernm.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Username', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the username in any page or post, use this shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_user_name]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/woomessage.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Message by Orders', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show a message if the user made a number of orders, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_message]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            
            
            
            <div class="wshkcolumn addons">
                <div class="wshkcontent">
                                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                    
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/user-ip.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Display user IP', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the user ip where you want, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_display_ip]</small></center></h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            
            
            
            
            <div class="wshkcolumn addons">
                <div class="wshkcontent">
                                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                    
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/identity-card.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Display user name and surname', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the user name and surname, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_display_nsurname]</small></center></h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            
            
            
            
            <div class="wshkcolumn addons">
                <div class="wshkcontent">
                                    
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                    
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/email.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Display user email', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want show the user email where you want, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_display_email]</small></center></h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/newmyadd.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Addresses', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want display the customer billing & shipping address in any post or page, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_myaddress]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/mypaym.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Payments methods', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want display the customer payment methods saved in any post or page, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_mypayment]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/edit-account-form.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Edit account form', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want display the customer edit account form in any post or page, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_myedit_account]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/newmydash.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Dashboard', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want display the my-account dashboard in any post or page, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_mydashboard]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount mustbe">
                <div class="wshkcontent">
            
            <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/logout-nutton.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Logout button', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want display the Logout button in any post or page, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_logout_button]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn myaccount mustbe">
                <div class="wshkcontent">
            
                        <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/login-form.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Login form', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you are building your custom my account page and want display the Login form for non logged in users, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_login_form]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/hidecontent.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Restrict content', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you are building your custom my account page or want hide any content for non logged in users, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[wshk] [/wshk]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            
            
            <div class="wshkcolumn addons mustbe">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/hideye.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Hide content', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you want hide any content for logged in users and display only for non logged in users, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[off] [/off]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            <!--data-badge="<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>"-->
            <!--START-->
            <!--<div class="wshkcolumn counters">
                <div class="wshkcontent">
            
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" data-badge="<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/hideye.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Total Balance', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'If you display how much was spended by a client, use this Shortcode:', 'woo-shortcodes-kit' ); ?><br /><br /><small>[woo_total_balance]</small></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>-->
            <!--END-->
             <div class="panel-grid-cell" id="pgc-w57502fd8c7513-0-1">
                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-w57502fd8c7513-0-1-0" data-index="1">
                    <div class="item panel-widget-style" style="background: #a46497">
                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <br />
                        <br />                        
                        <p><center><img src="<?php echo  plugins_url( 'images/comingsoon.png' , __FILE__ );?>"></center></p>
                            <h3 class="widget-title"><?php esc_html_e( 'Coming soon...', 'woo-shortcodes-kit' ); ?></h3>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <h3><center><?php esc_html_e( 'New functions will be added in the nexts updates', 'woo-shortcodes-kit' ); ?></center></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- div del row -->
            </div>
            
            </div>


        </div>
    </div>
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("wshkcolumn");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "wshkshow");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "wshkshow");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var wbtnContainer = document.getElementById("myBtnContainer");
var wbtns = wbtnContainer.getElementsByClassName("wshkbtn");
for (var i = 0; i < wbtns.length; i++) {
  wbtns[i].addEventListener("click", function(){
    var wcurrent = document.getElementsByClassName("wshkactive");
    wcurrent[0].className = wcurrent[0].className.replace(" wshkactive", "");
    this.className += " wshkactive";
  });
}
</script>


 
 <!-- FIN NUEVO PANEL -->
   


   
    </div>