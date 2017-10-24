<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'donate_button' => array(
		'title' => __('捐赠按钮', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'show_donate_button' => array(
				'title' => __('捐赠按钮', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => '1',
				'description' => __('显示或隐藏首页的捐赠按钮', 'diplomat'),
				'custom_html' => ''
			),
			'donate_button_text' => array(
				'title' => __('捐赠按钮文本', 'diplomat'),
				'type' => 'text',
				'default_value' => __('捐赠', 'diplomat'),
				'description' => __('捐赠按钮文本', 'diplomat'),
				'custom_html' => ''
			),
			'donate_button_url_type' => array(
				'title' => '',
				'type' => 'custom',
				'default_value' => '0',
				'description' => '',
				'custom_html' => TMM::draw_free_page($pagepath . 'donate_button_url.php')
			),
			'donate_button_target' => array(
				'title' => __('捐赠按钮目标', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => '1',
				'description' => __('在一个新窗口打开链接', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
	'login_buttons' => array(
		'title' => __('登录与注册按钮', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'show_login_buttons' => array(
				'title' => __('显示按钮', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => '1',
				'description' => __('显示或隐藏登录与注册按钮', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
    'socials' => array(
		'title' => __('社交媒体图标', 'diplomat'),
		'type' => 'items_block',
		'items' => array()
	),
);

$social_types = tmm_get_social_types();

foreach ($social_types as $key => $type) {

	$content['socials']['items']['show_'.$key.'_social_icon'] = array(
		'title' => $type['name'] . __(' 社交媒体', 'diplomat'),
		'type' => ($key === 'rss') ? 'checkbox' : 'text',
		'default_value' => ($key === 'rss') ? 0 : $type['link'],
		'description' => sprintf(__('在页面顶部显示或隐藏 %s 社交媒体图标', 'diplomat'), $type['name'] ),
		'custom_html' => '',
		'is_reset' => true
	);

}

$sections = array(
	'name' => __("页眉", 'diplomat'),
	'css_class' => 'shortcut-header',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-welcome-widgets-menus'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

