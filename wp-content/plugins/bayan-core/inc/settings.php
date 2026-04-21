<?php
/**
 * BAYAN settings page (Arabic admin UI).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'admin_init',
	static function () {
		foreach ( bayan_core_company_fields() as $key => $field ) {
			register_setting(
				'bayan_core',
				$key,
				[
					'type'              => 'string',
					'sanitize_callback' => static function ( $value ) use ( $field ) {
						return bayan_core_sanitize_by_type( $field['type'], $value );
					},
					'show_in_rest'      => true,
				]
			);
		}
	}
);

add_action(
	'admin_menu',
	static function () {
		add_menu_page(
			'إعدادات BAYAN',
			'إعدادات BAYAN',
			'manage_options',
			'bayan-core-settings',
			'bayan_core_render_settings_page',
			'dashicons-admin-generic',
			58
		);
	}
);

add_action(
	'admin_enqueue_scripts',
	static function ( string $hook ) {
		if ( 'toplevel_page_bayan-core-settings' !== $hook ) {
			return;
		}
		wp_enqueue_style( 'bayan-core-admin', plugins_url( '../assets/css/admin.css', __FILE__ ), [], '1.0.0' );
		wp_enqueue_script( 'bayan-core-admin', plugins_url( '../assets/js/admin.js', __FILE__ ), [], '1.0.0', true );
	}
);

/**
 * Render settings page.
 */
function bayan_core_render_settings_page(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap bayan-core-settings" dir="rtl">
		<h1>إعدادات الشركة - BAYAN</h1>
		<p>هذه اللوحة مخصصة للبيانات العامة فقط، بينما محتوى الصفحات يبقى داخل البلوكات والـ Patterns.</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'bayan_core' ); ?>
			<table class="form-table" role="presentation">
				<tbody>
					<?php foreach ( bayan_core_company_fields() as $key => $field ) : ?>
						<?php $value = get_option( $key, '' ); ?>
						<tr>
							<th scope="row"><label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
							<td>
								<?php if ( 'textarea' === $field['type'] ) : ?>
									<textarea class="large-text" rows="3" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
								<?php elseif ( 'checkbox' === $field['type'] ) : ?>
									<label><input type="checkbox" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="1" <?php checked( '1', (string) $value ); ?> /> نعم</label>
								<?php else : ?>
									<input class="regular-text" type="<?php echo esc_attr( $field['type'] ); ?>" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>" />
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php submit_button( 'حفظ الإعدادات' ); ?>
		</form>
	</div>
	<?php
}
