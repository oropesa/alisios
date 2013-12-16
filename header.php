<?php if(!defined( 'ABSPATH' )) exit; // Exit if accessed directly ?>

<html <?php language_attributes(); ?> >
<head>
    <title><?php wp_title( '/', true, 'right' ); ?></title>

    <!-- BEG wp_head -->
    <?php wp_head(); ?>
    <!-- END wp_head -->
</head>

<body <?php body_class(); ?>>

<div class="outer-wrap">

    <div class="inner-wrap">

        <header class="header" role="banner" >

            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
            </h1>

            <h2 class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>

        </header>

        <div id="page" class="content-wrapper">