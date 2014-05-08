<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <?php AlisiosHooks::content_before(); ?>

    <section id="primary" <?php content_class(); ?> role="main">

        <?php AlisiosHooks::content_top(); ?>

        <header class="page-header">

            <?php AlisiosHooks::entry_header_top(); ?>

            <h1 class="page-title">
                <?php printf( __( 'Search Results for: %s', ALISIOS_I18N ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>

            <?php AlisiosHooks::entry_header_bottom(); ?>

        </header><!-- /.page-header -->

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