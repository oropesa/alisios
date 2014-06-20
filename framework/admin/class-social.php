<?php
class AlisiosAdminSocial extends AlisiosAdminClassTemplate {

    public $page_slug   = 'alisios-setting-social';
    public $opt_name    = 'alisios_social';
    public $opt_icon    = 'dashicons-share';

    /* Define Options (Sections & Fields)
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
     * Load Admin Social Page & Menu
     */
    public function loadAdminPage() {
        //Add Menu Page, 66 => Between Plugin and Users
        add_menu_page( __('Alisios: Social', ALISIOS_I18N), __('Social', ALISIOS_I18N), 'manage_options', $this->page_slug, array($this, 'create_admin_page'), $this->opt_icon, 66);
    }

}