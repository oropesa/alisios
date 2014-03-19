<?php

/*
 * SETUP
 */
add_action('after_setup_theme', array('AlisiosFunctionsSetup', 'load_i18n'));
add_action('widgets_init',      array('AlisiosFunctionsSetup', 'register_sidebars'));

/*
 * HEAD
 */

add_action( 'wp_enqueue_scripts',   array('AlisiosFunctionsHead', 'enqueue_scripts_and_stylesheet'));
add_filter( 'style_loader_tag',     array('AlisiosFunctionsHead', 'wp_enqueue_styles_less'), 5, 2);