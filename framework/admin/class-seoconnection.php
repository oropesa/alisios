<?php
class AlisiosAdminSeoConnection {

    private $page_slug  = 'alisios-setting-seoconnection';
    public $opt_name    = 'alisios_seoconnection';
    public $opt_group   = 'alisios_group';

    public  $sections,
            $fields;

    /*
     * Call to Registers
     */
    function __construct() {
        add_action('admin_init', array($this, 'register_options'));
        add_action('admin_menu', array($this, 'register_admin_page'));
    }

    /*
     * Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'SeoConnection' => array(
                'id'        => 'seo_connection',
                'title'     => __('Webmaster Tools', ALISIOS_I18N),
            )
        );

        $this->fields = array(

            'google_analytics' => array(
                'id'        => 'google_analytics',
                'label'     => __('Google Analytics ID', ALISIOS_I18N),
                'section'   => $this->sections['SeoConnection']['id'],
                'type'      => 'textinput',
                'placeholder' => 'UA-9735089-14',
                'extra'     => __('Verify your site with ', ALISIOS_I18N) . '<a target="_blank" href="https://www.google.com/analytics/web/">Google Analytics</a>.',
                //sanitize
                'error'     => __('Google Webmaster ID is weird.', ALISIOS_I18N),
            ),

            'google_webmaster' => array(
                'id'        => 'google_webmaster',
                'label'     => __('Google Webmaster Tools', ALISIOS_I18N),
                'section'   => $this->sections['SeoConnection']['id'],
                'type'      => 'textinput',
                'desc'      => __('Example: ', ALISIOS_I18N) . '<code>&lt;meta name="google-site-verification" content="dBw5CvburAxi537Rp9qi5uG2174Vb6JwHwIRwPSLIK8""&gt;</code>',
                'placeholder' => 'dBw5CvburAxi537Rp9qi5uG2174Vb6JwHwIRwPSLIK8',
                'extra'     => __('Verify your site with ', ALISIOS_I18N) . '<a target="_blank" href="https://www.google.com/webmasters/verification/home">Google Webmaster Tools</a>.',
                //sanitize
                'error'     => __('Google Webmaster ID is weird.', ALISIOS_I18N),
            ),

            'bing_webmaster' => array(
                'id'        => 'bing_webmaster',
                'label'     => __('Bing Webmaster Center', ALISIOS_I18N),
                'section'   => $this->sections['SeoConnection']['id'],
                'type'      => 'textinput',
                'desc'      => __('Example: ', ALISIOS_I18N) . '<code>&lt;meta name="msvalidate.01" content="12C1203B5086AECE94EB3A3D9830B2E"&gt;</code>',
                'placeholder' => '12C1203B5086AECE94EB3A3D9830B2E',
                'extra'     => __('Verify your site with ', ALISIOS_I18N) . '<a target="_blank" href="http://www.bing.com/toolbox/webmaster/#/Dashboard/">Bing Webmaster Tools</a>.',
                //sanitize
                'error'     => __('Bing Webmaster ID is weird.', ALISIOS_I18N),
            ),

            'alexa_verification' => array(
                'id'        => 'alexa_verification',
                'label'     => __('Alexa Site Verification', ALISIOS_I18N),
                'section'   => $this->sections['SeoConnection']['id'],
                'type'      => 'textinput',
                'desc'      => __('Example: ', ALISIOS_I18N) . '<code>&lt;meta name="alexaVerifyID" content="Q20ZbRqY9qFyN9wI0lods6LzM1F"&gt;</code>',
                'placeholder' => 'Q20ZbRqY9qFyN9wI0lods6LzM1F',
                'extra'     => __('Verify your site with ', ALISIOS_I18N) . '<a target="_blank" href="http://www.alexa.com/siteowners/claim">Alexa Site Verification</a>.',
                //sanitize
                'error'     => __('Pinterest Verification ID is weird.', ALISIOS_I18N),
            ),

            'pinterest_verification' => array(
                'id'        => 'pinterest_verification',
                'label'     => __('Pinterest Site Verification', ALISIOS_I18N),
                'section'   => $this->sections['SeoConnection']['id'],
                'type'      => 'textinput',
                'desc'      => __('Example: ', ALISIOS_I18N) . '<code>&lt;meta name="p:domain_verify" content="f100679e6048d45e4a0b0b92dce1efce"&gt;</code>',
                'placeholder' => 'f100679e6048d45e4a0b0b92dce1efce',
                'extra'     => __('Verify your site with ', ALISIOS_I18N) . '<a target="_blank" href="https://help.pinterest.com/es/articles/verify-your-website">Pinterest Site Verification</a>.',
                //sanitize
                'error'     => __('Pinterest Verification ID is weird.', ALISIOS_I18N),
            ),

        );
    }

    /*
     * Register Admin Social Page & Menu
     */
    public function register_admin_page() {
        //init
        if(isset($_GET['page']) && $_GET['page'] == $this->page_slug) {
            add_action('admin_enqueue_scripts', array('AlisiosAdmin', 'admin_enqueue_style_and_script'));
        }

        //Add Menu Page, 66 => Between Plugin and Users
        add_management_page( _('Seo Connection', ALISIOS_I18N), _('Seo Connection', ALISIOS_I18N), 'manage_options', $this->page_slug, array($this, 'create_admin_page'));
    }

    /*
     * Admin Social Page
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
            <h2 class="alisios-title"><div class="dashicons dashicons-share"></div> <?php echo esc_html( get_admin_page_title() ); ?></h2>

            <form action="<?php echo esc_url(admin_url('options.php')); ?>" method="post" id="alisios-conf" class="alisios_content_wrapper" accept-charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
                <?php
                // This prints out all hidden setting fields
                settings_fields($this->opt_group);

                // Section Navigator
                if(isset($this->sections)) {
                    ?>
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
                    <?php
                }

                // Section Table
                $first = true;
                foreach($this->sections as $section) {
                    $class = $first ? ' active' : '';
                    $first = false;
                    ?>
                    <table id="<?php echo $section['id'] ?>" class="form-table alisiostab<?php echo $class ?>">
                        <?php do_settings_fields( $this->page_slug, $section['id'] ); ?>
                    </table>
                    <?php
                }
                ?>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function register_options() {

        self::loadOptions();

        register_setting(
            $this->opt_group,       // Option group
            $this->opt_name,        // Option name
            array($this, 'sanitize')// Sanitize
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
                $field['id'],                   // ID
                $field['label'],                // Title
                array( $this, 'fieldsToHtml' ), // Callback
                $this->page_slug,               // Page
                $field['section'],              // Section
                $args                           // Arguments to Callback
            );
        }
    }

    /**
     * Sanitize each setting field as needed
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

    /*
     * Callback of Fields
     */
    public function fieldsToHtml($args) {
        if(!isset($args['type']))
            return;

        switch($args['type']) {
            case 'checkbox':
                AlisiosAdmin::checkbox($args['var'], $args['label'], $args['option'], $args['is_left'], $args['desc']);
                break;
            case 'textinput':
                AlisiosAdmin::textinput($args['var'], $args['label'], $args['option'], $args['placeholder'], $args['addon'], $args['addon_left'], $args['extra']);
                break;
            case 'select':
                AlisiosAdmin::select($args['var'], $args['label'], $args['option'], $args['options']);
                break;
        }

    }

}