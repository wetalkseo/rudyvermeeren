<?php
    /* Place your custom PHP in this file */

function wts_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wts_enqueue_styles' );