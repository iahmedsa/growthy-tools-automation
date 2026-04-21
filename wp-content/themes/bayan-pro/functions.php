<?php
/**
 * BAYAN Pro theme bootstrap.
 *
 * @package bayan-pro
 */

$files = [
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/theme-support.php',
	'inc/helpers.php',
	'inc/navigation.php',
	'inc/performance.php',
	'inc/accessibility.php',
	'inc/demo-import.php',
	'inc/editor.php',
	'inc/integrations.php',
];

foreach ( $files as $file ) {
	require_once get_theme_file_path( $file );
}
