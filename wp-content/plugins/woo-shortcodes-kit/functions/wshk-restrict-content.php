<?php



//Since v.1.6.6 - updated v.1.9.1

//RESTRICT CONTENT TO USERS IF THEY ARE NOT LOGGED IN
//Hide the content that you want for non logged in users everywhere! If you want restrict some content in any page or post, use this shortcode [wshk] my contente [/wshk]

$getenablerestrictctnt = get_option('wshk_enablerestrictctnt');
if ( isset($getenablerestrictctnt) && $getenablerestrictctnt =='22')
    {

    function wshk_hide_content_shortcode($atts = [], $content = null)
    {
        // do something to $content
        
        if ( is_user_logged_in() ) {
        ob_start();
        // run shortcode parser recursively
        $content = do_shortcode($content);
     
        // always return
        echo $content;
        return ob_get_clean();
        }
    }
    add_shortcode('wshk', 'wshk_hide_content_shortcode');
}

//Since v.1.6.6 - updated v.1.9.1

//RESTRICT CONTENT TO USERS IF THEY ARE LOGGED IN
//Hide the content that you want for logged in users everywhere! If you want restrict some content in any page or post, use this shortcode [off] my contente [/off]

$getenableoffctnt = get_option('wshk_enableoffctnt');
if ( isset($getenableoffctnt) && $getenableoffctnt =='23')
    {

    function wshk_off_content_shortcode($atts = [], $content = null)
    {
        // do something to $content
        
        if ( ! is_user_logged_in() ) {
        ob_start();
        // run shortcode parser recursively
        $content = do_shortcode($content);
     
        // always return
        echo $content;
        return ob_get_clean();
        }
    }
    add_shortcode('off', 'wshk_off_content_shortcode');
}
?>