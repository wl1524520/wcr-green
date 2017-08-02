<?php 
/*
 * 主页模板
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9 article-list">
            <?php 
            if(have_posts()) :  
                while (have_posts()) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;
            else :
                    get_template_part( 'content', 'none' );
            endif;

            wcr_pagenavi(9);
            wcr_pagenavi_m();
            ?>
        </div>
        <div id="primary" class="col-xs-12 col-sm-3 sidebar-index">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
