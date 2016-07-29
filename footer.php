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
                <p class="ft-text-left">&copy; 版权所有 2014-2016 <a title="<?php echo bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="ft-text-center">E-mail：<?php echo get_bloginfo('admin_email'); ?></p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="ft-text-right">
                    <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
            <p class="ft-text-left">Powerd By <a href="https://cn.wordpress.org/" rel="external nofollow" target="_blank">WordPress.</a></p>
            </div>
            <div class="col-xs-12 col-sm-6">
            <p class="ft-text-right">Theme Designed By <a title="<?php echo bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/about')); ?>" target="_blank">戊辰人.</a></p>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="crunchify-top"><i class="fa fa-arrow-up fa-lg"></i></a>
</div> <!-- end #wrapper -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.12.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo wcr_template_path() . '/statics/bootstrap-3.3.5/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . '/js/common.js'); ?>"></script>
<!-- 极简社会化分享插件 https://www.qinco.net/basicshare -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/statics/basic-share/0.2.min.js'); ?>"></script>
<?php wp_footer(); ?>
</body>
<?php if(function_exists('wcr_performance')) wcr_performance(false); ?>
</html>
