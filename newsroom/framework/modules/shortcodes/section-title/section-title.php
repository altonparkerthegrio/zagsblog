<?php
namespace Newsroom\Modules\SectionTitle;

use Newsroom\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ExpandingVideoPost
 */
class SectionTitle implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'eltd_section_title';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /*
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     */

    public function vcMap() {

        vc_map(array(
            'name' => esc_html__('Elated Section Title', 'newsroom'),
            'base' => $this->getBase(),
            'icon' => 'icon-wpb-section-title extended-custom-icon',
            'category' => 'by ELATED',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'newsroom'),
                    'param_name' => 'title',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Title Tag', 'newsroom'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        esc_html__('Default', 'newsroom') => '',
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'dependency' => array('element' => 'title', 'not_empty' => true),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('With Border', 'newsroom'),
                    'param_name' => 'with_border',
                    'value' => array(
                        esc_html__('Yes', 'newsroom') => 'yes',
                        esc_html__('No', 'newsroom') => 'no',
                    ),
                    'description' => '',
                    'dependency' => array('element' => 'title', 'not_empty' => true),
                )
            )
        ));

    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'title' => '',
            'title_tag' => 'h5',
            'with_border' => 'yes'
        );

        $params = shortcode_atts($args, $atts);
        $params['holder_classes'] = $this->getHolderClasses($params);

        //Get HTML from template
        $html = newsroom_elated_get_shortcode_module_template_part('templates/section-title-template', 'section-title', '', $params);

        return $html;
    }

    /**
     * Generates posts class string
     *
     * @param $params
     *
     * @return string
     */
    private function getHolderClasses($params) {

        $holder_classes = array();

        if (isset($params['with_border']) && $params['with_border'] == 'no') {
            $holder_classes[] = 'eltd-st-without-border';
        }

        return implode(' ', $holder_classes);
    }
}