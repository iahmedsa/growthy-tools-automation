<?php
$query = new WP_Query([
    'post_type'      => 'gt_template',
    'posts_per_page' => 8,
    'meta_key'       => '_gt_featured_badge',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>
<section class="gt-section">
    <div class="gt-container">
        <h2><?php echo esc_html(get_theme_mod('growthytools_featured_title', 'القوالب الأكثر طلبًا')); ?></h2>
        <?php if ($query->have_posts()) : ?>
            <div class="gt-template-grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('template-parts/cards/template', 'card'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('أضف أول قالب لتظهر البطاقات هنا مباشرة.', 'growthytools'); ?></p>
        <?php endif; ?>
    </div>
</section>
