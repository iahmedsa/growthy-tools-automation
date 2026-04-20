<section class="gt-home-hero gt-section">
    <div class="gt-container gt-home-hero__grid">
        <div>
            <p class="gt-overline"><?php esc_html_e('GrowthyTools Premium Store', 'growthytools'); ?></p>
            <h1><?php echo esc_html(get_theme_mod('growthytools_home_hero_title', 'قوالب عربية تُباع بثقة.')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('growthytools_home_hero_subtitle', 'حلول جاهزة للنمو والتحويل بدون تعقيد تقني.')); ?></p>
            <div class="gt-actions">
                <a class="gt-button gt-button--primary" href="<?php echo esc_url(get_post_type_archive_link('gt_template') ?: home_url('/')); ?>"><?php echo esc_html(get_theme_mod('growthytools_home_hero_primary_cta', 'استعرض القوالب')); ?></a>
                <a class="gt-button gt-button--ghost" href="<?php echo esc_url((string) get_theme_mod('growthytools_whatsapp_url', '#')); ?>"><?php echo esc_html(get_theme_mod('growthytools_home_hero_secondary_cta', 'تواصل واتساب')); ?></a>
            </div>
        </div>
        <div class="gt-hero-panel" aria-hidden="true">
            <p><?php esc_html_e('تجربة شراء مباشرة — بدون سلة معقدة — وبدء فوري.', 'growthytools'); ?></p>
        </div>
    </div>
</section>
