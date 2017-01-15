<?php
/*
Plugin Name: WP Custom Post-Type Plugin
Plugin URI: http://rsilveira.co
Description: Plugin for create a new post type.
Version: 1.0.0
Author: Rafael Silveira
Author URI: http://rsilveira.co
*/


define('MODULE_VERSION', '1.0.0');
define('PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('ROOT_FILE',  __FILE__);

require_once(__DIR__ . '/autoload.php');

add_action('init', array('NewPostTypeController', 'init'), 10);
add_action('init', array('NewPostTypeController', 'custom_post_type'), 10);
