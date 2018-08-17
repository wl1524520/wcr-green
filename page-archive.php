<?php
/*
Template Name: 归档模板
*/
 get_header(); ?>

    <div id="archives">
        <?php if(function_exists('wcr_archives_list')) wcr_archives_list(); ?>
    </div>

<?php get_footer(); ?>
