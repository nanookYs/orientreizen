<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Create
 */


/**
 * Returns the default options for create.
 *
 * @since Create 1.2.1
 */
function create_get_default_theme_options( $parameter = null ) {
	
	$default_theme_options = array(
		//Featured Slider Options
		'featured_slider_option'							=> 'disabled',
		'featured_slide_transition_effect'					=> 'fadeout',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',

		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	if ( null == $parameter ) {
		return apply_filters( 'create_default_theme_options', $default_theme_options );
	}
	else {
		return $default_theme_options[ $parameter ];
	}
}

/**
 * Returns an array of slider layout options registered for create.
 *
 * @since Create 1.2.1
 */
function create_featured_slider_options() {
	$featured_slider_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'create' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'create' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'create' ),
		),
	);

	return apply_filters( 'create_featured_slider_options', $featured_slider_options );
}

/**
 * Returns an array of feature slider types registered for create.
 *
 * @since Create 1.2
 */
function create_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'create' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'create' ),
		),
	);

	return apply_filters( 'create_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Create 1.2
 */
function create_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'create' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'create' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'create' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'create' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'create' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'create' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'create' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'create' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'create' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Suffle', 'create' ),
		)
	);

	return apply_filters( 'create_featured_slide_transition_effects', $featured_slide_transition_effects );
}