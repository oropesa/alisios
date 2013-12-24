<?php
/**
 * Bootstrap v3
 * Hooks & Filters
 */

require_once('functions.php');

add_action( 'wp_enqueue_scripts',   array('AlisiosBootstrap', 'add_script'));