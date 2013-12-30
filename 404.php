<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" class="content col-xs-12 col-sm-8" role="main">

        <article id="page-404" class="page not-found">

            <header class="entry-header">

                <h1 class="entry-title"><?php _e('Not Found. Error 404', 'alisios'); ?></h1>

            </header><!-- .entry-header -->

            <section class="article-content">

                <?php _e( "<p>Apologies, at this location there are nothing and what you looking for no longer (or indeed never did) exists.</p><p>However, there are cool stuff here. Take a look!</p>", 'alisios' ); ?>

                <?php
                get_search_form();

                the_widget( 'WP_Widget_Recent_Posts' );
                ?>

            </section><!-- .entry-content -->

        </article><!-- #page-404 -->

    </section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>