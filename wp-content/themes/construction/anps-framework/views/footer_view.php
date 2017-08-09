<?php
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
if (isset($_GET['save_options'])) {  

    if(!isset($_POST['anps_footer_disable'])) {
        $_POST['anps_footer_disable'] = "";
    } else {
        $_POST['anps_footer_disable'] = "1"; 
    }
    $options->anps_save_options("footer");
} 
?>
<form action="themes.php?page=theme_options&sub_page=footer&save_options" method="post">
    <div class="content-inner">

       <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-level-down"></i><?php esc_html_e("Footer", 'construction'); ?></h3>
            </div>
            <div class="col-md-4">
                <?php $style->anps_create_checkbox('anps_enable_footer', esc_html__('Enable footer', 'construction'), '1');?>
            </div>
            <!-- Footer style -->        
            <div class="col-md-4">            
                <label for="anps_footer_style"><?php esc_html_e("Footer style", 'construction'); ?></label>            
                <select name="anps_footer_style" id='anps_footer_style'>                
                    <option value="0"><?php esc_html_e('*** Select ***', 'construction'); ?></option>                
                    <?php $pages = array("2"=>esc_html__('2 columns', 'construction'), "3" => esc_html__('3 columns', 'construction'), "4" => esc_html__('4 columns', 'construction'));                
                    foreach ($pages as $key => $item) :                    
                        if (get_option('anps_footer_style') == $key) {                        
                            $selected = 'selected="selected"';                    
                        } else {                         
                            $selected = ''; 
                        } ?>                    
                    <option value="<?php echo esc_attr($key); ?>" <?php echo $selected; ?>><?php echo esc_attr($item); ?></option>                 
                    <?php endforeach; ?>            
                </select>        
            </div>     
            <!-- Copyright footer -->
            <div class="col-md-4">            
                <label for="anps_copyright_footer"><?php esc_html_e("Copyright footer", 'construction'); ?></label>            
                <select name="anps_copyright_footer" id="anps_copyright_footer">                
                    <option value="0"><?php esc_html_e('*** Select ***', 'construction'); ?></option>                
                    <?php $pages = array("1"=>esc_html__('1 column', 'construction'), "2" => esc_html__('2 columns', 'construction'));                
                    foreach ($pages as $key => $item) :                    
                        if (get_option('anps_copyright_footer') == $key) {                        
                            $selected = 'selected';                    
                        } else {                         
                            $selected = ''; 
                        } ?>                    
                    <option value="<?php echo esc_attr($key); ?>" <?php echo $selected; ?>><?php echo esc_attr($item); ?></option>                 
                    <?php endforeach; ?>            
                </select>        
            </div> 

            <div class="col-md-12">
                <h3><i class="fa fa-level-down"></i><?php esc_html_e("Desktop style", 'construction'); ?></h3>
            </div>
            <div class="col-md-12">
                <?php $layout = array("classic"=>esc_html__('Classic', 'construction') ,"fixed-footer"=>esc_html__('Fixed', 'construction'));
                 $style->anps_create_select('anps_footer_style_fixed', $layout) ;?>
            </div>   
            
            <!-- Mobile layout -->
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Mobile layout", 'construction'); ?></h3>
            </div>

            <div class="col-md-12">
                <?php $layout = array("1"=>esc_html__('1 column', 'construction') ,"2"=>esc_html__('2 columns', 'construction'));
                 $style->anps_create_select('anps_mobile_footer_columns', $layout) ;?>
            </div>                      
        </div> 
    </div>

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>