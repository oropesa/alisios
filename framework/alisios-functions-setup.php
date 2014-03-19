<?php

class AlisiosFunctionsSetup {

    /*
     * LANGUAGES
     */
    public static function load_i18n() {
        load_theme_textdomain( ALISIOS_I18N, ALISIOS_DIR_THEME . '/languages' );
    }

    /*
     * SIDEBARS
     */
    public static function register_sidebars() {
        // The Sidebar
        register_sidebar( array(
            'name'          => __('Sidebar', ALISIOS_I18N),
            'id'            => 'primary-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        // The Footer: 3 Columns
        register_sidebar( array(
            'name'          => __('Footer #1', ALISIOS_I18N),
            'id'            => 'footer-sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        register_sidebar( array(
            'name'          => __('Footer #2', ALISIOS_I18N),
            'id'            => 'footer-sidebar-2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        register_sidebar( array(
            'name'          => __('Footer #3', ALISIOS_I18N),
            'id'            => 'footer-sidebar-3',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );
    }
}