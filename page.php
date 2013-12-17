<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" role="main">

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php endif; ?>

    </section>

<?php get_footer(); ?>