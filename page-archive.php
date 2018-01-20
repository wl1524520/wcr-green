<?php
/*
Template Name: 归档模板
*/
 get_header(); ?>

<div class="container">
    <div id="archives">
        <?php if(function_exists('wcr_archives_list')) wcr_archives_list(); ?>
    </div>
</div>

<?php get_footer(); ?>
