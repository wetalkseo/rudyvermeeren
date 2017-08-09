<?php 
include_once(get_template_directory() . '/anps-framework/classes/Style.php');

if (isset($_GET['save_font']))
            $style->upload_font();
?>
<form action="themes.php?page=theme_options&sub_page=theme_style_custom_font&save_font" method="post" enctype="multipart/form-data">
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-text-height"></i><?php _e("Upload custom fonts", 'construction'); ?></h3>
                <p><?php _e('To maximize your customization you can upload your own typography. Simply upload your font from your computer.', 'construction'); ?></p><br>
                <div class="input"><input type="file" class="custom" name="font"/></div>    
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $style->anps_save_button(); ?>
</form>