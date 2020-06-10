<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php 
$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$post_types = get_post_types(array(), 'object');

$child_sections['submitting_subscription_messages'] = array(
    'name' => __('提交订阅信息', 'diplomat'),
    'sections' => array(
        'subscribe_mail_validation' => array(
            'title' => __('订阅邮件验证消息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("请输入有效的电子邮箱地址。", 'diplomat'),
            'description' => '',
            'custom_html' => ''
        ),
        'info_already_subscribed' => array(
            'title' => __('电子邮件已订阅消息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("你已经订阅了。", 'diplomat'),
            'description' => '',
            'custom_html' => ''
        ),
        'info_successfully_subscribed' => array(
            'title' => __('电子邮件成功订阅消息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("感谢您的订阅。", 'diplomat'),
            'description' => '',
            'custom_html' => ''
        ),    
        'info_success_unsubscription' => array(
            'title' => __('电子邮件成功退订消息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("谢谢你，你已成功退订。", 'diplomat'),
            'description' => '',
            'custom_html' => ''
        ),
    )    
);
$child_sections['subscription_confirmation_email'] = array(
    'name' => __('订阅确认电子邮件', 'diplomat'),
    'sections' => array(
        'subscribe_subject' => array(
            'title' => __('订阅确认邮件主题', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("谢谢您订阅%site_url%", 'diplomat'),
            'description' => '您可以使用以下变量： %site_url%, %unsubscribe_url%, %n%',
            'custom_html' => ''
        ),
        'subscribe_message' => array(
            'title' => __('订阅确认电子邮件消息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("您已成功订阅我们的文章。%n%若要取消订阅邮件，请点击此链接：<a href='%unsubscribe_url%'>退订</a>", 'diplomat'),
            'description' => '您可以使用以下变量： %site_url%, %unsubscribe_url%, %n%',
            'custom_html' => ''
        ),
    )
);
$child_sections['new_subscription_emails'] = array(
    'name' => __('新的订阅邮件', 'diplomat'),
    'sections' => array(
        'new_post_subject' => array(
            'title' => __('新的电子邮件的主题', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __('%site_url%的新文章', 'diplomat'),
            'description' => '您可以使用以下变量：%post_title%, %post_url%, %site_url%, %unsubscribe_url%',
            'custom_html' => ''
        ),
        'new_post_message' => array(
            'title' => __('新的电子邮件信息', 'diplomat'),
            'type' => 'textarea',
            'default_value' => __("在%site_url%上有一篇新文章。您可以在这里读：<a href='%post_url%'>%post_title%</a>。%n%若要取消订阅邮件，请点击此链接：<a href='%unsubscribe_url%'>退订</a>。", 'diplomat'),
            'description' => '您可以使用以下变量： %post_title%, %post_url%, %site_url%, %unsubscribe_url%, %n%',
            'custom_html' => ''
        ),
    )
);

$sections = array(
	'name' => __("邮件订阅", 'diplomat'),
	'css_class' => 'shortcut-header',
	'show_general_page' => false,
	'content' => $content,
	'child_sections' => $child_sections,
    'menu_icon' => 'dashicons-email'    
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;
