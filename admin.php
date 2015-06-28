<?php
/*
 * Security check
 * Exit if file accessed directly.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Roojoom admin menu
 *
 * @since 1.0
 */
function roojoom_add_admin_menu() { 

	add_options_page(
		__( 'Roojoom', 'roojoom' ),
		__( 'Roojoom', 'roojoom' ),
		'manage_options',
		'roojoom',
		'roojoom_options_page'
	);

}
add_action( 'admin_menu', 'roojoom_add_admin_menu' );



/*
 * Roojoom admin layout
 *
 * @since 1.0
 */
function roojoom_options_page() { 

	?>
	<h1><?php esc_html_e( 'Roojoom', 'roojoom' ); ?></h1>

	<form action='options.php' method='post'>

		<?php
		settings_fields( 'roojoom_admin_page' );
		do_settings_sections( 'roojoom_admin_page' );
		submit_button();
		?>

	</form>
	<?php

}



/*
 * Register roojoom settings
 *
 * @since 1.0
 */
function roojoom_settings_init() { 

	register_setting(
		'roojoom_admin_page',
		'roojoom_settings'
	);

	add_settings_section(
		'roojoom_roojoom_admin_page_section', 
		__( 'Settings', 'roojoom' ),
		'roojoom_settings_section_render', 
		'roojoom_admin_page'
	);

	add_settings_field( 
		'roojoom_type', 
		__( 'Type', 'roojoom' ), 
		'roojoom_type_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

	add_settings_field( 
		'roojoom_auto_transition', 
		__( 'Auto picture rotation', 'roojoom' ), 
		'roojoom_auto_transition_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

	add_settings_field( 
		'roojoom_show_intro', 
		__( 'Show intro', 'roojoom' ), 
		'roojoom_show_intro_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

	add_settings_field( 
		'roojoom_mini_mode', 
		__( 'Hide left bar', 'roojoom' ), 
		'roojoom_mini_mode_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

	add_settings_field( 
		'roojoom_open_step', 
		__( 'Open on displayed step', 'roojoom' ), 
		'roojoom_open_step_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

	add_settings_field( 
		'roojoom_hide_urls', 
		__( 'Hide domain names', 'roojoom' ), 
		'roojoom_hide_urls_render', 
		'roojoom_admin_page', 
		'roojoom_roojoom_admin_page_section' 
	);

}
add_action( 'admin_init', 'roojoom_settings_init' );



function roojoom_settings_section_render() {

	echo '<p>';
	_e( 'You don’t have to manually set the options for each of your embeded shortcodes. You can use the default site settings.', 'roojoom' );
	echo '</p>';

	echo '<p>';
	_e( 'To make the magic happen, enter the following information:', 'roojoom' );
	echo '</p>';

}
function roojoom_type_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_type', $options ) ) {
		$options['roojoom_type'] = '';
	}

	// Output
	?>
	<select name='roojoom_settings[roojoom_type]'>
		<option value='rect' <?php   selected( $options['roojoom_type'], 'rect'   ); ?>><?php _e( 'Rectangle widget', 'roojoom' ); ?></option>
		<option value='square' <?php selected( $options['roojoom_type'], 'square' ); ?>><?php _e( 'Square widget',    'roojoom' ); ?></option>
	</select>
	<?php

}
function roojoom_auto_transition_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_auto_transition', $options ) ) {
		$options['roojoom_auto_transition'] = '';
	}

	// Output
	?>
	<input type='checkbox' name='roojoom_settings[roojoom_auto_transition]' <?php checked( $options['roojoom_auto_transition'], 1 ); ?> value="1"> <?php _e( 'Turn on to change pictures inside widget periodically.', 'roojoom' ); ?>
	<?php

}
function roojoom_show_intro_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_show_intro', $options ) ) {
		$options['roojoom_show_intro'] = '';
	}

	// Output
	?>
	<input type='checkbox' name='roojoom_settings[roojoom_show_intro]' <?php checked( $options['roojoom_show_intro'], 1 ); ?> value="1"> <?php _e( 'Show intro.', 'roojoom' ); ?>
	<?php

}
function roojoom_mini_mode_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_mini_mode', $options ) ) {
		$options['roojoom_mini_mode'] = '';
	}

	// Output
	?>
	<input type='checkbox' name='roojoom_settings[roojoom_mini_mode]' <?php checked( $options['roojoom_mini_mode'], 1 ); ?> value="1"> <?php _e( 'Hide comments bar inside the Roojoom.', 'roojoom' ); ?>
	<?php

}
function roojoom_open_step_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_open_step', $options ) ) {
		$options['roojoom_open_step'] = '';
	}

	// Output
	?>
	<input type='checkbox' name='roojoom_settings[roojoom_open_step]' <?php checked( $options['roojoom_open_step'], 1 ); ?> value="1"> <?php _e( 'Upon clicking the widget, the Roojoom will open in a lightbox starting with the step currently displayed in the image.', 'roojoom' ); ?>
	<?php

}
function roojoom_hide_urls_render() { 

	// Load roojoom settings
	$options = (array) get_option( 'roojoom_settings' );

	// Validate
	if ( ! array_key_exists( 'roojoom_hide_urls', $options ) ) {
		$options['roojoom_hide_urls'] = '';
	}

	// Output
	?>
	<input type='checkbox' name='roojoom_settings[roojoom_hide_urls]' <?php checked( $options['roojoom_hide_urls'], 1 ); ?> value="1"> <?php _e( 'Hide domain name from the widget steps.', 'roojoom' ); ?>
	<?php

}
