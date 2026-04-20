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

function growthytools_sanitize_gradient($value): string
{
    return in_array($value, ['ocean', 'sunset', 'midnight'], true) ? $value : 'ocean';
}

function growthytools_sanitize_font($value): string
{
    return in_array($value, ['Cairo', 'Tajawal', 'Noto Sans Arabic'], true) ? $value : 'Cairo';
}

function growthytools_sanitize_mode($value): string
{
    return in_array($value, ['light', 'dark', 'system'], true) ? $value : 'dark';
}

function growthytools_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('growthytools_brand', [
        'title'    => __('لوحة تخصيص جروثي تولز', 'growthytools'),
        'priority' => 25,
    ]);

    $wp_customize->add_setting('custom_logo');
    $wp_customize->add_setting('site_icon');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'growthytools_brand_logo', [
        'label'    => __('شعار المتجر', 'growthytools'),
        'section'  => 'title_tagline',
        'settings' => 'custom_logo',
        'width'    => 240,
        'height'   => 60,
    ]));

    $fields = [
        'growthytools_primary_color'           => ['#0ea5a4', 'اللون الأساسي', 'sanitize_hex_color', 'text'],
        'growthytools_accent_color'            => ['#f59e0b', 'اللون الثانوي', 'sanitize_hex_color', 'text'],
        'growthytools_neutral_bg'              => ['#0b1020', 'لون الخلفية', 'sanitize_hex_color', 'text'],
        'growthytools_gradient_preset'         => ['ocean', 'نمط التدرج', 'growthytools_sanitize_gradient', 'select', ['ocean' => 'محيطي', 'sunset' => 'غروب', 'midnight' => 'ليلي']],
        'growthytools_heading_font'            => ['Cairo', 'خط العناوين', 'growthytools_sanitize_font', 'select', ['Cairo' => 'القاهرة', 'Tajawal' => 'تجوال', 'Noto Sans Arabic' => 'نوتو عربي']],
        'growthytools_body_font'               => ['Tajawal', 'خط النصوص', 'growthytools_sanitize_font', 'select', ['Tajawal' => 'تجوال', 'Cairo' => 'القاهرة', 'Noto Sans Arabic' => 'نوتو عربي']],
        'growthytools_typography_scale'        => ['1', 'حجم الخط العام', 'growthytools_sanitize_scale', 'number'],
        'growthytools_button_radius'           => ['12', 'استدارة الأزرار', 'absint', 'number'],
        'growthytools_default_appearance'      => ['dark', 'الوضع الافتراضي', 'growthytools_sanitize_mode', 'select', ['light' => 'فاتح', 'dark' => 'داكن', 'system' => 'حسب الجهاز']],
        'growthytools_enable_dark_mode'        => [1, 'تفعيل الوضع الداكن', 'absint', 'checkbox'],
        'growthytools_enable_light_mode'       => [1, 'تفعيل الوضع الفاتح', 'absint', 'checkbox'],
        'growthytools_home_hero_title'         => ['قوالب عربية احترافية ترفع مبيعاتك', 'عنوان الصفحة الرئيسية', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_subtitle'      => ['منصة جروثي تولز تمنحك تجربة بيع مباشرة ومظهرًا احترافيًا قويًا.', 'وصف الصفحة الرئيسية', 'sanitize_textarea_field', 'textarea'],
        'growthytools_home_hero_primary_cta'   => ['استعرض القوالب', 'زر رئيسي', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_secondary_cta' => ['تواصل مع المبيعات', 'زر ثانوي', 'sanitize_text_field', 'text'],
        'growthytools_featured_title'          => ['القوالب الأكثر مبيعًا', 'عنوان القوالب المميزة', 'sanitize_text_field', 'text'],
        'growthytools_testimonials_title'      => ['نتائج العملاء', 'عنوان آراء العملاء', 'sanitize_text_field', 'text'],
        'growthytools_faq_title'               => ['الأسئلة الشائعة', 'عنوان الأسئلة', 'sanitize_text_field', 'text'],
        'growthytools_global_benefits'         => ["سرعة تحميل ممتازة\nتوافق عربي كامل\nدعم فني سريع", 'مزايا المتجر (سطر لكل ميزة)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_trust_badges'            => ["شراء مباشر وآمن\nتحديثات مستمرة\nتوثيق واضح", 'عناصر الثقة (سطر لكل عنصر)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_whatsapp_url'            => ['', 'رابط واتساب', 'esc_url_raw', 'url'],
        'growthytools_support_email'           => ['support@example.com', 'بريد الدعم', 'sanitize_email', 'email'],
        'growthytools_footer_content'          => ['جروثي تولز — قوالب عربية مصممة للتحويل.', 'نص الفوتر', 'sanitize_textarea_field', 'textarea'],
    ];

    foreach ($fields as $id => $meta) {
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
