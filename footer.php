<?php
/**
 * 底部模板
 *
 */
global $wcr_config;
?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="ft-text-left">&copy; 版权所有 2014-<?php echo date('Y') ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a></p>
                <p class="ft-text-left"><a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php $blog_email = get_bloginfo('admin_email');?>
                <p class="ft-text-center">站长邮箱：<a title="给站长写信" href="mailto:<?php echo $blog_email; ?>"><?php echo $blog_email; ?></a></p>
                    <p class="ft-text-center">腾讯 Q Q ：<a title="QQ：<?php echo $wcr_config['wcr_qq']; ?>" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $wcr_config['wcr_qq']; ?>&site=qq&menu=yes" rel="nofollow"><?php echo $wcr_config['wcr_qq']; ?></a></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="ft-text-right">
                <a href="<?php echo $wcr_config['wcr_facebook_url']; ?>" title="<?php echo $wcr_config['wcr_facebook_title']; ?>" target="_blank">
                    <img width="32" height="32" src="<?php echo esc_url(get_template_directory_uri() . '/images/facebook-logo.png'); ?>" alt="<?php echo $wcr_config['wcr_facebook_title']; ?>" />
                </a>
                <a title="QQ：<?php echo $wcr_config['wcr_qq']; ?>" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $wcr_config['wcr_qq']; ?>&site=qq&menu=yes" rel="nofollow">
                    <img width="32" height="32" src="<?php echo esc_url(get_template_directory_uri() . '/images/qq-logo.png'); ?>" alt="<?php echo $wcr_config['wcr_qq']; ?>" />
                </a>
                <a href="<?php echo esc_url(get_template_directory_uri(). '/' . $wcr_config['wcr_weixin_img']); ?>" data-lightbox="image-1" data-title="<?php echo $wcr_config['wcr_weixin_title']; ?>">
                    <img width="32" height="32" src="<?php echo esc_url(get_template_directory_uri() . '/images/weixin-logo.png'); ?>" alt="微信" />
                </a>
                <a href="<?php echo $wcr_config['wcr_weibo_url']; ?>" title="<?php echo $wcr_config['wcr_weibo_title']; ?>" target="_blank">
                    <img width="32" height="32" src="<?php echo esc_url(get_template_directory_uri() . '/images/weibo-logo.png'); ?>" alt="<?php echo $wcr_config['wcr_weibo_title']; ?>" />
                </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p class="ft-text-left"><a href="<?php echo esc_url(home_url('/sitemap.xml')); ?>" target="_blank">站点地图</a></p>
            </div>
            <div class="col-xs-12 col-sm-6">
            <p class="ft-text-right">Powerd By <a href="https://cn.wordpress.org/" rel="external nofollow" target="_blank">WordPress.</a> Theme Designed By <a href="<?php echo esc_url(home_url('/about')); ?>" target="_blank">WangLu</a></p>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="crunchify-top"><i class="fa fa-arrow-up fa-lg"></i></a>
</div> <!-- end #wrapper -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.12.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/statics/bootstrap-3.3.5/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . '/js/common.js'); ?>"></script>
<!-- lightbox -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/js/lightbox/lightbox.min.js'); ?>"></script>
<!-- Crunchify's Scroll to Top Script -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/js/back-top.js'); ?>"></script>
<!-- 极简社会化分享插件 https://www.qinco.net/basicshare -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/statics/basic-share/0.2.min.js'); ?>"></script>
<?php wp_footer(); ?>
</body>
</html>
