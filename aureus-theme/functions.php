<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Aureus Global Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aureus_Global
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function aureus_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 * Rank Math relies on this to inject SEO titles correctly.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'aureus' ),
			'footer-1' => esc_html__( 'Footer Col 1 - Hệ Sinh Thái', 'aureus' ),
			'footer-2' => esc_html__( 'Footer Col 2 - Công nghệ', 'aureus' ),
			'footer-3' => esc_html__( 'Footer Col 3 - Đầu tư', 'aureus' ),
			'footer-4' => esc_html__( 'Footer Col 4 - Quan hệ Cổ đông', 'aureus' ),
			'footer-5' => esc_html__( 'Footer Col 5 - Về Chúng Tôi', 'aureus' ),
			'footer-6' => esc_html__( 'Footer Col 6 - Tuyển dụng', 'aureus' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Custom Logo Support
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
add_action( 'after_setup_theme', 'aureus_setup' );

/**
 * Enqueue scripts and styles.
 */
function aureus_scripts() {
    // Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );

    // TailwindCSS via CDN (as per original HTML, though compiling locally is better for prod)
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false );

    // jQuery
    wp_enqueue_script( 'jquery-slim', 'https://code.jquery.com/jquery-3.7.1.slim.min.js', array(), null, true );
    wp_script_add_data( 'jquery-slim', 'integrity', 'sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=' );
    wp_script_add_data( 'jquery-slim', 'crossorigin', 'anonymous' );

    // Lodash
    wp_enqueue_script( 'lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js', array(), null, true );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), null, true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), null, true );

    // Theme Custom CSS
	wp_enqueue_style( 'aureus-style', get_template_directory_uri() . '/assets/css/styles.css', array(), _S_VERSION );

    // Theme Custom JS
    wp_enqueue_script( 'aureus-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery-slim', 'lodash', 'gsap-scrolltrigger'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aureus_scripts' );

/**
 * Add Tailwind Config to head inline script
 */
function aureus_tailwind_config() {
    ?>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            inter: ['Inter', 'sans-serif'],
          },
          colors: {
            'aureus-blue': '#1a56db',
            'aureus-red': '#e02424',
          },
          keyframes: {
            fadeInDown: {
              '0%': { opacity: '0', transform: 'translateY(-6px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
          },
          animation: {
            'fade-in-down': 'fadeInDown 0.2s ease forwards',
          },
        },
      },
    };
    </script>
    <?php
}
add_action( 'wp_head', 'aureus_tailwind_config', 5 );

/**
 * Option Page for ACF (Advanced Custom Fields)
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/**
 * Defer JavaScripts
 * Deferring loading of JS files to optimize performance and Core Web Vitals
 */
function aureus_defer_scripts( $tag, $handle, $src ) {
    // List of scripts to defer
    $defer_scripts = array( 
        'tailwindcss',
        'jquery-slim',
        'lodash',
        'gsap',
        'gsap-scrolltrigger',
        'aureus-main-js'
    );
    
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer="defer"></script>' . "\n";
    }
    
    return $tag;
}
add_filter( 'script_loader_tag', 'aureus_defer_scripts', 10, 3 );
