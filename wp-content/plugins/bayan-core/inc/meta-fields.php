<?php
/**
 * Registers post meta fields.
 */

add_action(
	'init',
	static function () {
		$fields_by_type = [
			'service' => [ 'service_subtitle', 'service_short_description', 'service_primary_cta_label', 'service_primary_cta_url' ],
			'case_study' => [ 'case_client_name', 'case_industry', 'case_results_summary', 'case_cta_label', 'case_cta_url' ],
			'industry' => [ 'industry_short_description', 'industry_intro' ],
			'testimonial' => [ 'testimonial_quote', 'testimonial_client_name', 'testimonial_rating' ],
			'team_member' => [ 'team_member_name', 'team_member_role', 'team_member_linkedin' ],
		];

		foreach ( $fields_by_type as $post_type => $fields ) {
			foreach ( $fields as $field ) {
				register_post_meta(
					$post_type,
					$field,
					[
						'single'            => true,
						'type'              => 'string',
						'show_in_rest'      => true,
						'sanitize_callback' => 'sanitize_text_field',
					]
				);
			}
		}
	}
);
