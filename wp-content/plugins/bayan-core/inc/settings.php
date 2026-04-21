<?php
/**
 * Registers BAYAN company options.
 */

add_action(
	'admin_init',
	static function () {
		$settings = [
			'company_name',
			'company_phone',
			'company_email',
			'primary_cta_label',
			'primary_cta_url',
			'default_site_language',
			'default_style_variation',
		];

		foreach ( $settings as $setting ) {
			register_setting( 'bayan_core', $setting, [ 'sanitize_callback' => 'sanitize_text_field' ] );
		}
	}
);
