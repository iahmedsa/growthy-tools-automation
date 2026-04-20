<?php
$post_id      = get_the_ID();
$preview_url  = (string) growthytools_get_meta($post_id, '_gt_preview_url', '');
$licenses     = growthytools_get_licenses($post_id);
$trust_badges = array_filter(array_map('trim', explode("\n", (string) get_theme_mod('growthytools_trust_badges', 'دعم عربي سريع'))));
?>
<div class="gt-buybox" data-buy-box>
    <h2><?php esc_html_e('اختر الترخيص وابدأ الآن', 'growthytools'); ?></h2>

    <?php if (empty($licenses)) : ?>
        <p class="gt-note"><?php esc_html_e('لا توجد تراخيص مفعلة حالياً. تواصل مع الدعم للحصول على رابط شراء مباشر.', 'growthytools'); ?></p>
    <?php else : ?>

        <?php foreach ($licenses as $index => $license) : ?>
            <label class="gt-license-option">
                <input type="radio" name="gt_license" value="<?php echo esc_attr((string) $index); ?>" <?php checked(0, $index); ?>
                    data-price="<?php echo esc_attr($license['price'] ?? ''); ?>"
                    data-old-price="<?php echo esc_attr($license['old_price'] ?? ''); ?>"
                    data-checkout-url="<?php echo esc_url($license['checkout_url'] ?? ''); ?>">
                <span><?php echo esc_html($license['name'] ?? ''); ?></span>
            </label>
        <?php endforeach; ?>

        <div class="gt-buybox-price">
            <strong data-license-price></strong>
            <small data-license-old-price></small>
        </div>

        <a href="#" class="gt-button gt-button--primary gt-button--block" data-checkout-button target="_blank" rel="noopener noreferrer"><?php esc_html_e('اشتر الآن', 'growthytools'); ?></a>
    <?php endif; ?>

    <?php if ($preview_url) : ?>
        <a href="<?php echo esc_url($preview_url); ?>" class="gt-button gt-button--ghost gt-button--block" target="_blank" rel="noopener noreferrer"><?php esc_html_e('معاينة القالب', 'growthytools'); ?></a>
    <?php endif; ?>

    <ul class="gt-trust-list">
        <?php foreach ($trust_badges as $badge) : ?>
            <li><?php echo esc_html($badge); ?></li>
        <?php endforeach; ?>
    </ul>

    <p class="gt-note"><?php esc_html_e('دعم عربي سريع، تحديثات مستمرة، واستخدام مدى الحياة لنفس الترخيص.', 'growthytools'); ?></p>
</div>
