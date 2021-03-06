<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('username')); ?>"><?php esc_html_e('Flickr用户名', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('username')); ?>" name="<?php echo esc_attr($widget->get_field_name('username')); ?>" value="<?php echo esc_attr($instance['username']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('imagescount')); ?>"><?php esc_html_e('图像的数量', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr(@$widget->get_field_id('imagescount')); ?>" name="<?php echo esc_attr(@$widget->get_field_name('imagescount')); ?>" value="<?php echo esc_attr(@$instance['imagescount']); ?>" />
</p>

