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

    $primary = sanitize_hex_color((string) get_theme_mod('growthytools_primary_color', '#0ea5a4')) ?: '#0ea5a4';
    $accent  = sanitize_hex_color((string) get_theme_mod('growthytools_accent_color', '#f59e0b')) ?: '#f59e0b';
    $neutral = sanitize_hex_color((string) get_theme_mod('growthytools_neutral_bg', '#0b1020')) ?: '#0b1020';
    $scale   = is_numeric(get_theme_mod('growthytools_typography_scale', '1')) ? (float) get_theme_mod('growthytools_typography_scale', '1') : 1.0;
    $scale   = max(0.85, min(1.3, $scale));
    $radius  = max(6, min(24, (int) get_theme_mod('growthytools_button_radius', 12)));
    $intense = max(1, min(3, (int) get_theme_mod('growthytools_card_intensity', 1)));

    $gradients = [
        'ocean'    => 'linear-gradient(135deg,#061327 0%,#0f3d45 55%,#1b7c7a 100%)',
        'sunset'   => 'linear-gradient(135deg,#1f1537 0%,#4c1d2f 55%,#b45309 100%)',
        'midnight' => 'linear-gradient(135deg,#030711 0%,#1d1b4b 50%,#164e63 100%)',
    ];
    $preset = (string) get_theme_mod('growthytools_gradient_preset', 'ocean');
    $gradient = $gradients[$preset] ?? $gradients['ocean'];

    $heading_font = (string) get_theme_mod('growthytools_heading_font', 'Cairo');
    $body_font    = (string) get_theme_mod('growthytools_body_font', 'Tajawal');

    $inline_css = sprintf(
        ':root{--gt-primary:%1$s;--gt-accent:%2$s;--gt-neutral:%3$s;--gt-scale:%4$s;--gt-radius:%5$spx;--gt-card-intensity:%6$s;--gt-gradient:%7$s;--gt-heading:%8$s;--gt-body:%9$s;}',
        $primary,
        $accent,
        $neutral,
        (string) $scale,
        (string) $radius,
        (string) $intense,
        $gradient,
        '"' . esc_attr($heading_font) . '",sans-serif',
        '"' . esc_attr($body_font) . '",sans-serif'
    );
    wp_add_inline_style('growthytools-main', $inline_css);

    wp_enqueue_script('growthytools-main', get_template_directory_uri() . '/assets/js/main.js', [], $version, true);

    wp_localize_script('growthytools-main', 'growthytoolsData', [
        'appearance'      => growthytools_get_theme_mode(),
        'enableDark'      => (bool) get_theme_mod('growthytools_enable_dark_mode', 1),
        'enableLight'     => (bool) get_theme_mod('growthytools_enable_light_mode', 1),
        'homeUrl'         => esc_url(home_url('/')),
        'waUrl'           => esc_url((string) get_theme_mod('growthytools_whatsapp_url', '')),
        'supportMail'     => sanitize_email((string) get_theme_mod('growthytools_support_email', 'support@growthytools.com')),
    ]);

    if (is_singular('gt_template')) {
        wp_enqueue_script('growthytools-single-template', get_template_directory_uri() . '/assets/js/single-template.js', [], $version, true);
    }
}
