<?php
class AlisiosAdminSeoConnection extends AlisiosAdminClassTemplate {

    public $page_slug   = 'alisios-setting-seoconnection';
    public $opt_name    = 'alisios_seoconnection';
    public $opt_group   = 'alisios_group';

    /* Define Options (Sections & Fields)
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

    /* Load Admin Page & Menu
     */
    public function loadAdminPage() {
        //Add Menu Page, 66 => Between Plugin and Users
        add_management_page( __('Seo Connection', ALISIOS_I18N), __('Seo Connection', ALISIOS_I18N), 'manage_options', $this->page_slug, array($this, 'create_admin_page'));
    }

}