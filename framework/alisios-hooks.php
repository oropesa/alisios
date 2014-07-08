<?php
/**
 * Alisios Hooks
 * Action hooks used in the Alisios theme.
 */
require_once(ALISIOS_DIR_INC . '/tha-theme-hooks.php');

class AlisiosHooks {

    /**
     * Alisios Hooks Setup
     */
    public static function setup() {
        add_theme_support('alisios_hooks', array(
            /**
             * As a Theme developer, use the 'all' parameter, to declare support for all
             *  hook types.
             * Please make sure you then actually reference all the hooks in this file,
             * Plugin developers depend on it!
             */
            'all',
            /**
             * If/when WordPress Core implements similar methodology, Themes and Plugins
             *  will be able to check whether the version of Alisios Hook supplied by
             *  the theme supports Core hooks.
             */
            // 'html',
            // 'head',
            // 'body',
            // 'wrapper',
            // 'header',
            // 'content',
            // 'content-entry',
            // 'entry',
            // 'footer',
        ) );
    }

    /**
     * Alisios Hooks Theme Support
     */
    public static function current_theme_support($bool, $args, $registered) {
        /**
         * Determines, whether the specific hook type is actually supported.
         *
         * Plugin developers should always check for the support of a <strong>specific</strong>
         * hook type before hooking a callback function to a hook of this type.
         *
         * Example:
         * <code>
         * 		if ( current_theme_supports( 'alisios_hooks', 'header' ) )
         * 	  		add_action( 'alisios_head_top', 'prefix_header_top' );
         * </code>
         *
         * @param bool $bool true
         * @param array $args The hook type being checked
         * @param array $registered All registered hook types
         *
         * @return bool
         */
        return in_array( 'all', $registered[0] ) || in_array( $args[0], $registered[0] );
        /**
         * Filter to call this function in the bottom of this file.
         */
    }

    /**
     * Alisios HTML
     */
    public static function html_before() {
        do_action( 'alisios_html_before' );
        tha_html_before();
    }

    /**
     * Alisios HEAD
     */
    public static function head_top() {
        do_action( 'alisios_head_top' );
        tha_head_top();
    }

    public static function head_bottom() {
        do_action( 'alisios_head_bottom' );
        tha_head_bottom();
    }

    /**
     * Alisios BODY
     */
    public static function body_top() {
        do_action( 'alisios_body_top' );
        tha_body_top();
    }

    public static function body_bottom() {
        do_action( 'alisios_body_bottom' );
        tha_body_bottom();
    }

    /**
     * Alisios WRAPPER
     */
    public static function wrapper_before() {
        do_action( 'alisios_wrapper_before' );
    }

    public static function wrapper_after() {
        do_action( 'alisios_wrapper_after' );
    }


    /**
     * Alisios HEADER
     */
    public static function header_before() {
        do_action( 'alisios_header_before' );
        tha_header_before();
    }

    public static function header_after() {
        do_action( 'alisios_header_after' );
        tha_header_after();
    }

    public static function header_top() {
        do_action( 'alisios_header_top' );
        tha_header_top();
    }

    public static function header_bottom() {
        do_action( 'alisios_header_bottom' );
        tha_header_bottom();
    }

    public static function header_site_before() {
        do_action( 'alisios_header_site_before' );
    }

    public static function header_site_after() {
        do_action( 'alisios_header_site_after' );
    }

    public static function header_site_in() {
        do_action( 'alisios_header_site_in' );
    }

    /**
     * Alisios NAVIGATION
     */
    function navigation_before() {
        do_action( 'alisios_navigation_before' );
    }

    function navigation_after() {
        do_action( 'alisios_navigation_after' );
    }

    function navigation_top() {
        do_action( 'alisios_navigation_top' );
    }

    function navigation_bottom() {
        do_action( 'alisios_navigation_bottom' );
    }

    function navigation_in() {
        do_action( 'alisios_navigation_in' );
    }

    /**
     * Alisios CONTENT
     */

    public static function content_wrapper_top() {
        do_action( 'alisios_content_wrapper_top' );
    }

    public static function content_wrapper_bottom() {
        do_action( 'alisios_content_wrapper_bottom' );
    }

