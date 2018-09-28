<?php
/**
 * Class SampleTest
 *
 * @package Sample_psd
 */

/**
 * Sample test case.
 */
class test_page_post_type extends WP_UnitTestCase {

	function test_create_page_for_theme(){
		
		//Global $page;
		//$function_create_page_for_theme = create_page_for_theme();
		
		//$this->assertSame(11,$function_create_page_for_theme);
		
		$page_available= array('Home','News','Gallery','Pages','Layouts','Features','Blog','Contact','Finding','Promotinal Activities','Environment',
		'Finding_child_1','Finding_child_2','Finding_child_3','Promotinal_Activities_1','Promotinal_Activities_2','Promotinal_Activities_3',
		'Environment_child_1','Environment_child_2','Environment_child_3');
		
		do_action('after_switch_theme');
		
		$actual_pages = array();
		$pages=array(
		'post_type'=>'page',
		);
		
		$list= get_pages($pages);
		if (!empty($list)) {
			foreach($list as $page){	
			//echo $page->post_title;
			//array_push($actual_pages,$page->post_title);
			$this->assertTrue(in_array($page->post_title , $page_available), $page->post_title.' is not loaded');
			
			}
		}
		else{
			echo 'page is empty';
		}
		
	}
}
