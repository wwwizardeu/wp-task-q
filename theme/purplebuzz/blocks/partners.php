<?php
    $partners           = get_content_block_field('partners');
    $partners_list      = $partners['partners'];
?>

<?php if ( $partners ) : ?>

    <!-- Start Our Partner -->
    <section class="bg-secondary py-3">
        <div class="container py-5">
            <h2 class="h2 text-white text-center py-5">
                <?php echo esc_html( $partners['title'] ) ?>
            </h2>
            <div class="row text-center">

                <?php foreach ( $partners_list as $partner ) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="<?php echo esc_url( $partner['link'] ) ?>">
                            <i class='display-1 text-white bx bxs-<?php echo esc_html( $partner['icon'] ) ?>'></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!--End Our Partner-->

<?php endif; ?>
