<?php
class AnpsText extends WP_Widget {
    private $allowed_html;

    public function __construct() {
        parent::__construct(
            'AnpsText', 'AnpsThemes - Text and icon', array('description' => esc_html__('Enter text and/or icon to show on page. Can only be used in the Top bar widget areas.', 'construction'),)
        );

        $this->allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'target' => array(),
                'class' => array()
            ),
            'span' => array(
                'class' => array()
            ),
            'em' => array(
                'class' => array()
            ),
            'strong' => array(
                'class' => array()
            ),
            'br' => array()
        );

        add_action( 'admin_enqueue_scripts', array( $this, 'anps_enqueue_scripts' ) );
    }

    function anps_enqueue_scripts( $hook_suffix ) {
        wp_enqueue_style('fontawesome');
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
                'title'  => '',
                'texts' => ''
            )
        );

        $texts = explode('|', $instance['texts']);
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e("Title", 'construction'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <div data-anps-repeat>
            <!-- Social Icons field (hidden) -->
            <input data-anps-repeat-field id="<?php echo esc_attr($this->get_field_id('texts')); ?>" name="<?php echo esc_attr($this->get_field_name('texts')); ?>" type="hidden" value="<?php echo esc_attr($instance['texts']); ?>">

            <!-- Repeater items wrapper -->
            <div class="anps-repeat-items" data-anps-repeat-items>
                <?php foreach($texts as $text) : ?>
                <div class="anps-repeat-item" data-anps-repeat-item>
                    <!-- Fields -->
                    <p>

                        <?php
                            $text = explode(';', $text);
                            $text_icon = '';
                            $text_content = '';

                            if( isset($text[0]) ) {
                                 $text_icon = $text[0];
                            }

                            if( isset($text[1]) ) {
                                 $text_content = $text[1];
                            }
                        ?>
                        <div class="anps-iconpicker">
                            <i class="fa <?php echo esc_attr($text_icon); ?>"></i>
                            <input type="text" value="<?php echo $text_icon; ?>">
                            <button type="button"><?php _e('Select icon', 'construction'); ?></button>
                        </div>
                    </p>
                    <p>
                        <input type="text" class="widefat" value="<?php echo htmlspecialchars(wp_kses($text_content, $this->allowed_html)); ?>" />
                    </p>

                    <!-- Repeater buttons -->
                    <div class="anps-repeat-buttons">
                        <button class="anps-repeat-remove" type="button" data-anps-repeat-remove>-</button>
                        <button class="anps-repeat-add" type="button" data-anps-repeat-add>+</button>
                    </div>
                </div>
                <?php endforeach; ?>
             </div>
        </div>        
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['texts'] = $new_instance['texts'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = '';
        if( isset($instance['title']) ) {
            $title = $instance['title'];
        }
        $texts = $instance['texts'];
        $texts = explode('|', $instance['texts']);

        echo $before_widget;

        ?>

        <?php if(isset($title) && $title != '') : ?>
            <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <?php
        echo '<ul class="contact-info">';
        foreach($texts as $text) {
            $text = explode(';', $text);
            $text_icon = '';
            $text_content = '';

            if( isset($text[0]) ) {
                 $text_icon = $text[0];
            }

            if( isset($text[1]) ) {
                 $text_content = $text[1];
            }

            echo '<li><i class="fa ' . esc_attr($text_icon) . '"></i>' . wp_kses($text_content, $this->allowed_html) . '</li>';
        }
        echo '</ul>';
        echo $after_widget;
    }

}

add_action( 'widgets_init', create_function('', 'return register_widget("AnpsText");') );