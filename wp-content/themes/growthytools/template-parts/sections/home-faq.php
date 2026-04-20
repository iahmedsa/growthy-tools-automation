<?php
$extra_q = (string) get_theme_mod('growthytools_extra_faq_question', '');
$extra_a = (string) get_theme_mod('growthytools_extra_faq_answer', '');
?>
<section class="gt-section">
    <div class="gt-container">
        <h2 class="gt-faq-title"><?php echo esc_html(get_theme_mod('growthytools_faq_title', 'إجابات سريعة قبل الشراء')); ?></h2>
        <div class="gt-faq-list gt-faq-list--modern">
            <details>
                <summary><?php esc_html_e('هل يمكنني الشراء مباشرة بدون سلة؟', 'growthytools'); ?></summary>
                <p><?php esc_html_e('نعم، كل ترخيص مرتبط برابط شراء مباشر وآمن.', 'growthytools'); ?></p>
            </details>
            <details>
                <summary><?php esc_html_e('هل القوالب مناسبة للعربية بالكامل؟', 'growthytools'); ?></summary>
                <p><?php esc_html_e('تم بناء القوالب بمعمارية عربية أولاً مع توافق كامل للاتجاه من اليمين لليسار.', 'growthytools'); ?></p>
            </details>
            <details>
                <summary><?php esc_html_e('ماذا عن التحديثات والدعم؟', 'growthytools'); ?></summary>
                <p><?php esc_html_e('تحصل على تحديثات مستمرة ودعم فني عربي سريع حسب نوع الترخيص.', 'growthytools'); ?></p>
            </details>
            <?php if ($extra_q && $extra_a) : ?>
                <details>
                    <summary><?php echo esc_html($extra_q); ?></summary>
                    <p><?php echo esc_html($extra_a); ?></p>
                </details>
            <?php endif; ?>
        </div>
    </div>
</section>
