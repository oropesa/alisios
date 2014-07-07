<?php

/* SETUP
 */
add_action('after_setup_theme',         array('AlisiosFrontSetup',      'load_i18n'));
add_action('widgets_init',              array('AlisiosFrontSidebar',    'register_sidebars'));

/* HEAD
 */
add_action('alisios_html_before',       array('AlisiosFrontHead',       'doctype'));
add_filter('language_attributes',       array('AlisiosFrontSocial',     'add_html_namespace'));

add_action('alisios_head_top',          array('AlisiosFrontHead',       'metas_top'));
add_action('alisios_head_bottom',       array('AlisiosFrontHead',       'canonical'),   10, 1);
remove_action('wp_head',                'rel_canonical' );

add_action('alisios_head_bottom',       array('AlisiosFrontSocial',     'social_tags'));

add_filter('wp_title',                  array('AlisiosFrontHead',       'wp_title'),    10, 2);
add_filter('alisios_description',       array('AlisiosFrontHead',       'description'));

add_action('wp_enqueue_scripts',        array('AlisiosFrontHead',       'enqueue_scripts_and_stylesheet'));
add_filter('style_loader_tag',          array('AlisiosFrontHead',       'wp_enqueue_styles_less'),  5, 2);

add_action('wp_head',              		array('AlisiosFrontCustomizer', 'render'));

/* HEADER
 */
add_action('alisios_header_site_in',    array('AlisiosFrontHeader',             'site'),    20);
add_action('alisios_header_site_in',    array('AlisiosAdminCustomizerHeader',   'brand'),   10);

/* NAVIGATOR
 */
add_action('after_setup_theme',         array('AlisiosFrontNav', 'register'),                   30);
add_action('wp_update_nav_menu_item',   array('AlisiosFrontNav', 'update_custom_nav_fields'),   10, 3);
add_filter('wp_setup_nav_menu_item',    array('AlisiosFrontNav', 'add_custom_nav_fields'),      10, 1);
add_filter('wp_edit_nav_menu_walker',   array('AlisiosFrontNav', 'edit_nav_form_walker'),       10, 2);

add_action('alisios_header_before',     array('AlisiosFrontNav', 'main_navigation_before'));
add_action('alisios_header_after',      array('AlisiosFrontNav', 'main_navigation_after'));

/* FOOTER
 */
add_action('alisios_footer_before',     array('AlisiosFrontFooter', 'widget'),              10);
add_action('alisios_footer_in',         array('AlisiosFrontFooter', 'credits'),             20);
add_action('alisios_footer_in',         array('AlisiosFrontNav',    'footer_navigation'),   10);

/* ADMIN
 */
if(is_admin() ) {
    $AlisiosAdminSocial         = new AlisiosAdminSocial();
    $AlisiosAdminSeoConnection  = new AlisiosAdminSeoConnection();
    $AlisiosAdminWPAdminBar     = new AlisiosAdminWPAdminBar();
}

/* CUSTOMIZER
 */
$AlisiosAdminCustomBackground   = new AlisiosAdminCustomizerBackground();
$AlisiosAdminCustomHeader       = new AlisiosAdminCustomizerHeader();
$AlisiosAdminCustomFooter       = new AlisiosAdminCustomizerFooter();