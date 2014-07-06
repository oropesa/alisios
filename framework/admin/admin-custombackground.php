<?php
class AlisiosAdminCustomizerBackground extends AlisiosAdminCustomizerTemplate {

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'customBackground' => array(
                'id'        => 'customBackground',
                'title'     => __('Background: Image', ALISIOS_I18N),
                'priority'  => 40
            )
        );

        $this->fields = array(

            //COLORS

            'backgroundColor' => array(
                'id'        => 'background-color',
                'label'     => __('Background Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'option'    => 'alisios_background',
                'default'   => '#fcfcfc',
            ),

            //BACKGROUND

            'repeatBackgroundX' => array(
                'id'        => 'background-image-repeat-x',
                'label'     => __('Repeat background image horizontally', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_background',
                'default'   => 'on',
            ),

            'repeatBackgroundY' => array(
                'id'        => 'background-image-repeat-y',
                'label'     => __('Repeat background image vertically', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_background',
                'default'   => 'on',
            ),

            'fixedBackground' => array(
                'id'        => 'background-image-fixed',
                'label'     => __('Fixed image', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'checkbox',
                'option'    => 'alisios_background',
                'default'   => '',
            ),

            'backgroundImage' => array(
                'id'        => 'background-image',
                'label'     => __('Background Image', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'image',
                'option'    => 'alisios_background',
                'default'   => '',
            ),

            'centerBackground' => array(
                'id'        => 'background-image-align',
                'label'     => __('Align of background image', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'radio-position',
                'option'    => 'alisios_background',
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
            ),

        );
    }

    /* Prepare CSS output
     */
    public function render() {
        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_background_color', $selectors = 'body' ),
            'background-color',
            'alisios_background[background-color]'
        );

        AlisiosFrontCustomizer::generate_css_background_image(
            apply_filters( 'alisios_background_image', $selectors = 'body' ),
            'alisios_background[background-image]',
            'alisios_background[background-image-repeat-x]',
            'alisios_background[background-image-repeat-y]',
            'alisios_background[background-image-align]'
        );

        $bgOptions = get_alisios_option('alisios_background', array());
        if(empty($bgOptions))
            return;

        if(!empty($bgOptions['background-image']) && !empty($bgOptions['background-image-fixed']))
            AlisiosFrontCustomizer::generate_css(
                apply_filters( 'alisios_background_image_fixed', $selectors = 'body' ),
                'background-attachment',
                'fixed'
            );
    }
}