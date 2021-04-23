<?php

/**
 * ACF.
 *
 * @package purplebuzz
 */

function purplebuzz_locate_content_block_template_part( $path ) {
    return str_replace( array( '[block]-', '(', ')', '--' ) , array( '', '', '', '-' ), $path );
}
add_filter( 'acb_content_block_get_template_part', 'purplebuzz_locate_content_block_template_part' );


function purplebuzz_fix_content_block_name( $name ) {
    return str_replace( '[BLOCK] ', '', $name );
}
add_filter( 'acb_content_block_title', 'purplebuzz_fix_content_block_name' );

function purplebuzz_get_background_classes( $background = null ){
    $classes = [];

    if ( !empty( $background['background_color'] ) ) {
        array_push( $classes, 'u-bg-' . $background['background_color'] );

    }

    return $classes;
}

function purplebuzz_get_text_color( $background = null ){
    $classes = [];

    if ( !empty( $background['background_text_color'] ) ) {
        array_push( $classes, 'u-text-' . $background['background_text_color'] );
    }

    return $classes;
}

function purplebuzz_render_background( $background = null, $echo = true ){
    $html = '';
    $overlay = '';

    if( !empty( $background['background_overlay'] ) ){
        $overlay = '<div class="c-background__overlay c-background__overlay--'.$background['background_overlay'].' u-bg-base"></div>';
    }

    if( !empty( $background['background_type']  ) ){
        if ( $background['background_type'] === 'image' && !empty( $background['background_image'] ) ) {
            $html = '<div class="c-background">
                        <img class="c-background__asset" src="'.esc_url( wp_get_attachment_image_url( $background['background_image'], '1400x700' ) ).'" data-object-fit="cover">
                        '.$overlay.'
                    </div>';
        } elseif( $background['background_type'] === 'video' && !empty( $background['background_video'] ) ) {
            $html = '<div class="c-background">
                        '.purplebuzz_render_video( $background['background_video'], 'c-background__asset', false ).'
                        '.$overlay.'
                    </div>';
        } elseif( $background['background_type'] === 'color' && !empty( $background['background_color'] ) ) {
            $html = '<div class="c-background '.implode( ' ', purplebuzz_get_background_classes( $background ) ).'"></div>';
        } else {
            $html = "error";
        }
    }

    if ( $echo ) {
        echo $html;
    }
    return $html;
}


function purplebuzz_get_button_classes( $color = null, $style = null ){

    $classes = ['c-button'];

    if ( !empty( $color ) ) {
        array_push( $classes, 'c-button--' . $color );
    }

    if ( !empty( $style ) ) {
        array_push( $classes, 'c-button--' . $style );
    }

    return $classes;
}

function purplebuzz_render_button( $button, $classes='', $echo = true ) {
    $html = '';

    if ( $button ) {
        $button_classes = purplebuzz_get_button_classes( $button['button_color'], $button['button_style']);

        if ( !empty( $classes ) ) {
            array_push( $button_classes, $classes );
        }

        if ( !empty( $button['button_link'] ) ) {
            $html = purplebuzz_render_link( $button['button_link'], $classes = implode( ' ', $button_classes) , false );
        }
    }

    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
}

function purplebuzz_render_link( $link, $classes = '', $echo = true ){
    $html = '';
    $sprite = '';
    $link_classes = [];

    if ( $link ) {

        if ( $link['link_type'] === 'anchor' && $link['link_anchor'] !== '' ) {
            array_push( $link_classes, 'js-smooth-scroll' );
        }

        if ( $link['link_type'] === 'modal' && $link['link_modal'] ) {
            array_push( $link_classes, 'js-offcanvas-modal' );
        }

        if ( !empty( $link['link_icon'] && $link['link_icon'] !== 'none') ) {
            $sprite = sprite( $link['link_icon'], '', false );
        }

        if ( !empty( $classes ) ) {
            array_push( $link_classes, $classes);
        }

        if (
            !empty( $link['link_label'] ) ||
            (
                !empty( $link['link_icon'] ) &&
                $link['link_icon'] !== 'none'
            )
        ) {
            $html = '
                <a '.purplebuzz_render_link_data( $link, false ).' href="'.purplebuzz_render_link_url( $link, false ).'" class="'.implode( ' ',$link_classes ).'" '.purplebuzz_render_link_target( $link, false ).'>
                    '.purplebuzz_render_link_label( $link, false ).' '.$sprite.'
                </a>
            ';
        }
    }

    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
}

function purplebuzz_render_link_data( $link, $echo = true ){
    $html = [];
    $link_data = [];

    if ( $link ) {
        if ( !empty( $link['link_target_contains_form'] ) && !empty( $link['link_target_form_custom_fields'] ) ) {
            foreach ( $link['link_target_form_custom_fields'] as $field => $value[] ) {
                $link_data['link_target_form_custom_fields'] = $value;
            }
        }
    }

    foreach ( $link_data as $key => $value ){
        array_push( $html , "data-".$key."='".json_encode( $value )."'" );
    }

    if ( $echo ) {
        echo implode( ' ', $html );
    } else {
        return implode( ' ', $html );
    }
}

function purplebuzz_render_link_url( $link, $echo = true ){
    $link_url = '';

    if ( $link ) {
        if ( $link['link_type'] === 'url' && !empty( $link['link_url'] ) ) {
            $link_url = $link['link_url'];
        } elseif ( $link['link_type'] === 'file' && !empty( $link['link_file'] ) ) {
            $link_url = wp_get_attachment_url($link['link_file']);
        } elseif ( $link['link_type'] === 'anchor' && !empty( $link['link_anchor'] ) ) {
            $link_url = $link['link_anchor'];
        } elseif ( $link['link_type'] === 'modal' && !empty( $link['link_modal'] ) ) {
            purplebuzz_Modal_Handler::enqueue( $link['link_modal'] );
            $link_url = '#'.get_post_field( 'post_name', $link['link_modal'] ) ;
        } elseif ( $link['link_type'] === 'internal' && !empty( $link['link_internal'] ) ) {
            $link_url = get_permalink( $link['link_internal'] ) ;
        }
    }

    if ( $echo ) {
        echo esc_url( $link_url );
    } else {
        return $link_url;
    }
}

function purplebuzz_render_link_label( $link, $echo = true ){
    $link_label = '';

    if ( $link ){
        if ( !empty( $link['link_label'] ) ) {
            $link_label = $link['link_label'];
        }
    }
    if ( $echo ) {
        echo esc_html( $link_label );
    } else {
        return $link_label;
    }
}

function purplebuzz_render_link_target( $link, $echo = true ) {
    $link_target = '';

    if ( $link ) {
        if ( !empty( $link['link_blank'] ) ) {
            $link_target = 'target="_blank"';
        }
    }
    if ( $echo ) {
        echo esc_attr( $link_target );
    } else {
        return $link_target;
    }
}

function purplebuzz_render_video( $video, $classes = '', $echo = true) {
    $html = '';

    if ( $video ) {
        $video_poster        = !empty( $video['video_poster'] ) ? wp_get_attachment_image_src( $video['video_poster'], '1400x788' ) : '';
        $video_source         = !empty( $video['video_source'] ) ? wp_get_attachment_url( $video['video_source'] ) : '';
        $video_attributes    = !empty( $video['video_attributes'] ) ? implode( ' ', $video['video_attributes']): '';

        $html = '<video '.$video_attributes.' poster="'.$video_poster[0].'" class="'.$classes.'">
                    <source src="'.$video_source.'" type="video/mp4">
                </video>';
    }

    if ( $echo ) {
        echo $html;
    }

    return $html;
}
