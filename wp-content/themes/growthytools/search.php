<?php
get_header();

$query = get_search_query();
?>
<section class="gt-container gt-section">
    <h1><?php echo esc_html(sprintf(__('نتائج البحث عن: %s', 'growthytools'), $query)); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="gt-template-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php if ('gt_template' === get_post_type()) : ?>
                    <?php get_template_part('template-parts/cards/template', 'card'); ?>
                <?php else : ?>
                    <article <?php post_class('gt-post-card'); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('لا توجد نتائج مطابقة. جرّب مصطلحًا آخر.', 'growthytools'); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
