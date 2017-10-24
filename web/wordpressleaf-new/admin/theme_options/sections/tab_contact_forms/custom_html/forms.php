<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="js_contact_forms_panel">

	<div class="option option-add-form">

		<h4 class="option-title"><?php _e('添加新表单', 'diplomat'); ?></h4>

		<div class="controls">
			<input type="text" value="" placeholder="<?php _e("在此输入标题（英文）", 'diplomat') ?>" id="new_contact_form_name" />
			<div class="add-button js_add_form"></div>
		</div><!--/ .controls-->
		<div class="explain"></div>

	</div><!--/ .option-->

	<hr />

	<ul class="groups contact_forms_groups_list">
		<?php unset($contact_forms['__INIQUE_ID__']); ?>
		<?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
			<?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>				
				<li>
					<a data-id="contact_form_<?php echo $contact_form_id ?>" class="js_edit_contact_form" href="#"><?php echo esc_attr($contact_form['title']); ?></a>
					<a href="#" title="<?php _e("删除", 'diplomat') ?>" class="remove delete_contact_form" data-id="contact_form_<?php echo $contact_form_id ?>"></a>
					<a data-id="contact_form_<?php echo $contact_form_id ?>" href="#" title="<?php _e("编辑", 'diplomat') ?>" class="edit js_edit_contact_form"></a>
				</li>
			<?php endforeach; ?>
		<?php else: ?>
			<li class="js_no_one_item_else"><span><?php _e('你还没有创建任何分组。请使用上面的表单创建一个。', 'diplomat'); ?></span></li>
		<?php endif; ?>
	</ul>
<br />
</div>

<input type="hidden" name="contact_form[]" value="" />
<ul id="contact_forms_list">
	<?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
		<?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>
			<?php
			if ($contact_form_id == '__INIQUE_ID__') {
				continue;
			}
			?>
			<li style="display: none;" id="contact_form_<?php echo $contact_form_id ?>">
				<?php echo TMM::draw_free_page($custom_html_pagepath . 'form.php', array('contact_form' => $contact_form)); ?>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>



