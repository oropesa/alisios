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

            //COLORS

            'headerColor' => array(
                'id'        => 'background-color',
                'label'     => __('Header Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_header_site',
                'default'   => 'transparent',
            ),

            'headerTitleColor' => array(
                'id'        => 'title-color',
                'label'     => __('Header Title Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_header_site',
                'default'   => '#272727',
            ),

            'headerDescriptionColor' => array(
                'id'        => 'description-color',
                'label'     => __('Header Description Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_header_site',
                'default'   => '#272727',
            ),

            //BACKGROUND

            'headerBackgroundRepeatX' => array(
                'id'        => 'header-background-image-repeat-x',
                'label'     => __('Repeat background image horizontally', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => 'on',
            ),

            'headerBackgroundRepeatY' => array(
                'id'        => 'header-background-image-repeat-y',
                'label'     => __('Repeat background image vertically', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => 'on',
            ),

            'headerBrackgroundImageZone' => array(
                'id'        => 'background-image-zone',
                'label'     => __('Zone of image: inside', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerColorZone' => array(
                'id'        => 'background-color-zone',
                'label'     => __('Zone of color: inside', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerBackgroundImage' => array(
                'id'        => 'header-background-image',
                'label'     => __('Background Image', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'image',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerBackgroundImageAlign' => array(
                'id'        => 'header-background-image-align',
                'label'     => __('Align of background image', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'radio-position',
                'option'    => 'alisios_header_site',
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

            'headerHide' => array(
                'id'        => 'hide-header',
                'label'     => __('Hide header', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerBrand' => array(
                'id'        => 'hide-header-brand',
                'label'     => __('Hide header brand', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerTitle' => array(
                'id'        => 'hide-header-title',
                'label'     => __('Hide header title', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerDescription' => array(
                'id'        => 'hide-header-description',
                'label'     => __('Hide header description', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_header_site',
                'default'   => '',
            ),

            'headerFormat' => array(
                'id'        => 'site-format',
                'label'     => __('Align', ALISIOS_I18N),
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

            'headerHeight' => array(
                'id'        => 'header-height',
                'label'     => __('Height of header', ALISIOS_I18N),
                'section'   => $this->sections['headerFormat']['id'],
                'type'      => 'textaddon-px',
                'option'    => 'alisios_header_site',
                'default'   => 'auto',
            ),

        );
    }

    public function loadHooks() {

        //BACKGROUND

        add_filter('alisios_site_background_color', function($selector) {
            $mod = get_alisios_option('alisios_header_site[background-color-zone]');

            if( empty($mod) )
                return $selector;

            return '.site';
        });

        add_filter('alisios_site_background_image', function($selector) {
            $mod = get_alisios_option('alisios_header_site[background-image-zone]');

            if( empty($mod) )
                return $selector;

            return '.site';
        });

        //BRAND

        //FORMAT

        add_filter('site_class', function($existing_classes) {
            $siteOptions = get_alisios_option('alisios_header_site', array());

            if(empty($siteOptions) || empty($siteOptions['site-format']))
                return $existing_classes;

            $existing_classes[] = 'site-' . $siteOptions['site-format'];

            return $existing_classes;
        });
    }

    /* Prepare CSS output
     */
    public function render() {

        //COLORS
        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_background_color', $selectors = '.header' ),
            'background-color',
            'alisios_header_site[background-color]'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_title_color', $selectors = '.site-header, .site-header a' ),
            'color',
            'alisios_header_site[title-color]'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_title_color', $selectors = '.site-description' ),
            'color',
            'alisios_header_site[description-color]'
        );

        //BACKGROUND

        AlisiosFrontCustomizer::generate_css_background_image(
            apply_filters( 'alisios_site_background_image', $selectors = '.header' ),
            'alisios_header_site[header-background-image]',
            'alisios_header_site[header-background-image-repeat-x]',
            'alisios_header_site[header-background-image-repeat-y]',
            'alisios_header_site[header-background-image-align]'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_header_height', $selectors = '.header' ),
            'height',
            'alisios_header_site[header-height]',
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
        $siteOptions = get_alisios_option('alisios_header_site', array());
        if(empty($siteOptions))
            return;

        if(!empty($siteOptions['hide-header']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_display', $selectors = '.header' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['hide-header-brand']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_brand_display', $selectors = '.site-brand' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['hide-header-title']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_title_display', $selectors = '.site-title' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['hide-header-description']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_description_display', $selectors = '.site-description' ),
                'display',
                'none'
            );

        switch($siteOptions['site-format']) {
            case 'align-left':
                AlisiosFrontCustomizer::generate_css(
                    apply_filters( 'alisios_brand_width', $selectors = '.site-header' ),
                    'margin-left',
                    'alisios_header_site[brand-width]',
                    '',
                    'px'
                );
                break;
            case 'align-right':
                AlisiosFrontCustomizer::generate_css(
                    apply_filters( 'alisios_brand_width', $selectors = '.site-header' ),
                    'margin-right',
                    'alisios_header_site[brand-width]',
                    '',
                    'px'
                );
                break;
        }

    }

    public static function brand() {
        $siteOptions = get_alisios_option('alisios_header_site', array());

        if(empty($siteOptions))
            return;

        if(isset($siteOptions['brand-source']) && $siteOptions['brand-source'] === 'none')
            return;

        $classes = '';

        switch($siteOptions['brand-format']) {
            case 'circle':
                $classes .= ' brand-circle';
                break;
            case 'rounded':
                $classes .= ' brand-rounded';
                break;
        }

        switch($siteOptions['brand-bordered']) {
            case 'lighten':
                $classes .= ' brand-light-bordered';
                break;
            case 'darken':
                $classes .= ' brand-dark-bordered';
                break;
        }

        $output =  '<div class="site-brand' . $classes . '">' . '<a href="' . get_bloginfo( 'home' ) . '">';

        if($siteOptions['brand-source'] === 'gravatar')
            $brand = get_avatar( apply_filters('alisios_header_gravatar_email', $email = esc_attr(get_option('admin_email'))), $siteOptions['brand-width'], '', esc_attr( get_bloginfo( 'name' ) ) );
        elseif($siteOptions['brand-source'] === 'custom' && !empty($siteOptions['brand-image']))
            $brand = '<img src="' . $siteOptions['brand-image'] . '" class="avatar avatar-custom photo" width="' . $siteOptions['brand-width'] .  '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
        else
            $brand = '';

        $output .= $brand . '</a>' . '</div>';

        echo $output;
    }
}