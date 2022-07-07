<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package docy
 */

if ( ! is_active_sidebar( 'forum_archive_sidebar' ) ) {
	return;
}
?>

<div class="col-lg-4">
    <div class="forum_sidebar">
	    <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
	</div>
</div>