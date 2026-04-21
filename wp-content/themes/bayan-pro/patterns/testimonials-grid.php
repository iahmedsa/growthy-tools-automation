<?php
/**
 * Title: Testimonials Grid
 * Slug: bayan-pro/testimonials-grid
 * Categories: bayan-pro
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} --><div class="wp-block-group"><!-- wp:heading --><h2>ماذا يقول العملاء</h2><!-- /wp:heading --><!-- wp:query {"query":{"perPage":3,"postType":"testimonial","inherit":false}} --><div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} --><!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}},"border":{"radius":"12px"}},"backgroundColor":"muted"} --><div class="wp-block-group has-muted-background-color has-background" style="border-radius:12px;padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:quote --><blockquote class="wp-block-quote"><!-- wp:post-content /--></blockquote><!-- /wp:quote --><!-- wp:post-title {"level":4} /--></div><!-- /wp:group --><!-- /wp:post-template --></div><!-- /wp:query --></div><!-- /wp:group -->
