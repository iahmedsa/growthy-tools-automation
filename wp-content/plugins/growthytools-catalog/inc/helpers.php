<?php
if (! defined('ABSPATH')) {
    exit;
}

function gt_catalog_meta_fields(): array
{
    return [
        '_gt_subtitle'            => 'text',
        '_gt_short_sales_hook'    => 'text',
        '_gt_long_description'    => 'textarea',
        '_gt_starting_price'      => 'text',
        '_gt_old_price'           => 'text',
        '_gt_featured_badge'      => 'text',
        '_gt_preview_url'         => 'url',
        '_gt_documentation_url'   => 'url',
        '_gt_support_url'         => 'url',
        '_gt_video_url'           => 'url',
        '_gt_attributes'          => 'array',
        '_gt_licenses'            => 'array',
        '_gt_key_features'        => 'array',
        '_gt_included_pages'      => 'array',
        '_gt_included_sections'   => 'array',
        '_gt_technical_highlights'=> 'array',
        '_gt_use_cases'           => 'array',
        '_gt_faq'                 => 'array',
        '_gt_changelog'           => 'array',
        '_gt_gallery_images'      => 'array',
        '_gt_related_templates'   => 'array',
        '_gt_trust_badges'        => 'array',
    ];
}

function gt_catalog_parse_json_array(string $raw): array
{
    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : [];
}

function gt_catalog_sanitize_deep($value)
{
    if (is_array($value)) {
        $sanitized = [];
        foreach ($value as $key => $item) {
            $sanitized_key = is_string($key) ? sanitize_key($key) : $key;
            $sanitized[$sanitized_key] = gt_catalog_sanitize_deep($item);
        }
        return $sanitized;
    }

    if (is_string($value)) {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return esc_url_raw($value);
        }
        return sanitize_text_field($value);
    }

    if (is_bool($value) || is_int($value) || is_float($value) || null === $value) {
        return $value;
    }

    return sanitize_text_field((string) $value);
}
