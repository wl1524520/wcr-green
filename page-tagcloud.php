<?php
/*
Template Name: 标签云
*/
 get_header(); ?>
<?php
$args = array(
        'type' => 'post',
        'child_of' => 0,
        'parent' => '',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 1,
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'number' => '',
        'taxonomy' => 'category',
        'pad_counts' => false
    );
?>

<div class="container">
    <div id="archives">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <ul>
                    <?php 
                    $categories = get_categories( $args ); 
                    foreach ($categories as $category) {
                        echo '<li><a href="' . get_category_link($category->term_id) 
                            . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' 
                            . $category->name.'</a> ('.$category->count.')</li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php wp_tag_cloud(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
