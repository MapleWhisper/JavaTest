<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'favicon_img' => array(
		'title' => __('网站的图标', 'diplomat'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/favicon.ico',
		'description' => __('在此上传你的图标。它将出现在您的浏览器的地址栏，如下例所示。推荐尺寸：16x16。推荐的图像类型：PNG，ICO。', 'diplomat'),
		'custom_html' => TMM::draw_free_page($pagepath . 'favicon_img.php')
	),
	'block_css_compress' => array(
		'title' => __('主题性能', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'compress_css' => array(
				'title' => __('压缩主CSS文件', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => __('如果选中，CSS文件将生成压缩格式。注意此项有可能导致CSS文件失效，请直接用备份的CSS文件覆盖。', 'diplomat'),
				'custom_html' => ''

			)
		)
	),
	'blocks_speed' => array(
		'title' => __('区块弹出的速度', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'appearing_speed' => array(
				'title' => __('弹出区块的动画效果的速度', 'diplomat'),
				'type' => 'text',
				'default_value' => '50',
				'description' => __('设置一个毫秒值', 'diplomat'),
				'custom_html' => ''

			)
		)
	),
	'header_type' => array(
		'title' => __('页眉类型', 'diplomat'),
		'type' => 'select',
		'default_value' => 'classic',
		'values' => array(
			'light' => __('默认明亮', 'diplomat'),
			'dark' => __('默认暗黑', 'diplomat'),
			'blue' => __('默认蓝色', 'diplomat'),
			'alternate' => __('交替出现', 'diplomat')
		),
		'description' => __('此选项影响全部的网站页面。无论是经典还是交替都会为每一个页面指定唯一的页眉类型。', 'diplomat'),
		'custom_html' => ''
	),
	
	'block_website_width' => array(
		'title' => __('网站布局设置', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'website_width' => array(
				'title' => __('布局呈现', 'diplomat'),
				'type' => 'select',
				'values' => array(
					'px' => __('设置像素值', 'diplomat'),
					'per' => __('设置百分比值', 'diplomat'),
				),
				'default_value' => 'px',
				'description' => __('选择网站布局选项，使用像素或百分比。这两个选项也支持响应布局。', 'diplomat'),
				'custom_html' => '',
				'css_class' => 'website_width_switcher'
			),
			'website_width_px' => array(
				'title' => __('网站宽度', 'diplomat'),
				'type' => 'text',
				'default_value' => TMM_OptionsHelper::get_default_value('website_width_px'),
				'description' => __('您的网站宽度将会是一个固定的宽度，宽度使用像素。', 'diplomat'),
				'custom_html' => '',
				'css_class' => 'website_width_px'
			),
			'website_width_per' => array(
				'title' => __('布局呈现', 'diplomat'),
				'type' => 'text',
				'default_value' => TMM_OptionsHelper::get_default_value('website_width_per'),
				'description' => __('您的网站宽度将会是一个变动的宽度，宽度使用百分比。', 'diplomat'),
				'custom_html' => '',
				'css_class' => 'website_width_per'
			)
		),
	),
	'logo' => array(
		'title' => __('网站标志', 'diplomat'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'logo.php')
	),
	'sidebar_position' => array(
		'title' => __('默认侧边栏位置', 'diplomat'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'sidebar_position.php')
	),
    'rtl_suport' => array(
		'title' => __('激活 RTL 支持', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => '',
		'custom_html' => ''
	),
	'use_wptexturize' => array(
		'title' => __('启用将纯文本字符转换成格式化的 HTML 实体（wptexturize）', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => '',
		'custom_html' => ''
	),
	'hide_breadcrumb' => array(
		'title' => __('禁用面包屑导航', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => __('如果选中，将在所有的页面上禁用面包屑导航。', 'diplomat'),
		'custom_html' => ''
	),
	'fixed_menu' => array(
		'title' => __('使用固定菜单', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => '',
		'custom_html' => ''
	),
	'page_loader' => array(
		'title' => __('显示/隐藏页面加载动画', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => '',
		'custom_html' => ''
	),
  'avatar_cache' => array(
		'title' => __('启用头像缓存', 'diplomat'),
		'type' => 'checkbox',
		'default_value' =>  0,
		'description' => '打勾表示开启。注意：请先在网站根目录下建立名为“avatar”的文件夹，例如“www.wordpressleaf.com/avatar/”。重要：在某些老的站点，更换Leaf主题开启头像缓存时，由于需要缓存的头像太多，可能会导致服务器卡死。',
		'custom_html' => ''
	),
);

$content = apply_filters('tmm_add_general_theme_option', $content);

$sections = array(
	'name' => __("常规", 'diplomat'),
	'css_class' => 'shortcut-options',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-admin-settings'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

