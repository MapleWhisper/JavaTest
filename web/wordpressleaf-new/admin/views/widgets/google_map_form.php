<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<input type="hidden" value="1" name="tmm_meta_saving" />
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('width')); ?>"><?php esc_html_e('宽', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('width')); ?>" name="<?php echo esc_attr($widget->get_field_name('width')); ?>" value="<?php echo esc_attr($instance['width']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('height')); ?>"><?php esc_html_e('高', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('height')); ?>" name="<?php echo esc_attr($widget->get_field_name('height')); ?>" value="<?php echo esc_attr($instance['height']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('location_mode')); ?>"><?php esc_html_e('定位方式', 'diplomat') ?>:</label>
    <select id="<?php echo esc_attr($widget->get_field_id('location_mode')); ?>" name="<?php echo esc_attr($widget->get_field_name('location_mode')); ?>" class="widefat">
		<?php
		$location_mode = array(
			'address' => __('地址', 'diplomat'),
			'coordinates' => __('坐标', 'diplomat'),
		);
		?>
		<?php foreach ($location_mode as $mode => $location_mode_name) : ?>
			<option <?php echo($mode == $instance['location_mode'] ? "selected" : "") ?> value="<?php echo esc_attr($mode) ?>"><?php echo esc_html($location_mode_name) ?></option>
		<?php endforeach; ?>
    </select>
</p>

<div class="location_mode_<?php echo $widget->get_field_id('location_mode_coordinates'); ?>" style="display: <?php if ($instance['location_mode'] == 'coordinates'): ?>block<?php else: ?>none<?php endif; ?>">
	<p>
		<label for="<?php echo esc_attr($widget->get_field_id('latitude')); ?>"><?php esc_html_e('纬度', 'diplomat') ?>:</label>
		<input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('latitude')); ?>" name="<?php echo esc_attr($widget->get_field_name('latitude')); ?>" value="<?php echo esc_attr($instance['latitude']); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr($widget->get_field_id('longitude')); ?>"><?php esc_html_e('经度', 'diplomat') ?>:</label>
		<input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('longitude')); ?>" name="<?php echo esc_attr($widget->get_field_name('longitude')); ?>" value="<?php echo esc_attr($instance['longitude']); ?>" />
	</p>
</div>

<div class="location_mode_<?php echo $widget->get_field_id('location_mode_address'); ?>" style="display: <?php if ($instance['location_mode'] == 'address'): ?>block<?php else: ?>none<?php endif; ?>">
	<p>
		<label for="<?php echo esc_attr($widget->get_field_id('address')); ?>"><?php esc_html_e('地址', 'diplomat') ?>:</label>
		<input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('address')); ?>" name="<?php echo esc_attr($widget->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
	</p>
</div>


<p>
    <label for="<?php echo esc_attr($widget->get_field_id('mode')); ?>"><?php esc_html_e('模式', 'diplomat') ?>:</label>
    <select id="<?php echo esc_attr($widget->get_field_id('mode')); ?>" name="<?php echo esc_attr($widget->get_field_name('mode')); ?>" class="widefat">
		<?php
		$modes = array(
			'image' => __('图像', 'diplomat'),
			'map' => __('地图', 'diplomat'),
		);
		?>
		<?php foreach ($modes as $mode => $mode_name) : ?>
			<option <?php echo($mode == $instance['mode'] ? "selected" : "") ?> value="<?php echo esc_attr($mode) ?>"><?php echo esc_html($mode_name) ?></option>
		<?php endforeach; ?>
    </select>
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('zoom')); ?>"><?php esc_html_e('缩放', 'diplomat') ?>:</label>
    <select id="<?php echo esc_attr($widget->get_field_id('zoom')); ?>" name="<?php echo esc_attr($widget->get_field_name('zoom')); ?>" class="widefat">
		<?php
		$zoom = array();
		for ($i = 1; $i < 24; $i++) {
			$zoom[] = $i;
		}
		?>
		<?php foreach ($zoom as $i) : ?>
			<option <?php echo($i == $instance['zoom'] ? "selected" : "") ?> value="<?php echo esc_attr($i) ?>"><?php echo esc_html($i) ?></option>
		<?php endforeach; ?>
    </select>
