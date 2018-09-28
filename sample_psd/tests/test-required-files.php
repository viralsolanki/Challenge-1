<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
class test_required_files extends WP_UnitTestCase {

	function test_is_require_file_exists(){
		
		$required_file = array( 'widget.php','custom-header.php', 'slider_post_type.php', 'template-tags.php', 'template-functions.php', 'customizer.php',  'Theme_options_page.php');
		for($i=0 ; $i < count($required_file) ; $i++){
		$this->assertTrue(file_exists( get_template_directory().'/inc/'.$required_file[$i] ), $required_file[$i].'is not exist');
		}
	}

	function test_files_are_included(){


		$files=get_included_files();
		$require_path= str_replace( "/","\\",get_template_directory());
		
		$required_file = array( 'widget.php','custom-header.php', 'slider_post_type.php', 'template-tags.php', 'template-functions.php', 'customizer.php',  'Theme_options_page.php');
		echo $require_path.'\inc\\'.$required_file[0];
		for($i=0 ; $i<count($required_file); $i++){
			//echo get_template_directory().'/inc/'.$required_file[$i];
			$this->assertTrue(in_array( $require_path.'\inc\\'.$required_file[$i] , $files ),  $required_file[$i]. ' file is not included' );
		}
	}
	

}