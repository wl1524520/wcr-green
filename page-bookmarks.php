<?php
/*
Template Name: 友情链接
*/
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9">

        <div id="archives">
        <?php echo get_link_items(); ?>
        </div>

        </div>
        <div id="primary" class="col-xs-12 col-sm-3 sidebar-page">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
