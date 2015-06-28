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
 * Register oEmbed Provider
 * Add roojoom to WordPress oEmbed providers list
 *
 * @since 1.0
 */
function emaze_oembed_provider() {

	wp_oembed_add_provider( '#https?://(www.|tracks.)?roojoom.com/r/.*#i', 'http://api.roojoom.com/oembed', true );
	//wp_oembed_add_provider( '#https?://widget.roojoom.com/static_widget/.*#i', 'http://api.roojoom.com/oembed', true );

}
add_action( 'init', 'emaze_oembed_provider' );
