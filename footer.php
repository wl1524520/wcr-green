<?php
/**
 * 底部模板
 *
 */
?>

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
            <p class="pull-left">
                由 <a href="https://wanglu.info/guestbook">戊辰人</a> 设计和编码 <span style="color: #e27575;font-size: 14px;">❤</span>
            </p>

            <p class="pull-right">
                <span><a title="<?php echo bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a> &copy; 2018<span>
            </p>
            </div>
        </div>
        </div>
    </footer>
    <!-- <a href="#" class="crunchify-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a> -->

</div> <!-- end #wrapper -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https:////cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- 极简社会化分享插件 https://www.qinco.net/basicshare -->

<?php wp_footer(); ?>
</body>
<?php if(function_exists('wcr_performance')) wcr_performance(false); ?>
</html>
