<?php
    $newsletter = get_content_block_field('newsletter');
?>

<?php if ( $newsletter ) : ?>

    <!-- Start Contact -->
    <section class="banner-bg bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-4 p-3">
                    <form action="#" method="get">
                        <h1 class="h2 text-center">
                            <?php echo esc_html( $newsletter['title'] ) ?>
                        </h1>
                        <div class="input-group py-3">
                            <input name="email" type="text" class="form-control form-control-lg rounded-pill rounded-end" id="email" placeholder="<?php echo esc_html( $newsletter['placeholder'] ) ?>" aria-label="<?php echo esc_html( $newsletter['placeholder'] ) ?>">
                            <button class="btn btn-secondary text-white btn-lg rounded-pill rounded-start px-lg-4" type="submit">
                                <?php echo esc_html( $newsletter['cta_label'] ) ?>
                            </button>
                        </div>
                        <p class="text-center light-300">
                            <?php echo esc_html( $newsletter['paragraph'] ) ?>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->

<?php endif; ?>
