<?php
    $services                       = get_content_block_field('services');

    $style_title_underline          = $services['title_underline']; // bool
    $style_subtitle_underline       = $services['subtitle_underline']; // bool

    $service_list                   = $services['service_list']; // repeater
?>

<?php if ( $services ) : ?>

    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <h2 class="h2 text-center col-12 py-5 semi-bold-600 <?=$style_title_underline ? 'typo-space-line' : '' ?>">
                    <?php echo esc_html( $services['title'] ) ?>
                </h2>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                    <i class='bx bx-<?php echo esc_html( $services['icon'] ) ?> h3 mt-1'></i>
                </div>
                <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                    <h2 class="h3 pb-4 <?=$style_subtitle_underline ? 'typo-space-line' : '' ?>">
                        <?php echo esc_html( $services['subtitle'] ) ?>
                    </h2>
                </div>
            </div>
            <div class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
                <?php echo wp_kses( $services['paragraph'] , purplebuzz_allowed_html() ) ?>
            </div>
        </div>

        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="#" data-filter=".project">All</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".graphic">Graphics</a>
                    </li>
                    <li class="filter-btn nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".ui">UI/UX</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".branding">Branding</a>
                    </li>
                </ul>
            </div>
        </div>

    </section>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">

            <?php
            foreach ( $service_list as $service_item ) :
                $classes = $service_item['category'];
                $image = wp_get_attachment_image_src( $service_item['image'], 'full' );
            ?>
            <!-- Start -->
            <div class="col-xl-3 col-md-4 col-sm-6 project <?php echo implode(' ', $classes ) ?>">
                <a href="<?php echo esc_url( $service_item['link'] ) ?>" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="service card-img" src="<?php echo $image[0]; ?>" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">
                                <?php echo esc_html( $service_item['label'] ) ?>
                            </span>
                            <p class="card-text">
                                <?php echo esc_html( $service_item['description'] ) ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End -->
            <?php endforeach; ?>

        </div>
    </section>
    <!-- End Service -->

<?php endif; ?>
