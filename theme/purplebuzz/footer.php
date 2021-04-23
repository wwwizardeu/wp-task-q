<?php
/**
 * The footer
 * @package purplebuzz
 */

$footer = get_field('footer', 'options');
$social = get_field('social', 'options');
$contact = $footer['contact'];

?>


<!-- Start Footer -->
<footer class="bg-secondary pt-4">
    <div class="container">
        <div class="row py-4">

            <div class="col-lg-3 col-12 align-left">
                <a class="navbar-brand" href="index.html">
                    <i class='bx bx-buildings bx-sm text-light'></i>
                    <span class="text-light h5">Purple</span> <span class="text-light h5 semi-bold-600">Buzz</span>
                </a>
                <p class="text-light my-lg-4 my-2">
                    <?php echo esc_html( $footer['description'] ) ?>
                </p>
                <ul class="list-inline footer-icons light-300">

                    <?php if ( $social['facebook'] ) { ?>
                    <li class="list-inline-item m-0">
                        <a class="text-light" target="_blank" href="<?php echo esc_url( $social['facebook'] ) ?>">
                            <i class='bx bxl-facebook-square bx-md'></i>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ( $social['linkedin'] ) { ?>
                    <li class="list-inline-item m-0">
                        <a class="text-light" target="_blank" href="<?php echo esc_url( $social['linkedin'] ) ?>">
                            <i class='bx bxl-linkedin-square bx-md'></i>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ( $social['whatsapp'] ) { ?>
                    <li class="list-inline-item m-0">
                        <a class="text-light" target="_blank" href="<?php echo esc_url( $social['whatsapp'] ) ?>">
                            <i class='bx bxl-whatsapp-square bx-md'></i>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ( $social['flickr'] ) { ?>
                    <li class="list-inline-item m-0">
                        <a class="text-light" target="_blank" href="<?php echo esc_url( $social['flickr'] ) ?>">
                            <i class='bx bxl-flickr-square bx-md'></i>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ( $social['medium'] ) { ?>
                    <li class="list-inline-item m-0">
                        <a class="text-light" target="_blank" href="<?php echo esc_url( $social['medium'] ) ?>">
                            <i class='bx bxl-medium-square bx-md' ></i>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                <h3 class="h4 pb-lg-3 text-light light-300"><?php _e('Our Company', 'purplebuzz') ?></h2>


                    <?php
                    wp_nav_menu(
                        array(
                            "fallback_cb"       => false,
                            "menu_class"        => "list-unstyled text-light light-300",
                            "theme_location"    => "purplebuzz-primary-menu",
                            "walker"            => new Footer_Menu_Walker,
                        )
                    );
                    ?>

            </div>

            <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                <h2 class="h4 pb-lg-3 text-light light-300"><?php _e('Our Works', 'purplebuzz') ?></h2>
                <?php
                wp_nav_menu(
                    array(
                        "fallback_cb"       => false,
                        "menu_class"        => "list-unstyled text-light light-300",
                        "theme_location"    => "purplebuzz-works-menu",
                        "walker"            => new Footer_Menu_Walker,
                    )
                );
                ?>
            </div>

            <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                <h2 class="h4 pb-lg-3 text-light light-300"><?php _e('For Client', 'purplebuzz') ?></h2>
                <ul class="list-unstyled text-light light-300">
                    <li class="pb-2">
                        <i class='bx-fw bx bx-phone bx-xs'></i>
                        <a class="text-decoration-none text-light py-1" href="tel:<?php echo esc_html( $contact['phone'] ) ?>">
                            <?php echo esc_html( $contact['phone'] ) ?>
                        </a>
                    </li>
                    <li class="pb-2">
                        <i class='bx-fw bx bx-mail-send bx-xs'></i>
                        <a class="text-decoration-none text-light py-1" href="mailto:<?php echo esc_html( $contact['email'] ) ?>">
                            <?php echo esc_html( $contact['email'] ) ?>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="w-100 bg-primary py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-lg-6 col-sm-12">
                    <p class="text-lg-start text-center text-light light-300">
                        <?php echo wp_kses( str_replace( array('{{YEAR}}', '{{SITE}}'), array( date("Y."), '<strong>' . get_bloginfo('name') . '</strong>'), $footer['copyright_notice'] ), purplebuzz_allowed_html() )?>
                    </p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <p class="text-lg-end text-center text-light light-300">
                        Designed by <a rel="sponsored" class="text-decoration-none text-light" href="https://templatemo.com/" target="_blank"><strong>TemplateMo</strong></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->


<?php wp_footer(); ?>

<?php
    if ( class_exists('ACF') ) {
        $integrations = get_field( 'integrations', 'options' );
    }
?>

<?php if ( !empty( $integrations['footer'] ) ):?>
    <?php echo $integrations['footer'];?>
<?php endif;?>

<script>
    $(window).load(function() {
        // init Isotope
        var $projects = $('.projects').isotope({
            itemSelector: '.project',
            layoutMode: 'fitRows'
        });
        $(".filter-btn").click(function() {
            var data_filter = $(this).attr("data-filter");
            $projects.isotope({
                filter: data_filter
            });
            $(".filter-btn").removeClass("active");
            $(".filter-btn").removeClass("shadow");
            $(this).addClass("active");
            $(this).addClass("shadow");
            return false;
        });
    });
</script>

</body>
</html>
