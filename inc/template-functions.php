<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package docy
 */

// Search form
function docy_search_form($is_button=true) {
    ?>
    <div class="docy-search">
        <form class="form-wrapper" action="<?php echo esc_url(home_url( '/')); ?>" _lpchecked="1">
            <input type="text" id="search" placeholder="<?php esc_attr_e( 'Search ...', 'docy' ); ?>" name="s">
            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
        </form>
        <?php if ( $is_button==true) { ?>
        <a href="<?php echo esc_url(home_url( '/')); ?>" class="home_btn"> <?php esc_html_e( 'Back to home Page', 'docy' ); ?> </a>
        <?php } ?>
    </div>
    <?php
}

// Get comment count text
function docy_comment_count( $post_id ) {
    $comments_number = get_comments_number($post_id);
    if ( $comments_number == 0) {
        $comment_text = esc_html__( 'No Comments', 'docy' );
    } elseif( $comments_number == 1) {
        $comment_text = esc_html__( '1 Comment', 'docy' );
    } elseif( $comments_number > 1) {
        $comment_text = $comments_number.esc_html__( ' Comments', 'docy' );
    }
    echo esc_html($comment_text);
}

// Get author role
function docy_get_author_role() {
    global $authordata;
    $author_roles = $authordata->roles;
    $author_role = array_shift($author_roles);
    return esc_html($author_role);
}

/**
 * Check If the Page is Forum user profile page
 */
function docy_forum_user_profile() {
    if ( in_array('bbp-user-page', get_body_class()) || in_array('bbp-user-edit', get_body_class()) ) {
        return true;
    }
}


// Banner Subtitle
function docy_banner_subtitle() {
    $opt = get_option('docy_opt');
    if (is_home() ) {
        $blog_subtitle = !empty($opt['blog_subtitle']) ? $opt['blog_subtitle'] : get_bloginfo( 'description' );
        echo esc_html($blog_subtitle);
    }
    elseif (is_page() || is_single() ) {
        if (has_excerpt() ) {
            while ( have_posts() ) {
                the_post();
                echo nl2br(get_the_excerpt(get_the_ID() ));
            }
        }
    }
    elseif ( is_archive() ) {
        echo '';
    }
}

/**
 * Post title array
 */
function docy_get_postTitleArray($postType = 'post' ) {
    $post_type_query  = new WP_Query(
        array (
            'post_type'      => $postType,
            'posts_per_page' => -1
        )
    );
    // we need the array of posts
    $posts_array      = $post_type_query->posts;
    // the key equals the ID, the value is the post_title
    if (  is_array($posts_array) ) {
        $post_title_array = wp_list_pluck($posts_array, 'post_title', 'ID' );
    } else {
        $post_title_array['default'] = esc_html__( 'Default', 'docy' );
    }

    return $post_title_array;
}

/**
 * Get a specific html tag from content
 * @return a specific HTML tag from the loaded content
 */
function docy_get_html_tag( $tag = 'blockquote', $content = '' ) {
    $dom = new DOMDocument();
    $dom->loadHTML($content);
    $divs = $dom->getElementsByTagName( $tag );
    $i = 0;
    foreach ( $divs as $div ) {
        if ( $i == 1 ) {
            break;
        }
        echo "<h4 class='c_head'>{$div->nodeValue}</h4>";
        ++$i;
    }
}

/**
 * Get the page id by page template
 * @param string $template
 * @return int
 */
function docy_get_page_template_id( $template = 'page-job-apply-form.php' ) {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template
    ));
    foreach ( $pages as $page ) {
        $page_id = $page->ID;
    }
    return $page_id;
}

/**
 * Arrow icon left right position
 */
function docy_arrow_left_right() {
    $arrow_icon = is_rtl() ? 'arrow_left' : 'arrow_right';
    echo esc_attr($arrow_icon);
}

/**
 * Search results page's active tab
 */
function docy_is_search_tab_active( $post_type ) {
    if ( isset($_GET['post_type']) && $_GET['post_type'] == $post_type ) {
        echo 'active';
    } elseif ( !isset($_GET['post_type']) && $post_type == 'all' ) {
        echo 'active';
    }
}

/**
 * Docy post breadcrumbs
 */
