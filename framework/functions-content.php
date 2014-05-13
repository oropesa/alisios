<?php

class AlisiosFunctionsContent {


}

/**
 * Display the classes for the content element.
 */
function content_class( $class = '' ) {
    // Separates classes with a single space, collates classes for body element
    echo 'class="' . join(' ', get_content_class( $class )) . '"';
}

function get_content_class( $class = '' ) {
    $classes = array();

    $classes[] = 'content';
    $classes[] = 'col-xs-12';
    $classes[] = 'col-sm-8';

    if(!empty($class)) {
        if(!is_array($class))
            $class = preg_split('#\s+#', $class);
        $classes = array_merge($classes, $class);
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );

    return apply_filters( 'content_class', $classes, $class );
}