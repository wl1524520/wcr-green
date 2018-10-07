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
        <p class="text-center">&copy; 2014-<?php echo date('Y'); ?> <span style="color: #e27575;font-size: 14px;">❤</span> <?php echo bloginfo('name'); ?></p>
    </footer>
    <!-- <a href="#" class="crunchify-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php wp_footer(); ?>
</body>
<?php if(function_exists('wcr_performance')) wcr_performance(false); ?>
</html>
