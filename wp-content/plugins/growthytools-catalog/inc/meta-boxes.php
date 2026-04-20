<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'gt_catalog_add_meta_boxes');

function gt_catalog_add_meta_boxes(): void
{
    add_meta_box('gt_template_core', __('بيانات القالب الأساسية', 'growthytools-catalog'), 'gt_catalog_render_core_meta_box', 'gt_template', 'normal', 'high');
    add_meta_box('gt_template_licenses', __('التراخيص وروابط الشراء', 'growthytools-catalog'), 'gt_catalog_render_licenses_meta_box', 'gt_template', 'normal', 'high');
    add_meta_box('gt_template_attributes', __('التوافق والمعايير', 'growthytools-catalog'), 'gt_catalog_render_attributes_meta_box', 'gt_template', 'side', 'default');
}

function gt_catalog_render_core_meta_box(WP_Post $post): void
{
    wp_nonce_field('gt_template_save_meta', 'gt_template_nonce');

    $fields = [
        '_gt_subtitle'          => 'العنوان الفرعي',
        '_gt_short_sales_hook'  => 'جملة بيعية قصيرة',
        '_gt_long_description'  => 'وصف بيعي طويل',
        '_gt_old_price'         => 'السعر قبل الخصم',
        '_gt_starting_price'    => 'السعر بعد الخصم',
        '_gt_featured_badge'    => 'شارة مميزة',
        '_gt_preview_url'       => 'رابط المعاينة',
        '_gt_support_url'       => 'رابط الدعم',
    ];

    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        $input_type = str_contains($key, '_url') ? 'url' : 'text';
        echo '<p><label for="' . esc_attr($key) . '"><strong>' . esc_html($label) . '</strong></label><br>';
        if ('_gt_long_description' === $key) {
            echo '<textarea id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" rows="4" style="width:100%">' . esc_textarea((string) $value) . '</textarea>';
        } else {
            echo '<input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($input_type) . '" value="' . esc_attr((string) $value) . '" style="width:100%">';
        }
        echo '</p>';
    }
}

function gt_catalog_render_licenses_meta_box(WP_Post $post): void
{
    $licenses = get_post_meta($post->ID, '_gt_licenses', true);
    if (! is_array($licenses) || empty($licenses)) {
        $licenses = [
            ['name' => 'شخصي', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
            ['name' => 'أعمال', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
            ['name' => 'وكالة', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
        ];
    }

    $normalized = [
        'personal' => $licenses[0] ?? ['name' => 'شخصي', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
        'business' => $licenses[1] ?? ['name' => 'أعمال', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
        'agency'   => $licenses[2] ?? ['name' => 'وكالة', 'price' => '', 'old_price' => '', 'checkout_url' => ''],
    ];

    foreach ($normalized as $key => $license) {
        echo '<div style="border:1px solid #dcdcde;padding:12px;margin-bottom:10px;border-radius:6px;background:#fff">';
        echo '<h4 style="margin-top:0">' . esc_html($license['name'] ?? strtoupper($key)) . '</h4>';
        echo '<p><label><strong>' . esc_html__('اسم الترخيص', 'growthytools-catalog') . '</strong></label><br><input type="text" style="width:100%" name="_gt_license_' . esc_attr($key) . '_name" value="' . esc_attr((string) ($license['name'] ?? '')) . '"></p>';
        echo '<p><label><strong>' . esc_html__('السعر قبل الخصم', 'growthytools-catalog') . '</strong></label><br><input type="text" style="width:100%" name="_gt_license_' . esc_attr($key) . '_old_price" value="' . esc_attr((string) ($license['old_price'] ?? '')) . '"></p>';
        echo '<p><label><strong>' . esc_html__('السعر بعد الخصم', 'growthytools-catalog') . '</strong></label><br><input type="text" style="width:100%" name="_gt_license_' . esc_attr($key) . '_price" value="' . esc_attr((string) ($license['price'] ?? '')) . '"></p>';
        echo '<p><label><strong>' . esc_html__('رابط الشراء المباشر', 'growthytools-catalog') . '</strong></label><br><input type="url" style="width:100%" name="_gt_license_' . esc_attr($key) . '_checkout_url" value="' . esc_attr((string) ($license['checkout_url'] ?? '')) . '"></p>';
        echo '</div>';
    }

}

function gt_catalog_render_attributes_meta_box(WP_Post $post): void
{
    $attributes = get_post_meta($post->ID, '_gt_attributes', true);
    $attributes = is_array($attributes) ? $attributes : [];

    $flags = [
        'rtl'          => 'يدعم RTL',
        'arabic'       => 'يدعم العربية',
        'english'      => 'يدعم الإنجليزية',
        'elementor'    => 'متوافق Elementor',
        'gutenberg'    => 'متوافق Gutenberg',
        'woocommerce'  => 'متوافق WooCommerce',
        'responsive'   => 'متجاوب',
        'seo_ready'    => 'جاهز SEO',
        'dark_mode'    => 'يدعم الوضع الليلي',
        'ads_ready'    => 'جاهز للإعلانات',
    ];

    foreach ($flags as $key => $label) {
        echo '<p><label><input type="checkbox" name="_gt_attributes[' . esc_attr($key) . ']" value="1" ' . checked(! empty($attributes[$key]), true, false) . '> ' . esc_html($label) . '</label></p>';
    }
}

function gt_catalog_render_content_meta_box(WP_Post $post): void
{
    echo '<p>' . esc_html__('تم إلغاء الأقسام المتقدمة من هذه النسخة لتبسيط لوحة الإدارة.', 'growthytools-catalog') . '</p>';
}
