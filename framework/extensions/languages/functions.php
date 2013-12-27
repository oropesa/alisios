<?php
class AlisiosLanguage {
    /*
     * Hook
     * Add in wp_fotter our bootstrap.min.js
     */
    public static function load_i18n() {
        load_theme_textdomain( 'alisios', get_template_directory() . '/languages' );
    }
}