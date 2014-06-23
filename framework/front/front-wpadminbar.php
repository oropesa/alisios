<?php
add_filter('show_admin_bar', function() {

    $adminBarOptions = get_option('alisios_wpadminbar', []);

    //Not configure
    if( empty($adminBarOptions) )
        return false;

    //Not enable
    if( empty($adminBarOptions['show_wpadminbar']) )
        return false;

    //Enable
    if( $adminBarOptions['show_wpadminbar'] === 'on' )
        return true;

    //Default
    return false;
});