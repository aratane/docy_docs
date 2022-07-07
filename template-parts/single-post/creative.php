<?php
$opt = get_option( 'docy_opt' );
wp_enqueue_script( 'anchor' );
$creative_video = has_post_format( 'video' ) ? 'shadow-sm' : 'toc-creative-default';
$banner_image   = function_exists( 'get_field' ) ? get_field( 'banner_image' ) : '';
$video_url      = function_exists( 'get_field' ) ? get_field( 'video_url' ) : '';
$sticky_toc     = function_exists( 'get_field' ) ? get_field( 'sticky_toc' ) : '';
$summary_title  = function_exists( 'get_field' ) ? get_field( 'summary-title' ) : '';
$summary_desc   = function_exists( 'get_field' ) ? get_field( 'summary-description' ) : '';
$sticky_toc     = $sticky_toc ?? '1';
$post_column    = $sticky_toc == '1' ? '9' : '12';
$p0             = $sticky_toc == '1' ? '' : 'p-0';
?>

<section class="tip_banner_area toc-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="toc-wrapper-banner">
                    <nav aria-label="breadcrumb">
						<?php docy_post_breadcrumbs(); ?>
                    </nav>
					<?php
					the_title( '<h1 class="banner_title">', '</h1>' );
					echo strip_shortcodes( Docy_helper()->excerpt( 'blog_excerpt', false ) );
					?>
                </div>
            </div>
            <div class="col-lg-5">

                <div class="blog_classic_item toc-creative-media <?php echo esc_attr( $creative_video ); ?>">
                    <div class="video_post">
						<?php
						the_post_thumbnail( 'full', [ 'class' => 'banner-img-thumbnail' ] );
						if ( has_post_format( 'video' ) && ! empty( $video_url ) ) :
							wp_enqueue_style( 'magnific-popup' );
							wp_enqueue_script( 'magnific-popup' );
							?>
                            <a class="popup-youtube video_icon" href="<?php echo esc_url( $video_url ) ?>"><i class="arrow_triangle-right"></i></a>
						    <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toc-banner-overlay">
        <img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/toc-overlay.svg" alt="<?php esc_attr_e( 'Overlay Image', 'docy' ) ?>" class="overlay-shape-light"/>
        <img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/toc-overlay-dark.svg" alt="<?php esc_attr_e( 'Overlay Image', 'docy' ) ?>" class="overlay-shape-dark"/>
    </div>
</section>

<section class="tip_doc_area" id="sticky_doc2">
    <div class="container custom_container">
        <div class="row doc-container">
			<?php if ( $sticky_toc == '1' ) : ?>
                <div class="col-lg-3 doc_mobile_menu doc-sidebar display_none">
                    <aside class="left_sidebarlist">
                        <nav data-toggle="toc" class="list-unstyled nav-sidebar doc-nav" id="docy-toc">

                        </nav>
                    </aside>
                </div>
			<?php endif; ?>
            <div class="col-lg-<?php echo esc_attr( $post_column ) ?>">
                <article class="blog_info doc-section <?php echo esc_attr( $p0 ) ?>">
                    <div class="blog_body anchor-enabled">
                        <div class="toc-summery-wrapper">

							<?php if ( ! empty( $summary_title ) )  : ?>
                                <h1 class="toc-summery-title"> <?php echo esc_html( $summary_title ); ?></h1>
							<?php endif;

							if ( ! empty( $summary_desc ) )  : ?>
                                <p class="toc-summery-info"> <?php echo esc_html( $summary_desc ); ?></p>
							<?php endif; ?>

                            <div class="toc-content row" id="docy-top-toc"></div>
                        </div>
						<?php the_content();
						$is_post_tag = isset( $opt['is_post_tag'] ) ? $opt['is_post_tag'] : '1';
						if ( has_tag() && $is_post_tag == '1' ) : ?>
                            <div class="single_post_tags post-tags">
								<?php the_tags( esc_html__( 'Tags : ', 'docy' ), ' ' ); ?>
                            </div>
						<?php endif; ?>
                    </div>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
                </article>
            </div>
        </div>
    </div>
</section>