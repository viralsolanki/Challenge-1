<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
 
class test_images extends WP_UnitTestCase {


	function testImageCustomeSize() {
		
		/*$this->assertFalse( has_image_size('slider-size'));
		$this->assertFalse( has_image_size('image-child'));
		*/
		//do_action( 'after_setup_theme' );
		
		$this->assertTrue(has_image_size('slider-size'));
		$this->assertTrue(has_image_size('image-child'));
		
	}

	function test_is_image_positive() {
		// these are all image files recognized by php
		
		$files = array(
			'social-icons.jpg',
			'slider-bottom.png',
			'slider-bottom-pagination.png',
			'slider-top.png',
			'slider-top-pagination.png',
			'footer-bg.jpg',
			'footer-bullet.jpg',
			'footer-bullethover.jpg',
			'header-bg.jpg',
			'Entertainment.jpg',
			'finding.jpg',
			'Promotional_activities.jpg',
			'Entertainment-child-1.jpg',
			'Entertainment-child-2.jpg',
			'Entertainment-child-3.jpg', 
			'Finding-child-1.jpg', 
			'Finding-child-2.jpg',
			'Finding-child-3.jpg',
			'prmotinal_activities-1.jpg',
			'prmotinal_activities-2.jpg',
			'prmotinal_activities-3.jpg'
		
			);
		foreach ($files as $file) {
			$this->assertTrue( file_is_valid_image( get_template_directory().'/images/'.$file ), "file_is_valid_image($file) is not valid image" );
			}
	}


}