<?php
// Header Section
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Header', 'docy' ),
    'id'               => 'header_sec',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-arrow-up-alt2',
));

// Header Layout
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Layout & Settings', 'docy' ),
    'id'               => 'header_layout',
    'customizer_width' => '400px',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Header Width', 'docy' ),
            'subtitle'  => esc_html__( 'Set the default Header width here. It will apply on the theme\'s Header globally.', 'docy' ),
            'id'        => 'header_width',
            'type'      => 'select',
            'options'   => array(
                'boxed' => esc_html__('Boxed', 'docy'),
                'full-width' => esc_html__('Full Width', 'docy'),
            ),
            'default' => 'boxed'
        ),

        array(
            'title'     => esc_html__( 'Sticky Navbar', 'docy' ),
            'id'        => 'is_sticky_header',
            'type'      => 'switch',
            'default'   => true
        ),

        array(
            'title'     => esc_html__( 'Sticky Appearance', 'docy' ),
            'subtitle'  => esc_html__( 'Set the sticky appearance based on scrolling states.', 'docy' ),
            'id'        => 'sticky_appearance',
            'type'      => 'select',
            'options'   => array(
                'stick_all' => esc_html__('Stick all Time', 'docy'),
                'stick_up' => esc_html__('Stick on Up Scrolling', 'docy'),
            ),
            'default' => 'stick_up',
            'required'  => array( 'is_sticky_header', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Header Layout', 'docy' ),
            'id'        => 'header_layout',
            'type'      => 'image_select',
            'options'   => array(
                'default' => array(
                    'alt' => esc_html__( 'Default', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/headers/default.jpg'
                ),
                'search' => array(
                    'alt' => esc_html__( 'Search Form', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/headers/search-form.jpg'
                ),
            ),
            'default' => 'default',
        ),

        array(
            'title'     => esc_html__( 'Navbar Position', 'docy' ),
            'subtitle'  => esc_html__( 'The Navbar Position will apply globally except the blog single page.', 'docy' ),
            'desc'      => esc_html__( 'The Static position recommended with disabling the Search Banner', 'docy' ),
            'id'        => 'navbar_position',
            'type'      => 'button_set',
            'options'   => array(
                'absolute' => esc_html__( 'Absolute', 'docy' ),
                'static' => esc_html__( 'Static', 'docy' ),
            ),
            'default' => 'absolute'
        ),

        array(
            'title'     => esc_html__( 'Search Form', 'docy' ),
            'id'        => 'is_search_form',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => true
        ),
    )
));


// Logo
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Logo', 'docy' ),
    'id'               => 'logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Black Logo', 'docy' ),
            'subtitle'  => esc_html__( 'Upload here the black version of your logo.', 'docy' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/logo.png'
            )
        ),

        array(
            'title'     => esc_html__( 'White Logo', 'docy' ),
            'subtitle'  => esc_html__( 'Upload here the white version of your logo.', 'docy' ),
            'id'        => 'sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/logo-w.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Black Retina Logo', 'docy' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo size.', 'docy' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/logo-2x.png'
            )
        ),

        array(
            'title'     => esc_html__( 'White Retina Logo', 'docy' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo size.', 'docy' ),
            'id'        => 'retina_sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/logo-w2x.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Logo dimensions', 'docy' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'docy' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar-brand>img'
        ),

        array(
            'title'     => esc_html__( 'Padding', 'docy' ),
            'subtitle'  => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'docy' ),
            'id'        => 'logo_padding',
            'type'      => 'spacing',
            'output'    => array( '.header_area .navbar-brand' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),
    )
) );

