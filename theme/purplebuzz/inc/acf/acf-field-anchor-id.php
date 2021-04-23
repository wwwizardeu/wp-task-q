<?php

/**
 * ACF.
 *
 * @package purplebuzz
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class acf_field_anchor_id extends acf_field {

    function initialize() {

        $this->name = 'anchor_id';
        $this->label = __( 'Anchor ID' );
        $this->defaults = array(
            'default_value' => '',
            'maxlength'     => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
        );

    }

    function render_field( $field ) {

        $html = '';

        $atts = array();
        $keys = array( 'type', 'id', 'class', 'name', 'value', 'placeholder', 'maxlength', 'pattern' );
        $keys2 = array( 'readonly', 'disabled' );

        if( $field['prepend'] !== '' ) {
            $field['class'] .= ' acf-is-prepended';
            $html .= '<div class="acf-input-prepend">' . acf_esc_html($field['prepend']) . '</div>';
        }

        if( $field['append'] !== '' ) {
            $field['class'] .= ' acf-is-appended';
            $html .= '<div class="acf-input-append">' . acf_esc_html($field['append']) . '</div>';
        }

        foreach( $keys as $k ) {
            if( isset($field[ $k ]) ) $atts[ $k ] = $field[ $k ];
        }

        foreach( $keys2 as $k ) {
            if( !empty($field[ $k ]) ) $atts[ $k ] = $k;
        }

        $atts['type'] = 'text';

        $html .= '<div class="acf-input-wrap">' . acf_get_text_input( $atts ) . '</div>';

        echo $html;

    }

    function render_field_settings( $field ) {

        acf_render_field_setting( $field, array(
            'label'         => __('Placeholder Text','acf'),
            'instructions'  => __('Appears within the input','acf'),
            'type'          => 'text',
            'name'          => 'placeholder',
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Prepend','acf'),
            'instructions'  => __('Appears before the input','acf'),
            'type'          => 'text',
            'name'          => 'prepend',
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Append','acf'),
            'instructions'  => __('Appears after the input','acf'),
            'type'          => 'text',
            'name'          => 'append',
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Character Limit','acf'),
            'instructions'  => __('Leave blank for no limit','acf'),
            'type'          => 'number',
            'name'          => 'maxlength',
        ));

    }

    public function update_value( $value, $post_id, $field ) {

        return sanitize_title( $value );

    }

}

acf_register_field_type( 'acf_field_anchor_id' );
