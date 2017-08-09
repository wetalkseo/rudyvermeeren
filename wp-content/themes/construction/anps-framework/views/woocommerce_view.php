<?php
include_once(get_template_directory() . '/anps-framework/classes/Options.php');
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
if (isset($_GET['save_woo'])) {
    $options->anps_save_options('woocommerce');
}
?>
<form action="themes.php?page=theme_options&sub_page=woocommerce&save_woo" method="post">
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php _e('Settings', 'construction'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php
                    $wooarray = array(
                        'hide'      => esc_html__('Never display', 'construction'),
                        'shop_only' => esc_html__('only on Woo pages', 'construction'),
                        'always'    => esc_html__('Display everywhere', 'construction')
                    );
                    $style->anps_create_select('anps_shopping_cart_header', $wooarray, esc_html__('Display shopping cart icon in header?', 'construction') );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php _e('Layout', 'construction'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php
                    $woo_col_array = array(
                        'col-md-3' => esc_html__('4 columns', 'construction'),
                        'col-md-4' => esc_html__('3 columns', 'construction')
                    );
                    $style->anps_create_select('anps_woo_products_layout', $woo_col_array, esc_html__('How many products in column?', 'construction'), 1, 'col-md-3'  );
                ?>
            </div>
            <div class="input col-md-4">
                <?php $style->anps_create_number_option('anps_products_per_page', '12', esc_html__('Products per page', 'construction')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php esc_html_e('Product', 'construction'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_product_zoom', esc_html__('Product image zoom', 'construction'), '1');?>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_product_lightbox', esc_html__('Product image lightbox', 'construction'), '1');?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $options->anps_save_button(); ?>
</form>
