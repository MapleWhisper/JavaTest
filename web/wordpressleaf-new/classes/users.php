<?php
class TMM_Users {

	public function __construct() {
		add_action('show_user_profile', array(__CLASS__, 'show_my_profile_fields'));
		add_action('edit_user_profile', array(__CLASS__, 'show_my_profile_fields'));

		add_action('personal_options_update', array(__CLASS__, 'save_my_profile_fields'));
		add_action('edit_user_profile_update', array(__CLASS__, 'save_my_profile_fields'));
	}

	public static function my_profile_services () {
		return apply_filters('users_profile_services', array(
	  	'weibo' => __('新浪微博', 'diplomat'),
	  	'tweibo' => __('腾讯微博', 'diplomat'),
	  	'qqzone' => __('QQ空间', 'diplomat'),
	  	'weixin' => __('微信二维码图片地址', 'diplomat'),
	  	'renren' => __('人人网', 'diplomat'),	  	
			'twitter' => __('Twitter', 'diplomat'),
			'facebook' => __('Facebook', 'diplomat'),
			'pinteres' => __('Pinterest', 'diplomat'),
			'rss' => __('Rss', 'diplomat'),
			'gplus' => __('Google Plus', 'diplomat'),
		));
	}

	public function show_my_profile_fields ($user) {
		?>
		<h3><?php esc_html_e('用户社交媒体链接', 'diplomat'); ?></h3>

		<?php $services = self::my_profile_services(); ?>

		<?php if (!empty($services)): ?>

			<table class="form-table">
				<?php foreach($services as $meta => $title): ?>
				<tr>
					<th><label for="<?php echo esc_attr($meta) ?>"><?php echo esc_html($title) ?></label></th>
					<td>
						<input type="text" name="<?php echo esc_attr($meta) ?>" id="<?php echo esc_attr($meta) ?>" value="<?php echo esc_attr(get_the_author_meta($meta, $user->ID)); ?>" class="regular-text"/><br/>
						<span class="description"><?php esc_html_e("请输入您的" . $meta . " 账号或网址", 'diplomat') ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>

		<?php endif;
	}

	public static function save_my_profile_fields ($user_id) {
		if ( !current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		update_user_meta($user_id, 'weibo', $_POST['weibo']);
		update_user_meta($user_id, 'tweibo', $_POST['tweibo']);
		update_user_meta($user_id, 'qqzone', $_POST['qqzone']);
		update_user_meta($user_id, 'weixin', $_POST['weixin']);
		update_user_meta($user_id, 'renren', $_POST['renren']);		
		update_user_meta($user_id, 'twitter', $_POST['twitter']);
		update_user_meta($user_id, 'facebook', $_POST['facebook']);
		update_user_meta($user_id, 'pinteres', $_POST['pinteres']);
		update_user_meta($user_id, 'rss', $_POST['rss']);
		update_user_meta($user_id, 'gplus', $_POST['gplus']);
	}

	public static function my_author_social_links ($user_id) { ?>
		<ul class="social-icons">
			<?php if (get_the_author_meta('renren', $user_id)): ?>
				<li class="renren"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('renren', $user_id)); ?>"><?php esc_html_e('人人网', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('tweibo', $user_id)): ?>
				<li class="tweibo"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('tweibo', $user_id)); ?>"><?php esc_html_e('腾讯微博', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('weixin', $user_id)): ?>
				<li class="weixin"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('weixin', $user_id)); ?>"><?php esc_html_e('微信', 'diplomat') ?></a></li>
			<?php endif; ?>	
			<?php if (get_the_author_meta('weibo', $user_id)): ?>
				<li class="weibo"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('weibo', $user_id)); ?>"><?php esc_html_e('新浪微博', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('qqzone', $user_id)): ?>
				<li class="qqzone"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('qqzone', $user_id)); ?>"><?php esc_html_e('QQ空间', 'diplomat') ?></a></li>
			<?php endif; ?>			
			<?php if (get_the_author_meta('twitter', $user_id)): ?>
				<li class="twitter"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('twitter', $user_id)); ?>"><?php esc_html_e('Twitter', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('facebook', $user_id)): ?>
				<li class="facebook"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('facebook', $user_id)); ?>"><?php esc_html_e('Facebook', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('pinteres', $user_id)): ?>
				<li class="pinterest"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('pinteres', $user_id)); ?>"><?php esc_html_e('Pinterest', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('rss', $user_id)): ?>
				<li class="rss"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('rss', $user_id)); ?>"><?php esc_html_e('Rss', 'diplomat') ?></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta('gplus', $user_id)): ?>
				<li class="gplus"><a target="_blank" rel="external nofollow" href="<?php echo esc_url(get_the_author_meta('gplus', $user_id)); ?>"><?php esc_html_e('Google Plus', 'diplomat') ?></a></li>
			<?php endif; ?>
		</ul><!--/ .social-icons-->
		<?php
	}

	public static function send_email($to, $subject, $message, $from = '') {

		if (!$from) {
			$from = get_bloginfo("admin_email");
		}
		/* set headers */
		$headers = 'From: '. $from . "\r\n";

		add_filter('wp_mail_content_type', array(__CLASS__, 'set_html_content_type'));
		add_filter('wp_mail_from_name', array(__CLASS__, 'set_mail_from_name'));

		wp_mail($to, $subject, $message, $headers);

		remove_filter('wp_mail_content_type', array(__CLASS__, 'set_html_content_type'));
		remove_filter('wp_mail_from_name', array(__CLASS__, 'set_mail_from_name'));
	}

	public static function set_mail_from_name($name) {
		return get_option('blogname');
	}

	public static function set_html_content_type() {
		return 'text/html';
	}

}

