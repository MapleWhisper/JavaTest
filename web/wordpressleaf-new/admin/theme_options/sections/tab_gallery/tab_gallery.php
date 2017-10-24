<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
//$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';
//*************************************

$content = array(
	'block1' => array(
		'title' => __('单个相册页面', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'gall_single_show_bio' => array(
				'title' => __('显示/隐藏作者信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_show_bio'),
				'description' => __('如果选中，作者的信息框将出现在每个相册的结尾。', 'diplomat'),
				'custom_html' => ''
			),

			'gall_single_show_social_share' => array(
				'title' => __('显示/隐藏社交媒体分享', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_show_social_share'),
				'description' => __('如果选中，社交媒体分享框将出现在每个相册的结尾。', 'diplomat'),
				'custom_html' => ''
			),
			'gall_single_show_posts_nav' => array(
				'title' => __('显示/隐藏相册导航', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_show_posts_nav'),
				'description' => __('如果选中，则将在每个相册的结尾出现导航框。', 'diplomat'),
				'custom_html' => ''
			),

			'gall_single_show_all_metadata' => array(
				'title' => __('显示/隐藏所有元信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_show_all_metadata'),
				'description' => __('如果选中，相册名称下所有的元信息会消失，如日期、作者、标签等选项，将无视下面的四个选项。', 'diplomat'),
				'custom_html' => ''
			),
			'gall_single_show_likes' => array(
				'title' => __('隐藏/显示相册喜欢数量', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_show_likes'),
				'description' => __('如果选中，画廊喜欢的数字将出现在相册标题下。', 'diplomat'),
				'custom_html' => ''
			),
			'gall_single_page' => array(
				'title' => __('启用/禁用相册项的单页', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('gall_single_page'),
				'description' => __('如果选中，所有的画廊标题将出现到单页链接。', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
);

$sections = array(
	'name' => __('相册', 'diplomat'),
	'css_class' => 'shortcut-blog',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-format-gallery'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