function docy_post_breadcrumbs() {
    $opt = get_option('docy_opt');

    $breadcrumb_home = $opt['breadcrumb_home'] ?? esc_html__( 'Home', 'docy' );

    if ( is_home() ) {
        $title = !empty($opt['blog_title']) ? $opt['blog_title'] : esc_html__('Blog', 'docy');
    } else {
        $title = get_the_title();
    }

    if ( in_array('bbpress', get_body_class()) ) {
        bbp_breadcrumb(array(
            'before' => '<ol class="breadcrumb"> <li class="breadcrumb-item">',
            'sep_before' => '',
            'sep' => '</li><li class="breadcrumb-item">',
            'sep_after' => '',
            'current_before' => '',
            'current_after' => '',
            'after' => '</li></ol>',
            'home_text' => $breadcrumb_home
        ));
    } elseif ( is_singular('docs') || in_array('single-docs', get_post_class()) ) {
        eazydocs_breadcrumbs();
    } elseif ( in_array('type-topic', get_post_class()) ) {
        bbp_breadcrumb();
    }
    else {
        ?>
        <ol class="breadcrumb <?php echo get_post_type(get_the_ID()) ?>">
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url(home_url('/')) ?>"> <?php echo esc_html($breadcrumb_home) ?> </a>
            </li>
            <?php if ( !is_archive() && !is_home() ) : ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo get_post_type_archive_link(get_post_type(get_the_ID())) ?>">
                        <?php
                        if ( !empty($opt['doc_slug']) && is_singular('docs') ) {
                            echo ucwords(esc_html($opt['doc_slug']));
                        } else {
                            echo ucwords( get_post_type( get_the_ID() ) );
                        }
                        ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ( is_archive() && !is_home() ) : ?>
                <li class="breadcrumb-item active">
                    <?php echo ucwords(get_post_type()); ?>
                </li>
            <?php endif; ?>
            <?php if ( is_home() ) : ?>
                <li class="breadcrumb-item active">
                    <?php esc_html_e('Blog', 'docy'); ?>
                </li>
            <?php endif; ?>
            <?php if ( is_single() ) : ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo esc_html($title) ?>
                </li>
            <?php endif; ?>
        </ol>
        <?php
    }
}

/**
 * Has scrollspy
 */
function docy_has_scrollspy() {
    $banner_type = function_exists('get_field') ? get_field('banner_type') : '';
    if ( $banner_type == 'toc'  || $banner_type == 'creative' ) {
        echo 'data-bs-spy="scroll" data-bs-target="#docy-toc" data-bs-scroll-animation="true"';
    }
}

/**
 * No Titlebar Condition
 */
function docy_no_titlebar() {
    if ( class_exists('bbPress') ) {
        if ( is_post_type_archive(array('forum', 'topic')) || bbp_is_search_results() || in_array('bbp-view-popular', get_body_class()) || in_array('bbp-view-no-replies', get_body_class()) ) {
            return true;
        }
    }

    if ( is_singular('docs') || is_404() || is_home() || is_single() || is_singular('topic') || is_search() || in_array('woocommerce', get_body_class()) ) {
        return true;
    }
}


/**
 * Decode Docy
 */
function docy_decode_du( $str ) {
	$str = str_replace('cZ5^9o#!', 'wordpress-theme.spider-themes.net', $str);
	$str = str_replace('aI7!8B4H', 'resources', $str);
	$str = str_replace('^93|3d@', 'https', $str);
	$str = str_replace('t7Cg*^n0', 'docy', $str);
	$str = str_replace('3O7%jfGc', '.zip', $str);
	return urldecode($str);
}

/**
 * Is show/hide search banner
 */
function docy_is_search_banner() {
    $opt = get_option('docy_opt');
    $is_search_banner_opt = $opt['is_search_banner'] ?? '1';
    $is_search_banner_page = function_exists('get_field') ? get_field('is_search_banner') : '';

    if ( is_home() || in_array('bbpress', get_body_class()) || is_search() || is_page_template('page-changelogs.php') ) {
        if ( !isset($is_search_banner_opt) ) {
            $is_search_banner = '1';
        } elseif ( isset($is_search_banner_opt) ) {
            $is_search_banner = $is_search_banner_opt;
        }
    }

    $in_array_classes = in_array('bbp-shortcode', get_body_class()) || docy_forum_user_profile();

    if ( $in_array_classes || is_page() || is_single() || is_404() || is_category() || is_tag() || is_author() || is_tax('doc_tag')) {
        $is_search_banner = '';
    }

    if ( in_array('single-docs', get_body_class()) && !isset($is_search_banner) ) {
        $is_search_banner = '1';
    }

    if ( is_singular( array( 'docs', 'forum', 'topic' ) ) ) {
        $is_search_banner = isset($is_search_banner_page) && $is_search_banner_page != 'default' ? $is_search_banner_page : $is_search_banner_opt;
    }

    return $is_search_banner;
}

/**
 * Navbar Position
 */
function docy_navbar_position() {
    $opt = get_option('docy_opt');
    $navbar_position_page = function_exists('get_field') ? get_field('navbar_position') : '';
    $navbar_position_opt = $opt['navbar_position'] ?? 'absolute';
    $navbar_position = $navbar_position_page ?? $navbar_position_opt;
    return $navbar_position;
}

/**
 * Navbar class
 */
function docy_navbar_class() {
    $is_static = docy_navbar_position() == 'static' && !is_singular('post') ? ' position-static' : '';
    ?>
    class="navbar navbar-expand-lg menu_one sticky-nav display_none <?php Docy_helper()->navbar_type(); echo esc_attr($is_static) ?>"
    <?php
}

/**
 * Nav container
 */
