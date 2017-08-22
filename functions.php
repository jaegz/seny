<?php
/**
 * safetyexecsny functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package safetyexecsny
 */

if ( ! function_exists( 'safetyexecsny_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function safetyexecsny_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on safetyexecsny, use a find and replace
	 * to change 'safetyexecsny' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'safetyexecsny', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'safetyexecsny' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'safetyexecsny_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'safetyexecsny_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function safetyexecsny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'safetyexecsny_content_width', 640 );
}
add_action( 'after_setup_theme', 'safetyexecsny_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function safetyexecsny_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'safetyexecsny' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'safetyexecsny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'safetyexecsny_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function safetyexecsny_scripts() {
	wp_enqueue_style( 'safetyexecsny-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_script( 'safetyexecsny-jquery', get_template_directory_uri() . '/scripts/vendor/jquery.min.js', array(), '20170819', true );	
	wp_enqueue_script( 'safetyexecsny-dropotron', get_template_directory_uri() . '/scripts/vendor/jquery.dropotron.min.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-scrollress', get_template_directory_uri() . '/scripts/vendor/jquery.scrollgress.min.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-skel', get_template_directory_uri() . '/scripts/vendor/skel.min.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-util', get_template_directory_uri() . '/scripts/vendor/util.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-main', get_template_directory_uri() . '/scripts/custom/main.js', array(), '20170819', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'safetyexecsny_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');