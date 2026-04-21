<?php
/**
 * Admin UI: meta boxes and useful columns.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'add_meta_boxes',
	static function () {
		foreach ( array_keys( bayan_core_cpt_fields() ) as $post_type ) {
			add_meta_box(
				'bayan_core_' . $post_type,
				'بيانات إضافية - ' . $post_type,
				'bayan_core_render_meta_box',
				$post_type,
				'normal',
				'default',
				[ 'post_type' => $post_type ]
			);
		}
	}
);

/**
 * Render a CPT meta box.
 */
function bayan_core_render_meta_box( WP_Post $post, array $meta_box ): void {
	$post_type = $meta_box['args']['post_type'] ?? $post->post_type;
	$fields    = bayan_core_cpt_fields()[ $post_type ] ?? [];
	wp_nonce_field( 'bayan_core_save_meta', 'bayan_core_nonce' );
	echo '<div dir="rtl">';
	echo '<p>الحقول التالية مخصصة لهذا النوع من المحتوى.</p>';
	echo '<table class="form-table"><tbody>';
	foreach ( $fields as $field_key => $field ) {
		$value = get_post_meta( $post->ID, $field_key, true );
		echo '<tr><th><label for="' . esc_attr( $field_key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
		if ( 'textarea' === $field['type'] ) {
			echo '<textarea class="large-text" rows="3" id="' . esc_attr( $field_key ) . '" name="' . esc_attr( $field_key ) . '">' . esc_textarea( (string) $value ) . '</textarea>';
		} elseif ( 'checkbox' === $field['type'] ) {
			echo '<label><input type="checkbox" id="' . esc_attr( $field_key ) . '" name="' . esc_attr( $field_key ) . '" value="1" ' . checked( '1', (string) $value, false ) . ' /> نعم</label>';
		} else {
			echo '<input class="regular-text" type="' . esc_attr( $field['type'] ) . '" id="' . esc_attr( $field_key ) . '" name="' . esc_attr( $field_key ) . '" value="' . esc_attr( (string) $value ) . '" />';
		}
		echo '</td></tr>';
	}
	echo '</tbody></table></div>';
}

add_action(
	'save_post',
	static function ( int $post_id ) {
		if ( wp_is_post_revision( $post_id ) || ! isset( $_POST['bayan_core_nonce'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bayan_core_nonce'] ) ), 'bayan_core_save_meta' ) ) {
			return;
		}
		$post_type = get_post_type( $post_id );
		$fields    = bayan_core_cpt_fields()[ $post_type ] ?? [];
		foreach ( $fields as $field_key => $field ) {
			$raw = $_POST[ $field_key ] ?? '';
			if ( 'checkbox' === $field['type'] && ! isset( $_POST[ $field_key ] ) ) {
				$raw = '0';
			}
			update_post_meta( $post_id, $field_key, bayan_core_sanitize_by_type( $field['type'], $raw ) );
		}
	},
	10,
	1
);
