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
                'id'        => 'source',
                'label'     => __('Source', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_brand',
                'type'      => 'radio',
                'choices'   => array(
                    'none'      => 'None',
                    'gravatar'  => 'Gravatar',
                    'custom'    => 'Uploaded image',
                ),
                'default' => 'none'
            ),

            'headerBrandImage' => array(
                'id'        => 'image',
                'label'     => __('Brand Image', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_brand',
                'type'      => 'image',
                'default'   => '',
            ),

            'headerBrandWidth' => array(
                'id'        => 'width',
                'label'     => __('Width of brand', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_brand',
                'type'      => 'textaddon-px',
                'default'   => '128',
            ),

            'headerBrandFormat' => array(
                'id'        => 'format',
                'label'     => __('Format', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_brand',
                'type'      => 'radio',
                'choices'   => array(
                    'square'            => 'Square',
                    'rounded'    => 'Rounded square',
                    'circle'            => 'Circle',
                ),
                'default' => 'square'
            ),

            'headerBrandBordered' => array(
                'id'        => 'bordered',
                'label'     => __('Bordered', ALISIOS_I18N),
                'section'   => $this->sections['headerBrand']['id'],
                'option'    => 'alisios_header_brand',
                'type'      => 'radio',
                'choices'   => array(
                    'none'      => 'None',
                    'lighten'   => 'Lighten',
                    'darken'    => 'Darken',
                ),
                'default' => 'none'
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
            'alisios_header_brand[width]',
            '',
            'px'
        );
    }

    public static function brand() {
        $brandOptions = get_option( 'alisios_header_brand', array());

        if(empty($brandOptions))
            return;

        if(isset($brandOptions['source']) && $brandOptions['source'] === 'none')
            return;

        $classes = '';

        switch($brandOptions['format']) {
            case 'circle':
                $classes .= ' brand-circle';
                break;
            case 'rounded':
                $classes .= ' brand-rounded';
                break;
        }

        switch($brandOptions['bordered']) {
            case 'lighten':
                $classes .= ' brand-light-bordered';
                break;
            case 'darken':
                $classes .= ' brand-dark-bordered';
                break;
        }

        $output =  '<div class="site-brand' . $classes . '">' . '<a href="' . get_bloginfo( 'home' ) . '">';

        if($brandOptions['source'] === 'gravatar')
            $brand = get_avatar( apply_filters('alisios_header_gravatar_email', $email = esc_attr(get_option('admin_email'))), $brandOptions['width'], '', esc_attr( get_bloginfo( 'name' ) ) );
        elseif($brandOptions['source'] === 'custom')
            $brand = '<img src="' . $brandOptions['image'] . '" class="avatar avatar-custom photo" width="' . $brandOptions['width'] .  '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
        else
            $brand = '';

        $output .= $brand . '</a>' . '</div>';

        echo $output;
    }
}