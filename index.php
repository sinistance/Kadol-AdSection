<?php
/*
Plugin Name: Kadol AdSection
Plugin URI: http://sinistance.com/
Description: Adds magic button to place where the google adsense adsection start and end.
Author: Surya Darma
Version: 1.0
Author URI: http://sinistance.com/
*/

// hook
add_filter( 'tiny_mce_version', 'my_refresh_mce');
add_action('init', 'add_adsection_button');
add_shortcode('adsection', 'adsection_parse');

// cek versi tinymce
function my_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

// tambahkan tinymce plugin
function add_adsection_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
   if ( get_user_option('rich_editing') == 'true') {
     add_filter('mce_external_plugins', "adsection_register");
	 add_filter('mce_buttons', 'adsection_add_button', 0);
   }
}

// tambahkan tombol
function adsection_add_button($buttons)
{
    array_push($buttons, "separator", "adsection");
    return $buttons;
}

// registrasi plugin
function adsection_register($plugin_array)
{
    $url = plugins_url( 'editor_plugin.js' , __FILE__ );

    $plugin_array['adsection'] = $url;
    return $plugin_array;
}

// parse shortcode
function adsection_parse($atts, $content = null) {
        return '<!-- google_ad_section_start -->'.$content.'<!-- google_ad_section_end -->';
}