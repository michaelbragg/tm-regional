<?php

/**
 * Enqueue scripts.
 */
function tm_regional_scripts() {

 global $wp_styles;

  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700' );

  wp_enqueue_style( 'bootstrap-styles', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array('google-fonts'), '3.3.5', 'screen' );

  wp_enqueue_style( 'tm-regional-style', get_stylesheet_uri(), array('bootstrap-styles','google-fonts') );

  wp_register_script('tm-regional-grid-system', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), '20150424', true);

  wp_enqueue_script( 'tm-regional-grid-system' );

  wp_enqueue_script( 'tm-regional-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  wp_enqueue_script( 'tm-regional-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  if ( is_front_page() && get_theme_mod( 'front-page-video' ) ){
    wp_enqueue_script( 'tm-regional-fitvids', get_template_directory_uri() . '/js/libs/jquery.fitvids.js', array('jquery'), '1.1.0', true );
    enqueue_inline_script('tm-regional-fitvids-home',';(function( $ ){$(document).ready(function(){$(".js-fitvid").fitVids();});})( window.jQuery || window.Zepto );', array( 'jquery', 'tm-regional-fitvids' ) );

    // Load YouTube API
    wp_enqueue_script( 'youtube-api', '//www.youtube.com/player_api', array(), false, true );
    enqueue_inline_script('tm-regional-youtube-api',';var player;function onYouTubePlayerAPIReady() {player = new YT.Player("player");}', array( 'youtube-api' ) );
  }

}
add_action( 'wp_enqueue_scripts', 'tm_regional_scripts', 100 );

/**
 * Dequeue scripts.
 */

function tm_regional_dequeue_scripts()  {
  wp_dequeue_script( 'contact-form-7' );
  wp_dequeue_script( 'visualizer-pointer' );
}

add_action('wp_print_scripts', 'tm_regional_dequeue_scripts', 100);

/**
 * Dequeue styles.
 */

function tm_regional_dequeue_styles()  {
  wp_dequeue_style( 'tablepress-default' );
  wp_dequeue_style( 'testimonial-rotator-style' );
  wp_dequeue_style( 'font-awesome' );
}

add_action('wp_print_styles', 'tm_regional_dequeue_styles', 100);

/**
 * Register Scripts
 */

/* Page Pilling */
wp_register_script(
  'tm-regional-pagepiling',
  get_template_directory_uri() . '/js/libs/jquery.pagepiling.min.js',
   array('jquery'),
   '20150724',
   true
);

/* Product Preview */
wp_register_script(
  'tm-regional-productPreview',
  get_template_directory_uri() . '/js/jquery.products-preview.js',
   array('jquery'),
   '20140710',
   true
);

/* Contact Form 7 */
wp_register_script(
  'tm-regional-tabs',
  get_template_directory_uri() . '/js/libs/jquery.easytabs.js',
  array('jquery'),
  '20150724',
  true
);

/**
 * Enqueue Scripts for Front Page
 */

function tm_regional_load_front_page(){
  if( is_front_page() ){
    // Scripts to be loaded on the front page
    wp_enqueue_script( 'tm-regional-pagepiling' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_front_page',
  100
);

/**
 * Enqueue Scripts for Brands Post Type
 */

function tm_regional_load_brands_cpt(){
  //global $page;
  if( is_post_type_archive('brands') ){
    // Scripts to be loaded on the front page
    wp_enqueue_script( 'tm-regional-productPreview' );
    wp_enqueue_script( 'tm-regional-tabs' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_brands_cpt',
  100
);

/**
 * Enqueue Scripts for Solutions Post Type
 */

function tm_regional_load_solutions_cpt(){
  //global $page;
  if( 'solutions' == get_post_type() ){
    // Scripts to be loaded on the solutions post type
    wp_enqueue_script( 'tm-regional-productPreview' );
    wp_enqueue_script( 'tm-regional-tabs' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_solutions_cpt',
  100
);

/**
 * Enqueue Scripts for Audiences Post Type
 */

function tm_regional_load_audiences_cpt(){
  //global $page;
  if( 'audiences' == get_post_type() ){
    // Scripts to be loaded on the audiences post type
    wp_enqueue_script( 'tm-regional-tabs' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_audiences_cpt',
  100
);

/**
 * Enqueue Scripts for Rates Post Type
 */

function tm_regional_load_rates_cpt(){
  //global $page;
  if( 'rates' == get_post_type() ){
    // Scripts to be loaded on the rates post type
    wp_enqueue_script( 'tm-regional-tabs' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_rates_cpt',
  100
);

/**
 * Enqueue Scripts for Contact Page
 */

function tm_regional_load_contact_cpt(){
  //global $page;
  if( 'contact' == get_post_type() ){
    // Scripts to be loaded on the contact post type
    wp_enqueue_script( 'jquery-form' );
    wp_enqueue_script( 'tm-regional-tabs' );
  }
}

add_action(
  'wp_enqueue_scripts',
  'tm_regional_load_contact_cpt',
  100
);

/**
 * Dequeue scripts if is not front page
 */
function tm_regional_exclude_contact(){
  //global $page;
  if( ! is_post_type( 'contact' ) ){
    // Scripts to be dequeue if not on the front page
    wp_dequeue_style( 'contact-form-7' );
  }
}

add_action(
  'wp_print_styles',
  'tm_regional_exclude_contact',
  100
);

/**
 * Dequeue scripts if is not front page
 */
function tm_regional_exclude_front_page(){
  //global $page;
  if( ! is_front_page() ){
    // Scripts to be dequeue if not on the front page
    wp_dequeue_script( 'cycletwo' );
    wp_dequeue_script( 'cycletwo-addons' );
  }
}

add_action(
  'wp_print_scripts',
  'tm_regional_exclude_front_page',
  100
);
