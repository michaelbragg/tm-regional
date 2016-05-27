<?php
/**
 * tm-regional functions and definitions
 *
 * @package tm-regional
 */

if ( ! function_exists( 'tm_regional_setup' ) ) :

	$function_includes = [
	'lib/helper.php',    // Helper functions
	'lib/assets.php',    // Scripts and stylesheets
	];

	foreach ( $function_includes as $file ) {
		if ( ! $filepath = locate_template( $file ) ) {
			trigger_error( sprintf( __( 'Error locating %s for inclusion', 'tm-regional' ), $file ), E_USER_ERROR );
		}
		require_once $filepath;
	}

	unset( $file, $filepath );

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

function the_slug($echo=true){
	$slug = basename( get_permalink() );
	do_action( 'before_slug', $slug );
	$slug = apply_filters( 'slug_filter', $slug );
	if ( $echo ) { echo $slug; }
	do_action( 'after_slug', $slug );
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
add_action( 'wp_head', 'add_ie_html5_shim' );
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
add_action( 'wp_head', 'add_ie_respond' );
