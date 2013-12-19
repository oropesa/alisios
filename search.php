<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" role="main">

        <header class="page-header">

            <h1 class="page-title">
                Resultados de la búsqueda: <span><?php echo get_search_query() ?></span>
            </h1>

        </header><!-- /.page-header -->

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php else : ?>

            <?php get_template_part( 'loop', 'empty' ); ?>

        <?php endif; ?>


    </section>

<?php get_footer(); ?>