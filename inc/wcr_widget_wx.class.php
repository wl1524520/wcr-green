<?php
class WCR_Widget_wx extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wcr_list_pages_widget',
            '关注微信',
            array(
                'description' => '扫描微信二维码'
            )
        );
    }

    function form( $instance ) {
        $title = esc_attr($instance['title']);
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
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '关注微信' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
?>
        <div>
            <img src="<?php global $wcr_config; echo esc_url(get_template_directory_uri(). '/' . $wcr_config['wcr_weixin_img']); ?>" class="img-responsive center-block">
        </div>
<?php
		echo $args['after_widget'];
    }
}

function wcr_wx_widget() {
    register_widget( 'WCR_Widget_wx' );
}
add_action( 'widgets_init', 'wcr_wx_widget' );
