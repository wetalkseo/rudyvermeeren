<?php
include_once(get_template_directory() . '/anps-framework/classes/Framework.php');
class AnpsImport extends Framework {        
    /* Get all anps theme options */
    public function get_theme_options() {
        $data = array();
        foreach(wp_load_alloptions() as $name => $value) {
            if(substr($name, 0, 5)=='anps_') {
                if(stristr($name, 'anps_custom_fonts', false) || stristr($name, 'anps_google_fonts', false)) {
                    continue;
                }
                $data[$name] = $value;
            }
        }
        return $data;
    }
    /* Save file */
    public function save_file() {
        header('Content-disposition: attachment; filename=anps-theme-options.json');
        header('Content-Type: application/json');   
        ob_clean();
        echo stripslashes($_POST['anps_export']);
        exit;
    }
    /* Save theme options */
    public function import_theme_options() {
        if($_FILES['import_file']['name']!='') {
            $creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());
            if(!WP_Filesystem($creds)){return false;}	
            global $wp_filesystem;
            $data = json_decode($wp_filesystem->get_contents($_FILES['import_file']['tmp_name'])); 
            foreach($data as $name=>$value) {
                update_option($name, $value);
            } 
        } else {
            $data = json_decode(stripslashes($_POST['anps_import']), true);
            if(isset($data)) {
                foreach($data as $name => $value) {
                    update_option($name, $value);
                }
            }
        }
        header("Location: themes.php?page=theme_options&sub_page=import_export");
    }
}
$import_export = new AnpsImport();