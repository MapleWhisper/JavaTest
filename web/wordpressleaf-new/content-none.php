<?php
/**
 * The template for displaying a "No posts found" message
 */
?>

<h2 class="info-title"><?php _e( '什么都没找到', 'diplomat' ); ?></h2>

<p>

	<?php
	if ( is_search() ) {
		_e( '抱歉，没什么匹配了您的搜索条件。请用一些不同的关键词再试一次。', 'diplomat' );
	} else {
		_e( '看来我们找不到你要寻找的东西。也许搜索可以帮助您。', 'diplomat' );
	}

	get_search_form();
	?>

</p>
