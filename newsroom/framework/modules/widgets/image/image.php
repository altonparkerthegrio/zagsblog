<?php

/**
 * Widget that adds image type
 *
 * Class Image_Widget
 */
class NewsroomElatedImageWidget extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_image_widget', // Base ID
            esc_html__('Elated Image Widget', 'newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Source', 'newsroom'),
                'name' => 'image_src'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Alt', 'newsroom'),
                'name' => 'image_alt'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Link', 'newsroom'),
                'name' => 'link'
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Target', 'newsroom'),
                'name' => 'target',
                'options' => array(
                    '_self' => esc_html__('Same Window', 'newsroom'),
                    '_blank' => esc_html__('New Window', 'newsroom')
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        $image_src = '';
        $image_alt = esc_html__('Widget Image', 'newsroom');

        if (!empty($instance['image_alt']) && $instance['image_alt'] !== '') {
            $image_alt = $instance['image_alt'];
        }

        if (!empty($instance['image_src']) && $instance['image_src'] !== '') {
            $image_src = '<img src="' . esc_url($instance['image_src']) . '" alt="' . $image_alt . '" />';
        }

        $link_begin_html = '';
        $link_end_html = '';
        $target = '_self';

        if (!empty($instance['target']) && $instance['target'] !== '') {
            $target = $instance['target'];
        }

        if (!empty($instance['link']) && $instance['link'] !== '') {
            $link_begin_html = '<a href="' . esc_url($instance['link']) . '" target="' . $target . '">';
            $link_end_html = '</a>';
        }
        ?>

        <div class="widget eltd-image-widget">
            <?php
            if ($link_begin_html !== '') {
                print $link_begin_html;
            }
            if ($image_src !== '') {
                print $image_src;
            }
            if ($link_end_html !== '') {
                print $link_end_html;
            }
            ?>
        </div>
        <?php
    }
}