<?php

function get_the_link_items($id = null){
    $bookmarks = get_bookmarks('orderby=date&category=' .$id );
    $output = '';
    if ( !empty($bookmarks) ) {
        $output .= '<div class="link-items">';
        foreach ($bookmarks as $bookmark) {
            $output .=  '<p><a class="" href="'
                        . $bookmark->link_url . '" title="' . $bookmark->link_description
                        . '" target="_blank" >'. $bookmark->link_name .'</a> : '.$bookmark->link_description.'</p>';
        }
        $output .= '</div>';
    }
    return $output;
}

function get_link_items(){
    $linkcats = get_terms( 'link_category' );
    if ( !empty($linkcats) ) {
        foreach( $linkcats as $linkcat){
            $result .=  '<h2 class="link-title">'.$linkcat->name.'</h2>';
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
