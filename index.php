<?php
// File Security Check
if( !function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>

<?php get_header(); ?>


Index!

<?php get_footer(); ?>