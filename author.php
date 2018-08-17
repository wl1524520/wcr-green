<?php
/*
 * 主页模板
 */
get_header(); ?>
    <div class="article-list">
        <?php
        if(have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('content', get_post_format());
            endwhile;
        else :
                get_template_part('content', 'none');
        endif;
        ?>
    </div>
    <?php
    if(function_exists('wcr_pagenavi')) wcr_pagenavi(9);
    if(function_exists('wcr_pagenavi_m')) wcr_pagenavi_m();
    ?>
<?php get_footer(); ?>
