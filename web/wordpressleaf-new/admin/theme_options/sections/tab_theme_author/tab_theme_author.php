<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'theme_author' => array(
		'title' => __('主题作者', 'diplomat'),
		'type' => 'info',
		'default_value' => 0,
		'description' => __('如果选中，全部页脚小工具将不会在每页的底部出现。', 'diplomat'),
		'custom_html' => TMM::draw_free_page($pagepath . 'author.php')
	),
);


$sections = array(
	'name' => __("作者", 'diplomat'),
	'css_class' => 'shortcut-footer',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-admin-users'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

