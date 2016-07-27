<?php
/*
 * 功能函数文件
 */
require get_template_directory() . '/inc/BootstrapWalker.class.php';
require get_template_directory() . '/inc/config.php';
require get_template_directory() . '/inc/wcr_widget.class.php';
require get_template_directory() . '/inc/wcr_widget_wx.class.php';
require get_template_directory() . '/inc/wcr_meta.class.php';
require get_template_directory() . '/inc/hello_wanglu.php';

if ( ! function_exists( 'wcr_setup' ) ) :
function wcr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
    /*
     * 后台增加菜单设置功能
     */
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'social'  => 'Social Links Menu',
	) );
    /*
    add_theme_support('nav-menus');
    if(function_exists('register_nav_menus')) {
        register_nav_menu( 'primary', 'Top-Menu' );
    }
    */

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
if ( ! isset( $content_width ) ) $content_width = 900;

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function wcr_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'wcr-style', get_stylesheet_uri() );
    /*
	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );
	// Load the html5 shiv.
	wp_enqueue_script( 'wcr-html5', '//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'wcr-html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'wcr-html52', '//cdn.bootcss.com/respond.js/1.4.2/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'wcr-html52', 'conditional', 'lt IE 9' );
    */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wcr_scripts' );

/*
 * 生成Bootstrap导航菜单
 */
function wcr_nav_menu() {
    if(function_exists('wp_nav_menu') && has_nav_menu('primary')):
        $defaults = array(
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'wcr-nav-menu',
            'menu'              => 'mainav',
            'menu_class'        => 'nav navbar-nav',
            'menu_id'           => 'top-nav',
            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'       => '',
            'walker'            => new Bootstrap_Walker(),
            'depth'             => 2
        );
        wp_nav_menu($defaults);
    endif;
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

/**
 *
 * WordPress 添加面包屑导航
 * last updated: 2014.05.26
 */
function dimox_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']     = '<i class="fa fa-home fa-lg"></i>&nbsp;&nbsp;' . get_bloginfo('name'); // text for the 'Home' link
	$text['category'] = '%s'; // text for a category page
	$text['search']   = '%s'; // text for a search results page
	$text['tag']      = '%s'; // text for a tag page
	$text['author']   = '%s'; // text for an author page
	$text['404']      = '404错误'; // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' &raquo; '; // delimiter between crumbs
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<span typeof="v:Breadcrumb">';
	$link_after   = '</span>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

        //if ($show_on_home == 1) echo '<div class="breadcrumbs"><a class="bread_home" href="' . $home_link . '">' . '最新发表' . '</a></div>';
        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a>'.$delimiter.'<span class="current">最新发表</span></div>';

	} else {

		echo '<div class="breadcrumbs">';
		if ($show_home_link == 1) {
			echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			echo get_post_format_string( get_post_format() );
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo '第' . ' ' . get_query_var('paged') . ' 页';
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div><!-- .breadcrumbs -->';

	}
} // end dimox_breadcrumbs()

/*
 * 修改摘要长度
 */
function custom_excerpt_length( $length ) {
        return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
 * 更改 more 标签的样式
 */
function new_excerpt_more( $more ) {
    //return '&nbsp;&nbsp;&nbsp;&nbsp;<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
    //return '&nbsp;&nbsp;&nbsp;[......]';
    return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

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
add_action( 'widgets_init', 'wcr_widgets_init' );

if ( ! function_exists( 'wcr_paginate_page' ) ) :
function wcr_paginate_page() {
	wp_link_pages( array( 'before' => '<div class="pagination">', 'after' => '</div><div class="clear"></div>', 'link_before' => '<span class="current_pag">','link_after' => '</span>' ) );
}
endif;

/*
 * 分页导航代码
 */
function wcr_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !isset($max_page) ) {
        $max_page = $wp_query->max_num_pages;
    }
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";}
	previous_posts_link(' 上一页 ');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link(' 下一页 ');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";}}
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
 * 判断文章是否有图片
 */
function wcr_empty_image(){
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
    if(empty($first_img)){
        return true;
    }
    return false;
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

/*
 * 评论邮件通知
 */
function comment_mail_notify($comment_id) {
    $comment = get_comment($comment_id);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $spam_confirmed = $comment->comment_approved;
    if (($parent_id != '') && ($spam_confirmed != 'spam')) {
        //$wp_email = 'no-reply@' . preg_replace('#^www.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
        $wp_email = get_bloginfo('admin_email'); //e-mail 发出点, no-reply 可改为可用的 e-mail.

        $to = trim(get_comment($parent_id)->comment_author_email);
        $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
        $message = '
            <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
            <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
            <p><strong>您曾在<a href="'.get_permalink( $comment->comment_post_ID ).'">《' . get_the_title($comment->comment_post_ID) . '》</a>的留言:</strong><br />'
            . trim(get_comment($parent_id)->comment_content) . '</p>
            <p><strong>' . trim($comment->comment_author) . ' 给您的回复:</strong><br />'
            . trim($comment->comment_content) . '<br /></p>
                <p>您可以点击 查看回复完整內容</p>
                <p>欢迎再度光临 <a href="' . home_url() . '">' . get_option('blogname') . '</a></p>
                <p>(此邮件由系统自动发送，请勿回复.)</p>
                </div>';
        $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
        wp_mail( $to, $subject, $message, $headers );
    }
}
add_action('comment_post', 'comment_mail_notify');

// 显示页面性能参数
function wcr_performance( $visible = false ) {
    $stat = sprintf('%d queries in %f seconds, using %.3fMB memory',
        get_num_queries(),
        timer_stop(0, 6),
        memory_get_peak_usage() / 1024 / 1024
    );
    echo $visible ? $stat : "<!-- {$stat} -->\n" ;
}
