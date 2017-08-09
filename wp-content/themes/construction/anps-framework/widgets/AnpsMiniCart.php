<?php

class AnpsMiniCart extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'AnpsMiniCart', 'AnpsThemes - Mini Cart', array('description' => esc_html__('Woocommerce mini cart', 'construction'),)
        );
    }
    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        echo $before_widget;
        ?>
        <div class="mini-cart"><?php echo anps_mini_cart(); ?></div>
        <?php
        echo $after_widget;
    }

}
add_action( 'widgets_init', create_function('', 'return register_widget("AnpsMiniCart");') );