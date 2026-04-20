<?php
get_header();
?>
<section class="gt-container gt-section">
    <h1><?php the_archive_title(); ?></h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('gt-post-card'); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('لا يوجد محتوى في هذا الأرشيف.', 'growthytools'); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
