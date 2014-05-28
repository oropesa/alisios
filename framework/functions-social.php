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
            array_push($socialTags, '<meta property="og:url" content="' . AlisiosFunctionsHead::canonical(false) .'">');
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
}

function alisios_social_image() {

    $socialOptions = get_option('alisios_social', []);
    $socialImage = isset($socialOptions['opengraph_default_image']) ? $socialOptions['opengraph_default_image'] : '';

    return apply_filters('alisios_social_default_image', $socialImage);
}