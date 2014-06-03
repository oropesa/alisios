<?php

class AlisiosFrontFooter {

    /*
     * Credit template
     */
    public static function credits() {
        ?>
        <div <?php footer_class('credits'); ?>>
            <p>&copy; 2013 <a href="<?php bloginfo('url'); ?>" title="Alisios">Alisios</a>.</p>
        </div>
        <?php
    }

    /*
     * Widgets template
     */
    public static function widget() {
        ?>
        <div <?php footer_class('footer-widgets'); ?>>
            <?php
            if( is_active_sidebar('footer-sidebar-1')
                || is_active_sidebar('footer-sidebar-2')
                || is_active_sidebar('footer-sidebar-3') ) {
                ?>

                <div class="footer-sidebar col-xs-12 col-sm-4">
                    <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                </div>

                <div class="footer-sidebar col-xs-12 col-sm-4">
                    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                </div>

                <div class="footer-sidebar col-xs-12 col-sm-4">
                    <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                </div>

            <?php
            }
            ?>
        </div>
        <?php
    }

}

/**
 * Display the classes for the sidebar element.
 */
function footer_class( $class = '' ) {
    // Separates classes with a single space, collates classes for body element
    echo 'class="' . join(' ', get_footer_class( $class )) . '"';
}

function get_footer_class( $class = '' ) {
    $classes = array();

    $classes[] = 'footer';
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

    return apply_filters( 'footer_class', $classes, $class );
}