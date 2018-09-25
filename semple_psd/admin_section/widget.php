<?php
/*

*************************
*************************
	WIDGET CLASS
*************************
*************************

*/



/********************************
	LATEST NEWS WIDGET
***********************************/

	class Latest_news_widget extends WP_Widget {
	
	public function __construct(){
		
		$widget_ops = array(
		'classname' => 'latest-news-widget',
		'description' => 'custom latest-news-widget'
	
		);
		
		parent::__construct('latest_news','LATEST NEWS',$widget_ops);
	}
	//back-end display of widget
	
	public function form($instance1){
		?>
		<p> This is a <strong>Latest News</strong> widget  to display the latest posts of news category </p>
	<?php
	}
	
	//font-end display of widget
	public function widget($args1,$instance1){
		 echo $args1['before_widget'];
			echo $args1['before_title'];
				echo 'LATEST NEWS';
			echo $args1['after_title'];
			
				$posts=array(
						'cat'=>get_cat_ID( 'News' ),
						'sort_order'=>'asc' ,
						'post_type'=>'post',
						'posts_per_page'=>3
						
						);
					
				$News_post= new WP_Query($posts); 
				
				if( $News_post->have_posts()):
						
					while( $News_post->have_posts()):  $News_post->the_post();
						
					?>
						
							
							<a href=" <?php echo the_permalink(); ?> " class="latest_news_widget">  <img style="float:left; padding-top:7px;"  src="<?php echo get_template_directory_uri();?>/images/footer-bullet.jpg"/> <?php the_excerpt(); ?>  </a>
							
						
						
					
					<?php
				
					endwhile;
					endif;?>
				<?php
		 
		 echo $args1['after_widget'];
	}
	
	}
	


