<?php
/*
  Plugin Name: PWD WP Favicon
  Version: 1.0
  Plugin URI: http://www.plateformewpdigital.fr/plugins/wp-favicon
  Description: Add favicon
  Author: Plateforme WP Digital, Kulka Nicolas
  Author URI: http://www.plateformewpdigital.fr
  Domain Path: languages
  Network: false
  Text Domain: pwd-wp-favicon
 */
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Plugin constants
define( 'PWD_FAVICON_VERSION', '1.0' );
define( 'PWD_FAVICON_FOLDER', 'wp-favicon' );

define( 'PWD_FAVICON_URL', plugin_dir_url( __FILE__ ) );
define( 'PWD_FAVICON_DIR', plugin_dir_path( __FILE__ ) );

// Function for easy load files
function _pwd_favicon_load_files( $dir, $files, $prefix = '' ) {
	foreach ( $files as $file ) {
		if ( is_file( $dir . $prefix . $file . ".php" ) ) {
			require_once($dir . $prefix . $file . ".php");
		}
	}
}

// Plugin client classes
_pwd_favicon_load_files( PWD_FAVICON_DIR . 'classes/', array('plugin') );

add_action( 'plugins_loaded', 'init_pwd_faviconplugin' );
function init_pwd_faviconplugin() {

    load_plugin_textdomain( 'pwd-wp-favicon', false, basename( dirname( __FILE__ ) ) . '/languages/' );

	// Load client
	new PWD_FAVICON_Plugin();
}