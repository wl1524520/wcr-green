<?php
/*
Template Name: 归档模板
*/
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12">

        <div id="archives">
        <?php if(function_exists('wcr_archives_list')) wcr_archives_list(); ?>
        </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
