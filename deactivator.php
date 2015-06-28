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
 * Fired when the plugin is deactivated.
 * This class defines all code necessary to run during plugin deactivation.
 *
 * @since 1.0
 */
class RoojoomDeactivator {

	/*
	 * Deactivate
	 */
	public static function deactivate() {

		// Delete option from the database
		// delete_option( 'roojoom_settings' );

		// Delete option from the database in multisite
		// delete_site_option( 'roojoom_settings' );

	}

}



/*
 * Register WordPress deactivation hook
 * Run the activator class only when deactivation hook called
 *
 * @since 1.0
 */
function roojoom_deactivation() {

	RoojoomDeactivator::deactivate();

}
register_deactivation_hook( __FILE__, 'roojoom_deactivation' );
