<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php AlisiosHooks::sidebar_before(); ?>

<div id="secondary" <?php sidebar_class(); ?> role="complementary">
    <div class="sidebar-wrapper">

    <?php AlisiosHooks::sidebar_top(); ?>

        <?php dynamic_sidebar('primary-sidebar'); ?>

    <?php AlisiosHooks::sidebar_bottom(); ?>

    </div>
</div>

<?php AlisiosHooks::sidebar_after(); ?>