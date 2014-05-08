<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <?php AlisiosHooks::content_before(); ?>

    <section id="primary" <?php content_class(); ?> role="main">

        <?php AlisiosHooks::content_top(); ?>

        <?php AlisiosHooks::content_entry_before(); ?>

        <div id="content" class="post-wrap">

            <?php AlisiosHooks::content_entry_top(); ?>

            <?php AlisiosHooks::entry_before(); ?>

            <article id="page-404" class="page not-found">

                <?php AlisiosHooks::entry_top(); ?>

                <header class="entry-header">

                    <?php AlisiosHooks::entry_header_top(); ?>

                    <h1 class="entry-title"><?php _e('Not Found. Error 404', ALISIOS_I18N); ?></h1>

                    <?php AlisiosHooks::entry_header_bottom(); ?>

                </header><!-- .entry-header -->

                <?php AlisiosHooks::entry_content_before(); ?>

                <section class="article-content">

                    <?php AlisiosHooks::entry_content_top(); ?>

                        <?php _e("<p>Apologies, at this location there are nothing and what you looking for no longer (or indeed never did) exists.</p><p>However, there are cool stuff here. Take a look!</p>", ALISIOS_I18N); ?>

                        <?php
                        get_search_form();

                        the_widget( 'WP_Widget_Recent_Posts' );
                        ?>

                    <?php AlisiosHooks::entry_content_bottom(); ?>

                </section><!-- .entry-content -->

                <?php AlisiosHooks::entry_content_after(); ?>

                <?php AlisiosHooks::entry_bottom(); ?>

            </article><!-- #page-404 -->

            <?php AlisiosHooks::entry_after(); ?>

            <?php AlisiosHooks::content_entry_bottom(); ?>

        </div><!--/.post-wrap-->

        <?php AlisiosHooks::content_entry_after(); ?>

        <?php AlisiosHooks::content_bottom(); ?>

    </section>

    <?php AlisiosHooks::content_after(); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>