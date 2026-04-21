<?php
/**
 * Theme supports.
 *
 * @package bayan-pro
 */

add_action(
	'after_setup_theme',
	static function () {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor.css' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-spacing' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
);
