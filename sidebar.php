<?php
/*
 * 戊辰人博客侧边栏模板
 */
?>
<div class="pagesidebar">
    <?php if ( is_active_sidebar('sidebar-widget-area') ) : ?>
            <?php dynamic_sidebar('sidebar-widget-area'); ?>
    <?php endif; ?>
</div>
