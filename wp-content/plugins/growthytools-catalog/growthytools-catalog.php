<?php
/**
 * Plugin Name: GrowthyTools Catalog
 * Description: بنية الكتالوج ونوع المنشور الخاص بقوالب GrowthyTools.
 * Version: 1.0.0
 * Author: GrowthyTools
 * Text Domain: growthytools-catalog
 */

if (! defined('ABSPATH')) {
    exit;
}

define('GT_CATALOG_PATH', plugin_dir_path(__FILE__));
define('GT_CATALOG_URL', plugin_dir_url(__FILE__));
define('GT_CATALOG_VERSION', '1.1.0');

$gt_catalog_files = [
    'inc/helpers.php',
    'inc/post-type.php',
    'inc/taxonomies.php',
    'inc/meta-boxes.php',
    'inc/save-meta.php',
    'inc/admin-columns.php',
    'inc/sample-data.php',
];

foreach ($gt_catalog_files as $file) {
    $path = GT_CATALOG_PATH . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

register_activation_hook(__FILE__, 'gt_catalog_activate');
function gt_catalog_activate(): void
{
    gt_catalog_register_post_type();
    gt_catalog_register_taxonomies();
    update_option('gt_catalog_version', GT_CATALOG_VERSION);
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'gt_catalog_deactivate');
function gt_catalog_deactivate(): void
{
    flush_rewrite_rules();
}

add_action('init', 'gt_catalog_maybe_flush_rewrites', 50);
function gt_catalog_maybe_flush_rewrites(): void
{
    $stored_version = (string) get_option('gt_catalog_version', '');
    if (GT_CATALOG_VERSION === $stored_version) {
        return;
    }

    update_option('gt_catalog_version', GT_CATALOG_VERSION);
    flush_rewrite_rules(false);
}
