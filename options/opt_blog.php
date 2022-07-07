<?php
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Blog Pages', 'docy' ),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));

/**
 * Blog archive settings
 */
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Blog archive', 'docy' ),
	'id'        => 'blog_meta_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Blog page title', 'docy' ),
            'subtitle'  => esc_html__( 'Controls the title text that displays in the page title bar only if your front page displays your latest post in "Settings > Reading".', 'docy' ),
            'id'        => 'blog_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Blog List', 'docy' )
        ),
        array(
            'title'     => esc_html__( 'Blog Layout', 'docy' ),
            'subtitle'  => esc_html__( 'The Blog layout will also apply on the blog category and tag pages.', 'docy' ),
            'id'        => 'blog_layout',
            'type'      => 'image_select',
            'options'   => array(
                'list' => array(
                    'alt' => esc_html__( 'List Layout', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/list.jpg'
                ),
                'grid' => array(
                    'alt' => esc_html__( 'Grid Layout', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/blog_grid.jpg'
                ),
                'blog_category' => array(
                    'alt' => esc_html__( 'Grid Category Tab', 'docy' ),
                    'img' => DOCY_DIR_IMG.'/layouts/blog_grid_category_tab.jpg'
                ),
            ),
            'default' => 'list'
        ),
        array(
            'title'     => esc_html__( 'Column', 'docy' ),
            'id'        => 'blog_column',
            'type'      => 'select',
            'options'   => [
                '6' => esc_html__( 'Two', 'docy' ),
                '4' => esc_html__( 'Three', 'docy' ),
                '3' => esc_html__( 'Four', 'docy' ),
            ],
            'default'   => '6',
            'required' => array (
                array ( 'blog_layout', '=', array( 'grid', 'blog_category' ) ),
            )
        ),
        array(
            'title'     => esc_html__( 'Post title length', 'docy' ),
            'subtitle'  => esc_html__( 'Blog post title length in character', 'docy' ),
            'id'        => 'post_title_length',
            'type'      => 'slider',
            'default'   => 50,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text',
        ),
        array(
            'title'     => esc_html__( 'Post Word Excerpt', 'docy' ),
            'subtitle'  => esc_html__( 'If post excerpt empty, the excerpt content will take from the post content. Define here how much word you want to show along with the each posts in the blog page.', 'docy' ),
            'id'        => 'blog_excerpt',
            'type'      => 'slider',
            'default'   => 40,
            "min"       => 1,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'text'
        ),
        array(
            'title'     => esc_html__( 'Continue Reading Label', 'docy' ),
            'id'        => 'blog_continue_read',
            'type'      => 'text',
            'default'   => esc_html__( 'Continue Reading', 'docy' ),
            'required' => array (
                 array ( 'blog_layout', '=', 'list' ),
            ),
        ),
		array(
			'title'     => esc_html__( 'Post Meta', 'docy' ),
			'subtitle'  => esc_html__( 'Show/hide post meta on blog archive page', 'docy' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
		),
		array(
			'title'     => esc_html__( 'Post Date', 'docy' ),
			'id'        => 'is_post_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Post Reading Time', 'docy' ),
			'id'        => 'is_post_reading_time',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Post category', 'docy' ),
			'id'        => 'is_post_cat',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Author', 'docy' ),
			'id'        => 'is_post_author',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
	)
));

/**
 * Post single
 */
Redux::set_section('docy_opt', array(
	'title'     => esc_html__( 'Blog single', 'docy' ),
	'id'        => 'blog_single_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Background Color', 'docy' ),
            'id'        => 'blog_single_banner_bg_color',
            'output'    => array('.doc_banner_area'),
            'type'      => 'color',
            'mode'      => 'background'
        ),
        array(
            'title'     => esc_html__( 'Title Color', 'docy' ),
            'id'        => 'blog_single_banner_title_color',
            'output'    => array('.single_breadcrumb .doc_banner_content .title'),
            'type'      => 'color',
        ),

        // Post Metas
        array(
            'title'     => esc_html__( 'Post meta', 'docy' ),
            'subtitle'  => esc_html__( 'Post meta includes Date, Reading Time and Categories.', 'docy' ),
            'id'        => 'is_single_post_meta',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Post Date', 'docy' ),
            'id'        => 'is_single_post_date',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Post Reading Time', 'docy' ),
            'id'        => 'is_single_reading_time',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Categories', 'docy' ),
            'id'        => 'is_single_cats',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),

        array(
            'title'     => esc_html__( 'Post Tags', 'docy' ),
            'subtitle'  => esc_html__( 'The Post Tags shows at the bottom of the post content.', 'docy' ),
            'id'        => 'is_single_post_tag',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
            'default'   => '1'
        ),

        // Related Posts
        array(
            'title'     => esc_html__( 'Related posts ', 'docy' ),
            'id'        => 'is_related_posts',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'docy' ),
            'off'       => esc_html__( 'Hide', 'docy' ),
        ),
        array(
            'title'     => esc_html__( 'Posts section title', 'docy' ),
            'id'        => 'related_posts_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Related Post', 'docy' ),
            'required'  => array('is_related_posts', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Related posts count', 'docy' ),
            'id'        => 'related_posts_count',
            'type'      => 'slider',
            'default'       => 3,
            'min'           => 3,
            'step'          => 1,
            'max'           => 50,
            'display_value' => 'label',
            'required'  => array('is_related_posts', '=', '1' )
        ),
	)
));
