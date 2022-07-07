<?php

/**
 * Single Topic Lead Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly

defined( 'ABSPATH' ) || exit;
do_action( 'bbp_template_before_lead_topic' );
?>
    <div class="main-post">
        <!-- Forum post top area -->
        <div class="forum-post-top">
            <div class="d-flex">
                <div class="author-avatar bbp-author-link">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ) ?>
                </div>
                <div class="forum-post-author">
                    <div class="topic-author d-flex mb-1">
                        <a class="bbp-author-link" href="<?php echo bbp_get_topic_author_url() ?>">
                            <?php echo get_the_author_meta( 'display_name' ); ?>
                        </a>
                        <div class="author-badge badge <?php echo sanitize_title(docy_get_bbp_user_role()) ?>">
                            <?php docy_bbp_user_role_icon(); ?>
                            <span> <?php echo docy_get_bbp_user_role() ?> </span>
                        </div>
                    </div>
                    <div class="forum-author-meta meta">
                        <a href="<?php the_permalink(); ?>" title="<?php bbp_topic_post_date(); ?>">
                            <?php bbp_topic_post_date(get_the_ID(), true); ?>
                        </a>
                        <a href="#topic-<?php bbp_topic_id(); ?>-replies">
                            <?php docy_topic_reply_count(); esc_html_e(' Replies'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="action-button-container">
		        <?php
		        bbp_topic_subscription_link( array(
			        'before'      => '',
			        'after'       => '',
			        'unsubscribe' => esc_html__( 'Subscribed', 'docy' ),
		        ));
		        ?>
            </div>
        </div>


        <!-- Forum post content -->
        <div class="q-title">
            <span class="question-icon" title="Question">Q:</span>
            <h1>
                <?php
                the_title();
                if ( class_exists('DocyCore\inc\bbp_solved_topic') ) {
                    $obj = new DocyCore\inc\bbp_solved_topic;
                    echo $obj->topic_content_filter();
                }
                ?>
            </h1>
        </div>
        <div class="forum-post-content">
            <div class="content">
				<?php bbp_topic_content(); ?>
            </div>
            <div class="forum-post-btm meta">
				<?php if ( bbp_get_topic_tag_list( get_the_ID() ) ) : ?>
                    <div class="taxonomy forum-post-tags">
						<?php
						bbp_topic_tag_list( '',
							array(
								'before' => '<i class="icon_tags_alt"></i> <strong>' . esc_html__( 'Tagged:', 'docy' ) . '</strong>&nbsp; <span class="tags">',
								'after'  => '</span>'
							)
						);
						?>
                    </div>
				<?php endif; ?>
                <div class="taxonomy forum-post-cat">
					<?php echo get_the_post_thumbnail( bbp_get_topic_forum_id(), 'docy_20x20' ); ?>
                    <a href="<?php bbp_forum_permalink( bbp_get_topic_forum_id() ); ?>">
						<?php echo bbp_get_topic_forum_title() ?>
                    </a>
                </div>
            </div>
            <div class="action-button-container action-btns">
				<?php if ( is_user_logged_in() ) : ?>
                    <ul class="list-unstyled d-flex bbp-admin-links">
						<?php
						$admin_link_args = array( 'before' => '<li>', 'after' => '</li>', 'sep' => '</li><li>' );
						bbp_topic_admin_links( $admin_link_args );
						?>
                    </ul>
				<?php endif; ?>
				<?php
				bbp_topic_favorite_link( array(
					'before' => '',
				));
				?>
            </div>
        </div>
    </div>

<?php do_action( 'bbp_template_after_lead_topic' );