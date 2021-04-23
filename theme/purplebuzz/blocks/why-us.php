<?php
    $whyus                      = get_content_block_field('whyus');

    $style_title_color          = $whyus['title_color'];
    $style_title_underline      = $whyus['title_underline']; // bool

    $image                      = wp_get_attachment_image_src( $whyus['image'], 'full' );
?>

<?php if ( $whyus ) : ?>

    <!-- Start Choice -->
    <section class="why-us banner-bg bg-light">
        <div class="container my-4">
            <div class="row">
                <div class="banner-img col-lg-5">
                    <img src="<?php echo $image[0]; ?>" class="rounded img-fluid" alt="">
                </div>
                <div class="banner-content col-lg-7 align-self-end">
                    <h2 class="h2 pb-3 text-<?php esc_html( $style_title_color ) ?> <?=$style_title_underline ? 'typo-space-line' : '' ?>">
                        <?php echo esc_html( $whyus['title'] ) ?>
                    </h2>
                    <div class="text-muted pb-5 light-300">
                        <?php echo wp_kses( $whyus['paragraph'] , purplebuzz_allowed_html() ) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Choice -->

<?php endif; ?>
