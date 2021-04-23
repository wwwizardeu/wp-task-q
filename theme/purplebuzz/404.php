<?php
/**
 * 404 page
 *
 * @package purplebuzz
 */

get_header(); ?>

<section id="404" class="o-wrap-fluid u-py-4 u-py-8@md">
    <div class="o-wrap u-py-8">
        <div class="o-row">
            <div class="o-col-10@md o-col-9@lg u-mx-auto u-text-center">

                <h5 class="u-font-base u-text-gray-5"><b>ERROR 404</b></h5>

                <h1 class="u-mb-4 u-font-extra-bold u-uppercase">
                    Page Not Found
                </h1>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-button c-button--primary">Take me home</a>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
