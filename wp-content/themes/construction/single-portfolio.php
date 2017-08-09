<?php get_header();?>
<div class="section clearfix">
	
<?php
while (have_posts()) : the_post();
get_template_part( 'templates/portfolio', get_option('anps_portfolio_single', 'style-1'));
endwhile;
?>
</div>
<?php
get_footer(); 