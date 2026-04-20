<?php
$post_id        = get_the_ID();
$subtitle       = (string) growthytools_get_meta($post_id, '_gt_subtitle', '');
$hook           = (string) growthytools_get_meta($post_id, '_gt_short_sales_hook', '');
$featured_badge = (string) growthytools_get_meta($post_id, '_gt_featured_badge', 'مختار للمحترفين');
$starting_price = (string) growthytools_get_meta($post_id, '_gt_starting_price', '');
$preview_url    = (string) growthytools_get_meta($post_id, '_gt_preview_url', '');
$licenses       = growthytools_get_licenses($post_id);
$buy_url        = ! empty($licenses[0]['checkout_url']) ? $licenses[0]['checkout_url'] : '';
$cats           = get_the_terms($post_id, 'gt_template_category');
?>
<section class="gt-single-hero gt-section">
    <span class="gt-badge"><?php echo esc_html($featured_badge); ?></span>
    <h1><?php the_title(); ?></h1>
    <?php if ($subtitle) : ?><p class="gt-subtitle"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
    <?php if ($hook) : ?><p class="gt-hook"><?php echo esc_html($hook); ?></p><?php endif; ?>

    <div class="gt-actions">
        <?php if (! empty($cats) && ! is_wp_error($cats)) : ?>
            <span class="gt-chip"><?php echo esc_html($cats[0]->name); ?></span>
        <?php endif; ?>
        <span class="gt-chip"><?php echo esc_html(growthytools_format_price($starting_price)); ?></span>
    </div>

    <div class="gt-actions">
        <?php if ($buy_url) : ?>
            <a class="gt-button gt-button--primary" href="<?php echo esc_url($buy_url); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('اشتر الآن', 'growthytools'); ?></a>
        <?php endif; ?>
        <?php if ($preview_url) : ?>
            <a class="gt-button gt-button--ghost" href="<?php echo esc_url($preview_url); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('معاينة مباشرة', 'growthytools'); ?></a>
        <?php endif; ?>
    </div>
</section>
