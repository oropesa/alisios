<?php
class AlisiosAdmin {

    /*
     * ENQUEUE ADMIN STYLE
     */
    public function admin_enqueue_style_and_script() {
        //less || css
        if(ALISIOS_USE_LESS) {
            wp_enqueue_style('alisios-style', ALISIOS_URL_LESS  . '/alisios-admin/alisios-admin.less');
            wp_enqueue_script('alisios-less', ALISIOS_URL_JS_LIB . '/less.min.js');
        } else {
            wp_enqueue_style('alisios_admin_style', ALISIOS_URL_CSS . '/alisios-admin.css');
        }

        //js
        wp_enqueue_script('alisios_admin_script', ALISIOS_URL_JS . '/alisios-admin.js', array('jquery'), false, true);
    }

    /**
     * Create a Checkbox input field.
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
     * Create a Text input field.
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
     * Create a Select Box.
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