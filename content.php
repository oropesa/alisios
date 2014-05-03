<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<header class="post-header entry-header">

    <?php AlisiosHooks::entry_header_top(); ?>

    <h1 class="post-title entry-title">
	<?php if ( is_single() ) : ?>
		<?php the_title(); ?>
	<?php else : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
	<?php endif; ?>
    </h1>

    <?php AlisiosHooks::entry_header_bottom(); ?>

</header><!-- /.post-header -->

<?php AlisiosHooks::entry_content_before(); ?>

<section class="article-content">

    <?php AlisiosHooks::entry_content_top(); ?>

	<?php the_content(); ?>

    <?php AlisiosHooks::entry_content_bottom(); ?>

</section><!-- /.article-content -->

<?php AlisiosHooks::entry_content_after(); ?>