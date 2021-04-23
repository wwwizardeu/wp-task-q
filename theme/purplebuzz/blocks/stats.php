<?php
    $stats                      = get_content_block_field('stats');

    $style_title_color          = $team['title_color'];
    $style_title_underline      = $team['title_underline']; // bool

    $stats_list                 = $stats ['stats'];
?>

<?php if ( $stats ) : ?>

    <!-- Start Progress -->
    <section class="bg-white py-5">
        <div class="container my-4">

            <h1 class="creative-heading h2 pb-3 text-<?php esc_html( $style_title_color ) ?> <?=$style_title_underline ? 'typo-space-line' : '' ?>">
                <?php echo esc_html( $stats['title'] ) ?>
            </h1>

            <div class="creative-content row py-3">
                <div class="col-md-5">
                    <p class="text-muted col-lg-8 light-300">
                        <?php echo esc_html( $stats['paragraph'] ) ?>
                    </p>
                </div>
                <div class="creative-progress col-md-7">

                    <?php foreach ( $stats_list as $stat ) : ?>
                    <div class="row mt-4 mt-sm-2">
                        <div class="col-6">
                            <h4 class="h5"><?php echo esc_html( $stat['label'] ) ?></h4>
                        </div>
                        <div class="col-6 text-right"><?php echo esc_html( $stat['percentage'] ) ?>%</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo esc_html( $stat['percentage'] ) ?>%" aria-valuenow="<?php echo esc_html( $stat['percentage'] ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Progress -->

<?php endif; ?>
