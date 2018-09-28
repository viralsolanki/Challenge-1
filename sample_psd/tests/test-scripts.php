<?php
/**
 * Class SampleTest
 *
 * @package Sample_psd
 */

/**
 * Sample test case.
 */
class test_scripts extends WP_UnitTestCase {

	function testScriptsAreLoaded() {
 
   
	$scripts = array('jquery','bootstrap_js','js_semple' , 'admin_jquery' );
	for($i=0 ; $i<count($scripts) ; $i++){
		$this->assertFalse( wp_script_is( $scripts[$i] ));
		
	}
	
	$styles = array('semple_psd-style','bootstrap_css');
	for($i=0 ; $i<count($styles) ; $i++){
		$this->assertFalse( wp_script_is( $scripts[$i] ));
		
	}
	
    do_action( 'wp_enqueue_scripts' );
	do_action('admin_enqueue_scripts');
    
	for($i=0 ; $i<count($scripts) ; $i++){
		$this->assertTrue( wp_script_is( $scripts[$i] ) ,  $scripts[$i]. 'script is not enqueued');
		
	}
	for($i=0 ; $i<count($styles) ; $i++){
		$this->assertTrue( wp_script_is( $scripts[$i] ) , $styles[$i] .'style is not enqueued');
		
	}
	
}


}