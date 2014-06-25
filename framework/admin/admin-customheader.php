<?php
class AlisiosAdminCustomizerHeader extends AlisiosAdminCustomizerTemplate {

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'headerBackground' => array(
                'id'        => 'headerBackground',
                'title'     => __('Header: Background', ALISIOS_I18N),
                'priority'  => 50
            ),
            'headerBrand' => array(
                'id'        => 'headerBrand',
                'title'     => __('Header: Brand', ALISIOS_I18N),
                'priority'  => 51
            ),
            'headerFormat' => array(
                'id'        => 'headerFormat',
                'title'     => __('Header: Format', ALISIOS_I18N),
                'priority'  => 52
            ),
        );

        $this->fields = array(

            //BACKGROUND

            'headerColor' => array(
                'id'        => 'custom_header_color',
                'label'     => __('Header Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'default'   => 'transparent',
            ),

            'repeatHeaderBackgroundX' => array(
                'id'        => 'repeat_custom_header_background_image_x',
                'label'     => __('Repeat background horizontally?', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'default'   => 'on',
            ),

            'repeatBackgroundY' => array(
                'id'        => 'repeat_custom_header_background_image_y',
                'label'     => __('Repeat background vertically?', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'default'   => 'on',
            ),

            'headerImageZone' => array(
                'id'        => 'custom_header_image_zone',
                'label'     => __('Zone of image: inside', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'default'   => '',
            ),

            'headerColorZone' => array(
                'id'        => 'custom_header_color_zone',
                'label'     => __('Zone of color: inside', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'default'   => '',
            ),

            'centerBackground' => array(
                'id'        => 'align_custom_header_background_image',
                'label'     => __('Position background image', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'radio-position',
                'choices'   => array(
                    'left top'      => '',
                    'center top'    => '',
                    'right top'     => '',
                    'left center'   => '',
                    'center center' => '',
                    'right center'  => '',
                    'left bottom'   => '',
                    'center bottom' => '',
                    'right bottom'  => '',
                ),
                'default' => 'center top'
            ),

            'headerHeight' => array(
                'id'        => 'custom_header_height',
                'label'     => __('Height of header', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'textaddon-px',
                'default'   => 'auto',
            ),

            'headerImage' => array(
                'id'        => 'custom_header_background_image',
                'label'     => __('Header Image', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'image',
                'default'   => '',
            ),

            //BRAND

            'headerBrandSource' => array(
                'id'        => 'brand-source',
                'label'     => __('Source', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'radio',
                'choices'   => array(
                    'none'      => __('None', ALISIOS_I18N),
                    'gravatar'  => __('Gravatar', ALISIOS_I18N),
                    'custom'    => __('Uploaded image', ALISIOS_I18N),
                ),
                'default' => 'none'
            ),

            'headerBrandImage' => array(
                'id'        => 'brand-image',
                'label'     => __('Brand Image', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'image',
                'default'   => '',
            ),

            'headerBrandWidth' => array(
                'id'        => 'brand-width',
                'label'     => __('Width of brand', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'textaddon-px',
                'default'   => '128',
            ),

            'headerBrandFormat' => array(
                'id'        => 'brand-format',
                'label'     => __('Format', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'radio',
                'choices'   => array(
                    'none'    => __('None', ALISIOS_I18N),
                    'rounded' => __('Rounded', ALISIOS_I18N),
                    'circle'  => __('Circle', ALISIOS_I18N),
                ),
                'default' => 'none'
            ),

            'headerBrandBordered' => array(
                'id'        => 'brand-bordered',
                'label'     => __('Bordered', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'radio',
                'choices'   => array(
                    'none'      => __('None', ALISIOS_I18N),
                    'lighten'   => __('Lighten', ALISIOS_I18N),
                    'darken'    => __('Darken', ALISIOS_I18N),
                ),
                'default' => 'none'
            ),

            //FORMAT

            'headerFormat' => array(
                'id'        => 'site-format',
                'label'     => __('Format', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'option'    => 'alisios_header_site',
                'type'      => 'radio',
                'choices'   => array(
                    'align-center'      => __('Center', ALISIOS_I18N),
                    'align-left'        => __('Left', ALISIOS_I18N),
                    'align-left-right'  => __('Left & Right', ALISIOS_I18N),
                    'align-right'       => __('Right', ALISIOS_I18N),
                    'align-right-left'  => __('Right & Left', ALISIOS_I18N),
                ),
                'default' => 'align-left'
            ),
        );
    }

    public function loadHooks() {

        //BACKGROUND

        add_filter('alisios_header_color', function($selector) {
            $mod = get_theme_mod('custom_header_color_zone');

            if( empty($mod) )
                return $selector;

            return '.site';
        });

        add_filter('alisios_header_image', function($selector) {
            $mod = get_theme_mod('custom_header_image_zone');

            if( empty($mod) )
                return $selector;

            return '.site';
        });

        //BRAND

        //FORMAT

        add_filter('site_class', function($existing_classes) {
            $siteOptions = get_option('alisios_header_site', array());

            if(empty($siteOptions) || empty($siteOptions['site-format']))
                return $existing_classes;

            $existing_classes[] = 'site-' . $siteOptions['site-format'];

            return $existing_classes;
        });
    }

    /* Prepare CSS output
     */
    public function render() {

        //BACKGROUND

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_header_color', $selectors = '.header' ),
            'background-color',
            'custom_header_color'
        );

        AlisiosFrontCustomizer::generate_css_background_image(
            apply_filters( 'alisios_header_image', $selectors = '.header' ),
            'custom_header_background_image',
            'repeat_custom_header_background_image_x',
            'repeat_custom_header_background_image_y',
            'align_custom_header_background_image'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_header_height', $selectors = '.header' ),
            'height',
            'custom_header_height',
            '',
            'px'
        );

        //BRAND

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_brand_width', $selectors = '.site-brand' ),
            'width',
            'alisios_header_site[brand-width]',
            '',
            'px'
        );

        //FORMAT
    }

    public static function brand() {
        $brandOptions = get_option('alisios_header_site', array());

        if(empty($brandOptions))
            return;

        if(isset($brandOptions['brand-source']) && $brandOptions['brand-source'] === 'none')
            return;

        $classes = '';

        switch($brandOptions['brand-format']) {
            case 'circle':
                $classes .= ' brand-circle';
                break;
            case 'rounded':
                $classes .= ' brand-rounded';
                break;
        }

        switch($brandOptions['brand-bordered']) {
            case 'lighten':
                $classes .= ' brand-light-bordered';
                break;
            case 'darken':
                $classes .= ' brand-dark-bordered';
                break;
        }

        $output =  '<div class="site-brand' . $classes . '">' . '<a href="' . get_bloginfo( 'home' ) . '">';

        if($brandOptions['brand-source'] === 'gravatar')
            $brand = get_avatar( apply_filters('alisios_header_gravatar_email', $email = esc_attr(get_option('admin_email'))), $brandOptions['brand-width'], '', esc_attr( get_bloginfo( 'name' ) ) );
        elseif($brandOptions['brand-source'] === 'custom' && !empty($brandOptions['brand-image']))
            $brand = '<img src="' . $brandOptions['brand-image'] . '" class="avatar avatar-custom photo" width="' . $brandOptions['brand-width'] .  '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
        else
            $brand = '';

        $output .= $brand . '</a>' . '</div>';

        echo $output;
    }
}