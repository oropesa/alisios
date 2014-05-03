<?php
// File Security Check
if( !function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>

<?php get_header(); ?>

    <?php AlisiosHooks::content_before(); ?>

    <section id="primary" class="content col-xs-12 col-sm-8" role="main">

        <?php AlisiosHooks::content_top(); ?>

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php else : ?>

            <?php get_template_part( 'loop', 'empty' ); ?>

        <?php endif; ?>

        <?php AlisiosHooks::content_bottom(); ?>

    </section>

    <?php AlisiosHooks::content_after(); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>