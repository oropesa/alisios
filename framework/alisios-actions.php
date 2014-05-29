<?php

/*
 * SETUP
 */
add_action('after_setup_theme',         array('AlisiosFunctionsSetup',      'load_i18n'));
add_action('widgets_init',              array('AlisiosFunctionsSidebar',    'register_sidebars'));

/*
 * HEAD
 */
add_action('alisios_html_before',       array('AlisiosFunctionsHead',   'doctype'));
add_filter('language_attributes',       array('AlisiosFunctionsHead',   'add_html_namespace'));

add_action('alisios_head_top',          array('AlisiosFunctionsHead',   'metas_top'));
add_action('alisios_head_bottom',       array('AlisiosFunctionsHead',   'canonical'), 10, 1);
remove_action('wp_head',                'rel_canonical' );

add_action('alisios_head_bottom',       array('AlisiosFunctionsSocial', 'social_tags'));

add_filter('wp_title',                  array('AlisiosFunctionsHead',   'wp_title'), 10, 2);
add_filter('alisios_description',       array('AlisiosFunctionsHead',   'description'));

add_action('wp_enqueue_scripts',        array('AlisiosFunctionsHead',   'enqueue_scripts_and_stylesheet'));
add_filter('style_loader_tag',          array('AlisiosFunctionsHead',   'wp_enqueue_styles_less'), 5, 2);

/*
 * HEADER
 */
add_action('alisios_header_site_in',    array('AlisiosFunctionsHeader', 'site'));

/*
 * FOOTER
 */
add_action('alisios_footer_in',         array('AlisiosFunctionsFooter', 'credits'), 20);
add_action('alisios_footer_in',         array('AlisiosFunctionsFooter', 'widget'),  10);

/*
 * ADMIN
 */
if(is_admin() ) {
    $AlisiosAdminSocial = new AlisiosAdminSocial();
}