<?php
/*
Template Name: 友情链接
*/
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12">

        <div id="archives">
        <?php if(function_exists('get_link_items')) echo get_link_items(); ?>
        </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
