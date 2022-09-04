<?php
/**
 * IndustryDiveAssessment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IndustryDiveAssessment
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
function industrydiveassessment_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on IndustryDiveAssessment, use a find and replace
		* to change 'industrydiveassessment' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'industrydiveassessment', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'industrydiveassessment' ),
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
			'industrydiveassessment_custom_background_args',
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
add_action( 'after_setup_theme', 'industrydiveassessment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industrydiveassessment_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'industrydiveassessment_content_width', 640 );
}
add_action( 'after_setup_theme', 'industrydiveassessment_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industrydiveassessment_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'industrydiveassessment' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'industrydiveassessment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'industrydiveassessment_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function industrydiveassessment_scripts() {
	wp_enqueue_style( 'industrydiveassessment-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=Khand:wght@400;500;600;700&display=swap');
	wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
	wp_style_add_data( 'industrydiveassessment-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'industrydiveassessment_scripts' );

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


//estimated reading time
function reading_time($post_id) {
    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );

    return ceil($word_count / 200);
}

function get_categorized_posts($cat_slug, $posts_per_page) {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $cat_slug
            )
        )
    );

    return new WP_Query($args);

}

function astra_search_filter_limit_number($query) {
    if ( $query->is_search )
	{
		$query->query_vars['posts_per_page'] = 9;
	}

    return $query;
}
add_filter('pre_get_posts', 'astra_search_filter_limit_number');

function load_more_func() {
//    echo "<pre>";print_r($_POST);echo "</pre>";exit();
    $display_count = 3;
    $page = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $display_count,
        'paged'          =>  $page,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $data = new WP_Query($args);

    if ($data->have_posts()) :
        $html = '';
        while ($data->have_posts()) : $data->the_post();

            $html .='<div class="latest-post-item" style="background-image: url('.get_the_post_thumbnail_url().');background-size: cover">';
                $html .= '<div class="trending-post-content">';
                    $html .='<ul class="posts-cat">';
                        $term_lists = get_the_terms(get_the_ID(),'category');
                        if (is_array($term_lists)) :
                        foreach (get_the_terms(get_the_ID(),'category') as $term):

                                $html .='<li><a href="'.get_term_link($term->slug,'category').'">'. $term->name.'</a></li>';
                        endforeach;
                        endif;
                    $html .='</ul>';
                    $html .= '<h1 style="font-family: &quot;Khand Bold&quot;, Bangla1096, sans-serif;">Quia ad autem est</h1>';
                    $html .= '<div class="readtime-link">';
                        $html .= '<p style="font-family: &quot;Invention Regular&quot;, Bangla1096, sans-serif;">2 Min Read</p>';
                        $html .= '<a href="http://localhost/industryDive/2022/09/03/quia-ad-autem-est/"
                           style="font-family: &quot;Invention Regular&quot;, Bangla1096, sans-serif;">Read More <i
                                class="fa-solid fa-arrow-right-long"
                                style="font-family: &quot;Font Awesome 6 Free&quot;, Bangla1096, sans-serif;"></i></a>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        endwhile;
    endif;
//echo $html;
    echo json_encode(['page'=>$page,'html'=>$html,'max_page'=>$data->max_num_pages]);
    wp_die();
}
add_action('wp_ajax_load_more_func','load_more_func');
add_action('wp_ajax_nopriv_load_more_func','load_more_func');

function subscribe_func() {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $results = "Sorry, please enter a valid email address.";
    } else {
        $results = "Thank you for subscribing!";
    }
    echo $results;
    wp_die();
}
add_action('wp_ajax_subscribe_func','subscribe_func');
add_action('wp_ajax_nopriv_subscribe_func','subscribe_func');