<?php
/**
 * Setup callbacks.
 *
 * @package bayan-pro
 */

add_action(
	'after_setup_theme',
	static function () {
		load_theme_textdomain( 'bayan-pro', get_theme_file_path( 'languages' ) );
	}
);
