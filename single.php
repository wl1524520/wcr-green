<?php
/*
 * 戊辰人博客文章页模板
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12">

            <?php while (have_posts()) : the_post(); ?>
            <article class="singlepost">
                <h1><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></h1>
                <div class="meta">
                    <span class="meta-label"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo '日期：'; ?><?php the_time( get_option( 'date_format' ) ); ?></span>
                    <span class="meta-label"><span class="glyphicon glyphicon-user"></span> <?php echo '作者：'; ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></span>
                    <span class="meta-label"><span class="glyphicon glyphicon-menu-hamburger"></span> <?php echo '分类：'; ?><?php the_category(', '); ?></span>
                    <?php if(function_exists('the_views')) { echo '<span class="meta-label"><span class="glyphicon glyphicon-bookmark"></span> 阅读：';  the_views() ; echo '</span>'; } ?>
                </div>
                <div class="single-content"><?php the_content(); ?></div>
                <div class="meta_tags_div"><p class="meta_tags"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <?php the_tags(); ?></p></div>
                <div class="wcr_notice">
                    <p>除非注明，<a title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>" target="_blank"><?php bloginfo('name'); ?></a>文章均为原创，转载请以链接形式标明本文地址</p>
                    <?php
                        $current_url = home_url(add_query_arg(array(),$wp->request));
                        echo '<p>本文地址：<a href="' . $current_url . '" title="' . get_the_title($post->ID) . '">'  . $current_url . '</a></p>';
                    ?>
                </div>
                <div class="wcr_share">
                    <button class='basicShareBtn' data-sharePic='<?php echo wcr_catch_image($post->ID); ?>'>分享</button>
                </div>

                <div class="wp-related-content">
                    <?php
                        if ( function_exists('wpjam_related_posts') ) {
                            $args = array(
                                'class'=>'',                    //外层ul的class。
                                'thumb' => true,                //是否带缩略图，默认带
                                'size' => 'medium',             //缩略图大小
                                'crop'=> true,                  //缩略图是否裁剪
                                'thumb_class'=>'img-responsive center-block', //缩略图的class
                                'number_per_row'=>4             //如果设置为缩略图为横排，每行个数
                            );
                            wpjam_related_posts(4, $args);
                        }
                    ?>
                </div>
            </article>
            <?php comments_template(); ?>
            <?php endwhile; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
