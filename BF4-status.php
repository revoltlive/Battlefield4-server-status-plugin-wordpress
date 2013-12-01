<?php
/**
 * @package BF4-status
 * @version 1.0
 */
/*
Plugin Name: BF4 server status
Plugin URI: http://wordpress.org/plugins/BF4status-revoltlive/
Description: A plugin developed by frag-out.com to display your BF4 server status
Author: RevoltLive
Version: 1.0
Author URI: http://frag-out.com/
*/

class example_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function example_widget() {
        parent::WP_Widget(false, $name = 'BF4 server stats');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
$width	= $instance['width'];
$height 	= $instance['height'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							
								<?php echo '<iframe src="http://frag-out.com/widgets/bf4.php?server-id=' .$message. '" width="' .$width. '" height="' .$height. '"  style="border:1px solid #ccc" border="0"></iframe><br><small>Widget by <a href="http://frag-out.com">Frag-Out</a></small>';
                                ?>
							
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['width'] = strip_tags($new_instance['width']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
		$height	= esc_attr($instance['height']);
		$width	= esc_attr($instance['width']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Server ID'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('height'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('width'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
        </p>
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("example_widget");'));
?>