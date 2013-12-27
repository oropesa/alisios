<?php
/**
 * Languages, I18n
 * Hooks & Filters
 */

require_once('functions.php');

add_action('after_setup_theme', array('AlisiosLanguage', 'load_i18n'));