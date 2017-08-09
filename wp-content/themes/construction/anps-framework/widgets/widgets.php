<?php
/* Get all widgets */
function get_all_widgets() {
    $dir = get_template_directory() . '/anps-framework/widgets';
    if ($handle = opendir($dir)) {
        $arr = array();
        // Get all files and store it to array
        while (false !== ($entry = readdir($handle))) {
            $explode_entry = explode('.', $entry);
            if($explode_entry[1]=='php') {
                $arr[] = $entry;
            }
        }
        closedir($handle);

        /* Remove widgets, ., .. */
        unset($arr[remove_widget('widgets.php', $arr)]);
        return $arr;
    }
}
/* Remove widget function */
function remove_widget($name, $arr) {
    return array_search($name, $arr);
}
/* Include all widgets */
foreach(get_all_widgets() as $item) {
    $item_file = get_template_directory() . '/anps-framework/widgets/'.$item;
    if( file_exists( $item_file ) ) {
        include_once $item_file;
    }
}
/** Register sidebars by running widebox_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'anps_widgets_init');
function anps_widgets_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'construction'),
        'id' => 'primary-widget-area',
        'description' => esc_html__('The primary widget area', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Secondary Sidebar', 'construction'),
        'id' => 'secondary-widget-area',
        'description' => esc_html__('Secondary widget area', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Top bar left', 'construction'),
        'id' => 'top-bar-left',
        'description' => esc_html__('Top bar supports Text, Search, Custom menu, Text and icon, Social icons and WPML language selector widgets.', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s text-left"><div class="row">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Top bar right', 'construction'),
        'id' => 'top-bar-right',
        'description' => esc_html__('Top bar supports Text, Search, Custom menu, Text and icon, Social icons and WPML language selector widgets.', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s text-right"><div class="row">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    /* Above nav bar sidebars */
    register_sidebar(array(
        'name' => esc_html__('Above navigation bar', 'construction'),
        'id' => 'above-navigation-bar',
        'description' => esc_html__('Top bar is located above the main navigation. It supports Text, Search, Custom menu, Text and icon, Social icons and WPML language selector widgets.', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    /* Vertical menu sidebars */
    if(get_option('anps_global_menu_type', 'classic-layout') == 'vertical-layout') {
        register_sidebar(array(
            'name' => esc_html__('Vertical menu bottom widget', 'construction'),
            'id' => 'vertical-bottom-widget',
            'description' => esc_html__('This widget area is only visible on large devices and only if the vertical menu is active.', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    /* Footer sidebars */
    $footer_columns = get_option('anps_footer_style', '4');
    if($footer_columns=='2') {
        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'construction'),
            'id' => 'footer-1',
            'description' => esc_html__('Footer 1', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 2', 'construction'),
            'id' => 'footer-2',
            'description' => esc_html__('Footer 2', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    } elseif($footer_columns=='3') {
        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'construction'),
            'id' => 'footer-1',
            'description' => esc_html__('Footer 1', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 2', 'construction'),
            'id' => 'footer-2',
            'description' => esc_html__('Footer 2', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 3', 'construction'),
            'id' => 'footer-3',
            'description' => esc_html__('Footer 3', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    } elseif($footer_columns=='4' || $footer_columns=='0') {
        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'construction'),
            'id' => 'footer-1',
            'description' => esc_html__('Footer 1', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 2', 'construction'),
            'id' => 'footer-2',
            'description' => esc_html__('Footer 2', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 3', 'construction'),
            'id' => 'footer-3',
            'description' => esc_html__('Footer 3', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 4', 'construction'),
            'id' => 'footer-4',
            'description' => esc_html__('Footer 4', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    /* Copyright footer sidebars */
    $copyright_footer = get_option('anps_copyright_footer', '1');
    if($copyright_footer=="1" || $copyright_footer=="0") {
        register_sidebar(array(
            'name' => esc_html__('Copyright footer 1', 'construction'),
            'id' => 'copyright-1',
            'description' => esc_html__('Copyright footer 1', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    } elseif($copyright_footer=="2") {
        register_sidebar(array(
            'name' => esc_html__('Copyright footer 1', 'construction'),
            'id' => 'copyright-1',
            'description' => esc_html__('Copyright footer 1', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Copyright footer 2', 'construction'),
            'id' => 'copyright-2',
            'description' => esc_html__('Copyright footer 2', 'construction'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    /* Services left sidebar */
    register_sidebar(array(
        'name' => esc_html__('Left services sidebar', 'construction'),
        'id' => 'left-services-sidebar',
        'description' => esc_html__('Sidebar on services page.', 'construction'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
