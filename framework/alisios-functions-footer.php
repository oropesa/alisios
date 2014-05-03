<?php

class AlisiosFunctionsFooter {


    public static function credits() {
        ?>
        <div class="credits col-xs-12 col-sm-12">
            <p>&copy; 2013 <a href="<?php bloginfo('url'); ?>" title="Alisios">Alisios</a>.</p>
        </div>
        <?php
    }

    public static function widget() {
        ?>
        <div class="footer-widgets col-xs-12 col-sm-12">
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