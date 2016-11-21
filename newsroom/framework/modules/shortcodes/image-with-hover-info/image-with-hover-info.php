<?php

namespace Newsroom\Modules\ImageWithHoverInfo;

use Newsroom\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ImageWithHoverInfo
 * @package Newsroom\Modules\Shortcodes\ImageWithHoverInfo
 */
class ImageWithHoverInfo implements ShortcodeInterface
{

    private $base;

    /**
     * ImageWithHoverInfo constructor.
     */
    public function __construct() {
        $this->base = 'eltd_image_with_hover_info';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     *
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {

        vc_map(array(
            'name' => esc_html__('Elated Image With Hover Info', 'newsroom'),
            'base' => $this->getBase(),
            'category' => 'by ELATED',
            'icon' => 'icon-wpb-image-with-hover-info extended-custom-icon',
            'as_parent' => array('only' => 'eltd_image_with_hover_info_item'),
            'js_view' => 'VcColumnView',
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__('Background Color', 'newsroom'),
                    'param_name' => 'background_color',
                    'value' => '',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Columns', 'newsroom'),
                    'admin_label' => true,
                    'save_always' => true,
                    'param_name' => 'number_of_columns',
                    'value' => array(
                        esc_html__('3 Columns', 'newsroom') => 'three-columns',
                        esc_html__('4 Columns', 'newsroom') => 'four-columns',
                    ),
                    'description' => ''
                ),
            )
        ));

    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'number_of_columns' => '',
            'background_color' => '',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';

        $image_with_hover_info_class = array();
        $image_with_hover_info_class[] = 'eltd-image-with-hover-info-holder';
        $image_with_hover_info_style = '';

        if ($number_of_columns != '') {
            $image_with_hover_info_class[] .= 'eltd-' . $number_of_columns;
        }

        if ($background_color != '') {
            $image_with_hover_info_style .= 'background-color:' . $background_color . ';';
        }

        $image_with_hover_info_classes = implode(' ', $image_with_hover_info_class);

        $html .= '<div ' . newsroom_elated_get_class_attribute($image_with_hover_info_classes) . ' ' . newsroom_elated_get_inline_style($image_with_hover_info_style, 'style') . '>';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

    }

}