<header class="site-header sticky <?php echo esc_attr(anps_is_transparent()); ?><?php echo esc_attr(anps_is_bellowmenu()); ?><?php echo esc_attr(anps_menu_is_centered()); ?>">
    <div class="container">
        <div class="header-wrap clearfix row">
            <!-- logo -->
            <div class="logo pull-left">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php 
                    echo wp_kses(anps_logo(), array(
                        'span' => array(
                            'class' => array(),
                        ),
                        'img' => array(
                            'class' => array(),
                            'src' => array(),
                            'style' => array(),
                            'alt' => array(),
                        )
                    )); 
                    ?>
                </a>
            </div>
            <!-- /logo -->	
            <!-- Main menu & above nabigation -->
            <nav class="site-navigation pull-right">
                <?php anps_get_menu(); ?>
            </nav>
            <!-- END Main menu and above navigation -->
        </div>
    </div><!-- /container -->
</header>