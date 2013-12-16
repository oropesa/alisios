<?php
// File Security Check
if( !function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>

<?php get_header(); ?>

    <section id="primary" role="main">

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php else : ?>

            <?php get_template_part( 'loop', 'empty' ); ?>

        <?php endif; ?>

    </section>

<?php get_footer(); ?>