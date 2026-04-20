<?php
/**
 * Theme bootstrap.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

$growthytools_includes = [
    'inc/setup.php',
    'inc/theme-support.php',
    'inc/enqueue.php',
    'inc/helpers.php',
    'inc/schema.php',
    'inc/customizer.php',
];

foreach ($growthytools_includes as $file) {
    $path = get_template_directory() . '/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}
