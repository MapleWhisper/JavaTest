<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
//$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';
//*************************************

$content = array(
	'block0' => array(
		'title' => '',
		'type' => 'items_block',
		'items' => array(
			'date_format' => array(
				'title' => __('日期格式', 'diplomat'),
				'type' => 'select',
				'default_value' => TMM_OptionsHelper::get_default_value('date_format'),
				'values' => array(
					'Y.m.d' => date('y.m.d'),				  
					'd.m.Y' => date('d.m.y'),
					'm.d.Y' => date('m.d.y'),
					'j, n, Y' => date('j, n, Y'),
					'F j, Y' => date('F j, Y'),
					'Y-m-d' => date('Y-m-d'),
					'm/d/Y' => date('m/d/Y'),
					'd/m/Y' => date('d/m/Y'),
					'Y/m/d' => date('Y/m/d')

				),
				'description' => __('一般网站日期格式。不编辑此字段则使用默认主题日期格式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
		)
	),
	'block1' => array(
		'title' => __('列表页', 'diplomat'),
		'type' => 'items_block',
		'items' => array(			
			'excerpt_symbols_count' => array(
				'title' => __('摘录字符数量', 'diplomat'),
				'type' => 'slider',
				'default_value' => TMM_OptionsHelper::get_default_value('excerpt_symbols_count'),
				'min' => 10,
				'max' => 900,
				'description' => __('在文章列表页上，此选项将全文内容中截取必要的数量的字符来作为摘要。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_all_metadata' => array(
				'title' => __('显示/隐藏所有元信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_all_metadata'),
				'description' => __('如果选中，文章中所有的元信息将会消失，如日期、作者、标签等。此选项将无视下面的四个选项。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_date' => array(
				'title' => __('显示/隐藏日期信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_date'),
				'description' => __('如果选中，在文章中将出现日期信息。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_author' => array(
				'title' => __('显示/隐藏作者信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_author'),
				'description' => __('如果选中，在文章中将出现作者信息。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_tags' => array(
				'title' => __('显示/隐藏标签信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_tags'),
				'description' => __('如果选中，在文章中将出现标签信息。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_category' => array(
				'title' => __('显示/隐藏分类信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_category'),
				'description' => __('如果选中，在文章中将出现分类信息。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_comments' => array(
				'title' => __('显示/隐藏评论数', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_comments'),
				'description' => __('如果选中，在文章中将出现评论数。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_show_likes' => array(
				'title' => __('显示/隐藏喜欢数', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_show_likes'),
				'description' => __('如果选中，在文章中将出现喜欢数。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_listing_effect' => array(
				'title' => __('文章出现时的特效', 'diplomat'),
				'type' => 'select',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_listing_effect'),
				'values' => array(
					'none' => __('无', 'diplomat'),
					'elementFade' => __('特效褪色', 'diplomat'),
					'opacity' => __('不透明', 'diplomat'),
					'opacity2xRun' => __('不透明 2x', 'diplomat'),
					'scale' => __('放大', 'diplomat'),
					'slideRight' => __('右滑', 'diplomat'),
					'slideLeft' => __('左滑', 'diplomat'),
					'slideDown' => __('下滑', 'diplomat'),
					'slideUp' => __('上滑', 'diplomat'),
					'slideUp2x' => __('上滑 2x', 'diplomat'),
					'extraRadius' => __('扩展半径', 'diplomat')
				),
				'description' => __('文章出现时的特效。', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
	'block2' => array(
		'title' => __('单页', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
			'blog_single_show_bio' => array(
				'title' => __('显示/隐藏作者信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_bio'),
				'description' => __('如果选中，在每篇文章的结尾处将出现作者信息框。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_comments' => array(
				'title' => __('显示/隐藏评论', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_comments'),
				'description' => __('如果选中，全部的访问者将允许对文章进行评论。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_fb_comments' => array(
				'title' => __('显示/隐藏脸书评论', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_fb_comments'),
				'description' => __('如果选中，全部的访问者将允许提交评论到文章和脸书。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_social_share' => array(
				'title' => __('显示或隐藏国外的社交分享按钮', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_social_share'),
				'description' => __('如果选中，在每篇文章的结尾将出现国外社交媒体分享按钮。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_cnsocial_share' => array(
				'title' => __('显示或隐藏国内的社交分享按钮', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_cnsocial_share'),
				'description' => __('如果选中，在每篇文章的结尾将出现国内社交媒体分享按钮。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_posts_nav' => array(
				'title' => __('显示或隐藏文章导航', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_posts_nav'),
				'description' => __('如果选中，在每篇文章的结尾将出现文章导航框。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_related_posts' => array(
				'title' => __('显示或隐藏相关文章', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_related_posts'),
				'description' => __('如果选中，在每篇文章的结尾将出现相关文章。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_related_posts_with_image' => array(
				'title' => __('只显示带图片的相关文章？', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_related_posts_with_image'),
				'description' => __('如果选中，在每篇文章的结尾将只会显示带特色图片的相关文章。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_all_metadata' => array(
				'title' => __('显示/隐藏所有元信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_all_metadata'),
				'description' => __('如果选中，全部的元信息将不会出现在文章标题下面，例如日期、作者、标签等。此选项将无视下面的四个选项。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_date' => array(
				'title' => __('显示/隐藏日期信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_date'),
				'description' => __('如果选中，日期信息将会出现在文章标题下面。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_author' => array(
				'title' => __('显示/隐藏作者信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_author'),
				'description' => __('如果选中，作者信息将会出现在文章标题下面。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_tags' => array(
				'title' => __('显示/隐藏标签信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_tags'),
				'description' => __('如果选中，标签信息将会出现在文章标题下面。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_category' => array(
				'title' => __('显示/隐藏分类信息', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_category'),
				'description' => __('如果选中，分类信息将会出现在文章标题下面。', 'diplomat'),
				'custom_html' => ''
			),
			'blog_single_show_likes' => array(
				'title' => __('显示/隐藏文章喜欢数', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => TMM_OptionsHelper::get_default_value('blog_single_show_likes'),
				'description' => __('如果选中，文章喜欢数将会出现在文章标题下面。', 'diplomat'),
				'custom_html' => ''
			),
		)
	),
);




//*************************************
//*************************************
$sections = array(
	'name' => __('博客文章', 'diplomat'),
	'css_class' => 'shortcut-blog',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-format-standard'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

