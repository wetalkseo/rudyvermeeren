<?php
include_once(get_template_directory() . '/anps-framework/classes/Options.php');

/* Enqueue style in script for custom colorpicker */
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');

wp_enqueue_script('my-upload');
wp_enqueue_style("thickbox");


if (isset($_GET['save_options'])) {
    $options->anps_save_options("header");
}
?>

<form action="themes.php?page=theme_options&sub_page=header&save_options" method="post">
    <div class="content-inner">
        <div class="row">

            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i><?php esc_html_e('Menu Layout options', 'construction'); ?></h3>
            </div>

            <div class="global-layout">

                <?php $radiooptions = array (
                    'classic-layout' => array (
                        'imgbefore' => '<div class="imagewrap">',
                        'image' => 'top-background-menu.jpg',
                        'imgafter' => '</div>',
                        'value' => 'classic-layout',
                    ),
                    'vertical-layout' => array (
                        'imgbefore' => '<div class="imagewrap">',
                        'image' => 'vertical-menu.jpg',
                        'imgafter' => '</div>',
                        'value' => 'vertical-layout',
                    )
                );

                $options->anps_create_radio('anps_global_menu_type', $radiooptions, 'col-xs-6 headerstyles', true, "", "classic-layout", true );?>

                <div class="options-to-toggle">

                    <div class="col-md-12 show-classic-layout onoff">

                        <h4><?php printf(esc_html__('SET YOR %s HOME PAGE %s MENU OPTION', 'construction'), '<span>', '</span>');?></h4>
                        <p><?php esc_html_e('You have 2 menu/header option to set. Each option has additional settings which corespond to its style, with different variations you can customise you menu/header in numerious ways.', 'construction'); ?></p>

                        <div class="row">

                            <?php $horizontal_options = array (
                                'top' => array (
                                    'image' => 'top-background-menu.jpg',
                                    'value' => 'top',
                                ),
                                'bottom' => array (
                                    'image' => 'bottom-background-menu.jpg',
                                    'value' => 'bottom',
                                )
                            );

                            $options->anps_create_radio('anps_home_classic_menu_type', $horizontal_options, 'col-md-3 top-or-bottom', true, '', 'top' );?>

                            <div class="col-md-6 ">
                                <div class="bg-blue" data-minheight="140">
                                    <p><?php printf(esc_html__('These options only apply to the home page. You can additionally set the options on each page separately, which will override options selected here.%sGlobal options can be set in a section below.', 'construction'), '<br>');?></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="options-to-toggle">

                                <!-- Text color -->
                                <div class="col-md-4">
                                    <?php $options->anps_create_color_option('anps_front_text_color', '', esc_html__('Text color', 'construction') );?>
                                </div>

                                <!-- Background color -->
                                <div class="col-md-4 dimmreverse">
                                    <?php $options->anps_create_color_option('anps_front_bg_color', '', esc_html__('Background color', 'construction') );?>
                                </div>

                                <!-- Text hover color -->
                                <div class="col-md-4">
                                    <?php $options->anps_create_color_option('anps_front_text_hover_color', '', esc_html__('Text hover color', 'construction') );?>
                                </div>

                                  <!-- Menu centered checkbox -->
                                <div class="col-md-4 onoff show-top">
                                    <?php $options->anps_create_checkbox('anps_front_menu_center', esc_html__('Menu centered', 'construction') );?>
                                </div>

                               <!-- top bar color -->
                                <div class="col-md-4 onoff show-top dimm">
                                    <?php $options->anps_create_color_option('anps_front_topbar_color', '', esc_html__('Top bar color', 'construction') );?>
                                </div>

                                <!-- Menu transparent checkbox -->
                                <div class="col-md-4 dimm-master">
                                    <?php $options->anps_create_checkbox('anps_front_transparent_header', esc_html__('Transparent header', 'construction') );?>
                                </div>

                                <!-- Set global checkbox -->
                                <div class="col-md-4 onoff show-top set-global">
                                    <?php $options->anps_create_checkbox('anps_set_settings_as_global_header', esc_html__('Set this settings as global', 'construction'), '0');?>
                                </div>

                            </div>
                        </div>

                        <div class="row global-options">

                            <div class="col-md-12 ">
                                <h4><?php printf(esc_html__('SET YOR %s GLOBAL MENU %s OPTION', 'construction'), '<span>', '</span>'); ?></h4>

                                <p><?php printf(esc_html__('These options apply globaly - on all pages. %s For additional customization, you can override these options on each page individually. %s', 'construction'), '<span class="blue">', '</span>');?></p>

                            </div>


                            <!-- Menu transparent checkbox -->
                            <div class="col-md-6 dimm-master" >
                                <?php $options->anps_create_checkbox('anps_global_transparent_header', esc_html__('Transparent header', 'construction'), '0' );?>
                            </div>

                              <!-- Menu centered checkbox -->
                            <div class="col-md-6">
                                <?php $options->anps_create_checkbox('anps_global_menu_center', esc_html__('Menu centered', 'construction'), '1');?>
                            </div>

                            <!-- Text color -->
                            <div class="col-md-4 dimm">
                                <?php $options->anps_create_color_option('anps_global_text_color', '', esc_html__('Text color', 'construction') );?>
                            </div>

                            <!-- Text hover color -->
                            <div class="col-md-4 dimm">
                                <?php $options->anps_create_color_option('anps_global_text_hover_color', '', esc_html__('Text hover color', 'construction') );?>
                            </div>

                           <!-- top bar color -->
                            <div class="col-md-4 onoff show-top dimm">
                                <?php $options->anps_create_color_option('anps_global_topbar_color', '', esc_html__('Top bar color', 'construction') );?>
                            </div>



                        </div>

                    </div>
                    <div class="col-md-12 show-vertical-layout onoff">

                        <h3><i class="fa fa-bars"></i><?php esc_html_e('SET YOR GLOBAL MENU VERTICAL OPTION', 'construction'); ?></h3>
                        <p><?php esc_html_e('These options will apply globaly (including the home page), meaning over all pages.', 'construction');?></p>

                          <!-- Text color -->
                            <div class="col-md-4">
                                <?php $options->anps_create_color_option('anps_vertical_text_color', '', esc_html__('Text color', 'construction') );?>
                            </div>

                            <!-- Background color -->
                            <div class="col-md-4">
                                <?php $options->anps_create_color_option('anps_vertical_bg_color', '', esc_html__('Background color', 'construction') );?>
                            </div>

                            <!-- Text hover color -->
                            <div class="col-md-4">
                                <?php $options->anps_create_color_option('anps_vertical_text_hover_color', '', esc_html__('Text hover color', 'construction') );?>
                            </div>

                            <!-- Background upload -->
                            <div class="col-md-4 ">
                                <?php $options->anps_create_upload('anps_vertical_menu_background', esc_html__('Background image', 'construction'), false );?>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i><?php esc_html_e('Global header options', 'construction'); ?></h3>
                <div class="row">

                    <!--Top bar select-->
                    <div class="col-md-4">
                        <?php $top_bar_options = array('1'=>esc_html__('Yes', 'construction'), '3'=>esc_html__('No', 'construction'), '2'=>esc_html__('Only on desktop', 'construction'));
                        $options->anps_create_select('anps_global_topmenu_style', $top_bar_options,  esc_html__('Display top bar', 'construction'));?>
                    </div>

                    <!-- Set above nav bar checkbox -->
                    <div class="col-md-4">
                        <?php $above_nav_options = array('1'=>esc_html__('on', 'construction'), '2'=>esc_html__('off', 'construction'));
                        $options->anps_create_select('anps_global_above_nav_bar', $above_nav_options,  esc_html__('Display above menu bar', 'construction') );?>
                    </div>

                    <!-- Sticky menu checkbox -->
                    <div class="col-md-4">
                       <?php $options->anps_create_checkbox('anps_sticky_menu', esc_html__('Sticky menu', 'construction'), '1');?>
                    </div>

                    <!-- Display search mobile checkbox -->
                    <div class="col-md-4">
                       <?php $options->anps_create_checkbox('anps_global_search_icon_mobile', esc_html__('Display search on mobile and tablets?', 'construction'), '1');?>
                    </div>

                    <!-- Display search desktop checkbox -->
                    <div class="col-md-4">
                       <?php $options->anps_create_checkbox('anps_global_search_icon', esc_html__('Display search icon in menu (desktop)?', 'construction'), '1');?>
                    </div>

                    <!-- Enable menu walker for our mega menu -->
                    <div class="col-md-4">
                        <?php $options->anps_create_checkbox('anps_global_menu_walker', esc_html__('Enable menu walker (mega menu)', 'construction'), '1');?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i> <?php esc_html_e('Heading Backgrounds', 'construction'); ?></h3>
                <h4><?php esc_html_e('Select Your Heading Backgrounds', 'construction'); ?></h4>
                <p><?php esc_html_e('The selected bacground will apply globaly over all pages. On each page you can upload its own background which will override the current
                setting in this panel for that page alone.', 'construction'); ?></p><br><br>
            </div>

            <!-- Page heading background upload -->
            <div class="col-md-4 ">
                <?php $options->anps_create_upload('anps_page_heading_bg', esc_html__('Page heading background', 'construction'), true );?>
            </div>

            <!-- Search page content background upload -->
            <div class="col-md-4 ">
                <?php $options->anps_create_upload('anps_search_content_bg', esc_html__('Search page content background', 'construction'), true );?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>
