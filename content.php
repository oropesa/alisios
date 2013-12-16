<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<header class="post-header">

	<?php if ( is_single() ) : ?>
		<h1 class="post-title entry-title" data-text="<?php the_title(); ?>"><?php the_title(); ?></h1>
	<?php else : ?>
		<h1 class="post-title entry-title" data-text="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<?php endif; ?>

</header><!-- /.post-header -->

<section class="article-content">

	<?php the_content(); ?>

</section><!-- /.article-content -->