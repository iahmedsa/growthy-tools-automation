<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('save_post_gt_template', 'gt_catalog_save_template_meta');

function gt_catalog_save_template_meta(int $post_id): void
{
    if (! isset($_POST['gt_template_nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['gt_template_nonce'])), 'gt_template_save_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    $text_fields = [
        '_gt_subtitle',
        '_gt_short_sales_hook',
        '_gt_long_description',
        '_gt_starting_price',
        '_gt_old_price',
        '_gt_featured_badge',
    ];
    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }

    $url_fields = ['_gt_preview_url', '_gt_documentation_url', '_gt_support_url', '_gt_video_url'];
    foreach ($url_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, esc_url_raw(wp_unslash($_POST[$field])));
        }
    }

    $attributes = isset($_POST['_gt_attributes']) && is_array($_POST['_gt_attributes']) ? array_map('absint', wp_unslash($_POST['_gt_attributes'])) : [];
    update_post_meta($post_id, '_gt_attributes', $attributes);

    $license_keys = ['personal', 'business', 'agency'];
    $structured_licenses = [];
    foreach ($license_keys as $key) {
        $name = isset($_POST['_gt_license_' . $key . '_name']) ? sanitize_text_field(wp_unslash($_POST['_gt_license_' . $key . '_name'])) : '';
        $price = isset($_POST['_gt_license_' . $key . '_price']) ? sanitize_text_field(wp_unslash($_POST['_gt_license_' . $key . '_price'])) : '';
        $old = isset($_POST['_gt_license_' . $key . '_old_price']) ? sanitize_text_field(wp_unslash($_POST['_gt_license_' . $key . '_old_price'])) : '';
        $url = isset($_POST['_gt_license_' . $key . '_checkout_url']) ? esc_url_raw(wp_unslash($_POST['_gt_license_' . $key . '_checkout_url'])) : '';

        if ($name || $price || $old || $url) {
            $structured_licenses[] = [
                'name'         => $name,
                'price'        => $price,
                'old_price'    => $old,
                'checkout_url' => $url,
            ];
        }
    }

    if (! empty($structured_licenses)) {
        update_post_meta($post_id, '_gt_licenses', $structured_licenses);
    } elseif (isset($_POST['_gt_licenses_text'])) {
        $lines = array_filter(array_map('trim', explode("\n", sanitize_textarea_field(wp_unslash($_POST['_gt_licenses_text'])))));
        $licenses = [];
        foreach ($lines as $line) {
            $parts = array_map('trim', explode('|', $line));
            $licenses[] = [
                'name'         => sanitize_text_field($parts[0] ?? ''),
                'price'        => sanitize_text_field($parts[1] ?? ''),
                'old_price'    => sanitize_text_field($parts[2] ?? ''),
                'checkout_url' => esc_url_raw($parts[3] ?? ''),
            ];
        }
        update_post_meta($post_id, '_gt_licenses', $licenses);
    }

    $json_fields = [
        '_gt_key_features',
        '_gt_included_pages',
        '_gt_included_sections',
        '_gt_technical_highlights',
        '_gt_use_cases',
        '_gt_faq',
        '_gt_changelog',
        '_gt_gallery_images',
        '_gt_related_templates',
        '_gt_trust_badges',
    ];

    foreach ($json_fields as $field) {
        if (! isset($_POST[$field])) {
            continue;
        }

        $decoded = gt_catalog_parse_json_array((string) wp_unslash($_POST[$field]));

        if ('_gt_related_templates' === $field) {
            $decoded = array_values(array_filter(array_map('absint', $decoded)));
        } else {
            $decoded = gt_catalog_sanitize_deep($decoded);
        }

        update_post_meta($post_id, $field, $decoded);
    }
}
