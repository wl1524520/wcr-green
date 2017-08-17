<?php
/**
 * 底部模板
 *
 */
?>

<footer id="footer">
    <p class="text-center">
        <span><a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a><span>
        <span>&copy; 2014-2017 <a title="<?php echo bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a><span>
    </p>
</footer>
<a href="#" class="crunchify-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a>
</div> <!-- end #wrapper -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . '/js/common.js'); ?>"></script>
<!-- 极简社会化分享插件 https://www.qinco.net/basicshare -->
<script src="<?php echo esc_url(get_template_directory_uri() . '/statics/basic-share/0.2.min.js'); ?>"></script>
<?php wp_footer(); ?>
</body>
<?php if(function_exists('wcr_performance')) wcr_performance(false); ?>
</html>
