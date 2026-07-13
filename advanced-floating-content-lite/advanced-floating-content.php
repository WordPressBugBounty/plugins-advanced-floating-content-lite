<?php
/**
 * The plugin bootstrap file
 *
 * @link              http://www.codetides.com/
 * @since             1.2.9
 * @package           Advanced_Floating_Content
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Floating Content
 * Plugin URI:        http://www.codetides.com/advanced-floating-content/
 * Description:       Advanced Floating Content Plugin is an all in one plugin with easy to use controls, helps you demonstrate sticky footer or sticky header warning, imparting social networking connections. High level responsiveness and so on.
 * Version:           1.2.9
 * Author:            Code Tides
 * Author URI:        http://www.codetides.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-floating-content
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// =============================================
// FREEMIUS SDK — Opt-in tracking for lite version
// =============================================
if ( ! function_exists( 'afcl_fs' ) ) {
    function afcl_fs() {
        global $afcl_fs;

        if ( ! isset( $afcl_fs ) ) {
            require_once dirname( __FILE__ ) . '/freemius/start.php';

            $afcl_fs = fs_dynamic_init( array(
                'id'                  => '938',
                'slug'                => 'advanced-floating-content-lite',
                'premium_slug'        => 'advanced-floating-content-premium',
                'type'                => 'plugin',
                'public_key'          => 'pk_d0d30fde7e47afa1195e022d63979',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'is_org_compliant'    => true,
                'menu'                => array(                    
                    'support' => false,
                    'parent'  => array(
                        'slug' => 'edit.php?post_type=ct_afc',
                    ),
                ),
            ) );
        }

        return $afcl_fs;
    }

    afcl_fs();
    do_action( 'afcl_fs_loaded' );
}
// =============================================

/**
 * Activation hook
 */
function activate_advanced_floating_content() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-floating-content-activator.php';
    Advanced_Floating_Content_Activator::activate();
}

/**
 * Deactivation hook
 */
function deactivate_advanced_floating_content() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-floating-content-deactivator.php';
    Advanced_Floating_Content_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advanced_floating_content' );
register_deactivation_hook( __FILE__, 'deactivate_advanced_floating_content' );

/**
 * Core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-floating-content.php';

/**
 * Run the plugin
 */
function run_advanced_floating_content() {
    $plugin = new Advanced_Floating_Content();
    $plugin->run();
}
run_advanced_floating_content();