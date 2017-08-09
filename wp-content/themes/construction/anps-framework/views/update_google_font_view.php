<?php  
include_once(get_template_directory() . '/anps-framework/classes/Style.php');
if (isset($_GET['save_font'])) {
    $style->update_gfonts();
}
?>
<form action="themes.php?page=theme_options&sub_page=theme_style_google_font&save_font" method="post">
    <div class="content-inner">
	    <div class="row">
	    	<div class="col-md-12">
	    		<h3><i class="fa fa-google"></i><?php _e('Update google fonts', 'construction'); ?></h3>    
	        	<p><?php _e('As we do not update google fonts automatically, you can update the google fonts with clicking the below button.', 'construction'); ?></p>
	        	<br>
	        	<center><input class="no-margin" type="submit" value="<?php _e('Update google fonts', 'construction'); ?>" /></center>
	    	</div>
	    </div>
    </div> 
</form>