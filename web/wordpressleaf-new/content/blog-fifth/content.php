<?php
$image_size = '105*80';

$post_link = get_permalink($post->ID);

$post_title = $post->post_title;
$title_symbols_count = $_REQUEST['title_symbols'];
if ($_REQUEST['title_symbols'])
	$post_title = (mb_strlen($post_title)> $title_symbols_count) ? mb_substr($post_title, 0, $title_symbols_count) . " ..." : $post_title;

?>


<div class="entry-content">

	<header class="entry-header">

		<h4 class="entry-title"><a href="<?php echo esc_url($post_link); ?>"><?php echo esc_html($post_title); ?></a></h4>

	</header>

</div>