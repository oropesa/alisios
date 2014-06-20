<?php
class AlisiosAdmin {

    /*
     * TEMPLATES
     */

    /**
     * checkbox input field template
     */
    public static function checkbox($var, $label, $option, $is_label_left = false, $desc = '') {
        $options = get_option($option);
        $val = (isset($options[$var]) && $options[$var] != false) ? 'on' : false;

        $output_label = '<label ' . ($is_label_left !== false ? 'class="checkbox" ' : '') . 'for="' . esc_attr($var) . '">' . $label . '</label>';

        $output_input = '<input class="checkbox" type="checkbox" id="' . esc_attr($var) . '" name="' . esc_attr($option) . '[' . esc_attr($var) . ']" value="on"' . checked($val, 'on', false) . '/>';

        $output_desc = !empty($desc) ? '<p>' . $desc . '</p>' : '';

        if($is_label_left) {
            $output = $output_label . $output_input;
        } else {
            $output = $output_input . $output_label;
        }

        print $output . $output_desc;
    }

    /**
     * Text input field template
     */
    public static function textinput($var, $label, $option, $placeholder = '', $is_addon = false, $is_addon_left = false, $extra = '') {
        $options = get_option($option);
        $val     = (isset($options[$var])) ? $options[$var] : '';

        if(!empty($placeholder)) {
            $placeholder = 'placeholder="' . esc_attr($placeholder) . '"';
        }

        $class = $is_addon ? ' addon' : '';

        $output_label = '<label class="textinput' . $class . '" for="' . esc_attr($var) . '">' . $label . '</label>';
        $output_label = !$is_addon ? '<p>' . $output_label . '</p>' : $output_label;

        $output_input = '<input class="textinput' . $class . '" type="text" id="' . esc_attr($var) . '" name="' . esc_attr($option) . '[' . esc_attr($var) . ']" value="' . esc_attr($val) . '" ' . $placeholder . '/>';

        $outputextra = !empty($extra) ? '<p>' . $extra . '</p>' : '';

        if($is_addon_left) {
            $output = $output_label . $output_input;
        } else {
            $output = $output_input . $output_label;
        }

        print $output . $outputextra;
    }

    /**
     * Select Box template
     */
    public static function select( $var, $label, $option, $values = array() ) {
        $options = get_option($option);

        $output_label = !empty($label) ? '<label class="select" for="' . esc_attr( $var ) . '">' . $label . ':</label>' : '';

        $output_input = '<select class="select" name="' . esc_attr( $option ) . '[' . esc_attr( $var ) . ']" id="' . esc_attr( $var ) . '">';
        foreach($values as $value => $label) {
            if(!empty($label))
                $output_input .= '<option value="' . esc_attr( $value ) . '"' . selected( $options[$var], $value, false ) . '>' . $label . '</option>';
        }
        $output_input .= '</select>';

        print $output_label . $output_input;
    }
}