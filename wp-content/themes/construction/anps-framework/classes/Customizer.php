<?php 
class Anps_Customizer {
    public static function customizer_register($wp_customize) { 
        /* Include custom controls */
        include_once 'customizer_controls/anps_divider_control.php';
        include_once 'customizer_controls/anps_desc_control.php';
        include_once 'customizer_controls/anps_sidebar_control.php';
        /* Add theme options panel */
        $wp_customize->add_panel('anps_customizer', array('title' =>'Theme options', 'description' => 'Theme options'));
        /* Theme options sections (categories) */
        $wp_customize->add_section('anps_colors', array('title' =>'Main theme colors', 'description' => 'Not satisfied with the premade color schemes? Here you can set your custom colors.', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_button_colors', array('title' =>'Button colors', 'description' => 'Button colors', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_typography', array('title' =>'Typography', 'description' => 'Typography', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_page_layout', array('title' =>'Page layout', 'description' => 'Page layout', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_page_setup', array('title' =>'Page setup', 'description' => 'Page setup', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_header', array('title' =>'Header options', 'description' => 'Header options', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_footer', array('title' =>'Footer options', 'description' => 'Footer options', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_woocommerce', array('title' =>'Woocommerce', 'description' => 'Woocommerce', 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_logos', array('title' =>'Logos', 'description' => 'If you would like to use your logo and favicon, upload them to your theme here', 'panel'=>'anps_customizer'));
        /* END Theme options sections (categories) */
        //Color management (main theme and buttons) settings 
        Anps_Customizer::color_management($wp_customize);
        //Typography settings
        Anps_Customizer::typography($wp_customize);
        //Page layout settings
        Anps_Customizer::page_layout($wp_customize);
        //Page layout settings
        Anps_Customizer::page_setup($wp_customize);
        //Header options
        Anps_Customizer::header_options($wp_customize);
        //Footer options
        Anps_Customizer::footer_options($wp_customize);
        //Woocommerce
        Anps_Customizer::woocommerce($wp_customize);
        //Logos
        Anps_Customizer::logos($wp_customize);
    }
    /* Color management settings */
    private static function color_management($wp_customize) {
        /* Main theme colors */
        //text color
        $wp_customize->add_setting('anps_text_color', array('default'=>get_option('anps_text_color', '898989'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_text_color', array('label' => 'Text color', 'section' => 'anps_colors', 'settings'=>'anps_text_color')));
        //primary color
        $wp_customize->add_setting('anps_primary_color', array('default'=>get_option('anps_primary_color', 'fab702'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_primary_color', array('label' => 'Primary color', 'section' => 'anps_colors', 'settings'=>'anps_primary_color')));
        //hovers color
        $wp_customize->add_setting('anps_hovers_color', array('default'=>get_option('anps_hovers_color', 'ffcc43'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_hovers_color', array('label' => 'Hovers color', 'section' => 'anps_colors', 'settings'=>'anps_hovers_color')));
        //menu text color
        $wp_customize->add_setting('anps_menu_text_color', array('default'=>get_option('anps_menu_text_color', '000'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_menu_text_color', array('label' => 'Menu text color', 'section' => 'anps_colors', 'settings'=>'anps_menu_text_color')));
        //menu background color
        $wp_customize->add_setting('anps_menu_bg_color', array('default'=>get_option('anps_menu_bg_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_menu_bg_color', array('label' => 'Menu background color', 'section' => 'anps_colors', 'settings'=>'anps_menu_bg_color')));
        //headings color
        $wp_customize->add_setting('anps_headings_color', array('default'=>get_option('anps_headings_color', '000'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_headings_color', array('label' => 'Headings color', 'section' => 'anps_colors', 'settings'=>'anps_headings_color')));
        //Top bar text color
        $wp_customize->add_setting('anps_top_bar_color', array('default'=>get_option('anps_top_bar_color', '8c8c8c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_top_bar_color', array('label' => 'Top bar color', 'section' => 'anps_colors', 'settings'=>'anps_top_bar_color')));
        //Top bar background color
        $wp_customize->add_setting('anps_top_bar_bg_color', array('default'=>get_option('anps_top_bar_bg_color', 'f9f9f9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_top_bar_bg_color', array('label' => 'Top bar background color', 'section' => 'anps_colors', 'settings'=>'anps_top_bar_bg_color')));
        //Footer background color
        $wp_customize->add_setting('anps_footer_bg_color', array('default'=>get_option('anps_footer_bg_color', '171717'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_bg_color', array('label' => 'Footer background color', 'section' => 'anps_colors', 'settings'=>'anps_footer_bg_color')));
        //Copyright footer background color
        $wp_customize->add_setting('anps_copyright_footer_bg_color', array('default'=>get_option('anps_copyright_footer_bg_color', '2c2c2c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_copyright_footer_bg_color', array('label' => 'Copyright footer background color', 'section' => 'anps_colors', 'settings'=>'anps_copyright_footer_bg_color')));
        //Footer text color
        $wp_customize->add_setting('anps_footer_text_color', array('default'=>get_option('anps_footer_text_color', '9c9c9c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_text_color', array('label' => 'Footer text color', 'section' => 'anps_colors', 'settings'=>'anps_footer_text_color')));
        //Footer heading text color
        $wp_customize->add_setting('anps_footer_heading_text_color', array('default'=>get_option('anps_footer_heading_text_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_heading_text_color', array('label' => 'Footer heading text color', 'section' => 'anps_colors', 'settings'=>'anps_footer_heading_text_color')));
        //Copyright footer text color
        $wp_customize->add_setting('anps_c_footer_text_color', array('default'=>get_option('anps_c_footer_text_color', '9c9c9c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_c_footer_text_color', array('label' => 'Copyright footer text color', 'section' => 'anps_colors', 'settings'=>'anps_c_footer_text_color')));
        //Page header background color
        $wp_customize->add_setting('anps_page_header_background_color', array('default'=>get_option('anps_page_header_background_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_page_header_background_color', array('label' => 'Page header background color', 'section' => 'anps_colors', 'settings'=>'anps_page_header_background_color')));
        //Page title color
        $wp_customize->add_setting('anps_page_title', array('default'=>get_option('anps_page_title', '4e4e4e'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_page_title', array('label' => 'Page title color', 'section' => 'anps_colors', 'settings'=>'anps_page_title')));
        //Submenu background color
        $wp_customize->add_setting('anps_submenu_background_color', array('default'=>get_option('anps_submenu_background_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_background_color', array('label' => 'Submenu background color', 'section' => 'anps_colors', 'settings'=>'anps_submenu_background_color')));
        //Submenu text color
        $wp_customize->add_setting('anps_submenu_text_color', array('default'=>get_option('anps_submenu_text_color', '8c8c8c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_text_color', array('label' => 'Submenu text color', 'section' => 'anps_colors', 'settings'=>'anps_submenu_text_color')));
        //Submenu divider color
        $wp_customize->add_setting('anps_submenu_divider_color', array('default'=>get_option('anps_submenu_divider_color', 'f1f1f1'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_divider_color', array('label' => 'Submenu divider color', 'section' => 'anps_colors', 'settings'=>'anps_submenu_divider_color')));
        //Text on top of primary color 
        $wp_customize->add_setting('anps_primary_text_top', array('default'=>get_option('anps_primary_text_top', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_primary_text_top', array('label' => 'Text on top of primary color', 'section' => 'anps_colors', 'settings'=>'anps_primary_text_top')));
        //Shopping cart item number bg color
        $wp_customize->add_setting('anps_woo_cart_items_number_bg_color', array('default'=>get_option('anps_woo_cart_items_number_bg_color', 'ffde00'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_woo_cart_items_number_bg_color', array('label' => 'Shopping cart item number background color', 'section' => 'anps_colors', 'settings'=>'anps_woo_cart_items_number_bg_color')));
        //Shopping cart item number text color
        $wp_customize->add_setting('anps_woo_cart_items_number_color', array('default'=>get_option('anps_woo_cart_items_number_color', '866700'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_woo_cart_items_number_color', array('label' => 'Shopping cart item number text color', 'section' => 'anps_colors', 'settings'=>'anps_woo_cart_items_number_color')));
        /* END Main theme colors */
        /* Button colors */
        //Normal button description
        $wp_customize->add_setting('anps_normal_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_normal_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_normal_button_desc', 'label'=>'Normal button', 'description'=>'Next 4 colors define normal button.')));
        //Default button background
        $wp_customize->add_setting('anps_normal_button_bg', array('default'=>get_option('anps_normal_button_bg', 'fab702'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_bg', array('label' => 'Normal button background', 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_bg')));
        //Default button color
        $wp_customize->add_setting('anps_normal_button_color', array('default'=>get_option('anps_normal_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_color', array('label' => 'Normal button color', 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_color')));
        //Default button hover background
        $wp_customize->add_setting('anps_normal_button_hover_bg', array('default'=>get_option('anps_normal_button_hover_bg', 'ffcc43'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_hover_bg', array('label' => 'Normal button hover background', 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_hover_bg')));
        //Default button hover color
        $wp_customize->add_setting('anps_normal_button_hover_color', array('default'=>get_option('anps_normal_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_hover_color', array('label' => 'Normal button hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_hover_color')));
        //Button with gradient description
        $wp_customize->add_setting('anps_gradient_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_gradient_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_desc', 'label'=>'Button with gradient', 'description'=>'Next 4 colors define button with gradient.')));
        //Gradient button background
        $wp_customize->add_setting('anps_gradient_button_bg', array('default'=>get_option('anps_gradient_button_bg', 'fab702'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_bg', array('label' => 'Gradient button background', 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_bg')));
        //Gradient button color
        $wp_customize->add_setting('anps_gradient_button_color', array('default'=>get_option('anps_gradient_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_color', array('label' => 'Gradient button color', 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_color')));
        //Gradient button hover background
        $wp_customize->add_setting('anps_gradient_button_hover_bg', array('default'=>get_option('anps_gradient_button_hover_bg', 'ffcc43'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_hover_bg', array('label' => 'Gradient button hover background', 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_hover_bg')));
        //Gradient button hover color
        $wp_customize->add_setting('anps_gradient_button_hover_color', array('default'=>get_option('anps_gradient_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_hover_color', array('label' => 'Gradient button hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_hover_color')));
        //Dark button description
        $wp_customize->add_setting('anps_dark_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_dark_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_dark_button_desc', 'label'=>'Dark button', 'description'=>'Next 4 colors define dark button.')));
        //Dark button background
        $wp_customize->add_setting('anps_dark_button_bg', array('default'=>get_option('anps_dark_button_bg', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_bg', array('label' => 'Dark button background', 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_bg')));
        //Dark button color
        $wp_customize->add_setting('anps_dark_button_color', array('default'=>get_option('anps_dark_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_color', array('label' => 'Dark button color', 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_color')));
        //Dark button hover background
        $wp_customize->add_setting('anps_dark_button_hover_bg', array('default'=>get_option('anps_dark_button_hover_bg', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_hover_bg', array('label' => 'Dark button hover background', 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_hover_bg')));
        //Dark button hover color
        $wp_customize->add_setting('anps_dark_button_hover_color', array('default'=>get_option('anps_dark_button_hover_color', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_hover_color', array('label' => 'Dark button hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_hover_color')));
        //Light button description
        $wp_customize->add_setting('anps_light_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_light_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_light_button_desc', 'label'=>'Light button', 'description'=>'Next 4 colors define light button.')));
        //Light button background
        $wp_customize->add_setting('anps_light_button_bg', array('default'=>get_option('anps_light_button_bg', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_bg', array('label' => 'Light button background', 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_bg')));
        //Light button color
        $wp_customize->add_setting('anps_light_button_color', array('default'=>get_option('anps_light_button_color', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_color', array('label' => 'Light button color', 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_color')));
        //Light button hover color
        $wp_customize->add_setting('anps_light_button_hover_bg', array('default'=>get_option('anps_light_button_hover_bg', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_hover_bg', array('label' => 'Light button hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_hover_bg')));
        //Light button hover color
        $wp_customize->add_setting('anps_light_button_hover_color', array('default'=>get_option('anps_light_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_hover_color', array('label' => 'Light button hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_hover_color')));
        //Button minimal description
        $wp_customize->add_setting('anps_minimal_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_minimal_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_desc', 'label'=>'Minimal button', 'description'=>'Next 2 colors define minimal button.')));
        //Button minimal color
        $wp_customize->add_setting('anps_minimal_button_color', array('default'=>get_option('anps_minimal_button_color', 'fab702'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_minimal_button_color', array('label' => 'Button minimal color', 'section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_color')));
        //Button minimal hover color
        $wp_customize->add_setting('anps_minimal_button_hover_color', array('default'=>get_option('anps_minimal_button_hover_color', 'ffcc43'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_minimal_button_hover_color', array('label' => 'Button minimal hover color', 'section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_hover_color')));
        /* END Button colors */
    }
    /* Typography settings */
    private static function typography($wp_customize) {
        /* Še manjka za izbiranje fontov */
        //Body font size
        $wp_customize->add_setting('anps_body_font_size', array('default'=>get_option('anps_body_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_body_font_size', array('label'=>'Body font size', 'settings' => 'anps_body_font_size', 'section' => 'anps_typography'));
        //Menu font size
        $wp_customize->add_setting('anps_menu_font_size', array('default'=>get_option('anps_menu_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_menu_font_size', array('label'=>'Menu font size', 'settings' => 'anps_menu_font_size', 'section' => 'anps_typography'));
        //Content heading 1 font size
        $wp_customize->add_setting('anps_h1_font_size', array('default'=>get_option('anps_h1_font_size', '31'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_h1_font_size', array('label'=>'Content heading 1 font size', 'settings' => 'anps_h1_font_size', 'section' => 'anps_typography'));
        //Content heading 2 font size
        $wp_customize->add_setting('anps_h2_font_size', array('default'=>get_option('anps_h2_font_size', '24'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_h2_font_size', array('label'=>'Content heading 2 font size', 'settings' => 'anps_h2_font_size', 'section' => 'anps_typography'));
        //Content heading 3 font size
        $wp_customize->add_setting('anps_h3_font_size', array('default'=>get_option('anps_h3_font_size', '21'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_h3_font_size', array('label'=>'Content heading 3 font size', 'settings' => 'anps_h3_font_size', 'section' => 'anps_typography'));
        //Content heading 4 font size
        $wp_customize->add_setting('anps_h4_font_size', array('default'=>get_option('anps_h4_font_size', '18'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_h4_font_size', array('label'=>'Content heading 4 font size', 'settings' => 'anps_h4_font_size', 'section' => 'anps_typography'));
        //Content heading 5 font size
        $wp_customize->add_setting('anps_h5_font_size', array('default'=>get_option('anps_h5_font_size', '16'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_h5_font_size', array('label'=>'Content heading 5 font size', 'settings' => 'anps_h5_font_size', 'section' => 'anps_typography'));
        //Page heading 1 font size
        $wp_customize->add_setting('anps_page_heading_h1_font_size', array('default'=>get_option('anps_page_heading_h1_font_size', '48'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_page_heading_h1_font_size', array('label'=>'Page heading 1 font size', 'settings' => 'anps_page_heading_h1_font_size', 'section' => 'anps_typography'));
        //Single blog page heading 1 font size
        $wp_customize->add_setting('anps_blog_heading_h1_font_size', array('default'=>get_option('anps_blog_heading_h1_font_size', '28'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_blog_heading_h1_font_size', array('label'=>'Single blog page heading 1 font size', 'settings' => 'anps_blog_heading_h1_font_size', 'section' => 'anps_typography'));
    }
    /* Page layout settings */
    private static function page_layout($wp_customize) {
        //Pge sidebar description
        $wp_customize->add_setting('anps_page_sidebar_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_page_sidebar_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_desc', 'label'=>'Page Sidebars', 'description'=>'This will change the default sidebar value on all pages. It can be changed on each page individually.')));
        //Page left sidebar
        $wp_customize->add_setting('anps_page_sidebar_left', array('type'=>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_page_sidebar_left', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_left', 'label'=>'Page sidebar left')));
        //Page right sidebar
        $wp_customize->add_setting('anps_page_sidebar_right', array('type'=>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_page_sidebar_right', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_right', 'label'=>'Page sidebar right')));
        //Post sidebar description
        $wp_customize->add_setting('anps_post_sidebar_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_sidebar_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_desc', 'label'=>'Post Sidebars', 'description'=>'This will change the default sidebar value on all posts. It can be changed on each post individually.')));
        //Post left sidebar
        $wp_customize->add_setting('anps_post_sidebar_left', array('type'=>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_post_sidebar_left', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_left', 'label'=>'Post sidebar left')));
        //Post right sidebar
        $wp_customize->add_setting('anps_post_sidebar_right', array('type'=>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_post_sidebar_right', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_right', 'label'=>'Post sidebar right')));
        //Disable page title and background
        $wp_customize->add_setting('anps_heading_status', array('default'=>get_option('anps_heading_status', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_heading_status', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>'Enable page title and background', 'settings'=>'anps_heading_status'));
        //divider heading
        $wp_customize->add_setting('anps_heading_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_heading_divider', array('section' => 'anps_page_layout', 'settings'=>'anps_heading_divider')));     
        //Breadcrumbs
        $wp_customize->add_setting('anps_breadcrumbs_status', array('default'=>get_option('anps_breadcrumbs_status', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_breadcrumbs_status', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>'Enable Bredcrumbs', 'settings'=>'anps_breadcrumbs_status'));
        //Page comments
        $wp_customize->add_setting('anps_page_comments', array('default'=>get_option('anps_page_comments', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_page_comments', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>'Enable page comments', 'settings'=>'anps_page_comments'));
        //Blog layout description
        $wp_customize->add_setting('anps_blog_layout_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_blog_layout_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_blog_layout_desc', 'label'=>'Blog layout', 'description'=>'This option defines default display of blog, archive pages, categories and tags.')));
        //Blog layout columns
        $wp_customize->add_setting('anps_blog_columns', array('default'=>get_option('anps_blog_columns', 'col-md-12'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_blog_columns', array(
            'label'=>'Columns', 
            'type'=>'select', 
            'settings' =>'anps_blog_columns', 
            'section' =>'anps_page_layout',
            'choices' =>array(
                'col-md-12'=>'1 column',
                'col-md-6'=>'2 columns',
                'col-md-4'=>'3 columns',
                'col-md-3'=>'4 columns'
            )
        ));
    }
    /* Page setup */
    private static function page_setup($wp_customize) {
        //Excerpt length
        $wp_customize->add_setting('anps_excerpt_length', array('default'=>get_option('anps_excerpt_length', '40'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_excerpt_length', array('label'=>'Excerpt length', 'settings' => 'anps_excerpt_length', 'section' => 'anps_page_setup'));
        //404 error page
        $wp_customize->add_setting('anps_error_page', array('default'=>get_option('anps_error_page'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_error_page', array('label'=>'404 error page', 'type'=>'dropdown-pages', 'settings' => 'anps_error_page', 'section' => 'anps_page_setup'));
        //Portfolio title and description
        $wp_customize->add_setting('anps_portfolio_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_portfolio_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_portfolio_desc', 'label'=>'Portfolio settings', 'description'=>'Here you can select single portfolio style, change portfolio slug to your own and add content to portfolio single footer (including shortcodes).')));
        //Portfolio slug
        $wp_customize->add_setting('anps_portfolio_slug', array('default'=>get_option('anps_portfolio_slug', ''), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_portfolio_slug', array('label'=>'Portfolio slug', 'settings' => 'anps_portfolio_slug', 'section' => 'anps_page_setup'));
        //Portfolio single style
        $wp_customize->add_setting('anps_portfolio_single', array('default'=>get_option('anps_portfolio_single', 'style-1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_portfolio_single', array(
            'label'=>'Portfolio single style', 
            'type'=>'select', 
            'settings' =>'anps_portfolio_single', 
            'section' =>'anps_page_setup',
            'choices' =>array(
                'style-1'=>'Style 1',
                'style-2'=>'Style 2',
                'style-3'=>'Style 3'
            )
        ));
        //Post meta title and description 
        $wp_customize->add_setting('anps_post_meta_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_meta_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_post_meta_desc', 'label'=>'Post meta settings', 'description'=>'Here you can check with post meta will be hidden on posts.')));
        //comments checkbox
        $wp_customize->add_setting('anps_post_meta_comments', array('default'=>get_option('anps_post_meta_comments', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_comments', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Comments', 'settings'=>'anps_post_meta_comments'));
        //categories checkbox
        $wp_customize->add_setting('anps_post_meta_categories', array('default'=>get_option('anps_post_meta_categories', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_categories', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Categories', 'settings'=>'anps_post_meta_categories'));
        //author checkbox
        $wp_customize->add_setting('anps_post_meta_author', array('default'=>get_option('anps_post_meta_author', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_author', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Author', 'settings'=>'anps_post_meta_author'));
        //date checkbox
        $wp_customize->add_setting('anps_post_meta_date', array('default'=>get_option('anps_post_meta_date', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_date', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Date', 'settings'=>'anps_post_meta_date'));
        //Post meta on single post 
        $wp_customize->add_setting('anps_post_meta_page_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_meta_page_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_post_meta_page_desc', 'label'=>'Post meta single page settings', 'description'=>'Here you can check with post meta will be hidden on single post.')));
        //comments page checkbox
        $wp_customize->add_setting('anps_post_meta_comments_single', array('default'=>get_option('anps_post_meta_comments_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_comments_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Comments', 'settings'=>'anps_post_meta_comments_single'));
        //categories page checkbox
        $wp_customize->add_setting('anps_post_meta_categories_single', array('default'=>get_option('anps_post_meta_categories_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_categories_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Categories', 'settings'=>'anps_post_meta_categories_single'));
        //author page checkbox
        $wp_customize->add_setting('anps_post_meta_author_single', array('default'=>get_option('anps_post_meta_author_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_author_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Author', 'settings'=>'anps_post_meta_author_single'));
        //date page checkbox
        $wp_customize->add_setting('anps_post_meta_date_single', array('default'=>get_option('anps_post_meta_date_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_date_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Date', 'settings'=>'anps_post_meta_date_single'));
        //tags page checkbox
        $wp_customize->add_setting('anps_post_meta_tags_single', array('default'=>get_option('anps_post_meta_tags_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_post_meta_tags_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>'Tags', 'settings'=>'anps_post_meta_tags_single'));
    }
    /* Header options */
    private static function header_options($wp_customize) {
        //Page heading background
        $wp_customize->add_setting('anps_page_heading_bg', array('type' =>'option', 'sanitize_callback' => 'esc_raw_url', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_page_heading_bg', array('label'=>'Page heading background', 'section'=>'anps_header', 'settings'=>'anps_page_heading_bg')));
        //Search page heading background
        $wp_customize->add_setting('anps_search_content_bg', array('type' =>'option', 'sanitize_callback' => 'esc_raw_url', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_search_content_bg', array('label'=>'Search page content background', 'section'=>'anps_header', 'settings'=>'anps_search_content_bg')));
        //Divider heading
        $wp_customize->add_setting('anps_heading_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_heading_divider', array('section' => 'anps_header', 'settings'=>'anps_heading_divider')));
        //Description general top menu settings
        $wp_customize->add_setting('anps_topmenu_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_topmenu_desc', array('section' => 'anps_header', 'settings'=>'anps_topmenu_desc', 'label'=>'Description general top menu settings', 'description'=>'')));
        //Display top bar?
        $wp_customize->add_setting('anps_global_topmenu_style', array('default'=>get_option('anps_global_topmenu_style', "1"),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_global_topmenu_style', array(
            'label' => 'Display top bar?',
            'section' => 'anps_header',
            'type' => 'select',
            'choices' => array(
                '1' => 'Yes',
                '3' => 'No',
                '2' => 'Only on desktop'
            )
        ));
        //Above nav bar
        $wp_customize->add_setting('anps_global_above_nav_bar', array('default'=>get_option('anps_global_above_nav_bar', '1'),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_global_above_nav_bar', array(
            'label' => 'Display above menu bar?',
            'section' => 'anps_header',
            'type' => 'select',
            'choices' => array(
                '1' => 'on',
                '2' => 'off'
            )
        ));
        //Sticky menu
        $wp_customize->add_setting('anps_sticky_menu', array('default'=>get_option('anps_sticky_menu', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_sticky_menu', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>'Sticky menu', 'settings'=>'anps_sticky_menu'));     
        //Display search on mobile and tablets?
        $wp_customize->add_setting('anps_global_search_icon_mobile', array('default'=>get_option('anps_global_search_icon_mobile', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_global_search_icon_mobile', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>'Display search on mobile and tablets?', 'settings'=>'anps_global_search_icon_mobile'));
        //Display search icon in menu (desktop)?
        $wp_customize->add_setting('anps_global_search_icon', array('default'=>get_option('anps_global_search_icon', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_global_search_icon', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>'Display search icon in menu (desktop)?', 'settings'=>'anps_global_search_icon'));      
        //Menu walker
        $wp_customize->add_setting('anps_global_menu_walker', array('default'=>get_option('anps_global_menu_walker', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_global_menu_walker', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>'Enable menu walker (mega menu)', 'settings'=>'anps_global_menu_walker'));
    }
    /* Footer options */
    private static function footer_options($wp_customize) {
        //Footer description
        $wp_customize->add_setting('anps_footer_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_footer_desc', array('section' => 'anps_footer', 'settings'=>'anps_footer_desc', 'label'=>'Footer options', 'description'=>'')));
        //disable footer
        $wp_customize->add_setting('anps_enable_footer', array('default'=>get_option('anps_enable_footer', "1"), 'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_enable_footer', array('section'=>'anps_footer', 'type'=>'checkbox', 'label'=>'Enable footer', 'settings'=>'anps_enable_footer'));
        //Footer style
        $wp_customize->add_setting('anps_footer_style', array('default'=>get_option('anps_footer_style', "0"),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_footer_style', array(
            'label' => 'Footer style',
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => '*** Select ***',
                '2' => '2 columns',
                '3' => '3 columns',
                '4' => '4 columns'
            )
        ));
        //Copyright footer
        $wp_customize->add_setting('anps_copyright_footer', array('default'=>get_option('anps_copyright_footer', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_copyright_footer', array(
            'label' => 'Copyright footer',
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => '*** Select ***',
                '1' => '1 columns',
                '2' => '2 columns'
            )
        ));
        //Footer type
        $wp_customize->add_setting('anps_footer_style_fixed', array('default'=>get_option('anps_footer_style_fixed', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_footer_style_fixed', array(
            'label' => 'Footer type',
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => '*** Select ***',
                'classic' => 'Classic',
                'fixed-footer' => 'Fixed'
            )
        ));
        //Mobile footer
        $wp_customize->add_setting('anps_mobile_footer_columns', array('default'=>get_option('anps_mobile_footer_columns', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_mobile_footer_columns', array(
            'label' => 'Mobile footer columns',
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => '*** Select ***',
                '1' => '1 column',
                '2' => '2 columns'
            )
        ));
    }
    /* Woocommerce */
    private static function woocommerce($wp_customize) {
        //display shopping cart icon in header
        $wp_customize->add_setting('anps_shopping_cart_header', array('default'=>get_option('anps_shopping_cart_header', "shop_only"),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_shopping_cart_header', array(
            'label' => 'Display shopping cart icon in header?',
            'section' => 'anps_woocommerce',
            'type' => 'select',
            'choices' => array(
                'hide' => 'Never display',
                'shop_only' => 'Only on Woo pages',
                'always' => 'Display everywhere'
            )
        ));
        //products page columns
        $wp_customize->add_setting('anps_woo_products_layout', array('default'=>get_option('anps_woo_products_layout', "col-md-3"),'type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_woo_products_layout', array(
            'label' => 'How many products in column?',
            'section' => 'anps_woocommerce',
            'type' => 'select',
            'choices' => array(
                'col-md-3' => '4 columns',
                'col-md-4' => '3 columns'
            )
        ));
    }
    /* Logos */
    private static function logos($wp_customize) {
        //Logo
        $wp_customize->add_setting('anps_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_logo', array('label'=>'Logo', 'section'=>'anps_logos', 'settings'=>'anps_logo')));
        //Logo height
        $wp_customize->add_setting('anps_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_logo_height', array('label'=>'Logo height (px)', 'settings' => 'anps_logo_height', 'section' => 'anps_logos'));
        //Front page logo
        $wp_customize->add_setting('anps_front_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_front_logo', array('label'=>'Front page logo', 'section'=>'anps_logos', 'settings'=>'anps_front_logo')));
        //Front page logo height
        $wp_customize->add_setting('anps_front_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_front_logo_height', array('label'=>'Front page logo height (px)', 'settings' => 'anps_front_logo_height', 'section' => 'anps_logos'));
        //Divider sticky logo
        $wp_customize->add_setting('anps_logo_divider', array('type'=>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_logo_divider', array('section' => 'anps_logos', 'settings'=>'anps_logo_divider'))); 
        //Sticky logo
        $wp_customize->add_setting('anps_sticky_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_sticky_logo', array('label'=>'Sticky logo', 'section'=>'anps_logos', 'settings'=>'anps_sticky_logo')));
        //Sticky logo height
        $wp_customize->add_setting('anps_sticky_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_sticky_logo_height', array('label'=>'Sticky logo height (px)', 'settings' => 'anps_sticky_logo_height', 'section' => 'anps_logos'));
        //Transparent sticky logo
        $wp_customize->add_setting('anps_sticky_transparent_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_sticky_transparent_logo', array('label'=>'Transparent sticky logo', 'section'=>'anps_logos', 'settings'=>'anps_sticky_transparent_logo')));
        //Transparent sticky logo height
        $wp_customize->add_setting('anps_sticky_transparent_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control('anps_sticky_transparent_logo_height', array('label'=>'Transparent sticky logo height (px)', 'settings' => 'anps_sticky_transparent_logo_height', 'section' => 'anps_logos'));
        //Divider sticky logo
        $wp_customize->add_setting('anps_sticky_logo_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html', 'transport'=>'refresh'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_sticky_logo_divider', array('section' => 'anps_logos', 'settings'=>'anps_sticky_logo_divider')));
        //Mobile logo
        $wp_customize->add_setting('anps_mobile_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw', 'transport'=>'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_mobile_logo', array('label'=>'Mobile logo', 'section'=>'anps_logos', 'settings'=>'anps_mobile_logo')));
    }
}
add_action('customize_register', array('Anps_Customizer', 'customizer_register'));