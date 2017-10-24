<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="admin-one-half">
	<div class="option option-add-form">

		<h4 classs="option-title"><?php _e('创建一个新皮肤', 'diplomat'); ?></h4>

		<div class="controls">

			<input type="text" id="new_color_scheme_name" class="middle" placeholder="在此输入新皮肤的名称（英文）" />
			<a href="#" class="add-button" id="save_current_color_scheme" title="<?php _e('创建新皮肤', 'diplomat'); ?>"></a>

		</div>


		<div class="explain"></div>

	</div><!--/ .option-->

	<div class="option option-select">

		<h4 class="option-title"><?php _e('加载皮肤', 'diplomat'); ?></h4>

		<div class="controls">

			<?php $theme_schemes = TMM_Ext_Demo::get_theme_schemes(); ?>

			<label class="sel">
				<select id="color_schemes_select">
					<option value=""><?php _e('无', 'diplomat'); ?></option>
					<?php if (!empty($theme_schemes)): ?>
						<?php foreach ($theme_schemes as $value) : ?>
							<option style="color: <?php echo $value['color'] ?>;" value="<?php echo $value['key'] ?>" data-color="<?php echo $value['color'] ?>"><?php echo $value['name'] ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</label>

		</div>

		<div class="explain"></div>

	</div><!--/ .option-->
</div>

<div class="admin-one-half">
	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => '',
		'title' => __('颜色标记', 'diplomat'),
		'type' => 'color',
		'default_value' => '',
		'description' => __('新皮肤名称', 'diplomat'),
		'css_class' => 'new_color_scheme_color',
		'hide_item_html' => 1,
		'placeholder' => __('#ffffff', 'diplomat')
	));
	?>

	<a href="#" class="admin-button button-gray button-medium" id="upload_color_scheme"><?php _e('加载', 'diplomat'); ?></a>
	&nbsp;
	<a href="#" class="admin-button button-gray button-medium" id="edit_color_scheme"><?php _e('修改', 'diplomat'); ?></a>
	&nbsp;
	<a href="#" class="admin-button button-gray button-medium" id="delete_color_scheme"><?php _e('删除', 'diplomat'); ?></a>
</div>
