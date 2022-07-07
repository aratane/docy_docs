<?php
/**
 * The header for our theme
 *
 * This is the template that displays all the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package docy
 */

// Theme settings options
$opt = get_option('docy_opt' );
$my_theme = wp_get_theme( 'docy' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Theme Version -->
        <meta name="docy-version" content="<?php echo esc_attr($my_theme->Version) ?>">
        <!-- Charset Meta -->
        <meta charset="<?php bloginfo('charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Responsive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); docy_has_scrollspy() ?> >
        <?php
        if ( function_exists('wp_body_open') ) {
            wp_body_open();
        }

        /**
         * Preloader
         */
        $is_preloader = $opt['is_preloader'] ?? '';
        if ( $is_preloader == '1' ) {
            get_template_part('template-parts/header-elements/preloader');
        }
        ?>

        <div class="body_wrapper <?php docy_sticky_navbar() ?>">
            <div class="click_capture"></div>

            <nav <?php docy_navbar_class() ?> id="<?php docy_sticky_navbar('id') ?>">
                <div class="<?php docy_nav_container() ?>">
                    <?php Docy_helper()->logo(); ?>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'docy'); ?>">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <?php
                    $header_layout = $opt['header_layout'] ?? 'default';
                    get_template_part( 'template-parts/header-elements/layout', $header_layout );
                    ?>
                </div>
            </nav>

            <?php
            /**
             * Mobile menu
             */
            if ( is_singular('docs') ) {
                get_template_part( 'template-parts/header-elements/doc-mobile-menu' );
            } else {
                get_template_part( 'template-parts/header-elements/mobile-menu' );
            }

            /**
             * Page Title-bar
             */
            get_template_part( 'template-parts/header-elements/titlebar' );

            /**
             * Search banner area
             */

            if ( docy_is_search_banner() == '1' ) {
                get_template_part('template-parts/header-elements/search-banner/sbnr', docy_search_banner());
            }