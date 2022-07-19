<?php
/**
 * @package Kinsta_shortcodes
 * @version 1.0
 */
/*
Plugin Name: Kinsta shortcodes
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Inès Chafiq
Version: 1.0
Author URI: http://vita.fr
*/

/**
 * Add a hook for a shortcode tag
 */
function secteur_shortcodes_init(){
	add_shortcode( 'secteur_get_posts', 'secteur_get_posts_cb' );
}
add_action('init', 'secteur_shortcodes_init');