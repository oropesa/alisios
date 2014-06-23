<?php
class AlisiosAdminCustomizerHeader extends AlisiosAdminCustomizerTemplate {

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'headerBackground' => array(
                'id'        => 'headerBackground',
                'title'     => __('Header Background', ALISIOS_I18N),
                'priority'  => 50
            ),
            'headerBrand' => array(
            'id'        => 'headerBrand',
            'title'     => __('Header Brand', ALISIOS_I18N),
            'priority'  => 51
        )
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
                    'left top' => '',
                    'center top' => '',
                    'right top' => '',
                    'left center' => '',
                    'center center' => '',
                    'right center' => '',
                    'left bottom' => '',
                    'center bottom' => '',
                    'right bottom' => '',
                ),
                'default' => 'center top'
            ),

            'headerHeight' => array(
                'id'        => 'custom_header_height',
                'label'     => __('Height of header', ALISIOS_I18N),
                'section'   => $this->sections['headerBackground']['id'],
                'type'      => 'textinput',
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

            /*'headerBrandSource' => array(
                'id'        => 'header_brand_source',
                'label'     => __('Source', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'type'      => 'radio',
                'choices'   => array(
                    'none' => 'None',
                    'gravatar' => 'Gravatar',
                    'custom' => 'Uploaded image',
                ),
                'default' => 'none'
            ),*/
        );
    }

    public function loadHooks() {
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
    }

    /* Prepare CSS output
     */
    public function render() {
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
            apply_filters( 'alisios_header_color', $selectors = '.header' ),
            'height',
            'custom_header_height'
        );
    }
}