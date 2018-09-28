<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Sample_psd
 */

if ( ! file_exists( 'C:\phpunit\branches\4.9\tests\phpunit\includes\functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once 'C:\phpunit\branches\4.9\tests\phpunit\includes\functions.php';

/**
 * Registers theme
 */
function _register_theme() {

	require_once 'C:\xampp\htdocs\wordpress\wp-content\themes\sample_psd\functions.php';
	
}
tests_add_filter( 'muplugins_loaded', '_register_theme' );


// Start up the WP testing environment.
require 'C:\phpunit\branches\4.9\tests\phpunit\includes\bootstrap.php';
