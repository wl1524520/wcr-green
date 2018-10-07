<?php
/*
 * 戊辰人博客单页面模板
 */
 get_header(); ?>

    <div class="page page-content">

        <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="text-center"><?php the_title(); ?></h1>
        <hr>
        <?php the_content(); ?>
        <?php endwhile; ?>
        
    </div>
    <?php comments_template(); ?>

<?php get_footer(); ?>
