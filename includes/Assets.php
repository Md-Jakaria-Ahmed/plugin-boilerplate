<?php

namespace WeLabs\Plugintemplate;

class Assets {
    /**
     * The constructor.
     */
    public function __construct() {
        add_action( 'init', [ $this, 'register_all_scripts' ], 10 );

        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ], 10 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_front_scripts' ] );
        }
    }

    /**
     * Register all Dokan scripts and styles.
     *
     * @return void
     */
    public function register_all_scripts() {
        $this->register_styles();
        $this->register_scripts();
    }

    /**
     * Register scripts.
     *
     * @param array $scripts
     *
     * @return void
     */
    public function register_scripts() {
        $admin_script       = PLUGINTEMPLATE_PLUGIN_ASSET . '/admin/script.js';
        $frontend_script    = PLUGINTEMPLATE_PLUGIN_ASSET . '/frontend/script.js';

        wp_register_script( 'plugintemplate_admin_script', $admin_script, [], filemtime( PLUGINTEMPLATE_DIR . '/assets/admin/script.js' ), true );
        wp_register_script( 'plugintemplate_script', $frontend_script, [], filemtime( PLUGINTEMPLATE_DIR . '/assets/frontend/script.js' ), true );
    }

    /**
     * Register styles.
     *
     * @return void
     */
    public function register_styles() {
        $admin_style       = PLUGINTEMPLATE_PLUGIN_ASSET . '/admin/style.css';
        $frontend_style    = PLUGINTEMPLATE_PLUGIN_ASSET . '/frontend/style.css';

        wp_register_style( 'plugintemplate_admin_style', $admin_style, [], filemtime( PLUGINTEMPLATE_DIR . '/assets/admin/style.css' ) );
        wp_register_style( 'plugintemplate_style', $frontend_style, [], filemtime( PLUGINTEMPLATE_DIR . '/assets/frontend/style.css' ) );
    }

    /**
     * Enqueue admin scripts.
     *
     * @return void
     */
    public function enqueue_admin_scripts() {
        wp_enqueue_script( 'plugintemplate_admin_script' );
        wp_localize_script(
            'plugintemplate_admin_script', 'Plugintemplate_Admin', []
        );
    }

    /**
     * Enqueue front-end scripts.
     *
     * @return void
     */
    public function enqueue_front_scripts() {
        wp_enqueue_script( 'plugintemplate_script' );
        wp_localize_script(
            'plugintemplate_script', 'Plugintemplate', []
        );
    }
}
