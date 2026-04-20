<?php
$post_id = get_the_ID();
$long_description = (string) growthytools_get_meta($post_id, '_gt_long_description', '');
$faq = growthytools_get_repeater($post_id, '_gt_faq');
$related = growthytools_get_meta($post_id, '_gt_related_templates', []);
$related = is_array($related) ? array_map('absint', $related) : [];
$compatibility = growthytools_get_compatibility_flags($post_id);
?>
<section class="gt-section">
    <h2><?php esc_html_e('لماذا هذا القالب يحقق نتائج أسرع؟', 'growthytools'); ?></h2>
    <p><?php echo esc_html($long_description); ?></p>
</section>

<?php if (! empty($compatibility)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('التوافق', 'growthytools'); ?></h2>
    <div class="gt-compat-grid">
        <?php foreach ($compatibility as $item) : ?>
            <article class="gt-compat-card">
                <h3><?php echo esc_html($item); ?></h3>
                <p><?php esc_html_e('مدعوم بشكل كامل داخل هذا القالب لتحقيق أفضل أداء وتجربة استخدام.', 'growthytools'); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php if (! empty($faq)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('الأسئلة الشائعة', 'growthytools'); ?></h2>
    <div class="gt-faq-list gt-faq-list--modern">
        <?php foreach ($faq as $item) : ?>
            <details>
                <summary><?php echo esc_html($item['question'] ?? ''); ?></summary>
                <p><?php echo esc_html($item['answer'] ?? ''); ?></p>
            </details>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php if (! empty($related)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('قوالب مقترحة', 'growthytools'); ?></h2>
    <div class="gt-template-grid">
        <?php
        $query = new WP_Query([
            'post_type'      => 'gt_template',
            'post__in'       => $related,
            'posts_per_page' => 4,
            'orderby'        => 'post__in',
        ]);
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/cards/template', 'card');
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php endif; ?>
