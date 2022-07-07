<?php
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'General', 'docy' ),
	'id'        => 'general_settings',
	'icon'      => 'dashicons dashicons-admin-generic',
));

Redux::set_section( 'docy_opt', array(
	'title'            => esc_html__( 'Preloader', 'docy' ),
	'id'               => 'preloader_opt',
	'icon'             => '',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'        => 'is_preloader',
			'type'      => 'switch',
			'title'     => esc_html__( 'Pre-loader', 'docy' ),
			'on'        => esc_html__( 'Enable', 'docy' ),
			'off'       => esc_html__( 'Disable', 'docy' ),
			'default'   => true,
		),

		array(
			'title'     => esc_html__( 'Enable Pre-loader on', 'docy' ),
			'id'        => 'preloader_pages',
			'type'      => 'select',
			'options'   => [
				'all' => esc_html__( 'All Pages', 'docy' ),
				'specific_pages' => esc_html__( 'Specific Pages', 'docy' ),
			],
			'default'   => 'all',
			'required' => array (
				array ( 'is_preloader', '=', '1' ),
			)
		),

		array(
			'title'     => esc_html__( 'Page IDs', 'docy' ),
			'subtitle'  => esc_html__( "Input the multiple page IDs in comma separated format.", 'docy' ),
			'desc'      => sprintf(esc_html__('%s How to find page ID %s', 'docy'), '<a href="https://is.gd/xM75oQ" target="_blank">', '</a>' ),
			'id'        => 'preloader_page_ids',
			'type'      => 'text',
			'required' => array (
				array ( 'is_preloader', '=', '1' ),
				array ( 'preloader_pages', '=', 'specific_pages' ),
			)
		),

		/**
		 * Preloader Logo
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_logo',
			'type'          => 'media',
			'title'         => esc_html__( 'Pre-loader Logo', 'docy' ),
			'compiler'      => true,
			'default'       => array(
				'url' => DOCY_DIR_IMG . '/spinner_logo.png'
			)
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'logo_title',
			'type'          => 'text',
			'title'         => esc_html__( 'Logo Title', 'docy' ),
			'default'       => get_bloginfo( 'name' )
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'title'         => esc_html__( 'Logo Title Color', 'docy' ),
			'id'            => 'preloader_logo_title_color',
			'type'          => 'color',
			'output'        => array( '#preloader .round_spinner h4' ),
		),

		/**
		 * Preloader Title
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_title',
			'type'          => 'text',
			'title'         => esc_html__( 'Preloader Title', 'docy' ),
			'default'       => 'Did You Know?'
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'title'         => esc_html__( 'Preloader Title Color', 'docy' ),
			'id'            => 'preloader_title_color',
			'type'          => 'color',
			'output'        => array( '#preloader .head' ),
		),

		/**
		 * Preloader Quotes
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_quotes',
			'type'          => 'multi_text',
			'title'         => esc_html__( 'Quotes', 'docy' ),
			'subtitle'      => esc_html__( 'The quotes will display randomly under the title.', 'docy' ),
			'default'       => 'Did You Know?'
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'title'         => esc_html__( 'Preloader Quotes Color', 'docy' ),
			'id'            => 'preloader_quotes_color',
			'type'          => 'color',
			'output'        => array( '#preloader p' ),
		),
	)
));


/**
 * Back to Top settings
 */
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Back to Top', 'docy' ),
	'id'        => 'back_to_top_btn',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__( 'Back to Top Button', 'docy' ),
			'subtitle'  => esc_html__( 'Show/hide back to top button globally settings', 'docy' ),
			'id'        => 'is_back_to_top_btn_switcher',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
		),

        array(
            'title'     => esc_html__( 'Position', 'docly' ),
            'id'        => 'bt_position',
            'type'      => 'button_set',
            'options'  => array(
                'right' => 'Right',
                'left'  => 'Left',
            ),
            'default'   => 'right',
        ),

        /**
         * Button Normal Colors
         */
        array(
            'id' => 'normal_color_start',
            'type' => 'section',
            'title' => esc_html__( 'Normal Color', 'docy' ),
            'indent' => true,
            'required' => array( 'is_back_to_top_btn_switcher', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Icon Color', 'docy' ),
            'id'        => 'back_to_top_btn_icon_color',
            'type'      => 'color',
            'output'    => array(
                'color' => '#back-to-top::after'
            ),
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'docy' ),
            'id'        => 'back_to_top_btn_bg_color',
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color' => '#back-to-top'
            ),
        ),
        array(
            'id' => 'normal_color_end',
            'type' => 'section',
            'indent' => true
        ),

        /**
         * Button Hover Colors
         */
        array(
            'id' => 'hover_color_start',
            'type' => 'section',
            'title'     => esc_html__( 'Hover Color', 'docy' ),
            'indent' => true,
            'required' => array( 'is_back_to_top_btn_switcher', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Icon Color', 'docy' ),
            'id'        => 'back_to_top_btn_icon_hover_color',
            'type'      => 'color',
            'output'    => array(
                'color' => '#back-to-top:hover::after'
            ),
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'docy' ),
            'id'        => 'back_to_top_btn_bg_hover_color',
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color' => '#back-to-top:hover'
            ),
        ),
        array(
            'id' => 'hover_color_end',
            'type' => 'section',
            'indent' => true
        ),
	)
));


/**
 * Ajax Search settings
 */
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Ajax Search', 'docy' ),
	'id'        => 'ajax_search_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Ajax Search Result Limit', 'docy' ),
            'subtitle'  => esc_html__( 'This will limit the doc sections and articles in Ajax live search results. Input -1 for show all results.', 'docy' ),
            'id'        => 'doc_result_limit',
            'type'      => 'text',
            'default'   => '-1',
        ),
        array(
            'id'        => 'is_ajax_search_tab',
            'type'      => 'switch',
            'title'     => esc_html__( 'Tab Filters', 'docy' ),
            'subtitle'  => esc_html__( 'If you disable it, the docs search will show by default.', 'docy' ),
            'on'        => esc_html__( 'Enable', 'docy' ),
            'off'       => esc_html__( 'Disable', 'docy' ),
            'default'   => true,
        ),
	)
));