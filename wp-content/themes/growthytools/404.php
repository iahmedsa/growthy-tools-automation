<?php
get_header();
?>
<section class="gt-container gt-section gt-empty-state">
    <h1><?php esc_html_e('الصفحة غير موجودة', 'growthytools'); ?></h1>
    <p><?php esc_html_e('يبدو أن الرابط غير صحيح. يمكنك العودة لاختيار قالبك القادم.', 'growthytools'); ?></p>
    <a class="gt-button gt-button--primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('العودة للرئيسية', 'growthytools'); ?></a>
</section>
<?php
get_footer();