/**
 * Action button
 */
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Action Button', 'docy' ),
    'id'               => 'menu_action_btn_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Button Visibility', 'docy' ),
            'id'        => 'is_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
        ),

        array(
            'title'     => esc_html__( 'Button label', 'docy' ),
            'subtitle'  => esc_html__( 'Leave the button label field empty to hide the menu action button.', 'docy' ),
            'id'        => 'menu_btn_label',
            'type'      => 'text',
            'default'   => esc_html__( 'Get Started', 'docy' ),
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL', 'docy' ),
            'id'        => 'menu_btn_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL Target', 'docy' ),
            'id'        => 'menu_btn_target',
            'type'      => 'select',
            'options'   => array(
            	'_blank' => esc_html__( 'Blank (Open in new tab)', 'docy' ),
            	'_self' => esc_html__( 'Self (Open in the same tab)', 'docy' ),
            ),
            'default'   => '_self',
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

	    array(
		    'title'     => esc_html__( 'Button padding', 'docy' ),
		    'subtitle'  => esc_html__( 'Padding around the menu action button.', 'docy' ),
		    'id'        => 'menu_btn_padding',
		    'type'      => 'spacing',
		    'output'    => array( '.nav_btn' ),
		    'mode'      => 'padding',
		    'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
		    'units_extended' => 'true',
		    'required'  => array( 'is_menu_btn', '=', '1' )
	    ),

        /**
         * Button colors
         * Style will apply on the Non sticky mode and sticky mode of the header
         */
        array(
            'title'     => esc_html__( 'Button Colors', 'docy' ),
            'subtitle'  => esc_html__( 'Button style attributes on normal (non sticky) mode.', 'docy' ),
            'id'        => 'button_colors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array( 'is_menu_btn', '=', '1' ),
        ),

        array(
            'title'     => esc_html__( 'Font color', 'docy' ),
            'id'        => 'menu_btn_font_color',
            'type'      => 'color',
            'output'    => array( '.right-nav .nav_btn' ),
        ),
        
        array(
            'title'     => esc_html__( 'Border Color', 'docy' ),
            'id'        => 'menu_btn_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array( '.right-nav .nav_btn' ),
        ),
        
        array(
            'title'     => esc_html__( 'Background Color', 'docy' ),
            'id'        => 'menu_btn_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array( '.right-nav .nav_btn' ),
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__( 'Hover Font Color', 'docy' ),
            'subtitle'  => esc_html__( 'Font color on hover stats.', 'docy' ),
            'id'        => 'menu_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array( '.right-nav .nav_btn:hover' ),
        ),
        array(
            'title'     => esc_html__( 'Hover Border Color', 'docy' ),
            'subtitle'  => esc_html__( 'Border color on hover stats.', 'docy' ),
            'id'        => 'menu_btn_hover_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array( '.right-nav .nav_btn:hover' ),
        ),
        array(
            'title'     => esc_html__( 'Hover background color', 'docy' ),
            'subtitle'  => esc_html__( 'Background color on hover stats.', 'docy' ),
            'id'        => 'menu_btn_hover_bg_color',
            'type'      => 'color',
            'output'    => array(
                'background' => '.right-nav .nav_btn:hover',
                'border-color' => '.navbar_fixed .navbar .nav_btn:hover'
            ),
        ),

        array(
            'id'     => 'button_colors-end',
            'type'   => 'section',
            'indent' => false,
        ),

        /*
         * Button colors on sticky mode
         */
        array(
            'title'     => esc_html__( 'Sticky Button Style', 'docy' ),
            'subtitle'  => esc_html__( 'Button colors on sticky mode.', 'docy' ),
            'id'        => 'button_colors_sticky',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array( 'is_menu_btn', '=', '1' ),
        ),
        array(
            'title'     => esc_html__( 'Border color', 'docy' ),
            'subtitle'  => esc_html__( 'Border color on header sticky mode.', 'docy' ),
            'id'        => 'menu_btn_border_color_sticky',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array( '.navbar.navbar_fixed .right-nav .nav_btn.tp_btn' ),
        ),
        array(
            'title'     => esc_html__( 'Font color', 'docy' ),
            'subtitle'  => esc_html__( 'Font color on header sticky mode.', 'docy' ),
            'id'        => 'menu_btn_font_color_sticky',
            'type'      => 'color',
            'output'    => array( '.navbar_fixed.navbar .right-nav .nav_btn.tp_btn' ),
        ),
        array(
            'title'     => esc_html__( 'Background color', 'docy' ),
            'subtitle'  => esc_html__( 'Background color on header sticky mode.', 'docy' ),
            'id'        => 'menu_btn_bg_color_sticky',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array( '.navbar_fixed.navbar .right-nav .nav_btn.tp_btn' ),
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__( 'Hover font color', 'docy' ),
            'subtitle'  => esc_html__( 'Font hover color on Header sticky mode.', 'docy' ),
            'id'        => 'menu_btn_hover_font_color_sticky',
            'type'      => 'color',
            'output'    => array( '.navbar.navbar_fixed .right-nav .nav_btn.tp_btn:hover' ),
        ),
        array(
            'title'     => esc_html__( 'Hover background color', 'docy' ),
            'subtitle'  => esc_html__( 'Background hover color on Header sticky mode..', 'docy' ),
            'id'        => 'menu_btn_hover_bg_color_sticky',
            'type'      => 'color',
            'output'    => array(
                'background' => '.navbar.navbar_fixed .right-nav .nav_btn.tp_btn:hover',
            ),
        ),
        array(
            'title'     => esc_html__( 'Hover border color', 'docy' ),
            'subtitle'  => esc_html__( 'Background hover color on Header sticky mode..', 'docy' ),
            'id'        => 'menu_btn_hover_border_color_sticky',
            'type'      => 'color',
            'output'    => array(
                'border-color' => '.navbar.navbar_fixed .right-nav .nav_btn.tp_btn:hover',
            ),
        ),

        array(
            'id'     => 'button_colors-sticky-end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));

/**
 * Title-bar banner
 */
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Title-bar', 'docy' ),
    'id'               => 'title_bar_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Ornaments', 'docy' ),
            'id'        => 'is_banner_ornaments',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
        ),

        array(
            'title'     => esc_html__( 'Left Ornament', 'docy' ),
            'subtitle'  => esc_html__( 'Upload here the default left ornament image', 'docy' ),
            'id'        => 'banner_left_ornament',
            'type'      => 'media',
            'compiler'  => true,
            'required'  => array( 'is_banner_ornaments', '=', '1' ),
            'default'   => array(
                'url' => DOCY_DIR_IMG.'/leaf_left.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Right Ornament', 'docy' ),
            'subtitle'  => esc_html__( 'Upload here the default right ornament image', 'docy' ),
            'id'        => 'banner_right_ornament',
            'type'      => 'media',
            'compiler'  => true,
            'required'  => array( 'is_banner_ornaments', '=', '1' ),
            'default'   => array(
                'url' => DOCY_DIR_IMG.'/leaf_right.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Title-bar padding', 'docy' ),
            'subtitle'  => esc_html__( 'Padding around the Title-bar.', 'docy' ),
            'id'        => 'title_bar_padding',
            'type'      => 'spacing',
            'output'    => array( '.breadcrumb_area_three' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),

        array(
            'id'       => 'titlebar_align',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Alignment', 'docy' ),
            'options' => array(
                'left' => esc_html__( 'Left', 'docy' ),
                'center' => esc_html__( 'Center', 'docy' ),
                'right' => esc_html__( 'Right', 'docy' )
            ),
            'default' => 'center'
        ),
    )
));

