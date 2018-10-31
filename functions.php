<?php
/**
 * KotiDesigns functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KotiDesigns
 */

if ( ! function_exists( 'koti_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function koti_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on KotiDesigns, use a find and replace
		 * to change 'koti' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'koti', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'koti' ),
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
		add_theme_support( 'custom-background', apply_filters( 'koti_custom_background_args', array(
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
add_action( 'after_setup_theme', 'koti_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function koti_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'koti_content_width', 640 );
}
add_action( 'after_setup_theme', 'koti_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function koti_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'koti' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'koti' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'koti_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function koti_scripts() {
	wp_enqueue_style( 'koti-style', get_stylesheet_uri() );

	wp_enqueue_script( 'koti-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'koti-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20181030', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'koti_scripts' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function add_google_fonts() {
 
wp_enqueue_style( ' add_google_fonts ', ' https://fonts.googleapis.com/css?family=Montserrat', false );}
 
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/koti-logo.png);
		height:65px;
		width: auto;
		background-size: auto 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Koti Designs';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Remove WSYWG editor from certain pages
// add_action( 'admin_init', 'hide_editor' );
// function hide_editor() {
//   // Get the Post ID.
//   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
//   if( !isset( $post_id ) ) return;
//   // Hide the editor on the page titled 'Homepage'
//   $homepgname = get_the_title($post_id);
//   if($homepgname == 'Home'){ 
//     remove_post_type_support('page', 'editor');
//   }
// }


add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

		if( !isset( $post_id ) ) return;
		$home = get_the_title($post_id);
		$about = get_the_title($post_id);
		$contact = get_the_title($post_id);
		$news = get_the_title($post_id);
		$paper = get_the_title($post_id);
		$silk = get_the_title($post_id);
		$shop = get_the_title($post_id);
		if($home == 'Home' || $about == 'About' || $contact == 'Contact' || $news == 'News' || $paper == 'Paper' || $silk == 'Silk' || $shop == 'Shop'){ 
    		remove_post_type_support('page', 'editor');
  }
}

