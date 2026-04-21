<?php
/**
 * Shared helpers for BAYAN Core.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns company option fields.
 *
 * @return array<string,array<string,string>>
 */
function bayan_core_company_fields(): array {
	return [
		'company_name'             => [ 'label' => 'اسم الشركة', 'type' => 'text' ],
		'company_tagline'          => [ 'label' => 'الشعار التسويقي', 'type' => 'text' ],
		'company_description'      => [ 'label' => 'وصف الشركة', 'type' => 'textarea' ],
		'company_logo_default'     => [ 'label' => 'رابط الشعار الأساسي', 'type' => 'url' ],
		'company_logo_white'       => [ 'label' => 'رابط الشعار الأبيض', 'type' => 'url' ],
		'company_favicon'          => [ 'label' => 'رابط الفافيكون', 'type' => 'url' ],
		'company_phone'            => [ 'label' => 'رقم الهاتف', 'type' => 'text' ],
		'company_whatsapp'         => [ 'label' => 'واتساب', 'type' => 'text' ],
		'company_email'            => [ 'label' => 'البريد الإلكتروني', 'type' => 'email' ],
		'company_address'          => [ 'label' => 'العنوان', 'type' => 'textarea' ],
		'company_working_hours'    => [ 'label' => 'ساعات العمل', 'type' => 'text' ],
		'company_google_map_url'   => [ 'label' => 'رابط خرائط Google', 'type' => 'url' ],
		'social_linkedin'          => [ 'label' => 'LinkedIn', 'type' => 'url' ],
		'social_instagram'         => [ 'label' => 'Instagram', 'type' => 'url' ],
		'social_x'                 => [ 'label' => 'X', 'type' => 'url' ],
		'social_facebook'          => [ 'label' => 'Facebook', 'type' => 'url' ],
		'social_youtube'           => [ 'label' => 'YouTube', 'type' => 'url' ],
		'social_behance'           => [ 'label' => 'Behance', 'type' => 'url' ],
		'primary_cta_label'        => [ 'label' => 'نص الزر الرئيسي', 'type' => 'text' ],
		'primary_cta_url'          => [ 'label' => 'رابط الزر الرئيسي', 'type' => 'url' ],
		'secondary_cta_label'      => [ 'label' => 'نص الزر الثانوي', 'type' => 'text' ],
		'secondary_cta_url'        => [ 'label' => 'رابط الزر الثانوي', 'type' => 'url' ],
		'enable_english_version'   => [ 'label' => 'تفعيل النسخة الإنجليزية', 'type' => 'checkbox' ],
		'default_site_language'    => [ 'label' => 'اللغة الافتراضية', 'type' => 'text' ],
		'enable_rtl_adjustments'   => [ 'label' => 'تفعيل تحسينات RTL', 'type' => 'checkbox' ],
		'default_style_variation'  => [ 'label' => 'المظهر الافتراضي', 'type' => 'text' ],
	];
}

/**
 * Returns meta fields for each custom post type.
 *
 * @return array<string,array<string,array<string,string>>>
 */
