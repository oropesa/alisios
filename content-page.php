<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<header class="page-header">

    <h1 class="page-title" data-text="<?php the_title(); ?>"><?php the_title(); ?></h1>

</header><!-- /.post-header -->

<section class="article-content">

	<?php the_content(); ?>

</section><!-- /.article-content -->