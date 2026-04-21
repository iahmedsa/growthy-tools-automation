<?php
/**
 * Registers taxonomies.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	static function () {
		register_taxonomy(
			'service_category',
			[ 'service' ],
			[
				'label'        => 'تصنيفات الخدمات',
				'show_in_rest' => true,
				'hierarchical' => true,
			]
		);
		register_taxonomy(
			'case_study_category',
			[ 'case_study' ],
			[
				'label'        => 'تصنيفات دراسات الحالة',
				'show_in_rest' => true,
				'hierarchical' => true,
			]
		);
		register_taxonomy(
			'team_department',
			[ 'team_member' ],
			[
				'label'        => 'أقسام الفريق',
				'show_in_rest' => true,
				'hierarchical' => true,
			]
		);
	}
);
