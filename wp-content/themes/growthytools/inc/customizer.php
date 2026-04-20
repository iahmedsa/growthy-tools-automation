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
    $number = max(0.85, min(1.3, $number));
    return (string) $number;
}

function growthytools_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('growthytools_brand', [
        'title'    => __('هوية المتجر', 'growthytools'),
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

    $fields = [
        'growthytools_primary_color'         => ['#4f46e5', 'اللون الأساسي', 'sanitize_hex_color', 'text'],
        'growthytools_accent_color'          => ['#0ea5e9', 'لون الإبراز', 'sanitize_hex_color', 'text'],
        'growthytools_typography_scale'      => ['1', 'مقياس الخطوط (0.85 - 1.3)', 'growthytools_sanitize_scale', 'number'],
        'growthytools_default_cta_buy'       => ['اشتر الآن', 'زر الشراء الافتراضي', 'sanitize_text_field', 'text'],
        'growthytools_default_cta_preview'   => ['معاينة القالب', 'زر المعاينة الافتراضي', 'sanitize_text_field', 'text'],
        'growthytools_whatsapp_url'          => ['', 'رابط واتساب', 'esc_url_raw', 'url'],
        'growthytools_support_email'         => ['support@growthytools.com', 'بريد الدعم', 'sanitize_email', 'email'],
        'growthytools_social_links'          => ['', 'روابط التواصل (JSON)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_trust_badges'          => ["دعم عربي سريع\nتحديثات مستمرة\nترخيص واضح", 'شارات الثقة (سطر لكل عنصر)', 'sanitize_textarea_field', 'textarea'],
        'growthytools_global_benefits'       => ["أداء عالي\nكود نظيف\nتوافق كامل مع RTL", 'مزايا المتجر', 'sanitize_textarea_field', 'textarea'],
        'growthytools_home_hero_title'       => ['قوالب ووردبريس عربية تُباع بثقة وتتحول إلى نتائج.', 'عنوان الهيرو', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_subtitle'    => ['اختر القالب المناسب لنشاطك وابدأ البيع فورًا عبر تجربة شراء مباشرة.', 'وصف الهيرو', 'sanitize_textarea_field', 'textarea'],
        'growthytools_home_hero_primary_cta' => ['استعرض القوالب', 'CTA أساسي للهيرو', 'sanitize_text_field', 'text'],
        'growthytools_home_hero_secondary_cta' => ['احجز استشارة سريعة', 'CTA ثانوي للهيرو', 'sanitize_text_field', 'text'],
        'growthytools_featured_title'        => ['القوالب الأكثر طلبًا', 'عنوان قسم القوالب المميزة', 'sanitize_text_field', 'text'],
        'growthytools_testimonials_title'    => ['ماذا يقول عملاؤنا', 'عنوان آراء العملاء', 'sanitize_text_field', 'text'],
        'growthytools_faq_title'             => ['أسئلة شائعة قبل الشراء', 'عنوان FAQ', 'sanitize_text_field', 'text'],
        'growthytools_footer_content'        => ['GrowthyTools — متجر قوالب ووردبريس Premium موجه للأسواق العربية.', 'محتوى الفوتر', 'sanitize_textarea_field', 'textarea'],
        'growthytools_legal_links'           => ['', 'روابط قانونية (JSON)', 'sanitize_textarea_field', 'textarea'],
    ];

    foreach ($fields as $setting_id => $meta) {
        [$default, $label, $sanitize, $type] = $meta;

        $wp_customize->add_setting($setting_id, [
            'default'           => $default,
            'sanitize_callback' => $sanitize,
        ]);

        $wp_customize->add_control($setting_id, [
            'label'   => __($label, 'growthytools'),
            'section' => 'growthytools_brand',
            'type'    => $type,
        ]);
    }
}
