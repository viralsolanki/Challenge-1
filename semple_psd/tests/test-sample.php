<?php
/**
 * Class SampleTest
 *
 * @package Semple_psd
 */

/**
 * Sample test case.
 */
 /*
class SampleTest extends WP_UnitTestCase {

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


//check if scripts are loaded
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

function test_is_require_file_exists(){
	$required_file = array( 'widget.php','custom-header.php', 'slider_post_type.php', 'template-tags.php', 'template-functions.php', 'customizer.php',  'Theme_options_page.php');
	for($i=0 ; $i < count($required_file) ; $i++){
	$this->assertTrue(file_exists( get_template_directory().'/inc/'.$required_file[$i] ), $required_file[$i].'is not exist');
	}
}

function test_files_are_included(){


}


function testImageCustomeSize() {
	
	
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
	
			);
		foreach ($files as $file) {
			$this->assertTrue( file_is_valid_image( get_template_directory().'/images/'.$file ), "file_is_valid_image($file) is not valid image" );
		}
	}

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


function test_create_posts_of_news_category(){

}

function test_post_has_post_thumbnail(){
	//Global $post;
	do_action('init');
	do_action('after_switch_theme');
	$posts=array(
			'post_type'=>'slider',
		);

	$theme_posts= new WP_Query($posts); 
	if($theme_posts->have_posts()) : 
        while ($theme_posts->have_posts()) : $theme_posts->the_post();
			//the_title();
			$this->assertTrue( has_post_thumbnail(),'has no thumbnail');
			 
        endwhile;
	 endif; 
}

function test_create_post_for_slider_post_type(){
	
	
	$post_available=array('Welcome','Slide 2','Slide 3','Slide 4');

	do_action('after_switch_theme');
	do_action('init');
	$actual_pages = array();
	$posts = array(
	'post_type' => 'slider',
	);
	
	$list_posts= get_pages($posts);
	if (!empty($list_posts)) {
		foreach($list_posts as $post){	
		
		$this->assertTrue(in_array($post->post_name , $post_available));
		
		}
	}
	else{
		echo 'slider posts are empty';
	}
	
	

}


function test_restrict_deletion_of_Home_page(){
	
}




function test_is_the_sidebar_is_active(){
	
	}
	
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
/*
function test_if_the_widget_is_active(){
	
	$this->assertTrue(is_active_widget(false,'stay-in-touch'));
	$this->assertTrue(is_active_widget(false,'latest_news'));
	$this->assertTrue(is_active_widget(false,'new_nav_menu'));
	//$this->assertTrue(is_active_widget(false,'stay-in-touch'));
}
	*/
/*
}*/