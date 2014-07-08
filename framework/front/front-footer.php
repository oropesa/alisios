<?php

class AlisiosFrontFooter {

    /*
     * Credit template
     */
    public static function credits() {
        ?>
        <div <?php footer_class( apply_filters('alisios_add_footer_credits', 'footer-credits'), apply_filters('alisios_remove_footer_credits', '')); ?>>
            <p><?php
                $footerOptions = get_option('alisios_footer', array());
                $creditsText = isset_get($footerOptions, 'footer-credits-text');

                $patterns = array(
                    "/%%site-url%%/",
                    "/%%site-name%%/"
                );

                $replaces = array(
                    get_bloginfo('home'),
                    get_bloginfo('name')
                );

                echo preg_replace($patterns, $replaces, $creditsText);
            ?></p>
        </div>
        <?php
    }

    /*
     * Widgets template
     */
    public static function widget() {
        ?>
        <div class="footer-widgets">

            <?php AlisiosHooks::sidebar_footer_content_before(); ?>

            <div class="footer-container container">

                <?php AlisiosHooks::sidebar_footer_content_top(); ?>

                <div <?php footer_class( apply_filters('alisios_add_footer_widgets', 'footer-widgets'), apply_filters('alisios_remove_footer_widgets', '')); ?>>
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
                </div><!-- ./footer-content -->

                <?php AlisiosHooks::sidebar_footer_content_bottom(); ?>

            </div><!-- ./footer-container -->

            <?php AlisiosHooks::sidebar_footer_content_after(); ?>

        </div><!-- ./footer-widgets -->
        <?php
    }

}

/**
 * Display the classes for the sidebar element.
 */
function footer_class($addClass = '', $removeClass = '') {
    // Separates classes with a single space, collates classes for body element
    echo 'class="' . join(' ', get_footer_class($addClass, $removeClass)) . '"';
}

function get_footer_class($addClass = '', $removeClass = '') {

    $classes[] = 'footer-content';
    $classes[] = 'col-xs-12';
    $classes[] = 'col-sm-12';

    $classes = apply_filters('footer_class', $classes);

    $classes = array_alisios_class($classes, $addClass, $removeClass);

    return $classes;
}