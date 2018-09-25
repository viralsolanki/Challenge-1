<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
class test_init extends WP_UnitTestCase {

	function setUp() {
     
		parent::setUp();
		switch_theme( 'Semple_psd');
     
	}
	
	function testActiveTheme() {
	 
		$this->assertTrue( 'Semple_psd' == wp_get_theme() );
		echo wp_get_theme();
		 
	} // end testThemeInitialization

	function testInactiveTheme() {
	 
		$this->assertFalse( 'twentyfifteen' == wp_get_theme() );
	 
	} // end testInactiveTheme



}