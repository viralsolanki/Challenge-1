<?php
/**
 * Class SampleTest
 *
 * @package Sample_psd
 */

/**
 * Sample test case.
 */
class test_posts_post_type_news_cat extends WP_UnitTestCase {


	function test_create_posts_of_news_category(){
		
	
		$post_available= array('news1', 'news2', 'news3');
		
		do_action('after_switch_theme');
		
		$actual_pages = array();
		$posts = array(
		'post_type' => 'post',
		'category_name'=>'News'
		);
		
		$list_posts= get_posts($posts);
		if (!empty($list_posts)) {
			foreach($list_posts as $post){	
			//echo $post->post_name;
			$this->assertTrue(in_array($post->post_name , $post_available));
			
			}
		}
		else{
			echo 'posts are empty';
		}
		
	}
}