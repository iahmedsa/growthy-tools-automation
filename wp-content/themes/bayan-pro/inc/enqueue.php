<?php
/**
 * Enqueue styles and scripts.
 *
 * @package bayan-pro
 */

add_action(
	'wp_enqueue_scripts',
	static function () {
		$version = wp_get_theme()->get( 'Version' );

		wp_enqueue_style( 'bayan-pro-frontend', get_theme_file_uri( 'assets/css/frontend.css' ), [], $version );
		wp_enqueue_style( 'bayan-pro-utilities', get_theme_file_uri( 'assets/css/utilities.css' ), [ 'bayan-pro-frontend' ], $version );
		wp_enqueue_style( 'bayan-pro-forms', get_theme_file_uri( 'assets/css/forms.css' ), [ 'bayan-pro-frontend' ], $version );

		if ( is_rtl() ) {
			wp_enqueue_style( 'bayan-pro-rtl', get_theme_file_uri( 'assets/css/rtl.css' ), [ 'bayan-pro-frontend' ], $version );
		}

		wp_enqueue_script( 'bayan-pro-navigation', get_theme_file_uri( 'assets/js/navigation.js' ), [], $version, true );
		wp_enqueue_script( 'bayan-pro-accordion', get_theme_file_uri( 'assets/js/accordion.js' ), [], $version, true );
		wp_enqueue_script( 'bayan-pro-filters', get_theme_file_uri( 'assets/js/filters.js' ), [], $version, true );
		wp_enqueue_script( 'bayan-pro-theme', get_theme_file_uri( 'assets/js/theme.js' ), [], $version, true );
	}
);
