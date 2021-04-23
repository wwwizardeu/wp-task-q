<?php
    $recent_works           = get_content_block_field('recent_works');
    $recent_works_items     = $recent_works['items'];
?>

<?php if ( $recent_works ) : ?>

    <!-- Start Recent Work -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">
                    <?php echo esc_html( $recent_works['title'] ) ?>
                </h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">

                <?php
                foreach ( $recent_works_items as $recent_works_item ) :
                    $image = wp_get_attachment_image_src( $recent_works_item['image'], 'full' );
                ?>
                <!-- Start Recent Work Single Item -->
                <div class="col-md-4 mb-3">
                    <a href="<?php echo esc_url( $recent_works_item['cta_link'] ) ?>" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="<?php echo $image[0]; ?>" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                <h3 class="card-title light-300">
                                    <?php echo esc_html( $recent_works_item['title'] ) ?>
                                </h3>
                                <p class="card-text">
                                    <?php echo esc_html( $recent_works_item['subtitle'] ) ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Recent Work Single Item -->
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- End Recent Work -->

<?php endif; ?>
