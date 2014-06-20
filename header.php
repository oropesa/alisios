<?php if(!defined( 'ABSPATH' )) exit; // Exit if accessed directly ?>

<?php AlisiosHooks::html_before(); ?>
<html <?php language_attributes(); ?> >
<head>
<?php AlisiosHooks::head_top(); ?>

<title><?php wp_title( '/', true, 'right' ); ?></title>
<?php alisios_description(); ?>

<?php AlisiosHooks::head_bottom(); ?>

<!-- BEG wp_head -->
<?php wp_head(); ?>
<!-- END wp_head -->
</head>

<body <?php body_class(); ?>>

<?php AlisiosHooks::body_top(); ?>

<div class="outer-wrap">

    <?php AlisiosHooks::wrapper_before(); ?>

    <div class="inner-wrap">

        <?php AlisiosHooks::header_before(); ?>

        <header class="header" role="banner" >

            <?php AlisiosHooks::header_top(); ?>

            <div class="header-container container">

                <?php AlisiosHooks::header_site_before(); ?>

                <div id="site" <?php site_class(); ?>>

                    <?php AlisiosHooks::header_site_in(); ?>

                </div>

                <?php AlisiosHooks::header_site_after(); ?>

            </div>

            <?php AlisiosHooks::header_bottom(); ?>

        </header>

        <?php AlisiosHooks::header_after(); ?>

        <div id="page" class="content-wrapper">

            <?php AlisiosHooks::content_wrapper_top(); ?>

            <div class="content-container container">