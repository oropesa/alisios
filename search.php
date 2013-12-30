<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" class="content col-xs-12 col-sm-8" role="main">

        <header class="page-header">

            <h1 class="page-title">
                <?php printf( __( 'Search Results for: %s', 'alisios' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>

        </header><!-- /.page-header -->

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php else : ?>

            <?php get_template_part( 'loop', 'empty' ); ?>

        <?php endif; ?>


    </section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>