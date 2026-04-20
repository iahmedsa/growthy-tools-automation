<?php
/**
 * Footer template.
 *
 * @package GrowthyTools
 */
?>
</main>
<footer class="gt-site-footer gt-site-footer--<?php echo esc_attr(get_theme_mod('growthytools_footer_style', 'boxed')); ?>">
    <div class="gt-container">
        <div class="gt-footer-social">
            <?php $linkedin = (string) get_theme_mod('growthytools_linkedin_url', ''); ?>
            <?php if ($linkedin) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('صفحة لينكدإن', 'growthytools'); ?>">in</a>
            <?php endif; ?>
        </div>
        <p><?php echo esc_html(get_theme_mod('growthytools_footer_content', 'جروثي تولز — قوالب عربية مصممة للتحويل.')); ?></p>
        <nav aria-label="<?php esc_attr_e('روابط الفوتر', 'growthytools'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => false,
                'menu_class'     => 'gt-footer-nav',
            ]);
            ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
