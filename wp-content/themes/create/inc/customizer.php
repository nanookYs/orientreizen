<?php
/**
 * Create Theme Customizer
 *
 * @package Create
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function create_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$defaults = create_get_default_theme_options();

	// Featured Slider
	$wp_customize->add_panel( 'create_featured_slider', array(
	    'capability'     => 'edit_theme_options',
	    'description'    => __( 'Featured Slider Options', 'create' ),
	    'priority'       => 500,
		'title'    		 => __( 'Featured Slider Options', 'create' ),
	) );

	$wp_customize->add_section( 'create_featured_slider', array(
		'panel'			=> 'create_featured_slider',
		'priority'		=> 1,
		'title'			=> __( 'Featured Slider Settings', 'create' ),
	) );

	$wp_customize->add_setting( 'featured_slider_option', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$featured_slider_content_options = create_featured_slider_options();
	$choices = array();
	foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
		$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'featured_slider_option', array(
		'choices'   => $choices,
		'label'    	=> __( 'Enable Slider on', 'create' ),
		'priority'	=> '1.1',
		'section'  	=> 'create_featured_slider',
		'settings' 	=> 'featured_slider_option',
		'type'    	=> 'select',
	) );

	$wp_customize->add_setting( 'featured_slide_transition_effect', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_effect'],
		'sanitize_callback'	=> 'create_sanitize_featured_slide_transition_effects',
	) );

	$create_featured_slide_transition_effects = create_featured_slide_transition_effects();
	$choices = array();
	foreach ( $create_featured_slide_transition_effects as $create_featured_slide_transition_effect ) {
		$choices[$create_featured_slide_transition_effect['value']] = $create_featured_slide_transition_effect['label'];
	}

	$wp_customize->add_control( 'featured_slide_transition_effect' , array(
		'choices'  	=> $choices,
		'label'		=> __( 'Transition Effect', 'create' ),
		'priority'	=> '2',
		'section'  	=> 'create_featured_slider',
		'settings' 	=> 'featured_slide_transition_effect',
		'type'	  	=> 'select',
		)
	);

	$wp_customize->add_setting( 'featured_slide_transition_delay', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_delay'],
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_control( 'featured_slide_transition_delay' , array(
		'description'	=> __( 'seconds(s)', 'create' ),
		'input_attrs' => array(
        	'style' => 'width: 40px;'
    	),
    	'label'    		=> __( 'Transition Delay', 'create' ),
		'priority'		=> '2.1.1',
		'section'  		=> 'create_featured_slider',
		'settings' 		=> 'featured_slide_transition_delay',
		)
	);

	$wp_customize->add_setting( 'featured_slide_transition_length', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_length'],
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_control( 'featured_slide_transition_length' , array(
		'description'	=> __( 'seconds(s)', 'create' ),
		'input_attrs' => array(
        	'style' => 'width: 40px;'
    	),
    	'label'    		=> __( 'Transition Length', 'create' ),
		'priority'		=> '2.1.2',
		'section'  		=> 'create_featured_slider',
		'settings' 		=> 'featured_slide_transition_length',
		)
	);

	$wp_customize->add_setting( 'featured_slider_type', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$featured_slider_types = create_featured_slider_types();
	$choices = array();
	foreach ( $featured_slider_types as $featured_slider_type ) {
		$choices[$featured_slider_type['value']] = $featured_slider_type['label'];
	}

	$wp_customize->add_control( 'featured_slider_type', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Slider Type', 'create' ),
		'priority'	=> '2.1.3',
		'section'  	=> 'create_featured_slider',
		'settings' 	=> 'featured_slider_type',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'featured_slide_number', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_number'],
		'sanitize_callback'	=> 'create_sanitize_no_of_slider',
	) );

	$wp_customize->add_control( 'featured_slide_number' , array(
		'description'	=> __( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'create' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Slides', 'create' ),
		'priority'		=> '2.1.4',
		'section'  		=> 'create_featured_slider',
		'settings' 		=> 'featured_slide_number',
		'type'	   		=> 'number',
		)
	);

	//Get featured slides humber from theme options
	$featured_slide_number	= get_theme_mod( 'featured_slide_number', create_get_default_theme_options( 'featured_slide_number' ) );
	
	//loop for featured page sliders
	for ( $i=1; $i <= $featured_slide_number ; $i++ ) {
		$wp_customize->add_setting( 'featured_slider_page_'. $i, array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'create_sanitize_page',
		) );

		$wp_customize->add_control( 'featured_slider_page_'. $i .'', array(
			'label'    	=> __( 'Featured Page', 'create' ) . ' # ' . $i ,
			'priority'	=> '4' . $i,
			'section'  	=> 'create_featured_slider',
			'settings' 	=> 'featured_slider_page_'. $i,
			'type'	   	=> 'dropdown-pages',
		) );
	}

    class CreateImportantLinks extends WP_Customize_Control {
        public $type = 'important-links'; 
        
        public function render_content() {
        	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
            $important_links = array(
							'theme_instructions' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/theme-instructions/create/' ),
								'text' 	=> __( 'Theme Instructions', 'create' ),
								),
							'support' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/support/' ),
								'text' 	=> __( 'Support', 'create' ),
								),
							'changelog' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/changelogs/create-theme/' ),
								'text' 	=> __( 'Changelog', 'create' ),
								),
							'donate' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/donate/' ),
								'text' 	=> __( 'Donate Now', 'create' ),
								),
							'review' => array( 
								'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/create' ),
								'text' 	=> __( 'Review', 'create' ),
								),
							'facebook' => array( 
								'link'	=> esc_url( 'https://www.facebook.com/catchthemes/' ),
								'text' 	=> __( 'Facebook', 'create' ),
								),
							'twitter' => array( 
								'link'	=> esc_url( 'https://twitter.com/catchthemes/' ),
								'text' 	=> __( 'Twitter', 'create' ),
								),
							'gplus' => array( 
								'link'	=> esc_url( 'https://plus.google.com/+Catchthemes/' ),
								'text' 	=> __( 'Google+', 'create' ),
								),
							'pinterest' => array( 
								'link'	=> esc_url( 'http://www.pinterest.com/catchthemes/' ),
								'text' 	=> __( 'Pinterest', 'create' ),
								),
							);
			foreach ( $important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . $important_link['text'] .' </a></p>';
			}
        }
    }

    //Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'create' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'create_sanitize_important_link',
	) );

	$wp_customize->add_control( new CreateImportantLinks( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'create' ),
         'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );  
    //Important Links End

}
add_action( 'customize_register', 'create_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function create_customize_preview_js() {
	wp_enqueue_script( 'create_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'create_customize_preview_js' );

/**
 * Dummy Sanitizaition function as it contains no value to be sanitized
 */
