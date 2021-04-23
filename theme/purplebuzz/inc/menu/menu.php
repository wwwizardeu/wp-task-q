<?php
/**
 * Modify wp_nav_menu output
 *
 * @package purplebuzz
 */

class Custom_Menu_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $get_classes = $item->classes;
        $set_classes = array();
        $page = $item->object_id;
        $page_id = get_queried_object_id();

        array_push( $set_classes, 'nav-item' );

        $output .= $indent . '<li class="' . implode(" ", $set_classes) .'">';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';

        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $link_classes = array();

        array_push($link_classes, 'nav-link btn-outline-primary rounded-pill px-3');

        $item_output .= '<a'. $attributes .' class="' . implode(" ", $link_classes) . '">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}


class Footer_Menu_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $get_classes = $item->classes;
        $set_classes = array();
        $page = $item->object_id;
        $page_id = get_queried_object_id();

        array_push( $set_classes, 'pb-2' );

        $output .= $indent . '<li class="' . implode(" ", $set_classes) .'">';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';

        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $link_classes = array();

        array_push($link_classes, 'text-decoration-none text-light');

        $item_output .= '<i class="bx-fw bx bxs-chevron-right bx-xs"></i>';
        $item_output .= '<a'. $attributes .' class="' . implode(" ", $link_classes) . '">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}
