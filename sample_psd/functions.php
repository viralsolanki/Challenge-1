<?php
/**
 * Sample_psd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sample_psd
 */

if ( ! function_exists( 'semple_psd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function semple_psd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Semple_psd, use a find and replace
		 * to change 'semple_psd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'semple_psd', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */

		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Post excerpt on posts and pages.
		 *
		 */
		add_post_type_support( 'post', 'excerpt' );

		/*
		 * Enable support for Page excerpt on posts and pages.
		 *
		 */
		add_post_type_support( 'page', 'excerpt' );

		/*
		 * Register nav-menus for header and footer.
		 *
		 */
				register_nav_menus(
					array(
						'my_header_nav' => __( 'Header menu' ),
						'my_footer_nav' => __( 'Footer menu' ),
					)
				);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'semple_psd_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'semple_psd_setup' );

if ( ! function_exists( 'semple_psd_content_width()' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function semple_psd_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound.
		$GLOBALS['content_width'] = apply_filters( 'semple_psd_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'semple_psd_content_width', 0 );




/**
 * ***********************WIDGET LOCATION*******************************
************************************************************************ */

if ( ! function_exists( 'my_widget()' ) ) :
	/**
	 * Register the sidebar for widgets
	 */
	function my_widget() {

			register_sidebar(
				array(
					'name'          => 'Footer Widgets',
					'id'            => 'sidebar1',
					'before_widget' => '<div class="col-md-3 col-sm-6 col-xs-12" id="widget-data"> <section id="%1$s" class="sidebar-widget %2$s">',
					'after_widget'  => '</section> </div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
	}
endif;
add_action( 'widgets_init', 'my_widget' );



/**
 * ****************** Enqueue scripts and styles.***********************************
 ***********************************************************************************/

/**
 * Register required styles and scripts
 */
function sample_psd_scripts() {
	wp_enqueue_style( 'semple_psd-style', get_stylesheet_uri(), array(), wp_rand( 111, 9999 ) );

		/*boostrap js file*/
	wp_enqueue_script(
		'bootstrap_js',
		get_template_directory_uri() . '/lib/bootstrap.min.js',
		array(),
		'20151215',
		true
	);

	wp_enqueue_script(
		'semple_psd-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		'20151215',
		true
	);

	wp_enqueue_script(
		'semple_psd-skip-link-focus-fix',
		get_template_directory_uri() . '/js/skip-link-focus-fix.js',
		array(),
		'20151215',
		true
	);

	// boostrap css file.
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/lib/bootstrap.css', array(), '1.0' );

	// jquery file.
	wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', get_template_directory_uri() . '/lib/jquery.js', '20151215', true, '' );
	wp_enqueue_script( 'jquery' );

	// jquery for simple_psd theme.
	wp_enqueue_script(
		'js_semple',
		get_template_directory_uri() . '/js/jquery_sample.js',
		array(),
		'20151215',
		true
	);

	wp_localize_script(
		'js_semple',
		'php_var',
		array(
			'get_directory' => get_template_directory_uri(),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'sample_psd_scripts' );

/**
 * Register required styles and scripts for admin side
 */
function admin_side_scripts() {
	// theme-admin page.
	wp_enqueue_script(
		'admin_jquery',
		get_template_directory_uri() . '/js/Theme_options_page_js.js',
		array( 'jquery' ),
		'20151215',
		true
	);

	// enqueue media uploader.
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'admin_side_scripts' );

/**

 * *******************CUSTOM IMAGE SIZE***************************
 ***********************************************************************/
/**
 * Register custom image sizes for slider and thumnbanails
 */
function thumbnails_image_size() {
	add_image_size( 'slider-size', 1170, 300, true );

	add_image_size( 'image-child', 300, 190, true );
}

add_action( 'after_setup_theme', 'thumbnails_image_size' );



/**

 * *******************ADD PAGES AT THEME ACTIVATION***************
 *************************************************************/
/**
 * Create pages at theme activation
 */
function create_page_for_theme() {

	$page_titles = array( 'Home', 'News', 'Gallery', 'Pages', 'Layouts', 'Features', 'Blog', 'Contact' );
	$page_slugs  = array( 'home', 'news', 'gallery', 'pages', 'layouts', 'features', 'blog', 'contact' );

	$page_content  = 'Welcome to the Home page. This text is from content area of page post type. you can change this data from the post_type->page .';
	$page_template = 'page.php';
	$page_excerpt  = 'This is an excerpt text. This excerpt is from post_type -> page ';

	$count_page_titles = count( $page_titles );
	for ( $i = 0; $i < $count_page_titles; $i++ ) {

		$page_title = __( $page_titles[ $i ], 'semple_psd' );

		$page_search = get_page_by_title( $page_title );

		$new_page = array(
			'post_type'    => 'page',
			'post_title'   => $page_title,
			'post_content' => $page_content,
			'post_status'  => 'publish',
			'post_author'  => 0,
			'post_slug'    => $page_slugs[ $i ],
			'post_parent'  => 0,
			'post_excerpt' => $page_excerpt,

		);

		if ( ! isset( $page_search->ID ) ) {
			$page_id = wp_insert_post( $new_page );
			if ( ! empty( $page_template ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page_template );
			}
		}
	}
	return count( $page_titles );
}
add_action( 'after_switch_theme', 'create_page_for_theme' );

/**
 * Create sub-pages of home page at theme activation
 */
function create_sub_pages_of_home_page() {
	$home_id = get_page_by_title( 'Home' );

	$page_titles = array( 'Environment', 'Finding', 'Promotinal Activities' );
	$page_slugs      = array( 'environment', 'finding', 'promotinal activities' );

	$page_content  = 'Welcome to the Home page. This text is from content area of page post type. you can change this data from the post_type->page .';
	$page_template     = 'page.php';
	$page_excerpt      = 'This is an excerpt text. This excerpt is from post_type -> page ';
	$count_page_titles = count( $page_titles );
	for ( $i = 0; $i < $count_page_titles; $i++ ) {
		$page_title = __( $page_titles[ $i ], 'semple_psd' );

		$page_search = get_page_by_title( $page_title );

		$new_page = array(
			'post_type'    => 'page',
			'post_title'   => $page_title,
			'post_content' => $page_content,
			'post_status'  => 'publish',
			'post_author'  => 0,
			'post_slug'    => $page_slugs[ $i ],
			'post_parent'  => $home_id->ID,
			'post_excerpt' => $page_excerpt,

		);

		if ( ! isset( $page_search->ID ) ) {
			$page_id = wp_insert_post( $new_page );
			if ( ! empty( $page_template ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page_template );
			}
		}
	}

	$finding_id               = get_page_by_title( 'Finding' );
	$promotinal_activities_id = get_page_by_title( 'Promotinal Activities' );
	$environment              = get_page_by_title( 'Environment' );

		$sub_page_titles = array(
			'Environment_child_1',
			'Environment_child_2',
			'Environment_child_3',
			'Finding_child_1',
			'Finding_child_2',
			'Finding_child_3',
			'Promotinal_Activities_1',
			'Promotinal_Activities_2',
			'Promotinal_Activities_3',
		);
	$sub_page_slugs      = array(
		'environment_child_1',
		'environment_child_2',
		'environment_child_3',
		'finding_child_1',
		'finding_child_2',
		'finding_child_3',
		'promotinal_activities_1',
		'promotinal_activities_2',
		'promotinal_activities_3',
	);

		$post_parent = array(
			$environment->ID,
			$environment->ID,
			$environment->ID,
			$finding_id->ID,
			$finding_id->ID,
			$finding_id->ID,
			$promotinal_activities_id->ID,
			$promotinal_activities_id->ID,
			$promotinal_activities_id->ID,
		);

	$count_sub_page_titles = count( $sub_page_titles );
	for ( $i = 0; $i < $count_sub_page_titles; $i++ ) {
		$sub_page_title = __( $sub_page_titles[ $i ], 'semple_psd' );

		$sub_page_search = get_page_by_title( $sub_page_title );

		$new_sub_page = array(
			'post_type'    => 'page',
			'post_title'   => $sub_page_title,
			'post_content' => $page_content,
			'post_status'  => 'publish',
			'post_author'  => 0,
			'post_slug'    => $sub_page_slugs[ $i ],
			'post_parent'  => $post_parent[ $i ],
			'post_excerpt' => $page_excerpt,

		);

		if ( ! isset( $sub_page_search->ID ) ) {
			$sub_page_id = wp_insert_post( $new_sub_page );
			if ( ! empty( $page_template ) ) {
				update_post_meta( $sub_page_id, '_wp_page_template', $page_template );
			}
		}
	}
}


add_action( 'after_switch_theme', 'create_sub_pages_of_home_page' );



/**

********************ADD POSTS TO SLIDER POST TYPE AT THEME ACTIVATION***************
*/


if ( ! function_exists( 'create_slider_posts_for_theme()' ) ) :
	/**
	 * Create slider posts at theme activation
	 */
	function create_slider_posts_for_theme() {

		$post_titles       = array( 'Welcome', 'Slide 2', 'Slide 3', 'Slide 4' );
		$post_slugs        = array( 'welcome', 'slide 2', 'slide 3', 'slide 4' );
		$post_content      = 'Welcome to the slider post type. This text is from content area of post of slider post type. you can change this data from the post_type->slider .';
		$post_excerpt      = 'This is an excerpt text. This excerpt is from post_type -> slider.';
		$page_template     = 'page.php';
		$count_post_titles = count( $post_titles );
		for ( $i = 0; $i < $count_post_titles; $i++ ) {
			$post_title         = __( $post_titles[ $i ], 'semple_psd' );
			$slider_post_search = get_page_by_title( $post_title, OBJECT, 'slider' );

			$slider_post = array(
				'post_type'    => 'slider',
				'post_title'   => $post_title,
				'post_content' => $post_content,
				'post_status'  => 'publish',
				'post_author'  => 0,
				'post_slug'    => $post_slugs[ $i ],
				'post_excerpt' => $post_excerpt,

			);

			if ( ! isset( $slider_post_search->ID ) ) {
				$sub_page_id = wp_insert_post( $slider_post );
				if ( ! empty( $page_template ) ) {
					update_post_meta( $sub_page_id, '_wp_page_template', $page_template );
				}
			}
		}
	}
endif;
add_action( 'after_switch_theme', 'create_slider_posts_for_theme' );



/**

********************ADD POSTS TO POSTS POST TYPE AT THEME ACTIVATION****************/

if ( ! function_exists( 'create_news_posts_for_theme()' ) ) :

	/**
	 * Create posts of news category at theme activation
	 */
	function create_news_posts_for_theme() {
        //add_action( 'admin_init', 'create_news_category' );
		wp_insert_term(
		    'News',
			'category',
			array(
			'slug' => 'news')
			);
		$new_cat_id = get_cat_ID( 'News' );

		$post_titles = array( 'News1', 'News2', 'News3' );

		$post_slugs        = array( 'news1', 'news2', 'news3' );
		$post_content      = 'Welcome to the posts post type. This text is from content area of post of posts post type. you can change this data from the post_type->posts .';
		$post_excerpt      = array(
			'Latin words, combined with a handful of model sentence structures',
			"Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
			'Many desktop publishing packages and web packages',
		);
		$page_template     = 'page.php';
		$count_post_titles = count( $post_titles );
		for ( $i = 0; $i < $count_post_titles; $i++ ) {
			$post_title  = __( $post_titles[ $i ], 'semple_psd' );
			$post_search = get_page_by_title( $post_title, OBJECT, 'post' );

			$slider_post = array(
				'post_type'     => 'post',
				'post_title'    => $post_title,
				'post_content'  => $post_content,
				'post_status'   => 'publish',
				'post_author'   => 0,
				'post_slug'     => $post_slugs[ $i ],
				'post_excerpt'  => $post_excerpt[ $i ],
				'post_category' => array( $new_cat_id ),

			);

			if ( ! isset( $post_search->ID ) ) {
					$sub_page_id = wp_insert_post( $slider_post );
				if ( ! empty( $page_template ) ) {
					update_post_meta( $sub_page_id, '_wp_page_template', $page_template );
				}
			}
		}
	}
endif;
add_action( 'after_switch_theme', 'create_news_posts_for_theme' );


/**
 * ************************* Create menus ***********************************
 */

if ( ! function_exists( 'add_custom_menus()' ) ) :
	/**
	 * Create posts of news category at theme activation
	 */
	function add_custom_menus() {
		$page_titles = array( 'Home', 'News', 'Gallery', 'Pages', 'Layouts', 'Features', 'Blog', 'Contact' );
		$menu_name   = 'my_primary_menu';
		$menu_exist  = wp_get_nav_menu_object( $menu_name );

		if ( ! $menu_exist ) {
			$menu_id                    = wp_create_nav_menu( $menu_name );
			$locations                  = get_theme_mod( 'nav_menu_locations' );
			$locations['my_header_nav'] = $menu_id;
			$locations['my_footer_nav'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
			foreach ( $page_titles as $page_title ) {
				$page = get_page_by_title( $page_title );
				if ( $page ) {
					wp_update_nav_menu_item(
						$menu_id,
						0,
						array(
							'menu-item-title'     => $page->post_title,
							'menu-item-object-id' => $page->ID,
							'menu-item-object'    => 'page',
							'menu-item-status'    => 'publish',
							'menu-item-type'      => 'post_type',
						)
					);
				}
			}
		}
	}
endif;
add_action( 'after_switch_theme', 'add_custom_menus' );

/**

************************RETURN THE HOME-SUBPAGES ID**************************
*/

if ( ! function_exists( 'get_the_top_parent_id()' ) ) :

	/**
	 * Get the top-schild pages of home page
	 */
	function get_the_top_parent_id() {

		$temp       = array();
		$child_page = get_page_by_title( 'Home' );
		$args       = array(
			'post_type' => 'page',
			'child_of'  => $child_page->ID,
		);

				$child2_post = get_pages( $args );
		foreach ( $child2_post as $post ) {
			if ( $post->post_parent ) {
					$ancestors = get_post_ancestors( $post->ID );

				if ( $ancestors[0] === $child_page->ID ) {
					array_push( $temp, $post->ID );
				}
			}
		}return $temp;
	}
endif;

/**

************************INCLUDING FEATURED IMAGES TO POSTS**********************
*/

require_once ABSPATH . 'wp-admin/includes/image.php';

/**
 * Create posts of news category at theme activation
 *
 * @param string $image_name name of the featured image of post.
 * @param string $post_title title of the post.
 * @param string $post_type name of the post_type for the post.
 * @param number $width width of the featured image.
 * @param number $height height of the featured image.
 */
function set_featured_image( $image_name, $post_title, $post_type, $width, $height ) {

	$post_data = get_page_by_title( $post_title, OBJECT, $post_type );
	$post_id   = $post_data->ID;
	if ( has_post_thumbnail( $post_id ) ) {
		return;
	}
	$uploaddir = wp_upload_dir();
	$file       = get_template_directory() . '/images/' . basename( $image_name );
	$uploadfile = $uploaddir['path'] . '/' . basename( $image_name );
    
	$result = copy( $file, $uploadfile );
	if (!$result ) {
		return;
	}
	$filename = basename( $uploadfile );

	$wp_filetype = wp_check_filetype( basename( $filename ), null );

	$attachment = array(
		'guid'           => $uploaddir['url'] . '/' . basename( $filename ),
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',

	);
	$attach_id   = wp_insert_attachment( $attachment, $uploadfile );
	$attach_data = wp_get_attachment_metadata( $attach_id, true );
	$attach_data = array(
		'height' => $height,
		'width'  => $width,
	);
	wp_update_attachment_metadata( $attach_id, $attach_data );
	set_post_thumbnail( $post_id, $attach_id );
}

add_action(
	'after_switch_theme',
	function () {

		$post_title       = array(
			'Environment',
			'Finding',
			'Promotinal Activities',
			'Environment_child_1',
			'Environment_child_2',
			'Environment_child_3',
			'Finding_child_1',
			'Finding_child_2',
			'Finding_child_3',
			'Promotinal_Activities_1',
			'Promotinal_Activities_2',
			'Promotinal_Activities_3',
		);
		$image_name       = array(
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
			'prmotinal_activities-3.jpg',
		);
		$width            = 300;
		$height           = 190;
		$count_image_name = count( $image_name );
		for ( $i = 0; $i < $count_image_name; $i++ ) {
			set_featured_image( $image_name[ $i ], $post_title[ $i ], 'page', $width, $height );
		}
		set_featured_image( 'welcome.jpeg', 'Welcome', 'slider', 1170, 300 );
	}
);



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Slider feature.
 */
require get_template_directory() . '/admin_section/slider-post-type.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/admin_section/class-widget.php';

/**
 * Load Jetpack compatibility file.
 */

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/admin_section/theme-options-page.php';
