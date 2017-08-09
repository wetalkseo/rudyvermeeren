<?php 
include_once(get_template_directory() . '/anps-framework/classes/AnpsImport.php'); 
if (isset($_GET['save_file'])) {  
    $import_export->save_file();
}
if (isset($_GET['save_import'])) {  
    $import_export->import_theme_options();
}
?>
<div class="content-inner">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-file-code-o"></i><?php _e('Export', 'construction'); ?></h3>
            <form action="themes.php?page=theme_options&sub_page=import_export&save_file" method="post">
                <?php $import_export->anps_create_textarea('anps_export', json_encode($import_export->get_theme_options())); ?>
                <button type="submit" class="inline-save"><i class="fa fa-floppy-o"></i><?php esc_html_e('Export', 'construction'); ?></button>
                <button type="button" class="inline-save" id="copy-clipboard" data-clipboard-target="#anps_export"><i class="fa fa-floppy-o"></i><?php esc_html_e('Copy to clipboard', 'construction'); ?></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-file-code-o"></i><?php _e('Import', 'construction'); ?></h3>
            <form action="themes.php?page=theme_options&sub_page=import_export&save_import" method="post" enctype="multipart/form-data">
                <?php $import_export->anps_create_textarea('anps_import'); ?>
                <input type="file" class="custom pull-left import-export-file" name="import_file"/>
                <button type="submit" class="inline-save pull-right"><i class="fa fa-floppy-o"></i><?php esc_html_e('Import', 'construction'); ?></button>
            </form>
        </div>
    </div>
</div>