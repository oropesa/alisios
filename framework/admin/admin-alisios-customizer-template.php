<?php
/*
 * Template Customizer Class
 *
 * If you want to use it you have to extends it.
 *
 * Functions to edit:
 *  - loadOptions()
 *  - loadHooks()
 */

class AlisiosAdminCustomizerTemplate {

    /* VARS
     * */
    public $sections, $fields;

    /* Call to Registers
     */
    function __construct() {
        add_action('customize_register',                array(&$this, 'register_options')           );
        add_action('alisios_customizer_render',         array(&$this, 'render')                     );
        add_action('customize_controls_print_styles',   array(&$this, 'customizer_enqueue_style')   );

        $this->loadHooks();
    }

    /* Add Hooks in __construct
     */
    public function loadHooks() {}

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

    public function customizer_enqueue_style() {
        //less || css
        if(ALISIOS_USE_LESS) {
            wp_enqueue_style('alisios-style', ALISIOS_URL_LESS  . '/alisios-admin/alisios-admin.less');
            wp_enqueue_script('alisios-less', ALISIOS_URL_JS_LIB . '/less.min.js');
        } else {
            wp_enqueue_style('alisios_admin_style', ALISIOS_URL_CSS . '/alisios-admin.css');
        }
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
                    'chacho'            => 'tioo',
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
                            'label'     => $field['label'],
                            'section'   => $field['section'],
                            'settings'  => $entireID
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
                case 'radio-position' :
                    $wp_customize->add_control(
                        new Alisios_Customize_Radio_Position_Control($wp_customize, $field['id'], array(
                            'label'     => $field['label'],
                            'section'   => $field['section'],
                            'settings'  => $entireID,
                            'choices'   => $field['choices'],
                        ))
                    );
                    break;
                case 'text' :
                    $wp_customize->add_control($entireID, array(
                        'label'      => $field['label'],
                        'section'    => $field['section'],
                        'type'       => $field['type'],
                        'settings'   => $entireID,
                    ));
                    break;
                case 'textaddon-px' :
                    $wp_customize->add_control(
                        new Alisios_Customize_Textpx_Control($wp_customize, $field['id'], array(
                        'label'      => $field['label'],
                        'section'    => $field['section'],
                        'type'       => $field['type'],
                        'settings'   => $entireID,
                        ))
                    );
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

/**
 * Customize Control Class
 *
 * Type: Radio Position, 3x3 table
 */
if( class_exists ('WP_Customize_Control') ) :

    class Alisios_Customize_Radio_Position_Control extends WP_Customize_Control {
        public $type = 'radio-position';

        public function render_content() {
            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            $i = 0;
            ?>
            <table>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php foreach ( $this->choices as $value => $label ) :
                if($i % 3 == 0)
                    echo '<tr>';
                ?>
                <td>
                    <label>
                        <input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                        <?php echo esc_html( $label ); ?><br/>
                    </label>
                </td>
                <?php
                if($i+1 % 3 == 0)
                    echo '</tr>';
                $i++;
            endforeach; ?>
            </table>
            <?php
        }
    }

    class Alisios_Customize_Textpx_Control extends WP_Customize_Control {
        public $type = 'textaddon-px';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" placeholder="<?php echo $this->settings['default']->default ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> class="input-addon-right" /><span class="span-addon">px</span>
            </label>
            <?php
        }
    }

endif;

/* Get data from DB between get_theme_mod or get_option
 * */
function get_alisios_option($mod_name, $default = '') {
    // $mod_name = 'alisios_custom[color]'; -> option
    // $mod_name = 'alisios_custom_color'; -> theme_mod || option

    if( ($pos = strpos($mod_name, '[')) !== false ) {
        //try in options
        $opt = get_option(substr($mod_name, 0, $pos), 'non-in-option');
        if($opt !== 'non-in-option')
            $mod = isset_get( $opt, substr($mod_name, $pos+1, -1) );
    } else {
        //try in theme_mod
        $mod = get_theme_mod($mod_name, 'non-in-theme-mod');
        //try in option
        if($mod === 'non-in-theme-mod')
            $mod = get_option($mod_name, 'non-in-option');
    }

    if($mod === 'non-in-option')
        $mod = $default;

    return $mod;
}