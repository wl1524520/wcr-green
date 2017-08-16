<?php
/*
Template Name: 留言
*/
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12">

            <article class="singlepost">
                <div class="single-content">
                    <?php if (have_posts()) : the_post(); ?>
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <hr>
                    <ul>
                        <li>日志数量：<?php
                        $count_posts = wp_count_posts();
                        echo $published_posts = $count_posts->publish;
                        ?> 篇</li>
                        <li>评论数量：<?php echo get_comments(array('count'=>true)); ?> 条</li>
                        <li>标签数量：<?php echo $count_tags = wp_count_terms('post_tag'); ?> 个</li>
                        <li>建站日期：2014年11月11日</li>
                        <li>运行天数：<?php echo floor((time()-strtotime("2014-11-11"))/86400) . ' 天'; ?></li>
                    </ul>
                    <?php endif; ?>		
                </div>
            </article>
            <?php comments_template(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
