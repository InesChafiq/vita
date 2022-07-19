<?php
/**
 * Hello World
 *
 * @package     HelloWorld
 * @author      Mehdi Nazari
 * @copyright   2019 Mehdi Nazari
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Hello World
 * Plugin URI:  https://mehdinazari.com/how-to-create-hello-world-plugin-for-wordpress
 * Description: This plugin prints "Hello World" inside an admin page.
 * Version:     1.0.0
 * Author:      Mehdi Nazari
 * Author URI:  https://mehdinazari.com
 * Text Domain: hello-world
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function display_hello_world_page() {
	echo 'Hello World!';
}
function hello_world_admin_menu() {
	add_menu_page(
		'Hello World',// page title
		'Hello World',// menu title
		'manage_options',// capability
		'hello-world',// menu slug
		'display_hello_world_page' // callback function
	);
}
add_action('admin_menu', 'hello_world_admin_menu');
 
