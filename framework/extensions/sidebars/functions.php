<?php
class AlisiosSidebars {
    /*
     * Hook
     * Register sidebars for host widgets
     */
    public static function sidebars_init() {
        // The sidebar
        register_sidebar( array(
            'name'          => __( 'Sidebar', 'alisios' ),
            'id'            => 'primary-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );

        // The footer
        register_sidebar( array(
            'name'          => __( 'Footer #1', 'alisios' ),
            'id'            => 'footer-sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer #2', 'alisios' ),
            'id'            => 'footer-sidebar-2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer #3', 'alisios' ),
            'id'            => 'footer-sidebar-3',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</aside>',
            'before_title' 	=> '<h2 class="widgettitle">',
            'after_title' 	=> '</h2>',
        ) );
    }
}