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
 * Fired when the plugin is activated.
 * This class defines all code necessary to run during plugin activation.
 *
 * @since 1.0
 */
class RoojoomActivator {

	/*
	 * Activate
	 */
	public static function activate() {

		// Set default option
		$options['roojoom_type']            = 'rect';
		$options['roojoom_width']           = '500';
		$options['roojoom_height']          = '350';
		$options['roojoom_auto_transition'] = 'true';
		$options['roojoom_show_intro']      = 'true';
		$options['roojoom_mini_mode']       = 'true';
		$options['roojoom_open_step']       = 'true';
		$options['roojoom_hide_urls']       = 'true';
		$options['roojoom_source_domain']   = str_replace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );

		// Add default option to the database
		add_option( 'roojoom_settings', $options, '', 'yes' );

		// Add default option to the database in multisite
		add_site_option( 'roojoom_settings', $options );

	}

}



/*
 * Register WordPress activation hook
 * Run the activator class only when activation hook called
 *
 * @since 1.0
 */
function Roojoom_activation() {

	RoojoomActivator::activate();

}
register_activation_hook( __FILE__, 'Roojoom_activation' );
