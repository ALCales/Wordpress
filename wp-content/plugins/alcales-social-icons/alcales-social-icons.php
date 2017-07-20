<?php

/*
    Plugin Name: Mis Redes Sociales
    Plugin URI: http://wordpress.org/extend/plugins/#
    Description: Agrega iconos de tus redes sociales
    Author: Alejandro López Cardo
    Version: 1.0
    Author URI: http://alcales.com/
*/


class Alcales_Social_Icons extends WP_Widget
{

    // class constructor
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'alcales_social_icons',
            'description' => 'Agrega iconos superchulos de tus redes sociales',
        );
        parent::__construct('alcales_social_icons', 'Iconos redes sociales', $widget_ops);
    }

    // output the widget content on the front-end
    public function widget($args, $instance)
    {
//        var_dump($instance); exit;
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
            ?>
            <div class="social-icons-alcales">
                <?php if(!empty($instance['twitter'])){ ?>
                    <a href="<?php echo $instance['twitter'] ?>" class="icon-button twitter" target="_blank"><i class="icon-twitter fa fa-twitter" aria-hidden="true"></i><span></span></a>
                <?php } ?>
                <?php if(!empty($instance['twitter'])){ ?>
                    <a href="<?php echo $instance['linkedin'] ?>" class="icon-button linkedin" target="_blank"><i class="icon-linkedin fa fa-linkedin" aria-hidden="true"></i><span></span></a>
                <?php } ?>
                <?php if(!empty($instance['twitter'])){ ?>
                    <a href="<?php echo $instance['github'] ?>" class="icon-button github" target="_blank"><i class="icon-github fa fa-github" aria-hidden="true"></i><span></span></a>
                <?php } ?>
                <?php if(!empty($instance['twitter'])){ ?>
                    <a href="<?php echo $instance['googleplay'] ?>" class="icon-button google-play" target="_blank"><i class="icon-android fa fa-android" aria-hidden="true"></i><span></span></a>
                <?php } ?>
            </div>
            <?php

        echo $args['after_widget'];
    }

    // output the option form field in admin Widgets screen
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $linkedin = !empty($instance['linkedin']) ? $instance['linkedin'] : '';
        $github = !empty($instance['github']) ? $instance['github'] : '';
        $googleplay = !empty($instance['googleplay']) ? $instance['googleplay'] : '';
        ?>

        <p>

            <!-- Titulo -->

            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Titulo:', 'text_domain'); ?>
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                    type="text"
                    value="<?php echo esc_attr($title); ?>">

            <!-- Twitter -->

            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
                <?php esc_attr_e('Twitter:', 'text_domain'); ?>
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('twitter')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('twitter')); ?>"
                    type="text"
                    placeholder="URL"
                    value="<?php echo esc_attr($twitter); ?>">

            <!-- Linkedin -->

            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>">
                <?php esc_attr_e('LinkedIn:', 'text_domain'); ?>
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>"
                    type="text"
                    placeholder="URL"
                    value="<?php echo esc_attr($linkedin); ?>">

            <!-- GitHub -->

            <label for="<?php echo esc_attr($this->get_field_id('github')); ?>">
                <?php esc_attr_e('GitHub:', 'text_domain'); ?>
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('github')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('github')); ?>"
                    type="text"
                    placeholder="URL"
                    value="<?php echo esc_attr($github); ?>">

            <!-- Google Play -->

            <label for="<?php echo esc_attr($this->get_field_id('googleplay')); ?>">
                <?php esc_attr_e('Google Play:', 'text_domain'); ?>
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('googleplay')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('googleplay')); ?>"
                    type="text"
                    placeholder="URL"
                    value="<?php echo esc_attr($googleplay); ?>">

        </p>
        <?php
    }

    // save options
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin'])) ? strip_tags($new_instance['linkedin']) : '';
        $instance['github'] = (!empty($new_instance['github'])) ? strip_tags($new_instance['github']) : '';
        $instance['googleplay'] = (!empty($new_instance['googleplay'])) ? strip_tags($new_instance['googleplay']) : '';

        return $instance;
    }
}

// register My_Widget
add_action('widgets_init', function () {
    register_widget('Alcales_Social_Icons');
});