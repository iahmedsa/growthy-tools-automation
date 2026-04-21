<?php
/**
 * Registers taxonomies.
 */

add_action(
	'init',
	static function () {
		register_taxonomy( 'service_category', [ 'service' ], [ 'label' => 'Service Categories', 'show_in_rest' => true, 'hierarchical' => true ] );
		register_taxonomy( 'case_study_category', [ 'case_study' ], [ 'label' => 'Case Study Categories', 'show_in_rest' => true, 'hierarchical' => true ] );
		register_taxonomy( 'team_department', [ 'team_member' ], [ 'label' => 'Team Departments', 'show_in_rest' => true, 'hierarchical' => true ] );
	}
);
