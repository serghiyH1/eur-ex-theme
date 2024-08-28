<?php
/**
 * eurex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eurex
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eur_ex_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on eurex, use a find and replace
		* to change 'eur_ex' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'eur_ex', get_template_directory() . '/languages' );

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

    add_image_size( 'custom-500x333', 500, 333, array( 'center', 'center' ) );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'eur_ex' ),
            'menu-mobile' => esc_html__( 'Mobile', 'eur_ex' ),
            'footer-menu-1' => esc_html__( 'Footer 1', 'eur_ex' ),
            'footer-menu-2' => esc_html__( 'Footer 2', 'eur_ex' ),
            'footer-menu-3' => esc_html__( 'Footer 3', 'eur_ex' ),
            'footer-menu-4' => esc_html__( 'Footer 4', 'eur_ex' ),
            'lang-menu' => esc_html__( 'Languages', 'eur_ex' ),
            'lang-menu-modal' => esc_html__( 'Languages Modal', 'eur_ex' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'eur_ex_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'eur_ex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eur_ex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eur_ex_content_width', 640 );
}
add_action( 'after_setup_theme', 'eur_ex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eur_ex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eur_ex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eur_ex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eur_ex_widgets_init' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/cpt-tax-register.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/pll-strings.php';
// require get_template_directory() . '/inc/global-vars.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Remove <p> Tag From Contact Form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

// Remove archive, Author, Category from title.
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

// fansybox rel= class=
// Gallery images
function ccd_fancybox_gallery_attribute( $content, $id ) {
    // Restore title attribute
    $title = get_the_title( $id );
    return str_replace('<a', '<a data-type="image" data-fancybox="gallery" title="' . esc_attr( $title ) . '" ', $content);
}
add_filter( 'wp_get_attachment_link', 'ccd_fancybox_gallery_attribute', 10, 4 );
// Single images
function ccd_fancybox_image_attribute( $content ) {
    global $post;
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replace = '<a$1href=$2$3.$4$5 data-type="image" data-fancybox="image gallery">';
    $content = preg_replace( $pattern, $replace, $content );
    return $content;
}
add_filter( 'the_content', 'ccd_fancybox_image_attribute' );