function docy_nav_container( $class = '' ) {
    if ( is_singular('docs') ) {
        $nav_container = Docy_helper()->page_width() == 'full-width' ? "container-fluid pl-60 pr-60 $class" : "container custom_container $class";
    } else {
        $nav_container = Docy_helper()->page_width() == 'full-width' ? "container-fluid pl-60 pr-60 $class" : "container $class";
    }

    echo esc_attr($nav_container);
}

/**
 *
 * Is Navbar Sticky
 */
function docy_sticky_navbar( $class = 'wrapper', $stick_on = 'desktop' ) {
    $opt = get_option('docy_opt');
    $is_sticky_nav = isset($opt['is_sticky_header']) ? $opt['is_sticky_header'] : '';
    $sticky_appearance = $opt['sticky_appearance'] ?? 'stick_up';
    if ( $is_sticky_nav  == '1' ) {
	    $get_nav = $_GET['navbar'] ?? '';
        if ( $stick_on == 'desktop' ) {
	        if ( $class == 'wrapper' ) {
		        echo $sticky_appearance == 'stick_all' || $get_nav == 'stick-all' ? 'sticky_menu' : '';
	        } else {
		        echo $sticky_appearance == 'stick_all' || $get_nav == 'stick-all' ? 'stickyTwo' : 'sticky';
	        }
        } elseif ( $stick_on == 'mobile' ) {
            echo $sticky_appearance == 'stick_all' || $get_nav == 'stick-all' ? 'mobile-stickyTwo' : 'mobile-sticky';
        }
    }
}

/**
 * Search banner
 */
function docy_search_banner() {
    $opt = get_option('docy_opt');
    $search_banner_page = function_exists('get_field') ? get_field('banner_preset') : '';
    $search_banner_opt = !empty($opt['select_search_banner']) ? $opt['select_search_banner'] : 'light';
    return !empty($search_banner_page) && $search_banner_page != 'default' ? $search_banner_page : $search_banner_opt;
}

/**
 * Is aesthetic banner default
 */
function docy_is_aesthetic_default() {
    $opt = get_option('docy_opt' );
    $banner_preset = function_exists('get_field') ? get_field('banner_preset') : '';
    $search_banner_opt = $opt['select_search_banner'] ?? 'light';
    $search_banner = !empty($banner_preset) && $banner_preset != 'default' ? $banner_preset : $search_banner_opt;
    $header_type = function_exists('get_field') ? get_field('docy_header_type' ) : '';
    if ( $search_banner == 'aesthetic' ) {
        if ( $header_type == 'default' || !isset($header_type) ) {
            return true;
        }
    }
}

/**
 * Check if page title-bar show
 */
function docy_is_titlebar_default() {
    $header_type = function_exists('get_field') ? get_field('docy_header_type' ) : '';
    if ( ( is_home() && docy_search_banner() == 'light' ) || is_tag() || is_category() || ( is_page() && !isset($header_type) ) || docy_forum_user_profile() ) {
        return true;
    }
}

/**
 * Get titlebar excerpt
 */
function docy_titlebar_excerpt() {
    if ( !is_search() ) {
        if ( is_tag() ) {
            echo wpautop(tag_description(get_queried_object()->term_id));
        } elseif ( is_category() ) {
            echo wpautop(category_description(get_queried_object()->term_id));
        } else {
            echo has_excerpt() ? wpautop(get_the_excerpt()) : '';
        }
    }
}

/**
 * Modified Date
 */
function docy_modified_date() {
	$modified_date = '';
	$recent_posts = wp_get_recent_posts(array(
		'numberposts' => 1, // Number of recent posts thumbnails to display
		'post_status' => 'publish' // Show only the published posts
	));
	foreach ( $recent_posts as $recent_post ) {
		$modified_date = get_the_time(get_option('date_format'), $recent_post['ID']);
	}
	if ( is_home() ) {
		echo esc_html($modified_date);
	} else {
		the_modified_date( get_option('date_format') );
	}
}

/**
 * estimated reading time
 **/
function docy_reading_time( $post ) {
	$content = get_post_field( 'post_content', $post );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ( $readingtime == 1 ) {
		$timer = esc_html__( " minute", 'docy' );
	} else {
		$timer = esc_html__( " minutes", 'docy' );
	}
	$totalreadingtime = $readingtime . $timer;
	echo esc_html($totalreadingtime);
}

/**
 * Allowed HTML for wp_kses function
 * @return array
 */
function docy_allowed_html() {
	return array(
		'a' => array(
			'class'  => array(),
			'href'   => true,
			'rel'    => true,
			'rev'    => true,
			'name'   => true,
			'target' => true,
		),

		'br' => array(),

		'p' => array(
			'class' => array(),
		),

		'strong' => array(),
		'div'    => array(
			'style' => array(),
			'class' => array()
		),

		'img' => array(
			'class'  => array(),
			'src'    => array(),
			'srcset' => array(),
			'alt'    => array(),
		),
	);
}