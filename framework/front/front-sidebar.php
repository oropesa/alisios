<?php

class AlisiosFrontSidebar {

    /*
     * Setup (Front & Admin)
     */
    public static function register_sidebars() {
        // The Sidebar
        register_sidebar( array(
            'name'          => __('Sidebar', ALISIOS_I18N),
            'id'            => 'primary-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        // The Footer: 3 Columns
        register_sidebar( array(
            'name'          => __('Footer #1', ALISIOS_I18N),
            'id'            => 'footer-sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        register_sidebar( array(
            'name'          => __('Footer #2', ALISIOS_I18N),
            'id'            => 'footer-sidebar-2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        register_sidebar( array(
            'name'          => __('Footer #3', ALISIOS_I18N),
            'id'            => 'footer-sidebar-3',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );
    }
}

/**
 * Display the classes for the sidebar element.
 */
function sidebar_class( $class = '' ) {
    // Separates classes with a single space, collates classes for body element
    echo 'class="' . join(' ', get_sidebar_class( $class )) . '"';
}

function get_sidebar_class( $class = '' ) {
    $classes = array();

    $classes[] = 'sidebar';
    $classes[] = 'col-xs-12';
    $classes[] = 'col-sm-4';

    if(!empty($class)) {
        if(!is_array($class))
            $class = preg_split('#\s+#', $class);
        $classes = array_merge($classes, $class);
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );

    return apply_filters( 'sidebar_class', $classes, $class );
}