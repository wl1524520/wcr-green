<?php
/*
 * 戊辰人博客文章列表页面
 *      文章中无图，但有缩略图的会分两栏显示
 *      文章中有图的不分栏
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
    <div class="meta">
        <span class="meta-label"><span class="glyphicon glyphicon-calendar"></span> <?php echo '日期：'; ?><?php the_time( get_option( 'date_format' ) ); ?></span>
        <span class="meta-label"><span class="glyphicon glyphicon-user"></span> <?php echo '作者：'; ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></span>
        <span class="meta-label"><span class="glyphicon glyphicon-menu-hamburger"></span> <?php echo '分类：'; ?><?php the_category(', '); ?></span>
        <?php if(function_exists('the_views')) { echo '<span class="meta-label"><span class="glyphicon glyphicon-bookmark"></span> 阅读：';  the_views() ; echo '</span>'; } ?>
    </div>

    <div class="post-excerpt">
        <?php if ( ! post_password_required() ) : ?>
        <?php the_content('阅读全文...'); ?>
        <?php endif; ?>
    </div>
</article>
