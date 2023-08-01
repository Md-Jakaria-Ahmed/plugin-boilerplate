<?php
/**
 * Plugin Name: Plugintemplate
 * Plugin URI:  https://welabs.dev/
 * Description: this is using for customization
 * Version: 0.0.1
 * Author: Md Zakaria Ahmed
 * Author URI: https://welabs.dev/
 * Text Domain: plugintemplate
 * WC requires at least: 5.0.0
 * Domain Path: /languages/
 * License: GPL2
 */
use WeLabs\Plugintemplate\Plugintemplate;

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'PLUGINTEMPLATE_FILE' ) ) {
    define( 'PLUGINTEMPLATE_FILE', __FILE__ );
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load Plugintemplate Plugin when all plugins loaded
 *
 * @return \WeLabs\Plugintemplate\Plugintemplate;
 */
function welabs_plugintemplate() {
    return Plugintemplate::init();
}

// Lets Go....
welabs_plugintemplate();
