<?php
/**
 * Title: Industries Grid
 * Slug: bayan-pro/industries-grid
 * Categories: bayan-pro
 */
?>
<!-- wp:group {"className":"bayan-section","layout":{"type":"constrained"}} --><div class="wp-block-group bayan-section"><!-- wp:heading --><h2>القطاعات التي نخدمها</h2><!-- /wp:heading --><!-- wp:query {"query":{"perPage":6,"postType":"industry","inherit":false}} --><div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} --><!-- wp:group {"className":"bayan-card"} --><div class="wp-block-group bayan-card"><!-- wp:post-title {"isLink":true} /--><!-- wp:post-excerpt /--></div><!-- /wp:group --><!-- /wp:post-template --></div><!-- /wp:query --></div><!-- /wp:group -->
