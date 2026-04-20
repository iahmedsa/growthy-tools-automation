<?php
get_header();
$terms = get_terms([
    'taxonomy'   => 'gt_template_category',
    'hide_empty' => true,
]);
?>
<section class="gt-archive-hero gt-section">
    <div class="gt-container">
        <h1><?php esc_html_e('مكتبة GrowthyTools للقوالب الاحترافية', 'growthytools'); ?></h1>
        <p><?php esc_html_e('قوالب عربية مصقولة لتسريع الإطلاق ورفع التحويل في المشاريع الرقمية.', 'growthytools'); ?></p>
    </div>
</section>

<section class="gt-container gt-section">
    <?php if (! is_wp_error($terms) && ! empty($terms)) : ?>
        <div class="gt-filter-list" role="tablist" aria-label="<?php esc_attr_e('تصنيفات القوالب', 'growthytools'); ?>">
            <a class="gt-chip" href="<?php echo esc_url(get_post_type_archive_link('gt_template')); ?>"><?php esc_html_e('الكل', 'growthytools'); ?></a>
            <?php foreach ($terms as $term) : ?>
                <a class="gt-chip" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <div class="gt-template-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/cards/template', 'card'); ?>
            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(['mid_size' => 1]); ?>
    <?php else : ?>
        <div class="gt-empty-state">
            <h2><?php esc_html_e('لا توجد قوالب حالياً', 'growthytools'); ?></h2>
            <p><?php esc_html_e('نعمل على إضافة إصدارات جديدة باستمرار. تواصل معنا لاقتراحات مخصصة.', 'growthytools'); ?></p>
        </div>
    <?php endif; ?>
</section>
<?php
get_footer();
