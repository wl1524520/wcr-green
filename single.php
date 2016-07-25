<?php
/*
 * 戊辰人博客文章页模板
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8">

 <?php while (have_posts()) : the_post(); ?>
                <section class="pagesection">
                        <article class="singlepost">
                            <h1><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h1>
                            <div class="meta">
                                <span class="meta-label"><i class="fa fa-calendar"></i> <?php echo '日期：'; ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
                                <span class="meta-label"><i class="fa fa-user"></i> <?php echo '作者：'; ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></span>
                                <span class="meta-label"><i class="fa fa-bars"></i> <?php echo '分类：'; ?> <?php the_category(', '); ?></span>
                                <?php if(function_exists('the_views')) { echo '<span class="meta-label"><i class="fa fa-bookmark"></i> 阅读： ';  the_views() ; echo '</span>'; } ?>
                            </div>
                            <div class="single-content"><?php the_content(); ?></div>
                            <div class="meta_tags_div"><p class="meta_tags"><i class="fa fa-tag"></i> <?php the_tags(); ?></p></div>
                            <div class="wcr_notice">
                                <p>除非注明，<a title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>" target="_blank"><?php bloginfo('name'); ?></a>文章均为原创，转载请以链接形式标明本文地址</p>
                                <?php
                                    $current_url = home_url(add_query_arg(array(),$wp->request));
                                    echo '<p>本文地址：<a href="' . $current_url . '" title="' . get_the_title($post->ID) . '">'  . $current_url . '</a></p>';
                                ?>
                            </div>
                            <div class="wcr_share">
                                <button class='basicShareBtn'><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;点击分享到微博</button>
                            </div>

                            <div class="wp-related-content">
                                <?php if ( function_exists( 'wp_related_posts' ) ) {wp_related_posts();} ?>
                            </div>
                            <?php comments_template(); ?>
                            <?php wcr_paginate_page(); ?>
                        </article>
                </section>
<?php endwhile; ?>

        </div>
        <div class="col-xs-12 col-sm-4 sidebar-single">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
