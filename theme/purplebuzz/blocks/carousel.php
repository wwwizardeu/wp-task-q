<?php
    $carousel           = get_content_block_field('carousel');
    $carousel_items     = $carousel['items'];
?>

<?php if ( $carousel ) : ?>

    <!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light">
        <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ( $carousel_items as $carousel_key => $carousel_item ) : ?>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$carousel_key?>" <?= $carousel_key == 0 ? 'class="active"' : '' ?>></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ( $carousel_items as $carousel_key => $carousel_item ) : ?>
                    <div class="carousel-item <?= $carousel_key == 0 ? 'active' : '' ?>">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 <?= $carousel_item['title_underline'] ? 'typo-space-line' : '' ?>">
                                    <?php echo wp_kses( $carousel_item['title'] , purplebuzz_allowed_html() ) ?>
                                </h1>
                                <div class="banner-body text-muted py-3 mx-0 px-0">
                                    <?php echo wp_kses( $carousel_item['content'] , purplebuzz_allowed_html() ) ?>
                                </div>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="<?php echo esc_url( $carousel_item['cta_link'] ) ?>" role="button"><?php echo esc_html( $carousel_item['cta_label'] ) ?></a>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden"><?php _e('Previous', 'purplebuzz') ?></span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden"><?php _e('Next', 'purplebuzz') ?></span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->

<?php endif; ?>

