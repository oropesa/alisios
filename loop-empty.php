<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php AlisiosHooks::content_entry_before(); ?>

<div id="content" class="post-wrap">

    <?php AlisiosHooks::content_entry_top(); ?>

    <?php AlisiosHooks::entry_before(); ?>

    <article id="post-0" class="post no-results not-found">

        <?php AlisiosHooks::entry_top(); ?>

        <header class="entry-header">

            <?php AlisiosHooks::entry_header_top(); ?>

            <h1 class="entry-title"><?php _e('Nothing Found', ALISIOS_I18N); ?></h1>

            <?php AlisiosHooks::entry_header_bottom(); ?>

        </header><!-- .entry-header -->

        <?php AlisiosHooks::entry_content_before(); ?>

        <section class="article-content">

            <?php AlisiosHooks::entry_content_top(); ?>

            <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', ALISIOS_I18N); ?></p>

            <?php get_search_form(); ?>

            <?php AlisiosHooks::entry_content_bottom(); ?>

        </section><!-- .entry-content -->

        <?php AlisiosHooks::entry_content_after(); ?>

        <?php AlisiosHooks::entry_bottom(); ?>

    </article><!-- #post-0 -->

    <?php AlisiosHooks::entry_after(); ?>

    <?php AlisiosHooks::content_entry_bottom(); ?>

</div><!--/.post-wrap-->

<?php AlisiosHooks::content_entry_after(); ?>