/**
 * Search Banner
 */
Redux::set_section('docy_opt', array(
	'title' => esc_html__( 'Search Banner', 'docy' ),
	'id' => 'search_banner_header_opt',
	'subsection' => true,
	'icon' => '',
	'fields' => array(
		array(
			'id'        => 'search_banner_note',
			'type'      => 'info',
			'style'     => 'success',
			'title'     => esc_html__( 'Important Note:', 'docy' ),
			'icon'      => 'dashicons dashicons-info',
			'desc'      => esc_html__( 'Search Banner located on the Doc details, Forum, and Blog pages.', 'docy' )
		),

        array(
            'title'     => esc_html__( 'Search Banner', 'docy' ),
            'id'        => 'is_search_banner',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => true
        ),

        array(
            'title'     => esc_html__( 'Search Keywords', 'docy' ),
            'id'        => 'is_keywords',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'docy' ),
            'off'       => esc_html__( 'No', 'docy' ),
            'required'  => array('is_search_banner', '=', '1'),
        ),

        array(
            'title'     => esc_html__( 'Search Banner Design', 'docy' ),
            'id'        => 'select_search_banner',
            'type'      => 'image_select',
            'options'   => array(
                'light' => array(
                    'alt' => esc_html__( 'Simple Light', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/search-banners/simple-light.jpg'
                ),
                'aesthetic' => array(
                    'alt' => esc_html__( 'Aesthetic', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/search-banners/gradient.jpg'
                ),
            ),
            'default' => 'light',
            'required'  => array('is_search_banner', '=', '1'),
        ),

        array(
            'title'         => esc_html__( 'Focus Search', 'docy' ),
            'subtitle'      => esc_html__( 'When you enter the cursor in the search field, a transparent overlay color will appear on other elements of the page.', 'docy' ),
            'id'            => 'is_focus_search',
            'type'          => 'switch',
            'on'            => esc_html__( 'Yes', 'docy' ),
            'off'           => esc_html__( 'No', 'docy' ),
            'default'       => 1,
            'required'  => array('is_search_banner', '=', '1'),
        ),

        array(
            'title'         => esc_html__( 'Focus Search by /', 'docy' ),
            'subtitle'      => esc_html__( 'If you enable this setting, your website visitors can focus (enter the mouse cursor) on the search form by pressing the "/" key of the keyboard.', 'docy' ),
            'id'            => 'is_focus_by_slash',
            'type'          => 'switch',
            'on'            => esc_html__( 'Yes', 'docy' ),
            'off'           => esc_html__( 'No', 'docy' ),
            'default'       => 1,
            'required'  => array('is_search_banner', '=', '1'),
        ),

        array(
            'title'     => esc_html__( 'Search Keywords', 'docy' ),
            'id'        => 'is_keywords',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'docy' ),
            'off'       => esc_html__( 'No', 'docy' ),
            'required'  => array('is_search_banner', '=', '1'),
        ),

        array(
            'title'     => esc_html__( 'Keywords Label', 'docy' ),
            'id'        => 'keywords_label',
            'type'      => 'text',
            'default'   => esc_html__( 'Popular Searches', 'docy'),
            'required'  => array('is_keywords', '=', '1'),
        ),

        array(
            'title'     => esc_html__( 'Keywords', 'docy' ),
            'id'        => 'doc_keywords',
            'type'      => 'multi_text',
            'add_text'  =>  esc_html__( 'Add Keyword', 'docy'),
            'required'  => array('is_keywords', '=', '1'),
        ),

		array(
			'id'            => 'banner_search_placeholder',
			'type'          => 'text',
			'title'         => esc_html__( 'Search Placeholder', 'docy' ),
			'default'       => esc_html__('Search ("/" to focus)', 'docy'),
            'required'  => array('is_search_banner', '=', '1'),
		),

		array(
			'title'     => esc_html__( 'Padding', 'docy' ),
			'subtitle'  => esc_html__( 'Padding around the Search Banner. Input the padding as clockwise (Top Right Bottom Left)', 'docy' ),
			'id'        => 'sbnr_padding',
			'type'      => 'spacing',
			'output'    => array( '.sbnr-global' ),
			'mode'      => 'padding',
			'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
            'required'  => array('is_search_banner', '=', '1'),
		),

        array(
            'title'     => esc_html__( 'Background', 'docy' ),
            'id'        => 'sbnr_light_bg',
            'type'      => 'background',
            'default'   => array(
                'background-image' => DOCY_DIR_IMG.'/banner-bg.png'
            ),
            'output' => '.doc_banner_area.search-banner-light',
            'required' => array('select_search_banner', '=', 'light'),
        ),

        array(
            'title'     => esc_html__( 'Background Image', 'docy' ),
            'id'        => 'sbnr_bg_image2',
            'type'      => 'media',
            'default'   => array(
                'url' => DOCY_DIR_IMG.'/search-banners/banner-bg.jpeg'
            ),
            'required' => array('select_search_banner', '=', 'aesthetic')
        ),

		array(
			'title'     => esc_html__( 'Left Leaf Image', 'docy' ),
			'id'        => 'sbanner_left_image',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/v.svg'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Right Leaf Image', 'docy' ),
			'id'        => 'sbanner_right_image',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/home_one/b_leaf.svg'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Man Image', 'docy' ),
			'id'        => 'sbanner_man_image',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/home_one/b_man_two.png'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Flower Image', 'docy' ),
			'id'        => 'sbanner_flower_image',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/home_one/flower.png'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Background Shape Image', 'docy' ),
			'subtitle'  => esc_html__( 'We used here a transparent image that are containing stars. So you can use here similar transparent image or any other image.', 'docy' ),
			'id'        => 'sbanner_bg_image',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/home_one/banner_bg.png'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Wave Shape 01', 'docy' ),
			'subtitle'  => esc_html__( 'We used here a transparent wave shape image. You can use here similar transparent shape image or any other image.', 'docy' ),
			'id'        => 'sbanner_shape1',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/shap_01.png'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),

		array(
			'title'     => esc_html__( 'Wave Shape 02', 'docy' ),
			'subtitle'  => esc_html__( 'We used here a transparent wave shape image. You can use here similar transparent shape image or any other image.', 'docy' ),
			'id'        => 'sbanner_shape2',
			'type'      => 'media',
			'default'   => array(
				'url' => DOCY_DIR_IMG.'/shap_02.png'
			),
            'required' => array('select_search_banner', '=', 'aesthetic')
		),
	)
));


