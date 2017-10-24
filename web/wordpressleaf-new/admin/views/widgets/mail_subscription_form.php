<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('description')); ?>"><?php esc_html_e('描述', 'diplomat') ?>:</label>
    <textarea class="widefat" id="<?php echo esc_attr($widget->get_field_id('description')); ?>" name="<?php echo esc_attr($widget->get_field_name('description')); ?>" ><?php echo esc_html($instance['description']); ?></textarea>
</p>

<p>
    <input  type="checkbox"  id="<?php echo esc_attr($widget->get_field_id('zipcode')); ?>" name="<?php echo esc_attr($widget->get_field_name('zipcode')); ?>" value="true" <?php checked($instance['zipcode'], 'true'); ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('zipcode')); ?>"><?php esc_html_e('显示邮政编码字段', 'diplomat') ?></label>
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('submit_button')); ?>"><?php esc_html_e('占位符文本', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('submit_button')); ?>" name="<?php echo esc_attr($widget->get_field_name('submit_button')); ?>" value="<?php echo esc_attr($instance['submit_button']); ?>" />
</p>
