<?php
include_once( ALISIOS_DIR_INC . '/alisios-walker-nav-menu-edit.php' );
include_once( ALISIOS_DIR_INC . '/alisios-walker-nav-menu-show.php' );

class AlisiosFrontNav {

    /* Register
     */
    public static function register() {
        // Main
        register_nav_menu( 'main', __('Main menu', 'alisios') );
        // Footer
        register_nav_menu( 'footer', __('Footer menu', 'alisios') );
    }

    /* Add custom fields in Admin Nav Menu
     */
    public static function add_custom_nav_fields( $menu_item ) {
        //Add FontAwesome Textinput
        $menu_item->fa_icon = get_post_meta( $menu_item->ID, '_menu_item_fa_icon', true );

        return $menu_item;
    }

    public static function update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
        //Update FontAwesome Textinput
        if ( is_array( $_REQUEST['menu-item-fa-icon']) ) {
            $fa_value = $_REQUEST['menu-item-fa-icon'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_fa_icon', $fa_value );
        }
    }

    function edit_nav_form_walker($walker,$menu_id) {
        //Change Walker with custom fields

        //  If you want to look for what I edited from Walker, search: 'ALISIOS EDIT' in includes/alisios-walker-nav-menu-edit.php
        return 'Alisios_Walker_Nav_Menu_Edit';
    }

    /* Get menu title
     */
    public static function get_menu_name( $location ) {
        if ( !has_nav_menu($location) )
            return false;

        $menus 		= get_nav_menu_locations();
        $menu_title = wp_get_nav_menu_object( $menus[$location] ) -> name;
        return $menu_title;
    }

    /* Main Navigation
     */
    public static function main_navigation_before() {
        $socialOptions = get_option('alisios_navigator', []);

        if(!has_nav_menu('main'))
            return;

        if(!empty($socialOptions) && $socialOptions['main_position'] === 'after')
            return;

        self::main_navigation();
    }

    public static function main_navigation_after() {
        $socialOptions = get_option('alisios_navigator', []);

        if(!has_nav_menu('main'))
            return;

        if(empty($socialOptions) || $socialOptions['main_position'] === 'before')
            return;

        self::main_navigation();
    }

    public static function main_navigation() {
        ?>

        <nav class="main-nav" id="navigation" role="navigation">

            <h2><a href="#" class="btn-menu"><?php echo self::get_menu_name( 'main' ); ?></a></h2>
            <?php wp_nav_menu( array(
                    'theme_location' => 'main',
                    'menu_class' => 'main-menu',
                    'walker' => new Alisios_Walker_Nav_Menu,
                    'fallback_cb' => '' )
            ); ?>

        </nav><!-- /.main-nav -->

        <?php
    }

    /* Footer Navigation
     */
    public static function footer_navigation() {
        ?>

        <div <?php footer_class( apply_filters('alisios_add_footer_navigation', 'footer-nav'), apply_filters('alisios_remove_footer_navigation', '')); ?>>

            <?php wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'walker' => new Alisios_Walker_Nav_Menu,
                    'fallback_cb' => '' )
            );?>

        </div>

        <?php
    }
}

