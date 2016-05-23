<?php

namespace PhoenixTeam;

class Theme_admin {

    public function __construct ()
    {
        $this->includeEnqueues();
        add_action('admin_menu', array($this, 'simplify_admin_UI'), 99);
    }

    public function includeEnqueues ()
    {
        require_once THEME_ADMIN . '/enqueues/admin_scripts.php';
        require_once THEME_ADMIN . '/enqueues/admin_styles.php';
    }

    public function simplify_admin_UI ()
    {
        if (class_exists('RevSliderAdmin')) {
            remove_menu_page( 'themepunch-google-fonts' );
        }

        if (class_exists('Envato_WP_Toolkit')){
            remove_menu_page( 'envato-wordpress-toolkit' );
        }

    }    

}

new Theme_admin();