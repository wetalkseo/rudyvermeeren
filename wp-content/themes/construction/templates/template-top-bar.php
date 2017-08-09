<?php 
// Number of widget areas in top bar:
$anps_top_bar_w_nr = 0;

if (is_active_sidebar( 'top-bar-left')) {
	$anps_top_bar_w_nr ++;
} if (is_active_sidebar( 'top-bar-right')) {
	$anps_top_bar_w_nr ++;
}
/* if no sidebars, don't display anything */
if ($anps_top_bar_w_nr == 0) {return;} 

/* Calculate bootstrap grid class */
$anps_top_bar_col = "col-md-".(12 / $anps_top_bar_w_nr);
/* Desktop only add new class */
$class_mobile = '';
if(get_option('anps_global_topmenu_style')=='2') {
    $class_mobile = ' visible-lg-block';
}
?>
<!--actual HTML output:-->
<div class="top-bar clearfix<?php echo esc_attr(anps_is_transparent());?><?php echo $class_mobile;?>">
    <div class="container">
        <?php 
        //top-bar-left widget
        if (is_active_sidebar('top-bar-left')) : ?>
            <div class="<?php echo esc_attr($anps_top_bar_col); ?>">
                <?php do_shortcode(dynamic_sidebar('top-bar-left'));?>
            </div>
        <?php endif;?>
        <?php 
        //top-bar-right widget
        if (is_active_sidebar('top-bar-right')) : ?>
            <div class="<?php echo esc_attr($anps_top_bar_col); ?>">
                <?php do_shortcode(dynamic_sidebar('top-bar-right'));?>
            </div>
        <?php endif;?>
    </div>
</div>