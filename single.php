<?php
/*
 * 戊辰人博客文章页模板
 */
 get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
    <article class="single single-post">
        <h1><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></h1>
        <div class="meta">
            <span class="meta-label"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo '日期：'; ?><?php the_time( get_option( 'date_format' ) ); ?></span>
            <span class="meta-label"><span class="glyphicon glyphicon-user"></span> <?php echo '作者：'; ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></span>
            <span class="meta-label"><span class="glyphicon glyphicon-menu-hamburger"></span> <?php echo '分类：'; ?><?php the_category(', '); ?></span>
            <?php if(function_exists('the_views')) { echo '<span class="meta-label"><span class="glyphicon glyphicon-bookmark"></span> ';  the_views() ; echo '</span>'; } ?>
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
    </article>
    <?php comments_template(); ?>
    <?php endwhile; ?>

<?php get_footer(); ?>