    public static function content_before() {
        do_action( 'alisios_content_before' );
        tha_content_before();
    }

    public static function content_after() {
        do_action( 'alisios_content_after' );
        tha_content_after();
    }

    public static function content_top() {
        do_action( 'alisios_content_top' );
        tha_content_top();
    }

    public static function content_bottom() {
        do_action( 'alisios_content_bottom' );
        tha_content_bottom();
    }

    /**
     * Alisios CONTENT ENTRY
     */
    public static function content_entry_top() {
        do_action( 'alisios_content_entry_top' );
    }

    public static function content_entry_bottom() {
        do_action( 'alisios_content_entry_bottom' );
    }

    public static function content_entry_before() {
        do_action( 'alisios_content_entry_before' );
    }

    public static function content_entry_after() {
        do_action( 'alisios_content_entry_after' );
    }


    /**
     * Alisios ENTRY
     */
    public static function entry_before() {
        do_action( 'alisios_entry_before' );
        tha_entry_before();
    }

    public static function entry_after() {
        do_action( 'alisios_entry_after' );
        tha_entry_after();
    }

    public static function entry_top() {
        do_action( 'alisios_entry_top' );
        tha_entry_top();
    }

    public static function entry_bottom() {
        do_action( 'alisios_entry_bottom' );
        tha_entry_bottom();
    }

    public static function entry_header_top() {
        do_action( 'alisios_entry_header_top' );
    }

    public static function entry_header_bottom() {
        do_action( 'alisios_entry_header_bottom' );
    }

    public static function entry_content_before() {
        do_action( 'alisios_entry_content_before' );
    }

    public static function entry_content_after() {
        do_action( 'alisios_entry_content_after' );
    }

    public static function entry_content_top() {
        do_action( 'alisios_entry_content_top' );
    }

    public static function entry_content_bottom() {
        do_action( 'alisios_entry_content_bottom' );
    }

    /**
     * Alisios SIDEBAR
     */
    public static function sidebar_before() {
        do_action( 'alisios_sidebar_before' );
        tha_sidebars_before();
    }

    public static function sidebar_after() {
        do_action( 'alisios_sidebar_after' );
        tha_sidebars_after();
    }

    public static function sidebar_top() {
        do_action( 'alisios_sidebar_top' );
        tha_sidebar_top();
    }

    public static function sidebar_bottom() {
        do_action( 'alisios_sidebar_bottom' );
        tha_sidebar_bottom();
    }

    /**
     * Alisios FOOTER SIDEBAR
     */
    public static function sidebar_footer_content_before() {
        do_action( 'alisios_sidebar_footer_content_before' );
    }

    public static function sidebar_footer_content_after() {
        do_action( 'alisios_sidebar_footer_content_after' );
    }

    public static function sidebar_footer_content_top() {
        do_action( 'alisios_sidebar_footer_content_top' );
    }

    public static function sidebar_footer_content_bottom() {
        do_action( 'alisios_sidebar_footer_content_bottom' );
    }

    /**
     * Alisios FOOTER
     */
    public static function footer_before() {
        do_action( 'alisios_footer_before' );
        tha_footer_before();
    }

    public static function footer_after() {
        do_action( 'alisios_footer_after' );
        tha_footer_after();
    }

    public static function footer_top() {
        do_action( 'alisios_footer_top' );
        tha_footer_top();
    }

    public static function footer_bottom() {
        do_action( 'alisios_footer_bottom' );
        tha_footer_bottom();
    }

    public static function footer_in() {
        do_action( 'alisios_footer_in' );
    }

    /**
     * Alisios CUSTOMIZER
     */
    public static function customizer_render() {
        do_action( 'alisios_customizer_render' );
    }
    public static function customizer_desktop_render() {
        do_action( 'alisios_customizer_desktop_render' );
    }
}

/**
 * Declare add_theme_support
 */
add_action( 'after_setup_theme',                    array('AlisiosHooks', 'setup'));
/**
 * Filter when call for current_theme_support('alisios_hook');
 */
add_filter( 'current_theme_supports-alisios_hooks', array('AlisiosHooks', 'current_theme_supports'), 10, 3 );