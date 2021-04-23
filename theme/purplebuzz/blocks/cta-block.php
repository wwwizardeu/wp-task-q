<?php
    $cta_block = get_content_block_field('cta_block');
?>

<?php if ( $cta_block ) : ?>

    <!-- Start View Work -->
    <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-<?php echo esc_html( $cta_block['icon'] ) ?> bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">
                        <?php echo esc_html( $cta_block['title'] ) ?>
                    </h3>
                    <p class="light-300">
                        <?php echo esc_html( $cta_block['subtitle'] ) ?>
                    </p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="<?php echo esc_url( $cta_block['cta_link'] ) ?>" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">
                        <?php echo esc_html( $cta_block['cta_label'] ) ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End View Work -->

<?php endif; ?>
