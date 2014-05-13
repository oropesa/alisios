<?php
class AlisiosFunctionsHead {

    /**
     * Doctype HTML5
     */
    public static function doctype() {
        ?>
        <!doctype html>
    <?php
    }

    /**
     * Metas on the top of title
     */
    public static function metas_top() {
        ?>
        <?php // WP Charset ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">

        <?php // Mobile viewport optimized ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php // Always force latest IE rendering engine (even in intranet) & Chrome Frame ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php
    }

    /**
     * Canonical Link
     */
    public static function canonical() {
        $canonical = false;
        // Set decent canonicals for homepage, singulars and taxonomy pages
        if(is_singular()) {
            $obj       = get_queried_object();
            $canonical = get_permalink( $obj->ID );
        }
        elseif(is_search()) {
            $canonical = get_search_link();
        }
        elseif(is_front_page()) {
            $canonical = home_url( '/' );
        }
        elseif(is_home() && 'page' == get_option('show_on_front')) {
            $canonical = get_permalink(get_option('page_for_posts'));
        }
        elseif(is_tax() || is_tag() || is_category()) {
            $term = get_queried_object();
            $canonical = get_term_link($term, $term->taxonomy);
        }
        elseif(is_post_type_archive()) {
            $post_type = get_query_var('post_type');
            if(is_array($post_type)) {
                $post_type = reset( $post_type );
            }
            $canonical = get_post_type_archive_link($post_type);
        }
        elseif(is_author()) {
            $canonical = get_author_posts_url(get_query_var('author'), get_query_var('author_name'));
        }
        elseif(is_archive()) {
            if(is_date()) {
                if(is_day()) {
                    $canonical = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
                }
                elseif(is_month()) {
                    $canonical = get_month_link(get_query_var('year'), get_query_var('monthnum'));
                } elseif(is_year()) {
                    $canonical = get_year_link(get_query_var('year'));
                }
            }
        }

        //avoid pagination
        if($canonical && get_query_var('paged') > 1) {
            global $wp_rewrite;
            if(!$wp_rewrite->using_permalinks()) {
                $canonical = add_query_arg('paged', get_query_var('paged'), $canonical);
            }
            else {
                if(is_front_page()) {
                    $base      = $wp_rewrite->using_index_permalinks() ? 'index.php/' : '/';
                    $canonical = home_url($base);
                }
                $canonical = user_trailingslashit(trailingslashit($canonical) . trailingslashit($wp_rewrite->pagination_base) . get_query_var('paged'));
            }
        }

        //filter
        $canonical = apply_filters( 'alisios_link_canonical', $canonical );

        //print
        if ( is_string( $canonical ) && $canonical !== '' ) {
            echo '<link rel="canonical" href="' . esc_url( $canonical, null, 'other' ) . '" />' . "\n";
        }
    }

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