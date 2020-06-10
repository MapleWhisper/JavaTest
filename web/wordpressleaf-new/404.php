<?php get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e('没有找到文件', 'diplomat'); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e('您正在寻找的网页可能已被删除，或其名称已被更改，或暂时不可用。', 'diplomat'); ?></p>
				</div>
				<p><?php _e('请尝试以下操作：', 'diplomat'); ?></p>
				<ul>
					<li><?php _e('检查你的拼写', 'diplomat'); ?></li>
					<li><?php printf(__('返回<a href="%s">首页</a>', 'diplomat'), home_url()); ?></li>
					<li><?php _e('点击<a href="javascript:history.back()">返回</a>按钮', 'diplomat'); ?></li>
				</ul>
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
