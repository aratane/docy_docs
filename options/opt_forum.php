<?php
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Forums', 'docy' ),
	'id'        => 'forums_opt',
	'icon'      => 'dashicons dashicons-buddicons-forums',
));

/**
 * Forum archive settings
 */
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Forum Archive', 'docy' ),
	'id'        => 'forum_archive_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'     => array(
        array(
            'title'     => esc_html__( 'Top Call to Action', 'docy' ),
            'id'        => 'is_forum_top_c2a',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
        ),

        /**
         * Top Call to Action
         */
        array(
            'title'     => esc_html__( 'Top Call to Action Controls', 'docy' ),
            'id'        => 'forum_top_c2a-start',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_forum_top_c2a', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Left Featured Image', 'docy' ),
            'id'        => 'forum_top_c2a_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/forum/answer.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Title', 'docy' ),
            'id'        => 'forum_top_c2a_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Can’t find an answer?', 'docy' )
        ),

        array(
            'title'     => esc_html__( 'Subtitle', 'docy' ),
            'id'        => 'forum_top_c2a_subtitle',
            'type'      => 'text',
            'default'   => esc_html__( 'Make use of a qualified tutor to get the answer', 'docy' )
        ),

        array(
            'title'     => esc_html__( 'Button Title', 'docy' ),
            'id'        => 'forum_top_c2a_btn_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Ask a Question', 'docy' )
        ),
        array(
            'title'     => esc_html__( 'Button URL', 'docy' ),
            'id'        => 'forum_top_c2a_btn_url',
            'type'      => 'text',
            'default'   => '#'
        ),

        array(
            'id'     => 'forum_top_c2a-end',
            'type'   => 'section',
            'indent' => false,
        ),

        /**
         * Bottom Call to Action
         */
        array(
            'title'     => esc_html__( 'Bottom Call to Action', 'docy' ),
            'id'        => 'is_forum_btm_c2a',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Bottom Call to Action', 'docy' ),
            'subtitle'  => esc_html__( 'Control here the bottom Call to Action area of the Forum archive pages.', 'docy' ),
            'id'        => 'forum_btm_c2a-start',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_forum_btm_c2a', '=', '1')
        ),
        array(
            'title'     => esc_html__( 'Left Featured Image', 'docy' ),
            'id'        => 'forum_btm_c2a_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/forum/chat-smile.png'
            )
        ),
        array(
            'title'     => esc_html__( 'Background Image', 'docy' ),
            'id'        => 'forum_btm_c2a_bg',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => DOCY_DIR_IMG.'/forum/overlay_bg.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Title', 'docy' ),
            'id'        => 'forum_btm_c2a_title',
            'type'      => 'text',
            'default'   => esc_html__( 'New to Communities?', 'docy' )
        ),

        array(
            'title'     => esc_html__( 'Button Title', 'docy' ),
            'id'        => 'forum_btm_c2a_btn_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Join the community ', 'docy' )
        ),
        array(
            'id'     => 'forum_btm_c2a-end',
            'type'   => 'section',
            'indent' => false,
        ),
	)
));

/**
 * Forum topics archive
 */
Redux::set_section('docy_opt', array(
	'title'         => esc_html__( 'Topics Archive', 'docy' ),
	'id'            => 'topics_archive_opt',
	'icon'          => '',
	'subsection'    => true,
	'fields'        => array(
		array(
			'title'     => esc_html__( 'Forums', 'docy' ),
			'id'        => 'is_forums_in_topics',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'docy' ),
			'off'       => esc_html__( 'Hide', 'docy' ),
			'default'   => '1',
		),
		array(
			'title'         => esc_html__( 'Forums', 'docy' ),
			'desc'          => esc_html__( 'Forums to show above the topics list.', 'docy' ),
			'id'            => 'forums_ppp_in_topics',
			'type'          => 'slider',
			'default'       => 4,
			'min'           => 4,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'label',
		),
	)
));


/**
 * Forum topics details
 */
Redux::set_section('docy_opt', array(
    'title'         => esc_html__( 'Topic Details', 'docy' ),
    'id'            => 'topic_details_opt',
    'icon'          => '',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__( 'Replies Order', 'docy' ),
            'id'        => 'reply_order',
            'type'      => 'select',
            'default'   => 'DESC',
            'options'   => array(
                'ASC'   => esc_html__('Ascending', 'docy'),
                'DESC'   => esc_html__('Descending', 'docy'),
            )
        ),
	    array(
		    'title'     => esc_html__( 'Private Reply', 'docy' ),
			'subtitle'  => esc_html__( 'When disabled, all the private replies will be public. ','docy'),
		    'id'        => 'is_private_reply',
		    'type'      => 'switch',
		    'on'        => esc_html__( 'Enable', 'docy' ),
		    'off'       => esc_html__( 'Disable', 'docy' ),
		    'default'   => '1',
	    ),
	    array(
		    'title'     => esc_html__( 'Solved Topics', 'docy' ),
		    'subtitle'  => esc_html__( 'You can turn topics into solved','docy'),
		    'id'        => 'is_solved_topic',
		    'type'      => 'switch',
		    'on'        => esc_html__( 'Enable', 'docy' ),
		    'off'       => esc_html__( 'Disable', 'docy' ),
		    'default'   => '1',
	    ),
	)
));

Redux::set_section('docy_opt', array(
    'title'         => esc_html__( 'Users', 'docy' ),
    'id'            => 'forum_users',
    'icon'          => '',
    'subsection'    => true,
    'fields'        => array(
        array(
	        'title'     => esc_html__( 'Keymaster Icon', 'docy' ),
	        'id'          => 'keymaster_icon',
	        'type'      => 'media',
	        'compiler'  => true,
	        'default'   => [
	        	'url'       => DOCY_DIR_IMG.'/icons/keymaster.svg'
	        ]
        ),
	    array(
		    'title'     => esc_html__( 'Moderator Icon', 'docy' ),
	        'id'          => 'moderator_icon',
	        'type'      => 'media',
	        'compiler'  => true,
		    'default'   => [
			    'url'       => DOCY_DIR_IMG.'/icons/moderator.svg'
		    ]
        ),
	    array(
		    'title'     => esc_html__( 'Participant Icon', 'docy' ),
	        'id'          => 'participant_icon',
	        'type'      => 'media',
	        'compiler'  => true,
		    'default'   => [
			    'url'       => DOCY_DIR_IMG.'/icons/participants.svg'
		    ]
        ),
	    array(
		    'title'     => esc_html__( 'Blocked Icon', 'docy' ),
	        'id'          => 'blocked_icon',
	        'type'      => 'media',
	        'compiler'  => true,
		    'default'   => [
			    'url'       => DOCY_DIR_IMG.'/icons/block-user.svg'
		    ]
        )
    )
));
