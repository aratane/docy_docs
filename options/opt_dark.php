<?php
// Color option
Redux::set_section('docy_opt', array(
    'title'     => esc_html__( 'Dark Mode', 'docy' ),
    'id'        => 'dark_mode_opt',
    'icon'      => 'dashicons dashicons-star-half',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Dark Mode Switcher', 'docy' ),
            'subtitle'  => esc_html__( 'Show/Hide the Dark Mode Switcher on the Header navigation bar.', 'docy' ),
            'id'        => 'is_dark_switcher',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '',
        ),
        array(
            'title'     => esc_html__( 'Active Dark Mode', 'docy' ),
            'subtitle'  => esc_html__( 'Activate the Dark Mode by default.', 'docy' ),
            'id'        => 'is_dark_default',
            'type'      => 'switch',
            'default'   => '',
            'required'  => array('is_dark_switcher', '!=', '1')
        ),
    )
));