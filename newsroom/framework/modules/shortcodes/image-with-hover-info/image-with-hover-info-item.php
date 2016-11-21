<?php

namespace Newsroom\Modules\ImageWithHoverInfoItem;

use Newsroom\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class ImageWithHoverInfoItem
 * @package Newsroom\Modules\Shortcodes\ImageWithHoverInfoItem
 */
class ImageWithHoverInfoItem implements ShortcodeInterface
{

    private $base;

    /**
     * ImageWithHoverInfoItem constructor.
     */
    public function __construct() {
        $this->base = 'eltd_image_with_hover_info_item';

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
            'name' => esc_html__('Elated Image With Hover Info Item', 'newsroom'),
            'base' => $this->getBase(),
            'category' => 'by ELATED',
            'as_child' => array('only' => 'eltd_image_with_hover_info'),
            'icon' => 'icon-wpb-image-with-hover-info-item extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'newsroom'),
                    'param_name' => 'image',
                    'description' => esc_html__('Select image from media library', 'newsroom')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Size', 'newsroom'),
                    'param_name' => 'image_size',
                    'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size', 'newsroom')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'newsroom'),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Additional Text', 'newsroom'),
                    'param_name' => 'add_text',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'newsroom'),
                    'param_name' => 'link',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Target', 'newsroom'),
                    'param_name' => 'target',
                    'value' => array(
                        '' => '',
                        esc_html__('Self', 'newsroom') => '_self',
                        esc_html__('Blank', 'newsroom') => '_blank'
                    ),
                    'dependency' => array('element' => 'link', 'not_empty' => true),
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
            'image' => '',
            'image_size' => 'full',
            'title' => '',
            'link' => '',
            'add_text' => '',
            'target' => '_blank'
        );

        $params = shortcode_atts($args, $atts);
        $params['images'] = $this->getImage($params);
        $params['image_size'] = $this->getImageSize($params['image_size']);

        $html = newsroom_elated_get_shortcode_module_template_part('templates/image-with-hover-info-item-template', 'image-with-hover-info', '', $params);

        return $html;
    }

    /**
     * Return initial mage for shortcode
     *
     * @param $params
     * @return array
     */
    private function getImage($params) {
        $image_ids = array();
        $images = array();
        $i = 0;

        if ($params['image'] !== '') {
            $image_ids = explode(',', $params['image']);
        }

        foreach ($image_ids as $id) {

            $image['image_id'] = $id;
            $image_original = wp_get_attachment_image_src($id, 'full');
            $image['url'] = $image_original[0];
            $image['title'] = get_the_title($id);

            $images[$i] = $image;
            $i++;
        }

        return $images;
    }

    /**
     * Return image size or custom image size array
     *
     * @param $image_size
     * @return array
     */
    private function getImageSize($image_size) {

        $image_size = trim($image_size);
        //Find digits
        preg_match_all('/\d+/', $image_size, $matches);
        if (in_array($image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
            return $image_size;
        } elseif (!empty($matches[0])) {
            return array(
                $matches[0][0],
                $matches[0][1]
            );
        } else {
            return 'thumbnail';
        }
    }
}