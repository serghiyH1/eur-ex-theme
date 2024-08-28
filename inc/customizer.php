<?php
/**
 * eurex Theme Customizer
 *
 * @package eurex
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eur_ex_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'eur_ex_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'eur_ex_customize_partial_blogdescription',
			)
		);
	}

    // Contacts Widget Settings
    $wp_customize->add_panel( 'contacts_panel', array(
        'title' => __( 'Contacts Widget', 'eur_ex' ),
        'priority' => 105, // Before Widgets.
    ));
    // Header Contacts
    $wp_customize->add_section( 'contacts_section', array(
        'title' => __( 'Contact links', 'eur_ex' ),
        'priority' => 105, // Before Widgets.
        'panel'	=> 'contacts_panel',
    ));
    // Address #1
    $wp_customize->add_setting( 'address', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add address', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address', array(
        'type'       => 'textarea',
        'label'      => __( 'Adress 1', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'address',
    )));
    // Address #2
    $wp_customize->add_setting( 'address2', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add address 2', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address2', array(
        'type'       => 'textarea',
        'label'      => __( 'Adress 2', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'address2',
    )));
    // Phone #1
    $wp_customize->add_setting( 'phone_number', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add phone number', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone', array(
        'type'       => 'text',
        'label'      => __( 'Phone number 1', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'phone_number',
    )));
    $wp_customize->add_setting( 'phone_descriptor', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add phone description, ex: "sales"', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_desc', array(
        'type'       => 'text',
        'label'      => __( 'Phone 1 description', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'phone_descriptor',
    )));
    // Phone #2
    $wp_customize->add_setting( 'phone_number_2', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add phone number', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_2', array(
        'type'       => 'text',
        'label'      => __( 'Phone number 2', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'phone_number_2',
    )));
    $wp_customize->add_setting( 'phone_descriptor_2', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add phone description, ex: "sales"', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_desc_2', array(
        'type'       => 'text',
        'label'      => __( 'Phone 2 description', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'phone_descriptor_2',
    )));
    // Email
    $wp_customize->add_setting( 'contacts_e_mail', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add e-mail', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'e_mail', array(
        'type'       => 'text',
        'label'      => __( 'Email', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'contacts_e_mail',
    )));
    // Facebook
    $wp_customize->add_setting( 'facebook_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add Facebook link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
        'type'		 => 'text',
        'label'      => __( 'Facebook link', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'facebook_link',
    )));
    // Instagram
    $wp_customize->add_setting( 'instagram_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add Instagram link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
        'type'		 => 'text',
        'label'      => __( 'Instagram link', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'instagram_link',
    )));
    // WhatsApp
    $wp_customize->add_setting( 'whatsapp_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add WhatsApp link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'whatsapp', array(
        'type'		 => 'text',
        'label'      => __( 'WhatsApp link', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'whatsapp_link',
    )));
    // Viber
    $wp_customize->add_setting( 'viber_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add viber link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'viber', array(
        'type'		 => 'text',
        'label'      => __( 'Viber link', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'viber_link',
    )));
    // Telegram
    $wp_customize->add_setting( 'telegram_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add Telegram link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'telegram', array(
        'type'		 => 'text',
        'label'      => __( 'Telegram link', 'eur_ex' ),
        'section'    => 'contacts_section',
        'settings'   => 'telegram_link',
    )));

    // Contacts Form
    $wp_customize->add_section( 'contacts_form_section', array(
        'title' => __( 'Contact Form', 'eur_ex' ),
        'priority' => 106, // Before Widgets.
        'panel'	=> 'contacts_panel',
    ));
    // Form Title
    $wp_customize->add_setting( 'form_title', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add form Title', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'form_title_control', array(
        'type'			 => 'text',
        'label'      => __( 'Form Title', 'eur_ex' ),
        'section'    => 'contacts_form_section',
        'settings'   => 'form_title',
    )));
    // Form Shortcode
    $wp_customize->add_setting( 'form_shortcode', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add form shortcode', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'form_shortcode_control', array(
        'type'			 => 'text',
        'label'      => __( 'Form Shortcode', 'eur_ex' ),
        'section'    => 'contacts_form_section',
        'settings'   => 'form_shortcode',
    )));
    // Form Content
    $wp_customize->add_setting( 'form_content', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add content (text)', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'form_content_control', array(
        'type'			 => 'textarea',
        'label'      => __( 'Form description (text for users)', 'eur_ex' ),
        'section'    => 'contacts_form_section',
        'settings'   => 'form_content',
    )));

    // FOOTER
    $wp_customize->add_panel( 'footer', array(
        'title' => __( 'Footer', 'eur_ex' ),
        'priority' => 105, // Before Widgets.
    ));
    // Copyright section
    $wp_customize->add_section( 'copyright_section', array(
        'title' => __( 'Copyright', 'eur_ex' ),
        'priority' => 105, // Before Widgets.
        'panel'	=> 'footer',
    ));
    $wp_customize->add_setting( 'copyright_info_start_year', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add start-year of this site', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_setting( 'copyright_info', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add Copyright info', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_setting( 'copyright_info_line_2', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Add Copyright info 2-nd line | address', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright_info_start_year', array(
        'label'      => __( 'Copyright Start Year Info', 'eur_ex' ),
        'section'    => 'copyright_section',
        'settings'   => 'copyright_info_start_year',
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright_info_control', array(
        'type'		 => 'textarea',
        'label'      => __( 'Copyright Info Text', 'eur_ex' ),
        'section'    => 'copyright_section',
        'settings'   => 'copyright_info',
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright_info_control_line_2', array(
        'type'		 => 'textarea',
        'label'      => __( 'Copyright Info Text | Address', 'eur_ex' ),
        'section'    => 'copyright_section',
        'settings'   => 'copyright_info_line_2',
    )));

    // Footer links
    // Copyright section
    $wp_customize->add_section( 'footer_links_section', array(
        'title' => __( 'Footer Links', 'eur_ex' ),
        'priority' => 106, // Before Widgets.
        'panel'	=> 'footer',
    ));
    // Terms of service Link
    $wp_customize->add_setting( 'footer_terms_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Footer terms link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_terms_link_control', array(
        'type'		 => 'textarea',
        'label'      => __( 'Footer terms link', 'eur_ex' ),
        'section'    => 'footer_links_section',
        'settings'   => 'footer_terms_link',
    )));
    // Footer terms text
    $wp_customize->add_setting( 'footer_terms_text', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Footer terms text', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_terms_text_control', array(
        'type'		 => 'textarea',
        'label'      => __( 'Footer terms text', 'eur_ex' ),
        'section'    => 'footer_links_section',
        'settings'   => 'footer_terms_text',
    )));
    // Politics Link
    $wp_customize->add_setting( 'footer_politics_link', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Footer politics link', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_politics_link_control', array(
        'type'		 => 'textarea',
        'label'      => __( 'Footer politics link', 'eur_ex' ),
        'section'    => 'footer_links_section',
        'settings'   => 'footer_politics_link',
    )));
    // Footer politics text
    $wp_customize->add_setting( 'footer_politics_text', array(
        'type' => 'theme_mod', // or 'option'
        'description' => __( 'Footer politics text', 'eur_ex' ),
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_politics_text_control', array(
        'type'		 => 'textarea',
        'label'      => __( 'Footer politics text', 'eur_ex' ),
        'section'    => 'footer_links_section',
        'settings'   => 'footer_politics_text',
    )));
}
add_action( 'customize_register', 'eur_ex_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function eur_ex_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function eur_ex_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eur_ex_customize_preview_js() {
	wp_enqueue_script( 'eur_ex-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'eur_ex_customize_preview_js' );
