<?php
class AlisiosFunctionsHead {

    /**
     * Filter
     * Creates a nicely formatted and more specific title element text
     * for output in head of document, based on current view. Twenty Twelve 1.0
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string Filtered title.
     */
    public static function wp_title( $title, $sep ) {
        global $paged, $page;

        if ( is_feed() )
            return $title;

        // Add the site name.
        $title .= get_bloginfo( 'name' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title .= " $sep $site_description";

        // Add a page number if necessary.
        if ( $paged >= 2 || $page >= 2 )
            $title .= " $sep " . sprintf( __( 'Page %s', ALISIOS_I18N ), max( $paged, $page ) );

        return $title;
    }

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
     * Load JS and CSS libraries (JS on the bottom)
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