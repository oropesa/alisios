<?php

class AlisiosFrontHeader {

    /*
     * Site Title & Description template
     */
    public static function site() {
        ?>
        <div class="site-header">

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>

            <h2 class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>

        </div>
        <?php
    }
}

/**
 * Display the classes for the site element.
 */
function site_class( $class = '' ) {
    // Separates classes with a single space, collates classes for body element
    echo 'class="' . join(' ', get_site_class( $class )) . '"';
}

function get_site_class( $class = '' ) {
    $classes = array();

    $classes[] = 'site';
    $classes[] = 'col-xs-12';
    $classes[] = 'col-sm-12';

    if(!empty($class)) {
        if(!is_array($class))
            $class = preg_split('#\s+#', $class);
        $classes = array_merge($classes, $class);
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );

    return apply_filters( 'site_class', $classes, $class );
}