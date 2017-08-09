</div><!-- end .row -->
</div><!-- end .container -->
</main><!-- end .site-main -->
<?php
//check for blank page
$footer_value = '';
if($post) {
    $footer_value = get_post_meta($post->ID, $key ='anps_blank_page_disable_footer', $single = true );
}
if(!isset($footer_value) || $footer_value!='on') {
    get_sidebar( 'footer' );
}
?>
<?php if (get_option('anps_scroll_to_top', 0) == 1 ): ?>
    <button class="scroll-top" title="<?php _e('Scroll to top', 'construction'); ?>"><i class="fa fa-angle-up"></i></button>
<?php endif;?>
</div> <!-- .site -->
<?php wp_footer(); ?>
</body>
</html>
