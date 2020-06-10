<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//*************************************

$content = array(

	'skin_composer' => array(
		'title' => __('皮肤生成器', 'diplomat'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'skin_composer.php')
	),

	'show_style_switcher' => array(
		'title' => __('显示/隐藏样式开关', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => __('显示/隐藏前端的样式开关。', 'diplomat'),
		'custom_html' => ''
	),

	'block0' => array(
		'title' => __('元素', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'general_elements' => array(
				'title' => __('网站元素的颜色', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_elements'),
				'description' => __('常规网站元素的颜色（如图标、部分背景等元素）。不编辑此字段则使用默认的主题样式。注意：如果需要的话，下面的所有样式都可以覆盖这个颜色。 ', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
		)
	),
	'block1' => array(
		'title' => __('文本', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'general_font_family' => array(
				'title' => __('网站字体家族', 'diplomat'),
				'type' => 'google_font_select',
				'default_value' => TMM_OptionsHelper::get_default_value('general_font_family'),
				'description' => '',
				'custom_html' => '',
				'is_reset' => true
			),
			'general_font_size' => array(
				'title' => __('网站字体大小', 'diplomat'),
				'type' => 'slider',
				'default_value' => TMM_OptionsHelper::get_default_value('general_font_size'),
				'min' => 12,
				'max' => 18,
				'description' => __('常规网站字体大小，使用像素。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
			'general_text_color' => array(
				'title' => __('网站字体颜色', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_text_color'),
				'description' => __('常规网站文本颜色。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
			'general_normal_links_color' => array(
				'title' => __('网站一般链接颜色', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_normal_links_color'),
				'description' => __('常规网站链接颜色。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
			'general_mouseover_links_color' => array(
				'title' => __('网站鼠标悬停链接颜色', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_mouseover_links_color'),
				'description' => __('常规网站鼠标悬停链接颜色。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
		)
	),
	'block2' => array(
		'title' => __('背景', 'diplomat'),
		'type' => 'items_block',
		'items' => array(

			'header_top_bg_color' => array(
				'title' => __('网站顶头背景', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('header_top_bg_color'),
				'description' => __('常规网站顶头背景颜色。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),

			'header_bottom_bg_color' => array(
				'title' => __('网站底头背景', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('header_bottom_bg_color'),
				'description' => __('常规网站底头背景。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
			'header_bottom_bg_blue_color' => array(
				'title' => __('网站底头背景（默认蓝头类型）)', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('header_bottom_bg_blue_color'),
				'description' => __('常规网站底头颜色（默认蓝色头类型）。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),

			'body_pattern_selected' => array(
				'title' => __('网站背景', 'diplomat'),
				'type' => 'select',
				'css_class' => 'showhide',
				'default_value' => TMM_OptionsHelper::get_default_value('body_pattern_selected'),
				'values' => array(
					0 => __('背景颜色', 'diplomat'),
					1 => __('自定义背景图像', 'diplomat'),
					2 => __('样式', 'diplomat'),
				),
				'description' => __('常规网站背景。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => TMM::draw_free_page($pagepath . 'body_pattern_selected.php'),
				'is_reset' => true
			),

			'general_footer_top_bg_color' => array(
				'title' => __('网站顶脚背景', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_footer_top_bg_color'),
				'description' => __('常规网站顶脚背景颜色（这个顶部区域在版权信息位置）。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
			'general_footer_bottom_bg_color' => array(
				'title' => __('网站底脚背景', 'diplomat'),
				'type' => 'color',
				'default_value' => TMM_OptionsHelper::get_default_value('general_footer_bottom_bg_color'),
				'description' => __('常规网站底脚背景颜色（这个底部区域在版权信息位置）。不编辑此字段则使用默认的主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),

		)
	),
	'custom_css' => array(
		'title' => __('自定义CSS样式', 'diplomat'),
		'type' => 'textarea',
		'default_value' => '',
		'description' => '',
		'custom_html' => ''
	),
);
//*************************************

$child_sections['styling_headings'] = array(
	'name' => __('标题', 'diplomat'),
	'sections' => array(
		'block1' => array(
			'title' => __('H1 标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h1_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h1_font_family'),
					'description' => __('H1 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h1_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h1_font_size'),
					'min' => 35,
					'max' => 48,
					'description' => __('H1 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h1_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h1_font_color'),
					'description' => __('H1标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block2' => array(
			'title' => __('H2标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h2_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h2_font_family'),
					'description' => __('H2 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h2_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h2_font_size'),
					'min' => 25,
					'max' => 48,
					'description' => __('H2 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h2_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h2_font_color'),
					'description' => __('H2 标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block3' => array(
			'title' => __('H3 标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h3_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h3_font_family'),
					'description' => __('H3 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h3_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h3_font_size'),
					'min' => 18,
					'max' => 28,
					'description' => __('H3 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h3_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h3_font_color'),
					'description' => __('H3 标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block4' => array(
			'title' => __('H4 标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h4_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h4_font_family'),
					'description' => __('H4 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h4_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h4_font_size'),
					'min' => 16,
					'max' => 26,
					'description' => __('H4 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h4_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h4_font_color'),
					'description' => __('H4 标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block5' => array(
			'title' => __('H5 标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h5_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h5_font_family'),
					'description' => __('H5 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h5_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h5_font_size'),
					'min' => 14,
					'max' => 24,
					'description' => __('H5 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h5_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h5_font_color'),
					'description' => __('H5 标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block6' => array(
			'title' => __('H6 标题', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'h6_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('h6_font_family'),
					'description' => __('H6 标题字体使用谷歌字体。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h6_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('h6_font_size'),
					'min' => 12,
					'max' => 20,
					'description' => __('H6 标题字体大小使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'h6_font_color' => array(
					'title' => __('字体颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('h6_font_color'),
					'description' => __('H6 标题内容的颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
	)
);
//*************************************
$child_sections['styling_main_navigation'] = array(
	'name' => __('主导航菜单', 'diplomat'),
	'sections' => array(
		'block1' => array(
			'title' => __('常规', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'main_nav_font' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_font'),
					'description' => '',
					'custom_html' => '',
					'is_reset' => true
				),
				'main_nav_first_level_font_size' => array(
					'title' => __('第一层字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_first_level_font_size'),
					'min' => 12,
					'max' => 16,
					'description' => __('主导航菜单第一层字体大小，使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'main_nav_second_level_font_size' => array(
					'title' => __('第二层字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_second_level_font_size'),
					'min' => 11,
					'max' => 15,
					'description' => __('主导航菜单第二层字体大小，使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block2' => array(
			'title' => __('链接颜色（第一层）', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'main_nav_def_text_color' => array(
					'title' => __('正常', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_def_text_color'),
					'description' => __('一个正常、已访问和未访问的主导航链接颜色。不编辑此字段使用默认主题样式。 ', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block3' => array(
			'title' => __('链接颜色（第二层）', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'main_nav_dd_def_text_color' => array(
					'title' => __('正常', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_dd_def_text_color'),
					'description' => __('一个正常、已访问和未访问的主导航链接颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'main_nav_dd_hover_bg_color' => array(
					'title' => __('鼠标悬停背景', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('main_nav_dd_hover_bg_color'),
					'description' => __('一个鼠标悬停时的链接。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		)
	)
);
//*************************************
$child_sections['styling_content'] = array(
	'name' => __('内容', 'diplomat'),
	'sections' => array(
		'block1' => array(
			'title' => __('链接颜色选项', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'content_normal_link_color' => array(
					'title' => __('正常', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('content_normal_link_color'),
					'description' => __('一个正常、已访问和未访问的链接颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'content_mouseover_link_color' => array(
					'title' => __('鼠标悬停', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('content_mouseover_link_color'),
					'description' => __('一个鼠标悬停时的链接。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block2' => array(
			'title' => __('捐赠按钮', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'donate_buttons_bg' => array(
					'title' => __('捐赠按钮背景', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('donate_buttons_bg'),
					'description' => __('选中和悬停按钮颜色。 不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)
			)
		),
		'block3' => array(
			'title' => __('分页', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'pagination_bg' => array(
					'title' => __('分页按钮背景', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('pagination_bg'),
					'description' => __('活动和悬停按钮颜色。 不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)
			)
		),
		'block4' => array(
			'title' => __('搜索按钮颜色Search Button Color', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'search_button_color' => array(
					'title' => '',
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('search_button_color'),
					'description' => __('搜索按钮颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)
			)
		)
	)
);
//*************************************
$child_sections['styling_buttons'] = array(
	'name' => __('按钮', 'diplomat'),
	'sections' => array(
		'block1' => array(
			'title' => __('常规样式', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'buttons_font_family' => array(
					'title' => __('字体家族', 'diplomat'),
					'type' => 'google_font_select',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_font_family'),
					'description' => '',
					'custom_html' => '',
					'is_reset' => true
				),
				'buttons_font_size' => array(
					'title' => __('字体大小', 'diplomat'),
					'type' => 'slider',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_font_size'),
					'min' => 11,
					'max' => 20,
					'description' => __('常规按钮字体大小，使用像素。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block2' => array(
			'title' => __('正常颜色样式', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'buttons_text_color' => array(
					'title' => __('文本', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_text_color'),
					'description' => __('一个正常、已访问、未访问的默认按钮文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'buttons_bg_color' => array(
					'title' => __('背景', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_bg_color'),
					'description' => __('一个正常、已访问、未访问的默认按钮背景颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
                'buttons_border_color' => array(
					'title' => __('边框颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_border_color'),
					'description' => __('一个正常、已访问、未访问的默认按钮边框颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
		'block3' => array(
			'title' => __('鼠标悬停颜色样式', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'buttons_hover_text_color' => array(
					'title' => __('文本', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_hover_text_color'),
					'description' => __('当用户鼠标悬停在上面时的默认按钮文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'buttons_hover_bg_color' => array(
					'title' => __('背景', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_hover_bg_color'),
					'description' => __('当用户鼠标悬停在上面时的默认按钮背景颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
                'buttons_hover_border_color' => array(
					'title' => __('边框颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('buttons_hover_border_color'),
					'description' => __('一个正常、已访问、未访问的默认按钮边框颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
			)
		),
	)
);
//*************************************
$child_sections['styling_widgets'] = array(
	'name' => __('小工具', 'diplomat'),
	'sections' => array(
		'block1' => array(
			'title' => __('正常颜色样式', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'widget_title_color' => array(
					'title' => __('标题颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('widget_title_color'),
					'description' => __('小工具标题的文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'widget_title_bg_color' => array(
					'title' => __('标题背景颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('widget_title_bg_color'),
					'description' => __('小工具标题的背景颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'widget_text_color' => array(
					'title' => __('文本颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('widget_text_color'),
					'description' => __('小工具文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)

			)
		),
		'block2' => array(
			'title' => __('页脚小工具', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'footer_widget_title_color' => array(
					'title' => __('标题颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('footer_widget_title_color'),
					'description' => __('页脚小工具标题的文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'footer_widget_text_color' => array(
					'title' => __('文本颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('footer_widget_text_color'),
					'description' => __('页脚小工具文本颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)
			)
		),
		'block2' => array(
			'title' => __('特色活动小工具', 'diplomat'),
			'type' => 'items_block',
			'items' => array(
				'featured_event_widget_title_bg_color' => array(
					'title' => __('标题背景颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('featured_event_widget_title_bg_color'),
					'description' => __('特色活动小工具标题背景颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				),
				'featured_event_widget_date_bg_color' => array(
					'title' => __('数据背景颜色', 'diplomat'),
					'type' => 'color',
					'default_value' => TMM_OptionsHelper::get_default_value('featured_event_widget_date_bg_color'),
					'description' => __('特色活动小工具数据背景颜色。不编辑此字段使用默认主题样式。', 'diplomat'),
					'custom_html' => '',
					'is_reset' => true
				)
			)
		),
	)
);

//*************************************
//*************************************
$sections = array(
	'name' => __('样式', 'diplomat'),
	'css_class' => 'shortcut-styling',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
    'menu_icon' => 'dashicons-welcome-write-blog'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;


