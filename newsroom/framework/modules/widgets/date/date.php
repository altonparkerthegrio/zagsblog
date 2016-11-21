<?php

/**
 * Widget that adds date
 *
 * Class Date_Widget
 */
class NewsroomElatedDateWidget extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_date_widget', // Base ID
            esc_html__('Elated Date Widget', 'newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Date Format', 'newsroom'),
                'name' => 'date_format',
                'options' => array(
                    'm/d/Y' => esc_html__('06/11/2015', 'newsroom'),
                    'd/m/Y' => esc_html__('11/23/2015', 'newsroom'),
                    'Y/m/d' => esc_html__('2015/11/06', 'newsroom'),
                    'j F, Y' => esc_html__('6 November, 2015', 'newsroom'),
                    'F j, Y' => esc_html__('November 6, 2015', 'newsroom'),
                    'j M Y' => esc_html__('6 Nov 2015', 'newsroom'),
                    'M j Y' => esc_html__('Nov 6 2015', 'newsroom'),
                    'l, F j, Y' => esc_html__('Friday, November 6, 2015', 'newsroom'),
                    'l, F jS, Y' => esc_html__('Friday, November 6th, 2015', 'newsroom'),
                    'l, M j, Y' => esc_html__('Friday, Nov 6, 2015', 'newsroom'),
                    'l, M jS, Y' => esc_html__('Friday, Nov 6th, 2015', 'newsroom'),
                ),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Custom Date Format', 'newsroom'),
                'name' => 'custom_date_format',
                'description' => esc_html__('The custom format for the date widget. See Formatting Date and Time https://codex.wordpress.org/Formatting_Date_and_Time', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Text Size (px)', 'newsroom'),
                'name' => 'text_size',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'newsroom'),
                'name' => 'color',
                'description' => ''
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

        $date_widget_styles = array();

        if (!empty($instance['color']) && $instance['color'] !== '') {
            $date_widget_styles[] = 'color: ' . $instance['color'];
        }

        if (!empty($instance['text_size']) && $instance['text_size'] !== '') {
            $date_widget_styles[] = 'font-size: ' . $instance['text_size'] . 'px';
        }

        $date_format = 'l, F jS, Y';
        if (!empty($instance['date_format']) && $instance['date_format'] !== '') {
            $date_format = $instance['date_format'];
        }

        if (!empty($instance['custom_date_format']) && $instance['custom_date_format'] !== '') {
            $date_format = esc_html($instance['custom_date_format']);
        }
        ?>

        <div class="widget eltd-date-widget-holder" <?php newsroom_elated_inline_style($date_widget_styles); ?>>
            <?php echo date($date_format, current_time('timestamp', 1)); ?>
        </div>
        <?php
    }
}