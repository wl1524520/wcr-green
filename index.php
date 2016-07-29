<?php 
/*
 * 主页模板
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 article-list">
            <?php 
            if(have_posts()) :  
                while (have_posts()) :
                    the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;
            else :
                    get_template_part( 'content', 'none' );
            endif;
            ?>
            <div class="page-navi"><?php wcr_pagenavi(9); ?></div>
        </div>
        <div class="col-xs-12 col-sm-4 sidebar-index">
            <?php  get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
