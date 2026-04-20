<?php
$post_id      = get_the_ID();
$price        = (string) growthytools_get_meta($post_id, '_gt_starting_price', '');
$sales_hook   = (string) growthytools_get_meta($post_id, '_gt_short_sales_hook', get_the_excerpt());
$preview_url  = (string) growthytools_get_meta($post_id, '_gt_preview_url', '');
$cats         = get_the_terms($post_id, 'gt_template_category');
$first_cat    = is_array($cats) && ! empty($cats) ? $cats[0]->name : __('غير مصنف', 'growthytools');
$licenses     = growthytools_get_licenses($post_id);
?>
<article <?php post_class('gt-template-card'); ?>>
    <a href="<?php the_permalink(); ?>" class="gt-template-card__thumb" aria-label="<?php esc_attr_e('عرض تفاصيل القالب', 'growthytools'); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_large', ['loading' => 'lazy']); ?>
        <?php endif; ?>
    </a>
    <div class="gt-template-card__content">
        <span class="gt-template-card__category"><?php echo esc_html($first_cat); ?></span>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo esc_html(wp_trim_words($sales_hook, 12)); ?></p>
        <div class="gt-template-card__meta">
            <small class="gt-template-card__micro"><?php echo esc_html(sprintf(__('خيارات ترخيص: %d', 'growthytools'), count($licenses))); ?></small>
            <strong><?php echo esc_html(growthytools_format_price($price)); ?></strong>
            <div class="gt-template-card__actions">
                <a class="gt-button gt-button--primary" href="<?php the_permalink(); ?>"><?php esc_html_e('عرض التفاصيل', 'growthytools'); ?></a>
                <?php if ($preview_url) : ?>
                    <a class="gt-button gt-button--ghost" href="<?php echo esc_url($preview_url); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('معاينة مباشرة', 'growthytools'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>
