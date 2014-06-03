<?php
class AlisiosFrontHead {

    /**
     * Doctype HTML5
     */
    public static function doctype() {
        echo "<!doctype html>" . "\n";
    }

    /**
     * Metas on the top of title
     */
    public static function metas_top() {

        // WP Charset
        echo '<meta charset="' . get_bloginfo( 'charset' ) . '">' . "\n";

        // Mobile viewport optimized
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";

        // Always force latest IE rendering engine (even in intranet) & Chrome Frame
        echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';

    }

    /**
     * Filter
     * Creates a nicely formatted and more specific title element text
     * for output in head of document, based on current view. Twenty Twelve 1.0
     */
    public static function wp_title( $title, $sep ) {
        global $paged, $page;

        if ( is_feed() )
            return $title;

        // Set decent title for taxonomy pages
        if( is_tag() )
            $title = apply_filters('alisios_title_tag', __('Tag: ', ALISIOS_I18N)) . $title;
        elseif( is_category() )
            $title = apply_filters('alisios_title_category', __('Category: ', ALISIOS_I18N)) . $title;

        // Add the site name.
        $title .= get_bloginfo( 'name' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title .= " $sep $site_description";

        // Add a page number if necessary.
        if ( $paged >= 2 || $page >= 2 )
            $title .= " $sep " . sprintf( __( 'Page %s', ALISIOS_I18N ), max( $paged, $page ) );

        // Max Length, 70 characters
        if( strlen($title) > 70 )
            $title = substr($title, 0, 70);

        return $title;
    }

    /*
     * Description Filter
     */
    public static function description( $description ) {

        // Set decent description
        if( is_single() ) {
            if( has_excerpt() )
                $description = get_the_excerpt();
        }
        elseif( is_search() ) {
            $description = __('Search results in ', ALISIOS_I18N) . get_bloginfo('name') . ': ' . get_search_query();
        }
        elseif( is_category() ) {
            $description = wp_strip_all_tags(category_description());
        }
        elseif( is_tag() ) {
            $description = wp_strip_all_tags(tag_description());
        }
        elseif( is_attachment() ) {
            $description = get_the_content();
        }
        elseif( is_author() ) {
            $description = get_the_author_meta('description');
        }

        if( empty($description) )
            $description = get_bloginfo('description');

        // Max Length, 155 characters
        if( strlen($description) > 155 )
            $description = substr($description, 0, 155);

        return $description;
    }

    /**
     * Canonical Link template
     */
    public static function canonical() {
        $canonical = AlisiosFrontSocial::canonical();
        //print
        if ( is_string($canonical) && !empty($canonical) ) {
            echo '<link rel="canonical" href="' . esc_url( $canonical, null, 'other' ) . '" />' . "\n";
        }
    }

    /*
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
     * Load JS (on the bottom) and CSS libraries (on the head)
     */
    public static function enqueue_scripts_and_stylesheet() {
        //enqueue style
        self::enqueue_stylesheet();
        //enqueue js
        wp_enqueue_script('bootstrap-js', ALISIOS_URL_JS_LIB . '/bootstrap.min.js', array('jquery'), '3.1.1', true );
    }

    /*
     * Filter
     * Rebuild link stylesheet to LESS format in wp_enqueue_styles
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

/*
 * Description template
 */
function alisios_description( $display = true ) {
    $description = apply_filters('alisios_description', get_bloginfo('description'));
    if( $display && !empty($description) )
        echo '<meta name="description" content="' . $description . '">';
    else
        return $description;
}