<div style="display: none;" id="contact_form_template">

	<a href="#" class="admin-button button-gray js_back_to_forms_list"><?php _e('返回表单列表', 'diplomat'); ?></a>

	<br />
	<br />
	<br />

	<div class="section">

		<div class="form-holder">	

			<input type="hidden" name="contact_form[__INIQUE_ID__][inique_id]" value="__INIQUE_ID__" />

			<div class="form-group-title">
				<input type="text" class="form_name" value="__FORM_NAME__" name="contact_form[__INIQUE_ID__][title]">
			</div>
			
			<div class="option">
				
				<div class="switch">
					<input type="hidden" name="contact_form[__INIQUE_ID__][has_capture]" value="0" />
					<input type="checkbox" class="form_captcha option_checkbox" />
					<label for="form-captcha"><span></span><?php _e('启用验证码', 'diplomat'); ?></label>
					<input type="hidden" name="contact_form_index" value="__INIQUE_ID__" />
				</div>
			
			</div>

			<a href="#" class="add-drag-holder add-button add_contact_field_button" form-id="__INIQUE_ID__"></a>
			<a href="#" class="remove-drag-holder delete_contact_form" data-id="__INIQUE_ID__"></a><br />

			<div class="admin-drag-holder clearfix">

				<div class="option option-select contact_form_submit_button">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][submit_button]",
						'title' => __('选择提交按钮', 'diplomat'),
						'type' => 'select',
						'values' => TMM_OptionsHelper::get_theme_buttons(),
						'value' => '',
						'css_class' => '',
						'description' => __('按钮颜色', 'diplomat'),
					));
					?>				
				</div>

				<div class="option option-text">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][submit_button_text]",
						'title' => __('提交按钮文本', 'diplomat'),
						'type' => 'text',
						'value' => __('提交', 'diplomat'),
						'css_class' => '',
						'description' => __('按钮文本', 'diplomat')
					));
					?>
				</div>

				<div class="option option-text">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][recepient_email]",
						'title' => __('收件人', 'diplomat'),
						'type' => 'text',
						'value' => "",
						'css_class' => '',
						'description' => __('通常，网站管理员会得到来自全部表单提交者的通知。如果你想接收表单提交到其他邮箱，请在这里输入另一个电子邮件地址。', 'diplomat')
					));
					?>
				</div>

			</div>

			<ul class="drag_contact_form_list">

				<li class="admin-drag-holder clearfix">

					<a href="#" class="delete_contact_field_button close"></a>

					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][inputs][0][type]",
						'title' => __('选择字段类型', 'diplomat'),
						'type' => 'select',
						'values' => TMM_Contact_Form::$types,
						'value' => '',
						'css_class' => 'options_type_select',
						'description' => __('请确定此字段类型。', 'diplomat')
					));
					?>

					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][inputs][0][label]",
						'title' => __('字段标签/占位符', 'diplomat'),
						'type' => 'text',
						'value' => '',
						'css_class' => 'label',
						'description' => __('命名您的字段元素或元素组（仅对于checkbox/radio控件）在此输入标签。', 'diplomat')
					));
					?>

					<div class="select_options" style="display: none;">

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[__INIQUE_ID__][inputs][0][options]",
							'title' => __('选项（用英文逗号分隔）', 'diplomat'),
							'type' => 'text',
							'value' => '',
							'css_class' => 'options',
							'description' => __('输入此字段的字段选项，使用逗号分割的每一个新的选项。', 'diplomat')
						));
						?>
					</div>

					<div class="optional_field" style="display: none;">
						<label>
						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[__INIQUE_ID__][inputs][0][optional_field]",
							'type' => 'checkbox',
							'default_value' => 0,
							'title' => __('显示文本字段', 'diplomat'),
							'description' => __('如果启用，一个新的文本框会出现当前选项设置的下面，用户可以用来评论或输入自定义选项。', 'diplomat'),
							'css_class' => '',
							'value' => 0,
							'id' => ''
						));
						?>
						</label>
					</div>


					<label class="with-check">
						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[__INIQUE_ID__][inputs][0][is_required]",
							'type' => 'checkbox',
							'default_value' => 0,
							'title' => __('必填项', 'diplomat'),
							'description' => __('如果启用，则强制填写字段。', 'diplomat'),
							'css_class' => 'form_required',
							'value' => 0,
							'id' => ''
						));
						?>
					</label>

				</li><!--/ .admin-drag-holder-->

			</ul>

		</div><!--/ .form-holder-->	

	</div><!--/ .section-->

</div>

<div style="display: none;" id="contact_form_field_template">

	<li class="admin-drag-holder clearfix">

		<a href="#" class="delete_contact_field_button close"></a>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][type]",
			'title' => __('选择字段类型', 'diplomat'),
			'type' => 'select',
			'values' => TMM_Contact_Form::$types,
			'value' => '',
			'css_class' => 'options_type_select',
			'description' => __('请确定此字段类型。', 'diplomat')
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][label]",
			'title' => __('字段标签/占位符', 'diplomat'),
			'type' => 'text',
			'value' => "",
			'css_class' => 'label',
			'description' => __('命名您的字段元素或元素组（仅对于checkbox/radio控件）在此输入标签。', 'diplomat')
		));
		?>

		<div class="select_options" style="display: none;">

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][options]",
				'title' => __('选项（用英文逗号分隔）', 'diplomat'),
				'type' => 'text',
				'value' => '',
				'css_class' => 'options',
				'description' => __('输入此字段的字段选项，使用逗号分割的每一个新的选项。', 'diplomat')
			));
			?>

		</div>

		<div class="title_options" style="display: none;">

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][title_heading]",
				'title' => __('标题头', 'diplomat'),
				'type' => 'select',
				'values' => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				),
				'value' => '',
				'css_class' => 'options',
				'description' => __('选择必要的标题，以确定下面的一组元素。', 'diplomat')
			));
			?>

		</div>

		<label class="with-check">
			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][is_required]",
				'type' => 'checkbox',
				'default_value' => 0,
				'title' => __('必填项', 'diplomat'),
				'description' => __('如果启用，则强制填写字段。', 'diplomat'),
				'css_class' => 'form_required',
				'value' => 0,
				'id' => ''
			));
			?>
		</label>

	</li><!--/ .admin-drag-holder-->

</div>