<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
class TMM_Latest_Tweets_Widget extends WP_Widget {

	public $defaults;

	function __construct() {

		$settings = array('classname' => __CLASS__, 'description' => __('显示最新的推特', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-显示最新的推特', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('推特最新信息', 'diplomat'),
			'twitter_id' => '345111976353091584',
			'postcount' => 2
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/latest_tweets', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/latest_tweets_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Social_Links_Widget extends WP_Widget {

	function __construct() {
		//Basic settings
		$settings = array('classname' => __CLASS__, 'description' => __('显示网站社交链接', 'diplomat'));

		//Creation
		parent::__construct(__CLASS__, __('春叶-社交媒体链接', 'diplomat'), $settings);
	}

	//Widget view
	function widget($args, $instance) {
		$args['instance'] = $instance;
		echo TMM::draw_html('widgets/social_links', $args);
	}

	//Update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];

		$social_types = unserialize(TMM::get_option('social_types'));

		foreach ($social_types as $key => $type) {
			$instance[$key.'_links'] = isset($new_instance[$key.'_links']) ? $new_instance[$key.'_links'] : '';
			$instance[$key.'_tooltip'] = isset($new_instance[$key.'_tooltip']) ? $new_instance[$key.'_tooltip'] : '';
		}

		return $instance;
	}

	//Widget form
	function form($instance) {
		//Defaults
		$defaults = array(
			'title' => '社交媒体链接',
		);

		$social_types = unserialize(TMM::get_option('social_types'));

		foreach ($social_types as $key => $type) {
			$defaults[$key.'_tooltip'] = $type['name'];
			$defaults[$key.'_links'] = $type['link'];
		}

		$instance = wp_parse_args((array) $instance, $defaults);
		$args = array();
		$args['instance'] = $instance;
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/social_links_form', $args);
	}

}

class TMM_Contact_Form_Widget extends WP_Widget {

	public $defaults;

	function __construct() {

		$settings = array('classname' => __CLASS__, 'description' => __('显示自定义联系表单的小工具。', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-联系表单', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('联系表单', 'diplomat'),
			'form' => '',
			'labels' => 'placeholder'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/contact_form', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/contact_form_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Flickr_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('Flickr订阅接口小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-Flickr订阅接口', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('Flickr订阅接口', 'diplomat'),
			'username' => '53958895@N06',
			'imagescount' => '12'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/flickr', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/flickr_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Google_Map_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('自定义谷歌地图小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-谷歌地图', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('我们的位置', 'diplomat'),
			'width' => '360',
			'height' => '200',
			'mode' => 'image',
			'latitude' => "40.714623",
			'longitude' => "-74.006605",
			'address' => 'New York',
			'location_mode' => 'address',
			'zoom' => 12,
			'maptype' => 'ROADMAP',
			'marker' => 'false',
			'scrollwheel' => 'false',
			'popup' => 'false',
			'popup_text' => ""
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/google_map', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/google_map_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Facebook_LikeBox_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('脸书喜欢框小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-脸书喜欢框', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('脸书喜欢框', 'diplomat'),
			'pageURL' => 'https://www.facebook.com/wordpressleaf',
			'width' => '360',
			'faces' => true,
			'posts' => true
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/facebook', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/facebook_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Contact_Us_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('联系我们小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-联系我们', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('联系我们', 'diplomat'),
			'address' => '',
			'phone' => '',
			'email' => ''
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/contact_us', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/contact_us_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Mail_Subscription_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('邮件订阅小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-邮件订阅', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('与我们保持联系', 'diplomat'),
			'description' => __('获取与本公司相关的时事信息', 'diplomat'),
			'zipcode' => 'true',
			'submit_button' => __('输入您的电子邮箱', 'diplomat')
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/mail_subscription', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/mail_subscription_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}
}

class TMM_Recent_Posts_Widget extends WP_Widget {

	public $defaults;

	function __construct() {

		$settings = array('classname' => __CLASS__, 'description' => __('显示最新的博客文章', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-热门/最新/评论', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('最新文章', 'diplomat'),
			'category' => '',
			'number_category_posts' => 3,
			'number_popular_posts' => 3,
			'number_latest_posts' => 3,
			'number_comments_posts' => 3,
			'show_thumbnail' => 'true',
			'show_exerpt' => 'true',
			'title_excerpt' => 20,
			'exerpt_symbols_count' => 60,
			'show_see_all_button' => 'false'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/recent_posts', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/recent_posts_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Video_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('显示视频的小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-视频', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('视频标题', 'diplomat'),
			'url' => '',
			'video_cover_image' => '',
			'video_cover_image_on_mobiles' => 1,
			'height' => '',
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/video', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/video_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Testimonials_Widget extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('显示证书的小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-证书', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => __('证书', 'diplomat'),
			'show' => 'mode1',
			'content' => '',
			'count' => '-1',
			'order' => 'ASC',
			'orderby' => 'date',
			'show_photo' => 'true'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/testimonials', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/testimonials_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Featured_Boxes extends WP_Widget {

	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => __('显示特色框的小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-Metro风格', 'diplomat'), $settings);
		$this->defaults = array(
			'first_box_title' => '事件',
			'first_box_title_color' => '#8ad9f2',
			'first_box_color' => '#14b3e4',
			'first_box_icon' => 'icon-megaphone',
			'first_box_link' => '#',

			'second_box_title' => '参与',
			'second_box_title_color' => '#424246',
			'second_box_color' => '#ffffff',
			'second_box_icon' => 'none',
			'second_box_link' => '#',

			'third_box_title' => '问题和位置',
			'third_box_title_color' => '#ffffff',
			'third_box_color' => '#424246',
			'third_box_icon' => 'none',
			'third_box_link' => '#',

			'fourth_box_title' => '志愿者',
			'fourth_box_title_color' => '#ffb0af',
			'fourth_box_color' => '#ff615e',
			'fourth_box_icon' => 'icon-thumbs-up-5',
			'fourth_box_link' => '#'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/featured_boxes', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/featured_boxes_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Accordion_Widget extends WP_Widget {

	public $defaults;

	function __construct() {

		$settings = array('classname' => __CLASS__, 'description' => __('显示可折叠的小工具', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-折叠', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => '',
			'acc_titles' => '',
			'acc_bodies' => ''
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/accordion', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/accordion_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class TMM_Shortcodes_Widget extends WP_Widget {

	public $defaults;

	function __construct() {

		$settings = array('classname' => __CLASS__, 'description' => __('一个显示主题短代码的TinyMCE编辑器的小工具。', 'diplomat'));
		parent::__construct(__CLASS__, __('春叶-编辑器', 'diplomat'), $settings);
		$this->defaults = array(
			'title' => '',
			'content' => ''
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/shortcodes', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_html('widgets/shortcodes_form', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

register_widget('TMM_Latest_Tweets_Widget');
register_widget('TMM_Recent_Posts_Widget');
register_widget('TMM_Social_Links_Widget');
register_widget('TMM_Testimonials_Widget');
register_widget('TMM_Contact_Form_Widget');
register_widget('TMM_Flickr_Widget');
register_widget('TMM_Google_Map_Widget');
register_widget('TMM_Facebook_LikeBox_Widget');
register_widget('TMM_Contact_Us_Widget');
register_widget('TMM_Mail_Subscription_Widget');
register_widget('TMM_Video_Widget');
register_widget('TMM_Featured_Boxes');
register_widget('TMM_Accordion_Widget');
register_widget('TMM_Shortcodes_Widget');