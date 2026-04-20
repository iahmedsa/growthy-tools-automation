<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('admin_post_gt_catalog_seed', 'gt_catalog_seed_sample_data');
add_action('admin_menu', 'gt_catalog_register_seed_page');

function gt_catalog_register_seed_page(): void
{
    add_submenu_page(
        'edit.php?post_type=gt_template',
        __('إدخال بيانات تجريبية', 'growthytools-catalog'),
        __('بيانات تجريبية', 'growthytools-catalog'),
        'manage_options',
        'gt-catalog-seed',
        'gt_catalog_render_seed_page'
    );
}

function gt_catalog_render_seed_page(): void
{
    if (! current_user_can('manage_options')) {
        return;
    }

    $seed_url = wp_nonce_url(
        admin_url('admin-post.php?action=gt_catalog_seed'),
        'gt_catalog_seed_action'
    );

    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('إدخال نموذج قالب تجريبي', 'growthytools-catalog') . '</h1>';
    echo '<p>' . esc_html__('اضغط الزر لإضافة قالب جاهز يساعدك على تجربة الواجهة بسرعة.', 'growthytools-catalog') . '</p>';
    echo '<a class="button button-primary" href="' . esc_url($seed_url) . '">' . esc_html__('إضافة قالب تجريبي الآن', 'growthytools-catalog') . '</a>';
    echo '</div>';
}

function gt_catalog_seed_sample_data(): void
{
    if (! current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }

    check_admin_referer('gt_catalog_seed_action');

    $post_id = wp_insert_post([
        'post_type'    => 'gt_template',
        'post_title'   => 'قالب SaaS عربي احترافي',
        'post_status'  => 'publish',
        'post_content' => 'قالب مصمم للتحويل وسرعة الإطلاق مع تجربة عربية Premium.',
        'post_excerpt' => 'حل مثالي للشركات الرقمية ومنتجات SaaS.',
    ]);

    if ($post_id && ! is_wp_error($post_id)) {
        update_post_meta($post_id, '_gt_subtitle', 'حل جاهز لعرض خدماتك الرقمية بثقة.');
        update_post_meta($post_id, '_gt_short_sales_hook', 'واجهة أنيقة مصممة لرفع التحويل منذ أول زيارة.');
        update_post_meta($post_id, '_gt_starting_price', '$49');
        update_post_meta($post_id, '_gt_preview_url', 'https://example.com/preview');
        update_post_meta($post_id, '_gt_licenses', [
            ['name' => 'Personal', 'price' => '$49', 'old_price' => '$69', 'checkout_url' => 'https://checkout.example.com/personal'],
            ['name' => 'Business', 'price' => '$89', 'old_price' => '$129', 'checkout_url' => 'https://checkout.example.com/business'],
            ['name' => 'Agency', 'price' => '$149', 'old_price' => '$199', 'checkout_url' => 'https://checkout.example.com/agency'],
        ]);
    }

    wp_safe_redirect(admin_url('edit.php?post_type=gt_template'));
    exit;
}
