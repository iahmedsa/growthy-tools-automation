<?php
$benefits = array_filter(array_map('trim', explode("\n", (string) get_theme_mod('growthytools_global_benefits', "مبني بأحدث المعايير\nأداء قوي\nدعم عربي سريع"))));
?>
<section class="gt-section gt-benefits">
    <div class="gt-container">
        <h2><?php esc_html_e('لماذا GrowthyTools خيار العلامات الذكية؟', 'growthytools'); ?></h2>
        <div class="gt-benefits-grid">
            <?php foreach ($benefits as $benefit) : ?>
                <article class="gt-benefit-card">
                    <h3><?php echo esc_html($benefit); ?></h3>
                    <p><?php esc_html_e('مبني لتقديم تجربة استخدام احترافية وسهلة التخصيص مع أداء موثوق.', 'growthytools'); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
