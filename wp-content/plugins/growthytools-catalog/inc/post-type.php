<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('init', 'gt_catalog_register_post_type');

function gt_catalog_register_post_type(): void
{
    $labels = [
        'name'               => __('القوالب', 'growthytools-catalog'),
        'singular_name'      => __('قالب', 'growthytools-catalog'),
        'add_new'            => __('إضافة قالب', 'growthytools-catalog'),
        'add_new_item'       => __('إضافة قالب جديد', 'growthytools-catalog'),
        'edit_item'          => __('تعديل القالب', 'growthytools-catalog'),
        'new_item'           => __('قالب جديد', 'growthytools-catalog'),
        'view_item'          => __('عرض القالب', 'growthytools-catalog'),
        'search_items'       => __('بحث في القوالب', 'growthytools-catalog'),
        'not_found'          => __('لا توجد قوالب', 'growthytools-catalog'),
        'not_found_in_trash' => __('لا توجد قوالب في سلة المهملات', 'growthytools-catalog'),
        'menu_name'          => __('القوالب', 'growthytools-catalog'),
    ];

    register_post_type('gt_template', [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-layout',
        'has_archive'        => true,
        'rewrite'            => [
            'slug'       => 'templates',
            'with_front' => false,
            'feeds'      => false,
            'pages'      => true,
        ],
        'query_var'          => 'gt_template',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'publicly_queryable' => true,
        'exclude_from_search'=> false,
    ]);
}
