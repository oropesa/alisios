<?php
/**
 * Less
 * Hooks & Filters
 */

require_once('functions.php');

add_action( 'wp_enqueue_scripts',   array('AlisiosLess', 'add_stylesheet'));

add_filter( 'style_loader_tag',     array('AlisiosLess', 'wp_enqueue_styles_less'), 5, 2);