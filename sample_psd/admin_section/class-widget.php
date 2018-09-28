<?php
/**
 * This class is for create a custom widget in your theme
 *
 * @package semple_psd
 */

/**

 * *****************************
	LATEST NEWS WIDGET
 ***********************************/
class LatestNewsWidget extends WP_Widget {

	/**
	 * Add classname & description
	 */
	public function __construct() {

			$widget_ops = array(
				'classname'   => 'latest-news-widget',
				'description' => 'custom latest-news-widget',

			);

			parent::__construct( 'latest_news', 'LATEST NEWS', $widget_ops );
	}

	/**
	 * Back-end display of widget
	 *
	 * @param array $instance1 data stored in widget.
	 */
	public function form( $instance1 ) {
		?>
		<p> This is a <strong>Latest News</strong> widget  to display the latest posts of news category </p>
	<?php
	}

	/**
	 * Font-end display of widget
	 *
	 * @param array $args contains widget info.
	 * @param array $instance data stored in widget.
	 */
	public function widget( $args, $instance ) {
		echo ( $args['before_widget'] );
			echo ( $args['before_title'] );
				echo 'LATEST NEWS';
			echo ( $args['after_title'] );

							$posts = array(
								'cat'            => get_cat_ID( 'News' ),
								'orderby'     => 'modified',
								'post_type'      => 'post',
								'posts_per_page' => 3,

							);

									$news_post = new WP_Query( $posts );

		if ( $news_post->have_posts() ) :
			while ( $news_post->have_posts() ) :
				$news_post->the_post();

		?>
					<a href=" <?php echo the_permalink(); ?> " class="latest_news_widget">  <img style="float:left; padding-top:7px;" 
					src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/footer-bullet.jpg"/> <?php the_excerpt(); ?>  </a>		
		<?php
			endwhile;
		endif;
		?>
		<?php
		echo ( $args['after_widget'] );
	}
}



/**

 * *****************************
	STAY IN TOUCH WIDGET
 ***********************************/
class StayInTouchWidget extends WP_Widget {


		/**
		 * Add classname & description
		 */
	public function __construct() {

			$widget2_ops = array(
				'classname'   => 'Stay-in-touch-widget',
				'description' => 'custom widget to add social media links',

			);

			parent::__construct( 'stay-in-touch', 'STAY-IN-TOUCH', $widget2_ops );
	}
	/**
	 * Back-end display of widget
	 *
	 * @param array $instance data stored in widget.
	 */
	public function form( $instance ) {
		?>
		<p> This is a <strong>Stay-in-touch</strong> widget to add social media links  </p>

			<?php
			$facebook = ( ! empty( $instance['facebook'] ) ? ( $instance['facebook'] ) : 'https://www.facebook.com/rtCamp.solutions/' );
			$twitter  = ( ! empty( $instance['twitter'] ) ? ( $instance['twitter'] ) : 'https://twitter.com/rtcamp?lang=en' );
			$linkdin  = ( ! empty( $instance['linkdin'] ) ? ( $instance['linkdin'] ) : 'https://in.linkedin.com/company/rtcamp' );
			$rss      = ( ! empty( $instance['rss'] ) ? ( $instance['rss'] ) : 'https://rtcamp.com/' );

			$output  = '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'facebook' ) ) . '" >facebook:</label>';
			$output .= '<input type="text" class="widefat" id= "' . esc_attr( $this->get_field_id( 'facebook' ) ) . '" 
		name="' . esc_attr( $this->get_field_name( 'facebook' ) ) . '" value="' . esc_html( $facebook ) . '" >';
			$output .= '</p>';

			$output .= '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'twitter' ) ) . '" >twitter:</label>';
			$output .= '<input type="text" class="widefat" id= "' . esc_attr( $this->get_field_id( 'twitter' ) ) . '"
		name="' . esc_attr( $this->get_field_name( 'twitter' ) ) . '" value="' . esc_html( $twitter ) . '" >';
			$output .= '</p>';

			$output .= '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'linkdin' ) ) . '" >linkdin:</label>';
			$output .= '<input type="text" class="widefat" id= "' . esc_attr( $this->get_field_id( 'linkdin' ) ) . '"
		name="' . esc_attr( $this->get_field_name( 'linkdin' ) ) . '" value="' . esc_html( $linkdin ) . '" >';
			$output .= '</p>';

			$output .= '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'rss' ) ) . '" >rss:</label>';
			$output .= '<input type="text" class="widefat"  id= "' . esc_attr( $this->get_field_id( 'rss' ) ) . '"
		name="' . esc_attr( $this->get_field_name( 'rss' ) ) . '" value="' . esc_html( $rss ) . '" >';
			$output .= '</p>';

			echo $output;
	}

