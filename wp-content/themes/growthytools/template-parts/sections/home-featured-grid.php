<?php
$query = new WP_Query([
    'post_type'      => 'gt_template',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'DESC',
]);
?>
<section class="gt-section">
    <div class="gt-container">
        <h2><?php echo esc_html(get_theme_mod('growthytools_featured_title', 'القوالب الأكثر مبيعًا الآن')); ?></h2>
        <p><?php esc_html_e('مجموعة مختارة من القوالب الأعلى أداءً للتجارة الرقمية، الخدمات، والمنتجات التقنية.', 'growthytools'); ?></p>
        <?php if ($query->have_posts()) : ?>
            <div class="gt-template-grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('template-parts/cards/template', 'card'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('أضف أول قالب الآن ليظهر في واجهة المتجر فورًا.', 'growthytools'); ?></p>
        <?php endif; ?>
    </div>
</section>