/**
 * Breadcrumbs Options
 */
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Breadcrumbs', 'docy' ),
    'id'               => 'breadcrumbs_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'id'         => 'is_breadcrumb',
            'type'       => 'switch',
            'title'      => esc_html__( 'Show/Hide Breadcrumb', 'docy' ),
            'subtitle'   => esc_html__( 'Toggle this switch to Show/Hide the Breadcrumb bar.', 'docy' ),
            'on'         => esc_html__( 'Show', 'docy' ),
            'off'        => esc_html__( 'Hide', 'docy' ),
            'default'    => true, // or false
        ),

        array(
            'id'         => 'breadcrumb_home',
            'type'       => 'text',
            'title'      => esc_html__( 'Frontpage Name', 'docy' ),
            'default'    => esc_html__( 'Home', 'docy' ),
            'required'   => array( 'is_breadcrumb', '=', 'true' ),
        ),

        array(
            'id'         => 'breadcrumb_update_text',
            'type'       => 'text',
            'title'      => esc_html__( 'Updated Text', 'docy' ),
            'default'    => esc_html__( 'Updated on', 'docy' ),
            'required'   => array('is_breadcrumb', '=', 'true')
        ),

        array(
            'id'        => 'breadcrumbs_note',
            'type'      => 'info',
            'style'     => 'success',
            'title'     => esc_html__( 'Important Note:', 'docy' ),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => esc_html__( 'The breadcrumbs (except the On/Off switch and Updated Text options) in the Docs page getting from the EazyDocs > Settings > Single Doc > Breadcrumbs. Change the texts from there to see changes on the Docs page.', 'docy' ),
            'required'   => array( 'is_breadcrumb', '=', 'true' ),
        ),
    )
));