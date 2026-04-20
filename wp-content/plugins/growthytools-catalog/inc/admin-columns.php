<?php
if (! defined('ABSPATH')) {
    exit;
}

add_filter('manage_gt_template_posts_columns', 'gt_catalog_admin_columns');
function gt_catalog_admin_columns(array $columns): array
{
    $columns['starting_price'] = __('السعر الابتدائي', 'growthytools-catalog');
    $columns['template_type']  = __('التصنيف', 'growthytools-catalog');
    return $columns;
}

add_action('manage_gt_template_posts_custom_column', 'gt_catalog_render_admin_columns', 10, 2);
function gt_catalog_render_admin_columns(string $column, int $post_id): void
{
    if ('starting_price' === $column) {
        echo esc_html((string) get_post_meta($post_id, '_gt_starting_price', true));
    }

    if ('template_type' === $column) {
        $terms = get_the_terms($post_id, 'gt_template_category');
        if (is_array($terms)) {
            echo esc_html(implode(', ', wp_list_pluck($terms, 'name')));
        }
    }
}
