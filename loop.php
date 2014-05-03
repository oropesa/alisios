<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php AlisiosHooks::content_entry_before(); ?>

<div id="content" class="post-wrap">

    <?php AlisiosHooks::content_entry_top(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php AlisiosHooks::entry_before(); ?>

        <article id="post-<?php the_ID(); ?>" >

            <?php AlisiosHooks::entry_top(); ?>

            <?php if ( is_page() ) : ?>
                <?php get_template_part( 'content', 'page' ); ?>
            <?php else : ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endif; ?>

            <?php AlisiosHooks::entry_bottom(); ?>

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php AlisiosHooks::entry_after(); ?>

    <?php endwhile; ?>

    <?php AlisiosHooks::content_entry_bottom(); ?>

</div><!--/.post-wrap-->

<?php AlisiosHooks::content_entry_after(); ?>