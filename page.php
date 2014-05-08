<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <?php AlisiosHooks::content_before(); ?>

    <section id="primary" <?php content_class(); ?> role="main">

        <?php AlisiosHooks::content_top(); ?>

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php endif; ?>

        <?php AlisiosHooks::content_bottom(); ?>

    </section>

    <?php AlisiosHooks::content_after(); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>