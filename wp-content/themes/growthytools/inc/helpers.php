<?php
/**
 * Theme helper functions.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

function growthytools_get_meta(int $post_id, string $key, $default = '')
{
    $value = get_post_meta($post_id, $key, true);
    return '' !== $value && null !== $value ? $value : $default;
}

function growthytools_format_price(string $price): string
{
    if ('' === $price) {
        return __('تواصل معنا', 'growthytools');
    }

    return sprintf(__('ابتداءً من %s', 'growthytools'), esc_html($price));
}

function growthytools_get_licenses(int $post_id): array
{
    $licenses = growthytools_get_meta($post_id, '_gt_licenses', []);
    if (! is_array($licenses)) {
        return [];
    }

    return array_values(array_filter($licenses, static function ($item): bool {
        return is_array($item) && ! empty($item['name']) && ! empty($item['checkout_url']);
    }));
}

function growthytools_get_repeater(int $post_id, string $meta_key): array
{
    $items = growthytools_get_meta($post_id, $meta_key, []);
    return is_array($items) ? $items : [];
}

function growthytools_get_breadcrumbs(): array
{
    $crumbs = [
        [
            'label' => __('جروثي تولز', 'growthytools'),
            'url'   => home_url('/'),
        ],
    ];

    if (is_post_type_archive('gt_template')) {
        $crumbs[] = [
            'label' => __('القوالب', 'growthytools'),
            'url'   => get_post_type_archive_link('gt_template'),
        ];
    }

    if (is_singular('gt_template')) {
        $crumbs[] = [
            'label' => __('القوالب', 'growthytools'),
            'url'   => get_post_type_archive_link('gt_template'),
        ];
        $crumbs[] = [
            'label' => get_the_title(),
            'url'   => get_permalink(),
        ];
    }

    return $crumbs;
}

function growthytools_render_breadcrumbs(): void
{
    $crumbs = growthytools_get_breadcrumbs();
    if (count($crumbs) < 2) {
        return;
    }

    echo '<nav class="gt-breadcrumbs" aria-label="' . esc_attr__('مسار التنقل', 'growthytools') . '"><ol>';
    foreach ($crumbs as $crumb) {
        echo '<li><a href="' . esc_url($crumb['url']) . '">' . esc_html($crumb['label']) . '</a></li>';
    }
    echo '</ol></nav>';
}

function growthytools_get_theme_mode(): string
{
    $mode = (string) get_theme_mod('growthytools_default_appearance', 'dark');
    return in_array($mode, ['light', 'dark', 'system'], true) ? $mode : 'dark';
}

function growthytools_get_compatibility_flags(int $post_id): array
{
    $flags = growthytools_get_meta($post_id, '_gt_attributes', []);
    if (! is_array($flags)) {
        return [];
    }

    $labels = [
        'rtl'         => 'اتجاه عربي كامل',
        'arabic'      => 'العربية',
        'english'     => 'دعم الإنجليزية',
        'elementor'   => 'متوافق مع إليمنتور',
        'gutenberg'   => 'متوافق مع محرر ووردبريس',
        'woocommerce' => 'متوافق مع ووكومرس',
        'responsive'  => 'تصميم متجاوب',
        'seo_ready'   => 'مهيأ لمحركات البحث',
        'dark_mode'   => 'وضع ليلي',
        'ads_ready'   => 'جاهز للإعلانات',
    ];

    $active = [];
    foreach ($labels as $key => $label) {
        if (! empty($flags[$key])) {
            $active[] = $label;
        }
    }

    return $active;
}
