# GrowthyTools WordPress Store (Arabic-First)

Production-grade WordPress codebase for **GrowthyTools** digital theme store.

## Architecture Summary

This repository contains two installable WordPress packages:

1. **Theme**: `wp-content/themes/growthytools`
   - Handles UI/UX, templates, rendering, styling, interactions, SEO hooks.
   - Conversion-focused front page and premium single-template landing page.

2. **Plugin**: `wp-content/plugins/growthytools-catalog`
   - Registers `gt_template` custom post type.
   - Registers taxonomies (`gt_template_category`, `gt_industry`).
   - Adds structured meta-boxes for sales data, licenses, compatibility, repeaters.
   - Keeps catalog data portable if theme changes.

---

## File Tree

```text
wp-content/
├─ plugins/
│  └─ growthytools-catalog/
│     ├─ growthytools-catalog.php
│     ├─ README.md
│     └─ inc/
│        ├─ admin-columns.php
│        ├─ helpers.php
│        ├─ meta-boxes.php
│        ├─ post-type.php
│        ├─ sample-data.php
│        ├─ save-meta.php
│        └─ taxonomies.php
└─ themes/
   └─ growthytools/
      ├─ 404.php
      ├─ archive-gt_template.php
      ├─ archive.php
      ├─ footer.php
      ├─ front-page.php
      ├─ functions.php
      ├─ header.php
      ├─ index.php
      ├─ page.php
      ├─ README.md
      ├─ search.php
      ├─ single-gt_template.php
      ├─ single.php
      ├─ style.css
      ├─ assets/
      │  ├─ css/
      │  │  ├─ components.css
      │  │  └─ main.css
      │  └─ js/
      │     ├─ main.js
      │     └─ single-template.js
      ├─ inc/
      │  ├─ customizer.php
      │  ├─ enqueue.php
      │  ├─ helpers.php
      │  ├─ schema.php
      │  ├─ setup.php
      │  └─ theme-support.php
      └─ template-parts/
         ├─ cards/template-card.php
         ├─ sections/
         │  ├─ home-benefits.php
         │  ├─ home-cta.php
         │  ├─ home-faq.php
         │  ├─ home-featured-grid.php
         │  ├─ home-hero.php
         │  └─ home-testimonials.php
         └─ single/
            ├─ template-features.php
            ├─ template-gallery.php
            ├─ template-hero.php
            └─ template-sidebar-buybox.php
```

---

## Install & Setup

1. Copy both folders into your WordPress project:
   - `wp-content/plugins/growthytools-catalog`
   - `wp-content/themes/growthytools`
2. Activate plugin: **GrowthyTools Catalog**.
3. Activate theme: **GrowthyTools**.
4. Go to **Appearance → Customize** and set brand options (colors, hero text, CTAs, trust badges, footer, support links).
5. Go to **القوالب** post type and create template products.
6. Set static front page in **Settings → Reading**.

---

## Creating Template Products

Inside each `gt_template` post, configure:

- Core sales fields (subtitle, sales hook, long description, prices, preview/docs/support/video URLs).
- Licenses (Personal / Business / Agency) with direct hosted checkout URLs.
- Compatibility attributes (RTL, Arabic, Elementor, Gutenberg, etc.).
- Advanced sections as JSON (features, FAQ, changelog, gallery, related templates).

> No add-to-cart in v1. Checkout is always external hosted URL via **Buy Now**.

---

## Import Sample Templates

Use plugin helper by calling (as admin with valid nonce):

`/wp-admin/admin-post.php?action=gt_catalog_seed&_wpnonce=<nonce>`

This creates one demo `gt_template` with license URLs and starter metadata.

---

## Phase 2 Suggestions

1. Dedicated repeater UI in admin (React or modular vanilla admin JS).
2. Theme options migration to a settings page for richer structured arrays.
3. Advanced filtering (AJAX taxonomy/attribute filter on archive/home).
4. Automated image optimization & WebP generation pipeline.
5. Optional integration with checkout providers’ webhooks for post-purchase automation.
6. Lightweight analytics events (view, preview-click, buy-now-click) with consent awareness.
7. Unit/integration tests for meta sanitization and template rendering.

---

## Notes

- WooCommerce is intentionally **not** required in v1.
- No cart, no fake payment form, no local card handling.
- The project is RTL-first, mobile-first, and focused on conversion architecture.
