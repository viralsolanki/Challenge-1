<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
class test_create_slider_post extends WP_UnitTestCase {

	function test_create_post_for_slider_post_type(){
		
		
		$post_available = array('Welcome','Slide 2','Slide 3','Slide 4');
	
		do_action('init');
		$this->assertTrue(post_type_exists('slider'));
		
		do_action('after_switch_theme');
		
		$actual_pages = array();
		$posts = array(
		'post_type' => 'slider',
		);
		
		$list_posts= get_posts($posts);
		if (!empty($list_posts)) {
			foreach($list_posts as $post){	
			//echo $post->post_title;
			$this->assertTrue(in_array($post->post_title , $post_available),$post->post_title.' post is not available');
			
			}
		}
		else{
			echo 'slider posts are empty';
		}
		
		

	}
}
