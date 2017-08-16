<?php
/*
 * 戊辰人博客单页面模板
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9">

            <article class="singlepost">
                <div class="single-content">
                    <?php if (have_posts()) : the_post(); ?>
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <hr>
                    <?php the_content(); ?>
                    <?php endif; ?>		
                </div>
            </article>
            <?php comments_template(); ?>

        </div>
        <div id="primary" class="col-xs-12 col-sm-3 sidebar-page">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
