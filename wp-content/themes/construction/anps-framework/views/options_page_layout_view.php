<?php
//Check classes/Framework.php for available field options and settings.
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');
wp_enqueue_script("my-upload");
wp_enqueue_style("thickbox");
wp_enqueue_script('anps_pattern');

if (isset($_GET['save_page'])) {
     $options->anps_save_options("options");
}
?>
<form action="themes.php?page=theme_options&sub_page=options_page&save_page" method="post">
    <div class="content-inner">
        <div class="row layout">
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Page layout:", 'construction'); ?></h3>
            </div>

            <div class="info col-md-6">
                <!-- Boxed -->
                <?php
                    if(get_option("anps_is_boxed", "0")=="0"){
                        $checked='';

                    } else {
                        $checked = 'checked';
                    }
                ?>

                <?php $style->anps_create_checkbox('anps_is_boxed', esc_html__('Boxed version', 'construction'), '0');?>

            </div>
            <div class="clearfix"></div>
            <!-- Pattern -->
            <div class="boxed-wrapper">
                <div id="pattern-select-wrapper">
                    <label class="col-md-12" for="anps_pattern"><?php esc_html_e("Choose a pattern:", 'construction'); ?></label>
                    <div class="admin-patern-radio col-md-12 hidden">
                        <?php for($i = 0; $i < 10; $i++):
                            if(get_option('anps_pattern') == $i) {
                                $checked = 'checked';

                            } else {
                                $checked = '';

                            }
                            ?>
                            <input type="radio" id="anps_pattern" name="anps_pattern" value="<?php echo esc_attr($i); ?>" <?php echo $checked; ?>/>
                        <?php endfor; ?>
                    </div>
                    <div class="admin-patern-select col-md-12">
                        <?php for ($i = 0; $i < 10; $i++) : ?>
                            <?php if (get_option('anps_pattern') == $i): ?>
                                <img id="selected-pattern" src="<?php echo get_template_directory_uri(); ?>/css/boxed/pattern-<?php echo esc_attr($i); ?>.png" />
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/css/boxed/pattern-<?php echo esc_attr($i); ?>.png" />
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <!-- Custom background -->
                <div class="input col-md-12" id="patern-type-wrapper">
                    <label for="anps_type"><?php esc_html_e("Custom background type", 'construction' ); ?></label>
                    <div class="patern-type">
                        <?php $types = array(esc_html('stretched'), esc_html('tilled'), esc_html('custom-color'));
                        foreach ($types as $type) :
                            if(get_option('anps_type', "")==$type) {
                                $checked='checked';
                            } else {
                                $checked = '';
                            }
                            ?>
                        <span class="onethird">
                            <input type="radio" id="back-type-<?php echo esc_attr($type); ?>" name="anps_type" value="<?php echo esc_attr($type); ?>" <?php echo $checked; ?>/>
                            <label for="back-type-<?php echo esc_attr($type); ?>"><?php echo esc_attr($type); ?></label>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Custom pattern -->
                <div class="col-md-12"  <?php if ( (get_option('anps_is_boxed', "0")=="0") || ( get_option('anps_pattern', "") != 0 ) ) echo 'style="display: none"'; ?> id="custom-patern-wrapper">
                    <?php $style->anps_create_upload('anps_custom_pattern', esc_html__('Custom background image/pattern', 'construction')); ?>
                </div>
                <!-- Custom background color -->

                <div id="custom-background-color-wrapper" class="col-md-12" >
                    <?php $style->anps_create_color_option('anps_bg_color', 'transparent', esc_html__('Background color', 'construction')); ?>
                </div>
            </div>
        </div>
        <!-- Page Sidebars (global settings) -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e('Page Sidebars', 'construction'); ?></h3>
                <p><?php esc_html_e('This will change the default sidebar value on all pages. It can be changed on each page individually.', 'construction'); ?></p>
            </div>

            <!-- Left Sidebar -->
            <div class="col-md-6">
                <?php $style->anps_create_select( 'anps_page_sidebar_left', $style->anps_get_sidebars_array(), esc_html__('Left Sidebar', 'construction'));?>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-6">
                <?php $style->anps_create_select( 'anps_page_sidebar_right', $style->anps_get_sidebars_array(), esc_html__('Right Sidebar', 'construction'));?>
            </div>

            <!-- Post Sidebars (global settings) -->
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Post Sidebars", 'construction'); ?></h3>
                <p><?php esc_html_e('This will change the default sidebar value on all posts. It can be changed on each post individually.', 'construction'); ?></p>
            </div>

            <!-- Left Sidebar -->
            <div class="col-md-6">
                <?php $style->anps_create_select( 'anps_post_sidebar_left', $style->anps_get_sidebars_array(), esc_html__('Left Sidebar', 'construction'));?>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-6">
                <?php $style->anps_create_select( 'anps_post_sidebar_right', $style->anps_get_sidebars_array(), esc_html__('Right Sidebar', 'construction'));?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom:0px;"><i class="fa fa-columns"></i><?php esc_html_e('Heading', 'construction'); ?></h3>
            </div>
           <!-- Enable/Disable page title and background -->
            <div class="col-md-6">
                <?php $style->anps_create_checkbox('anps_heading_status', esc_html__('Enable page title and background', 'construction'), '1');?>
            </div>
             <!-- Breadcrumbs enable/disable -->
            <div class="col-md-6">
                <?php $style->anps_create_checkbox('anps_breadcrumbs_status', esc_html__('Enable Bredcrumbs', 'construction'), '1');?>
            </div>

        </div>

        <div class="row">
            <!-- Comments on page (enable/disable) -->
            <div class="col-md-12">
                <h3 style="margin-bottom:0px;"><i class="fa fa-columns"></i><?php esc_html_e('Page comments', 'construction'); ?></h3>
            </div>
            <div class="col-md-6">
                <?php $style->anps_create_checkbox('anps_page_comments', esc_html__('Enable page comments', 'construction'), '1');?>
            </div>
            <!-- END Comments on page (enable/disable) -->
            <!-- Mobile layout -->

            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e('Blog layout', 'construction'); ?></h3>
            </div>
            <div class="col-md-12">
                <p><?php esc_html_e('This option defines default display of blog, archive pages, categories and tags.', 'construction'); ?></p>
                <?php $options = array('col-md-12'=>esc_html__('1 column', 'construction') ,'col-md-6'=>esc_html__('2 columns', 'construction'), 'col-md-4'=>esc_html__('3 columns', 'construction'), 'col-md-3'=>esc_html__('4 columns', 'construction'));
                 $style->anps_create_select('anps_blog_columns', $options, false, 'col-md-12', '1') ;?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $style->anps_save_button(); ?>
</form>
