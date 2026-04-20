<?php
/**
 * Schema helpers.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('wp_head', 'growthytools_output_single_template_schema');

function growthytools_output_single_template_schema(): void
{
    if (! is_singular('gt_template')) {
        return;
    }

    $post_id   = get_the_ID();
    $price     = (string) growthytools_get_meta($post_id, '_gt_starting_price', '');
    $preview   = (string) growthytools_get_meta($post_id, '_gt_preview_url', '');
    $licenses  = growthytools_get_licenses($post_id);
    $first_buy = $licenses[0]['checkout_url'] ?? '';

    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Product',
        'name'        => get_the_title(),
        'description' => wp_strip_all_tags((string) growthytools_get_meta($post_id, '_gt_short_sales_hook', get_the_excerpt())),
        'image'       => get_the_post_thumbnail_url($post_id, 'large') ?: '',
        'url'         => get_permalink($post_id),
        'brand'       => [
            '@type' => 'Brand',
            'name'  => 'جروثي تولز',
        ],
        'offers'      => [
            '@type'         => 'Offer',
            'priceCurrency' => 'USD',
            'price'         => $price,
            'availability'  => 'https://schema.org/InStock',
            'url'           => $first_buy ?: get_permalink($post_id),
        ],
        'isRelatedTo'  => $preview,
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}
