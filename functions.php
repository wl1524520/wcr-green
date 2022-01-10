<?php
/*
 * 功能函数文件
 */
require get_template_directory() . '/inc/wcr-archives.php';
require get_template_directory() . '/inc/wcr-bookmarks.php';
require get_template_directory() . '/inc/wcr-nav.php';
require get_template_directory() . '/inc/wcr-pagenav.php';
require get_template_directory() . '/inc/wcr-breadcrumbs.php';

/* 彻底屏蔽主题自定义功能 */
add_filter('map_meta_cap', function($caps, $cap){
	if($cap == 'customize'){
		return ['do_not_allow'];
	}
	return $caps;
}, 10, 2);

// 链接管理器
// add_filter('pre_option_link_manager_enabled','__return_true');

// 并没有什么卵用
if (! isset($content_width)) $content_width = 900;

if (! function_exists('wcr_setup')) :
function wcr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for custom logo.
	 *
	 */
	/*
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
    */

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(1200, 9999);

	// This theme uses wp_nav_menu() in two locations.
    /*
     * 后台增加菜单设置功能
     */
	register_nav_menus( array(
		'primary' => '主菜单',
		//'social'  => 'Social Links Menu',
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
     * 增加文章类型
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // wcr_setup
add_action( 'after_setup_theme', 'wcr_setup' );

function wcr_scripts() {
	// Theme stylesheet.
	wp_enqueue_style('wcr-style', get_stylesheet_uri());
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}

    // 移除默认添加到头部的 jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery', ''); // lazy-load 依赖
}
add_action('wp_enqueue_scripts', 'wcr_scripts');

/*
 * 增加wp_head内容
 */
if ( ! function_exists( 'wcr_head_css' ) ) :
function wcr_head_css() {
    $meta = '';
	$meta .= "<link rel=\"shortcut icon\" href=\"".esc_url(get_template_directory_uri() . '/images/favicon.ico')."\" type=\"image/x-icon\" />\n";
	//$meta .= "<link rel=\"stylesheet\" href=\"".esc_url(get_template_directory_uri() . '/style.css')."\" />\n";
    if ( isset($web_clip) && $web_clip <> '') {
        $meta .= "<link rel=\"apple-touch-icon-precomposed\" href=\"".esc_url($web_clip)."\" />\n";
    }
    if ($meta <> '') {
        echo $meta;
    }
}
endif;
add_action('wp_head', 'wcr_head_css');



// 侧边栏
/*
if ( ! function_exists( 'wcr_widgets_init' ) ) :
function wcr_widgets_init() {
	register_sidebar(array(
		'name' => '主页侧边栏',
		'id' => 'sidebar-widget-area',
		'description' => '主页侧边栏区域',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));
}
endif;
add_action('widgets_init', 'wcr_widgets_init');
 */

add_filter('posts_pre_query', function ($pre, $wp_query){
	if(!$wp_query->is_main_query()){	// 只缓存主循环
		return $pre;
	}

	// $cache_key	= md5(maybe_serialize($wp_query->query_vars));
	$cache_key	= md5(maybe_serialize($wp_query->query_vars)).':'.wp_cache_get_last_changed('posts');

	$wp_query->set('cache_key', $cache_key);

	$post_ids	= wp_cache_get($cache_key, 'wpjam_post_ids');

	if($post_ids === false){
		return $pre;
	}

	return wpjam_get_posts($post_ids);
}, 10, 2);

add_filter('posts_results',	 function ($posts, $wp_query) {
	$cache_key	= $wp_query->get('cache_key');

	if($cache_key){
		$post_ids	= wp_cache_get($cache_key, 'wpjam_post_ids');
		if($post_ids === false){
			wp_cache_set($cache_key, array_column($posts, 'ID'), 'wpjam_post_ids', DAY_IN_SECONDS);
		}
	}

	return $posts;
}, 10, 2);
