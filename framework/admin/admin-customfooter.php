<?php
class AlisiosAdminCustomizerFooter extends AlisiosAdminCustomizerTemplate {

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'footerBackground' => array(
                'id'        => 'footerBackground',
                'title'     => __('Footer: Background', ALISIOS_I18N),
                'priority'  => 60
            ),
            'footerNav' => array(
                'id'        => 'footerNav',
                'title'     => __('Footer: Navigation', ALISIOS_I18N),
                'priority'  => 61
            ),
            'footerFormat' => array(
                'id'        => 'footerFormat',
                'title'     => __('Footer: Format', ALISIOS_I18N),
                'priority'  => 62
            ),
        );

        $this->fields = array(

            //COLORS

            'footerColor' => array(
                'id'        => 'footer-background-color',
                'label'     => __('Footer Background Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_footer',
                'default'   => '#EEEEEE',
            ),

            'textColor' => array(
                'id'        => 'footer-text-color',
                'label'     => __('Footer Text Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_footer',
                'default'   => '#272727',
            ),

            //BACKGROUND

            'footerBackgroundRepeatX' => array(
                'id'        => 'footer-background-image-repeat-x',
                'label'     => __('Repeat background image horizontally', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => 'on',
            ),

            'footerBackgroundRepeatY' => array(
                'id'        => 'footer-background-image-repeat-y',
                'label'     => __('Repeat background image vertically', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => 'on',
            ),

            'footerBrackgroundImageZone' => array(
                'id'        => 'footer-background-image-zone',
                'label'     => __('Zone of image: inside', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => '',
            ),

            'footerColorZone' => array(
                'id'        => 'footer-background-color-zone',
                'label'     => __('Zone of color: inside', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => '',
            ),

            'footerBackgroundImage' => array(
                'id'        => 'footer-background-image',
                'label'     => __('Background Image', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'image',
                'option'    => 'alisios_footer',
                'default'   => '',
            ),

            'footerBackgroundImageAlign' => array(
                'id'        => 'footer-background-image-align',
                'label'     => __('Align of background image', ALISIOS_I18N),
                'section'   => $this->sections['footerBackground']['id'],
                'type'      => 'radio-position',
                'option'    => 'alisios_footer',
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

            //FORMAT

            'footerHideAll' => array(
                'id'        => 'footer-hide-all',
                'label'     => __('Hide footer', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => '',
            ),

            'footerHideCredits' => array(
                'id'        => 'footer-hide-credits',
                'label'     => __('Hide footer credits', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_footer',
                'default'   => '',
            ),

            'footerCreditsText' => array(
                'id'        => 'footer-credits-text',
                'label'     => __('Credits text', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'type'      => 'textinput',
                'option'    => 'alisios_footer',
                'default'   => '&copy; YYYY' . get_bloginfo('name'),
            ),

            'footerCreditsFormat' => array(
                'id'        => 'footer-credits-format',
                'label'     => __('Credits Align', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'option'    => 'alisios_footer',
                'type'      => 'radio',
                'choices'   => array(
                    'align-left'        => __('Left', ALISIOS_I18N),
                    'align-right'       => __('Right', ALISIOS_I18N),
                    'align-center'      => __('Center', ALISIOS_I18N),
                ),
                'default' => 'align-right'
            ),

            'footerMenuFormat' => array(
                'id'        => 'footer-menu-format',
                'label'     => __('Footer Menu Align', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'option'    => 'alisios_footer',
                'type'      => 'radio',
                'choices'   => array(
                    'align-left'        => __('Left', ALISIOS_I18N),
                    'align-right'       => __('Right', ALISIOS_I18N),
                    'align-center'      => __('Center', ALISIOS_I18N),
                ),
                'default' => 'align-left'
            ),

            'footerMenuResponsiveFormat' => array(
                'id'        => 'footer-menu-responsive-format',
                'label'     => __('Footer Menu Responsive Align', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'option'    => 'alisios_footer',
                'type'      => 'radio',
                'choices'   => array(
                    'align-left'        => __('Left', ALISIOS_I18N),
                    'align-right'       => __('Right', ALISIOS_I18N),
                    'align-center'      => __('Center', ALISIOS_I18N),
                ),
                'default' => 'align-center'
            ),

            'footerWidgetsNumber' => array(
                'id'        => 'footer-widgets-number',
                'label'     => __('Number of widgets? [0-4]', ALISIOS_I18N),
                'section'   => $this->sections['footerFormat']['id'],
                'type'      => 'textinput',
                'option'    => 'alisios_footer',
                'default'   => '3',
            ),

        );
    }

    public function loadHooks() {

        //BACKGROUND

        /*add_filter('alisios_site_background_color', function($selector) {
            $mod = get_alisios_option('alisios_header_site[header-background-color-zone]');

            if( empty($mod) )
                return $selector;

            return '.site';
        });

        add_filter('alisios_site_background_image', function($selector) {
            $mod = get_alisios_option('alisios_header_site[header-background-image-zone]');

            if( empty($mod) )
                return $selector;

            return '.site';
        });*/

        //BRAND

        //FORMAT

        /*add_filter('site_class', function($existing_classes) {
            $siteOptions = get_alisios_option('alisios_header_site', array());

            if(empty($siteOptions) || empty($siteOptions['header-site-format']))
                return $existing_classes;

            $existing_classes[] = 'site-' . $siteOptions['header-site-format'];

            return $existing_classes;
        });*/
    }

    /* Prepare CSS output
     */
    public function render() {

        //COLORS
        /*AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_background_color', $selectors = '.header' ),
            'background-color',
            'alisios_header_site[header-background-color]'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_title_color', $selectors = '.site-header, .site-header a' ),
            'color',
            'alisios_header_site[header-title-color]'
        );

        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_site_title_color', $selectors = '.site-description' ),
            'color',
            'alisios_header_site[header-description-color]'
        );*/

        //BACKGROUND

        /*AlisiosFrontCustomizer::generate_css_background_image(
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
        );*/

        //BRAND

        /*AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_brand_width', $selectors = '.site-brand' ),
            'width',
            'alisios_header_site[header-brand-width]',
            '',
            'px'
        );*/

        //FORMAT
        /*$siteOptions = get_alisios_option('alisios_header_site', array());
        if(empty($siteOptions))
            return;

        if(!empty($siteOptions['header-hide-all']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_display', $selectors = '.header' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['header-hide-brand']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_brand_display', $selectors = '.site-brand' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['header-hide-title']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_title_display', $selectors = '.site-title' ),
                'display',
                'none'
            );

        if(!empty($siteOptions['header-hide-description']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_header_description_display', $selectors = '.site-description' ),
                'display',
                'none'
            );

        if($siteOptions['header-brand-source'] !== 'none') {
            switch($siteOptions['header-site-format']) {
                case 'align-left':
                    AlisiosFrontCustomizer::generate_css(
                        apply_filters( 'alisios_brand_width', $selectors = '.site-header' ),
                        'margin-left',
                        'alisios_header_site[header-brand-width]',
                        '',
                        'px'
                    );
                    break;
                case 'align-right':
                    AlisiosFrontCustomizer::generate_css(
                        apply_filters( 'alisios_brand_width', $selectors = '.site-header' ),
                        'margin-right',
                        'alisios_header_site[header-brand-width]',
                        '',
                        'px'
                    );
                    break;
            }
        }*/

    }


}