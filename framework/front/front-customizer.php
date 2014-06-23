<?php
class AlisiosFrontCustomizer {

    /* This will output the custom WordPress settings to the theme's WP head.
     */
    public static function render() {
        ?>
        <!-- BEG Customizer CSS-->
        <style type="text/css"><?php AlisiosHooks::customizer_render(); ?></style>
        <!-- END Customizer CSS-->
        <?php
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * A custom helper function used within this class to keep code clean.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS property to modify
     * @param string $mod_name The name of the theme_mod option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     */
    public static function generate_css($selector,$style,$mod_name,$prefix='',$postfix='',$echo=true) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if( empty($mod) )
            $mod = $mod_name;

        $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
        );

        if( $echo )
            echo $return;

        return $return;
    }

    /**
     * This will generate a line of CSS for use in header output as self::generate_css, but this is specifically by bg-image
     */
    public static function generate_css_background_image($selector,$mod_name,$mod_x='',$mod_y='',$mod_align='',$echo=true) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if( empty($mod) )
            $mod = $mod_name;

        $repeatX    = get_theme_mod($mod_x);
        $repeatY    = get_theme_mod($mod_y);
        $align      = get_theme_mod($mod_align);

        $extras = 'background-repeat: no-repeat;';
        if(!empty($repeatX) && !empty($repeatY))
            $extras = 'background-repeat: repeat;';
        elseif(!empty($repeatX))
            $extras = 'background-repeat: repeat-x;';
        elseif(!empty($repeatY))
            $extras = 'background-repeat: repeat-y;';

        if(!empty($align))
            $extras .= 'background-position: center top;';

        $return = sprintf('%s { %s:%s; %s }',
            $selector,
            'background-image',
            'url("' . $mod . '")',
            $extras
        );

        if( $echo )
            echo $return;

        return $return;
    }

    public static function hex2rgba($mod_name, $a) {
        $hex = get_theme_mod($mod_name);
        $hex = str_replace('#', '', $hex);

        if(strlen($hex) == 3) {
            $r = hexdec( substr($hex,0,1) . substr($hex,0,1) );
            $g = hexdec( substr($hex,1,1) . substr($hex,1,1) );
            $b = hexdec( substr($hex,2,1) . substr($hex,2,1) );
        } else {
            $r = hexdec( substr($hex,0,2) );
            $g = hexdec( substr($hex,2,2) );
            $b = hexdec( substr($hex,4,2) );
        }
        $rgba = 'rgba('.$r.', '.$g.', '.$b.', '.$a.')';
        return $rgba;
    }
}