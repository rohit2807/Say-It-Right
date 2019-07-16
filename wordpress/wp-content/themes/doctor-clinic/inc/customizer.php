<?php
/**
 * doctor-clinic: Customizer
 *
 * @package WordPress
 * @subpackage doctor-clinic
 * @since 1.0
 */

function doctor_clinic_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'doctor_clinic_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'doctor-clinic' ),
	) );

	$wp_customize->add_section( 'doctor_clinic_theme_options_section', array(
    	'title'      => __( 'General Settings', 'doctor-clinic' ),
		'priority'   => 30,
		'panel' => 'doctor_clinic_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('doctor_clinic_theme_options',array(
        'default' => __('Right Sidebar','doctor-clinic'),
        'sanitize_callback' => 'doctor_clinic_sanitize_choices'	        
	));

	$wp_customize->add_control('doctor_clinic_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','doctor-clinic'),
        'section' => 'doctor_clinic_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','doctor-clinic'),
            'Right Sidebar' => __('Right Sidebar','doctor-clinic'),
            'One Column' => __('One Column','doctor-clinic'),
            'Three Columns' => __('Three Columns','doctor-clinic'),
            'Four Columns' => __('Four Columns','doctor-clinic'),
            'Grid Layout' => __('Grid Layout','doctor-clinic')
        ),
	));

	// Top Bar
	$wp_customize->add_section( 'doctor_clinic_contact_details', array(
    	'title'      => __( 'Top Bar', 'doctor-clinic' ),
		'priority'   => null,
		'panel' => 'doctor_clinic_panel_id'
	) );

	$wp_customize->add_setting('doctor_clinic_call1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('doctor_clinic_call1',array(
		'label'	=> __('Phone Number','doctor-clinic'),
		'section'=> 'doctor_clinic_contact_details',
		'setting'=> 'doctor_clinic_call1',
		'type'=> 'text'
	));

	$wp_customize->add_setting('doctor_clinic_email1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('doctor_clinic_email1',array(
		'label'	=> __('Email Address','doctor-clinic'),
		'section'=> 'doctor_clinic_contact_details',
		'setting'=> 'doctor_clinic_email1',
		'type'=> 'text'
	));

	$wp_customize->add_setting('doctor_clinic_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('doctor_clinic_btn_text',array(
		'label'	=> __('Add Button Text','doctor-clinic'),
		'section'	=> 'doctor_clinic_contact_details',
		'setting'	=> 'doctor_clinic_btn_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('doctor_clinic_btn_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('doctor_clinic_btn_link',array(
		'label'	=> __('Add Button Link','doctor-clinic'),
		'section'	=> 'doctor_clinic_contact_details',
		'setting'	=> 'doctor_clinic_btn_link',
		'type'	=> 'url'
	));

	//social icons
	$wp_customize->add_section( 'doctor_clinic_social', array(
    	'title'      => __( 'Social Icons', 'doctor-clinic' ),
		'priority'   => null,
		'panel' => 'doctor_clinic_panel_id'
	) );

	$wp_customize->add_setting('doctor_clinic_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('doctor_clinic_facebook_url',array(
		'label'	=> __('Add Facebook link','doctor-clinic'),
		'section'	=> 'doctor_clinic_social',
		'setting'	=> 'doctor_clinic_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('doctor_clinic_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('doctor_clinic_twitter_url',array(
		'label'	=> __('Add Twitter link','doctor-clinic'),
		'section'	=> 'doctor_clinic_social',
		'setting'	=> 'doctor_clinic_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('doctor_clinic_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('doctor_clinic_insta_url',array(
		'label'	=> __('Add Instagram link','doctor-clinic'),
		'section'	=> 'doctor_clinic_social',
		'setting'	=> 'doctor_clinic_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('doctor_clinic_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('doctor_clinic_linkedin_url',array(
		'label'	=> __('Add Linkedin link','doctor-clinic'),
		'section'	=> 'doctor_clinic_social',
		'setting'	=> 'doctor_clinic_linkedin_url',
		'type'	=> 'url'
	));
	
	//home page slider
	$wp_customize->add_section( 'doctor_clinic_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'doctor-clinic' ),
		'priority'   => null,
		'panel' => 'doctor_clinic_panel_id'
	) );

	$wp_customize->add_setting('doctor_clinic_slider_hide_show',array(
       	'default' => 'true',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('doctor_clinic_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','doctor-clinic'),
	   	'description' => __('Image Size ( 1600px x 582px )','doctor-clinic'),
	   	'section' => 'doctor_clinic_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'doctor_clinic_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'doctor_clinic_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'doctor_clinic_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'doctor-clinic' ),
			'section'  => 'doctor_clinic_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//Why Choose Us
	$wp_customize->add_section('doctor_clinic_choose_us',array(
		'title'	=> __('Why Choose Us','doctor-clinic'),
		'description'	=> __('Add content here.','doctor-clinic'),
		'panel' => 'doctor_clinic_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$psts[]='Select';  
	foreach($post_list as $post){
		$psts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('doctor_clinic_post',array(
		'sanitize_callback' => 'doctor_clinic_sanitize_choices',
	));
	$wp_customize->add_control('doctor_clinic_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select post','doctor-clinic'),
		'section' => 'doctor_clinic_choose_us',
	));

	//Footer
    $wp_customize->add_section( 'doctor_clinic_footer', array(
    	'title'      => __( 'Footer Text', 'doctor-clinic' ),
		'priority'   => null,
		'panel' => 'doctor_clinic_panel_id'
	) );

    $wp_customize->add_setting('doctor_clinic_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('doctor_clinic_footer_copy',array(
		'label'	=> __('Footer Text','doctor-clinic'),
		'section'	=> 'doctor_clinic_footer',
		'setting'	=> 'doctor_clinic_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'doctor_clinic_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'doctor_clinic_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'doctor_clinic_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'doctor_clinic_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'doctor-clinic' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'doctor-clinic' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'doctor_clinic_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'doctor_clinic_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'doctor_clinic_customize_register' );

function doctor_clinic_customize_partial_blogname() {
	bloginfo( 'name' );
}

function doctor_clinic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function doctor_clinic_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function doctor_clinic_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Doctor_Clinic_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Doctor_Clinic_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Doctor_Clinic_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Doctor Clinic Pro', 'doctor-clinic' ),
					'pro_text' => esc_html__( 'Go Pro','doctor-clinic' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/clinic-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'doctor-clinic-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'doctor-clinic-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Doctor_Clinic_Customize::get_instance();