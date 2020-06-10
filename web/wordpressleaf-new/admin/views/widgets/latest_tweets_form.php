<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('twitter_id')); ?>"><?php esc_html_e('推特小工具ID', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('twitter_id')); ?>" name="<?php echo esc_attr($widget->get_field_name('twitter_id')); ?>" value="<?php echo esc_attr($instance['twitter_id']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('postcount')); ?>"><?php esc_html_e('消息的数量', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr(@$widget->get_field_id('postcount')); ?>" name="<?php echo esc_attr(@$widget->get_field_name('postcount')); ?>" value="<?php echo esc_attr(@$instance['postcount']); ?>" />
</p>

