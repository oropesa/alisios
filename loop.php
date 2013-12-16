<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div id="content" class="post-wrap">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" >

            <?php if ( is_page() ) : ?>
                <?php get_template_part( 'content', 'page' ); ?>
            <?php else : ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endif; ?>

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; ?>

</div><!--/.post-wrap-->