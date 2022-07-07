<?php
$opt = get_option('docy_opt' );
$post_author_id = get_post_field( 'post_author', get_the_ID() );

$banner_type = function_exists('get_field') ? get_field('banner_type') : '';
$banner_type = !empty($banner_type) ? $banner_type : 'colorful';
?>
<section class="doc_banner_area single_breadcrumb">
    <?php if ( $banner_type == 'colorful' ) : ?>
        <ul class="list-unstyled banner_shap_img">
            <li><img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/banner_shap1.png" alt="<?php esc_attr_e('banner shape', 'docy') ?>"></li>
            <li><img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/banner_shap4.png" alt="<?php esc_attr_e('banner shape', 'docy') ?>"></li>
            <li><img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/banner_shap3.png" alt="<?php esc_attr_e('banner shape', 'docy') ?>"></li>
            <li><img src="<?php echo DOCY_DIR_IMG ?>/banner-blog/banner_shap2.png" alt="<?php esc_attr_e('banner shape', 'docy') ?>"></li>
            <li><img data-parallax='{"x": -180, "y": 80, "rotateY":2000}' src="<?php echo DOCY_DIR_IMG ?>/banner-blog/plus1.png" alt="<?php esc_attr_e('plus icon', 'docy') ?>"></li>
            <li><img data-parallax='{"x": -50, "y": -160, "rotateZ":200}' src="<?php echo DOCY_DIR_IMG ?>/banner-blog/plus2.png" alt="<?php esc_attr_e('plus icon', 'docy') ?>"></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    <?php endif; ?>
    <div class="container">
        <div class="doc_banner_content">
            <?php the_title('<h1 class="title">', '</h1>') ?>
            <?php
            $post_meta = $opt['is_single_post_meta'] ?? '1';
            if ( $post_meta == '1' ) :
                ?>
                <div class="single_post_author d-flex justify-content-center">
                    <div class="text post_tag">
                        <?php
                        $post_date = $opt['is_single_post_date'] ?? '';
                        if ( $post_date == '1' ) :
                            ?>
                            <a href="<?php Docy_helper()->day_link(); ?>" class="meta-item date">
                                <ion-icon name="calendar-outline"></ion-icon>
                                <?php the_time(get_option('date_format')); ?>
                            </a>
                            <?php
                        endif;

                        $reading_time = $opt['is_single_reading_time'] ?? '';
                        if ( $reading_time == '1' ) :
                            ?>
                            <div class="meta-item read-time">
                                <ion-icon name="time-outline"></ion-icon>
                                <?php docy_reading_time(get_the_ID()); ?>
                            </div>
                            <?php
                        endif;

                        $is_single_cats = $opt['is_single_cats'] ?? '';
                        if ( $is_single_cats == '1' ) :
                            ?>
                            <div class="cats meta-item">
                                <ion-icon name="pricetags-outline"></ion-icon>
                                <?php the_category(','); ?>
                            </div>
                            <?php
                        endif;
                        ?>

                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>