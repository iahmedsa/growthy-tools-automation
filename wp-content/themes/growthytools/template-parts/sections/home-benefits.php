<?php
$benefits = array_filter(array_map('trim', explode("\n", (string) get_theme_mod('growthytools_global_benefits', "بنية قابلة للتوسع\nسرعة تحميل ممتازة\nتوافق عربي كامل\nتجربة شراء مباشرة\nتحكم مرن"))));
?>
<section class="gt-section gt-benefits">
    <div class="gt-container">
        <h2><?php esc_html_e('منصة متجر قوالب بجودة منتج SaaS', 'growthytools'); ?></h2>
        <p><?php esc_html_e('كل جزء في GrowthyTools مصمم لرفع الثقة، تقليل التردد، وتحويل الزيارات إلى شراء.', 'growthytools'); ?></p>
        <div class="gt-benefits-grid">
            <?php foreach ($benefits as $benefit) : ?>
                <article class="gt-benefit-card">
                    <h3><?php echo esc_html($benefit); ?></h3>
                    <p><?php esc_html_e('جاهز للتخصيص الفوري مع كود نظيف وتجربة استخدام عربية احترافية.', 'growthytools'); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
