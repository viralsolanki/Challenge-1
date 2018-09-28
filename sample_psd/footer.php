<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sample_psd
 */

?>


	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class= "container footer-area clearfix">

						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
				<div class="widget row ml">

									<?php
									dynamic_sidebar( 'sidebar1' );

										?>

							</div>
			<?php endif; ?>

		</div>
		<div id="footer-text-area">
			<div class="container">
			<div class="row ml" id="footer-elements">
				<div class="col-md-8 ml" style="padding:0px" >

							<nav class=" main-navigation footer-nav" id="site-navigation">
					<?php
						$args = array(
							'theme_location' => 'my_footer_nav',
							'depth'          => 1,
						);
					?>
					<?php
						wp_nav_menu( $args );
						?>
					</nav>

					<?php $cap     = esc_attr( get_option( 'footer_caption_field' ) );
	                      $caption = ( ! empty( $cap ) ? ( $cap ) : 'Wordpress theme' ); ?>
				<p> &copy; <?php echo esc_html( $caption ); ?>  </p>
			</div>  

						<div class="col-md-4 ml" id="footer-custom-img">
				<?php
					// Set the footer-image.
					$footer_image  = esc_attr( get_option( 'footer-image' ) );
	                $footer_image2 = ( ! empty( $footer_image ) ? ( $footer_image ) : get_template_directory_uri().'/images/footer-logo.png' );
					echo '<img src="' . esc_attr( $footer_image2 ) . '" style="width:277px;height:85px">';
				?>
			</div>
			</div>  
		</div>
		</div>

		</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