/********************************
	STAY IN TOUCH WIDGET
***********************************/


 class Stay_in_touch_widget extends WP_Widget {
	
	public function __construct(){
		
		$widget2_ops = array(
		'classname' => 'Stay-in-touch-widget',
		'description' => 'custom widget to add social media links',
	
		);
		
		parent::__construct('stay-in-touch','STAY-IN-TOUCH',$widget2_ops);
	}
	

	//back-end display of widget
	
	public function form($instance){
		?>
		<p> This is a <strong>Stay-in-touch</strong> widget to add social media links  </p>
		
		<?php
		$facebook = (!empty($instance['facebook']) ? ($instance['facebook']) : 'https://www.facebook.com/rtCamp.solutions/');
		$twitter = (!empty($instance['twitter']) ? ($instance['twitter']) : 'https://twitter.com/rtcamp?lang=en');
		$linkdin = (!empty($instance['linkdin']) ? ($instance['linkdin']) : 'https://in.linkedin.com/company/rtcamp');
		$RSS = (!empty($instance['RSS']) ? ($instance['RSS']) : 'https://rtcamp.com/');
		
		$output = '<p>';
		$output.= '<label for="'.esc_attr($this->get_field_id('facebook')).'" >facebook:</label>';
		$output.= '<input type="text" class="widefat" id= "'.esc_attr($this->get_field_id('facebook')).'" name="'.esc_attr($this->get_field_name('facebook')).'" 
		value="'.esc_url($facebook).'" >';
		$output.= '</p>';
		
		$output.= '<p>';
		$output.= '<label for="'.esc_attr($this->get_field_id('twitter')).'" >twitter:</label>';
		$output.= '<input type="text" class="widefat" id= "'.esc_attr($this->get_field_id('twitter')).'" name="'.esc_attr($this->get_field_name('twitter')).'" 
		value="'.esc_url($twitter).'" >';
		$output.= '</p>';
		
		$output.= '<p>';
		$output.= '<label for="'.esc_attr($this->get_field_id('linkdin')).'" >linkdin:</label>';
		$output.= '<input type="text" class="widefat" id= "'.esc_attr($this->get_field_id('linkdin')).'" name="'.esc_attr($this->get_field_name('linkdin')).'" 
		value="'.esc_url($linkdin).'" >';
		$output.= '</p>';
		
		$output.= '<p>';
		$output.= '<label for="'.esc_attr($this->get_field_id('RSS')).'" >RSS:</label>';
		$output.= '<input type="text" class="widefat"  id= "'.esc_attr($this->get_field_id('RSS')).'" name="'.esc_attr($this->get_field_name('RSS')).'" 
		value="'.esc_url($RSS).'" >';
		$output.= '</p>';
		
		echo $output;
	}
	
	//udate data
	public function update($new_instance,$old_instance)
	{
		$instance=array();
		$instance['facebook']=(!empty($new_instance['facebook']) ? strip_tags($new_instance['facebook']) : 'https://www.facebook.com/rtCamp.solutions/');
		$instance['twitter']=(!empty($new_instance['twitter']) ? strip_tags($new_instance['twitter']) :'https://twitter.com/rtcamp?lang=en');
		$instance['linkdin']=(!empty($new_instance['linkdin']) ? strip_tags($new_instance['linkdin']) : 'https://in.linkedin.com/company/rtcamp');
		$instance['RSS']=(!empty($new_instance['RSS']) ? strip_tags($new_instance['RSS']) : 'https://rtcamp.com/');
		
		return $instance;
	
	}
	
	//font-end display of widget2
	public function widget($args,$instance)
	{
		
		 echo $args['before_widget'];
			echo $args['before_title'];
				echo 'STAY-IN-TOUCH';
			echo $args['after_title'];
			
			
			?>
			
			<ul>
			 
			 <?php //if(!empty($intance['facebook'])): ?>
			 <li class=""><a class="image-1" href=" <?php echo $instance['facebook'] ?> "> <img class="image facebook"> facebook</a></li>
			 <?php //endif; ?>
			 
			 <?php //if(!empty($intance['twitter'])): ?>
			 <li> <a class="image-2" href="<?php echo $instance['twitter'] ?>"> <img class="image twitter"> twitter</a></li>
			 <?php //endif; ?>
			 
			 <?php //if(!empty($intance['linkdin'])): ?>
			 <li><a class="image-3" href= "<?php echo $instance['linkdin'] ?> " > <img class="image linkdin"> linkdin</a></li>
			 <?php //endif; ?>
			 
			 <?php //if(!empty($intance['RSS'])): ?>
			 <li><a class="image-4" href= " <?php echo $instance['RSS'] ?>"><img class="image RSS"> RSS</a></li>
			 <?php //endif; ?>
			
			</ul>
		<?php
		
		 echo $args['after_widget'];
		 
		
		
		
	}
}
	function to_register_widget_new()
	{
		register_widget('Stay_in_touch_widget');
		register_widget('Latest_news_widget');
	}

	add_action('widgets_init', 'to_register_widget_new' );
	
	

	
/**************************NAVIGATION MENU WIDGET********************
*********************************************************************/


class Nav_Menu_Widget3 extends WP_Widget {
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
	*/
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
		if ( ! $nav_menu ) {
			return;
		}
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu,
		);
		/**
		 * Filters the arguments for the Navigation Menu widget.
		 *
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
		echo $args['after_widget'];
	}
	/**
	 * Handles updating settings for the current Navigation Menu widget instance.
	 *
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
	 */
	public function form( $instance ) {
		global $wp_customize;
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		// Get menus
		$menus = wp_get_nav_menus();
		$empty_menus_style = $not_empty_menus_style = '';
		if ( empty( $menus ) ) {
			$empty_menus_style = ' style="display:none" ';
		} else {
			$not_empty_menus_style = ' style="display:none" ';
		}
		$nav_menu_style = '';
		if ( ! $nav_menu ) {
			$nav_menu_style = 'display: none;';
		}
		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
			<?php
			if ( $wp_customize instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}
	
add_action('widgets_init',function(){
		register_widget('Nav_Menu_Widget3');
});
	
	
	
