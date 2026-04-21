<?php
/**
 * Registers custom post types.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	static function () {
		$types = [
			'service'     => [ 'slug' => 'services', 'label' => 'الخدمات', 'icon' => 'dashicons-hammer' ],
			'case_study'  => [ 'slug' => 'case-studies', 'label' => 'دراسات الحالة', 'icon' => 'dashicons-analytics' ],
			'industry'    => [ 'slug' => 'industries', 'label' => 'القطاعات', 'icon' => 'dashicons-building' ],
			'testimonial' => [ 'slug' => 'testimonials', 'label' => 'الشهادات', 'icon' => 'dashicons-format-quote' ],
			'team_member' => [ 'slug' => 'team', 'label' => 'الفريق', 'icon' => 'dashicons-groups' ],
		];

		foreach ( $types as $type => $config ) {
			register_post_type(
				$type,
				[
					'labels'       => [
						'name'          => $config['label'],
						'singular_name' => $config['label'],
						'add_new_item'  => 'إضافة عنصر جديد',
						'edit_item'     => 'تعديل العنصر',
					],
					'public'       => true,
					'show_in_rest' => true,
					'has_archive'  => true,
					'menu_icon'    => $config['icon'],
					'rewrite'      => [ 'slug' => $config['slug'] ],
					'supports'     => [ 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ],
				]
			);
		}
	}
);
