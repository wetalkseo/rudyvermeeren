<?php
/* Custom field for Table shortcode */
function table_field($settings, $value) {       
    if($value == "") {
    	$value = "[table_head][table_row][table_heading_cell][/table_heading_cell][/table_row][/table_head][table_body][table_row][table_cell][/table_cell][/table_row][/table_body]";
    }
    $matches = array(); 
    $match_vals = array(
        'row-start' => array('[table_row]', '<tr>'),
        'row-end' => array('[/table_row]', '</tr>'),
        'heading-start' => array('[table_heading_cell]', '<th><input type="text" placeholder="' . esc_html__("Table heading", 'construction') . '" value="'),
        'heading-end' => array('[/table_heading_cell]', '" /></th>'),
        'cell-start' => array('[table_cell]', '<td><input type="text" placeholder="' . esc_html__("Table cell", 'construction') . '" value="'),
        'cell-end' => array('[/table_cell]', '" /></td>')
    );
    /* Get table head */
    $head = preg_match('/\[table_head\](.*?)\[\/table_head\]/s', $value, $matches);
    $head = $matches[1];
    $head = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $head);
    $head = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $head);
    $head = str_replace($match_vals['heading-start'][0], $match_vals['heading-start'][1], $head);
    $head = str_replace($match_vals['heading-end'][0], $match_vals['heading-end'][1], $head);
    /* Get table body */
    $body = preg_match('/\[table_body\](.*?)\[\/table_body\]/s', $value, $matches);
    $body = $matches[1];
    $body = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $body);
    $body = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $body);
    $body = str_replace($match_vals['cell-start'][0], $match_vals['cell-start'][1], $body);
    $body = str_replace($match_vals['cell-end'][0], $match_vals['cell-end'][1], $body);
    /* Get table foot */
    $foot = preg_match('/\[table_foot\](.*?)\[\/table_foot\]/s', $value, $matches);
    if( isset($matches[1]) ) {
    	$foot = $matches[1];
	}
    $foot = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $foot);
    $foot = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $foot);
    $foot = str_replace($match_vals['cell-start'][0], $match_vals['cell-start'][1], $foot);
    $foot = str_replace($match_vals['cell-end'][0], $match_vals['cell-end'][1], $foot);
    
    $number_of_rows = substr_count($value, '[table_row]');
    $number_of_cells = substr_count($head, '<th>');

    $data = '<input type="text" value="'.$value.'" name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select anps_custom_val '.$settings['param_name'].' '.$settings['type'].'" id="anps_custom_prod">';
    $data .= '<div class="anps-table-field">';
        $data .= '<div class="anps-table-field-remove-rows">';
        for($i=0;$i<$number_of_rows;$i++) {
        	if( $i == 0 ) {
        		$data .= '<button style="visibility: hidden;" title="' . esc_html__("Remove row", 'construction') . '">&#215;</button>';
        	} else {
        		$data .= '<button title="' . esc_html__("Remove row", 'construction') . '">&#215;</button>';
        	}
        }
        $data .= '</div>';
        $data .= '<div class="scroll-x"><table class="anps-table-field-remove-cells"><tbody><tr>';
        for($i=0;$i<$number_of_cells;$i++) {
            $data .= '<td><button title="' . esc_html__("Remove cell", 'construction') . '">&#215;</button></td>';
        }
        $data .= '</tr></tbody></table>';
        $data .= '<table data-heading-placeholder="' . esc_html__("Table heading", 'construction') . '" data-cell-placeholder="' . esc_html__("Table cell", 'construction') . '" class="anps-table-field-vals">';
        $data .= '<thead>' . $head . '</thead>';
        $data .= '<tbody>' . $body . '</tbody>';
        //$data .= '<tfoot>' . $foot . '</tfoot>';
        $data .= '</table></div>';
        $data .= '<div class="anps-table-field-add-cells">';
            $data .= '<button title="' . esc_html__("Add cells", 'construction') . '">+</button>';
        $data .= '</div>';
        $data .= '<div class="anps-table-field-add-rows">';
            $data .= '<button title="' . esc_html__("Add row", 'construction') . '">+</button>';
        $data .= '</div>';
    $data .= '</div>';
    return $data;
}
/* Shortcodes */
/* Testimonials */
class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {
    static  function anps_testimonials_func($atts, $content) {
        return anps_testimonials($atts, $content);
    }
} 
/* END Testimonials */
/* Testimonial item */
class WPBakeryShortCode_anps_testimonial extends WPBakeryShortCode {
    static function anps_testimonial_func($atts, $content) { 
        return anps_testimonial($atts, $content);
    }
}
/* END Testimonial */
/* Timeline */
class WPBakeryShortCode_timeline extends WPBakeryShortCodesContainer {
    static function anps_timeline_func($atts, $content) {     
        return anps_timeline_func($atts, $content);
    }
}
/* END Timeline */
/* Timeline item */
class WPBakeryShortCode_timeline_item extends WPBakeryShortCode {
    static function anps_timeline_item_func($atts, $content) { 
        return anps_timeline_item_func($atts, $content);
    }
}
/* END Timeline item */
/* Google maps */
class WPBakeryShortCode_google_maps extends WPBakeryShortCodesContainer {
    static function anps_google_maps_func($atts, $content) {     
        return anps_google_maps_func($atts, $content);
    }
}
/* END Google maps */
/* Google maps advanced item */
class WPBakeryShortCode_google_maps_item extends WPBakeryShortCode {
    static function anps_google_maps_item_func($atts, $content) { 
        return anps_google_maps_item_func($atts, $content);
    }
}
/* END Google maps item */
/* Logos */
class WPBakeryShortCode_logos extends WPBakeryShortCodesContainer {
    static function anps_logos_func($atts, $content) { 
        return anps_logos_func($atts, $content);
    }
} 
/* END Logos */
/* Logo */
class WPBakeryShortCode_anps_logo extends WPBakeryShortCode {
    static function anps_logo_func($atts, $content) { 
        return anps_logo_func($atts, $content);
    }
}
/* END Logo */
/* Contact info */
class WPBakeryShortCode_contact_info extends WPBakeryShortCodesContainer {
    static function contact_info_func($atts, $content) {
        return anps_contact_info_func($atts, $content);
    }
}
/* END Contact info */
/* Contact info item */
class WPBakeryShortCode_contact_info_item extends WPBakeryShortCode {
    static function contact_info_item($atts, $content) { 
        return anps_contact_info_item_func($atts, $content);
    }
}
/* END contact info item */
/* Social icons */
class WPBakeryShortCode_social_icons extends WPBakeryShortCodesContainer {
    static function social_icons_func($atts, $content) {
        return anps_social_icons_func($atts, $content);
    }
}
/* END Social icons */
/* Social icon */
class WPBakeryShortCode_social_icon extends WPBakeryShortCode {
    static function social_icon_item_func($atts, $content) { 
        return anps_social_icon_item_func($atts, $content);
    }
}
/* END Social icon */
/* List */
class WPBakeryShortCode_anps_list extends WPBakeryShortCodesContainer {
    static function anps_list_func($atts, $content) {   
        return anps_list_func($atts, $content);
    }
}
/* END List */
/* List item */
class WPBakeryShortCode_anps_list_item extends WPBakeryShortCodesContainer {
    static function anps_list_item_func($atts, $content) {   
        return anps_list_item_func($atts, $content);
    }
}
/* END List item */
/* END Shortcodes */
/* Remove Default VC values */
$vc_values = array(
    'vc_gmaps',
);
foreach ($vc_values as $vc_value) {
    vc_remove_element($vc_value);
}
/* Blog categories new parameter */
function blog_categories_settings_field($settings, $value) {    
    $blog_data = '<select name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$settings['param_name'].' '.$settings['type'].'">';
    $blog_data .= '<option class="0" value="">'.esc_html__("All", 'construction').'</option>';
    foreach(get_categories() as $val) {
        $selected = '';
        if ($value!='' && $val->slug == $value) {
             $selected = ' selected="selected"';
        }
        $blog_data .= '<option class="'.$val->slug.'" value="'.$val->slug.'"'.$selected.'>'.$val->name.'</option>';
    }
    $blog_data .= '</select>';
    return $blog_data;
}
/* Portfolio categories new parameter */
function portfolio_categories_settings_field($settings, $value) {   
    $categories = get_terms('portfolio_category');
    $data = '<select name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$settings['param_name'].' '.$settings['type'].'">';
    $data .= '<option class="0" value="0">'.esc_html__("All", 'construction').'</option>';
    foreach($categories as $val) {
        $selected = '';
        if ($value!='' && $val->term_id == $value) {
             $selected = ' selected="selected"';
        }
        $data .= '<option class="'.$val->term_id.'" value="'.$val->term_id.'"'.$selected.'>'.$val->name.'</option>';
    }
    $data .= '</select>';
    return $data;
}
/* All pages new parameter */
function all_pages_settings_field($settings, $value) {   
    $data = '<select name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$settings['param_name'].' '.$settings['type'].'">';
    foreach(get_pages() as $val) {
        $selected = '';
        if ($value!='' && $val->ID == $value) {
             $selected = ' selected="selected"';
        }
        $data .= '<option class="'.$val->ID.'" value="'.$val->ID.'"'.$selected.'>'.$val->post_title.'</option>';
    }
    $data .= '</select>';
    return $data;
}
/* VC change bootstrap classes */ 
add_filter( 'vc_shortcodes_css_class', 'anps_bootstrap_classes', 10, 2 );
function anps_bootstrap_classes( $class_string, $tag ) {
  if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
    $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'vc_col-md-$1', $class_string ); // This will replace "vc_col-sm-%" with "my_col-sm-%"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}


