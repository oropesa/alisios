<?php
class AlisiosFunctionsSocial {

    /*
     * Social Tags
     */
    public static function social_tags() {
        $socialOptions = get_option('alisios_social', []);

        //Not configure
        if( empty($socialOptions) )
            return;

        //Not Enable any social
        if( empty($socialOptions['use_googleplus'])
            && empty($socialOptions['use_twitter'])
            && empty($socialOptions['use_facebook']))
            return;

        $socialTags = array();

        $socialTitle        = wp_title( '/', false, 'right' );
        $socialDescription  = alisios_description(false);
        $socialImage        = alisios_social_image();

        // GOOGLE+

        // Google+ Publisher
        if( $publisher = $socialOptions['googleplus_publisher'] ) :
            array_push($socialTags, '<link rel="publisher" href="' . $publisher . '"/>');
        endif;

        //Google+ Author
        if ( $author = $socialOptions['googleplus_author'] ) :
            array_push($socialTags, '<link rel="author" href="' . $author . '"/>');
        endif;

        //Google Schema
        if( $socialOptions['use_googleplus'] === 'on' ) :
            //Title
            array_push($socialTags, '<meta itemprop="name" content="' . $socialTitle .'">');
            //Description
            if( !empty($socialDescription) )
                array_push($socialTags, '<meta itemprop="description" content="' . $socialDescription . '"> ');
            //Image
            if( !empty($socialImage) )
                array_push($socialTags, '<meta itemprop="image" content="' . $socialImage . '">');
        endif;

        // TWITTER
        if( $socialOptions['use_twitter'] === 'on' ) :
            //Card
            if( $card = $socialOptions['twitter_card_type'] )
                array_push($socialTags, '<meta name="twitter:card" content="' . $card .'">');
            //Site username
            if( $site = $socialOptions['twitter_site_username'] )
                array_push($socialTags, '<meta name="twitter:site" content="' . $site .'">');
            //Title
            array_push($socialTags, '<meta name="twitter:title" content="' . $socialTitle .'">');
            //Description
            if( !empty($socialDescription) )
                array_push($socialTags, '<meta name="twitter:description" content="' . $socialDescription .'">');
            //Creator
            if( $site = $socialOptions['twitter_site_username'] )
                array_push($socialTags, '<meta name="twitter:creator" content="' . $site .'">');
            //Image
            if( !empty($socialImage) )
                array_push($socialTags, '<meta name="twitter:image:src" content="' . $socialImage .'">');
            //Domain
            array_push($socialTags, '<meta name="twitter:domain" content="' . get_bloginfo('wpurl') .'">');
        endif;

        // FACEBOOK
        if( $socialOptions['use_facebook'] === 'on' ) :
            //Title
            array_push($socialTags, '<meta property="og:title" content="' . $socialTitle .'">');
            //Type
            if( $type = is_single() ? 'article' : 'website')
                array_push($socialTags, '<meta property="og:type" content="' . $type .'">');
            //URL
            array_push($socialTags, '<meta property="og:url" content="' . self::canonical() .'">');
            //Image
            if( !empty($socialImage) )
                array_push($socialTags, '<meta property="og:image" content="' . $socialImage .'">');
            //Description
            if( !empty($socialDescription) )
                array_push($socialTags, '<meta property="og:description" content="' . $socialDescription .'">');
            //Site Name
            array_push($socialTags, '<meta property="og:site_name" content="' . get_bloginfo('name') .'">');
            //Locale
            array_push($socialTags, '<meta property="og:locale" content="' . get_locale() .'">');
            //FB App ID
            if( $appid = $socialOptions['facebook_app_id'] )
                array_push($socialTags, '<meta property="fb:app_id" content="' . $appid .'">');
            //Publisher
            if( $publisher = $socialOptions['facebook_publisher'] )
                array_push($socialTags, '<meta property="article:publisher" content="' . $publisher .'">');
            //Is Article
            if( $type === 'article' ) {
                //Author
                if( $author = $socialOptions['facebook_author'] )
                    array_push($socialTags, '<meta property="article:author" content="' . $author .'">');
                //Published Time
                array_push($socialTags, '<meta property="article:published_time" content="' . get_post_time() .'">');
                //Modified Time
                array_push($socialTags, '<meta property="article:modified_time" content="' . get_the_modified_time('U') .'">');
                //Section
                if( $categories = get_the_category() )
                    foreach($categories as $category)
                        array_push($socialTags, '<meta property="article:section" content="' . $category->name .'">');
                //Tag
                if( $tags = get_the_tags() )
                    foreach($tags as $tag)
                        array_push($socialTags, '<meta property="article:tag" content="' . $tag->name .'">');
            }
        endif;

        //Print
        echo '<!-- Alisios Social -->' . "\n";
        foreach($socialTags as $socialTag) {
            echo $socialTag . "\n";
        }
        echo '<!-- /Alisios Social -->' . "\n";
    }

    /*
     * Social Image
     */
    public static function social_image( $image ) {
        //Maybe Thumbnail
        //Maybe Attachment
        return $image;
    }

    /**
     * Canonical Link
     */
    public static function canonical() {
        $canonical = false;
        // Set decent canonicals for homepage, singulars and taxonomy pages
        if( is_singular() ) {
            $obj       = get_queried_object();
            $canonical = get_permalink( $obj->ID );
        }
        elseif( is_search() ) {
            $canonical = get_search_link();
        }
        elseif( is_front_page() ) {
            $canonical = home_url( '/' );
        }
        elseif( is_home() && 'page' == get_option('show_on_front') ) {
            $canonical = get_permalink(get_option('page_for_posts'));
        }
        elseif( is_tax() || is_tag() || is_category() ) {
            $term = get_queried_object();
            $canonical = get_term_link($term, $term->taxonomy);
        }
        elseif( is_post_type_archive() ) {
            $post_type = get_query_var('post_type');
            if( is_array($post_type) ) {
                $post_type = reset( $post_type );
            }
            $canonical = get_post_type_archive_link( $post_type );
        }
        elseif( is_author() ) {
            $canonical = get_author_posts_url( get_query_var('author'), get_query_var('author_name') );
        }
        elseif( is_archive() ) {
            if( is_date() ) {
                if( is_day() ) {
                    $canonical = get_day_link( get_query_var('year'), get_query_var('monthnum'), get_query_var('day') );
                }
                elseif( is_month() ) {
                    $canonical = get_month_link( get_query_var('year'), get_query_var('monthnum') );
                } elseif( is_year() ) {
                    $canonical = get_year_link( get_query_var('year') );
                }
            }
        }

        //avoid pagination
        if( $canonical && get_query_var('paged') > 1 ) {
            global $wp_rewrite;
            if( !$wp_rewrite->using_permalinks() ) {
                $canonical = add_query_arg( 'paged', get_query_var('paged'), $canonical );
            }
            else {
                if( is_front_page() ) {
                    $base      = $wp_rewrite->using_index_permalinks() ? 'index.php/' : '/';
                    $canonical = home_url( $base );
                }
                $canonical = user_trailingslashit( trailingslashit($canonical) . trailingslashit($wp_rewrite->pagination_base) . get_query_var('paged') );
            }
        }

        //filter
        $canonical = apply_filters( 'alisios_link_canonical', $canonical );

        return $canonical;
    }
}

function alisios_social_image() {

    $socialOptions = get_option('alisios_social', []);
    $socialImage = isset($socialOptions['opengraph_default_image']) ? $socialOptions['opengraph_default_image'] : '';

    return apply_filters('alisios_social_default_image', $socialImage);
}