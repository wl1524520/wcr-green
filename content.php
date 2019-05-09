<?php
/*
 * 戊辰人博客文章列表页面
 *      文章中无图，但有缩略图的会分两栏显示
 *      文章中有图的不分栏
 */
?>

<article class="entry home has-thumb" id="post-5604">
    <div class="entry-thumb">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="wp-post-image" width="100" height="100">
        </a>
    </div>
    <div class="entry-body">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-content"><p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a></p></div>
    </div>
</article>
