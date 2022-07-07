<?php
$opt = get_option('docy_opt');
$is_search_form_page = function_exists('get_field') ? get_field('is_search_form') : '';
$is_search_form_opt = isset($opt['is_search_form']) ? $opt['is_search_form'] : '';
$is_search_form = isset($is_search_form_page) ? $is_search_form_page : $is_search_form_opt;

$s_value = get_search_query() ? get_search_query() : '';

$menu_align = $opt['menu_align'] ?? '';
$is_menu_center = '';
switch ( $menu_align ) {
    case 'left':
        $menu_class = 'justify-content-lg-between ms-5';
        break;
    case 'center':
        $menu_class = '';
        $is_menu_center = 'm-auto';
        break;
    default:
        $menu_class = '';
}
?>
<div class="collapse navbar-collapse <?php echo esc_attr($menu_class) ?>" id="navbarSupportedContent">
    <?php
    if ( $is_search_form == '1' ) :
        ?>
        <form action="<?php echo esc_url(home_url("/")) ?>" class="search-input show-by-default" method="get">
            <input type="search" placeholder="<?php esc_attr_e('Search...', 'docy'); ?>" name="s" value="<?php echo esc_attr($s_value) ?>">
            <button type="submit" class="search-icon"> <ion-icon name="search-outline"></ion-icon> </button>
        </form>
        <?php
    endif;
    ?>
    <?php
    if ( has_nav_menu('main_menu') ) {
        wp_nav_menu( array (
            'menu' => 'main_menu',
            'theme_location' => 'main_menu',
            'container' => null,
            'menu_class' => "navbar-nav menu ml-auto $is_menu_center",
            'walker' => new Docy_Nav_Walker(),
            'depth' => 4
        ));
    }
    ?>

    <?php get_template_part('template-parts/header-elements/action-button' ); ?>
</div>