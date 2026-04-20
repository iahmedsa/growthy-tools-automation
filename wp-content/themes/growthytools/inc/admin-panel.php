<?php
/**
 * Admin control panel.
 *
 * @package GrowthyTools
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'growthytools_register_admin_panel');
add_action('admin_init', 'growthytools_handle_admin_panel_save');

function growthytools_register_admin_panel(): void
{
    add_menu_page(
        __('لوحة التحكم', 'growthytools'),
        __('لوحة التحكم', 'growthytools'),
        'manage_options',
        'growthytools-control-panel',
        'growthytools_render_admin_panel',
        'dashicons-admin-customizer',
        3
    );
}

function growthytools_handle_admin_panel_save(): void
{
    if (! isset($_POST['growthytools_admin_panel_nonce'])) {
        return;
    }

    if (! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['growthytools_admin_panel_nonce'])), 'growthytools_save_admin_panel')) {
        return;
    }

    if (! current_user_can('manage_options')) {
        return;
    }

    $fields = [
        'growthytools_primary_color' => 'sanitize_hex_color',
        'growthytools_accent_color' => 'sanitize_hex_color',
        'growthytools_neutral_bg' => 'sanitize_hex_color',
        'growthytools_heading_font' => 'sanitize_text_field',
        'growthytools_body_font' => 'sanitize_text_field',
        'growthytools_home_hero_title' => 'sanitize_text_field',
        'growthytools_home_hero_subtitle' => 'sanitize_textarea_field',
        'growthytools_home_hero_primary_cta' => 'sanitize_text_field',
        'growthytools_home_hero_secondary_cta' => 'sanitize_text_field',
        'growthytools_featured_title' => 'sanitize_text_field',
        'growthytools_faq_title' => 'sanitize_text_field',
        'growthytools_footer_content' => 'sanitize_textarea_field',
        'growthytools_linkedin_url' => 'esc_url_raw',
        'growthytools_header_style' => 'sanitize_text_field',
        'growthytools_footer_style' => 'sanitize_text_field',
        'growthytools_extra_faq_question' => 'sanitize_text_field',
        'growthytools_extra_faq_answer' => 'sanitize_textarea_field',
    ];

    foreach ($fields as $key => $sanitizer) {
        if (! isset($_POST[$key])) {
            continue;
        }

        $raw = wp_unslash($_POST[$key]);
        $value = call_user_func($sanitizer, $raw);
        set_theme_mod($key, $value);
    }

    add_settings_error('growthytools_messages', 'growthytools_saved', __('تم حفظ التعديلات بنجاح.', 'growthytools'), 'updated');
}

function growthytools_render_admin_panel(): void
{
    if (! current_user_can('manage_options')) {
        return;
    }

    settings_errors('growthytools_messages');
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('لوحة التحكم', 'growthytools'); ?></h1>
        <form method="post">
            <?php wp_nonce_field('growthytools_save_admin_panel', 'growthytools_admin_panel_nonce'); ?>
            <table class="form-table" role="presentation">
                <tr><th><?php esc_html_e('اللون الأساسي', 'growthytools'); ?></th><td><input type="text" name="growthytools_primary_color" value="<?php echo esc_attr((string) get_theme_mod('growthytools_primary_color', '#00e5ff')); ?>"></td></tr>
                <tr><th><?php esc_html_e('اللون الثانوي', 'growthytools'); ?></th><td><input type="text" name="growthytools_accent_color" value="<?php echo esc_attr((string) get_theme_mod('growthytools_accent_color', '#00bcd4')); ?>"></td></tr>
                <tr><th><?php esc_html_e('لون الخلفية', 'growthytools'); ?></th><td><input type="text" name="growthytools_neutral_bg" value="<?php echo esc_attr((string) get_theme_mod('growthytools_neutral_bg', '#050b14')); ?>"></td></tr>
                <tr><th><?php esc_html_e('خط العناوين', 'growthytools'); ?></th><td><input type="text" name="growthytools_heading_font" value="<?php echo esc_attr((string) get_theme_mod('growthytools_heading_font', 'Cairo')); ?>"></td></tr>
                <tr><th><?php esc_html_e('خط النصوص', 'growthytools'); ?></th><td><input type="text" name="growthytools_body_font" value="<?php echo esc_attr((string) get_theme_mod('growthytools_body_font', 'Tajawal')); ?>"></td></tr>
                <tr><th><?php esc_html_e('عنوان الهيرو', 'growthytools'); ?></th><td><input type="text" class="regular-text" name="growthytools_home_hero_title" value="<?php echo esc_attr((string) get_theme_mod('growthytools_home_hero_title', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('وصف الهيرو', 'growthytools'); ?></th><td><textarea name="growthytools_home_hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea((string) get_theme_mod('growthytools_home_hero_subtitle', '')); ?></textarea></td></tr>
                <tr><th><?php esc_html_e('زر رئيسي', 'growthytools'); ?></th><td><input type="text" name="growthytools_home_hero_primary_cta" value="<?php echo esc_attr((string) get_theme_mod('growthytools_home_hero_primary_cta', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('زر ثانوي', 'growthytools'); ?></th><td><input type="text" name="growthytools_home_hero_secondary_cta" value="<?php echo esc_attr((string) get_theme_mod('growthytools_home_hero_secondary_cta', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('عنوان القوالب', 'growthytools'); ?></th><td><input type="text" name="growthytools_featured_title" value="<?php echo esc_attr((string) get_theme_mod('growthytools_featured_title', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('عنوان الأسئلة الشائعة', 'growthytools'); ?></th><td><input type="text" name="growthytools_faq_title" value="<?php echo esc_attr((string) get_theme_mod('growthytools_faq_title', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('سؤال إضافي', 'growthytools'); ?></th><td><input type="text" class="regular-text" name="growthytools_extra_faq_question" value="<?php echo esc_attr((string) get_theme_mod('growthytools_extra_faq_question', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('إجابة السؤال الإضافي', 'growthytools'); ?></th><td><textarea name="growthytools_extra_faq_answer" rows="3" class="large-text"><?php echo esc_textarea((string) get_theme_mod('growthytools_extra_faq_answer', '')); ?></textarea></td></tr>
                <tr><th><?php esc_html_e('نمط الهيدر', 'growthytools'); ?></th><td><select name="growthytools_header_style"><option value="boxed" <?php selected(get_theme_mod('growthytools_header_style', 'boxed'), 'boxed'); ?>><?php esc_html_e('بطاقة', 'growthytools'); ?></option><option value="flat" <?php selected(get_theme_mod('growthytools_header_style', 'boxed'), 'flat'); ?>><?php esc_html_e('بدون بطاقة', 'growthytools'); ?></option></select></td></tr>
                <tr><th><?php esc_html_e('نمط الفوتر', 'growthytools'); ?></th><td><select name="growthytools_footer_style"><option value="boxed" <?php selected(get_theme_mod('growthytools_footer_style', 'boxed'), 'boxed'); ?>><?php esc_html_e('بطاقة', 'growthytools'); ?></option><option value="flat" <?php selected(get_theme_mod('growthytools_footer_style', 'boxed'), 'flat'); ?>><?php esc_html_e('بدون بطاقة', 'growthytools'); ?></option></select></td></tr>
                <tr><th><?php esc_html_e('رابط لينكدإن', 'growthytools'); ?></th><td><input type="url" class="regular-text" name="growthytools_linkedin_url" value="<?php echo esc_attr((string) get_theme_mod('growthytools_linkedin_url', '')); ?>"></td></tr>
                <tr><th><?php esc_html_e('نص الفوتر', 'growthytools'); ?></th><td><textarea name="growthytools_footer_content" rows="2" class="large-text"><?php echo esc_textarea((string) get_theme_mod('growthytools_footer_content', '')); ?></textarea></td></tr>
            </table>
            <?php submit_button(__('حفظ لوحة التحكم', 'growthytools')); ?>
        </form>
    </div>
    <?php
}
