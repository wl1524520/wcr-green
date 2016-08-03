<?php
class WCR_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wcr_widget_status',
            '站点统计',
            array(
                'description' => '站点统计功能'
            )
        );
    }

    function form( $instance ) {
        if(isset($instance['title']))
            $title = esc_attr($instance['title']);
        else
            $title = '';
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
    }

    function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '站点统计' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
?>
        <ul>
            <li>日志数量：<?php
                    $count_posts = wp_count_posts();
                    echo $published_posts = $count_posts->publish;
                ?> 篇
            </li>

            <li>评论数量：<?php echo get_comments(array('count'=>true)); ?> 条</li>
            <li>标签数量：<?php echo $count_tags = wp_count_terms('post_tag'); ?> 个</li>
            <li>建站日期：2014年11月11日</li>
            <li>运行天数：<?php echo floor((time()-strtotime("2014-11-11"))/86400) . ' 天'; ?></li>
            </ul>
<?php
		echo $args['after_widget'];
    }
}

function wcr_widget_status() {
    register_widget( 'WCR_Widget' );
}
add_action('widgets_init', 'wcr_widget_status');
