<?php
/*
 * 戊辰人博客文章列表页面
 */
?>
<article class="media">
  <div class="media-left media-middle">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <img class="media-object" src="<?php echo wpjam_get_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
    <a class="excerpt" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_excerpt(); ?>
    </a>
  </div>
  <hr>
</article>
