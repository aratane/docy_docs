<?php
// Theme settings options
$opt = get_option('docy_opt' );

$left_ornament = function_exists('get_field') ? get_field('left_ornament') : '1';
$is_banner = function_exists('get_field') ? get_field('is_banner') : '1';
$is_banner = $is_banner ?? '1';
$titlebar_align = !empty($opt['titlebar_align']) ? $opt['titlebar_align'] : '';
$is_banner_ornaments = $opt['is_banner_ornaments'] ?? '1';

if ( docy_no_titlebar() ) {
    $is_banner = '';
}

if ( (!isset($is_banner) && is_page()) || is_singular('onepage-docs') ) {
	$is_banner = '1';
}

if ( $is_banner == '1' ) :
    ?>
    <div class="breadcrumb_area_three">
        <?php
        if ( $is_banner_ornaments == '1' ) {
            Docy_helper()->image_from_settings('banner_left_ornament', 'p_absolute one', 'leaf left');
            Docy_helper()->image_from_settings('banner_right_ornament', 'p_absolute four', 'leaf right');
        }
        ?>
        <div class="container">
            <div class="breadcrumb_text text-<?php echo esc_attr($titlebar_align) ?>">
                <h1 class="text-<?php echo esc_attr($titlebar_align) ?>">
                    <?php Docy_helper()->banner_title() ?>
                </h1>
                <?php docy_titlebar_excerpt(); ?>
            </div>
        </div>
    </div>
    <?php
endif;