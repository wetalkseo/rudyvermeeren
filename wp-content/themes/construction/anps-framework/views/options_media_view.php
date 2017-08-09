<?php
//Check classes/Framework.php for available field options and settings.
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
if (isset($_GET['save_media'])) {
    $options->anps_save_options("options_media");
}

wp_enqueue_script("my-upload");
wp_enqueue_style("thickbox");
?>

<form action="themes.php?page=theme_options&sub_page=options_media&save_media" method="post">
    <div class="content-inner">

        <div class="row">

            <div class="col-md-12">
                <h3><i class="fa fa-picture-o"></i><?php _e('Favicon and logo:', 'construction'); ?></h3>
                <p><?php _e('If you would like to use your logo and favicon, upload them to your theme here.', 'construction'); ?></p>
            </div>

            <!-- Logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_logo', esc_html__('Logo', 'construction')); ?>
            </div>

            <!-- Logo height -->
            <div class="col-md-6">
                <?php $style->anps_create_number_option('anps_logo_height', '', esc_html__('Logo height', 'construction'), 'px'); ?>
            </div>

        </div>
        <div class="row">
            <!-- Front page logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_front_logo', esc_html__('Front page logo', 'construction')); ?>
            </div>

            <!-- Front page logo height -->
            <div class="col-md-6">
                <?php $style->anps_create_number_option('anps_front_logo_height', '', esc_html__('Front page logo height', 'construction'), 'px'); ?>
            </div>
        </div>

        <div class="row">
            <!-- Sticky logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_sticky_logo', esc_html__('Sticky logo', 'construction')); ?>
            </div>

            <!-- Sticky logo height -->
            <div class="col-md-6">
                <?php $style->anps_create_number_option('anps_sticky_logo_height', '', esc_html__('Sticky logo height', 'construction'), 'px'); ?>
            </div>
        </div>

        <div class="row">

            <div class="clearfix"></div>
            <!-- Sticky transparent Logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_sticky_transparent_logo', esc_html__('Transparent Sticky logo', 'construction')); ?>
            </div>

            <!-- Logo height -->
            <div class="col-md-6">
                <?php $style->anps_create_number_option('anps_sticky_transparent_logo_height', '', esc_html__('Transparent Sticky logo height', 'construction'), 'px'); ?>
            </div>
        </div>

        <div class="row">
            <!-- Mobile logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_mobile_logo', esc_html__('Mobile logo', 'construction')); ?>
            </div>

            <!-- Front page mobile logo -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_front_mobile_logo', esc_html__('Front page mobile logo', 'construction')); ?>
            </div>
        </div>

        <div class="row">
            <!-- Favicon -->
            <div class="col-md-6">
                <?php $style->anps_create_upload('anps_favicon', esc_html__('Favicon', 'construction')); ?>
            </div>
        </div>

    </div>

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>
