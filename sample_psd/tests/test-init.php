<?php
/**
 * Class SampleTest
 *
 * @package Sample_psd
 */

/**
 * Sample test case.
 */
class test_init extends WP_UnitTestCase {

	function setUp() {
     
		parent::setUp();
		switch_theme( 'Sample_psd');
     
	}
	
	function testActiveTheme() {
	 
		$this->assertTrue( 'Sample_psd' == wp_get_theme() );
		echo wp_get_theme();
		 
	} // end testThemeInitialization

	function testInactiveTheme() {
	 
		$this->assertFalse( 'twentyfifteen' == wp_get_theme() );
	 
	} // end testInactiveTheme



}