</p>


<p>
    <label for="<?php echo esc_attr($widget->get_field_id('maptype')); ?>"><?php esc_html_e('地图类型', 'diplomat') ?>:</label>
    <select id="<?php echo esc_attr($widget->get_field_id('maptype')); ?>" name="<?php echo esc_attr($widget->get_field_name('maptype')); ?>" class="widefat">
		<?php
		$maptypes = array(
			'ROADMAP' => __('路线', 'diplomat'),
			'SATELLITE' => __('卫星', 'diplomat'),
			'HYBRID' => __('混合', 'diplomat'),
			'TERRAIN' => __('地形', 'diplomat'),
		);
		?>
		<?php foreach ($maptypes as $type) : ?>
			<option <?php echo($type == $instance['maptype'] ? "selected" : "") ?> value="<?php echo esc_attr($type) ?>"><?php echo esc_html($type) ?></option>
		<?php endforeach; ?>
    </select>
</p>

<p>
	<?php
	$checked = "";
	if ($instance['marker'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('marker')); ?>" name="<?php echo esc_attr($widget->get_field_name('marker')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('marker')); ?>"><?php esc_html_e('显示标记', 'diplomat') ?></label>
</p>

<p class="map_<?php echo $widget->get_field_id('mode'); ?>" style="display: <?php echo($instance['mode'] == 'map' ? 'block' : 'none') ?>">
	<?php
	$checked = "";
	if ($instance['popup'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('popup')); ?>" name="<?php echo esc_attr($widget->get_field_name('popup')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('popup')); ?>"><?php esc_html_e('显示弹出窗口', 'diplomat') ?></label>
</p>

<p class="map_<?php echo $widget->get_field_id('mode'); ?>" style="display: <?php echo($instance['mode'] == 'map' ? 'block' : 'none') ?>">
	<?php
	$checked = "";
	if ($instance['scrollwheel'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('scrollwheel')); ?>" name="<?php echo esc_attr($widget->get_field_name('scrollwheel')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('scrollwheel')); ?>"><?php esc_html_e('显示滚动', 'diplomat') ?></label>
</p>


<p class="map_<?php echo $widget->get_field_id('mode'); ?>" style="display: <?php echo($instance['mode'] == 'map' ? 'block' : 'none') ?>">
    <label for="<?php echo esc_attr($widget->get_field_id('popup_text')); ?>"><?php esc_html_e('弹出文字', 'diplomat') ?>:</label>
    <textarea name="<?php echo esc_attr($widget->get_field_name('popup_text')); ?>" id="<?php echo esc_attr($widget->get_field_id('popup_text')); ?>" class="widefat"><?php echo esc_attr($instance['popup_text']); ?></textarea>
</p>


<script type="text/javascript">
	jQuery(function() {
		jQuery("#<?php echo $widget->get_field_id('mode'); ?>").on('change', function() {
			if (jQuery(this).val() == 'map') {
				jQuery(".map_<?php echo $widget->get_field_id('mode'); ?>").show();
			} else {
				jQuery(".map_<?php echo $widget->get_field_id('mode'); ?>").hide();
			}
		});

		//***

		jQuery("#<?php echo $widget->get_field_id('location_mode'); ?>").on('change', function() {
			if (jQuery(this).val() == 'address') {
				jQuery(".location_mode_<?php echo $widget->get_field_id('location_mode_address'); ?>").show();
				jQuery(".location_mode_<?php echo $widget->get_field_id('location_mode_coordinates'); ?>").hide();
			} else {
				jQuery(".location_mode_<?php echo $widget->get_field_id('location_mode_coordinates'); ?>").show();
				jQuery(".location_mode_<?php echo $widget->get_field_id('location_mode_address'); ?>").hide();
			}
		});
	});
</script>