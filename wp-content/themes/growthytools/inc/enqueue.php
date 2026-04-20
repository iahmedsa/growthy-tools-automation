<?php
/**
 * Enqueue scripts and styles.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'growthytools_enqueue_assets');

function growthytools_enqueue_assets(): void
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('growthytools-main', get_template_directory_uri() . '/assets/css/main.css', [], $version);
    wp_enqueue_style('growthytools-components', get_template_directory_uri() . '/assets/css/components.css', ['growthytools-main'], $version);

    $primary = sanitize_hex_color((string) get_theme_mod('growthytools_primary_color', '#4f46e5')) ?: '#4f46e5';
    $accent  = sanitize_hex_color((string) get_theme_mod('growthytools_accent_color', '#0ea5e9')) ?: '#0ea5e9';
    $scale   = is_numeric(get_theme_mod('growthytools_typography_scale', '1')) ? (float) get_theme_mod('growthytools_typography_scale', '1') : 1.0;
    $scale   = max(0.85, min(1.3, $scale));

    $inline_css = sprintf(
        ':root{--gt-primary:%1$s;--gt-accent:%2$s;}html{font-size:calc(16px * %3$s);}',
        $primary,
        $accent,
        (string) $scale
    );
    wp_add_inline_style('growthytools-main', $inline_css);

    wp_enqueue_script('growthytools-main', get_template_directory_uri() . '/assets/js/main.js', [], $version, true);

    wp_localize_script('growthytools-main', 'growthytoolsData', [
        'isRTL'       => is_rtl(),
        'homeUrl'     => esc_url(home_url('/')),
        'waUrl'       => esc_url((string) get_theme_mod('growthytools_whatsapp_url', '')),
        'supportMail' => sanitize_email((string) get_theme_mod('growthytools_support_email', 'support@growthytools.com')),
    ]);

    if (is_singular('gt_template')) {
        wp_enqueue_script('growthytools-single-template', get_template_directory_uri() . '/assets/js/single-template.js', [], $version, true);
    }
}
