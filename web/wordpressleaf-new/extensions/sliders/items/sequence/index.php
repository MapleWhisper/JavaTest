<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class TMM_Slider_Flex extends TMM_Slider {

	public static $slider_options = array();
	public static $slider_js_options = array();

	public static function init() {
		parent::$sliders_classes_array[] = __CLASS__;
		//***
		self::$slider_options = array(
			'key' => "sequence",
			'name' => "Slider",
			'fields' => array(
				'description' => array(
					'name' => __('幻灯片描述', 'diplomat'),
					'type' => 'textarea',
					'field_options' => array(
						'font_family' => __('字体家族', 'diplomat'),
						'font_size' => __('字体大小', 'diplomat'),
						'font_color' => __('字体颜色', 'diplomat')
					),
					'field_options_defaults' => array(
						'font_family' => '',
						'font_size' => '',
						'font_color' => ''
					)
				),
				'url' => array(
					'name' => __('幻灯片网址', 'diplomat'),
					'type' => 'textinput',
					'field_options' => array()
				),
			),
		);
		parent::$slider_options[self::$slider_options['key']] = self::$slider_options;
		//***
		self::$slider_js_options = array(
			'slide_image_alias' => array(
				'title' => __('幻灯片大小', 'diplomat'),
				'type' => 'text',
				'description' => __('幻灯片大小。宽*高，例如500*300。如果留空将使用全宽大小。', 'diplomat'),
				'default' => '',
			),
			'enable_caption' => array(
				'title' => __('启用标题', 'diplomat'),
				'type' => 'checkbox',
				'description' => "",
				'default' => 1,
			),
			'slideshow' => array(
				'title' => __('幻灯片播放', 'diplomat'),
				'type' => 'checkbox',
				'description' => __("幻灯片自动滑动", 'diplomat'),
				'default' => 1,
			),
			'init_delay' => array(
				'title' => __('初始化延迟', 'diplomat'),
				'type' => 'slider',
				'description' => __("整数：设置初始化延迟，以毫秒为单位", 'diplomat'),
				'default' => 0,
				'max' => 500
			),
			'animation_speed' => array(
				'title' => __('动画速度', 'diplomat'),
				'type' => 'slider',
				'description' => __("设置动画速度，以毫秒为单位", 'diplomat'),
				'default' => 600,
				'max' => 2000
			),
			'slideshow_speed' => array(
				'title' => __('幻灯片播放速度', 'diplomat'),
				'type' => 'slider',
				'description' => __("设置幻灯片循环播放的速度，以毫秒为单位", 'diplomat'),
				'default' => 7000,
				'max' => 20000
			),
			'animation' => array(
				'title' => __('动画', 'diplomat'),
				'type' => 'select',
				'values' => array(
					'fade' => __('淡出', 'diplomat'),
					'slide' => __('滑动', 'diplomat'),
				),
				'description' => __('选择您的动画类型，“淡出”或“滑动”', 'diplomat'),
				'default' => 'slide',
			),
			'directionNav' => array(
				'title' => __('方向导航', 'diplomat'),
				'type' => 'checkbox',
				'description' => __("方向导航", 'diplomat'),
				'default' => 1,
			),
			'controlnav' => array(
				'title' => __('控制导航', 'diplomat'),
				'type' => 'checkbox',
				'description' => __("控制导航", 'diplomat'),
				'default' => 1,
			),
			'direction' => array(
				'title' => __('方向', 'diplomat'),
				'type' => 'select',
				'values' => array(
					'horizontal' => __('水平', 'diplomat'),
					'vertical' => __('垂直', 'diplomat'),
				),
				'description' => "",
				'default' => 'horizontal',
			)
		);
		parent::$slider_js_options[self::$slider_options['key']] = self::$slider_js_options;
	}

}
