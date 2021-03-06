<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('pageURL')); ?>"><?php esc_html_e('脸书页面网址', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('pageURL')); ?>" name="<?php echo esc_attr($widget->get_field_name('pageURL')); ?>" value="<?php echo esc_attr($instance['pageURL']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('width')); ?>"><?php esc_html_e('宽度', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('width')); ?>" name="<?php echo esc_attr($widget->get_field_name('width')); ?>" value="<?php echo esc_attr($instance['width']); ?>" />
</p>
<p>
	<?php
	$checked = "";
	if ($instance['faces'] == 'true') {
		$checked = 'checked="checked"';
	}else{
		$instance['faces'] = 'false';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('faces')); ?>" name="<?php echo esc_attr($widget->get_field_name('faces')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('faces')); ?>"><?php esc_html_e("显示朋友们的图片", 'diplomat') ?></label>
</p>
<p>
	<?php
	$checked = "";
	if ($instance['posts'] == 'true') {
		$checked = 'checked="checked"';
	}else{
		$instance['posts']  = 'false';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('posts')); ?>" name="<?php echo esc_attr($widget->get_field_name('posts')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('posts')); ?>"><?php esc_html_e("显示页面文章", 'diplomat') ?></label>
</p>