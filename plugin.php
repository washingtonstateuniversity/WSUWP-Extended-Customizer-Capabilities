<?php
/*
Plugin Name: WSUWP Extended Customizer Capabilities
Version: 0.0.1
Description: Modifies default capabilities for using the Customizer.
Author: washingtonstateuniversity
Author URI: https://web.wsu.edu/
Plugin URI: https://github.com/washingtonstateuniversity/wsuwp-extended-customizer-capabilities
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin uses namespaces and requires PHP 5.3 or greater.
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	add_action( 'admin_notices', create_function( '',
	"echo '<div class=\"error\"><p>" . __( 'WSUWP Extended Customizer Capabilities requires PHP 5.3 to function properly. Please upgrade PHP or deactivate the plugin.', 'wsuwp-extended-customizer-capabilities' ) . "</p></div>';" ) );
	return;
} else {
	include_once __DIR__ . '/includes/wsuwp-extended-customizer-capabilities.php';
}


add_filter( 'map_meta_cap', 'add_customizer_to_editors', 10, 3 );

function add_customizer_to_editors( $caps, $cap, $user_id ) {
	if ( 'customize' === $cap && user_can( $user_id, 'publish_pages' ) ) {
		$caps = array( 'publish_pages' );
	}

	return $caps;
}
