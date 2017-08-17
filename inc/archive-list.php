<?php

/* Archives list v2014 by zwwooooo | https://zww.me */
function wcr_archives_list() {
    if( !$output = get_option('wcr_archive_list_cache') ){
    //if( true ){
        $output = '<div>';
        $args = array(
            'post_type' => array('archives', 'post', 'zsay'),
            'posts_per_page' => -1, //全部 posts
            'ignore_sticky_posts' => 1 //忽略 sticky posts
        );
        $the_query = new WP_Query($args);
        $posts_rebuild = array();
        $year = $mon = 0;
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            $post_year = get_the_time('Y');
            $post_mon = get_the_time('m');
            $post_day = get_the_time('d');
            if ($year != $post_year) $year = $post_year;
            if ($mon != $post_mon) $mon = $post_mon;
            //$posts_rebuild[$year][$mon][] = '<p>'. get_the_time('[d日] ') .
            //                                '<a href="'. get_permalink() .'">'. get_the_title() .'</a> <em>('. get_comments_number('0', '1', '%') .')</em></p>';
            $posts_rebuild[$year][$mon][] = '<p class="al_day">'. get_the_time('[d日] ').'<a href="'. get_permalink() .'">'. get_the_title() .'</a></p>';
        endwhile;

        wp_reset_postdata();

        foreach ($posts_rebuild as $key_y => $y) {
            $y_i = 0;
            $y_output = '';
            foreach ($y as $key_m => $m) {
                $posts = ''; $i = 0;
                foreach ($m as $p) {
                    ++$i; ++$y_i;
                    $posts .= $p;
                }
                $y_output .= '<p><span class="al_mon">'. $key_y . ' 年 ' . $key_m .' 月 <em>( '. $i .' 篇文章 )</em></span></p>'; //输出年月
                $y_output .= $posts; //输出 posts
            }
            $output .= '<h3 class="al_year">'. $key_y .' 年 <small><em>( '. $y_i .' 篇文章 )</em></small></h3>'; //输出年份
            $output .= $y_output;
        }

        $output .= '</div>';
        update_option('wcr_archive_list_cache', $output);
    }
    echo $output;
}
function clear_db_cache_archives_list() {
    update_option('wcr_archive_list_cache', ''); // 清空 zww_archives_list
}
add_action('save_post', 'clear_db_cache_archives_list'); // 新发表文章/修改文章时
