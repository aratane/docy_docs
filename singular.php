<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package docy
 */
get_header();

$opt = get_option('docy_opt');
$banner_type = function_exists('get_field') ? get_field('banner_type') : '';
$is_related = !empty($opt['is_related_posts']) ? $opt['is_related_posts'] : '';
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$is_single_post_date = $opt['is_single_post_date'] ?? '1';

if ( $banner_type == 'toc' ) {
    wp_enqueue_script( 'anchor' );
    wp_enqueue_script('bootstrap-toc');
    get_template_part('template-parts/single-post/toc-layout');
}
elseif ( $banner_type == 'creative' ) {
    wp_enqueue_script( 'anchor' );
    wp_enqueue_script('bootstrap-toc');
    get_template_part('template-parts/single-post/creative');
}
else {
    get_template_part('template-parts/single-post/banner-single');
    ?>
    <section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="blog_single_info col-lg-<?php echo esc_attr($blog_column) ?>">
                <div class="main-post">
                    <div class="blog_single_item">
                        <?php
                        while ( have_posts() ) : the_post();
                            $user_desc = get_the_author_meta( 'description' );
                            the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'docy' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'docy' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ));
                        endwhile;
                        ?>
                    </div>

                    <?php
                    $is_post_tag = $opt['is_post_tag'] ?? '1';
                    if ( has_tag() && $is_post_tag == '1' ) : ?>
                        <div class="single_post_tags post-tags">
                            <?php the_tags(esc_html__( 'Tags : ', 'docy' ), ' ' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php

                // Related posts
                if ( is_singular('post') ) {
                    get_template_part( 'template-parts/single-post/related-posts' );
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php
}
get_footer();