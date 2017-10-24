<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'block1' => array(
		'title' => __('首页', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'meta_title_home' => array(
				'title' => __('元标题', 'diplomat'),
				'type' => 'text',
				'default_value' => '',
				'description' => __('页面的SEO标题。标题 - 50-80个字符（通常 - 75）', 'diplomat'),
				'custom_html' => ''
			),
			'meta_keywords_home' => array(
				'title' => __('元关键字', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('关键字 - 多达250个字符', 'diplomat'),
				'custom_html' => ''
			),
			'meta_description_home' => array(
				'title' => __('元描述', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('描述 - 大概 150 - 200个字符', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
	'block2' => array(
		'title' => __('文章列表/博客页面', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'meta_title_post_listing' => array(
				'title' => __('元标题', 'diplomat'),
				'type' => 'text',
				'default_value' => '',
				'description' => __('页面的SEO标题。标题 - 50-80个字符（通常 - 75）', 'diplomat'),
				'custom_html' => ''
			),
			'meta_keywords_post_listing' => array(
				'title' => __('元关键字', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('关键字 - 多达250个字符', 'diplomat'),
				'custom_html' => ''
			),
			'meta_description_post_listing' => array(
				'title' => __('元描述', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('描述 - 大概 150 - 200个字符', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
	'block3' => array(
		'title' => __('作品集列表', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'meta_title_portfolio_listing' => array(
				'title' => __('元标题', 'diplomat'),
				'type' => 'text',
				'default_value' => '',
				'description' => __('页面的SEO标题。标题 - 50-80个字符（通常 - 75）', 'diplomat'),
				'custom_html' => ''
			),
			'meta_keywords_portfolio_listing' => array(
				'title' => __('元关键字', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('关键字 - 多达250个字符', 'diplomat'),
				'custom_html' => ''
			),
			'meta_description_portfolio_listing' => array(
				'title' => __('元描述', 'diplomat'),
				'type' => 'textarea',
				'default_value' => '',
				'description' => __('描述 - 大概 150 - 200个字符', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
	'block4' => array(
		'title' => __('其他', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'title_sep' => array(
				'title' => __('标题分隔符', 'diplomat'),
				'type' => 'text',
				'default_value' => '',
				'description' => __('标题的分隔符号，通常为“|”、“-”、“_”，留空表示使用默认。', 'diplomat'),
				'custom_html' => ''
			),
			'url_nofollow' => array(
		    'title' => __('启用出站链接nofollow', 'diplomat'),
		    'type' => 'checkbox',
		    'default_value' =>  1,
		    'description' => '打勾表示将文章内容中的出站链接加上nofollow标签。这样做的目的是阻止权重流逝。。',
		    'custom_html' => ''
	    ),
		)
	),
	
	
		/*
		  'block4' => array(
		  'title' => __('Gallery listing', 'diplomat'),
		  'type' => 'items_block',
		  'items' => array(
		  'meta_title_gallery_listing' => array(
		  'title' => __('Meta title', 'diplomat'),
		  'type' => 'text',
		  'default_value' => '',
		  'description' => __('SEO title of page. Title - 50-80 characters (usually - 75)', 'diplomat'),
		  'custom_html' => ''
		  ),
		  'meta_keywords_gallery_listing' => array(
		  'title' => __('Meta keywords', 'diplomat'),
		  'type' => 'textarea',
		  'default_value' => '',
		  'description' => __('Keywords - up to 250 characters', 'diplomat'),
		  'custom_html' => ''
		  ),
		  'meta_description_gallery_listing' => array(
		  'title' => __('Meta description', 'diplomat'),
		  'type' => 'textarea',
		  'default_value' => '',
		  'description' => __('Description - about 150-200 characters', 'diplomat'),
		  'custom_html' => ''
		  ),
		  )
		  ),
		 */
);

$seo_groups = TMM::get_option('seo_groups');
if (is_string($seo_groups) AND !empty($seo_groups)) {
	$seo_groups = unserialize($seo_groups);
}
//***
$child_sections['seo_groups_tab'] = array(
	'name' => __('SEO分组', 'diplomat'),
	'sections' => array(
		'seo_groups' => array(
			'title' => '',
			'type' => 'custom',
			'default_value' => '',
			'description' => '',
			'custom_html' => TMM::draw_free_page($pagepath . 'seo_groups.php', array('seo_groups' => $seo_groups, 'custom_html_pagepath' => $pagepath))
		)
	)
);


$sections = array(
	'name' => __("SEO工具", 'diplomat'),
	'css_class' => 'shortcut-seo',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-search'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

