<?php

// Color option
Redux::set_section( 'docy_opt', array(
	'title'  => esc_html__( 'Color Scheme', 'docy' ),
	'id'     => 'color',
	'icon'   => 'dashicons dashicons-admin-appearance',
	'fields' => array(
		array(
			'id'               => 'accent_solid_color_opt',
			'type'             => 'color',
			'title'            => esc_html__( 'Accent Color', 'docy' ),
			'default'          => '#4c4cf1',
			'output_variables' => true,
		),
		array(
			'id'               => 'secondary_color_opt',
			'type'             => 'color',
			'title'            => esc_html__( 'Secondary Color', 'docy' ),
			'subtitle'         => esc_html__( 'Normally used in Titles, Gradient Colors', 'docy' ),
			'default'          => '#1d2746',
			'output_variables' => true,
		),
		array(
			'id'               => 'paragraph_color_opt',
			'type'             => 'color',
			'title'            => esc_html__( 'Paragraph Color', 'docy' ),
			'subtitle'         => esc_html__( 'Normally used in meta content, paragraph, doc lists, subtitles, icon', 'docy' ),
			'default'          => '#425466',
			'output_variables' => true,
		),
		array(
			'id'               => 'gradient_bg_color',
			'type'             => 'color_gradient',
			'title'            => esc_html__( 'Background Gradient Color', 'docy' ),
			'subtitle'         => esc_html__( 'This color applied to Post Single, Forum pages, Search Results page', 'docy' ),
			'validate'         => 'color',
			'default'          => array(
				'from' => '#FFFBF2',
				'to'   => '#EDFFFD',
			),
			'output_variables' => true,
		),
		array(
			'id'       => 'is_box_shadow',
			'type'     => 'switch',
			'title'    => esc_html__( 'Container Box Shadow', 'docy' ),
			'subtitle' => esc_html__( 'This color applied to Post Single, Forum pages, Search Results page', 'docy' ),
			'on'       => esc_html__( 'Show', 'docy' ),
			'off'      => esc_html__( 'Hide', 'docy' ),
			'default'  => true,
		),
	)
) );