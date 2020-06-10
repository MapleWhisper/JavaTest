<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$type = array(
    'mode1' => __('显示已选择的证书', 'diplomat'),
    'mode2' => __('显示全部证书', 'diplomat'),
);

$tt = get_posts(array('numberposts' => -1, 'post_type' => TMM_Testimonial::$slug));
$testimonials = array();
if (!empty($tt)) {
    foreach ($tt as $value) {
        $testimonials[$value->ID] = $value->post_title . ". " . substr(strip_tags($value->post_content), 0, 90) . " ...";
    }
}

$orders = array(
    'ASC' => __('升序', 'diplomat'),
    'DESC' => __('降序', 'diplomat')
);

$ordersby = array(
    'none' => __('无', 'diplomat'),
    'ID' => __('ID', 'diplomat'),
    'author' => __('作者', 'diplomat'),
    'title' => __('标题', 'diplomat'),
    'name' => __('名字', 'diplomat'),
    'date' => __('日期', 'diplomat'),
    'modified' => __('修改', 'diplomat'),
    'rand' => __('随机', 'diplomat')
);

?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('标题', 'diplomat') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')); ?>" name="<?php echo esc_attr($widget->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('show')); ?>"><?php esc_html_e('显示', 'diplomat') ?>:</label>

    <select id="<?php echo esc_attr($widget->get_field_id('show')); ?>" name="<?php echo esc_attr($widget->get_field_name('show')); ?>" class="widefat show_mode">
        <?php
        foreach ($type as $key => $mode){ ?>
            <option <?php echo($key == $instance['show'] ? "selected" : "") ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($mode) ?></option>
        <?php } ?>
    </select>

</p>

<div class="selected_option">

    <p>
        <label for="<?php echo esc_attr($widget->get_field_id('content')); ?>"><?php esc_html_e('证书', 'diplomat') ?>:</label>

        <select id="<?php echo esc_attr($widget->get_field_id('content')); ?>" name="<?php echo esc_attr($widget->get_field_name('content')); ?>" class="widefat">
            <?php
            foreach ($testimonials as $key => $testimonial){ ?>
                <option <?php echo($key == $instance['content'] ? "selected" : "") ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($testimonial) ?></option>
            <?php } ?>
        </select>

    </p>

</div>

<div class="all_option">
    <p>
        <label for="<?php echo esc_attr($widget->get_field_id('count')); ?>"><?php esc_html_e('计数', 'diplomat') ?>:</label>

        <select id="<?php echo esc_attr($widget->get_field_id('count')); ?>" name="<?php echo esc_attr($widget->get_field_name('count')); ?>" class="widefat">
            <?php $key = '-1'; ?>
            <option <?php echo($key == $instance['count'] ? "selected" : "") ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html_e('全部', 'diplomat') ?></option>
            <?php
            for ($i=1; $i<=10; $i++){ ?>
                <option <?php echo($i == $instance['count'] ? "selected" : "") ?> value="<?php echo esc_attr($i) ?>"><?php echo esc_html($i) ?></option>
            <?php }
            ?>
        </select>

    </p>

    <p>
        <label for="<?php echo esc_attr($widget->get_field_id('order')); ?>"><?php esc_html_e('排序', 'diplomat') ?>:</label>

        <select id="<?php echo esc_attr($widget->get_field_id('order')); ?>" name="<?php echo esc_attr($widget->get_field_name('order')); ?>" class="widefat">
            <?php
            foreach ($orders as $key => $order){ ?>
                <option <?php echo($key == $instance['order'] ? "selected" : "") ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($order) ?></option>
            <?php } ?>
        </select>

    </p>

    <p>
        <label for="<?php echo esc_attr($widget->get_field_id('orderby')); ?>"><?php esc_html_e('排序方式', 'diplomat') ?>:</label>

        <select id="<?php echo esc_attr($widget->get_field_id('orderby')); ?>" name="<?php echo esc_attr($widget->get_field_name('orderby')); ?>" class="widefat">
            <?php
            foreach ($ordersby as $key => $orderby){ ?>
                <option <?php echo($key == $instance['orderby'] ? "selected" : "") ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($orderby) ?></option>
            <?php } ?>
        </select>

    </p>
</div>
<p>
    <?php
    $checked = "";
    if ($instance['show_photo'] == 'true') {
        $checked = 'checked="checked"';
    }
    ?>
    <input type="checkbox" id="<?php echo esc_attr($widget->get_field_id('show_photo')); ?>" name="<?php echo esc_attr($widget->get_field_name('show_photo')); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo esc_attr($widget->get_field_id('show_photo')); ?>"><?php esc_html_e('显示/隐藏照片', 'diplomat') ?></label>
</p>