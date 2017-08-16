<?php
/*
Template Name: 归档模板
*/
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9">

        <div id="archives">
        <?php wcr_archives_list(); ?>
        </div>

        </div>
        <div id="primary" class="col-xs-12 col-sm-3 sidebar-page">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
