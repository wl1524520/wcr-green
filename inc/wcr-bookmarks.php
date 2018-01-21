<?php

function get_the_link_items($id = null){
    $args = array(
        'orderby'   => 'rating', // 按照评分排序
        'category'  => $id,
        'order'     => 'DESC',
    );
    $bookmarks = get_bookmarks($args);
    //$bookmarks = get_bookmarks('orderby=rand&category=' .$id );
    $output = '';
    if ( !empty($bookmarks) ) {
        $output .= '<div class="link-items"><ul>';
        foreach ($bookmarks as $bookmark) {
            $link_description = '';
            if ($bookmark->link_description) {
                $link_description = '<span class="bm-dem">：</span>' . $bookmark->link_description;
            }
            $output .=  '<li><p><a class="bm-link" href="' . $bookmark->link_url . '" target="_blank" >'
                        . $bookmark->link_name .'</a><span class="bm-desc">' . $link_description . '</span></p>';
        }
        $output .= '</ul></div>';
    }
    return $output;
}

function get_link_items(){
    $linkcats = get_terms( 'link_category' );
    if ( !empty($linkcats) ) {
        foreach( $linkcats as $linkcat){
            $result .=  '<h2 class="link-title text-center">'.$linkcat->name.'</h2>';
            $result .= '<hr>';
            if( $linkcat->description ) $result .= '<div class="link-description">' . $linkcat->description . '</div>';
            $result .=  get_the_link_items($linkcat->term_id);
        }
    } else {
        $result = get_the_link_items();
    }
    return $result;
}

function shortcode_link(){
    return get_link_items();
}
add_shortcode('bigfalink', 'shortcode_link');
