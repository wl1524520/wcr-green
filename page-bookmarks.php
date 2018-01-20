<?php
/*
Template Name: 友情链接
*/
 get_header(); ?>

<div class="container">
    <div id="archives">
        <?php if(function_exists('get_link_items')) echo get_link_items(); ?>
    </div>
</div>

<?php get_footer(); ?>
