<?php
    $visual_editor = get_content_block_field('visual_editor');
    $anchor_id    = get_sub_field( 'anchor_id' );
?>

<?php if ( $visual_editor ) : ?>
<section id="<?php echo esc_attr( $anchor_id );?>" class="u-mt-4">
    <div class="o-wrap">

        <div class="c-entry">
            <?php echo $visual_editor['visual_editor'] ?>
        </div>

    </div>
</section>
<?php endif; ?>

