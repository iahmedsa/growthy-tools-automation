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
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'gt_catalog_deactivate');
function gt_catalog_deactivate(): void
{
    flush_rewrite_rules();
}
