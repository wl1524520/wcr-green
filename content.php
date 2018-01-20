<?php
/*
 * 戊辰人博客文章列表页面
 *      文章中无图，但有缩略图的会分两栏显示
 *      文章中有图的不分栏
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <p>
        <span class="list-date"><?php the_time( get_option( 'date_format' ) ); ?><span>
        <a class="list-title" href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a>
        <span class="list-views"><?php if (function_exists('the_views')) { echo '(';  the_views() ; echo ' views)'; } ?></span>
        <span class="list-author"><?php echo '&nbsp;&nbsp;-- ';the_author(); ?></span>
    </p>
</article>
