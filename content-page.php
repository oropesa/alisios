<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<header class="page-title entry-header">

    <?php AlisiosHooks::entry_header_top(); ?>

    <h1 class="page-title entry-title"><?php the_title(); ?></h1>

    <?php AlisiosHooks::entry_header_bottom(); ?>

</header><!-- /.post-header -->

<?php AlisiosHooks::entry_content_before(); ?>

<section class="page-content article-content">

    <?php AlisiosHooks::entry_content_top(); ?>

	<?php the_content(); ?>

    <?php AlisiosHooks::entry_content_bottom(); ?>

</section><!-- /.article-content -->

<?php AlisiosHooks::entry_content_after(); ?>