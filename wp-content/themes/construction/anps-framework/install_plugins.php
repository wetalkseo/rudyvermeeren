<?php
require_once  get_template_directory() . '/anps-framework/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'anps_register_required_plugins');
function anps_register_required_plugins() {
    $plugins = array(
        array(
            'name' => 'Revolution Slider WP',
            'slug' => 'revslider',
            'source' => 'http://astudio.si/preview/plugins/construction/revslider.zip',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => 'Contact form 7',
            'slug' => 'contact-form-7',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => 'Anps Theme plugin',
            'slug' => 'anps_theme_plugin',
            'source' => 'http://astudio.si/preview/plugins/construction/anps_theme_plugin.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => 'Envato Market',
            'slug' => 'envato-market',
            'source' => 'http://astudio.si/preview/plugins/envato-market.zip',
        ),
        array(
            'name' => 'Visual Composer',
            'slug' => 'js_composer',
            'source' => 'http://astudio.si/preview/plugins/construction/js_composer.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => 'Instagram',
            'slug' => 'wp-instagram-widget',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        )
    );

    $config = array(
        'menu'         => 'install-required-plugins',
        'is_automatic' => true,
    );

    tgmpa($plugins, $config);
}
