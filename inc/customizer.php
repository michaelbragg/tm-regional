<?php
/**
 * tm-regional Theme Customizer
 *
 * @package tm-regional
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tm_regional_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


  // Add Front Page section
  $wp_customize->add_section( 'front-page' , array(
    'title' => __( 'Front Page', 'tm-regional' ),
    'priority' => 30,
    'description' => __( 'Add copy for the front page of the site.', 'tm-regional' )
  ) );

  // Add Title
  $wp_customize->add_setting( 'fp-title' ,
    array(
    'default' => '',
    'sanitize_callback' => 'basic_html_sanitize_text',
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fp-title', array(
    'label' => __( 'Title', 'tm-regional' ),
    'section' => 'front-page',
    'settings' => 'fp-title',
  ) ) );

  $wp_customize->get_setting( 'fp-title' )->transport = 'postMessage';

// Page 2 Title
  $wp_customize->add_setting( 'fp2-title' ,
    array(
    'default' => __( 'Simple advertising solutions', 'tm-regional' ),
    'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fp2-title', array(
    'label' => __( 'Page 2: Title', 'tm-regional' ),
    'section' => 'front-page',
    'settings' => 'fp2-title',
  ) ) );

  $wp_customize->get_setting( 'fp2-title' )->transport = 'postMessage';

// Page 2 Text
  $wp_customize->add_setting('fp2-text', array(
   'default'        => '',
   ));
  $wp_customize->add_control('fp2-text', array(
   'label'   => __( 'Page 2: Text', 'tm-regional' ),
    'section' => 'front-page',
   'type'    => 'textarea',
  ));

  $wp_customize->get_setting( 'fp2-text' )->transport = 'postMessage';


//  Page 2 Button
  $wp_customize->add_setting( 'fp2-button-text' ,
    array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fp2-button-text', array(
    'label' => __( 'Page 2: Button Text', 'tm-regional' ),
    'section' => 'front-page',
    'settings' => 'fp2-button-text',
  ) ) );

  $wp_customize->get_setting( 'fp2-button-text' )->transport = 'postMessage';

  $wp_customize->add_setting( 'fp2-button-url' ,
    array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fp2-button-url', array(
    'label' => __( 'Page 2: Button URL', 'tm-regional' ),
    'section' => 'front-page',
    'settings' => 'fp2-button-url',
  ) ) );

  $wp_customize->get_setting( 'fp2-button-url' )->transport = 'postMessage';

 // Pulses

  // 1
  $wp_customize->add_setting('fp2-pulse-1', array(
   'default'        => '',
   ));
  $wp_customize->add_control('fp2-pulse-1', array(
   'label'   => __( 'Page 2: Pulse 1', 'tm-regional' ),
    'section' => 'front-page',
   'type'    => 'textarea',
  ));

  $wp_customize->get_setting( 'fp2-pulse-1' )->transport = 'postMessage';

  // 2
  $wp_customize->add_setting('fp2-pulse-2', array(
   'default'        => '',
   ));
  $wp_customize->add_control('fp2-pulse-2', array(
   'label'   => __( 'Page 2: Pulse 2', 'tm-regional' ),
    'section' => 'front-page',
   'type'    => 'textarea',
  ));

  $wp_customize->get_setting( 'fp2-pulse-2' )->transport = 'postMessage';

  // 3
  $wp_customize->add_setting('fp2-pulse-3', array(
   'default'        => '',
   ));
  $wp_customize->add_control('fp2-pulse-3', array(
   'label'   => __( 'Page 2: Pulse 3', 'tm-regional' ),
    'section' => 'front-page',
   'type'    => 'textarea',
  ));

  $wp_customize->get_setting( 'fp2-pulse-3' )->transport = 'postMessage';

  // 4
  $wp_customize->add_setting('fp2-pulse-4', array(
   'default'        => '',
   ));
  $wp_customize->add_control('fp2-pulse-4', array(
   'label'   => __( 'Page 2: Pulse 4', 'tm-regional' ),
    'section' => 'front-page',
   'type'    => 'textarea',
  ));

  $wp_customize->get_setting( 'fp2-pulse-4' )->transport = 'postMessage';

  // Case Studies Rotator
  $wp_customize->add_setting( 'case-study-id' ,
    array(
    'default' => ''
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'case-study-id', array(
    'label' => __( 'Case Study: ID', 'tm-regional' ),
    'section' => 'front-page',
    'settings' => 'case-study-id'
  ) ) );

  $wp_customize->get_setting( 'case-study-id' )->transport = 'postMessage';

  // Add Video
  $wp_customize->add_setting('front-page-video');

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize, 'front-page-video',
      array(
        'label'      => __('Video', 'tm-regional'),
        'description' => __('Add the YouTube id of your video.', 'tm-regional'),
        'section' => 'front-page',
        'settings' => 'front-page-video'
      )
    )
  );

}
add_action( 'customize_register', 'tm_regional_customize_register' );

/**
 * Custom data sanitizer
 */

function basic_html_sanitize_text( $input ) {
    return wp_kses( $input,
      array(
        'strong' => array(),
        'em' => array(),
        'abbr' => array(
          'title' => array()
        ),
        'br' => array()
      )
    );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tm_regional_customize_preview_js() {
	wp_enqueue_script( 'tm_regional_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tm_regional_customize_preview_js' );


