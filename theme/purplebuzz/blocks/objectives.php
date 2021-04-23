<?php
    $objectives                      = get_content_block_field('objectives');
    $objectives_list                 = $objectives ['items'];
?>

<?php if ( $objectives ) : ?>

    <!-- Start Aim -->
    <section class="banner-bg bg-white py-5">
        <div class="container my-4">
            <div class="row text-center">

                <?php foreach ( $objectives_list as $objective ) : ?>
                <div class="objective col-lg-4">
                    <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                        <i class="display-4 bx bxs-<?php echo esc_html( $objective['icon'] ) ?> text-light"></i>
                    </div>
                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">
                        <?php echo esc_html( $objective['label'] ) ?>
                    </h2>
                    <p class="light-300">
                        <?php echo esc_html( $objective['description'] ) ?>
                    </p>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- End Aim -->

<?php endif; ?>
