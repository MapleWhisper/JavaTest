<?php
if (!defined('ABSPATH')) die('No direct access allowed');
//发现使用$post变量不能获取摘要和内容，怀疑使用了循环没有复位，所有加上下面的循环重置代码，果然好了。
wp_reset_postdata();
global $post;
$meta_title = "";
$meta_keywords = "";
$meta_description = "";

if (is_single() || is_page()) {

	$custom = get_post_custom($post->ID);
	$meta_title = (isset($custom["meta_title"][0])) ? $custom["meta_title"][0] : '';
	$meta_keywords = (isset($custom["meta_keywords"][0])) ? $custom["meta_keywords"][0] : '';
	$meta_description = (isset($custom["meta_description"][0])) ? $custom["meta_description"][0] : '';

	if (is_front_page()) {
		if (empty($meta_title)) {
			$meta_title = TMM::get_option("meta_title_home");
		}

		if (empty($meta_keywords)) {
			$meta_keywords = TMM::get_option("meta_keywords_home");
		}

		if (empty($meta_description)) {
			$meta_description = TMM::get_option("meta_description_home");
		}
	}
} else {

	if (is_object($post)) {
		if ($post->post_type === 'post') {
			$meta_title = TMM::get_option("meta_title_post_listing");
			$meta_keywords = TMM::get_option("meta_keywords_post_listing");
			$meta_description = TMM::get_option("meta_description_post_listing");
		} else if (class_exists('TMM_Portfolio') && $post->post_type === TMM_Portfolio::$slug) {
			$meta_title = TMM::get_option("meta_title_portfolio_listing");
			$meta_keywords = TMM::get_option("meta_keywords_portfolio_listing");
			$meta_description = TMM::get_option("meta_description_portfolio_listing");
		} else if (class_exists('TMM_Gallery') && $post->post_type === TMM_Gallery::$slug) {
			$meta_title = TMM::get_option("meta_title_gallery_listing");
			$meta_keywords = TMM::get_option("meta_keywords_gallery_listing");
			$meta_description = TMM::get_option("meta_description_gallery_listing");
		}
	}

	global $cat;
	$cat_head_seo_data = TMM_SEO_Group::get_cat_head_seo_data($cat);
	if (!empty($cat_head_seo_data['meta_title'])) {
		$meta_title = $cat_head_seo_data['meta_title'];
		$meta_keywords = $cat_head_seo_data['meta_keywords'];
		$meta_description = $cat_head_seo_data['meta_description'];
	}
}

if (is_home()) {
	$page_id = get_option('page_for_posts');

	if ($page_id) {
		$custom = get_post_custom($page_id);
		$meta_title = (isset($custom["meta_title"][0])) ? $custom["meta_title"][0] : '';
		$meta_keywords = (isset($custom["meta_keywords"][0])) ? $custom["meta_keywords"][0] : '';
		$meta_description = (isset($custom["meta_description"][0])) ? $custom["meta_description"][0] : '';
	}

}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
/*
function tmm_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $meta_title;

	if (!empty($meta_title)) {
		$title = $meta_title . ' ' . $sep . ' ' . get_bloginfo('name', 'display');
		if( is_home()||is_front_page() ) {$title = $meta_title;}
		
	}

	return $title;
}
*/
//$GLOBALS['meta_title'] = $meta_title;
//add_filter( 'wp_title', 'tmm_wp_title', 10, 2 );








/* Display meta tags */
if (!empty($meta_keywords)) {
	?>
<meta name="keywords" content="<?php echo esc_attr($meta_keywords) ?>">
	<?php
}else{

  //如果没有设置，那么自动显示关键字
	global $s, $post;
	$keywords = '';
	if ( is_single() ) {
		if ( get_the_tags( $post->ID ) ) {
			foreach ( get_the_tags( $post->ID ) as $tag ) $keywords .= $tag->name . ', ';
		}
		foreach ( get_the_category( $post->ID ) as $category ) $keywords .= $category->cat_name . ', ';
		$keywords = substr_replace( $keywords , '' , -2);
	} elseif ( is_home()||is_front_page()  )    { $keywords = TMM::get_option("meta_keywords_home");
	} elseif ( is_tag() )      { $keywords = single_tag_title('', false);
	} elseif ( is_category() ) { $keywords = single_cat_title('', false);
	} elseif ( is_search() )   { $keywords = esc_html( $s, 1 );
	} else { $keywords = trim( wp_title('', false) );
	}
	if ( $keywords ) {
	echo "<meta name=\"keywords\" content=\"$keywords\">\n\r";
	}
}






if (!empty($meta_description)) {
	?>
	<meta name="description" content="<?php echo esc_attr($meta_description) ?>">
	<?php
}else {

	global $s, $post,$title;
	$description = '';
	$blog_name = get_bloginfo('name');

	
	if ( is_single()) {
				
		$description=strip_tags(spring_excerpt(80));
		
		//$description=$post->ID;
		
		if ( !( $description ) ) $description = $blog_name . "|" . trim( wp_title('', false) );
		
		
	} elseif ( is_home()||is_front_page()  )    { $description = TMM::get_option("meta_description_home"); // 首頁要自己加
	} elseif ( is_tag() )      { $description = $blog_name.':关于标签' . "'" . single_tag_title('', false) . "'的相关文章列表";
	} elseif ( is_category() ) { $description = trim(strip_tags(category_description()))?trim(strip_tags(category_description())):$blog_name.':关于分类' . "'" . single_cat_title('', false) . "'的相关文章列表";
	} elseif ( is_archive() )  { $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
	} elseif ( is_search() )   { $description = $blog_name . ": '关于" . esc_html( $s, 1 ) . "' 的搜索結果";
		} else { 
			$description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
			
			
		}
		$description = mb_substr( $description, 0, 160, 'utf-8' );
		
		echo "<meta name=\"description\" content=\"$description\">\n\r";
	
	
	}





/**
*将首页替换成自己定义的标题
*新的 WordPress 网页标题设置方法
*https://developer.wordpress.org/reference/hooks/document_title_parts/
*/



function Bing_remove_tagline( $title ){
	
	if ( is_feed() ) {
		return $title;
	}
	
	
	global $meta_title;
	if (!empty($meta_title)) {
	
	$title['title']=$meta_title;
	
	if( (is_home()||is_front_page()) && isset( $title['tagline'] ) ) {
        	
        	unset( $title['tagline'] );
        	
        	$title['title']=TMM::get_option("meta_title_home");
        	
        	}
	
	}      
	      
  return $title;
}

$GLOBALS['meta_title'] = $meta_title;
add_filter( 'document_title_parts', 'Bing_remove_tagline' );

/******************************************
*将分隔符换成自己的
*******************************************/
if (!function_exists('Bing_title_separator_to_line')) :
function Bing_title_separator_to_line(){
	     
        return TMM::get_option("title_sep");//自定义标题分隔符
}

endif;

	
//如果已经开启替换
$title_sep = trim(TMM::get_option("title_sep"));


if (!empty($title_sep) ){
add_filter( 'document_title_separator', 'Bing_title_separator_to_line' );
}



