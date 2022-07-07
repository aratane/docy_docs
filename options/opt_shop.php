<?php
// Shop page
Redux::set_section('docy_opt', array(
    'title'            => esc_html__( 'Shop', 'docy' ),
    'id'               => 'shop_opt',
    'icon'             => 'dashicons dashicons-cart',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Page title', 'docy' ),
            'subtitle'  => esc_html__( 'Give here the shop page title', 'docy' ),
            'desc'      => esc_html__( 'This text will show on the shop page banner', 'docy' ),
            'id'        => 'shop_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Shop', 'docy' ),
        ),

        array(
            'title'     => esc_html__( 'Shop Page Subtitle', 'docy' ),
            'id'        => 'shop_subtitle',
            'type'      => 'textarea',
        ),

        array(
            'title'     => esc_html__( 'Sidebar', 'docy' ),
            'subtitle'  => esc_html__( 'Select the sidebar position of Shop page', 'docy' ),
            'id'        => 'shop_sidebar',
            'type'      => 'image_select',
            'options'   => array(
                'left' => array(
                    'alt' => esc_html__( 'Left Sidebar', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/sidebar_left.jpg'
                ),
                'right' => array(
                    'alt' => esc_html__( 'Right Sidebar', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/sidebar_right.jpg',
                ),
                'full' => array(
                    'alt' => esc_html__( 'Full Width', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/fullwidth.png',
                ),
            ),
            'default' => 'left'
        ),
    ),
));


// Product Single Options
Redux::set_section('docy_opt', array(
    'title'            => esc_html__( 'Product Single', 'docy' ),
    'id'               => 'product_single_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Related Products Title', 'docy' ),
            'id'        => 'related_products_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Related products', 'docy' ),
        ),
        array(
            'title'     => esc_html__( 'Related Products Subtitle', 'docy' ),
            'id'        => 'related_products_subtitle',
            'type'      => 'textarea',
        ),
    )
));


// Gutenberg Blocks
Redux::set_section('docy_opt', array(
    'title'            => esc_html__( 'Gutenberg Blocks', 'docy' ),
    'id'               => 'wc_gutenberg_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Unload WC Gutenberg Assets', 'docy' ),
            'subtitle'  => esc_html__( "WC gutenberg assets loads globally. If you don't use wooCommerce gutenberg blocks, it's recommended to unload the unnecessary assets.", 'docy' ),
            'id'        => 'is_wc_block',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'docy' ),
            'off'       => esc_html__( 'No', 'docy' ),
            'default'   => '',
        ),
    )
));