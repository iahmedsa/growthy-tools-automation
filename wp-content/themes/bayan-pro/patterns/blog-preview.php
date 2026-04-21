<?php
/**
 * Title: Blog Preview
 * Slug: bayan-pro/blog-preview
 * Categories: bayan-pro
 */
?>
<!-- wp:group {"className":"bayan-section","layout":{"type":"constrained"}} --><div class="wp-block-group bayan-section"><!-- wp:heading --><h2>آخر المقالات</h2><!-- /wp:heading --><!-- wp:query {"query":{"perPage":3,"postType":"post","inherit":false}} --><div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} --><!-- wp:post-featured-image /--><!-- wp:post-title {"isLink":true} /--><!-- wp:post-excerpt /--><!-- /wp:post-template --></div><!-- /wp:query --></div><!-- /wp:group -->
