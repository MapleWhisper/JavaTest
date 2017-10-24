<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$image_types = array( 'grid-col-third' => '三分之一',
                     'grid-col-half' => '二分之一',
                     'grid-col-four' => '四分之一'  
                    );     
 $unique_id = uniqid();
  

    if (isset($change_gallry_type)&&($change_gallry_type==true)){       
       $imgurl = $imgurl['url'];
    }


 ?>
<li class="gallery_item">
	<img class="gallery_thumb" src="<?php echo esc_url(TMM_Helper::resize_image($imgurl, "100*100")); ?>" alt="" />
	<input type="hidden" value="<?php echo esc_attr($imgurl); ?>" class="post_pod_gallery_item" name="post_type_values[gallery][]">
	<a href="#" class="delete_gallery_item" title="<?php esc_attr_e("删除项", 'diplomat') ?>"><?php esc_html_e("删除项", 'diplomat') ?></a>

</li>