<?php if( !is_front_page() ): ?>
<?php 
/*
 * 1) check if it is fullscreen
 * 2) check if page img, page video, global img
 */
//header image
$heading_bg_img = get_post_meta(get_queried_object_id(), $key ='anps_heading_bg', $single = true );
$heading_bg_video = get_post_meta(get_queried_object_id(), $key ='anps_page_heading_video', $single = true );
$header_img = '';
$header_media_class = '';
$video_container = '';
if(isset($heading_bg_video) && $heading_bg_video != '') {
    $header_media_class = 'page-header-media ';
    $header_img = '';
    /* Image fallback */
    if(isset($heading_bg_img) && $heading_bg_img != '') {
        $header_img =  "background-image: url(".get_post_meta(get_queried_object_id(), $key ='anps_heading_bg', $single = true ).");";
    }
    /* Video */
    $video_container = "<div class='page-header-video'>".anps_heading_video($heading_bg_video)."</div>";
} elseif(isset($heading_bg_img) && $heading_bg_img != '') {
    $header_media_class = 'page-header-media ';
    $header_img =  "background-image: url(".get_post_meta(get_queried_object_id(), $key ='anps_heading_bg', $single = true ).");";
}  elseif(get_option('anps_page_heading_bg', '')!='') {
    $header_media_class = 'page-header-media ';
    $header_img = "background-image: url(".get_option('anps_page_heading_bg', '').");";
}

$full_screen = get_post_meta(get_queried_object_id(), $key ='anps_page_heading_full', $single = true );
$header_class = 'page-header-sm';
$pre_heading = '';
$after_heading = '';
if(isset($full_screen) && $full_screen=='on') {
    $header_class = 'page-header-lg';
    $pre_heading = '<div class="container">';
    $after_heading = '</div>';
}

/* Is hidden on page */
$is_hidden = get_post_meta(get_queried_object_id(), $key ='anps_disable_heading', $single = true );
?>
<?php if( get_option('anps_heading_status', '1') == '1' && $is_hidden != '1' ): ?>
<div class="<?php echo $header_media_class; ?>page-header <?php echo $header_class; ?>" style="<?php echo $header_img; ?>">
    <?php echo $pre_heading; ?><h1 class="text-uppercase page-title"><?php anps_page_title(); ?></h1><?php echo $after_heading; ?>
    <?php echo $video_container; ?>
</div>
<?php endif; ?>
<?php endif;