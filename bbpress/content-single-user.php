<?php
/**
 * Single User Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php do_action( 'bbp_template_notices' ); ?>

	<?php do_action( 'bbp_template_before_user_wrapper' ); ?>

	<div id="bbp-user-wrapper" class="row">

		<?php bbp_get_template_part( 'user', 'details' ); ?>

        <div class="col-lg-9">
            <div class="shadow-lg p-4 mx-3 mt-4 rounded bbp-user-body">
                <?php if ( bbp_is_favorites()               ) bbp_get_template_part( 'user', 'favorites'       ); ?>
                <?php if ( bbp_is_subscriptions()           ) bbp_get_template_part( 'user', 'subscriptions'   ); ?>
                <?php if ( bbp_is_single_user_engagements() ) bbp_get_template_part( 'user', 'engagements'     ); ?>
                <?php if ( bbp_is_single_user_topics()      ) bbp_get_template_part( 'user', 'topics-created'  ); ?>
                <?php if ( bbp_is_single_user_replies()     ) bbp_get_template_part( 'user', 'replies-created' ); ?>
                <?php if ( bbp_is_single_user_edit()        ) bbp_get_template_part( 'form', 'user-edit'       ); ?>
                <?php if ( bbp_is_single_user_profile()     ) bbp_get_template_part( 'user', 'profile'         ); ?>
            </div>
        </div>
	</div>

	<?php do_action( 'bbp_template_after_user_wrapper' ); ?>

</div>