/* Add anps style to backend vc_tta_tabs dropdown */
vc_add_param('vc_btn', array(
    "name" => esc_html__("Anps button styles", 'construction'),
    "type" => "dropdown",
    "heading" => esc_html__( 'Anps button style', 'js_composer' ),
    'param_name' =>'anps_style', 
        'value' => array(
            esc_html__( 'Normal', 'js_composer' ) => 'btn-normal',            
            esc_html__( 'Gradient', 'js_composer' ) => 'btn-gradient',  
            esc_html__( 'Dark', 'js_composer' ) => 'btn-dark',  
            esc_html__( 'Light', 'js_composer' ) => 'btn-light',            
            esc_html__( 'Minimal', 'js_composer' ) => 'btn-minimal',   
        ),
    'dependency' => array(
        'element' => 'style',
        'value' => array( 'anps' ),
    ),
    'weight' => 1,        
    'description' => esc_html__( 'Styling can be defined in theme options.', 'js_composer' )
    )
);

vc_add_param('vc_btn', array(
        "name" => esc_html__("Button shadow", 'construction'),
        'type' => 'checkbox',
        'heading' => esc_html__( 'Add shadow?', 'js_composer' ),
        'param_name' => 'add_shadow',
        'dependency' => array(
            'element' => 'style',
            'value' => array( 'anps' ),
        ),   
        'weight' => 1,
    )
);
