<?php
/**
 * This page is for create and customize the 'Theme options page'
 *
 * @package Sample_psd
 */

/**
 * Add new menu page as 'Theme options page'
 */
function semple_theme_options_page() {
	/*-------Dashboard menu function-------*/

	add_menu_page(
		'Theme options page',
		'Theme_options',
		'manage_options',
		'Semple_Theme',
		'theme_options',
		'dashicons-edit',
		30
	);

	// Activate custom theme options.
	add_action( 'admin_init', 'theme_custom_settings' );
}

	add_action( 'admin_menu', 'semple_theme_options_page' );

/**
 * Regiser sections fields and settings for thene settings page
 */
function theme_custom_settings() {
	register_setting( 'theme-options-group', 'Theme-logo' );
	register_setting( 'theme-options-group', 'footer-image' );
	register_setting( 'theme-options-group', 'footer_caption_field' );
	add_settings_section(
		'add-caption-section',
		'Add Theme Custom Options :',
		'add_caption_section',
		'Semple_Theme'
	);
	add_settings_field(
		'footer-caption',
		'Edit Footer caption Here',
		'fotter_caption',
		'Semple_Theme',
		'add-caption-section'
	);
	add_settings_field(
		'Sample-theme-logo',
		'Upload Theme logo',
		'theme_logo_field',
		'Semple_Theme',
		'add-caption-section'
	);
	add_settings_field(
		'Sample-theme-footer-image',
		'Upload Footer Image',
		'theme_image_field',
		'Semple_Theme',
		'add-caption-section'
	);
}


/**
 * Add form caption of saction
 */
function add_caption_section() { }

/**
 * Input fields and buttons for footer caption
 */
function fotter_caption() {
	$cap     = esc_attr( get_option( 'footer_caption_field' ) );
	$caption = ( ! empty( $cap ) ? ( $cap ) : 'Wordpress theme' );
	echo '<input type="text" name="footer_caption_field" value="' . esc_attr( $caption ) . '" style="width:400px"/>';
}

/**
 * Input fields and buttons for theme logo
 */
function theme_logo_field() {
	$theme_logo  = esc_attr( get_option( 'Theme-logo' ) );
	$theme_logo2 = ( ! empty( $theme_logo ) ? ( $theme_logo ) : get_template_directory_uri().'/images/logo.png' );
	echo '<input type="button" id="theme-logo-id" class="button" value="Select Theme logo" />';
	echo '<input type="hidden" id="logo_id" name="Theme-logo" value="' . esc_attr( $theme_logo2 ) . '" /></br>';
	echo '<img style="margin-top:20px;width:277px;height:85px;" id="header-image-src" src="' . esc_url( $theme_logo2 ) . '" >';
}

/**
 * Input fields and buttons for footer image
 */
function theme_image_field() {
	$footer_image  = esc_attr( get_option( 'footer-image' ) );
	$footer_image2 = ( ! empty( $footer_image ) ? ( $footer_image ) : get_template_directory_uri().'/images/footer-logo.png' );
	echo '<input type="button" id="footer-image-id" class="button" value="Select Footer Image" />';
	echo '<input type="hidden" id="image_id" name="footer-image" value="' . esc_attr( $footer_image2 ) . '" /></br>';
	echo '<img style="margin-top:20px;width:277px;height:85px;" id="footer-image-src" src="' . esc_url( $footer_image2 ) . '" >';
}

/**
 * Theme options page form customization
 */
function theme_options() {
	?> 
	<h1> This is Theme Options Setting Page</h1>
	<?php settings_errors(); ?>
	<form style="margin:50px 50px" method="post" action="options.php">
		<?php settings_fields( 'theme-options-group' ); ?> 
		<?php do_settings_sections( 'Semple_Theme' ); ?>
		<?php submit_button(); ?>
	</form>
	<?php
}