function create_sanitize_important_link() {
	return false;
}

/**
 * Custom scripts and styles on customize.php for create.
 *
 * @since Create 1.2
 */
function create_customize_scripts() {
	wp_register_script( 'create_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.js', array( 'jquery' ), '20131028', true );

	$create_misc_links = array(
							'upgrade_link' 				=> esc_url( 'http://catchthemes.com/themes/create-pro/' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'create' ),
						);

	//Add Upgrade Button via localized script
	wp_localize_script( 'create_customizer_custom', 'create_misc_links', $create_misc_links );

	wp_enqueue_script( 'create_customizer_custom' );

	wp_enqueue_style( 'create_customizer_custom', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_print_footer_scripts', 'create_customize_scripts' );

/**
 * Sanitizes page in slider
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Create 1.2
 */
function create_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
    else {
    	return '';
    }
}

/**
 * Sanitizes slider number
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Create 1.2
 */
function create_sanitize_no_of_slider( $input ) {
	if ( absint( $input ) > 20 ) {
    	return 20;
    } 
    else {
    	return absint( $input );
    }
}

/**
 * Sanitizes feature slider transition effects
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Create 1.2
 */
function create_sanitize_featured_slide_transition_effects( $input ) {
	$create_featured_slide_transition_effects = array_keys( create_featured_slide_transition_effects() );
	
	if ( in_array( $input, $create_featured_slide_transition_effects ) ) {
		return $input;
	}
	else {
		$defaults = create_get_default_theme_options();

		return $defaults['featured_slide_transition_effect'];
	}
}