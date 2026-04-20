<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('init', 'gt_catalog_register_taxonomies');

function gt_catalog_register_taxonomies(): void
{
    register_taxonomy('gt_template_category', 'gt_template', [
        'label'        => __('تصنيفات القوالب', 'growthytools-catalog'),
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => ['slug' => 'template-category'],
    ]);

    register_taxonomy('gt_industry', 'gt_template', [
        'label'        => __('مجالات الاستخدام', 'growthytools-catalog'),
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => ['slug' => 'industry'],
    ]);
}
