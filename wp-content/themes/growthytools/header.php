<?php
/**
 * Header template.
 *
 * @package GrowthyTools
 */
?><!doctype html>
<html <?php language_attributes(); ?> data-theme="<?php echo esc_attr(growthytools_get_theme_mode()); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="جروثي تولز">
    <meta property="og:locale" content="ar_AR">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="gt-site-header gt-site-header--<?php echo esc_attr(get_theme_mod('growthytools_header_style', 'boxed')); ?>" id="top">
    <div class="gt-container gt-header-inner">
        <div class="gt-logo" aria-label="<?php esc_attr_e('هوية جروثي تولز', 'growthytools'); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('العودة إلى الرئيسية', 'growthytools'); ?>">
                    <?php echo esc_html__('جروثي تولز', 'growthytools'); ?>
                </a>
            <?php endif; ?>
        </div>

        <nav class="gt-main-nav" aria-label="<?php esc_attr_e('القائمة الرئيسية', 'growthytools'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => false,
                'menu_class'     => 'gt-nav-list',
            ]);
            ?>
        </nav>

        <button class="gt-theme-toggle" type="button" aria-label="<?php esc_attr_e('تبديل وضع العرض', 'growthytools'); ?>" data-theme-toggle>
            <span data-theme-label><?php esc_html_e('تبديل الوضع', 'growthytools'); ?></span>
        </button>

        <a class="gt-button gt-button--primary" href="<?php echo esc_url(get_post_type_archive_link('gt_template') ?: home_url('/')); ?>">
            <?php echo esc_html(get_theme_mod('growthytools_home_hero_primary_cta', 'استعرض القوالب')); ?>
        </a>
    </div>
</header>
<main class="gt-site-main">
