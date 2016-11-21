<?php

/**
 * Widget that adds separator shortcode
 *
 * Class Separator_Widget
 */
class NewsroomElatedSeparatorWidget extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_separator_widget', // Base ID
            esc_html__('Elated Separator Widget', 'newsroom') // Name
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
                'title' => esc_html__('Type', 'newsroom'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'newsroom'),
                    'full-width' => esc_html__('Full Width', 'newsroom')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'newsroom'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'newsroom'),
                    'left' => esc_html__('Left', 'newsroom'),
                    'right' => esc_html__('Right', 'newsroom')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'newsroom'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'newsroom'),
                    'dashed' => esc_html__('Dashed', 'newsroom'),
                    'dotted' => esc_html__('Dotted', 'newsroom')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'newsroom'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'newsroom'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'newsroom'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'newsroom'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'newsroom'),
                'name' => 'bottom_margin',
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

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if (is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach ($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltd-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[eltd_separator $params]"); // XSS OK

        echo '</div>'; //close div.eltd-separator-widget
    }
}