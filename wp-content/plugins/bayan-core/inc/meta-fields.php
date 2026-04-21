<?php
/**
 * Registers post meta fields for all BAYAN CPTs.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	static function () {
		foreach ( bayan_core_cpt_fields() as $post_type => $fields ) {
			foreach ( $fields as $field_key => $field ) {
				$meta_type = in_array( $field['type'], [ 'number' ], true ) ? 'integer' : 'string';
				register_post_meta(
					$post_type,
					$field_key,
					[
						'single'            => true,
						'type'              => $meta_type,
						'show_in_rest'      => true,
						'sanitize_callback' => static function ( $value ) use ( $field ) {
							return bayan_core_sanitize_by_type( $field['type'], $value );
						},
					]
				);
			}
		}
	}
);
