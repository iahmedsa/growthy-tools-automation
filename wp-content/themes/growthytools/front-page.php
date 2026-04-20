<?php
get_header();

growthytools_render_breadcrumbs();

get_template_part('template-parts/sections/home', 'hero');
get_template_part('template-parts/sections/home', 'featured-grid');
get_template_part('template-parts/sections/home', 'benefits');
get_template_part('template-parts/sections/home', 'faq');
get_template_part('template-parts/sections/home', 'cta');

get_footer();
