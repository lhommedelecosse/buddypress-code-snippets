@@ -0,0 +1,48 @@
<?php
/**
 * Plugin Name: BP Add Page
 * Plugin URI:  https://webdevstudios.com
 * Description: Example on adding a page to BuddyPress profiles
 * Author:      WebDevStudios
 * Author URI:  https://webdevstudios.com
 * Version:     1.0.0
 * License:     GPLv2
 */


/**
 * adds the profile user nav link
 */
function bp_custom_user_nav_item() {
    global $bp;

    $args = array(
            'name' => __('Portfolio', 'buddypress'),
            'slug' => 'portfolio',
            'default_subnav_slug' => 'portfolio',
            'position' => 50,
            'screen_function' => 'bp_custom_user_nav_item_screen',
            'item_css_id' => 'portfolio'
    );

    bp_core_new_nav_item( $args );
}
add_action( 'bp_setup_nav', 'bp_custom_user_nav_item', 99 );

/**
 * the calback function from our nav item arguments
 */
function bp_custom_user_nav_item_screen() {
    add_action( 'bp_template_content', 'bp_custom_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

/**
 * the function hooked to bp_template_content, this hook is in plugns.php
 */
function bp_custom_screen_content() {

   echo '<p>The custom content.
    You can put a post loop here or something else</P>';

}