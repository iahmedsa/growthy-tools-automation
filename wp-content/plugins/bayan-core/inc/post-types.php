<?php
/**
 * Registers custom post types.
 */

add_action(
	'init',
	static function () {
		$types = [
			'service'     => [ 'slug' => 'services' ],
			'case_study'  => [ 'slug' => 'case-studies' ],
			'industry'    => [ 'slug' => 'industries' ],
			'testimonial' => [ 'slug' => 'testimonials' ],
			'team_member' => [ 'slug' => 'team' ],
		];

		foreach ( $types as $type => $config ) {
			register_post_type(
				$type,
				[
					'label'        => ucwords( str_replace( '_', ' ', $type ) ),
					'public'       => true,
					'show_in_rest' => true,
					'has_archive'  => true,
					'rewrite'      => [ 'slug' => $config['slug'] ],
					'supports'     => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
				]
			);
		}
	}
);
