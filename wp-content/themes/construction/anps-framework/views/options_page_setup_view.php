<?php 
//Check classes/Framework.php for available field options and settings.
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
if (isset($_GET['save_page_setup'])) {  
    $options->anps_save_options("options_page_setup");
}
?>
<form action="themes.php?page=theme_options&sub_page=options_page_setup&save_page_setup" method="post">
    <div class="content-inner">
        <!-- Home page -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Home page', 'construction'); ?></h3>
            </div>
            <div class="col-md-6">
                <?php $style->anps_create_text_option('anps_slider_home_page', esc_html__('Slider shortcode', 'construction'), 'Example: slider-1'); ?>
            </div>
        </div>
        <div class="row">
            <!-- Page setup -->
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php _e('Page setup', 'construction'); ?></h3>
            </div> 
            <!-- Excerpt length -->
            <div class="col-md-6">
                <?php $style->anps_create_number_option('anps_excerpt_length', 40, esc_html__('Excerpt length', 'construction')); ?>
            </div>
            <!-- Error page -->
            <div class="col-md-6">
                <?php $style->anps_create_select('anps_error_page', $style->anps_get_pages_array(), esc_html__('404 error page', 'construction') );?>   
            </div>
            <!-- scroll to top -->
            <div class="col-md-6">
                <?php $style->anps_create_checkbox('anps_scroll_to_top', esc_html__('Add Scroll to top button', 'construction'), '0');?>  
            </div>            

            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php _e('Portfolio', 'construction'); ?></h3>
            </div>
            
            <!-- Portfolio single style -->
             <div class="col-md-6">
                <?php $style->anps_create_text_option('anps_portfolio_slug', esc_html__('Portfolio slug', 'construction')); ?>
             </div>

            <div class="col-md-6">    
                <?php 
                $styles = array(
                    'style-1' => esc_html__('Style 1', 'construction'),
                    'style-2' => esc_html__('Style 2', 'construction'),
                    'style-3' => esc_html__('Style 3', 'construction')
                );   
                $style->anps_create_select('anps_portfolio_single', $styles, esc_html__('Portfolio single style', 'construction'), 'style-1', '1');?> 
            </div>    
        </div> 

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php _e('Post meta on blog / categories / tag / archive pages', 'construction'); ?></h3>
            </div>                
            <!-- Post meta enable/disable -->   
            <?php $post_meta_arr = array(
                'anps_post_meta_comments'   => esc_html__('Comments', 'construction'),
                'anps_post_meta_categories' => esc_html__('Categories', 'construction'),
                'anps_post_meta_author'     => esc_html__('Author', 'construction'),
                'anps_post_meta_date'       => esc_html__('Date', 'construction')
            ); ?>
            <?php foreach($post_meta_arr as $key=>$item) :?>
                <div class="col-md-3">
                    <?php $style->anps_create_checkbox($key, $item, '1'); ?>
                </div>
            <?php endforeach; ?>
                                
        </div>   

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php _e('Post meta on single post', 'construction'); ?></h3>
            </div>                
            <!-- Post meta enable/disable -->   
            <?php $post_meta_arr = array(
                'anps_post_meta_comments_single'   => esc_html__('Comments', 'construction'),
                'anps_post_meta_categories_single' => esc_html__('Categories', 'construction'),
                'anps_post_meta_author_single'     => esc_html__('Author', 'construction'),
                'anps_post_meta_date_single'       => esc_html__('Date', 'construction'),
                'anps_post_meta_tags_single'       => esc_html__('Tags', 'construction')
            ); ?>
            <?php foreach($post_meta_arr as $key=>$item) :?>
                <div class="col-md-3">
                    <?php $style->anps_create_checkbox($key, $item, '1'); ?>
                </div>
            <?php endforeach; ?>
                                
        </div>          
    </div>

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>