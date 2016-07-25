<?php
/*
 * 戊辰人博客评论页面
 */
$oddcomment = 'class="alt" ';
?>
<?php if ( ! post_password_required() ) { ?>
<div class="comments">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php echo '评论已关闭'; ?></p><?php endif; ?>
	<?php if ($comments) : ?>
		<h3><?php printf( '%1$s条评论', number_format_i18n(get_comments_number()) );?></h3>
		<ul class="commentlist">
		    <?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>
	<p><?php paginate_comments_links(); ?></p>
	<?php comment_form(array('format' => 'html5')); ?>
</div>
<?php } ?>
