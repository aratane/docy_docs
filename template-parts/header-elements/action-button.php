<?php
$opt = get_option('docy_opt');

$is_dark_switcher = $opt['is_dark_switcher'] ?? '';

$action_btn_link = function_exists( 'get_field' ) ? get_field( 'action_btn_link' ) : '';

$is_menu_btn_page = function_exists( 'get_field' ) ? get_field( 'is_menu_btn' ) : '';
$is_menu_btn_opt  = ! empty( $opt['is_menu_btn'] ) ? $opt['is_menu_btn'] : '';
$is_menu_btn      = $is_menu_btn_page ?? $is_menu_btn_opt;

// Button Title
$btn_title = '';
if ( ! empty( $action_btn_link['title'] ) ) {
	$btn_title = $action_btn_link['title'];
} else {
	$btn_title = ! empty( $opt['menu_btn_label'] ) ? $opt['menu_btn_label'] : '';
}

// Button URL
$btn_url = '#';
if ( ! empty( $action_btn_link['url'] ) ) {
	$btn_url = $action_btn_link['url'];
} else {
	$btn_url = ! empty( $opt['menu_btn_url'] ) ? $opt['menu_btn_url'] : '';
}

// Button Target
$btn_target = '';
if ( ! empty( $action_btn_link['target'] ) ) {
	$btn_target = "target='{$action_btn_link['target']}'";
} else {
	$btn_target = ! empty( $opt['menu_btn_target'] ) ? "{$opt['menu_btn_target']}" : '_self';
}

$button_style = function_exists( 'get_field' ) ? get_field( 'button_style' ) : '';
$btn_type     = '';
if ( ! empty( $button_style ) ) {
	$btn_type = ( $button_style == 'outline' ) ? 'tp_btn' : '';
} elseif ( $button_style == '' ) {
	$btn_type = 'tp_btn';
}

if ( ( $is_menu_btn == '1' && ! empty( $btn_title ) ) || $is_dark_switcher == '1' ) :
	?>
    <div class="right-nav">
		<?php if ( $is_menu_btn == '1' && ! empty( $btn_title ) ):	?>
            <a class="nav_btn tp_btn" href="<?php echo esc_url( $btn_url ) ?>" target="<?php echo esc_attr( $btn_target ) ?>">
				<?php echo esc_html( $btn_title ) ?>
            </a>
		<?php
		endif;

		if ( $is_dark_switcher == '1' ) :
			wp_enqueue_style( 'docy-dark-mode' );
			wp_enqueue_script( 'docy-dark-mode' );
			?>
            <div class="px-2 js-darkmode-btn" title="Toggle dark mode">
                <label for="something" class="tab-btn tab-btns" id="dark-switch">
                    <ion-icon name="moon"></ion-icon>
                </label>
                <label for="something" class="tab-btn" id="day-switch">
                    <ion-icon name="sunny"></ion-icon>
                </label>
                <label id="ball" class=" ball" for="something"></label>
                <input type="checkbox" name="something" id="something" class="dark_mode_switcher something">
            </div>
		<?php endif; ?>

		<?php
		$is_search_form = $opt['is_search_form'] ?? '1';
		$header_layout  = $opt['header_layout'] ?? 'default';
		if ( $is_search_form == '1' && $header_layout == 'default' ) :
			?>
            <div class="search-icon">
                <ion-icon class="close-outline" name="close-outline"></ion-icon>
                <ion-icon class="search-outline" name="search-outline"></ion-icon>
            </div>
		<?php
		endif;
		?>
    </div>
<?php
endif;