<?php
    $team                       = get_content_block_field('team');

    // $style_background           = $team['background_color'];
    $style_title_color          = $team['title_color'];
    $style_title_underline      = $team['title_underline']; // bool

    $members                    = $team['members'];
?>

<?php if ( $team ) : ?>

    <!-- Start Team Members -->
    <section class="container py-5">
        <div class="pt-5 pb-3 d-lg-flex align-items-center gx-5">

            <div class="col-lg-3">
                <h2 class="h2 py-5 text-<?php esc_html( $style_title_color ) ?> <?=$style_title_underline ? 'typo-space-line' : '' ?>">
                    <?php echo esc_html( $team['title'] ) ?>
                </h2>
                <p class="text-muted light-300">
                    <?php echo esc_html( $team['paragraph'] ) ?>
                </p>
            </div>

            <div class="col-lg-9 row">

                <?php
                foreach ( $members as $member ) :
                    $image = wp_get_attachment_image_src( $member['image'], 'full' );
                ?>

                <div class="team-member col-md-4">
                    <img class="team-member-img img-fluid rounded-circle p-4" src="<?php echo $image[0]; ?>" alt="Card image">
                    <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                        <li><?php echo esc_html( $member['name'] ) ?></li>
                        <li><?php echo esc_html( $member['position'] ) ?></li>
                    </ul>
                </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <!-- End Team Members -->

<?php endif; ?>
