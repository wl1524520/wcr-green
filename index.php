<?php
/*
 * 主页模板
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12 article-list">
            <?php
            if(have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('content', get_post_format());
                endwhile;
            else :
                    get_template_part('content', 'none');
            endif;

            if(function_exists('wcr_pagenavi')) wcr_pagenavi(9);
            if(function_exists('wcr_pagenavi_m')) wcr_pagenavi_m();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
