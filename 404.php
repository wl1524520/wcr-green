<?php

/*
 * 戊辰人博客404页面
 */
 get_header(); ?>
    <div class="container">
        <section class="page404">
            <p class="text-center"><?php echo '错误 - 您所找的信息不存在！ <a href="' . esc_url(home_url('/')) . '">返回主页</a>'; ?></p>
            <div>
                <a href="<?php esc_url(home_url('/')); ?>">
                    <img src="<?php global $wcr_config; echo esc_url(get_template_directory_uri(). '/' . $wcr_config['wcr_404_img']); ?>" class="img-responsive">
                </a>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
