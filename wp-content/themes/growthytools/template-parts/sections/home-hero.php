<section class="gt-home-hero gt-section">
    <div class="gt-container gt-home-hero__grid">
        <div>
            <p class="gt-overline"><?php esc_html_e('جروثي تولز / متجر القوالب', 'growthytools'); ?></p>
            <h1><?php echo esc_html(get_theme_mod('growthytools_home_hero_title', 'قوالب عربية فاخرة... مصممة لتبيع من أول زيارة.')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('growthytools_home_hero_subtitle', 'اختر قالبًا عالي التحويل، انطلق بسرعة، واربطه مباشرة بصفحة دفعك المستضافة بدون تعقيد.')); ?></p>
            <div class="gt-actions gt-actions--micro" aria-label="<?php esc_attr_e('مؤشرات جودة المتجر', 'growthytools'); ?>">
                <span class="gt-chip">+120 مشروع مطلق</span>
                <span class="gt-chip">دعم عربي 7/6</span>
                <span class="gt-chip">شراء مباشر مؤمن</span>
            </div>
            <div class="gt-actions">
                <a class="gt-button gt-button--primary" href="<?php echo esc_url(get_post_type_archive_link('gt_template') ?: home_url('/')); ?>"><?php echo esc_html(get_theme_mod('growthytools_home_hero_primary_cta', 'استكشف القوالب')); ?></a>
                <a class="gt-button gt-button--ghost" href="<?php echo esc_url((string) get_theme_mod('growthytools_whatsapp_url', '#')); ?>"><?php echo esc_html(get_theme_mod('growthytools_home_hero_secondary_cta', 'تواصل مع خبير')); ?></a>
            </div>
        </div>
        <div class="gt-hero-panel">
            <h2><?php esc_html_e('هوية بصرية قوية + أداء سريع + تجربة شراء مباشرة.', 'growthytools'); ?></h2>
            <p><?php esc_html_e('GrowthyTools يمكّنك من بيع خدماتك ومنتجاتك الرقمية بمظهر احترافي يرفع الثقة والتحويل.', 'growthytools'); ?></p>
        </div>
    </div>
</section>
