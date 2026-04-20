<?php
get_header();

while (have_posts()) :
    the_post();
    ?>
    <article <?php post_class('gt-template-single'); ?>>
        <div class="gt-container">
            <?php growthytools_render_breadcrumbs(); ?>
            <?php get_template_part('template-parts/single/template', 'hero'); ?>

            <div class="gt-single-layout">
                <div class="gt-single-main">
                    <?php get_template_part('template-parts/single/template', 'gallery'); ?>
                    <?php get_template_part('template-parts/single/template', 'features'); ?>
                </div>
                <aside class="gt-single-sidebar">
                    <?php get_template_part('template-parts/single/template', 'sidebar-buybox'); ?>
                </aside>
            </div>
        </div>
    </article>
    <?php
endwhile;

get_footer();
