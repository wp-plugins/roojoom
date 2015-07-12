<?php
/*
 * Security check
 * Exit if file accessed directly.
 *
 * @since 1.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Register roojoom Widget
 * Display a specific item in a desired location on your content.
 *
 * @since 1.1
 */
class Roojoom_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'roojoom',
			__( 'Roojoom', 'roojoom' ),
			array(
				'description' => __( 'Embed roojoom content journey.', 'roojoom' ),
				'classname'   => 'roojoom'
			)
		);

	}

	public function widget( $args, $instance ) {

		// Prepare widget settings
		$title                   = empty( $instance['title']                   ) ? '' : apply_filters( 'title',                   $instance['title']                   );
		$roojoom_id              = empty( $instance['roojoom_id']              ) ? '' : apply_filters( 'roojoom_id',              $instance['roojoom_id']              );
		$roojoom_width           = empty( $instance['roojoom_width']           ) ? '' : apply_filters( 'roojoom_width',           $instance['roojoom_width']           );
		$roojoom_height          = empty( $instance['roojoom_height']          ) ? '' : apply_filters( 'roojoom_height',          $instance['roojoom_height']          );
		$roojoom_auto_transition = empty( $instance['roojoom_auto_transition'] ) ? '' : apply_filters( 'roojoom_auto_transition', $instance['roojoom_auto_transition'] );
		$roojoom_show_intro      = empty( $instance['roojoom_show_intro']      ) ? '' : apply_filters( 'roojoom_show_intro',      $instance['roojoom_show_intro']      );
		$roojoom_open_step       = empty( $instance['roojoom_open_step']       ) ? '' : apply_filters( 'roojoom_open_step',       $instance['roojoom_open_step']       );
		$roojoom_hide_urls       = empty( $instance['roojoom_hide_urls']       ) ? '' : apply_filters( 'roojoom_hide_urls',       $instance['roojoom_hide_urls']       );
		$roojoom_type            = 'square';
		$roojoom_mini_mode       = true;

		// Generate roojoom embed code
		$code = '
			<script type="text/javascript">(function(){if(!document.getElementById("rjmEmbedScript")){var a=[];var b=document.createElement("script");b.async=true;b.id="rjmEmbedScript";b.type="text/javascript";b.charset="UTF-8";b.src="//widget.roojoom.com/widget/v2/rjwidget.js";document.body.appendChild(b);}})();</script>
			<div class="rjWidget" 
			style="width: ' . esc_attr( $roojoom_width ) . 'px; height: ' . esc_attr($roojoom_height) . 'px; border: 2px dashed #ccc;" 
			id="roojoom-id-' . esc_attr( $roojoom_id ) . '" 
			data-roojoom-id="' . esc_attr( $roojoom_id ) . '" 
			data-widget-type="' . esc_attr( $roojoom_type ) . '" 
			data-widget-size="size' . esc_attr( $roojoom_width ) . '" 
			data-auto-transition="' . esc_attr( $roojoom_auto_transition ) . '" 
			data-show-intro="' . esc_attr( $roojoom_show_intro ) . '" 
			data-mini-mode="' . esc_attr( $roojoom_mini_mode ) . '" 
			data-open-step="' . esc_attr( $roojoom_open_step ) . '" 
			data-hide-urls="' . esc_attr( $roojoom_hide_urls ) . '">
			<a href="http://www.roojoom.com" alt="Roojoom"><img src="' . plugins_url( 'images/roojoom-logo.png', __FILE__ ) . '"></a>
			</div>
		';

		// Output
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		echo $code;
		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
			'title'                   => '',
			'roojoom_id'              => '',
			'roojoom_width'           => '',
			'roojoom_height'          => '',
			'roojoom_auto_transition' => false,
			'roojoom_show_intro'      => false,
			'roojoom_open_step'       => false,
			'roojoom_hide_urls'       => false
		) );

		// Retrieve an existing value from the database
		$title                   = !empty( $instance['title']                   ) ? $instance['title']                          : '';
		$roojoom_id              = !empty( $instance['roojoom_id']              ) ? $instance['roojoom_id']                     : '';
		$roojoom_width           = !empty( $instance['roojoom_width']           ) ? $instance['roojoom_width']                  : '';
		$roojoom_height          = !empty( $instance['roojoom_height']          ) ? $instance['roojoom_height']                 : '';
		$roojoom_auto_transition = isset(  $instance['roojoom_auto_transition'] ) ? (bool) $instance['roojoom_auto_transition'] : false;
		$roojoom_show_intro      = isset(  $instance['roojoom_show_intro']      ) ? (bool) $instance['roojoom_show_intro']      : false;
		$roojoom_open_step       = isset(  $instance['roojoom_open_step']       ) ? (bool) $instance['roojoom_open_step']       : false;
		$roojoom_hide_urls       = isset(  $instance['roojoom_hide_urls']       ) ? (bool) $instance['roojoom_hide_urls']       : false;

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title', 'roojoom' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'roojoom' ) . '" value="' . esc_attr( $title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_id' ) . '">' . __( 'Roojoom Item ID', 'roojoom' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'roojoom_id' ) . '" name="' . $this->get_field_name( 'roojoom_id' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'roojoom' ) . '" value="' . esc_attr( $roojoom_id ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_width' ) . '">' . __( 'Width', 'roojoom' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'roojoom_width' ) . '" name="' . $this->get_field_name( 'roojoom_width' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'roojoom' ) . '" value="' . esc_attr( $roojoom_width ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_height' ) . '">' . __( 'Height', 'roojoom' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'roojoom_height' ) . '" name="' . $this->get_field_name( 'roojoom_height' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'roojoom' ) . '" value="' . esc_attr( $roojoom_height ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<input type="checkbox" id="' . $this->get_field_id( 'roojoom_auto_transition' ) . '" name="' . $this->get_field_name( 'roojoom_auto_transition' ) . '" class="checkbox" ' . checked( $roojoom_auto_transition, true, false ) . '>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_auto_transition' ) . '">' . __( 'Auto picture rotation', 'roojoom' ) . '</label>';
		echo '</p>';

		echo '<p>';
		echo '	<input type="checkbox" id="' . $this->get_field_id( 'roojoom_show_intro' ) . '" name="' . $this->get_field_name( 'roojoom_show_intro' ) . '" class="checkbox" ' . checked( $roojoom_show_intro, true, false ) . '>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_show_intro' ) . '">' . __( 'Show Intro', 'roojoom' ) . '</label>';
		echo '</p>';

		echo '<p>';
		echo '	<input type="checkbox" id="' . $this->get_field_id( 'roojoom_open_step' ) . '" name="' . $this->get_field_name( 'roojoom_open_step' ) . '" class="checkbox" ' . checked( $roojoom_open_step, true, false ) . '>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_open_step' ) . '">' . __( 'Open on displayed step', 'roojoom' ) . '</label>';
		echo '</p>';

		echo '<p>';
		echo '	<input type="checkbox" id="' . $this->get_field_id( 'roojoom_hide_urls' ) . '" name="' . $this->get_field_name( 'roojoom_hide_urls' ) . '" class="checkbox" ' . checked( $roojoom_hide_urls, true, false ) . '>';
		echo '	<label for="' . $this->get_field_id( 'roojoom_hide_urls' ) . '">' . __( 'Hide domain names', 'roojoom' ) . '</label>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']                   = !empty( $new_instance['title']                   ) ? strip_tags( $new_instance['title']          ) : '';
		$instance['roojoom_id']              = !empty( $new_instance['roojoom_id']              ) ? strip_tags( $new_instance['roojoom_id']     ) : '';
		$instance['roojoom_width']           = !empty( $new_instance['roojoom_width']           ) ? strip_tags( $new_instance['roojoom_width']  ) : '';
		$instance['roojoom_height']          = !empty( $new_instance['roojoom_height']          ) ? strip_tags( $new_instance['roojoom_height'] ) : '';
		$instance['roojoom_auto_transition'] = !empty( $new_instance['roojoom_auto_transition'] ) ? true : false;
		$instance['roojoom_show_intro']      = !empty( $new_instance['roojoom_show_intro']      ) ? true : false;
		$instance['roojoom_open_step']       = !empty( $new_instance['roojoom_open_step']       ) ? true : false;
		$instance['roojoom_hide_urls']       = !empty( $new_instance['roojoom_hide_urls']       ) ? true : false;

		return $instance;

	}

}

function roojoom_register_widgets() {
	register_widget( 'Roojoom_Widget' );
}
add_action( 'widgets_init', 'roojoom_register_widgets' );