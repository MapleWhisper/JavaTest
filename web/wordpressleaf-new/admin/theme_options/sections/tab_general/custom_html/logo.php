<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$logo_type = (TMM::get_option('logo_type') === null || TMM::get_option('logo_type') === '0') ? 'text' : 'image';
?>

<div class="option option-radio">
	
	<div class="controls">
		<input id="logoimage" type="radio" class="showhide" data-show-hide="logo_img" name="logo_type" value="1" <?php echo $logo_type === 'image' ? "checked" : ""; ?> />
		<label for="logoimage"><span></span><?php _e('图像', 'diplomat'); ?></label>&nbsp; &nbsp;
		<input id="logotext" type="radio" class="showhide" data-show-hide="logo_text" name="logo_type" value="0" <?php echo $logo_type === 'text' ? "checked" : ""; ?> />
		<label for="logotext"><span></span><?php _e('文本', 'diplomat'); ?></label>
	</div><!--/ .controls-->
	
	<div class="explain"></div>
	
</div><!--/ .option-->	

<ul class="show-hide-items">

	<li class="logo_img" <?php echo ($logo_type === 'image' ? "" : 'style="display:none;"'); ?>>
		
		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_img',
			'type' => 'upload',
			'default_value' => '',
			'description' => __('在此上传您的标志图像。推荐尺寸： width（宽） <= 300px, height（高） = 随意。推荐类型：png，gif，jpg。', 'diplomat'),
			'id' => 'logo_image',
		));
		?>

		<?php $logo_img = TMM::get_option('logo_img') ?>
		<div class="optional">
			<img id="logo_preview_image" style="display: <?php if ($logo_img): ?>inline<?php else: ?>none<?php endif; ?>; max-width:300px;" src="<?php echo esc_url($logo_img); ?>" alt="logo" />
		</div>
		
	</li>
	<li class="logo_text" <?php echo($logo_type === 'text' ? "" : 'style="display:none;"') ?>>
		
		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_text',
			'title'=>__('标志名称', 'diplomat'),
			'type' => 'text',
			'description' => __('在此输入你的网站名字。它将使用文本格式，代替图像标志。', 'diplomat'),
			'default_value' => __('Leaf Of Spring', 'diplomat'),
			'css_class' => 'logo_text_val',
			'is_reset' => true
		));
		?>
		
		<?php
		$logo_font_size = array();
		for ($i = 20; $i < 70; $i++) {
			$logo_font_size[$i] = $i;
		}
		
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_font_size',
			'type' => 'select',
			'title'=> __('标志字体大小', 'diplomat'),
			'description' => '',
			'values' => $logo_font_size,
			'default_value' => TMM_OptionsHelper::get_default_value('logo_font_size'),
			'css_class' => '',
            'is_reset' => true
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_font',
			'title' => __('标志字体家族（中文请选择：Microsoft YaHei或者保持默认就可以了）', 'diplomat'),
			'type' => 'google_font_select',
			'default_value' => TMM_OptionsHelper::get_default_value('logo_font'),
			'fonts' => tmm_get_fonts_array(),
            'is_reset' => true
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_text_color',
			'title'=>__('标志字体颜色', 'diplomat'),
			'type' => 'color',
			'default_value' => TMM_OptionsHelper::get_default_value('logo_text_color'),
			'description' => __('标志文本颜色仅作用于文本标志。不编辑此字段则使用默认主题样式。', 'diplomat'),
			'css_class' => '',
			'is_reset' => true
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'use_logo_two_colors',
			'title' => __('标志使用两种颜色。', 'diplomat'),
			'type' => 'checkbox',
			'default_value' => 1,
			'description' => '',
			'css_class' => 'use_logo_two_colors'
		));
		?>

		<div class="advanced_logo_options">

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'splitted_logo_text',
				'title' => __('借助"^"符号拆分标志。', 'diplomat'),
				'type' => 'text',
				'default_value' => TMM_OptionsHelper::get_default_value('splitted_logo_text'),
				'description' => '',
				'css_class' => 'splitted_logo_text',
				'is_reset' => true
			));
			?>

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'hlight_logo_text_color1',
				'title'=>__('第一部分的文本颜色（亮色页眉类型）', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('hlight_logo_text_color1'),
				'description' => __('仅为第一部分的文本颜色（亮色页眉类型）。不编辑此字段则使用默认主题样式。 ', 'diplomat'),
				'css_class' => '',
				'is_reset' => true
			));
			?>

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'hlight_logo_text_color2',
				'title'=>__('第二部分的文本颜色（亮色页眉类型）', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('hlight_logo_text_color2'),
				'description' => __('仅为第二部分的文本颜色（亮色页眉类型）。不编辑此字段则使用默认主题样式。', 'diplomat'),
				'css_class' => '',
				'is_reset' => true
			));
			?>

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'hdark_logo_text_color1',
				'title'=>__('第一部分的文本颜色（黑色或彩色页眉类型）', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('hdark_logo_text_color1'),
				'description' => __('仅为第一部分的文本颜色（黑色或彩色页眉类型）。不编辑此字段则使用默认主题样式。', 'diplomat'),
				'css_class' => '',
				'is_reset' => true
			));
			?>

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'hdark_logo_text_color2',
				'title'=>__('第二部分的文本颜色（黑色或彩色页眉类型）', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('hdark_logo_text_color2'),
				'description' => __('仅为第二部分的文本颜色（黑色或彩色页眉类型）。不编辑此字段则使用默认主题样式。', 'diplomat'),
				'css_class' => '',
				'is_reset' => true
			));
			?>

		</div>

	</li>
</ul>
