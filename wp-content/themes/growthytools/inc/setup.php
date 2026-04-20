<?php
/**
 * Setup hooks.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'growthytools_setup_theme');

function growthytools_setup_theme(): void
{
    load_theme_textdomain('growthytools', get_template_directory() . '/languages');

    register_nav_menus([
        'primary' => __('القائمة الرئيسية', 'growthytools'),
        'footer'  => __('قائمة الفوتر', 'growthytools'),
    ]);
}
