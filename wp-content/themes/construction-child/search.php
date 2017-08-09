<div class="site-main">
<?php 
get_header(); 
$style_img = '';
if(get_option('anps_search_content_bg', '')!="") {
    $style_img = " style='background-image: url(".get_option('anps_search_content_bg').");'";
} 
?>
<?php get_template_part( 'templates/template', 'breadcrumbs' );?>
<div class="search-notice background-mask"<?php echo wp_kses($style_img, array('style'=>array())); ?>>
    <div class="container">
        <h2 class="search-notice-title text-uppercase"><?php esc_html_e('Resultaten voor:', 'construction'); ?></h2>
        <div class="search-notice-query">"<?php echo get_search_query(); ?>"</div>
        <form method="get" role="search">
            <label class="search-notice-label" for="search-form"><?php esc_html_e('Of zoek nogmaals:', 'construction'); ?></label>
            <input action="<?php echo esc_url(home_url( '/' )); ?>" name="s" class="search-notice-field" type="text" id="search-form" placeholder="<?php esc_html_e('Zoekterm', 'construction'); ?>">
        </form>
    </div>
</div>


<div class="container content-container">
    <div class="row">
        <div class="search-results">
            <div class="container">
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <article class="search-result">
                    <header>
                        <a href="<?php the_permalink(); ?>"><h3 class="search-result-title"><?php the_title(); ?></h3></a>
                    </header>
                    <p class="search-result-content"><?php the_excerpt(); ?></p>
                </article>
                <?php 
                endwhile; 
                // Search page navigation.
                the_posts_pagination(array('prev_text' => esc_html__('Vorige', 'construction' ), 'next_text' => esc_html__('Volgende', 'construction')));
                else : ?>
                <div class="search-results-none text-center">
                    <h3><?php esc_html_e('Geen resultaten voor de opgegeven zoekterm', 'construction'); ?></h3>
                    <p><?php esc_html_e('Probeer het nogmaals, of navigeer naar een andere pagina', 'construction'); ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();