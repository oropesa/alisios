<?php
class AlisiosAdminCustomizerBackground extends AlisiosAdminCustomizerTemplate {

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'customBackground' => array(
                'id'        => 'customBackground',
                'title'     => __('Background Image', ALISIOS_I18N),
                'priority'  => 40
            )
        );

        $this->fields = array(
            'backgroundColor' => array(
                'id'        => 'custom_background_color',
                'label'     => __('Background Color', ALISIOS_I18N),
                'section'   => 'colors',
                'type'      => 'color',
                'default'   => '#fcfcfc',
            ),

            'repeatBackgroundX' => array(
                'id'        => 'repeat_custom_background_image_x',
                'label'     => __('Repeat background horizontally?', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'checkbox',
                'default'   => 'on',
            ),

            'repeatBackgroundY' => array(
                'id'        => 'repeat_custom_background_image_y',
                'label'     => __('Repeat background vertically?', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'checkbox',
                'default'   => 'on',
            ),

            'centerBackground' => array(
                'id'        => 'align_custom_background_image',
                'label'     => __('Position background image', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
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
            ),

            'backgroundImage' => array(
                'id'        => 'custom_background_image',
                'label'     => __('Background Image', ALISIOS_I18N),
                'section'   => $this->sections['customBackground']['id'],
                'type'      => 'image',
                'default'   => '',
            ),

        );
    }

    /* Prepare CSS output
     */
    public function render() {
        AlisiosFrontCustomizer::generate_css(
            apply_filters( 'alisios_background_color', $selectors = 'body' ),
            'background-color',
            'custom_background_color'
        );

        AlisiosFrontCustomizer::generate_css_background_image(
            apply_filters( 'alisios_background_image', $selectors = 'body' ),
            'custom_background_image',
            'repeat_custom_background_image_x',
            'repeat_custom_background_image_y',
            'align_custom_background_image'
        );
    }
}