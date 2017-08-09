<article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
    <header>
        <?php anps_header_media(get_the_id(), 'large'); ?>
        <h3 class="post-title text-uppercase"><?php the_title(); ?></h3>
        <?php anps_post_meta('single'); ?>
    </header>
    <div class="post-content">
        <div class="post-desc clearfix">
            <?php the_content(); ?>
        </div>
    </div>
    <footer class="post-footer">
        <!-- Additional Post Information -->
        <?php
            $tags = get_the_tag_list('', ', ', '');
            $categories = get_the_category_list(', ');
        ?>
        <table class="post-info">
            <tbody>
            <?php if (get_option('anps_post_meta_categories_single', '1') == '1' ) :?>
                <tr>
                    <th><?php esc_html_e( 'Categories', 'construction' ); ?></th>
                    <td><?php echo $categories; ?></td>
                </tr>
                <?php endif; ?>                
                <?php if( $tags && get_option('anps_post_meta_tags_single', '1') == '1'): ?>
                <tr>
                    <th><?php esc_html_e( 'Tags', 'construction' ); ?></th>
                    <td><?php echo $tags; ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Post Author -->
        <?php if( get_the_author_meta('description') ): ?>
        <div class="post-author">
            <?php echo get_avatar(get_the_author_meta('ID'), 99); ?>
            <span class="post-author-title"><?php esc_html_e( 'Written by', 'construction' ); ?> <strong><?php the_author(); ?></strong></span>
            <p class="post-author-desc"><?php the_author_meta('description'); ?></p>
        </div>
        <?php endif; ?>
    </footer>
</article>