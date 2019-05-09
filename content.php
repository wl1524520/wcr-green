<?php
/*
 * 戊辰人博客文章列表页面
 *      文章中无图，但有缩略图的会分两栏显示
 *      文章中有图的不分栏
 */
?>
<?php 
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url();
} else {
    $img = 'https://wanglu.info/wp-content/uploads/2016/08/2016080214355420.png';
}

?>
<article class="media">
  <div class="media-left media-middle">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <img class="media-object" src="<?php echo $img;?>" alt="<?php the_title(); ?>">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php the_title(); ?></h4>
    <?php the_excerpt(); ?>
  </div>
</article>
