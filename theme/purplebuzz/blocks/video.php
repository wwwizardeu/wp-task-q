<?php
    $video = get_content_block_field('video');
    $video_source = purplebuzz_convert_youtube( $video['video_source'] );
    $anchor_id    = get_sub_field( 'anchor_id' );
?>

<?php if ( $video_source ) : ?>
    <section class="u-py-8 u-relative">
        <div class="o-wrap">
            <div class="o-row">
                <div class="o-col-12">
                    <?php if ( !empty( $video_source ) ) : ?>
                        <div class="c-embed">
                            <iframe width="100%" height="auto" src="<?php echo esc_url( $video_source );?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
