<?php
/**
 * Footer template.
 *
 * @package GrowthyTools
 */
?>
</main>
<footer class="gt-site-footer">
    <div class="gt-container">
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
