<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Semple_psd
 */
/*
$_tests_dir = getenv( 'WP_TESTS_DIR' );
/*
if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' );
}*/

if ( ! file_exists( 'C:\phpunit\branches\4.9\tests\phpunit\includes\functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once 'C:\phpunit\branches\4.9\tests\phpunit\includes\functions.php';

//define( 'TEST_theme_FILE', 'C:\xampp\htdocs\wordpress\wp-content\themes\semple_psd\functions-run.php' );
/**
 * Registers theme
 */
function _register_theme() {

	require_once 'C:\xampp\htdocs\wordpress\wp-content\themes\semple_psd\functions-run.php';
	
}
tests_add_filter( 'muplugins_loaded', '_register_theme' );


// Start up the WP testing environment.
require 'C:\phpunit\branches\4.9\tests\phpunit\includes\bootstrap.php';
