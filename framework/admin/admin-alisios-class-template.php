<?php
/*
 * Template Class
 *
 * If you want to use it you have to extends it.
 *
 * Vars to edit:
 *  - $page_slug
 *  - $opt_name
 *  - $opt_icon
 *
 * Functions to edit:
 *  - loadOptions()
 *  - loadAdminPage()
 */

class AlisiosAdminClassTemplate {

    /* VARS
     * */
    public $page_slug   = 'alisios-setting-pageslug';
    public $opt_name    = 'alisios_pagename';
    public $opt_group   = 'alisios_group';
    public $opt_icon    = '';

    public $sections, $fields;

    /* Call to Registers
     */
    function __construct() {
        add_action('admin_init', array(&$this, 'register_options'));
        add_action('admin_menu', array(&$this, 'register_admin_page'));
    }

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            /*'Section1' => array(
                'id'        => 'section_1',
                'title'     => __('Section 1', ALISIOS_I18N),
            )*/
        );

        $this->fields = array(
            //TYPE: textinput
            /*'field_textinput' => array(
                'id'        => 'field_1',
                'label'     => __('Field 1', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'type'      => 'textinput',
                'placeholder' => 'insert field 1',
                'desc'      => __('String of label description: ', ALISIOS_I18N),
                'extra'     => __('String of description', ALISIOS_I18N),
                'addon'     => false, // the label is stuck of the input
                'addon_left'=> false, // the label is on the left of the input
                'error'     => __('String of error message', ALISIOS_I18N),
            ),*/

            //TYPE: checkbox
            /*'field_checkbox' => array(
                'id'        => 'field_2',
                'label'     => __('Field 2', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'type'      => 'checkbox',
                'desc'      => __('String of label description: ', ALISIOS_I18N),
                'extra'     => __('String of description', ALISIOS_I18N),
                'is_left'   => false, // the label is on the left of the input
                'error'     => __('String of error message', ALISIOS_I18N),
            ),*/

            //TYPE: select
            /*'field_select' => array(
                'id'        => 'field_3',
                'label'     => __('Field 3', ALISIOS_I18N),
                'section'   => $this->sections['Section1']['id'],
                'type'      => 'select',
                'options'   => array(
                    'value1'    => __('description1', ALISIOS_I18N),
                    'value2'    => __('description2', ALISIOS_I18N),
                ),
                'error'     => __('String of error message', ALISIOS_I18N),
            ),*/
        );
    }

    /* Load Admin Page & Menu
     */
    public function loadAdminPage() {
        //Add in administration menu. Where? http://codex.wordpress.org/Administration_Menus
        //Examples
        /*
        add_management_page( __('Page Title', ALISIOS_I18N), __('Menu Title', ALISIOS_I18N), 'capability', $this->page_slug, array($this, 'create_admin_page'));

        add_menu_page( __('Page Title', ALISIOS_I18N), __('Menu Title', ALISIOS_I18N), 'capability', $this->page_slug, array($this, 'create_admin_page'), 'icon-url', 'position-number');
        */
    }

    /* Register Admin Page & Menu
     */
    public function register_admin_page() {
        //if it is in the page itself, it loads styles and scripts
        if(isset($_GET['page']) && $_GET['page'] == $this->page_slug) {
            add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_style_and_script'));
        }

        $this->loadAdminPage();
    }

    /* Load JS (on the bottom) and CSS libraries (on the head)
     */
    public function admin_enqueue_style_and_script() {
        //less || css
        if(ALISIOS_USE_LESS) {
            wp_enqueue_style('alisios-style', ALISIOS_URL_LESS  . '/alisios-admin/alisios-admin.less');
            wp_enqueue_script('alisios-less', ALISIOS_URL_JS_LIB . '/less.min.js');
        } else {
            wp_enqueue_style('alisios_admin_style', ALISIOS_URL_CSS . '/alisios-admin.css');
        }

        //js
        wp_enqueue_script('alisios_admin_script', ALISIOS_URL_JS . '/alisios-admin.js', array('jquery'), false, true);
    }

    /* Admin Page
     */
    public function create_admin_page() {
        $this->options = get_option($this->opt_name);

        /**
         * Display the updated/error messages
         * Only needed as our settings page is not under options, otherwise it will automatically be included
         * @see settings_errors()
         */
        require_once( ABSPATH . 'wp-admin/options-head.php' );
        ?>
        <div class="wrap alisios-admin-page <?php echo $this->opt_name; ?>-page">

            <?php $div_icon = !empty($this->opt_icon) ? '<div class="dashicons ' . $this->opt_icon . '"></div> ' : ''; ?>
            <h2 class="alisios-title"><?php echo $div_icon . esc_html( get_admin_page_title() ); ?></h2>

            <form action="<?php echo esc_url(admin_url('options.php')); ?>" method="post" id="alisios-conf" class="alisios_content_wrapper" accept-charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">

                <?php
                // This prints out all hidden setting fields
                settings_fields($this->opt_group);
                ?>

                <!-- Section Navigator -->
                <?php
                if(isset($this->sections)) : ?>
                    <h2 class="nav-tab-wrapper" id="alisios-tabs">
                        <?php
                        $first = true;
                        foreach($this->sections as $section) {
                            $class = $first ? ' nav-tab-active' : '';
                            $first = false;
                            ?>
                            <a class="nav-tab<?php echo $class ?>" id="<?php echo $section['id'] ?>-tab" href="#top#<?php echo $section['id'] ?>"><?php echo $section['title'] ?></a>
                        <?php
                        }
                        ?>
                    </h2>
                <?php endif; ?>

                <!-- Section Tables -->
                <?php
                $class = ' active';
                foreach($this->sections as $section) :?>
                    <table id="<?php echo $section['id'] ?>" class="form-table alisiostab<?php echo $class ?>">
                        <?php do_settings_fields( $this->page_slug, $section['id'] ); ?>
                    </table>
                    <?php $class = ''; ?>
                <?php endforeach; ?>

                <?php submit_button(); ?>
            </form>
        </div>
    <?php
    }

    /* Register and add settings
     */
    public function register_options() {

        $this->loadOptions();

        register_setting(
            $this->opt_group,       // Option group
            $this->opt_name,        // Option name
            array(&$this, 'sanitize')// Sanitize
        );

        foreach($this->sections as $section){
            add_settings_section(
                $section['id'],                     // ID
                $section['title'],                  // Title
                false,                              // Callback
                $this->page_slug                    // Page
            );
        }

        foreach($this->fields as $field) {
            //section control
            $field['section'] = !empty($field['section']) ? $field['section'] : 'default';

            $args = array(
                'type'      => $field['type'],
                'var'       => $field['id'],
                'label'     => $field['desc'],
                'option'    => $this->opt_name,
                'section'   => $field['section'],
            );

            switch($field['type']) {
                case 'checkbox':
                    $args['is_left']    = isset($field['is_left'])  ? $field['is_left'] : false;
                    $args['desc']       = isset($field['extra'])    ? $field['extra'] : '';
                    break;
                case 'textinput':
                    $args['placeholder']    = isset($field['placeholder']) ? $field['placeholder'] : '';
                    $args['addon']          = isset($field['addon']) ? $field['addon'] : false;
                    $args['addon_left']     = isset($field['addon_left']) ? $field['addon_left'] : false;
                    $args['extra']          = isset($field['extra']) ? $field['extra'] : '';
                    break;
                case 'select':
                    $args['options']    = isset($field['options']) ? $field['options'] : array();
                    break;
            }

            add_settings_field(
                $field['id'],                                                           // ID
                '<label for="' . $field['id'] . '">' . $field['label'] . '</label>',    // Title
                array( &$this, 'fieldsToHtml' ),                                         // Callback
                $this->page_slug,                                                       // Page
                $field['section'],                                                      // Section
                $args                                                                   // Arguments to Callback
            );
        }
    }

    /* Sanitize each setting field as needed
     */
    public function sanitize($input) {

        $valid = array();

        foreach($this->fields as $field) {
            $valid[ $field['id'] ] = sanitize_text_field($input[ $field['id'] ]);
            // Something dirty entered? Warn user.
            if( $valid[ $field->id ] != $input[ $field->id ] ) {
                add_settings_error(
                    $field['id'] . '_fail',// setting title
                    $field['id'],         // error ID
                    $field['error'],      // error message
                    'error'             // type of message
                );
            }
        }

        return $valid;
    }

    /* Callback of Fields
     */
    public function fieldsToHtml($args) {
        if(!isset($args['type']))
            return;

        switch($args['type']) {
            case 'checkbox':
                $this->checkbox($args['var'], $args['label'], $args['option'], $args['is_left'], $args['desc']);
                break;
            case 'textinput':
                $this->textinput($args['var'], $args['label'], $args['option'], $args['placeholder'], $args['addon'], $args['addon_left'], $args['extra']);
                break;
            case 'select':
                $this->select($args['var'], $args['label'], $args['option'], $args['options']);
                break;
        }
    }

    /*
     * TEMPLATES
     */

    /**
     * checkbox input field template
     */
    public static function checkbox($var, $label, $option, $is_label_left = false, $desc = '') {
        $options = get_option($option);
        $val = (isset($options[$var]) && $options[$var] != false) ? 'on' : false;

        $output_label = '<label ' . ($is_label_left !== false ? 'class="checkbox" ' : '') . 'for="' . esc_attr($var) . '">' . $label . '</label>';

        $output_input = '<input class="checkbox" type="checkbox" id="' . esc_attr($var) . '" name="' . esc_attr($option) . '[' . esc_attr($var) . ']" value="on"' . checked($val, 'on', false) . '/>';

        $output_desc = !empty($desc) ? '<p>' . $desc . '</p>' : '';

        if($is_label_left) {
            $output = $output_label . $output_input;
        } else {
            $output = $output_input . $output_label;
        }

        print $output . $output_desc;
    }

    /**
     * Text input field template
     */
    public static function textinput($var, $label, $option, $placeholder = '', $is_addon = false, $is_addon_left = false, $extra = '') {
        $options = get_option($option);
        $val     = (isset($options[$var])) ? $options[$var] : '';

        if(!empty($placeholder)) {
            $placeholder = 'placeholder="' . esc_attr($placeholder) . '"';
        }

        $class = $is_addon ? ' addon' : '';

        $output_label = '<label class="textinput' . $class . '" for="' . esc_attr($var) . '">' . $label . '</label>';
        $output_label = !$is_addon ? '<p>' . $output_label . '</p>' : $output_label;

        $output_input = '<input class="textinput' . $class . '" type="text" id="' . esc_attr($var) . '" name="' . esc_attr($option) . '[' . esc_attr($var) . ']" value="' . esc_attr($val) . '" ' . $placeholder . '/>';

        $outputextra = !empty($extra) ? '<p>' . $extra . '</p>' : '';

        if($is_addon_left) {
            $output = $output_label . $output_input;
        } else {
            $output = $output_input . $output_label;
        }

        print $output . $outputextra;
    }

    /**
     * Select Box template
     */
    public static function select( $var, $label, $option, $values = array() ) {
        $options = get_option($option);

        $output_label = !empty($label) ? '<label class="select" for="' . esc_attr( $var ) . '">' . $label . ':</label>' : '';

        $output_input = '<select class="select" name="' . esc_attr( $option ) . '[' . esc_attr( $var ) . ']" id="' . esc_attr( $var ) . '">';
        foreach($values as $value => $label) {
            if(!empty($label))
                $output_input .= '<option value="' . esc_attr( $value ) . '"' . selected( $options[$var], $value, false ) . '>' . $label . '</option>';
        }
        $output_input .= '</select>';

        print $output_label . $output_input;
    }
}