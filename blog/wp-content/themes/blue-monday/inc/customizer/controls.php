<?php 

/**
 * Customizer settings
 *
 * @package blue-monday
 */

if ( ! function_exists( 'blue_monday_theme_customizer' ) ) :
  function blue_monday_theme_customizer( $wp_customize ) {

    /* Homepage Sections */
    $wp_customize->add_section( 'blue_monday_homepage' , array(
      'title'       => __( 'Homepage Banner and Blog Content', 'blue-monday' ),
      'priority'    => 30,
      'description' => __( 'Select a page to be assigned for each section', 'blue-monday' ),
    ) );

    $wp_customize->add_setting( 'blue_monday_banner', array (
      'sanitize_callback' => 'blue_monday_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_monday_banner', array(
      'label'    => __( 'Banner', 'blue-monday' ),
      'section'  => 'blue_monday_homepage',
      'settings' => 'blue_monday_banner',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'blue_monday_blog', array (
      'sanitize_callback' => 'blue_monday_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_monday_blog', array(
      'label'    => __( 'Blog', 'blue-monday' ),
      'section'  => 'blue_monday_homepage',
      'settings' => 'blue_monday_blog',
      'type'     => 'dropdown-pages'
    ) ) );


    
    /* color scheme option */
    $wp_customize->add_setting( 'blue_monday_color_settings', array (
      'default' => '#9dca3b',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_monday_color_settings', array(
      'label'    => __( 'Accent Color', 'blue-monday' ),
      'section'  => 'colors',
      'settings' => 'blue_monday_color_settings',
    ) ) );
  
  }
endif;
add_action('customize_register', 'blue_monday_theme_customizer');


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'blue_monday_sanitize_checkbox' ) ) :
  function blue_monday_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
      return 1;
    } else {
      return '';
    }
  }
endif;

/**
 * Sanitize text field html
 */
if ( ! function_exists( 'blue_monday_sanitize_field_html' ) ) :
  function blue_monday_sanitize_field_html( $str ) {
    $allowed_html = array(
    'a' => array(
    'href' => array(),
    ),
    'br' => array(),
    'span' => array(),
    );
    $str = wp_kses( $str, $allowed_html );
    return $str;
  }
endif;

if ( ! function_exists( 'blue_monday_sanitize_dropdown_pages' ) ) :
  function blue_monday_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
  }
endif;