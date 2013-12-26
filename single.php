<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" class="content col-xs-12 col-sm-12 col-md-12" role="main">

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php endif; ?>

    </section>

<?php get_footer(); ?>