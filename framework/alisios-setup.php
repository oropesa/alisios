<?php

class AlisiosFrontSetup {

    /*
     * LANGUAGES
     */
    public static function load_i18n() {
        load_theme_textdomain( ALISIOS_I18N, ALISIOS_DIR_THEME . '/languages' );
    }

}