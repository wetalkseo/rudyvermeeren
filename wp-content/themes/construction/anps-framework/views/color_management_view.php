<?php 
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
/* Enqueue style in script for custom colorpicker */
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');
/* Save form */ 
if(isset($_GET['save_style'])) {
    $options->anps_save_options('theme_style');
}
?>

<form action="themes.php?page=theme_options&save_style" method="post">
    <div class="content-inner">     
        <!-- Predefined Colors -->    
        <div class="row" id="anps_predefined_colors">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e('Predefined color Scheme', 'construction'); ?></h3>
                <h4><?php esc_html_e('Choose a predefined color scheme', 'construction'); ?></h4>
                <p><?php esc_html_e("Selecting one of this schemes will import the predefined colors below, which you can then edit as you like. Click \"save\" to save the color selection.", 'construction'); ?></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="palette <?php if (get_option('anps_text_color', 'not_saved') == 'not_saved'){echo esc_attr('active');};?>">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="default" />
                    <span class="colorspan" style="background:#fab702;"></span>
                    <span class="colorspantext"><?php esc_html_e('Default', 'construction'); ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="orange" />
                    <span class="colorspan" style="background:#ff931f;"></span>
                    <span class="colorspantext"><?php esc_html_e('Orange', 'construction'); ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="blue" />
                    <span class="colorspan" style="background:#1378d1;"></span>
                    <span class="colorspantext"><?php esc_html_e('Blue', 'construction'); ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="red" />
                    <span class="colorspan" style="background:#b81818;"></span>
                    <span class="colorspantext"><?php esc_html_e('Red', 'construction'); ?></span>
                </div>
            </div>
        </div>

        <!-- Main Theme Colors -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Main Theme Colors", 'construction'); ?></h3>
                <h4><?php esc_html_e('Set your custom colors', 'construction'); ?></h4>
                <p><?php esc_html_e('Not satisfied with the premade color schemes? Here you can set your custom colors.', 'construction'); ?></p>
            </div>
                
            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_text_color', '898989', esc_html__('Text color', 'construction')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_primary_color', 'fab702', esc_html__('Primary color', 'construction')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_hovers_color', 'ffcc43', esc_html__('Hovers color', 'construction')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_menu_text_color', '000000', esc_html__('Menu text color', 'construction')); ?>
            </div>

             <!-- Menu Background color -->
            <div class="col-md-3 col-sm-6">
                <?php $options->anps_create_color_option('anps_menu_bg_color', 'ffffff', esc_html__('Menu Background color', 'construction') );?>   
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_headings_color', '000000', esc_html__('Headings color', 'construction')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_top_bar_color', '8c8c8c', esc_html__('Top bar text color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_top_bar_bg_color', 'f9f9f9', esc_html__('Top bar background color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_footer_bg_color', '171717', esc_html__('Footer background color', 'construction')); ?>
            </div>  

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_copyright_footer_bg_color', '2c2c2c', esc_html__('Copyright footer background color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_footer_text_color', '9C9C9C', esc_html__('Footer text color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_footer_heading_text_color', 'ffffff', esc_html__('Footer heading text color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_c_footer_text_color', '9C9C9C', esc_html__('Copyright footer text color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_page_header_background_color', 'f8f9f9', esc_html__('Page header background color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_page_title', '4e4e4e', esc_html__('Page title color', 'construction')); ?>
            </div> 

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_submenu_background_color', 'ffffff', esc_html__('Submenu background color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_submenu_text_color', '8c8c8c', esc_html__('Submenu text color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_submenu_divider_color', '#ececec', esc_html__('Submenu divider color', 'construction')); ?>
            </div>   
            
            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_primary_text_top', 'ffffff', esc_html__('Text on top of primary color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_woo_cart_items_number_bg_color', 'ffde00', esc_html__('Shopping cart item number background color', 'construction')); ?>
            </div>   

            <div class="col-md-3 col-sm-6">
                <?php $style->anps_create_color_option('anps_woo_cart_items_number_color', '866700', esc_html__('Shoping cart item number text color', 'construction')); ?>
            </div>
        </div>

        <!-- Button Styles -->
        <div class="row">
            <div class="col-md-12 ">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Button styles", 'construction'); ?></h3>
            </div>
        </div>

        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Normal button", 'construction');?></h4>
                <a class="btn btn-normal btn-md"><?php esc_html_e('Button', 'construction'); ?></a>                       
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $style->anps_create_color_option('anps_normal_button_bg', 'fab702', esc_html__('Normal button background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $style->anps_create_color_option('anps_normal_button_color', 'ffffff', esc_html__('Normal button color', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $style->anps_create_color_option('anps_normal_button_hover_bg', 'ffcc43', esc_html__('Hover background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $style->anps_create_color_option('anps_normal_button_hover_color', 'ffffff', esc_html__('Normal button hover color', 'construction')); ?>
            </div>
        </div>
   
        <!-- Button with Gradient -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Button with gradient", 'construction');?></h4>
                <a class="btn btn-md btn-gradient btn-shadow"><?php esc_html_e('Button', 'construction'); ?></a>                       
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $style->anps_create_color_option('anps_gradient_button_bg', 'fab702', esc_html__('Gradient button background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $style->anps_create_color_option('anps_gradient_button_color', 'ffffff', esc_html__('Gradient button color', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $style->anps_create_color_option('anps_gradient_button_hover_bg', 'ffcc43', esc_html__('Hover background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $style->anps_create_color_option('anps_gradient_button_hover_color', 'ffffff', esc_html__('Gradient button hover color', 'construction')); ?>
            </div>
        </div>
   
        <!-- Button Dark -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Dark button", 'construction');?></h4>
                <a class="btn btn-md btn-dark btn-shadow"><?php esc_html_e('Button', 'construction'); ?></a>                       
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $style->anps_create_color_option('anps_dark_button_bg', '242424', esc_html__('Dark button background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $style->anps_create_color_option('anps_dark_button_color', 'ffffff', esc_html__('Dark button color', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $style->anps_create_color_option('anps_dark_button_hover_bg', 'ffffff', esc_html__('Hover background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $style->anps_create_color_option('anps_dark_button_hover_color', '242424', esc_html__('Dark button hover color', 'construction')); ?>
            </div>
        </div>
    
        <!-- Button Light -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Light button", 'construction');?></h4>
                <a class="btn btn-md btn-light"><?php esc_html_e('Button', 'construction'); ?></a>                       
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $style->anps_create_color_option('anps_light_button_bg', 'ffffff', esc_html__('Light button background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $style->anps_create_color_option('anps_light_button_color', '242424', esc_html__('Light button color', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $style->anps_create_color_option('anps_light_button_hover_bg', '242424', esc_html__('Hover background', 'construction')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $style->anps_create_color_option('anps_light_button_hover_color', 'ffffff', esc_html__('Light button hover color', 'construction')); ?>
            </div>
        </div>
        
        <!-- Button Minimal -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Button minimal", 'construction');?></h4>
                <a class="btn btn-md btn-minimal"><?php esc_html_e('Button', 'construction'); ?></a>                       
            </div>
            <div class="col-md-6 col-sm-6 btn-c">
                <?php $style->anps_create_color_option('anps_minimal_button_color', 'fab702', esc_html__('button color', 'construction')); ?>
            </div>
            <div class="col-md-6 col-sm-6 btn-c-h">
                <?php $style->anps_create_color_option('anps_minimal_button_hover_color', 'ffcc43', esc_html__('button hover color', 'construction')); ?>
            </div>
        </div>
    </div>          

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>