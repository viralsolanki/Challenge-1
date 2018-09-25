<?php
/**
 * This is index of the page
 *
 * @package simple_theme
 */

get_header();
?>


	<!--*****************slider code*********************
	***************************************************-->
	<meta>
	<div class="slidebox">
		<div class="container clearfix slider" >
			<div>   
				<div style="position : relative">
					<div class="slider_images">
					<?php
					$slides      = array(
						'post_type'      => 'slider',
						'order'          => 'asc',
						'posts_per_page' => 5,
					);
					$post_select = new WP_Query( $slides );
					$image       = 1;

					if ( $post_select->have_posts() ) :
					?>
					<!--=======================SLIDER IMAGES=====================-->

					<div class="sub_slide_image">
					<?php
					while ( $post_select->have_posts() ) :
						$post_select->the_post();
						$count_post[] = $post->ID;
						if ( has_post_thumbnail() ) {
							$thumb_id = get_post_thumbnail_id();

							$thumb_url = wp_get_attachment_image_src( $thumb_id, 'slider-size', false );
						?>

							<img class="image<?php echo esc_attr( $image ); ?>" src= "<?php echo esc_url( $thumb_url[0] ); ?>" alt=""> 
						<?php
						} else {
							$thumb_id  = get_post_thumbnail_id( $count_post[0] );
							$thumb_url = wp_get_attachment_image_src( $thumb_id, 'slider-size', false );
						?>

						<img class="image<?php echo esc_attr( $image ); ?>" src= "<?php echo esc_url( $thumb_url[0] ); ?>" alt=""> 
						<?php
						}
					?>
					<?php
					$image++;
					endwhile;
					echo '</div>';

					?>

						<!--=======================POST TITLE & EXCERPT=====================-->

						<div class="post_content">
						<?php
						$post_class_count = 1;
						while ( $post_select->have_posts() ) :
							$post_select->the_post();
						?>

								<div class="post_data<?php echo esc_attr( $post_class_count ); ?>">
									<p><?php the_title(); ?></p>
									<?php if ( has_excerpt() ) { ?>
									<p style="font-weight:bold"><?php the_excerpt(); ?></p>
									<?php } else { ?>
									<p style="font-weight:bold"><?php the_content(); ?></p>
									<?php
                                    }
									echo '</div>';
									?>
						<?php
						$post_class_count++;
						endwhile;
						echo '</div>';
						?>

										<!--=======================SLIDER INDICATORS=====================-->    
						<div id="bubbles">

							<ul class="bubbles" style="position:relative">
						<?php
						$post_circle_count = 1;
						while ( $post_select->have_posts() ) :
							$post_select->the_post();
						?>

							<div class="circle circle<?php echo esc_attr( $post_circle_count ); ?>" ></div>
						<?php
						$post_circle_count++;
						endwhile;
						echo '</ul>';
						echo '</div>';
						endif;
							?>
					</div>
					<!--=======================NEXT & PREV BUTTONS=====================-->
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>./images/slider-bottom-pagination.png" 
					class="next" style="position:absolute" alt="next" />
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>./images/slider-top-pagination.png" 
					class="prev" style="position:absolute" alt="prev" />	
				</div>
			</div>
		</div>
	</div>	
	<!--*****************display chiled pages*********************
	***************************************************-->
	<div class="container parent ">

		<div class="childes row ml clearfix">

		<!--=======================DISPLAY CHILDS OF HOME PAGE=====================-->

			<div class="col-md-3 col-sm-3 col-xs-12 chiled-pages">

				<?php

				$array_child_page_id = array();
				$child_class         = 0;
				$child_page          = get_page_by_title( 'Home' );
				$home_child          = array(

					'orderby'     => 'menu_order',
					'post_type'   => 'page',
					'post_parent' => $child_page->ID,

				);

				?>

				<?php
				$home_child_post = new WP_Query( $home_child );

				if ( $home_child_post->have_posts() ) :
					while ( $home_child_post->have_posts() ) :
						$home_child_post->the_post();
				?>
				<div class="row ml">
					<li class= "child-<?php echo esc_attr( $child_class ); ?>"> 
						<a><?php the_title(); ?> </a><img 
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/brown-notch.png"/>
					</li>
				</div>   

				<?php
					$child_class++;
					endwhile;
				endif;
				?>

			</div>					  
			<!--=======================DISPLAY CHILDS PAGES OF HOME PAGE=====================-->
				<div class="col-md-9 col-sm-9 col-xs-12 sub-pages">
					<div class="row ml content-holder" >
					<?php
						$child = array(

							'post_type'   => 'page',
							'post_parent' => $child_page->ID,

						);

					?>

					<?php $child_post = new WP_Query( $child ); ?>
					<?php
					if ( $child_post->have_posts() ) :
						while ( $child_post->have_posts() ) :
							$child_post->the_post();
					?>

						<div class="col-md-4 col-sm-6 sub-pages-content" >
							<?php the_post_thumbnail( 'image-child' ); ?>

								<p style="font-weight:bold;"><?php the_title(); ?></p>
							<?php the_excerpt(); ?>

						</div>

					<?php
						endwhile;
					endif;
					?>
					</div>
					<!--=======================DISPLAY SUB-PAGES OF CHILDS PAGES OF HOME PAGE=====================-->

						<?php
							$args = array(
								'post_type' => 'page',
								'include'   => get_the_top_parent_id(),

							);

							$child3 = get_pages( $args );
						?>

						<?php
							global $class_name;
							$class_name = 0;
						foreach ( $child3 as $post1 ) {
							$child2 = array(
								'post_type'   => 'page',
								'post_parent' => $post1->ID,

							);

							$child2_post = new WP_Query( $child2 );
						?>
						<?php
						if ( $child2_post->have_posts() ) :
							?>

							<div class="row ml display_sub_pages display<?php echo esc_attr( $class_name ); ?> " id="" >
							<?php
							while ( $child2_post->have_posts() ) :
								$child2_post->the_post();

								?>

								<div class=" col-md-4 col-sm-6 sub-pages-content " >
									<?php the_post_thumbnail( 'image-child' ); ?>
									<p style="font-weight:bold"><?php the_title(); ?></p>
									<p><?php the_excerpt(); ?></p>

								</div>

								<?php
								endwhile;
							echo '</div>';
							$class_name++;
								endif;
						}
						?>
				</div>
			</div>

		</div>

	</meta>

<?php
get_footer();
