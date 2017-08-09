<div class="col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
            <?php anps_header_media(get_the_id(), 'large'); ?>
            <a href="<?php the_permalink(); ?>"><h3 class="post-title text-uppercase"><?php the_title(); ?></h3></a>
            <?php anps_post_meta(); ?>
        </header>
        <div class="post-content">
            <div class="post-desc clearfix">
                <?php if(get_option("rss_use_excerpt") == "0") {
                    the_content();
                } else {
                    echo get_the_excerpt();
                }
                ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-md btn-gradient btn-shadow"><?php esc_html_e( 'Read More', 'construction' ); ?></a>
        </div>
    </article>
</div>        

