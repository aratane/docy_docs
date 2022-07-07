<?php

Redux::set_section('docy_opt', array(
    'title'     => esc_html__( '404 Error Settings', 'docy' ),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-info',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Title Text', 'docy' ),
            'id'        => 'error_heading',
            'type'      => 'text',
            'default'   => esc_html__( "Error. We can’t find the page you’re looking for.", 'docy' ),
        ),

        array(
            'title'     => esc_html__( 'Subtitle', 'docy' ),
            'id'        => 'error_subtitle',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Sorry for the inconvenience. Go to our homepage or check out our latest collections for Fashion, Chair, Decoration...', 'docy' ),
        ),

        array(
            'title'     => esc_html__( 'Home Button Title', 'docy' ),
            'id'        => 'error_home_btn_label',
            'type'      => 'text',
            'default'   => esc_html__( 'Back to Home Page', 'docy' ),
        ),

        array(
            'id'          => 'btn_font_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Color', 'docy' ),
            'output'      => array(
                'color' => '.error_area .action_btn',
            ),
        ),

        array(
            'id'          => 'btn_bg_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Color', 'docy' ),
            'output'      => array(
                'background' => '.error_area .action_btn',
            ),
        ),

        array(
            'title'     => esc_html__( 'Background shape', 'docy' ),
            'subtitle'  => esc_html__( 'Upload here the default background shape image', 'docy' ),
            'id'        => 'error_bg_shape_image',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => [
                'url' => DOCY_DIR_IMG.'/404_bg.png'
            ]
        ),
    )
));
