<?php
/*
 * 戊辰人博客单页面模板
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8">

 <?php while (have_posts()) : the_post(); ?>
                <section class="pagesection">
                        <article class="singlepost">
                            <div class="single-content">
                                <h2 class="text-center"><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                            <div class="meta_tags_div"><p class="meta_tags"><?php the_tags(); ?></p></div>
                            <div class="wcr_notice">
                                <p>除非注明，<a title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>" target="_blank"><?php bloginfo('name'); ?></a>文章均为原创，转载请以链接形式标明本文地址</p>
                                <?php 
                                    $current_url = home_url(add_query_arg(array(),$wp->request));
                                    echo '<p>本文地址：<a href="' . $current_url . '" title="' . get_the_title($post->ID) . '">'  . $current_url . '</a></p>';
                                ?>
                            </div>
                            <?php comments_template(); ?>
                            <?php wcr_paginate_page(); ?> 
                        </article>
                </section>
<?php endwhile; ?>		

        </div>
        <div class="col-xs-12 col-sm-4 sidebar-page">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
