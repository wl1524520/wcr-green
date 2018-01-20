<?php
/*
 * 戊辰人博客单页面模板
 */
 get_header(); ?>

<div class="container">
    <article class="singlepost">
        <div class="single-content">

            <?php while ( have_posts() ) : the_post(); ?>
            <h1 class="text-center"><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); ?>
            <?php endwhile; ?>
            
        </div>
    </article>
    <?php comments_template(); ?>
</div>

<?php get_footer(); ?>
