<?php

/*
 * 分页导航代码
 */
function wcr_pagenavi($range = 9) {
	global $paged, $wp_query;
	if ( !isset($max_page) ) {
        $max_page = $wp_query->max_num_pages;
    }
    if($max_page > 1) {
        echo '<div id="pagenavi" class="text-center">';
        echo '<nav aria-label="Page navigation"><ul class="pagination">';
        if(!$paged) {
            $paged = 1;
        }
        echo "<li><a href='" . get_pagenum_link(1) . "' aria-label='Previous'><span aria-hidden='true'>第一页</span></a></li>";
        echo '<li>';
        previous_posts_link(' 上一页 ');
        echo '</li>';

        if($max_page > $range) {
            if($paged < $range) {
                for($i = 1; $i <= ($range + 1); $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range/2)))) {
                for($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            } elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))) {
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++) {
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                }
            }
        } else {
            for($i = 1; $i <= $max_page; $i++) {
                echo "<li";
                if($i==$paged)
                    echo " class='active'";
                echo "><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }
        echo '<li>';
        next_posts_link(' 下一页 ');
        echo '</li>';
        echo "<li><a href='" . get_pagenum_link($max_page) . "' aria-label='Next'><span aria-hidden='true'>最末页</span></a></li>";
        echo '</ul></nav>';
        echo '</div>';
    }
}

function wcr_pagenavi_m() {
    echo '<div id="pagenavi-m" class="text-center">';
    echo '<nav aria-label="..."><ul class="pager">';
    echo '<li class="previous">';
        previous_posts_link(' << 前一页 ');
    echo '</li>';
    echo '<li class="next">';
        next_posts_link(' 后一页 >> ');
    echo '</li>';
    echo '</ul></nav>';
    echo '</div>';
}
