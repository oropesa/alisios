<?php
class AlisiosAdminSocial {

    private $options;
    private $page_slug  = 'alisios-setting-social';
    public $opt_name    = 'alisios_social';
    public $opt_group   = 'alisios_group';

    public  $sections,
            $fields;

    /*
     * Call to Registers
     */
    function __construct() {
        add_action('admin_init', array($this, 'register_social_options'));
        add_action('admin_menu', array($this, 'register_admin_social_page'));
    }

    /*
     * Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array(
            'Facebook' => array(
                'id'        => 'social_facebook',
                'title'     => __('Facebook', ALISIOS_I18N),
            ),
            'Twitter' => array(
                'id'        => 'social_twitter',
                'title'     => __('Twitter', ALISIOS_I18N),
            ),
            'GooglePlus' => array(
                'id'        => 'social_googleplus',
                'title'     => __('Google+', ALISIOS_I18N),
            ),
        );

        $this->fields = array(

            //FACEBOOK

            'use_facebook' => array(
                'id'        => 'use_facebook',
                'label'     => __('Add Facebook meta data?', ALISIOS_I18N),
                'section'   => $this->sections['Facebook']['id'],
                'type'      => 'checkbox',
                'desc'      => __('Add Open Graph meta data to your site\'s <code>&lt;head&gt;</code> section.', ALISIOS_I18N),
                //sanitize
                'error'     => __('Open Graph Facebook Checkbox failed because of yes.', ALISIOS_I18N),
            ),

            'opengraph_default_image' => array(
                'id'        => 'opengraph_default_image',
                'label'     => __('Default Open Graph Image URL', ALISIOS_I18N),
                'section'   => $this->sections['Facebook']['id'],
                'type'      => 'textinput',
                'desc'      => __('This image is used if the page being shared does not contain any images.', ALISIOS_I18N),
                'placeholder' => 'http://mysite.com/wp-content/uploads/default-image.png',
                //sanitize
                'error'     => __('Open Graph Image URL is weird.', ALISIOS_I18N),
            ),

            'facebook_app_id' => array(
                'id'        => 'facebook_app_id',
                'label'     => __('Facebook App ID', ALISIOS_I18N),
                'section'   => $this->sections['Facebook']['id'],
                'type'      => 'textinput',
                'desc'      => __('If you have a Facebook page for your business, add that URL here and link it on your Facebook page.', ALISIOS_I18N),
                'placeholder' => '123456789012345',
                //sanitize
                'error'     => __('Facebook App ID is weird.', ALISIOS_I18N),
            ),

            'facebook_publisher' => array(
                'id'        => 'facebook_publisher',
                'label'     => __('Facebook Page', ALISIOS_I18N),
                'section'   => $this->sections['Facebook']['id'],
                'type'      => 'textinput',
                'desc'      => __('If you have a Facebook page for your business, add that URL here and link it on your Facebook page.', ALISIOS_I18N),
                'placeholder' => 'https://www.facebook.com/[Facebook_Page]',
                //sanitize
                'error'     => __('Facebook Publisher URL is weird.', ALISIOS_I18N),
            ),

            'facebook_author' => array(
                'id'        => 'facebook_author',
                'label'     => __('Facebook Author Page', ALISIOS_I18N),
                'section'   => $this->sections['Facebook']['id'],
                'type'      => 'textinput',
                'desc'      => __('If you have a Facebook profile, add that URL here and link it on your Facebook page\'s about page.', ALISIOS_I18N),
                'placeholder' => 'https://plus.google.com/[Facebook_Profile]',
                //sanitize
                'error'     => __('Facebook Author URL is weird.', ALISIOS_I18N),
            ),

            //TWITTER

            'use_twitter' => array(
                'id'        => 'use_twitter',
                'label'     => __('Add Twitter meta data?', ALISIOS_I18N),
                'section'   => $this->sections['Twitter']['id'],
                'type'      => 'checkbox',
                'desc'      => __('Add Twitter meta data to your site\'s <code>&lt;head&gt;</code> section.', ALISIOS_I18N),
                'extra'      => __('Note that for the Twitter Cards to work, you have to check the box and then <a target="_blank" href="https://dev.twitter.com/docs/cards/validation/validator">validate your Twitter Cards</a>.', ALISIOS_I18N),
                //sanitize
                'error'     => __('Twitter Checkbox failed because of yes.', ALISIOS_I18N),
            ),

            'twitter_site_username' => array(
                'id'        => 'twitter_site_username',
                'label'     => __('Site Twitter Username', ALISIOS_I18N),
                'section'   => $this->sections['Twitter']['id'],
                'type'      => 'textinput',
                'desc'      => '@',
                'placeholder' => 'site_username',
                'addon'     => true,
                'addon_left'=> true,
                //sanitize
                'error'     => __('Google+ Publisher URL is weird.', ALISIOS_I18N),
            ),

            'twitter_card_type' => array(
                'id'        => 'twitter_card_type',
                'label'     => __('The default card type to use', ALISIOS_I18N),
                'section'   => $this->sections['Twitter']['id'],
                'type'      => 'select',
                'desc'      => '',
                'options'   => array(
                    'summary'             => __('Summary', ALISIOS_I18N),
                    'summary_large_image' => __('Summary with Large Image', ALISIOS_I18N),
                    //'product'             => __('Product', ALISIOS_I18N),
                    //'photo'               => __('Photo', ALISIOS_I18N),
                    //'gallery'             => __('Gallery', ALISIOS_I18N),
                    //'player'              => __('Player', ALISIOS_I18N),
                    //'app'                 => __('App', ALISIOS_I18N),
                ),
                //sanitize
                'error'     => __('Google+ Publisher URL is weird.', ALISIOS_I18N),
            ),

            //GOOGLE+

            'use_googleplus' => array(
                'id'        => 'use_googleplus',
                'label'     => __('Add Google+ meta data?', ALISIOS_I18N),
                'section'   => $this->sections['GooglePlus']['id'],
                'type'      => 'checkbox',
                'desc'      => __('Add Schema meta data to your site\'s <code>&lt;head&gt;</code> section.', ALISIOS_I18N),
                //sanitize
                'error'     => __('Google+ Checkbox failed because of yes.', ALISIOS_I18N),
            ),

            'googleplus_publisher' => array(
                'id'        => 'googleplus_publisher',
                'label'     => __('Google+ Publisher Page', ALISIOS_I18N),
                'section'   => $this->sections['GooglePlus']['id'],
                'type'      => 'textinput',
                'desc'      => __('If you have a Google+ page for your business, add that URL here and link it on your Google+ page\'s about page.', ALISIOS_I18N),
                'placeholder' => 'https://plus.google.com/[Google+_Page_Profile]',
                //sanitize
                'error'     => __('Google+ Publisher URL is weird.', ALISIOS_I18N),
            ),

            'googleplus_author' => array(
                'id'        => 'googleplus_author',
                'label'     => __('Google+ Author Page', ALISIOS_I18N),
                'section'   => $this->sections['GooglePlus']['id'],
                'type'      => 'textinput',
                'desc'      => __('If you have a Google+ profile, add that URL here and link it on your Google+ page\'s about page.', ALISIOS_I18N),
                'placeholder' => 'https://plus.google.com/[Google+_Profile]/posts]',
                //sanitize
                'error'     => __('Google+ Author URL is weird.', ALISIOS_I18N),
            ),


        );
    }

    /*
     * Register Admin Social Page & Menu
     */
    public function register_admin_social_page() {
        //init
        if(isset($_GET['page']) && $_GET['page'] == $this->page_slug) {
            add_action('admin_enqueue_scripts', array('AlisiosAdmin', 'admin_enqueue_style_and_script'));
        }

        //Add Menu Page, 66 => Between Plugin and Users
        add_menu_page( _('Alisios: Social', ALISIOS_I18N), _('Social', ALISIOS_I18N), 'manage_options', $this->page_slug, array($this, 'create_admin_page'), 'dashicons-share', 66);
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
    public function register_social_options() {

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
                AlisiosAdmin::textinput($args['var'], $args['label'], $args['option'], $args['placeholder'], $args['addon'], $args['addon_left']);
                break;
            case 'select':
                AlisiosAdmin::select($args['var'], $args['label'], $args['option'], $args['options']);
                break;
        }

    }

}