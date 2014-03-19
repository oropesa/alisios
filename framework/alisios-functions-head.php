<?php
class AlisiosFunctionsHead {

    /*
     * LESS
     * Load style.css or less.css, depend of var ALISIOS_USE_LESS
     */
    public static function enqueue_stylesheet() {
        if(ALISIOS_USE_LESS) {
            wp_enqueue_style('alisios-style', ALISIOS_URL_THEME  . '/style.less');
            wp_enqueue_script('alisios-less', ALISIOS_URL_JS_LIB . '/less.min.js');
        } else {
            wp_enqueue_style('alisios-style', ALISIOS_URL_STYLE );
        }

    }

    /*
     *
     */
    public static function enqueue_scripts_and_stylesheet() {
        //enqueue style
        self::enqueue_stylesheet();
        //enqueue js
        wp_enqueue_script('bootstrap-js', ALISIOS_URL_JS_LIB . '/bootstrap.min.js', array('jquery'), '3.1.1', true );
    }

    /*
     * LESS
     * Rebuild link stylesheet to less format in wp_enqueue_styles
     */
    public static function wp_enqueue_styles_less($tag, $handle) {
        global $wp_styles;
        $match_pattern = '/\.less$/U';
        if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
            $handle = $wp_styles->registered[$handle]->handle;
            $media = $wp_styles->registered[$handle]->args;
            $href = empty($wp_styles->registered[$handle]->ver) ? $wp_styles->registered[$handle]->src : $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
            $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

            $tag = "<link rel='stylesheet/less' id='".$handle."' ".$title." href='".$href."' type='text/css' media='".$media."' />";
        }
        return $tag;
    }
}