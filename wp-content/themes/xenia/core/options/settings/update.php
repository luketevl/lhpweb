<?php

if (class_exists('Envato_WP_Toolkit')) {
    $updater = get_option('envato-wordpress-toolkit');

    if ($updater && is_array($updater) && count($updater) != 0) {
        if ($updater['user_name'] && $updater['api_key']) {

            $this->sections[] = array(
                'title'     => __('Updates', THEME_SLUG),
                'icon'      => ' el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'    => 'update_success',
                        'type'  => 'info',
                        'title' => __('All Ok! Your theme updates is configured correctly', THEME_SLUG),
                        'style' => 'success',
                        'notice' => true,
                        // 'icon'  => 'el-icon-asl',
                        'icon'  => 'el-icon-ok',
                        'desc'  => __('To change your settings, visit <a href="?page=envato-wordpress-toolkit">this page</a>.', THEME_SLUG)
                    ),
                    array(
                        'id'   =>'updates_divider',
                        'type' => 'divide'
                    )
                )
            );

        } else {

            $this->sections[] = array(
                'title'     => __('Updates', THEME_SLUG),
                'icon'      => ' el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'    => 'update_warning',
                        'type'  => 'info',
                        'title' => __('Your Envato Keys is not set!', THEME_SLUG),
                        'style' => 'warning',
                        'notice' => true,
                        'icon'  => 'el-icon-warning-sign',
                        'desc'  => __('To enable update notifications, please visit <a href="?page=envato-wordpress-toolkit">this page</a>.', THEME_SLUG)
                    ),
                    array(
                        'id'   =>'updates_divider',
                        'type' => 'divide'
                    )
                )
            );

        }
    } else {

        $this->sections[] = array(
            'title'     => __('Updates', THEME_SLUG),
            'icon'      => ' el-icon-refresh',
            'fields'    => array(
                array(
                    'id'    => 'update_warning',
                    'type'  => 'info',
                    'title' => __('Your Envato Keys is not set!', THEME_SLUG),
                    'style' => 'warning',
                    'notice' => true,
                    'icon'  => 'el-icon-warning-sign',
                    'desc'  => __('To enable update notifications, please visit <a href="?page=envato-wordpress-toolkit">this page</a>.', THEME_SLUG)
                ),
                array(
                    'id'   =>'updates_divider',
                    'type' => 'divide'
                )
            )
        );

    }

} else {
    $this->sections[] = array(
        'title'     => __('Updates', THEME_SLUG),
        'icon'      => ' el-icon-refresh',
        'fields'    => array(
            array(
                'id'    => 'update_warning',
                'type'  => 'info',
                'title' => __('Envato WordPress Toolkit plugin does not installed or it is not active.', THEME_SLUG),
                'style' => 'warning',
                'notice' => true,
                'icon'  => 'el-icon-warning-sign',
                'desc'  => __('To install or activate Envato WordPress Toolkit plugin, please visit <a href="?page='.THEME_SLUG.'-plugin-activator">this page</a>.', THEME_SLUG)
            ),
            array(
                'id'   =>'updates_divider',
                'type' => 'divide'
            )
        )
    );
}