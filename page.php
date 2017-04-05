<?php
/*
 * 戊辰人博客单页面模板
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9">

 <?php while (have_posts()) : the_post(); ?>
            <article class="singlepost">
                <div class="single-content">
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <hr>
                    <?php the_content(); ?>
                </div>
            </article>
            <?php comments_template(); ?>
<?php endwhile; ?>		

        </div>
        <div id="primary" class="col-xs-12 col-sm-3 sidebar-page">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