	/**
	 * Update widget info
	 *
	 * @param array $new_instance contains new widget info.
	 * @param array $old_instance contains old widget info.
	 * @return array $instance update widget info
	 */
	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ? wp_strip_all_tags( $new_instance['facebook'] ) : 'https://www.facebook.com/rtCamp.solutions/' );
		$instance['twitter']  = ( ! empty( $new_instance['twitter'] ) ? wp_strip_all_tags( $new_instance['twitter'] ) : 'https://twitter.com/rtcamp?lang=en' );
		$instance['linkdin']  = ( ! empty( $new_instance['linkdin'] ) ? wp_strip_all_tags( $new_instance['linkdin'] ) : 'https://in.linkedin.com/company/rtcamp' );
		$instance['rss']      = ( ! empty( $new_instance['rss'] ) ? wp_strip_all_tags( $new_instance['rss'] ) : 'https://rtcamp.com/' );

				return $instance;
	}

	/**
	 * Font-end display of widget
	 *
	 * @param array $args contains widget info.
	 * @param array $instance data stored in widget.
	 */
	public function widget( $args, $instance ) {

			echo ( $args['before_widget'] );
			echo ( $args['before_title'] );
			echo 'STAY-IN-TOUCH';
			echo ( $args['after_title'] );

			?>

			<ul>
			<li class="">
			<a class="image-1" href=" <?php echo esc_url( $instance['facebook'] ); ?> "> <img class="image facebook"> facebook</a>
			</li>	
			<li> 
			<a class="image-2" href="<?php echo esc_url( $instance['twitter'] ); ?>"> <img class="image twitter"> twitter</a>
			</li>	
			<li>
			<a class="image-3" href= "<?php echo esc_url( $instance['linkdin'] ); ?> " > <img class="image linkdin"> linkdin</a>
			</li>	
			<li>
			<a class="image-4" href= " <?php echo esc_url( $instance['rss'] ); ?>"><img class="image RSS"> RSS</a>
			</li>	
			</ul>
		<?php
			echo ( $args['after_widget'] );
	}
}

/**
 * Register widgets
 */
function to_register_widget_new() {
	register_widget( 'StayInTouchWidget' );
	register_widget( 'LatestNewsWidget' );
}

	add_action( 'widgets_init', 'to_register_widget_new' );

/**

 * ***********************NAVIGATION MENU WIDGET********************
 * *******************************************************************
 */
class NavMenuWidget3 extends WP_Widget {

	/**
	 * Sets up a new Navigation Menu widget instance.
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		$widget_ops3 = array(
			'description'                 => __( 'Add a navigation menu to your sidebar.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'new_nav_menu', __( 'MY NAVIGATION' ), $widget_ops3 );
	}
	/**
	 * Outputs the content for the current Navigation Menu widget instance.
	 *
	 * @param array $args contains widget info.
	 * @param array $instance data stored in widget.
	 */
	public function widget( $args, $instance ) {
		// Get menu.
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
		if ( ! $nav_menu ) {
			return;
		}
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		echo ( $args['before_widget'] );
		if ( $title ) {
			echo ( $args['before_title'] ) . esc_attr( $title ) . ( $args['after_title'] );
		}
		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu,
		);
		/**
		 * Filters the arguments for the Navigation Menu widget.
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
		echo ( $args['after_widget'] );
	}
	/**
	 * Handles updating settings for the current Navigation Menu widget instance.
	 *
	 * @param array $new_instance contains new widget info.
	 * @param array $old_instance contains old widget info.
	 * @return array $instance update widget info
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}
	/**
	 * Outputs the settings form for the Navigation Menu widget.
	 *
	 * @param array $instance data stored in widget.
	 */
	public function form( $instance ) {
		global $wp_customize;
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		// Get menus.
		$menus                 = wp_get_nav_menus();
		$empty_menus_style     = '';
		$not_empty_menus_style = '';
		if ( empty( $menus ) ) {
			$empty_menus_style = 'display:none';
		} else {
			$not_empty_menus_style = 'display:none';
		}
		$nav_menu_style = '';
		if ( ! $nav_menu ) {
			$nav_menu_style = 'display: none;';
		}
		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" style = "<?php echo esc_attr( $not_empty_menus_style ); ?>">
			<?php
			if ( $wp_customize instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php
			echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
			?>
		</p>
		<div class="nav-menu-widget-form-controls" style = "<?php echo esc_attr( $empty_menus_style ); ?>">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>">Select Menu:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'nav_menu' ) ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php echo esc_attr( $nav_menu_style ); ?>">
					<button type="button" class="button">Edit Menu</button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}

	add_action(
		'widgets_init',
		function () {
			register_widget( 'NavMenuWidget3' );
		}
	);




