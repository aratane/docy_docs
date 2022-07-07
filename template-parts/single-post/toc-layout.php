<?php
$opt = get_option('docy_opt');

wp_enqueue_script( 'anchor' );

$banner_image = function_exists('get_field') ? get_field('banner_image') : '';

$sticky_toc = function_exists('get_field') ? get_field('sticky_toc') : '';
$sticky_toc = $sticky_toc ?? '1';
$post_column = $sticky_toc == '1' ? '9' : '12';
$p0 = $sticky_toc == '1' ? '' : 'p-0';
?>

<section class="tip_banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <?php the_title('<h1 class="banner_title">', '</h1>'); ?>
            </div>
        </div>
        <div class="row" id="docy-top-toc"> </div>
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
            <div class="col-lg-<?php echo esc_attr($post_column) ?>">
                <article class="blog_info doc-section <?php echo esc_attr($p0) ?>">
                    <div class="blog_body anchor-enabled">
                        <?php the_content(); ?>

                        <?php
                        $is_post_tag = isset($opt['is_post_tag']) ? $opt['is_post_tag'] : '1';
                        if ( has_tag() && $is_post_tag == '1' ) : ?>
                            <div class="single_post_tags post-tags">
                                <?php the_tags(esc_html__( 'Tags : ', 'docy' ), ' ' ); ?>
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