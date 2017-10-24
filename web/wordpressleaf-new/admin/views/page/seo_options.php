<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<input type="hidden" value="1" name="tmm_meta_saving" />
<table class="form-table seo-postbox">
	<tbody>
		<tr>
			<th>
				<label for="meta_title">
					<strong><?php esc_html_e('元标题', 'diplomat'); ?></strong>
					<span><?php esc_html_e('页面的SEO标题。标题 - 50-80 个字符（通常 - 75）', 'diplomat'); ?></span>
				</label>
			</th>
			<td>
				<input type="text" id="meta_title" name="meta_title" value="<?php echo esc_attr($meta_title); ?>">
			</td>
		</tr>
		<tr>
			<th>
				<label for="meta_keywords">
					<strong><?php esc_html_e('元关键字', 'diplomat'); ?></strong>
					<span><?php esc_html_e('关键字 - 可以多达250个字符', 'diplomat'); ?></span>
				</label>
			</th>
			<td>
				<textarea id="meta_keywords" name="meta_keywords"><?php echo esc_html($meta_keywords); ?></textarea>
			</td>
		</tr>
		<tr>
			<th>
				<label for="meta_description">
					<strong><?php esc_html_e('元描述', 'diplomat'); ?></strong>
					<span><?php esc_html_e('描述 - 约150-200字符', 'diplomat'); ?></span>
				</label>
			</th>
			<td>
				<textarea id="meta_description" name="meta_description"><?php echo esc_html($meta_description); ?></textarea>
			</td>
		</tr>
	</tbody>
</table>