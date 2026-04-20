<?php
get_header();
?>
<section class="gt-container gt-section">
    <h1><?php esc_html_e('آخر المقالات', 'growthytools'); ?></h1>
    <?php if (have_posts()) : ?>
        <div class="gt-post-list">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('gt-post-card'); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('لا توجد محتويات حالياً.', 'growthytools'); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
