<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
 }
 add_filter('upload_mimes', 'cc_mime_types');
 function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDnjUlSYoGH1zSCEzDxQayvjP3ZGZ8bhso');
}
add_action('acf/init', 'my_acf_init');
if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', '_s' ),
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
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
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
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {

	// Loads required CSS header only.
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	// Loads bundled frontend CSS.
	wp_enqueue_style( '_s-frontend-styles', get_stylesheet_directory_uri() . '/public/frontend.css' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', NULL, '3.4.1', true);

	
	wp_enqueue_script( '_s-frontend-scripts', get_template_directory_uri() . '/public/frontend-bundle.js', array('jquery'), null, true );
	
	
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/src/js/contact.js', array(), '1.0.0', true );
	// wp_enqueue_script( 'archive', get_template_directory_uri() . '/src/js/archive-project.js', array(), '1.0.0', true );

	if (is_post_type_archive('projects')) {
		wp_enqueue_script( 'archive', get_template_directory_uri() . '/src/js/archive-project.js', array(), '1.0.0', true );
	}
	if ( is_singular('projects')) {
		wp_enqueue_script( 'gallery', get_template_directory_uri() . '/src/js/gallery.js', array(), '1.0.0', true );
	}
	if (is_page('kontakt')) {

	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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




//Create new post types - Projects
function create_posttype() {
  register_post_type( 'projects',
  // CPT Options
    array(
      'labels' => array(
      'name' => __( 'Projects' ),
      'singular_name' => __( 'Projects' ),
      'menu_name' => _x('Projects', 'admin menu'),
      'add_new' => _x('Add New', 'add new'),
      'add_new_item' => __('Add New Projects'),
      'new_item' => __('New Projects'),
      'edit_item' => __('Edit Projects'),
      'view_item' => __('View Projects'),
      'all_items' => __('All Projects'),
      'search_items' => __('Search Projects'),
      'not_found' => __('No Projects found.'),
      ),
			'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
			'taxonomies'  => array( 'category' ),
      'supports' => array('title', 'editor', 'thumbnail'),
    )
  );
}
add_action( 'init', 'create_posttype' );

 
function get_post_meta_for_api( $object ) {
    //get the id of the post object array
    $post_id = $object['id'];
 
    //return the post meta
    return get_post_meta( $post_id );
}
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_latest_posts( $data ) {
  $posts = get_posts();
  if ( empty( $posts ) ) {
    return null;
  }
  return $posts;
}
function get_latest_prodaja_posts() {
	$prodaja_query = new WP_Query( 
		array( 
		'post_type' => 'projects',
		'category_name' => 'prodaja',
		'posts_per_page' => 3 ) 
	);
	wp_reset_query();
	$latest_posts = $prodaja_query->posts;
	
	foreach ( $latest_posts as $post ) {
		$lp_id = $post->ID;
		$lp_title = $post->post_title;
		$lp_content = substr($post->post_content, 0, 50);
		$lp_link = get_permalink($lp_id);
		$lp_featured_media = get_the_post_thumbnail_url($lp_id, 'medium');
	?>
	<div class="latest-prodaja">
		<img src="<?php echo $lp_featured_media; ?>"/>
		<h4><?php echo $lp_title; ?></h4>
		<p><?php echo $lp_content; ?></p>
		<a href="<?php echo $lp_link; ?>">Detaljnije</a>
	</div>

	<?php
	}
	// return $latest_posts;
}

function get_latest_projects() {
	$args = array(
		'post_type' => 'projects',
		'post_status' => 'publish',
    'posts_per_page' => -1
	);
	$posts = new WP_Query( $args );
	return $posts;
}
function get_latest_projects_visokogradnja() {

		$visokogradnja_query = new WP_Query( 
			array( 
			'post_type' => 'projects',
			'category_name' => 'visokogradnja',
			'posts_per_page' => -1 ) 
		);
		wp_reset_query();
		return $visokogradnja_query;
}
function get_latest_projects_niskogradnja() {

	$niskogradnja_query = new WP_Query( 
		array( 'post_type' => 'projects','category_name' => 'niskogradnja','posts_per_page' => -1 ) 
	);
	wp_reset_query();
	return $niskogradnja_query;
}
function get_latest_projects_arhitektura() {

	$arhitektura_query = new WP_Query( 
		array( 'post_type' => 'projects','category_name' => 'arhitektura','posts_per_page' => -1 ) 
	);
	wp_reset_query();
	return $arhitektura_query;
}

//Register REST route for latest posts
function register_post_rest_route() {

	register_rest_route('myprojects/v1', 'get-projects-visokogradnja', array(
		'methods' => 'GET',
		'callback' => 'get_latest_projects_visokogradnja'
	));
	register_rest_route('myprojects/v1', 'get-projects-niskogradnja', array(
		'methods' => 'GET',
		'callback' => 'get_latest_projects_niskogradnja'
	));
	register_rest_route('myprojects/v1', 'get-projects-arhitektura', array(
		'methods' => 'GET',
		'callback' => 'get_latest_projects_arhitektura'
	));
}
add_action('rest_api_init', 'register_post_rest_route');

function register_taxonomy_cat() {
	$labels = array(
		'name' => 'Work Types',
    'singular_name' => 'Work type',
    'search_items' => 'Search Types',
    'all_items' => 'All Work Types',
    'parent_item' => 'Parent Type',
    'parent_item_colon' => 'Parent Type:',
    'edit_item' => 'Edit Work Type',
    'update_item' => 'Update Work Type',
    'add_new_item' => 'Add New Work Type',
    'new_item_name' => 'New Work Type Name',
    'menu_name' => 'Work Types'
	);
	$args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'work_type' ),
    'show_in_rest'       => true,
    'rest_base'          => 'work_type',
    'rest_controller_class' => 'WP_REST_Terms_Controller',      
	);
	register_taxonomy('work_type', array('projects'), $args);
}

add_action( 'init' , 'register_taxonomy_cat' );
