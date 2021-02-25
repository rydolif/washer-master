<?php
/**
 * mad_design functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mad_design
 */

if ( ! function_exists( 'mad_design_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mad_design_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mad_design, use a find and replace
		 * to change 'mad_design' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mad_design', get_template_directory() . '/languages' );

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
			'top-menu' => esc_html__( 'Primary', 'mad_design' ),
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
		add_theme_support( 'custom-background', apply_filters( 'mad_design_custom_background_args', array(
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
add_action( 'after_setup_theme', 'mad_design_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mad_design_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mad_design_content_width', 640 );
}
add_action( 'after_setup_theme', 'mad_design_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mad_design_widgets_init() {
//	register_sidebar( array(
//		'name'          => esc_html__( 'Sidebar', 'mad_design' ),
//		'id'            => 'sidebar-1',
//		'description'   => esc_html__( 'Add widgets here.', 'mad_design' ),
//		'before_widget' => '<section id="%1$s" class="widget %2$s">',
//		'after_widget'  => '</section>',
//		'before_title'  => '<h2 class="widget-title">',
//		'after_title'   => '</h2>',
//	) );

    register_sidebar( array(
        'id' => esc_html__( 'footer-sidebar-left', 'mad_design' ),
        'name' => 'footer-left',
        'description' => esc_html__( 'Add widgets here.', 'mad_design' ),
        'before_widget' => '<div id="%1$s" class="footer-widget-left widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar( array(
        'id' => esc_html__( 'footer-sidebar-right', 'mad_design' ),
        'name' => 'footer-right',
        'description' => esc_html__( 'Add widgets here.', 'mad_design' ),
        'before_widget' => '<div id="%1$s" class="footer-widget-right widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action( 'widgets_init', 'mad_design_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mad_design_scripts() {
    wp_register_style( 'main-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'main-style');
    wp_register_style( 'flatpickr-style', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css' );
    wp_enqueue_style( 'flatpickr-style');
    // Register the script like this for a theme:
    wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array( 'jquery' ), '20180607', true );
    wp_register_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array( 'jquery' ), '20180607', true );
    wp_register_script( 'flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', array( 'jquery' ), '20180607', true );
    wp_register_script( 'flatpickr_ru', 'https://npmcdn.com/flatpickr/dist/l10n/ru.js', array( 'jquery' ), '20180607', true );
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20180607', true );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'popper' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'flatpickr' );
    wp_enqueue_script( 'flatpickr_ru' );
    wp_enqueue_script( 'custom-script' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mad_design_scripts' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once( trailingslashit( get_template_directory() ). 'inc/template-tags.php' );
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
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load TGM Plugins.
 */
require get_template_directory() . '/tgm/mad_design.php';

/**
 * Add Templatemela custom function
 */
require_once( trailingslashit( get_template_directory() ). '/templatemela/megnor-functions.php' );

/**
 * Удаляем слово Категория в заголовке
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});
/**
 * Новые размеры для картинок
 */
add_image_size( 'thumb_270_270', 270, 270, true );

/**
 * Изменяя этот путь мы изменяем файл шаблона.
 */
//add_filter('template_include', 'my_template');
//function my_template( $template ) {
//
//    if( is_page('contacts') ){
//        if ( $new_template = locate_template( array( 'page-contacts-page.php' ) ) )
//            return $new_template ;
//    }
//
//    return $template;
//
//}

/**
 * Добавляем в боди класс - slug ыстраницы.
 */
add_filter('body_class','body_class_section');
function body_class_section($classes) {
    global $wpdb, $post;
    if (is_page()) {
        if ($post->post_parent) {
            $parent  = end(get_post_ancestors($current_page_id));
        } else {
            $parent = $post->ID;
        }
        $post_data = get_post($parent, ARRAY_A);
        $classes[] = 'page-' . $post_data['post_name'];
    }
    return $classes;
}