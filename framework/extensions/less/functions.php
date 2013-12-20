<?php
class AlisiosLess {

    /*
     * Hook
     * Add in wp_head our style.css/less
     */
    public static function add_stylesheet() {
        /**
         * @var bool
         * When it's true, style.less is load. If not, load style.css
         */
        $useLess = true;

        if( !$useLess ) {
            wp_enqueue_style( 'alisios-style', get_stylesheet_uri() );
        } else {
            wp_enqueue_style( 'alisios-style', get_template_directory_uri() . '/style.less' );
            wp_enqueue_script( 'alisios-less', get_template_directory_uri() . '/framework/extensions/less/less.min.js');
        }

    }

    /*
     * Filter
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