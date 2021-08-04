<?php
/**
 * Digital Agency Lite Theme Customizer
 *
 * @package Digital Agency Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function digital_agency_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'digital_agency_lite_custom_controls' );

function digital_agency_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'digital_agency_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'digital-agency-lite' ),
	) );

	// Layout
	$wp_customize->add_section( 'digital_agency_lite_left_right', array(
    	'title'      => __( 'General Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_panel_id'
	) );

	$wp_customize->add_setting('digital_agency_lite_theme_options',array(
        'default' => __('Right Sidebar','digital-agency-lite'),
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','digital-agency-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-agency-lite'),
            'Right Sidebar' => __('Right Sidebar','digital-agency-lite'),
            'One Column' => __('One Column','digital-agency-lite'),
            'Three Columns' => __('Three Columns','digital-agency-lite'),
            'Four Columns' => __('Four Columns','digital-agency-lite'),
            'Grid Layout' => __('Grid Layout','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting('digital_agency_lite_page_layout',array(
        'default' => __('One Column','digital-agency-lite'),
        'sanitize_callback' => 'digital_agency_lite_sanitize_choices'
	));
	$wp_customize->add_control('digital_agency_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','digital-agency-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','digital-agency-lite'),
        'section' => 'digital_agency_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-agency-lite'),
            'Right Sidebar' => __('Right Sidebar','digital-agency-lite'),
            'One Column' => __('One Column','digital-agency-lite')
        ),
	) );

	$wp_customize->add_setting( 'digital_agency_lite_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new digital_agency_lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_left_right'
    )));
    
	//Slider
	$wp_customize->add_section( 'digital_agency_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'digital-agency-lite' ),
		'panel' => 'digital_agency_lite_panel_id'
	) );

	$wp_customize->add_setting( 'digital_agency_lite_slider_arrows',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new digital_agency_lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'digital_agency_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'digital_agency_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'digital_agency_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'digital-agency-lite' ),
			'description' => __('Slider image size (435 x 435)','digital-agency-lite'),
			'section'  => 'digital_agency_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
 
	//Services
	$wp_customize->add_section('digital_agency_lite_services',array(
		'title'	=> __('Services Section','digital-agency-lite'),
		'panel' => 'digital_agency_lite_panel_id',
	));

	$wp_customize->add_setting('digital_agency_lite_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_section_title',array(
		'label'	=> __('Section Title','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'OUR SERVICES', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_agency_lite_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_section_text',array(
		'label'	=> __('Section Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_services',
		'type'=> 'text'
	));	

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('digital_agency_lite_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'digital_agency_lite_sanitize_select',
	));
	$wp_customize->add_control('digital_agency_lite_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','digital-agency-lite'),
		'section' => 'digital_agency_lite_services',
	));

	//Content Craetion
	$wp_customize->add_section( 'digital_agency_lite_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'digital-agency-lite' ),
		'priority' => null,
		'panel' => 'digital_agency_lite_panel_id'
	) );

	$wp_customize->add_setting('digital_agency_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new digital_agency_lite_Content_Creation( $wp_customize, 'digital_agency_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','digital-agency-lite' ),
		),
		'section' => 'digital_agency_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'digital-agency-lite' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('digital_agency_lite_footer',array(
		'title'	=> __('Footer Settings','digital-agency-lite'),
		'panel' => 'digital_agency_lite_panel_id',
	));	
	
	$wp_customize->add_setting('digital_agency_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_agency_lite_footer_text',array(
		'label'	=> __('Copyright Text','digital-agency-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'digital-agency-lite' ),
        ),
		'section'=> 'digital_agency_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'digital_agency_lite_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'digital_agency_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new digital_agency_lite_Toggle_Switch_Custom_Control( $wp_customize, 'digital_agency_lite_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','digital-agency-lite' ),
      	'section' => 'digital_agency_lite_footer'
    )));
}

add_action( 'customize_register', 'digital_agency_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class digital_agency_lite_Customize {

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
		$manager->register_section_type( 'digital_agency_lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new digital_agency_lite_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 9,
			'title'    => esc_html__( 'Digital Agency Pro', 'digital-agency-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'digital-agency-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/digital-marketing-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'digital-agency-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'digital-agency-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
digital_agency_lite_Customize::get_instance();