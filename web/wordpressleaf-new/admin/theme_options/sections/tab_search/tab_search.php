<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php 
$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$post_types = get_post_types(array(), 'object');

$content = array(    
    'block0' => array(
        'title' => __('高级搜索', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
            'menu_advanced_search' => array(
                'title' => __('在菜单启用或禁用高级搜索', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('在菜单启用或禁用高级搜索。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
			'widget_advanced_search' => array(
				'title' => __('在搜索小工具中启用或禁用高级搜索', 'diplomat'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => __('在搜索小工具中启用或禁用高级搜索。 不编辑此字段则使用默认主题样式。', 'diplomat'),
				'custom_html' => '',
				'is_reset' => true
			),
                        
		)
	),
    'block1' => array(
        'title' => __('搜索的文章类型', 'diplomat'),
		'type' => 'items_block',
		'items' => array()
	), 
    'block2' => array(
        'title' => __('搜索的字段范围', 'diplomat'),
		'type' => 'items_block',
		'items' => array(
            'search_title' => array(
                'title' => __('启用或禁用搜索标题', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('启用或禁用搜索标题。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
            'search_content' => array(
                'title' => __('启用或禁用搜索内容', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('启用或禁用搜索内容。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
            'search_exerpts' => array(
                'title' => __('启用或禁用搜索摘要', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('启用或禁用搜索摘要。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
            'search_layout_constructor' => array(
                'title' => __('启用或禁用搜索布局构造器', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('启用或禁用搜索布局构造器。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
            'search_terms' => array(
                'title' => __('启用或禁用搜索条款', 'diplomat'),
                'type' => 'checkbox',
                'default_value' => 1,
                'description' => __('启用或禁用搜索条款。不编辑此字段则使用默认主题样式。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            )
        )
	),
    'block3' => array(
        'title' => __('额外选项', 'diplomat'),
		'type' => 'items_block',
		'items' => array(            
            'character_count' => array(
                'title' => __('触发自动搜索的最小字符数量。', 'diplomat'),
                'type' => 'text',
                'default_value' => 3,
                'description' => __('进行搜索的最小字符数量。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
            'max_results' => array(
                'title' => __('最大的结果', 'diplomat'),
                'type' => 'text',
                'default_value' => '',
                'description' => __('最大的结果。不编辑此字段则显示全部的搜索结果。', 'diplomat'),
                'custom_html' => '',
                'is_reset' => true
            ),
        )
    )
);


foreach ($post_types as $post_type){
    if (($post_type->name!='nav_menu_item')&&($post_type->name!='revision')&&($post_type->name!='attachment')){
        $content['block1']['items']['search_'.$post_type->name] = array(
            'title' => __('启用或禁用搜索 ', 'diplomat').$post_type->label,
            'type' => 'checkbox',
            'default_value' => 1,
            'description' => __('启用或禁用搜索' ,'diplomat').$post_type->label.__('。 不编辑此字段则使用默认主题样式。', 'diplomat'),
            'custom_html' => '',
            'is_reset' => true
        );
    }    
};

$sections = array(
	'name' => __("搜索", 'diplomat'),
	'css_class' => 'shortcut-header',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
        'menu_icon' => 'dashicons-search'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;
