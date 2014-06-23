<?php
class AlisiosAdminWPAdminBar extends AlisiosAdminClassTemplate {

    public $page_slug   = 'general';
    public $opt_name    = 'alisios_wpadminbar';
    public $opt_group   = 'general';

    /* Define Options (Sections & Fields)
     */
    public function loadOptions() {
        $this->sections = array();

        $this->fields = array(

            'show_wpadminbar' => array(
                'id'        => 'show_wpadminbar',
                'label'     => __('WP Admin Bar', ALISIOS_I18N),
                'type'      => 'checkbox',
                'desc'      => __('Show the Admin Bar on the top of the website when you are logged.', ALISIOS_I18N),
                //sanitize
                'error'     => __('WP Admin Bar Checkbox failed because of yes.', ALISIOS_I18N),
            ),

        );

    }

}