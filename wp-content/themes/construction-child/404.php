<?php get_header(); ?>
<?php

	echo "<script> document.location.href='http://rudy.bfx.nl/404-2/';</script>"; 
	if(isset($anps_page_data['error_page']) && $anps_page_data['error_page'] != '0') {
		$page = get_page( $anps_page_data['error_page'] );
		echo do_shortcode(str_replace("&nbsp;", "<p><br /></p>", $page->post_content));
	} else {
		?>
			<h1 style="text-align: center;"><?php _e('It seems that something went wrong!', 'construction'); ?></h1>
			<h6 style="text-align: center;"><span style="color: #c7c7c7;"><?php _e('This page does not exist.', 'construction'); ?></span></h6>
		<?php
	}
?>
<?php get_footer(); ?>