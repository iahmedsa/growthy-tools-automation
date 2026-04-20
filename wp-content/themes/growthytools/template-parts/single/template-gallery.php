<?php
$gallery = growthytools_get_repeater(get_the_ID(), '_gt_gallery_images');
if (empty($gallery)) {
    return;
}
?>
<section class="gt-gallery gt-section" aria-label="<?php esc_attr_e('معرض القالب', 'growthytools'); ?>">
    <h2><?php esc_html_e('لقطات حقيقية من القالب', 'growthytools'); ?></h2>
    <div class="gt-gallery-grid">
        <?php foreach ($gallery as $item) : ?>
            <?php $url = isset($item['url']) ? esc_url($item['url']) : ''; ?>
            <?php if (! $url) { continue; } ?>
            <figure>
                <img src="<?php echo $url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" decoding="async">
            </figure>
        <?php endforeach; ?>
    </div>
</section>