function bayan_core_cpt_fields(): array {
	return [
		'service'     => [
			'service_subtitle'              => [ 'label' => 'العنوان الفرعي', 'type' => 'text' ],
			'service_short_description'     => [ 'label' => 'وصف مختصر', 'type' => 'textarea' ],
			'service_icon'                  => [ 'label' => 'أيقونة الخدمة (SVG/Class)', 'type' => 'text' ],
			'service_hero_image'            => [ 'label' => 'رابط صورة الهيرو', 'type' => 'url' ],
			'service_badge'                 => [ 'label' => 'شارة الخدمة', 'type' => 'text' ],
			'service_intro'                 => [ 'label' => 'مقدمة', 'type' => 'textarea' ],
			'service_who_is_it_for'         => [ 'label' => 'لمن هذه الخدمة', 'type' => 'textarea' ],
			'service_whats_included'        => [ 'label' => 'ما الذي تتضمنه', 'type' => 'textarea' ],
			'service_process_steps'         => [ 'label' => 'خطوات التنفيذ', 'type' => 'textarea' ],
			'service_deliverables'          => [ 'label' => 'المخرجات', 'type' => 'textarea' ],
			'service_duration'              => [ 'label' => 'مدة الخدمة', 'type' => 'text' ],
			'service_turnaround'            => [ 'label' => 'مدة التسليم', 'type' => 'text' ],
			'service_faq'                   => [ 'label' => 'الأسئلة الشائعة', 'type' => 'textarea' ],
			'service_related_case_studies'  => [ 'label' => 'دراسات حالة مرتبطة (IDs)', 'type' => 'text' ],
			'service_related_services'      => [ 'label' => 'خدمات مرتبطة (IDs)', 'type' => 'text' ],
			'service_primary_cta_label'     => [ 'label' => 'نص CTA الرئيسي', 'type' => 'text' ],
			'service_primary_cta_url'       => [ 'label' => 'رابط CTA الرئيسي', 'type' => 'url' ],
			'service_secondary_cta_label'   => [ 'label' => 'نص CTA الثانوي', 'type' => 'text' ],
			'service_secondary_cta_url'     => [ 'label' => 'رابط CTA الثانوي', 'type' => 'url' ],
			'service_excerpt_override'      => [ 'label' => 'مقتطف مخصص', 'type' => 'textarea' ],
		],
		'case_study'  => [
			'case_client_name'              => [ 'label' => 'اسم العميل', 'type' => 'text' ],
			'case_industry'                 => [ 'label' => 'القطاع', 'type' => 'text' ],
			'case_service_used'             => [ 'label' => 'الخدمة المستخدمة', 'type' => 'text' ],
			'case_featured_image_alt'       => [ 'label' => 'Alt الصورة البارزة', 'type' => 'text' ],
			'case_challenge'                => [ 'label' => 'التحدي', 'type' => 'textarea' ],
			'case_solution'                 => [ 'label' => 'الحل', 'type' => 'textarea' ],
			'case_results_summary'          => [ 'label' => 'ملخص النتائج', 'type' => 'textarea' ],
			'case_metric_1_value'           => [ 'label' => 'قيمة المؤشر 1', 'type' => 'text' ],
			'case_metric_1_label'           => [ 'label' => 'وصف المؤشر 1', 'type' => 'text' ],
			'case_metric_2_value'           => [ 'label' => 'قيمة المؤشر 2', 'type' => 'text' ],
			'case_metric_2_label'           => [ 'label' => 'وصف المؤشر 2', 'type' => 'text' ],
			'case_metric_3_value'           => [ 'label' => 'قيمة المؤشر 3', 'type' => 'text' ],
			'case_metric_3_label'           => [ 'label' => 'وصف المؤشر 3', 'type' => 'text' ],
			'case_gallery'                  => [ 'label' => 'معرض الصور (URLs)', 'type' => 'textarea' ],
			'case_testimonial_quote'        => [ 'label' => 'اقتباس الشهادة', 'type' => 'textarea' ],
			'case_testimonial_author'       => [ 'label' => 'اسم صاحب الشهادة', 'type' => 'text' ],
			'case_testimonial_role'         => [ 'label' => 'المنصب', 'type' => 'text' ],
			'case_cta_label'                => [ 'label' => 'نص CTA', 'type' => 'text' ],
			'case_cta_url'                  => [ 'label' => 'رابط CTA', 'type' => 'url' ],
		],
		'industry'    => [
			'industry_short_description'    => [ 'label' => 'وصف مختصر', 'type' => 'textarea' ],
			'industry_intro'                => [ 'label' => 'مقدمة', 'type' => 'textarea' ],
			'industry_common_challenges'    => [ 'label' => 'التحديات الشائعة', 'type' => 'textarea' ],
			'industry_recommended_services' => [ 'label' => 'الخدمات الموصى بها (IDs)', 'type' => 'text' ],
			'industry_related_case_studies' => [ 'label' => 'دراسات حالة مرتبطة (IDs)', 'type' => 'text' ],
			'industry_faq'                  => [ 'label' => 'الأسئلة الشائعة', 'type' => 'textarea' ],
			'industry_hero_image'           => [ 'label' => 'رابط صورة الهيرو', 'type' => 'url' ],
		],
		'testimonial' => [
			'testimonial_quote'             => [ 'label' => 'نص الشهادة', 'type' => 'textarea' ],
			'testimonial_client_name'       => [ 'label' => 'اسم العميل', 'type' => 'text' ],
			'testimonial_client_role'       => [ 'label' => 'المنصب', 'type' => 'text' ],
			'testimonial_company_name'      => [ 'label' => 'اسم الشركة', 'type' => 'text' ],
			'testimonial_client_image'      => [ 'label' => 'رابط صورة العميل', 'type' => 'url' ],
			'testimonial_rating'            => [ 'label' => 'التقييم (1-5)', 'type' => 'number' ],
			'testimonial_related_service'   => [ 'label' => 'الخدمة المرتبطة (ID)', 'type' => 'text' ],
			'testimonial_featured'          => [ 'label' => 'مميزة', 'type' => 'checkbox' ],
		],
		'team_member' => [
			'team_member_name'              => [ 'label' => 'الاسم', 'type' => 'text' ],
			'team_member_role'              => [ 'label' => 'المنصب', 'type' => 'text' ],
			'team_member_short_bio'         => [ 'label' => 'نبذة قصيرة', 'type' => 'textarea' ],
			'team_member_long_bio'          => [ 'label' => 'نبذة طويلة', 'type' => 'textarea' ],
			'team_member_photo'             => [ 'label' => 'رابط الصورة', 'type' => 'url' ],
			'team_member_email'             => [ 'label' => 'البريد الإلكتروني', 'type' => 'email' ],
			'team_member_phone'             => [ 'label' => 'الهاتف', 'type' => 'text' ],
			'team_member_linkedin'          => [ 'label' => 'LinkedIn', 'type' => 'url' ],
			'team_member_order'             => [ 'label' => 'الترتيب', 'type' => 'number' ],
		],
	];
}

/**
 * Sanitize value by field type.
 */
function bayan_core_sanitize_by_type( string $type, $value ) {
	if ( 'checkbox' === $type ) {
		return ! empty( $value ) ? '1' : '0';
	}
	if ( 'url' === $type ) {
		return esc_url_raw( (string) $value );
	}
	if ( 'email' === $type ) {
		return sanitize_email( (string) $value );
	}
	if ( 'number' === $type ) {
		return (string) intval( $value );
	}
	if ( 'textarea' === $type ) {
		return sanitize_textarea_field( (string) $value );
	}
	return sanitize_text_field( (string) $value );
}
