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
 * Register roojoom Shortcode
 * Display a specific item in a desired location on your content.
 *
 * usage: [roojoom id="14677" type="rect" width="500" height="350" auto-transition="true" show-intro="true" mini-mode="true" open-step="true" hide-urls="true"]
 *
 * @since 1.0
 */
function roojoom_item_shortcode( $atts ) {

	// Load global site settings from DB
	$options = (array) get_option( 'roojoom' );

	// Set site settings
	$site_type            = ( ( ( array_key_exists( 'roojoom_type',            $options ) ) ) ? $options['roojoom_type']   : '' );
	$site_width           = ( ( ( array_key_exists( 'roojoom_width',           $options ) ) ) ? $options['roojoom_width']  : '' );
	$site_height          = ( ( ( array_key_exists( 'roojoom_height',          $options ) ) ) ? $options['roojoom_height'] : '' );
	$site_auto_transition = ( ( ( array_key_exists( 'roojoom_auto_transition', $options ) ) && ( '1' == $options['roojoom_auto_transition'] ) ) ? 'true' : 'false' );
	$site_show_intro      = ( ( ( array_key_exists( 'roojoom_show_intro',      $options ) ) && ( '1' == $options['roojoom_show_intro']      ) ) ? 'true' : 'false' );
	$site_mini_mode       = ( ( ( array_key_exists( 'roojoom_mini_mode',       $options ) ) && ( '1' == $options['roojoom_mini_mode']       ) ) ? 'true' : 'false' );
	$site_open_step       = ( ( ( array_key_exists( 'roojoom_open_step',       $options ) ) && ( '1' == $options['roojoom_open_step']       ) ) ? 'true' : 'false' );
	$site_hide_urls       = ( ( ( array_key_exists( 'roojoom_hide_urls',       $options ) ) && ( '1' == $options['roojoom_hide_urls']       ) ) ? 'true' : 'false' );
	$site_source_domain   = ( ( ( array_key_exists( 'roojoom_source_domain',   $options ) ) ) ? $options['roojoom_source_domain'] : str_replace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) ) );

	// If shortcode has no attribute, use default site settings
	$atts = shortcode_atts(
		array(
			'id'              => '',
			'type'            => $site_type,
			'width'           => $site_width,
			'height'          => $site_height,
			'auto-transition' => $site_auto_transition,
			'show-intro'      => $site_show_intro,
			'mini-mode'       => $site_mini_mode,
			'open-step'       => $site_open_step,
			'hide-urls'       => $site_hide_urls,
			'source-domain'   => $site_source_domain,
		), $atts );

	// Generate roojoom embed code
	$code = '
		<script type="text/javascript">(function(){if(!document.getElementById("rjmEmbedScript")){var a=[];var b=document.createElement("script");b.async=true;b.id="rjmEmbedScript";b.type="text/javascript";b.charset="UTF-8";b.src="//widget.roojoom.com/widget/v2/rjwidget.js";document.body.appendChild(b);}})();</script>
		<div class="rjWidget" 
		style="width: ' . esc_attr( $atts['width'] ) . 'px; height: ' . esc_attr( $atts['height'] ) . 'px; border: 2px dashed #ccc;" 
		id="roojoom-id-' . esc_attr( $atts['id'] ) . '" 
		data-roojoom-id="' . esc_attr( $atts['id'] ) . '" 
		data-widget-type="' . esc_attr( $atts['type'] ) . '" 
		data-widget-size="size' . esc_attr( $atts['width'] ) . '" 
		data-auto-transition="' . esc_attr( $atts['auto-transition'] ) . '" 
		data-show-intro="' . esc_attr( $atts['show-intro'] ) . '" 
		data-mini-mode="' . esc_attr( $atts['mini-mode'] ) . '" 
		data-open-step="' . esc_attr( $atts['open-step'] ) . '" 
		data-hide-urls="' . esc_attr( $atts['hide-urls'] ) . '">
		<a href="http://www.roojoom.com" alt="Roojoom"><img src="' . plugins_url( 'images/roojoom-logo.png', __FILE__ ) . '"></a>
		</div>
	';

	// Return embed code
	return $code;

}

add_shortcode( 'roojoom', 'roojoom_item_shortcode' );
