<?php
/*
 * 戊辰人博客文章列表页面
 *      文章中无图，但有缩略图的会分两栏显示
 *      文章中有图的不分栏
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <p>
        <span><?php the_time( get_option( 'date_format' ) ); ?><span>
        <?php if ( post_password_required() ) : ?>
        <?php echo 'lock '; ?>
        <?php endif; ?>
        <a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a>
        <?php if (function_exists('the_views')) { echo '<span>(';  the_views() ; echo ' views)</span>'; } ?>
    </p>
</article>
