<?php
class AlisiosBootstrap {
    /*
     * Hook
     * Add in wp_fotter our bootstrap.min.js
     */
    public static function add_script() {
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/framework/extensions/bootstrap/bootstrap.min.js', array( 'jquery' ), '3.0.3', true );
    }
}