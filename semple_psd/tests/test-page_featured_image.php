<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
 
class test_page_featured_image extends WP_UnitTestCase {
		
	function test_pages_has_featured_image(){
		do_action('after_switch_theme');
		$temp=get_page_by_title('Home');
		$args=array(
		'post_type'=>'page',
		'child_of'=>$temp->id);
		
		$child_pages= new WP_Query($args);
		if($child_pages->have_posts):
			while($child_pages->have_posts): $child_pages->the_post();
				$this->assertTrue(has_post_thumbnail(), the_title() . "page has noo thumbnail");
			endwhile;
		endif;
		
		
	}
}