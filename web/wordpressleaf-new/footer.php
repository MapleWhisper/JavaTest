<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$page_id = 0;
if (is_single() OR is_page() OR is_front_page()) {
	global $post;
	if($post) {
		$page_id = $post->ID;
	}
}

if (is_home()) {
	$page_id = get_option('page_for_posts');
}
?>

	</section>

	<?php
	if ($_REQUEST['sidebar_position'] != 'no_sidebar'){
		get_sidebar();
	}

	if (is_single($page_id) || is_page() || is_page_template()) {
		tmm_layout_content($page_id, 'full_width');
	}
	?>

	<?php if (TMM::get_option('show_login_buttons') !== '0') { ?>

	<div id="accountDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="morph-shape">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
					<rect x="3" y="3" fill="none" width="556" height="276"/>
				</svg>
			</div>
			<div class="dialog-inner">
				<form action="/">
					<fieldset class="login">
						<p><input type="text" name="user_name" id="user_name" placeholder="<?php esc_attr_e('用户名', 'diplomat'); ?>*" required="" autocomplete="off" /></p>
						<p><input type="email" name="user_email" id="user_email" placeholder="<?php esc_attr_e('电子邮箱', 'diplomat'); ?>*" required="" autocomplete="off" /></p>
						<p>
							<button class="button middle" type="submit"><?php esc_html_e('注册', 'diplomat'); ?></button> &nbsp;
							<a href="#" class="button middle dialog-login-button"><?php esc_html_e('登录', 'diplomat'); ?></a>
						</p>
					</fieldset>
				</form>
				<i class="action-close" data-dialog-close><?php esc_html_e('关闭', 'diplomat'); ?></i>
			</div>
			<div class="dialog-error" style="display: none;"></div>
		</div>
	</div>

	<div id="loginDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="morph-shape">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
					<rect x="3" y="3" fill="none" width="556" height="276"/>
				</svg>
			</div>
			<div class="dialog-inner">
				<form action="/" method="post" class="account">
					<fieldset>
						<p><input type="text" name="log" id="user_login" placeholder="<?php esc_attr_e('用户名', 'diplomat'); ?>*" required="" autocomplete="off" /></p>
						<p><input type="password" name="pwd" id="user_pass" placeholder="<?php esc_attr_e('密码', 'diplomat'); ?>*" required="" autocomplete="off" /></p>
						<p>
							<input type="checkbox" id="rememberme" class="tmm-checkbox" name="rememberme" value="forever">
							<label for="rememberme"><?php esc_html_e('记住我', 'diplomat'); ?></label>

							<button class="button middle right" type="submit"><?php esc_html_e('登录', 'diplomat'); ?></button>

							<a href="#" class="reset-pass"><?php esc_html_e('重置密码', 'diplomat'); ?></a>
						</p>
					</fieldset>
				</form>

				<i class="action-close" data-dialog-close><?php esc_html_e('关闭', 'diplomat'); ?></i>
			</div>
			<div class="dialog-error" style="display: none;"></div>
		</div>
	</div>

	<div id="resetDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="morph-shape">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
					<rect x="3" y="3" fill="none" width="556" height="276"/>
				</svg>
			</div>
			<div class="dialog-inner">
				<p class="message">
					<?php esc_html_e('请输入您的用户名或电子邮件地址。您将通过电子邮件收到一个链接创建一个新的密码。', 'diplomat'); ?>
				</p>
				<form action="/" method="post" class="resetPass">
					<fieldset>
						<p><label for="user_mail"><?php esc_html_e('用户名或电子邮箱：', 'diplomat'); ?></label></p>
						<p>
							<input type="text" name="log" id="user_mail" required="" autocomplete="off" />
						</p>
						<p>
							<button type="submit" name="submit" class="button middle right"><?php esc_html_e('重置密码', 'diplomat'); ?></button>
							<a href="#" class="button middle dialog-login-button"><?php esc_html_e('登录', 'diplomat'); ?></a>
						</p>
					</fieldset>
				</form>

				<i class="action-close" data-dialog-close><?php esc_html_e('关闭', 'diplomat'); ?></i>
			</div>
			<div class="dialog-error" style="display: none;"></div>
		</div>
	</div>

	<?php } ?>

	<div id="subscribeDialog" class="dialog">
		<div class="dialog-overlay"></div>
		<div class="dialog-content">
			<div class="morph-shape">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
					<rect x="3" y="3" fill="none" width="556" height="276"/>
				</svg>
			</div>
			<div class="dialog-inner">
				<p class="message"></p>
				<i class="action-close" data-dialog-close><?php esc_html_e('关闭', 'diplomat'); ?></i>
			</div>
			<div class="dialog-error" style="display: none;"></div>
		</div>
	</div>

</main><!--/ #content -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

<footer id="footer">

	<?php
	if (!$page_id) {
		$footer_page_sidebar = 1;
	} else {
		$footer_page_sidebar = get_post_meta($page_id, 'footer_sidebar', true);

		if ($footer_page_sidebar === '') {
			$footer_page_sidebar = 1;
		}
	}

	if (!TMM::get_option("hide_footer") && $footer_page_sidebar) { ?>

	<div class="footer-top">

		<div class="row">

			<div class="large-4 columns">

				<?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('footer_sidebar_1'))  ?>

			</div>

			<div class="large-4 columns">

				<?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('footer_sidebar_2'))  ?>

			</div>

			<div class="large-4 columns">

				<?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('footer_sidebar_3'))  ?>

			</div>

		</div><!--/ .row-->

		<div class="row link-line">		

			<?php if ( has_nav_menu( 'links-menu' ) && (is_home() || is_front_page())) { ?>
	       <div id="foot-links" class="relative">
			      <?php wp_nav_menu(array('theme_location' => 'links-menu')); ?>
	       </div><!--foot-links-->
	    <?php } ?>	

		</div><!--/ .row-->


	</div><!--/ .footer-top-->

	<?php } ?>

	<div class="footer-bottom">


		<div class="row">

			<div class="large-6 columns">
				<div class="copyright">
					<?php echo wp_kses( TMM::get_option("copyright_text"), 'default'); ?>
				</div><!--/ .copyright-->
			</div>

			<div class="large-3 large-offset-3 columns">
				<div class="developed">
					<?php esc_html_e('开发者', 'diplomat'); ?> <a target="_blank" rel="external nofollow" href="http://www.wordpressleaf.com">WordPressLeaf</a>
				</div><!--/ .developed-->
			</div>

		</div><!--/ .row-->

	</div><!--/ .footer-bottom-->

</footer><!--/ #footer-->

<!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - -->

</div><!--/ #wrapper-->

<!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

<?php wp_footer(); ?>

</body>
</html>
