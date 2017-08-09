<?php 
include_once(get_template_directory() . '/anps-framework/classes/Dummy.php');

if (isset($_GET['save_dummy'])) {
    $dummy->save();
}
?>
<form action="themes.php?page=theme_options&sub_page=dummy_content&save_dummy" method="post">
    <div class="content-inner">

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-dropbox"></i><?php _e('Insert dummy content: posts, pages, categories', "construction"); ?></h3>
                <p><?php printf(esc_html__('Importing demo content is the fastest way to get you started. %s Please %s install all plugins required by the theme %s before importing content. If you already have some content on your site, make a backup just in case.', 'construction'), '<br>', '<strong>', '</strong>'); ?></p>
                
                <?php if(ini_get('max_execution_time') < 600 || ini_get('memory_limit') < 256 || ini_get('upload_max_filesize')< 32 || ini_get('post_max_size') < 32): ?>
                <div class="alert alert-danger-style-2">
                    <i class="fa fa-exclamation"></i> <?php esc_html_e('One or more issues with server found! Please take a look at the System Requirements tab.', 'construction'); ?>
                </div>
                <?php endif; ?>      
            </div>
        
            <div class="col-md-12">
                <?php 
                $dummy_array = array (
                    'dummy1' => array (
                        'image' => 'demo1-install.jpg',
                        'title' => esc_html__('Demo 1', 'construction'),
                        'link'  => 'http://anpsthemes.com/construction'
                    ),
                    'dummy2' => array (
                        'image' => 'demo2-install.jpg',
                        'title' => esc_html__('Demo 2', 'construction'),
                        'link'  => 'http://anpsthemes.com/construction-demo-2'
                    ),
                    'dummy3' => array (
                        'image' => 'demo3-install.jpg',
                        'title' => esc_html__('Demo 3', 'construction'),
                        'link'  => 'http://anpsthemes.com/construction-demo-3'
                    ),
                    'dummy4' => array (
                        'image' => 'demo4-install.jpg',
                        'title' => esc_html__('Demo 4', 'construction'),
                        'link'  => 'http://anpsthemes.com/construction-demo-4'
                    )                    
                 );
                $dummy->anps_create_dummy_options($dummy_array); ?>
            </div>
        </div>
    </div>
</form>