<?php
/*
 * 戊辰人博客文章列表页面
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
    <div class="meta">
        <span class="meta-label"><span class="glyphicon glyphicon-calendar"></span> <?php echo '日期：'; ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
        <span class="meta-label"><span class="glyphicon glyphicon-user"></span> <?php echo '作者：'; ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></span>
        <span class="meta-label"><span class="glyphicon glyphicon-menu-hamburger"></span> <?php echo '分类：'; ?> <?php the_category(', '); ?></span>
        <?php if(function_exists('the_views')) { echo '<span class="meta-label"><span class="glyphicon glyphicon-bookmark"></span> 阅读：';  the_views() ; echo '</span>'; } ?>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 post-excerpt">
            <a href="<?php the_permalink(); ?>">
                <img class="img-responsive center-block" src="<?php echo wcr_catch_image($post->ID); ?>">
            </a>
        </div>
    </div>
</article>
