<?php
$post_id = get_the_ID();
$long_description = (string) growthytools_get_meta($post_id, '_gt_long_description', '');
$features = growthytools_get_repeater($post_id, '_gt_key_features');
$technical = growthytools_get_repeater($post_id, '_gt_technical_highlights');
$faq = growthytools_get_repeater($post_id, '_gt_faq');
$related = growthytools_get_meta($post_id, '_gt_related_templates', []);
$related = is_array($related) ? array_map('absint', $related) : [];
$included_pages = growthytools_get_repeater($post_id, '_gt_included_pages');
$included_sections = growthytools_get_repeater($post_id, '_gt_included_sections');
$compatibility = growthytools_get_compatibility_flags($post_id);
?>
<section class="gt-section">
    <h2><?php esc_html_e('لماذا هذا القالب يحقق نتائج أسرع؟', 'growthytools'); ?></h2>
    <p><?php echo esc_html($long_description); ?></p>
</section>

<section class="gt-section">
    <h2><?php esc_html_e('مزايا بيعية وتقنية قوية', 'growthytools'); ?></h2>
    <div class="gt-feature-grid">
        <?php foreach ($features as $feature) : ?>
            <article class="gt-feature-card">
                <h3><?php echo esc_html($feature['title'] ?? ''); ?></h3>
                <p><?php echo esc_html($feature['description'] ?? ''); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="gt-section">
    <h2><?php esc_html_e('المعايير التقنية', 'growthytools'); ?></h2>
    <ul class="gt-check-list">
        <?php foreach ($technical as $item) : ?>
            <li><?php echo esc_html($item['title'] ?? ''); ?> — <?php echo esc_html($item['description'] ?? ''); ?></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php if (! empty($included_pages) || ! empty($included_sections)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('المحتوى المضمن داخل القالب', 'growthytools'); ?></h2>
    <div class="gt-feature-grid">
        <article class="gt-feature-card">
            <h3><?php esc_html_e('الصفحات الجاهزة', 'growthytools'); ?></h3>
            <ul class="gt-check-list">
                <?php foreach ($included_pages as $item) : ?><li><?php echo esc_html($item['title'] ?? $item['name'] ?? ''); ?></li><?php endforeach; ?>
            </ul>
        </article>
        <article class="gt-feature-card">
            <h3><?php esc_html_e('الأقسام المضمنة', 'growthytools'); ?></h3>
            <ul class="gt-check-list">
                <?php foreach ($included_sections as $item) : ?><li><?php echo esc_html($item['title'] ?? $item['name'] ?? ''); ?></li><?php endforeach; ?>
            </ul>
        </article>
    </div>
</section>
<?php endif; ?>

<?php if (! empty($compatibility)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('التوافق', 'growthytools'); ?></h2>
    <div class="gt-actions">
        <?php foreach ($compatibility as $item) : ?>
            <span class="gt-chip"><?php echo esc_html($item); ?></span>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php if (! empty($faq)) : ?>
<section class="gt-section">
    <h2><?php esc_html_e('الأسئلة الشائعة', 'growthytools'); ?></h2>
    <div class="gt-faq-list">
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
    <h2><?php esc_html_e('قوالب مقترحة لنمو أسرع', 'growthytools'); ?></h2>
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
