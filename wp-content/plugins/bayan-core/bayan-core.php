<?php
/**
 * Plugin Name: BAYAN Core
 * Description: Companion plugin for BAYAN Pro theme. Registers CPTs, taxonomies, settings and metadata.
 * Version: 1.0.0
 * Requires at least: 6.6
 * Requires PHP: 8.1
 * Text Domain: bayan-core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$files = [
	'inc/post-types.php',
	'inc/taxonomies.php',
	'inc/meta-fields.php',
	'inc/settings.php',
	'inc/helpers.php',
	'inc/rest-fields.php',
	'inc/admin-columns.php',
	'inc/sanitization.php',
	'inc/compatibility.php',
];

foreach ( $files as $file ) {
	require_once plugin_dir_path( __FILE__ ) . $file;
}
