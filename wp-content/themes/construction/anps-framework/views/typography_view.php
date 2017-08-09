<?php  
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
wp_enqueue_script('font_subsets');
/* Save form */
if(isset($_GET['save_fonts'])) {
    $style->anps_save_fonts();
}
/* get all fonts */
$fonts = $style->all_fonts(); 
?>

<form action="themes.php?page=theme_options&sub_page=typography&save_fonts" method="post">

    <div class="content-inner">  
        <div class="row" id="anps_predefined_colors">
            <div class="col-md-12">
                <h3><i class="fa fa-text-height"></i><?php _e('Font family', 'construction'); ?></h3>
                <h4><?php _e('Custom font styles', 'construction'); ?></h4>
                <p><?php _e('If subsets are not active please update google fonts', 'construction'); ?> <a href="themes.php?page=theme_options&sub_page=theme_style_google_font"><?php _e('here', 'construction'); ?></a>.</p>
            </div>

            <!-- Font type 1 -->
            <div class="col-md-4 col-sm-6">
                <label for="font_type_1"><?php _e('Font type 1', 'construction'); ?></label>                    
                <select name="font_type_1" id="font_type_1">
                    <?php foreach($fonts as $name=>$value) : ?>
                    <optgroup label="<?php echo esc_attr($name); ?>">
                    <?php foreach ($value as $font) : 
                            $selected = '';
                            if ($font['value'] == get_option('font_type_1', 'Montserrat')) {
                                $selected = 'selected="selected"';     
                                if($name=="Google fonts") {
                                    $subsets = $font['subsets'];
                                } else {
                                    $subsets = "";
                                }
                            }                            
                            ?>
                            <option value="<?php echo esc_attr($font['value'])."|".esc_attr($name); ?>" <?php echo $selected; ?>><?php echo esc_attr($font['name']); ?></option>
                    <?php endforeach; ?>
                    </optgroup>  
                    <?php endforeach; ?>
                </select>
                <div id="font_subsets_1" class="font_subsets">
                    <?php if(isset($subsets)&&$subsets!="") : 
                        $i=0;
                        foreach($subsets as $item) :
                            if(is_array(get_option("font_type_1_subsets"))&&in_array($item, get_option("font_type_1_subsets"))) {
                                $checked = " checked";
                            } else {
                                $checked = "";
                            }
                            ?>
                        <input type="checkbox" name="font_type_1_subsets[]" value="<?php echo esc_html($item); ?>" <?php echo $checked;?> /><?php echo esc_html($item); ?><br />
                        <?php $i++; 
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>

            <!-- Font type 2 -->
            <div class="col-md-4 col-sm-6">
                <label for="font_type_2"><?php _e('Font type 2', 'construction'); ?></label>
                <select name="font_type_2" id="font_type_2">
                    <?php foreach($fonts as $name=>$value) : ?>
                    <optgroup label="<?php echo esc_attr($name); ?>">
                    <?php foreach ($value as $font) : 
                            $selected = ''; 
                            if ($font['value'] == get_option('font_type_2', "PT+Sans")) { 
                                $selected = 'selected="selected"';
                                if($name=="Google fonts") {
                                    $subsets2 = $font['subsets'];
                                } else {
                                    $subsets2 = "";
                                }
                            }
                            ?>
                            <option value="<?php echo esc_attr($font['value'])."|".esc_attr($name); ?>" <?php echo $selected; ?> <?php if(esc_attr($name=="Google fonts")) {echo "data-font='gfonts'";} ?>><?php echo esc_attr($font['name']); ?></option>
                    <?php endforeach; ?>
                    </optgroup>  
                    <?php endforeach; ?>
                </select>
                <div id="font_subsets_2" class="font_subsets">
                    <?php if(isset($subsets2)&&$subsets2!="") : 
                        $i=0;
                        foreach($subsets2 as $item) :
                            if(is_array(get_option("font_type_2_subsets"))&&in_array($item, get_option("font_type_2_subsets"))) {
                                $checked = " checked";
                            } else {
                                $checked = "";
                            }
                            ?>
                        <input type="checkbox" name="font_type_2_subsets[]" value="<?php echo esc_html($item); ?>" <?php echo $checked;?> /><?php echo esc_html($item); ?><br />
                        <?php $i++; 
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>

            <!-- Navigation font type -->
            <div class="col-md-4 col-sm-6">
                <label for="font_type_navigation"><?php _e('Navigation font type', 'construction'); ?></label>
                <select name="font_type_navigation" id="font_type_navigation">
                    <?php foreach($fonts as $name=>$value) : ?>
                    <optgroup label="<?php echo esc_attr($name); ?>">
                    <?php foreach ($value as $font) :
                            $selected = '';
                            if ($font['value'] == get_option('font_type_navigation', 'Montserrat')) {
                                $selected = 'selected="selected"';
                                if($name=="Google fonts") {
                                    $subsets3 = $font['subsets'];
                                } else {
                                    $subsets3 = "";
                                }
                            }
                            ?>
                            <option value="<?php echo esc_attr($font['value'])."|".esc_attr($name); ?>" <?php echo $selected; ?> <?php if(esc_attr($name=="Google fonts")) {echo "data-font='gfonts'";} ?>><?php echo esc_attr($font['name']); ?></option>
                    <?php endforeach; ?>
                    </optgroup>  
                    <?php endforeach; ?>
                </select>
                <div id="font_subsets_navigation" class="font_subsets">
                    <?php if(isset($subsets3)&&$subsets3!="") : 
                        $i=0;
                        foreach($subsets3 as $item) :
                            if(is_array(get_option("font_type_navigation_subsets"))&&in_array($item, get_option("font_type_navigation_subsets"))) {
                                $checked = " checked";
                            } else {
                                $checked = "";
                            }
                            ?>
                        <input type="checkbox" name="font_type_navigation_subsets[]" value="<?php echo esc_html($item); ?>" <?php echo $checked;?> /><?php echo esc_html($item); ?><br />
                        <?php $i++; 
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <!-- Font sizes -->
        <h3><i class="fa fa-text-height"></i><?php _e('Font sizes', 'construction'); ?></h3>
        <div class="row">         
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_body_font_size', '14', esc_html__('Body font size', 'construction'), 'px'); ?>
            </div>   
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_menu_font_size', '13', esc_html__('Menu font size', 'construction'), 'px'); ?>
            </div>
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_submenu_font_size', '12', esc_html__('Submenu font size', 'construction'), 'px'); ?>
            </div>
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_h1_font_size', '31', esc_html__('Content heading 1 font size', 'construction'), 'px'); ?>
            </div>  
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_h2_font_size', '24', esc_html__('Content heading 2 font size', 'construction'), 'px'); ?>
            </div> 
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_h3_font_size', '21', esc_html__('Content heading 3 font size', 'construction'), 'px'); ?>
            </div> 
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_h4_font_size', '18', esc_html__('Content heading 4 font size', 'construction'), 'px'); ?>
            </div> 
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_h5_font_size', '16', esc_html__('Content heading 5 font size', 'construction'), 'px'); ?>
            </div> 
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_page_heading_h1_font_size', '36', esc_html__('Page heading 1 font size', 'construction'), 'px'); ?>
            </div> 
            <div class="col-md-4 col-sm-6">
                <?php $style->anps_create_number_option('anps_blog_heading_h1_font_size', '36', esc_html__('Single blog page heading 1 font size', 'construction'), 'px'); ?>
            </div>                
        </div>
    </div>

    <!-- Save form -->
    <?php $style->anps_save_button(); ?>
</form>