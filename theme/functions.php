<?php
/**
 * _tw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _tw
 */

if ( ! defined( '_TW_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( '_TW_VERSION', '0.1.0' );
}

if ( ! defined( '_TW_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `_tw_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'_TW_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( '_tw_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _tw_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _tw, use a find and replace
		 * to change '_tw' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_tw', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', '_tw' ),
				'menu-2' => __( 'Footer Menu', '_tw' ),
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

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', '_tw_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _tw_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', '_tw' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', '_tw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_tw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _tw_scripts() {
	wp_enqueue_style( '_tw-style', get_stylesheet_uri(), array(), _TW_VERSION );
	wp_enqueue_script( '_tw-script', get_template_directory_uri() . '/js/script.min.js', array(), _TW_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_tw_scripts' );

function enqueue_flowbite_cdn() {
    // Enqueue Flowbite JavaScript from CDN
    wp_enqueue_script(
        'flowbite-js',
        'https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js',
        array('jquery'), // jQuery as a dependency if needed
        null,
        true // Load in the footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_flowbite_cdn');

/**
 * Enqueue the block editor script.
 */
function _tw_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'_tw-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			_TW_VERSION,
			true
		);
		wp_add_inline_script( '_tw-editor', "tailwindTypographyClasses = '" . esc_attr( _TW_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', '_tw_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function _tw_tinymce_add_class( $settings ) {
	$settings['body_class'] = _TW_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', '_tw_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


function custom_rewrite_rules() {
    // Rewrite rule to match /artikel/category-slug/post-slug/
    add_rewrite_rule(
        '^artikel/([^/]+)/([^/]+)/?$',
        'index.php?category_name=$matches[1]&name=$matches[2]',
        'top'
    );
}
add_action('init', 'custom_rewrite_rules');

function theme_setup() {
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100, // Logo height (adjust as needed)
        'width'       => 300, // Logo width (adjust as needed)
        'flex-width'  => true, // Allow flexible width
        'flex-height' => true, // Allow flexible height
    ));
}
add_action('after_setup_theme', 'theme_setup');

function custom_permalinks($permalink, $post) {
    if ($post->post_type == 'post') {
        $categories = get_the_category($post->ID);
        if ($categories) {
            $category_slug = $categories[0]->slug;  // Get the category slug
            $post_slug = $post->post_name;           // Get the post slug
            return home_url("/artikel/{$category_slug}/{$post_slug}/");  // Return the custom permalink structure
        }
    }
    return $permalink;  // Return default permalink if it's not a post
}
add_filter('post_link', 'custom_permalinks', 10, 2);
