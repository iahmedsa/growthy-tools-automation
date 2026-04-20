<?php
/**
 * Theme customizer.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('customize_register', 'growthytools_customize_register');

function growthytools_sanitize_scale($value): string
{
    $number = is_numeric($value) ? (float) $value : 1.0;
    return (string) max(0.85, min(1.3, $number));
}

function growthytools_sanitize_select($value, WP_Customize_Control $control): string
{
    $choices = $control->choices;
    return array_key_exists($value, $choices) ? (string) $value : (string) $control->setting->default;
}

function growthytools_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('growthytools_brand', [
        'title'    => __('هوية المتجر والمظهر', 'growthytools'),
        'priority' => 25,
    ]);

    $wp_customize->add_setting('custom_logo');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'growthytools_brand_logo', [
        'label'    => __('شعار المتجر', 'growthytools'),
        'section'  => 'title_tagline',
        'settings' => 'custom_logo',
        'width'    => 240,
        'height'   => 60,
    ]));

    $wp_customize->add_setting('site_icon');

    $settings = [
        'growthytools_primary_color'            => ['#0ea5a4', 'اللون الأساسي', 'sanitize_hex_color', 'text'],
        'growthytools_accent_color'             => ['#f59e0b', 'اللون الثانوي', 'sanitize_hex_color', 'text'],
        'growthytools_neutral_bg'               => ['#0b1020', 'لون الخلفية المحايد (Dark)', 'sanitize_hex_color', 'text'],
        'growthytools_gradient_preset'          => ['ocean', 'تدرج الهوية', 'growthytools_sanitize_select', 'select', [
            'ocean' => 'Ocean Luxe',
            'sunset' => 'Sunset Gold',
            'midnight' => 'Midnight Neon',
        ]],
        'growthytools_heading_font'             => ['Cairo', 'خط العناوين', 'growthytools_sanitize_select', 'select', [
            'Cairo' => 'Cairo',
            'Tajawal' => 'Tajawal',
            'Noto Sans Arabic' => 'Noto Sans Arabic',
        ]],
        'growthytools_body_font'                => ['Tajawal', 'خط النص', 'growthytools_sanitize_select', 'select', [
            'Tajawal' => 'Tajawal',
            'Cairo' => 'Cairo',
            'Noto Sans Arabic' => 'Noto Sans Arabic',
        ]],
        'growthytools_typography_scale'         => ['1', 'مقياس الخطوط', 'growthytools_sanitize_scale', 'number'],
        'growthytools_button_radius'            => ['12', 'استدارة الأزرار (px)', 'absint', 'number'],
        'growthytools_card_intensity'           => ['1', 'حدة تصميم البطاقات (1-3)', 'absint', 'number'],
        'growthytools_default_appearance'       => ['dark', 'الوضع الافتراضي', 'growthytools_sanitize_select', 'select', [
            'light' => 'فاتح',
            'dark' => 'داكن',
            'system' => 'حسب النظام',
        ]],
        'growthytools_enable_dark_mode'         => [1, 'تفعيل الوضع الداكن', 'absint', 'checkbox'],
        'growthytools_enable_light_mode'        => [1, 'تفعيل الوضع الفاتح', 'absint', 'checkbox'],
        'growthytools_default_cta_buy'          => ['اشتر الآن', 'زر الشراء الافتراضي', 'sanitize_text_field', 'text'],
        'growthytools_default_cta_preview'      => ['معاينة مباشرة', 'زر المعاينة الافتراضي', 'sanitize_text_field', 'text'],
        'growthytools_whatsapp_url'             => ['', 'رابط واتساب', 'esc_url_raw', 'url'],
        'growthytools_support_email'            => ['support@growthytools.com', 'بريد الدعم', 'sanitize_email', 'email'],
        'growthytools_social_links'             => ['', 'روابط التواصل (JSON)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_trust_badges'             => ["دعم عربي سريع\nتحديثات مستمرة\nترخيص واضح", 'شارات الثقة (سطر لكل عنصر)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_global_benefits'          => ["هيكل سريع\nقابل للتوسع\nمتوافق RTL", 'مزايا المتجر', 'sanitize_textarea_field', 'textarea'],
        'growthytools_home_hero_title'          => ['قوالب عربية فاخرة... مصممة لتبيع من أول زيارة.', 'عنوان الهيرو', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_subtitle'       => ['منصة GrowthyTools تمنحك قوالب Premium بجودة SaaS وسير شراء مباشر بدون تعقيد.', 'وصف الهيرو', 'sanitize_textarea_field', 'textarea'],
        'growthytools_home_hero_primary_cta'    => ['استكشف القوالب', 'CTA أساسي', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_secondary_cta'  => ['تواصل مع خبير', 'CTA ثانوي', 'sanitize_text_field', 'text'],
        'growthytools_featured_title'           => ['القوالب الأكثر مبيعًا الآن', 'عنوان القوالب المميزة', 'sanitize_text_field', 'text'],
        'growthytools_testimonials_title'       => ['نتائج العملاء تتحدث', 'عنوان التقييمات', 'sanitize_text_field', 'text'],
        'growthytools_faq_title'                => ['إجابات سريعة قبل الشراء', 'عنوان FAQ', 'sanitize_text_field', 'text'],
        'growthytools_footer_content'           => ['GrowthyTools — متجر قوالب WordPress Premium للأسواق العربية.', 'محتوى الفوتر', 'sanitize_textarea_field', 'textarea'],
        'growthytools_legal_links'              => ['', 'روابط قانونية (JSON)', 'sanitize_textarea_field', 'textarea'],
    ];

    foreach ($settings as $id => $meta) {
        [$default, $label, $sanitize, $type] = $meta;
        $choices = $meta[4] ?? [];

        $wp_customize->add_setting($id, [
            'default'           => $default,
            'sanitize_callback' => $sanitize,
        ]);

        $args = [
            'label'   => __($label, 'growthytools'),
            'section' => 'growthytools_brand',
            'type'    => $type,
        ];

        if (! empty($choices)) {
            $args['choices'] = $choices;
        }

        $wp_customize->add_control($id, $args);
    }
}
