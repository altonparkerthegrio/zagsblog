<?php
namespace Newsroom\Modules\Separator;

use Newsroom\Modules\Shortcodes\Lib\ShortcodeInterface;

class Separator implements ShortcodeInterface
{

    private $base;

    function __construct() {
        $this->base = 'eltd_separator';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(
            array(
                'name' => esc_html__('Elated Separator', 'newsroom'),
                'base' => $this->base,
                'category' => 'by ELATED',
                'icon' => 'icon-wpb-separator extended-custom-icon',
                'show_settings_on_create' => true,
                'class' => 'wpb_vc_separator',
                'custom_markup' => '<div></div>',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Extra class name', 'newsroom'),
                        'param_name' => 'class_name',
                        'value' => '',
                        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'newsroom')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'newsroom'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Normal', 'newsroom') => 'normal',
                            esc_html__('Full Width', 'newsroom') => 'full-width'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Position', 'newsroom'),
                        'param_name' => 'position',
                        'value' => array(
                            esc_html__('Center', 'newsroom') => 'center',
                            esc_html__('Left', 'newsroom') => 'left',
                            esc_html__('Right', 'newsroom') => 'right'
                        ),
                        'save_always' => true,
                        'dependency' => array('element' => 'type', 'value' => array('normal'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Color', 'newsroom'),
                        'param_name' => 'color',
                        'value' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Border Style', 'newsroom'),
                        'param_name' => 'border_style',
                        'value' => array(
                            esc_html__('Default', 'newsroom') => '',
                            esc_html__('Dashed', 'newsroom') => 'dashed',
                            esc_html__('Solid', 'newsroom') => 'solid',
                            esc_html__('Dotted', 'newsroom') => 'dotted'
                        ),
                        'dependency' => array('element' => 'type', 'value' => array('normal', 'full-width'))
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Width', 'newsroom'),
                        'param_name' => 'width',
                        'value' => '',
                        'description' => '',
                        'dependency' => array('element' => 'type', 'value' => array('normal'))
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Thickness (px)', 'newsroom'),
                        'param_name' => 'thickness',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top Margin', 'newsroom'),
                        'param_name' => 'top_margin',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Bottom Margin', 'newsroom'),
                        'param_name' => 'bottom_margin',
                        'value' => '',
                    )
                )
            )
        );

    }

    public function render($atts, $content = null) {
        $args = array(
            'class_name' => '',
            'type' => '',
            'position' => 'center',
            'color' => '',
            'border_style' => '',
            'width' => '',
            'thickness' => '',
            'top_margin' => '',
            'bottom_margin' => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);
        $params['separator_class'] = $this->getSeparatorClass($params);
        $params['separator_style'] = $this->getSeparatorStyle($params);


        $html = newsroom_elated_get_shortcode_module_template_part('templates/separator-template', 'separator', '', $params);

        return $html;
    }

    /**
     * Return Separator classes
     *
     * @param $params
     * @return array
     */
    private function getSeparatorClass($params) {

        $separator_class = array();

        if ($params['class_name'] !== '') {
            $separator_class[] = $params['class_name'];
        }
        if ($params['position'] !== '') {
            $separator_class[] = 'eltd-separator-' . $params['position'];
        }
        if ($params['type'] !== '') {
            $separator_class[] = 'eltd-separator-' . $params['type'];
        }

        return implode(' ', $separator_class);
    }

    /**
     * Return Elements Holder Item Content style
     *
     * @param $params
     * @return array
     */
    private function getSeparatorStyle($params) {

        $separator_style = array();

        if ($params['color'] !== '') {
            $separator_style[] = 'border-color: ' . $params['color'];
        }
        if ($params['border_style'] !== '') {
            $separator_style[] = 'border-style: ' . $params['border_style'];
        }
        if ($params['width'] !== '') {
            if (newsroom_elated_string_ends_with($params['width'], '%') || newsroom_elated_string_ends_with($params['width'], 'px')) {
                $separator_style[] = 'width: ' . $params['width'];
            } else {
                $separator_style[] = 'width: ' . $params['width'] . 'px';
            }
        }
        if ($params['thickness'] !== '') {
            $separator_style[] = 'border-bottom-width: ' . $params['thickness'] . 'px';
        }
        if ($params['top_margin'] !== '') {
            if (newsroom_elated_string_ends_with($params['top_margin'], '%') || newsroom_elated_string_ends_with($params['top_margin'], 'px')) {
                $separator_style[] = 'margin-top: ' . $params['top_margin'];
            } else {
                $separator_style[] = 'margin-top: ' . $params['top_margin'] . 'px';
            }
        }
        if ($params['bottom_margin'] !== '') {
            if (newsroom_elated_string_ends_with($params['bottom_margin'], '%') || newsroom_elated_string_ends_with($params['bottom_margin'], 'px')) {
                $separator_style[] = 'margin-bottom: ' . $params['bottom_margin'];
            } else {
                $separator_style[] = 'margin-bottom: ' . $params['bottom_margin'] . 'px';
            }
        }
        return implode(';', $separator_style);

    }

}
