<?php

namespace PhoenixTeam;

class Scripts {

    public function __construct ()
    {
        global $data;

        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts')); // Add Custom Scripts to wp_head
        add_action('wp_enqueue_scripts', array($this, 'conditional_scripts')); // Add Conditional Page Scripts

        $analytics = isset($data['analytics_switch']) ? $data['analytics_switch'] : false;
        $ga_id = isset($data['ga_id']) ? $data['ga_id'] : null;
        $js_code = isset($data['js_code']) ? $data['js_code'] : false;

        // Add Google Analytics
        if ($analytics && $ga_id) {
            add_action('wp_footer', function () use ($ga_id) {
                echo "
                <script type='text/javascript'>
                    var _gaq = _gaq || []; _gaq.push(['_setAccount', '".$ga_id."']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
                </script>\n";
            },
            99);
        }

        // Add Custom JS
        if ($js_code) {
            add_action('wp_footer', function () use ($js_code) {
                echo '<script type="text/javascript">' . $js_code . '</script>';
            }, 99);
        }
    }

    // Load theme scripts
    public function enqueue_scripts ()
    {
        global $data, $template;

        $show_sticky_menu = isset($data['use_sticky']) ? $data['use_sticky'] : true;
        $port_layout = isset($data['port_layout']) ? $data['port_layout'] : '2-cols';

        switch ($port_layout) {
            case '2-cols': $cube_js = 'portfolio-2'; break;
            case '3-cols': $cube_js = 'portfolio-3'; break;
            case '4-cols': $cube_js = 'portfolio-4'; break;
            case 'full': $cube_js = 'portfolio-fullwidth'; break;
            default: $cube_js = 'portfolio-2'; break;
        }

        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            // In Header
            wp_register_script(THEME_SLUG . '-modernizr', THEME_URI . '/assets/js/modernizr.custom.js', array('jquery'), '1.0.0');

            // In Footer
            wp_register_script(THEME_SLUG . '-sticky', THEME_URI . '/assets/js/sticky.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-bxslider', THEME_URI . '/assets/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-retina', THEME_URI . '/assets/js/retina.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-jquery-cycle', THEME_URI . '/assets/js/jquery.cycle.all.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-jquery-parallax', THEME_URI . '/assets/js/jquery.parallax-1.1.3.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-jquery.cubeportfolio', THEME_URI . '/assets/js/jquery.cubeportfolio.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-portfolio', THEME_URI . '/assets/js/'. $cube_js .'.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-jcarousel-responsive', THEME_URI . '/assets/js/jcarousel.responsive.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-jquery-jcarousel', THEME_URI . '/assets/js/jquery.jcarousel.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-magnific-popup', THEME_URI . '/assets/js/magnific.popup.min.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-testimonialrotator', THEME_URI . '/assets/js/testimonialrotator.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-contact-form', THEME_URI . '/assets/js/contacts.js', array('jquery'), '1.0.0', true);
            wp_register_script(THEME_SLUG . '-main', THEME_URI . '/assets/js/main.js', array('jquery'), '1.0.0', true);

            // Localize scripts
            wp_localize_script('jquery', THEME_TEAM, Utils::javascript_globals());

            // Enqueue scripts
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-migrate');
            wp_enqueue_script(THEME_SLUG . '-modernizr');

            if ($show_sticky_menu) {
                wp_enqueue_script(THEME_SLUG . '-sticky');
            }

            wp_enqueue_script(THEME_SLUG . '-bootstrap');
            wp_enqueue_script(THEME_SLUG . '-bxslider');
            wp_enqueue_script(THEME_SLUG . '-retina');
            wp_enqueue_script(THEME_SLUG . '-jquery-cycle');
            wp_enqueue_script(THEME_SLUG . '-jquery-parallax');
            wp_enqueue_script(THEME_SLUG . '-jquery.cubeportfolio');

            $what_template = get_page_template_slug();
            if ($what_template == 'template-portfolio.php' || basename($template) == 'single-' . THEME_SLUG . '_portfolio.php') {
                $cubeportfolio = array(
                    'inlineError' => __("Error! Please refresh the page!", THEME_SLUG),
                    'moreLoading' => __("Loading...", THEME_SLUG),
                    'moreNoMore' => __("No More Works", THEME_SLUG)
                );
                wp_localize_script(THEME_SLUG . '-jquery.cubeportfolio', 'portSetts', $cubeportfolio);
                wp_enqueue_script(THEME_SLUG . '-portfolio');
            }

            wp_enqueue_script(THEME_SLUG . '-jcarousel-responsive');
            wp_enqueue_script(THEME_SLUG . '-jquery-jcarousel');
            wp_enqueue_script(THEME_SLUG . '-magnific-popup');
            wp_enqueue_script(THEME_SLUG . '-testimonialrotator');
            wp_enqueue_script(THEME_SLUG . '-main');
        }
    }

    // Load conditional scripts
    public function conditional_scripts ()
    {
        if ( is_singular(THEME_SLUG . '_portfolio') ) {
            wp_dequeue_script(THEME_SLUG . '-portfolio');
            wp_register_script(THEME_SLUG . '-portfolio-single', THEME_URI . '/assets/js/portfolio-3.js', array('jquery'), '1.0.0', true);
            wp_enqueue_script(THEME_SLUG . '-portfolio-single');
        }
    }

}

new Scripts();
