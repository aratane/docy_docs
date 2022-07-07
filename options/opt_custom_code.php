<?php
Redux::set_section( 'docy_opt', array(
    'title'            => esc_html__( 'Custom Code', 'docy' ),
    'id'               => 'custom_code_opt',
    'icon'             => 'dashicons dashicons-editor-code',
    'fields'           => array(
	    array(
		    'id'       => 'custom_css',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__( 'CSS Code', 'docy' ),
		    'subtitle' => esc_html__( 'Paste your CSS code here.', 'docy' ),
		    'mode'     => 'css',
		    'theme'    => 'monokai',
	    ),
	    array(
		    'id'       => 'custom_js',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__( 'JS Code', 'docy' ),
		    'subtitle' => esc_html__( 'Paste your JS code here.', 'docy' ),
		    'mode'     => 'javascript',
		    'theme'    => 'chrome',
		    'default'  => "jQuery(document).ready(function(){\n\n});"
	    ),
    )
));