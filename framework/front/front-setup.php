<?php

class AlisiosFrontSetup {

    /* LANGUAGES
     */
    public static function load_i18n() {
        load_theme_textdomain( ALISIOS_I18N, ALISIOS_DIR_THEME . '/languages' );
    }

}

/* Extra Functions
 */

function string2array($string) {
    $class = array();

    if(is_string($string))
        $class = preg_split('#[\s,]+#', $string);

    $class = array_map( 'esc_attr', $class );

    return $class;
}

function array_alisios_class($classes, $addClass, $removeClass) {
    //add
    $classes = array_merge($classes, string2array($addClass));
    //remove
    $classes = array_diff($classes, string2array($removeClass));

    return $classes;
}

function isset_get($array, $key, $default = null) {
    return isset($array[$key]) ? $array[$key] : $default;
}