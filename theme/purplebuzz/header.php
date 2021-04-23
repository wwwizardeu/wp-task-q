<?php
/**
 * The header
 * @package purplebuzz
 */



?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/favicon.ico">

    <?php if ( post_password_required() && is_singular()) {
        echo '<meta name="robots" content="noindex,nofollow" />';
    } ?>

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <?php
        if ( class_exists('ACF') ) {
            $integrations = get_field( 'integrations', 'options' );
        }
    ?>

    <?php if ( !empty( $integrations['head'] ) ): ?>
        <?php echo $integrations['head']; ?>
    <?php endif; ?>

</head>

<body <?php body_class(); ?>>

    <?php if ( !empty( $integrations['body'] ) ):?>
        <?php echo $integrations['body'];?>
    <?php endif;?>

    <?php wp_body_open(); ?>

<!-- Header -->
<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand h1" href="<?php echo get_home_url() ?>">
            <i class='bx bx-buildings bx-sm text-dark'></i>
            <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
            <div class="flex-fill mx-xl-5 mb-2">

                <?php
                wp_nav_menu(
                    array(
                        "fallback_cb"       => false,
                        "menu_class"        => "nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark",
                        "theme_location"    => "purplebuzz-primary-menu",
                        "walker"            => new Custom_Menu_Walker,
                    )
                );
                ?>

            </div>
            <div class="navbar align-self-center d-flex">
                <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                <a class="nav-link" href="#"><i class='bx bx-cog bx-sm text-primary'></i></a>
                <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- /Header -->
