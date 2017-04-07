<?php
/*
 * 功能函数文件
 */
require get_template_directory() . '/inc/BootstrapWalker.class.php';
require get_template_directory() . '/inc/wcr_widget.class.php';
require get_template_directory() . '/inc/wcr_widget_wx.class.php';
require get_template_directory() . '/inc/wcr_meta.class.php';
require get_template_directory() . '/inc/wcr_mail.php';
require get_template_directory() . '/inc/dimox_breadcrumbs.php';

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
	add_theme_support('automatic-feed-links');

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
	 *  @since Twenty Sixteen 1.2
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

// 并没有什么卵用
if (! isset($content_width)) $content_width = 900;

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function wcr_scripts() {
	// Theme stylesheet.
	wp_enqueue_style('wcr-style', get_stylesheet_uri());
    /*
	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );
	// Load the html5 shiv.
	wp_enqueue_script( 'wcr-html5', '//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'wcr-html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'wcr-html52', '//cdn.bootcss.com/respond.js/1.4.2/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'wcr-html52', 'conditional', 'lt IE 9' );
    */
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}

    // 移除默认添加到头部的 jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery', ''); // lazy-load 依赖
}
add_action('wp_enqueue_scripts', 'wcr_scripts');

/*
 * 生成Bootstrap导航菜单
 */
function wcr_nav_menu() {
    $defaults = array(
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'wcr-nav-menu',
        'menu'              => 'mainav',
        'menu_class'        => 'nav navbar-nav navbar-right',
        'menu_id'           => 'top-nav',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'fallback_cb'       => '',
        'walker'            => new Bootstrap_Walker(),
        'depth'             => 2
    );
    if(function_exists('wpwcr_nav_menu') && has_nav_menu('primary')) {
        // 使用缓存
        wpwcr_nav_menu($defaults);
    } else {
        wp_nav_menu($defaults);
    }
    /*
    if (function_exists('wp_nav_menu') && has_nav_menu('primary')) {
        wp_nav_menu($defaults);
    }
     */
}

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

/*
 * 修改摘要长度
 */
function custom_excerpt_length( $length ) {
        return 200;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// 侧边栏
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

// 上一页下一页
/*
if ( ! function_exists( 'wcr_paginate_page' ) ) :
function wcr_paginate_page() {
    wp_link_pages(
        array(
            'before' => '<div class="pagination">',
            'after' => '</div><div class="clear"></div>',
            'link_before' => '<span class="current_pag">',
            'link_after' => '</span>'
        )
    );
}
endif;
 */

/*
 * 分页导航代码
 */
function wcr_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !isset($max_page) ) {
        $max_page = $wp_query->max_num_pages;
    }
    if($max_page > 1) {
        echo '<nav aria-label="Page navigation"><ul class="pagination">';
        if(!$paged) {
            $paged = 1;
        }
        echo "<li><a href='" . get_pagenum_link(1) . "' aria-label='Previous'><span aria-hidden='true'>第一页</span></a></li>";
        echo '<li>';
        previous_posts_link(' 上一页 ');
        echo '</li>';

        if($max_page > $range) {
            if($paged < $range) {
                for($i = 1; $i <= ($range + 1); $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range/2)))) {
                for($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            } elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))) {
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            }
        } else {
            for($i = 1; $i <= $max_page; $i++) {
                echo "<li";
                if($i==$paged)
                    echo " class='active'";
                echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }
        echo '<li>';
        next_posts_link(' 下一页 ');
        echo '</li>';
        echo "<li><a href='" . get_pagenum_link($max_page) . "' aria-label='Next'><span aria-hidden='true'>最末页</span></a></li>";
        echo '</ul></nav>';
    }
}
function wcr_pagenavi_m(){
    echo '<nav aria-label="..."><ul class="pager">';
    echo '<li class="previous">';
        previous_posts_link(' 前一页 ');
    echo '</li>';
    echo '<li class="next">';
        next_posts_link(' 后一页 ');
    echo '</li>';
    echo '</ul></nav>';
}

/*
 * 获取文章第一张图片
 */
function wcr_catch_image($id) {
    global $post, $posts;
    $first_img = '';
    // 如果设置了缩略图
    $post_thumbnail_id = get_post_thumbnail_id($id);
    if ($post_thumbnail_id) {
        $output = wp_get_attachment_image_src($post_thumbnail_id, 'large');
        $first_img = $output[0];
    } else { // 没有缩略图，查找文章中的第一幅图片
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches[1][0];

        if(empty($first_img)){ // 既没有缩略图，文中也没有图，设置一幅默认的图片
            $first_img = esc_url(get_template_directory_uri() . '/images/post_thumbnail.png');
        }
    }
    return $first_img;
}

/*
 * 去除more的位置跳转
 */
function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"',$offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end-$offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// 显示页面性能参数
function wcr_performance( $visible = false ) {
    $stat = get_num_queries() . ' queries in ' . timer_stop(0, 6) . ' seconds';
    //$stat .= sprintf(', using %.3fMB memory', memory_get_peak_usage() / 1024 / 1024);
    echo $visible ? $stat : "<!-- {$stat} -->\n" ;
}

// 获取主题相对网站根目录的路径
function wcr_template_path() {
    $index = strpos(get_template_directory(), 'wp-content');
    return substr(get_template_directory(), $index - 1);
}
