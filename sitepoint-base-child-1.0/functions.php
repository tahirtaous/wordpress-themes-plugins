<?php

// https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/

function sitepoint_base_child_fonts_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by titillium_web, translate this to 'off'. Do not translate
* into your own language.
*/
$titillium_web = _x( 'on', 'titillium_web font: on or off', 'sitepoint-base-child' );
 
/* Translators: If there are characters in your language that are not
* supported by Patua One, translate this to 'off'. Do not translate
* into your own language.
*/
$patua_one = _x( 'on', 'Patua One font: on or off', 'sitepoint-base-child' );
 
if ( 'off' !== $titillium_web || 'off' !== $patua_one ) {
$font_families = array();
 
if ( 'off' !== $titillium_web ) {
$font_families[] = 'Titillium Web:400,400i,600,900';
}
 
if ( 'off' !== $patua_one ) {
$font_families[] = 'Patua One:400';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
}
 
return esc_url_raw( $fonts_url );
}


// Enqueuing on the front end
function sitepoint_base_child_scripts_styles() {
wp_enqueue_style( 'sitepoint-base-child-fonts', sitepoint_base_child_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'sitepoint_base_child_scripts_styles' );
