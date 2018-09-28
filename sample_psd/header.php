<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sample_psd
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'semple_psd' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container header_area">
			<div class="header_inside row ml " style="position:relative">

						<div class="col-md-4 logo">
						<?php
							$theme_logo  = esc_attr( get_option( 'Theme-logo' ) );
	                        $theme_logo2 = ( ! empty( $theme_logo ) ? ( $theme_logo ) : get_template_directory_uri().'/images/logo.png' );
						?>
						<a href="<?php echo esc_url( get_home_url() ); ?>">

								<img src="<?php echo esc_url( $theme_logo2 ); ?>" style="width:277px;height:85px;">

						</a>
					</div>

					<span class="menu_btn">&#9776; Menu</span> 
					<div class="sidebar_nav" id="sidebar_nav" style="display:none">
						<a href="javascript:void(0)" class="closebtn" >&times;</a>
						<nav class="main-navigation menu-new" id="site-navigation">

								<?php
									$args = array(
										'theme_location' => 'my_header_nav',
										'depth'          => 3,
									);
								?>
								<?php
									wp_nav_menu( $args );
								?>
							</nav> 

					</div>
					<div class="div_over-blur"> </div>
					<div class="nav-menu" style="">
						<nav class="main-navigation menu-new" id="site-navigation">

							<?php
								$args = array(
									'theme_location' => 'my_header_nav',
									'depth'          => 3,
								);
							?>
							<?php
								wp_nav_menu( $args );
							?>
						</nav> 
					</div>		
			</div>	
		</div>
	</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

