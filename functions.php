<?php
/**
 * tm-regional functions and definitions
 *
 * @package tm-regional
 */

if ( ! function_exists( 'tm_regional_setup' ) ) :

/**
 * Enqueue inline Javascript. @see wp_enqueue_script().
 *
 * KNOWN BUG: Inline scripts cannot be enqueued before
 *  any inline scripts it depends on, (unless they are
 *  placed in header, and the dependant in footer).
 *
 * @param string      $handle    Identifying name for script
 * @param string      $src       The JavaScript code
 * @param array       $deps      (optional) Array of script names on which this script depends
 * @param bool        $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 *
 * @return null
 */
function enqueue_inline_script( $handle, $js, $deps = array(), $in_footer = false ){
    // Callback for printing inline script.
    $cb = function()use( $handle, $js ){
        // Ensure script is only included once.
        if( wp_script_is( $handle, 'done' ) )
            return;
        // Print script & mark it as included.
        echo "<script type=\"text/javascript\" id=\"js-$handle\">\n$js\n</script>\n";
        global $wp_scripts;
        $wp_scripts->done[] = $handle;
    };
    // (`wp_print_scripts` is called in header and footer, but $cb has re-inclusion protection.)
    $hook = $in_footer ? 'wp_print_footer_scripts' : 'wp_print_scripts';

    // If no dependencies, simply hook into header or footer.
    if( empty($deps)){
        add_action( $hook, $cb );
        return;
    }

    // Delay printing script until all dependencies have been included.
    $cb_maybe = function()use( $deps, $in_footer, $cb, &$cb_maybe ){
        foreach( $deps as &$dep ){
            if( !wp_script_is( $dep, 'done' ) ){
                // Dependencies not included in head, try again in footer.
                if( ! $in_footer ){
                    add_action( 'wp_print_footer_scripts', $cb_maybe, 11 );
                }
                else{
                    // Dependencies were not included in `wp_head` or `wp_footer`.
                }
                return;
            }
        }
        call_user_func( $cb );
    };
    add_action( $hook, $cb_maybe, 0 );
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tm_regional_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tm-regional, use a find and replace
	 * to change 'tm-regional' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tm-regional', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'tm-regional' ),
		'footer' => esc_html__( 'Footer Menu', 'tm-regional' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // tm_regional_setup
add_action( 'after_setup_theme', 'tm_regional_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tm_regional_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tm_regional_content_width', 640 );
}
add_action( 'after_setup_theme', 'tm_regional_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tm_regional_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tm-regional' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tm_regional_widgets_init' );

/**
 * Module
 * Render the selected Module to the page
 */
function module($module, $options = null){
	include "modules/{$module}.php";
}

/**
 * Enqueue scripts and styles.
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

	wp_enqueue_script( 'tm-regional-pagepiling', get_template_directory_uri() . '/js/libs/jquery.pagepiling.min.js', array('jquery'), '20150724', true );

	wp_enqueue_script( 'tm-regional-tabs', get_template_directory_uri() . '/js/libs/jquery.easytabs.js', array('jquery'), '20150724', true );

	wp_enqueue_script( 'tm-regional-brands-preview', get_template_directory_uri() . '/js/jquery.products-preview.js', array('jquery'), '20150724', true );

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

/*Add Google Fonts */

function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


/*remove scripts */

function tmregional_dequeue_css_from_plugins()  {
	wp_dequeue_style( "tablepress-default" );
}

add_action('wp_print_styles', 'tmregional_dequeue_css_from_plugins', 100);
/**
 * Custom scripts
 */

  function regional_theme_scripts_products() {
  global $page;
  if( $page == 'brands' || is_post_type_archive('brands') ) {

    wp_enqueue_script( 'tm-regional-productPreview', get_template_directory_uri() . '/js/jquery.products-preview.js', array('jquery'), '20140710', true );


  }
}

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

/**
 * Custom media sizes to be generated
 */

require get_template_directory() . '/inc/media.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// add ie conditional html5 shim to header
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');
/**
 * Respond
 * A fast & lightweight polyfill for min/max-width CSS3 Media Queries
 * (for IE 6-8, and more).
 */
// add ie conditional respond to header
function add_ie_respond () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"</script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_respond');

/**
 * Dequeue visualizer pointer.
 *
 * Remove JavaScript for visualizer's pointers
 * Temp fix for causing problems on production server
 */
function visualizer_dequeue_script() {
   wp_dequeue_script( 'visualizer-pointer' );
}
add_action( 'wp_print_scripts', 'visualizer_dequeue_script', 100 );

/**
 * Dequeue Testimonial Rotator stlye.
 *
 * Remove CSS as it is loaded in before our styles
 * and overwrites them causing layout issues.
 */
function testimonial_rotator_dequeue_styles() {
   wp_dequeue_style( 'testimonial-rotator-style' );
}
add_action( 'wp_enqueue_scripts', 'testimonial_rotator_dequeue_styles', 100 );
