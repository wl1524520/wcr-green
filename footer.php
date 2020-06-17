<?php
/**
 * 底部模板
 *
 */
?>

            </div>
            </div>
        </div>
    </div>
    </div>
    
    <footer class="footer">
        <p class="text-center">
<?php echo bloginfo('name') . ' ' . date('Y'); ?> &copy;
<a href="http://www.beian.miit.gov.cn/" rel="external nofollow" target="_blank">
<?php echo get_option('zh_cn_l10n_icp_num'); ?>
</a>
        </p>
    </footer>
    <!-- <a href="#" class="crunchify-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php wp_footer(); ?>
</body>
<?php if(function_exists('wcr_performance')) wcr_performance(false); ?>
</html>
