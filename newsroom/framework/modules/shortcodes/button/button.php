<?php
namespace Newsroom\Modules\Shortcodes\Button;

use Newsroom\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package Newsroom\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'eltd_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
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
            'name' => esc_html__('Elated Button', 'newsroom'),
            'base' => $this->base,
            'category' => 'by ELATED',
            'admin_enqueue_css' => array(newsroom_elated_get_skin_uri() . '/assets/css/eltd-vc-extend.css'),
            'icon' => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Size', 'newsroom'),
                        'param_name' => 'size',
                        'value' => array(
                            esc_html__('Default', 'newsroom') => '',
                            esc_html__('Small', 'newsroom') => 'small',
                            esc_html__('Medium', 'newsroom') => 'medium',
                            esc_html__('Large', 'newsroom') => 'large',
                            esc_html__('Full Width', 'newsroom') => 'huge'
                        ),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'newsroom'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Default', 'newsroom') => '',
                            esc_html__('Outline', 'newsroom') => 'outline',
                            esc_html__('Solid', 'newsroom') => 'solid',
                        ),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text', 'newsroom'),
                        'param_name' => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link', 'newsroom'),
                        'param_name' => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Link Target', 'newsroom'),
                        'param_name' => 'target',
                        'value' => array(
                            esc_html__('Self', 'newsroom') => '_self',
                            esc_html__('Blank', 'newsroom') => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Custom CSS class', 'newsroom'),
                        'param_name' => 'custom_class',
                        'admin_label' => true
                    )
                ),
                newsroom_elated_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Color', 'newsroom'),
                        'param_name' => 'color',
                        'group' => esc_html__('Design Options', 'newsroom'),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Color', 'newsroom'),
                        'param_name' => 'hover_color',
                        'group' => esc_html__('Design Options', 'newsroom'),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Color', 'newsroom'),
                        'param_name' => 'background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array('solid', '')),
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Background Color', 'newsroom'),
                        'param_name' => 'hover_background_color',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Border Color', 'newsroom'),
                        'param_name' => 'border_color',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Border Color', 'newsroom'),
                        'param_name' => 'hover_border_color',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Font Size (px)', 'newsroom'),
                        'param_name' => 'font_size',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Font Weight', 'newsroom'),
                        'param_name' => 'font_weight',
                        'value' => array_flip(newsroom_elated_get_font_weight_array(true)),
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Margin', 'newsroom'),
                        'param_name' => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'newsroom'),
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'newsroom')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Color', 'newsroom'),
                        'param_name' => 'icon_background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
                        'group' => esc_html__('Icon Options', 'newsroom'),
                        'description' => esc_html__('Will not influence outline type', 'newsroom')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Background Color', 'newsroom'),
                        'param_name' => 'icon_hover_background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => newsroom_elated_icon_collections()->iconPackParamName, 'not_empty' => true),
                        'group' => esc_html__('Icon Options', 'newsroom'),
                        'description' => esc_html__('Will not influence outline type', 'newsroom')
                    ),
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size' => '',
            'type' => '',
            'text' => '',
            'link' => '',
            'target' => '',
            'color' => '',
            'hover_color' => '',
            'background_color' => '',
            'hover_background_color' => '',
            'border_color' => '',
            'hover_border_color' => '',
            'font_size' => '',
            'font_weight' => '',
            'margin' => '',
            'icon_background_color' => '',
            'icon_hover_background_color' => '',
            'custom_class' => '',
            'html_type' => 'anchor',
            'input_name' => '',
            'hover_animation' => '',
            'custom_attrs' => array()
        );

        $default_atts = array_merge($default_atts, newsroom_elated_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);

        if ($params['html_type'] !== 'input') {
            $iconPackName = newsroom_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link'] = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes'] = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles'] = $this->getButtonStyles($params);
        $params['button_data'] = $this->getButtonDataAttr($params);

        return newsroom_elated_get_shortcode_module_template_part('templates/' . $params['html_type'], 'button', $params['hover_animation'], $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if (!empty($params['color'])) {
            $styles[] = 'color: ' . $params['color'];
        }

        if (!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: ' . $params['background_color'];
        }

        if (!empty($params['border_color'])) {
            $styles[] = 'border: 1px solid ' . $params['border_color'];
        }

        if (!empty($params['font_size'])) {
            $styles[] = 'font-size: ' . newsroom_elated_filter_px($params['font_size']) . 'px';
        }

        if (!empty($params['font_weight'])) {
            $styles[] = 'font-weight: ' . $params['font_weight'];
        }

        if (!empty($params['margin'])) {
            $styles[] = 'margin: ' . $params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if (!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if (!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if (!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if (!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        if (!empty($params['icon_hover_background_color'])) {
            $data['data-icon-bg-color'] = $params['icon_background_color'];
        }

        if (!empty($params['icon_hover_background_color'])) {
            $data['data-icon-hover-bg-color'] = $params['icon_hover_background_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'eltd-btn',
            'eltd-btn-' . $params['size'],
            'eltd-btn-' . $params['type']
        );

        if (!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'eltd-btn-custom-hover-bg';
        }

        if (!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'eltd-btn-custom-border-hover';
        }

        if (!empty($params['hover_color'])) {
            $buttonClasses[] = 'eltd-btn-custom-hover-color';
        }

        if (!empty($params['icon'])) {
            $buttonClasses[] = 'eltd-btn-icon';
        }

        if (!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if (!empty($params['hover_animation'])) {
            $buttonClasses[] = 'eltd-btn-' . $params['hover_animation'];
        }

        return $buttonClasses;
    }
}