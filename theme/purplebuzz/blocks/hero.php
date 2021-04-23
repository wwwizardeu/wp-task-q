<?php
    $hero                       = get_content_block_field('hero');

    $style_background           = $hero['background_color'];
    $style_title_color          = $hero['title_color'];
    $style_title_underline      = $hero['title_underline']; // bool

    $image                      = wp_get_attachment_image_src( $hero['image'], 'full' );
?>

<?php if ( $hero ) : ?>

    <!-- Start Banner Hero -->
    <section class="w-100 <?=$style_background ? 'bg-light' : '' ?>">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <div class="col-lg-6 text-start">
                    <h1 class="h2 py-5 text-<?php esc_html( $style_title_color ) ?> <?=$style_title_underline ? 'typo-space-line' : '' ?>">
                        <?php echo esc_html( $hero['title'] ) ?>
                    </h1>
                    <div class="light-300">
                        <?php echo wp_kses( $hero['paragraph'] , purplebuzz_allowed_html() ) ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo $image[0]; ?>">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->

<?php endif; ?>
