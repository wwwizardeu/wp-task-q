<?php
    $test = get_content_block_field('test');
    $anchor_id    = get_sub_field( 'anchor_id' );
?>

<?php if ( $test ) : ?>
<section id="<?php echo esc_attr( $anchor_id );?>" class="u-mt-4">
    <div class="o-wrap">

        <div class="o-row">
            <div class="o-col-6@md">
                <h1><?php echo esc_html( $test['title'] ) ?></h1>
                <p><?php echo esc_html( $test['content'] ) ?></p>
            </div>
        </div>

        <?php purplebuzz_render_button( $test['button'] );?>

        <?php //var_dump($test)?>


        <div class="c-hero" style="min-height: 40vh; position: relative; background: green;">
            <?php purplebuzz_render_background( $test['background'] );?>
        </div>

    </div>
</section>
<?php endif; ?>

