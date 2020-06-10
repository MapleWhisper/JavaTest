<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
$form_index = 0;
if (isset($contact_form['inique_id'])) {
	$form_index = $contact_form['inique_id'];
} else {
	$form_index = uniqid();
}
?>

<a href="#" class="admin-button button-gray js_back_to_forms_list"><?php _e('返回表单列表', 'diplomat'); ?></a>

<br />

<input type="hidden" name="contact_form[<?php echo $form_index; ?>][inique_id]" value="<?php echo $form_index ?>" />

<div class="section">

	<div class="form-holder">

		<div class="form-group-title">
			<input type="text" class="form_name" value="<?php echo esc_attr($contact_form['title']); ?>" name="contact_form[<?php echo $form_index; ?>][title]">
		</div><!--/ .form-group-title-->

		<div class="option">

			<div class="switch">
				<input type="hidden" name="contact_form[<?php echo $form_index; ?>][has_capture]" value="<?php echo($contact_form['has_capture'] ? 1 : 0) ?>" />
				<input type="checkbox" <?php echo($contact_form['has_capture'] ? "checked" : "") ?> class="form_captcha option_checkbox" />
				<label for="form-captcha"><span></span><?php _e('启用验证码', 'diplomat'); ?></label>
				<input type="hidden" name="contact_form_index" value="<?php echo $form_index; ?>" />
			</div><!--/ .switch-->

		</div>

		<a href="#" class="add-drag-holder add-button add_contact_field_button" form-id="<?php echo $form_index ?>"></a>

		<div class="admin-drag-holder clearfix">

			<div class="option option-select">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][submit_button]",
					'title' => __('选择一个提交按钮', 'diplomat'),
					'type' => 'select',
					'values' => TMM_OptionsHelper::get_theme_buttons(),
					'value' => isset($contact_form['submit_button']) ? $contact_form['submit_button'] : 'default-blue',
					'css_class' => '',
					'description' => __('按钮颜色', 'diplomat')
				));
				?>

			</div><!--/ .option-->

			<div class="option option-text">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][submit_button_text]",
					'title' => __('提交按钮文本', 'diplomat'),
					'type' => 'text',
					'value' => __('提交', 'diplomat'),
					'css_class' => '',
					'description' => __('按钮文本', 'diplomat')
				));
				?>

			</div><!--/ .option-->

			<div class="option option-text">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][recepient_email]",
					'title' => __('收件人', 'diplomat'),
					'type' => 'text',
					'value' => @$contact_form['recepient_email'],
					'css_class' => '',
					'description' => __('通常，网站管理员会得到来自全部表单提交者的通知。如果你想接收表单提交到其他邮箱，请在这里输入另一个电子邮件地址。', 'diplomat')
				));
				?>

			</div><!--/ .option-->

		</div>

		<ul class="drag_contact_form_list">

			<?php if (!empty($contact_form['inputs'])) : ?>
				<?php foreach ($contact_form['inputs'] as $key_input => $input) : ?>
					<?php $key_input = uniqid(); ?>

					<li class="admin-drag-holder clearfix">

						<a href="#" class="delete_contact_field_button close"></a>

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[$form_index][inputs][$key_input][type]",
							'title' => __('选择字段类型', 'diplomat'),
							'type' => 'select',
							'values' => TMM_Contact_Form::$types,
							'value' => $input['type'],
							'css_class' => 'options_type_select',
							'description' => __('请确定此字段类型。', 'diplomat')
						));
						?>

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][label]",
							'title' => __('字段标签/占位符', 'diplomat'),
							'type' => 'text',
							'value' => $input['label'],
							'css_class' => 'label',
							'description' => __('命名您的字段元素或元素组（仅对于checkbox/radio控件）在此输入标签。', 'diplomat')
						));
						?>
                        
						<div class="select_options" style="display: <?php echo ($input['type'] == "select" || $input['type'] == "radio" || $input['type'] == "checkbox") ? "block" : "none" ?>;">

							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][options]",
								'title' => __('选项（用英文逗号分隔）', 'diplomat'),
								'type' => 'text',
								'value' => $input['options'],
								'css_class' => 'options',
								'description' => __('输入此字段的字段选项，使用逗号分割的每一个新的选项。', 'diplomat')
							));
							?>

						</div>

						<div class="title_options" style="display: <?php echo $input['type'] == "title" ? "block" : "none" ?>;">

							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][title_heading]",
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
								'value' => $input['title_heading'],
								'css_class' => 'options',
								'description' => __('选择必要的标题，以确定下面的一组元素。', 'diplomat')
							));
							?>

						</div>

						<div class="optional_field" style="display: <?php echo $input['type'] == "checkbox" ? 'block' : 'none' ?>;">
							<label>
							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][optional_field]",
								'type' => 'checkbox',
								'default_value' => 0,
								'title' => __('显示文本字段', 'diplomat'),
								'description' => __('如果启用，一个新的文本框会出现当前选项设置的下面，用户可以用来评论或输入自定义选项。', 'diplomat'),
								'css_class' => '',
								'value' => $input['optional_field'],
								'id' => ''
							));
							?>
								<label>
						</div>

						<label class="with-check" style="display: <?php echo $input['type'] == 'title' ? 'none' : 'block' ?>;">

							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][is_required]",
								'type' => 'checkbox',
								'default_value' => 0,
								'title' => __('必填项', 'diplomat'),
								'description' => __('如果启用，则强制填写字段。', 'diplomat'),
								'css_class' => 'form_required',
								'value' => $input['is_required'],
								'id' => ''
							));
							?>

						</label>

					</li><!--/ .admin-drag-holder-->

				<?php endforeach; ?>
			<?php endif; ?>

		</ul>

		<a href="#" class="add-drag-holder add-button add_contact_field_button" form-id="<?php echo $form_index ?>" style="bottom: -15px;top: auto;"></a>

	</div><!--/ .form-holder-->

</div><!--/ .section-->