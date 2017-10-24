<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'copyright_text' => array(
		'title' => __('版权', 'diplomat'),
		'type' => 'textarea',
		'default_value' => sprintf(__('版权所有 &copy; %d  WordPress Leaf 保留所有权利', 'diplomat'), date('Y')),
		'description' => '',
		'custom_html' => ''
	),
	'hide_footer' => array(
		'title' => __('禁用页脚小工具区域', 'diplomat'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => __('如果选中，全部页脚小工具将不会在每页的底部出现。', 'diplomat'),
		'custom_html' => ''
	),
);


$sections = array(
	'name' => __("页脚", 'diplomat'),
	'css_class' => 'shortcut-footer',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-editor-kitchensink'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

