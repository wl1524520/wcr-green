<?php
/*
Template Name: 留言
*/
 get_header(); ?>

        <div class="page page-guestbook">
            <?php while ( have_posts() ) : the_post(); ?>
            <h1 class="text-center"><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); ?>
            <?php
            $count_posts = wp_count_posts();
            $published_posts = $count_posts->publish;
            ?>
            <hr>
            <p><strong>本博客于2014年11月11日建立，据不完全统计，博主已经写了<?php echo $published_posts ?>篇文章，
                收获了<?php echo get_comments(array('count'=>true)); ?>条评论，
                一共坚持了<?php echo floor((time()-strtotime("2014-11-11"))/86400); ?>天。</strong></p>
            <?php endwhile; ?>
        </div>
    <?php comments_template(); ?>

<?php get_footer(); ?>
