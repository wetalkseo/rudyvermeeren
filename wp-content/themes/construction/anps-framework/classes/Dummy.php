<?php 
include_once(get_template_directory() . '/anps-framework/classes/Framework.php');
class Dummy extends Framework {
        
    public function select() {
        return get_option('anps_dummy');
    }
    
    public function save() {
        $date = explode("/",date("Y/m"));
        $dummy_xml = "dummy1";
        if(isset($_POST['dummy1'])) {
            $dummy_xml = "dummy1";
            $dummy_number = '1';
            //shopping cart in menu (not show)
            update_option('anps_shopping_cart_header', 'hide');
            //transparent header (only front page)
            update_option('anps_front_transparent_header', '1');
            /* Logos */
            update_option('anps_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_front_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/main-logo.png');
            update_option('anps_sticky_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_sticky_transparent_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/main-logo.png');
            update_option('anps_mobile_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_favicon', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/favicon.ico');
        } 
        if(isset($_POST['dummy2'])) {
            $dummy_xml = "dummy2";
            $dummy_number = '2';
            //shopping cart in menu (not show)
            update_option('anps_shopping_cart_header', 'shop_only');
            /* Logos */
            update_option('anps_logo', 'http://anpsthemes.com/construction-demo-2/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_favicon', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/favicon.ico');
        }
        if(isset($_POST['dummy3'])) {
            $dummy_xml = "dummy3";
            $dummy_number = '3';
            //top bar
            update_option('anps_global_topmenu_style', '1');
            //above menu bar
            update_option('anps_global_above_nav_bar', '2');
            //shopping cart in menu (not show)
            update_option('anps_shopping_cart_header', 'shop_only');
            /* Logos */
            update_option('anps_logo', 'http://anpsthemes.com/construction-demo-2/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_front_logo', 'http://anpsthemes.com/construction-demo-2/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_sticky_logo', 'http://anpsthemes.com/construction-demo-2/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_mobile_logo', 'http://anpsthemes.com/construction-demo-2/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_favicon', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/favicon.ico');
        }
        if(isset($_POST['dummy4'])) {
            $dummy_xml = "dummy4";
            $dummy_number = '4';
            //shopping cart in menu (not show)
            update_option('anps_shopping_cart_header', 'hide');
            //transparent header (only front page)
            update_option('anps_front_transparent_header', '1');
            /* Logos */
            update_option('anps_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_front_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/main-logo.png');
            update_option('anps_sticky_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_sticky_transparent_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/main-logo.png');
            update_option('anps_mobile_logo', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/pages-logo.png');
            update_option('anps_favicon', 'http://anpsthemes.com/construction/wp-content/uploads/2016/01/favicon.ico');
        }
        /* set dummy to 1 */
        update_option('anps_dummy', 1);
        /* Import dummy xml */
        include_once WP_PLUGIN_DIR . '/anps_theme_plugin/importer/wordpress-importer.php'; 
        $parse = new WP_Import();
        $parse->import(get_template_directory() . "/anps-framework/classes/importer/$dummy_xml.xml");
        global $wp_rewrite;
        $blog_id = get_page_by_title("Blog")->ID;
        $error_id = get_page_by_title("404 Page")->ID;
        $first_id = get_page_by_title("Home")->ID;
        $arr = array(
            'error_page'=>$error_id
            );
        //copyright footer 2 columns
        update_option('anps_copyright_footer', '2'); 
        /* Post meta on blog */
        update_option('anps_post_meta_categories', ''); 
        update_option('anps_post_meta_author', ''); 
        
        update_option($this->prefix.'page_setup', $arr); 
        update_option('page_for_posts', $blog_id);
        update_option('page_on_front', $first_id);                                
        update_option('show_on_front', 'page'); 
        update_option('permalink_structure', '/%postname%/'); 
        $wp_rewrite->set_permalink_structure('/%postname%/');    
        $wp_rewrite->flush_rules();
        
        /* Set menu as primary */
	$menu_id = wp_get_nav_menus();
        $locations = get_theme_mod('nav_menu_locations'); 
        $locations['primary'] = $menu_id[1]->term_id; 
        set_theme_mod('nav_menu_locations', $locations);
        update_option('menu_check', true);
        
        /* Install all widgets */
        $this->__add_widgets($dummy_xml);
        
        /* Add revolution slider demo data */
        $this->__add_revslider($dummy_number);
    }
    protected function __add_revslider($dummy_xml) {
        /* Check if slider is installed */
        if(is_plugin_active("revslider/revslider.php")) {
            $slider = new RevSlider();
            if($dummy_xml=='1') {
                $slider_name = 'homeslider'.$dummy_xml;
            } elseif($dummy_xml=='2') {
                $slider_name = 'slider-'.$dummy_xml;
            } elseif($dummy_xml=='3') {
                $slider_name = 'slider'.$dummy_xml;
            } elseif($dummy_xml=='4') {
                $slider_name = 'homeslider'.$dummy_xml;
            }
            $slider->importSliderFromPost(true, true, get_template_directory() . "/anps-framework/classes/importer/$slider_name.zip");
        } else {
            echo "Revolution slider is not active. Demo data for revolution slider can't be inserted.";
        }
    }  
    
    protected function __add_widgets($dummy_xml='') {
        /* Sidebars */
        $secondary_sidebar = 'secondary-widget-area';
        $above_navigation_sidebar = 'above-navigation-bar';
        $top_left_sidebar = 'top-bar-left';
        $top_right_sidebar = 'top-bar-right';
        $footer_1_sidebar = "footer-1";
        $footer_2_sidebar = "footer-2";
        $footer_3_sidebar = "footer-3";
        $footer_4_sidebar = "footer-4";
        $copyright_1_sidebar = "copyright-1";
        $copyright_2_sidebar = "copyright-2";
        $left_services_sidebar = "left-services-sidebar";
        /* END Sidebars */
        
        /* Widgets */
        $widget_anpssocial = 'anpssocial';
        $widget_spacings = 'anpsspacings';
        $widget_anpstext = 'anpstext';
        $widget_anpsimage = 'anpsimages';
        $widget_wptext = 'text';
        $widget_navigation = 'nav_menu';
        $widget_opening_time = 'anpsopeningtime';
        $widget_download = 'anpsdownload';
        $widget_minicart = 'anpsminicart';
        $widget_anpsmenu = 'anps_menu';
        $sidebar_options = get_option('sidebars_widgets');      
        if(!isset($sidebar_options[$secondary_sidebar])){
            $sidebar_options[$secondary_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$footer_1_sidebar])){
            $sidebar_options[$footer_1_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$footer_2_sidebar])){
            $sidebar_options[$footer_2_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$footer_3_sidebar])){
            $sidebar_options[$footer_3_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$footer_4_sidebar])){
            $sidebar_options[$footer_4_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$copyright_1_sidebar])){
            $sidebar_options[$copyright_1_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$copyright_2_sidebar])){
            $sidebar_options[$copyright_2_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$left_services_sidebar])){
            $sidebar_options[$left_services_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$above_navigation_sidebar])){
            $sidebar_options[$above_navigation_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$top_left_sidebar])){
            $sidebar_options[$top_left_sidebar] = array('_multiwidget'=>1);
        }
        if(!isset($sidebar_options[$top_right_sidebar])){
            $sidebar_options[$top_right_sidebar] = array('_multiwidget'=>1);
        }
        /* All widgets */
        $anpssocial = get_option('widget_'.$widget_anpssocial);
        $anpsspacings = get_option('widget_'.$widget_spacings);
        $anpstext = get_option('widget_'.$widget_anpstext);
        $anpsimage = get_option('widget_'.$widget_anpsimage);
        $wptext = get_option('widget_'.$widget_wptext);
        $wpnavigation = get_option('widget_'.$widget_navigation);
        $anpsopening = get_option('widget_'.$widget_opening_time);
        $anpsdownload = get_option('widget_'.$widget_download);
        $anpsminicart = get_option('widget_'.$widget_minicart);
        $anpsmenu = get_option('widget_'.$widget_anpsmenu);
        /* END All widgets */
        if($dummy_xml=='dummy3') {
            /* Top bar left */
            /* Text and icon */
            if(!is_array($anpstext))$anpstext = array();
            $textcount = count($anpstext)+1;
            $sidebar_options[$top_left_sidebar][] = $widget_anpstext.'-'.$textcount;
            $anpstext[$textcount] = array(
                'texts' => 'fa-phone;<span class="important">158-985-66-22</span>|fa-envelope;mail@domain.com'
            );
            $textcount++;
            /* END Text and icon */
            /* END Top bar left */
            /* Top bar right */
            /* Social icons */
            if(!is_array($anpssocial))$anpssocial = array();
            $socialcount = count($anpssocial)+1;
            $sidebar_options[$top_right_sidebar][] = $widget_anpssocial.'-'.$socialcount;
            $anpssocial[$socialcount] = array(
                'social' => 'fa-twitter;#|fa-facebook;#|fa-linkedin;#|fa-wordpress;#',
            );
            $socialcount++;
            /* END Social icons */
            /* END Top bar left */         
        }
        /* Above navigation sidebar */
        if($dummy_xml!='dummy3') {
            /* Text and icon */
            if(!is_array($anpstext))$anpstext = array();
            $textcount = count($anpstext)+1;
            $sidebar_options[$above_navigation_sidebar][] = $widget_anpstext.'-'.$textcount;
            $anpstext[$textcount] = array(
                'texts' => 'fa-phone;<span class="important">158-985-66-22</span>'
            );
            $textcount++;
            /* END Text and icon */
            /* Text and icon */
            if(!is_array($anpstext))$anpstext = array();
            $textcount = count($anpstext)+1;
            $sidebar_options[$above_navigation_sidebar][] = $widget_anpstext.'-'.$textcount;
            $anpstext[$textcount] = array(
                'texts' => 'fa-envelope;mail@domain.com'
            );
            $textcount++;
            /* END Text and icon */
            /* Social icons */
            if(!is_array($anpssocial))$anpssocial = array();
            $socialcount = count($anpssocial)+1;
            $sidebar_options[$above_navigation_sidebar][] = $widget_anpssocial.'-'.$socialcount;
            $anpssocial[$socialcount] = array(
                'social' => 'fa-twitter;#|fa-facebook-f;#|fa-linkedin;#|fa-wordpress;#',
            );
            $socialcount++;
            /* END Social icons */
            if($dummy_xml=='dummy1' || $dummy_xml=='dummy4') {
                /* Mini cart */
                if(!is_array($anpsminicart))$anpsminicart = array();
                $minicartcount = count($anpsminicart)+1;
                $sidebar_options[$above_navigation_sidebar][] = $widget_minicart.'-'.$minicartcount;
                $anpsminicart[$minicartcount] = array();
                $textcount++;
                /* END Mini cart */
            }
        }
        /* END Above navigation sidebar */
        /* Footer 1 sidebar */
        if(!is_array($anpsimage))$anpsimage = array();
        $imagecount = count($anpsimage)+1;
        /* Image widget */
        $sidebar_options[$footer_1_sidebar][] = $widget_anpsimage.'-'.$imagecount;
        $footer_image = '/2016/01/main-logo.png';
        $upload_dir = wp_upload_dir();
        $anpsimage[$imagecount] = array(
            'image' => $upload_dir['baseurl'].$footer_image,
            'title' => 'About us'
        );
        $imagecount++;
        /* END Image widget */
        /* Spacing widget */   
        if(!is_array($anpsspacings))$anpsspacings = array();
        $spacingcount = count($anpsspacings)+1;
        $sidebar_options[$footer_1_sidebar][] = $widget_spacings.'-'.$spacingcount;
        $anpsspacings[$spacingcount] = array(
            'spacing' => 2
        );
        $anpsspacings++;
        /* END Spacing widget */    
        /* Text widget */
        if(!is_array($wptext))$wptext = array();
        $wptextcount = count($wptext)+1;
        $sidebar_options[$footer_1_sidebar][] = $widget_wptext.'-'.$wptextcount;
        $wptext[$wptextcount] = array(
            'text' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis est tellus, venenatis sed nisi in, egestas bibendum sem. Nam tempus dolor quis interdum auctor.",
            'filter' => 'on'
        );
        $wptextcount++;
        /* END Text widget */
        /* END Footer 1 sidebar */
        /* Footer 2 sidebar */   
        /* Navigation */
        if(!is_array($anpsmenu))$anpsmenu = array();
        $menucount = count($anpsmenu)+1;    
        $locations = get_theme_mod('nav_menu_locations');
        $menu = 2;
        if($locations && $locations['primary']) {
            $menu = $locations['primary'];
        }
        $sidebar_options[$footer_2_sidebar][] = $widget_anpsmenu.'-'.$menucount;
        $anpsmenu[$menucount] = array(
            'nav_menu' => $menu,
            'title' => 'Navigation'
        );
        $menucount++;
        /* END Navigation */
        /* END Footer 2 sidebar */
        /* Footer 3 sidebar */
        /* Text and icon */
        if(!is_array($anpstext))$anpstext = array();
        $textcount = count($anpstext)+1;
        $sidebar_options[$footer_3_sidebar][] = $widget_anpstext.'-'.$textcount;
        $anpstext[$textcount] = array(
            'title' => 'Construction HQ',
            'texts' => 'fa-map-marker;300 Pennsylvania Ave NW, Washington, DC 20006, USA|fa-phone;<span class="important">158-985-66-22</span>|fa-fax;158-985-66-33|fa-envelope;mail@domain.com'
        );
        $textcount++;
        /* END Text and icon */
        /* END Footer 3 sidebar */
        /* Footer 4 sidebar */
        /* Text widget */
        if(!is_array($wptext))$wptext = array();
        $wptextcount = count($wptext)+1;
        $sidebar_options[$footer_4_sidebar][] = $widget_wptext.'-'.$wptextcount;
        $wptext[$wptextcount] = array(
            'text' => "Visit us at our HQ for a mean cup of coffe and a fantastic consulting team.",
            'title' => 'Working Hours'
        );
        $wptextcount++;
        /* END Text widget */
        /* Opening time */
        if(!is_array($anpsopening))$anpsopening = array();
        $openingcount = count($anpsopening)+1;
        $sidebar_options[$footer_4_sidebar][] = $widget_opening_time.'-'.$openingcount;
        $anpsopening[$openingcount] = array(
            'opening_times' => 'Monday > Friday:;9am > 5pm;false|Saturday:;9am > 1pm;false|Sunday:;Closed;false'
        );
        $openingcount++;
        /* END Opening time */
        /* END Footer 4 sidebar */
        /* Copyright Footer 1 sidebar */
        /* Text */
        $sidebar_options[$copyright_1_sidebar][] = $widget_wptext.'-'.$wptextcount;
        $wptext[$wptextcount] = array(
            'text' => 'Copyright &copy; 2015 Construction WordPress Theme - Theme by <a href="http://www.anpsthemes.com/" target="_blank">Anpsthemes.com</a>'
        );
        $wptextcount++;
        /* END Text */
        /* END Copyright Footer 1 sidebar */
        /* Copyright Footer 2 sidebar */
        if(!is_array($anpssocial))$anpssocial = array();
        $socialcount = count($anpssocial)+1;
        $sidebar_options[$copyright_2_sidebar][] = $widget_anpssocial.'-'.$socialcount;
        $anpssocial[$socialcount] = array(
            'social' => 'fa-twitter;https://twitter.com/anpsthemes|fa-facebook;https://www.facebook.com/anpsthemes/|fa-linkedin;https://www.linkedin.com/|fa-wordpress;https://wordpress.org/',
            'target' => '1'
        );
        $socialcount++;
        /* END Copyright Footer 2 sidebar */
        /* Secondary sidebar */
        /* Navigation */
        $term = get_term_by('name', 'side menu', 'nav_menu');
        $menu_id = $term->term_id;
        $navigationcount = count($wpnavigation)+1;
        $sidebar_options[$secondary_sidebar][] = $widget_navigation.'-'.$navigationcount;
        $wpnavigation[$navigationcount] = array(
            'nav_menu' => $menu_id
        );
        $navigationcount++;
        /* END Navigation */
        /* Text and Icon */
        if(!is_array($anpstext))$anpstext = array();
        $textcount = count($anpstext)+1;
        $sidebar_options[$secondary_sidebar][] = $widget_anpstext.'-'.$textcount;
        $anpstext[$textcount] = array(
            'title' => 'OUR OFFICES',
            'texts' => 'fa-map-marker;300 Pennsylvania Ave NW, Washington, DC 20006, USA|fa-phone;<span class="important">158-985-66-22</span>|fa-fax;158-985-66-33|fa-envelope;mail@domain.com'
        );
        $textcount++;
        /* END Text and Icon */
        /* Download */
        if(!is_array($anpsdownload))$anpsdownload = array();
        $downloadcount = count($anpsdownload)+1;
        $sidebar_options[$secondary_sidebar][] = $widget_download.'-'.$downloadcount;
        $anpsdownload[$downloadcount] = array(
            'title' => 'OUR BROCHURE',
            'file_title' => 'Download PDF brochure',
            'icon' => 'fa-file-pdf-o',
            'icon_color' => '#ffffff',
            'bg_color' => '#fab702'
        );
        $downloadcount++;
        /* END Download */
        /* END Secondary sidebar */
        /* Left services sidebar */
        /* Custom menu */
        $term_lss = get_term_by('name', 'Left side services menu', 'nav_menu');
        $menu_lss_id = $term_lss->term_id;
        $navigationcount = count($wpnavigation)+1;
        $sidebar_options[$left_services_sidebar][] = $widget_navigation.'-'.$navigationcount;
        $wpnavigation[$navigationcount] = array(
            'nav_menu' => $menu_lss_id
        );
        $navigationcount++;
        /* END Custom menu */
        /* Text and icon */
        if(!is_array($anpstext))$anpstext = array();
        $textcount = count($anpstext)+1;
        $sidebar_options[$left_services_sidebar][] = $widget_anpstext.'-'.$textcount;
        $anpstext[$textcount] = array(
            'title' => 'OUR OFFICES',
            'texts' => 'fa-map-marker;300 Pennsylvania Ave NW, Washington, DC 20006, USA|fa-phone;<span class="important">158-985-66-22</span>|fa-fax;158-985-66-33|fa-envelope;mail@domain.com'
        );
        $textcount++;
        /* END Text and icon */
        /* Download */
        if(!is_array($anpsdownload))$anpsdownload = array();
        $downloadcount = count($anpsdownload)+1;
        $sidebar_options[$left_services_sidebar][] = $widget_download.'-'.$downloadcount;
        $anpsdownload[$downloadcount] = array(
            'title' => 'OUR BROCHURE',
            'file_title' => 'Download PDF brochure',
            'icon' => 'fa-file-pdf-o',
            'icon_color' => '#ffffff',
            'bg_color' => '#fab702'
        );
        $downloadcount++;
        /* END Download */
        /* END Left services sidebar */
        update_option('sidebars_widgets',$sidebar_options);
        update_option('widget_'.$widget_anpssocial, $anpssocial);
        update_option('widget_'.$widget_anpstext, $anpstext);
        update_option('widget_'.$widget_anpsimage, $anpsimage);
        update_option('widget_'.$widget_wptext, $wptext);
        update_option('widget_'.$widget_navigation, $wpnavigation);
        update_option('widget_'.$widget_opening_time, $anpsopening);
        update_option('widget_'.$widget_spacings, $anpsspacings);
        update_option('widget_'.$widget_download, $anpsdownload);
        update_option('widget_'.$widget_minicart, $anpsminicart);
        update_option('widget_'.$widget_anpsmenu, $anpsmenu);
    }
}
$dummy = new Dummy();