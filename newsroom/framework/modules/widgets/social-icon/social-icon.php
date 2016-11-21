<?php

/**
 * Widget that adds social icon
 *
 * Class Social_Icon_Widget
 */
class NewsroomElatedSocialIconWidget extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_social_icon_widget', // Base ID
            esc_html__('Elated Social Icon Widget', 'newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            newsroom_elated_icon_collections()->getSocialIconWidgetParamsArray(),
            array(
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Link', 'newsroom'),
                    'name' => 'link',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'title' => esc_html__('Target', 'newsroom'),
                    'name' => 'target',
                    'options' => array(
                        '_self' => esc_html__('Same Window', 'newsroom'),
                        '_blank' => esc_html__('New Window', 'newsroom')
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'title' => esc_html__('Type', 'newsroom'),
                    'name' => 'type',
                    'options' => array(
                        'normal' => esc_html__('Normal', 'newsroom'),
                        'circle' => esc_html__('Circle', 'newsroom'),
                        'square' => esc_html__('Square', 'newsroom')
                    ),
                    'description' => ''
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
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Color', 'newsroom'),
                    'name' => 'hover_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Border Width', 'newsroom'),
                    'name' => 'border_width',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Border Color', 'newsroom'),
                    'name' => 'border_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Border Color', 'newsroom'),
                    'name' => 'hover_border_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Background Color', 'newsroom'),
                    'name' => 'background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Background Color', 'newsroom'),
                    'name' => 'hover_background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Margin', 'newsroom'),
                    'name' => 'margin',
                    'description' => esc_html__('Margin (top right bottom left)', 'newsroom')
                ),
                array(
                    'type' => 'dropdown',
                    'title' => esc_html__('Enable Separator Between Icons', 'newsroom'),
                    'name' => 'separator_between_icons',
                    'options' => array(
                        'no' => esc_html__('No', 'newsroom'),
                        'yes' => esc_html__('Yes', 'newsroom'),
                    ),
                    'description' => ''
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

        $icon_params = array();

        if (!empty($instance['icon_pack']) && $instance['icon_pack'] !== '') {
            $icon_params['icon_pack'] = $instance['icon_pack'];
        }
        if (!empty($instance['fa_icon']) && $instance['fa_icon'] !== '') {
            $icon_params['fa_icon'] = $instance['fa_icon'];
        }
        if (!empty($instance['fe_icon']) && $instance['fe_icon'] !== '') {
            $icon_params['fe_icon'] = $instance['fe_icon'];
        }
        if (!empty($instance['ion_icon']) && $instance['ion_icon'] !== '') {
            $icon_params['ion_icon'] = $instance['ion_icon'];
        }
        if (!empty($instance['simple_line_icons']) && $instance['simple_line_icons'] !== '') {
            $icon_params['simple_line_icons'] = $instance['simple_line_icons'];
        }
        if (!empty($instance['type']) && $instance['type'] !== '') {
            $icon_params['type'] = $instance['type'];
        }
        if (!empty($instance['color']) && $instance['color'] !== '') {
            $icon_params['icon_color'] = $instance['color'];
        }
        if (!empty($instance['hover_color']) && $instance['hover_color'] !== '') {
            $icon_params['hover_icon_color'] = $instance['hover_color'];
        }
        if (!empty($instance['link']) && $instance['link'] !== '') {
            $icon_params['link'] = $instance['link'];
        }
        if (!empty($instance['target']) && $instance['target'] !== '') {
            $icon_params['target'] = $instance['target'];
        }
        if (!empty($instance['margin']) && $instance['margin'] !== '') {
            $icon_params['margin'] = $instance['margin'];
        }
        if (!empty($instance['text_size']) && $instance['text_size'] !== '') {
            $icon_params['custom_size'] = $instance['text_size'];

            if (!empty($instance['type']) && ($instance['type'] === 'circle' || $instance['type'] === 'square')) {
                $icon_params['shape_size'] = 2 * $instance['text_size'];
            }

        }
        if (!empty($instance['border_width']) && $instance['border_width'] !== '') {
            $icon_params['border_width'] = $instance['border_width'];
        }
        if (!empty($instance['border_color']) && $instance['border_color'] !== '') {
            $icon_params['border_color'] = $instance['border_color'];
        }
        if (!empty($instance['hover_border_color']) && $instance['hover_border_color'] !== '') {
            $icon_params['hover_border_color'] = $instance['hover_border_color'];
        }
        if (!empty($instance['background_color']) && $instance['background_color'] !== '') {
            $icon_params['background_color'] = $instance['background_color'];
        }
        if (!empty($instance['hover_background_color']) && $instance['hover_background_color'] !== '') {
            $icon_params['hover_background_color'] = $instance['hover_background_color'];
        }
        if (!empty($instance['separator_between_icons']) && $instance['separator_between_icons'] !== '') {
            $icon_params['separator_between_icons'] = $instance['separator_between_icons'];
        }

        print $args['before_widget'];
        echo newsroom_elated_execute_shortcode('eltd_icon', $icon_params);
        print $args['after_widget'];

    }
}