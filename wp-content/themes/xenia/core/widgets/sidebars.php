<?php

namespace PhoenixTeam;

class Sidebars {

    public function __construct ()
    {
        add_action('widgets_init', array($this, 'register_sidebars'));
        add_action('widgets_init', array($this, 'create_custom_sidebars'));
    }

    public function register_sidebars ()
    {
        global $data;
        $use_footer = isset($data['use_footer']) ? $data['use_footer'] : 1;
        $layout = isset($data['footer_layout']) ? $data['footer_layout'] : 3;

        // If Dynamic Sidebar Exists
        if (function_exists('register_sidebar'))
        {

            // Define Blog Sidebar
            register_sidebar(
                array(
                    'name' => __('Blog Sidebar', THEME_SLUG),
                    'description' => __('This widgets area is used for blog pages by default.', THEME_SLUG),
                    'id' => 'blog-sidebar',
                    'before_widget' => '<div id="%1$s" class="%2$s widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h4>'
                )
            );

            // Define WooCommerce Sidebar
            register_sidebar(
                array(
                    'name' => __('WooCommerce Sidebar', THEME_SLUG),
                    'description' => __('This widgets area is used for woocommerce shop by default.', THEME_SLUG),
                    'id' => 'woo-sidebar',
                    'before_widget' => '<div id="%1$s" class="%2$s widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h4>'
                )
            );

            if ($use_footer) {
                // Define Footer 1
                register_sidebar(
                    array(
                        'name' => __('Footer 1', THEME_SLUG),
                        'description' => __('This widgets area is used in footer.', THEME_SLUG),
                        'id' => 'footer-1',
                        'before_widget' => '<div id="%1$s" class="%2$s footer-widget">',
                        'after_widget' => '</div>',
                        'before_title' => '<h4 class="widget-title">',
                        'after_title' => '</h4>'
                    )
                );
                // Define Footer 2
                register_sidebar(
                    array(
                        'name' => __('Footer 2', THEME_SLUG),
                        'description' => __('This widgets area is used in footer.', THEME_SLUG),
                        'id' => 'footer-2',
                        'before_widget' => '<div id="%1$s" class="%2$s footer-widget">',
                        'after_widget' => '</div>',
                        'before_title' => '<h4 class="widget-title">',
                        'after_title' => '</h4>'
                    )
                );
                // Define Footer 3
                register_sidebar(
                    array(
                        'name' => __('Footer 3', THEME_SLUG),
                        'description' => __('This widgets area is used in footer.', THEME_SLUG),
                        'id' => 'footer-3',
                        'before_widget' => '<div id="%1$s" class="%2$s footer-widget">',
                        'after_widget' => '</div>',
                        'before_title' => '<h4 class="widget-title">',
                        'after_title' => '</h4>'
                    )
                );

                // Define Footer 4
                if ($layout == 4) {
                    register_sidebar(
                        array(
                            'name' => __('Footer 4', THEME_SLUG),
                            'description' => __('This widgets area is used in footer.', THEME_SLUG),
                            'id' => 'footer-4',
                            'before_widget' => '<div id="%1$s" class="%2$s footer-widget">',
                            'after_widget' => '</div>',
                            'before_title' => '<h4 class="widget-title">',
                            'after_title' => '</h4>'
                        )
                    );
                }
            }
        }
    }

    public function create_custom_sidebars ()
    {
        global $data;
        $custom_sidebars = isset($data['sidebars_list']) ? $data['sidebars_list'] : null;

        if($custom_sidebars && is_array($custom_sidebars)) {
            foreach ($custom_sidebars as $sidebar) {
                if ($sidebar) {
                    if (function_exists('register_sidebar')) {
                        register_sidebar(
                            array(
                                'name' => $sidebar,
                                'description' => __('This is your custom sidebar.', THEME_SLUG),
                                'id' => Utils::id_formatter(strtolower($sidebar)),
                                'before_widget' => '<div id="%1$s" class="%2$s widget">',
                                'after_widget' => '</div>',
                                'before_title' => '<h4 class="widget-title">',
                                'after_title' => '</h4>'
                            )
                        );
                    }
                }
            }
        }

    }

}

new Sidebars();