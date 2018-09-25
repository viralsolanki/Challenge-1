<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
class test_post_thumbnail extends WP_UnitTestCase {


	function test_post_has_post_thumbnail(){
		//Global $post;
		do_action('init');
		do_action('after_switch_theme');
		$welcome_post = get_page_by_title("Welcome",OBJECT,'slider');
		$posts=array(
				'post_type'=>'slider',
				'p'=>$welcome_post->ID
			);

		$theme_posts= new WP_Query($posts); 
		if($theme_posts->have_posts()) : 
			while ($theme_posts->have_posts()) : $theme_posts->the_post();
				//the_title();
				$this->assertTrue( has_post_thumbnail(),'has no thumbnail');
				 
			endwhile;
		 endif; 
	}
}
