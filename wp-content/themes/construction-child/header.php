<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5QRCBMF');</script>
<!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php anps_include_favicon(); ?>    
    <?php wp_head(); ?>             
</head>
<body <?php body_class(anps_body_classes());?> <?php anps_body_style();?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QRCBMF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="site">
        <?php 
        //blank page header value
        $header_value;
        if( $post ) {
            $header_value = get_post_meta($post->ID, $key ='anps_blank_page_disable_header', $single = true ); 
        }
        //check if it is disabled header
        if(!isset($header_value) || $header_value!='on') {
            //top bar
            if(anps_is_top_bar()=='1') {
                get_template_part( 'templates/template', 'top-bar' );
            }
            // Get header
            get_template_part( 'templates/template', anps_get_header_type() );
        }

        ?>
        <?php if(is_front_page()&&get_option('anps_slider_home_page', '')!=''){ echo do_shortcode("[rev_slider alias='".get_option('anps_slider_home_page','')."']");} ?>
        <?php if(!is_search() || (function_exists('is_woocommerce') && is_woocommerce())): ?>
        <main class="site-main" >
            <?php 
            //check if it is disabled header
            if(!isset($header_value) || $header_value!='on') {
                get_template_part( 'templates/template', 'page-title' );
                get_template_part( 'templates/template', 'breadcrumbs' );
            }
            ?>
            <div class="container content-container">
                <div class="row">
        <?php endif; ?>                