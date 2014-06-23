<?php
/*
 * Template Customizer Class
 *
 * If you want to use it you have to extends it.
 *
 * Functions to edit:
 *  - loadOptions()
 */

class AlisiosAdminCustomizerTemplate {

    /* VARS
     * */
    public $sections, $fields;

    /* Call to Registers
     */
    function __construct() {
        add_action('customize_register',        array(&$this, 'register_options')   );
        add_action('alisios_customizer_render', array(&$this, 'render')             );
    }

    /* Prepare CSS output
     */
    public function render() {
        /* See front-customizer */
    }

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            /*'Section1' => array(
                'id'        => 'section_1',
                'title'     => __('Section 1', ALISIOS_I18N),
                'priority'  => 50
            )*/
        );

        $this->fields = array(
            //TYPE: color
            /*'field_color' => array(
                'id'        => 'field_1',
                'label'     => __('Field 1', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'type'      => 'color',
                'default'   => '#000000',
            ),*/

            /*'field_image' => array(
                'id'        => 'field_1',
                'label'     => __('Field 1', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'option'     => 'alisios_theme_options',
                'type'      => 'image',
                'default'   => '',
            ),*/

            //TYPE: radio
            /*'field_radio' => array(
                'id'        => 'field_3',
                'label'     => __('Field 3', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'option'     => 'alisios_theme_options',
                'type'      => 'radio',
                'default'   => 'value1',
                'choices'   => array(
                                    'value1' => 'label1',
                                    'value2' => 'label2',
                                )
            ),*/

            //TYPE: text
            /*'field_text' => array(
                'id'        => 'field_2',
                'label'     => __('Field 2', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'option'     => 'alisios_theme_options',
                'type'      => 'text',
                'default'   => '',
            ),*/
        );
    }

    /* Register and add settings
     */
    public function register_options($wp_customize) {

        $this->loadOptions();

        //Sections
        foreach($this->sections as $section){
            $wp_customize->add_section(
                $section['id'], array(
                    'title'    => $section['title'],
                    'priority' => $section['priority'],
                )
            );
        }

        foreach($this->fields as $field) {
            //SETTING (default value)
            $settingType = isset($field['option']) ? 'option' : 'theme_mod';
            $entireID = isset($field['option']) ? $field['option'] . '[' . $field['id'] . ']' : $field['id'];

            $wp_customize->add_setting(
                $entireID, array(
                    'capability'        => 'edit_theme_options',
                    'type'              => $settingType,
                    'default'           => apply_filters( 'alisios_' . $field['id'] . '_default', $field['default'] ),
                )
            );

            //CONTROL
            switch($field['type']) {
                case 'color' :
                    $wp_customize->add_control(
                        new WP_Customize_Color_Control($wp_customize, $field['id'], array(
                            'label'      => $field['label'],
                            'section'    => $field['section'],
                            'settings'   => $entireID,
                        ))
                    );
                    break;
                case 'image' :
                    $wp_customize->add_control(
                        new WP_Customize_Image_Control($wp_customize, $field['id'], array(
                            'label'          => $field['label'],
                            'section'        => $field['section'],
                            'settings'       => $entireID
                        ))
                    );
                    break;
                case 'radio' :
                    $wp_customize->add_control($entireID, array(
                        'label'      => $field['label'],
                        'section'    => $field['section'],
                        'type'       => $field['type'],
                        'settings'   => $entireID,
                        'choices'    => $field['choices'],
                    ));
                    break;
                case 'text' :
                    $wp_customize->add_control($entireID, array(
                        'label'      => $field['label'],
                        'section'    => $field['section'],
                        'type'       => $field['type'],
                        'settings'   => $entireID,
                    ));
                    break;
                case 'checkbox' :
                    $wp_customize->add_control($entireID, array(
                        'label'      => $field['label'],
                        'section'    => $field['section'],
                        'type'       => $field['type'],
                        'settings'   => $entireID,
                    ));
                    break;
            }
        }
    }

}