<?php
/**
 * Sidebars for Widgets
 * Hooks & Filters
 */

require_once('functions.php');

add_action( 'widgets_init', array('AlisiosSidebars', 'sidebars_init'));