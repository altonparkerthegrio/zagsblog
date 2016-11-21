<?php
namespace Newsroom\Modules\Blog\Shortcodes\PostLayoutThree;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class PostLayoutThree
 */
class PostLayoutThree extends ListShortcode
{

    /**
     * @var string
     */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_post_layout_three';
        $this->css_class = 'eltd-pl-three';
        $this->shortcode_title = esc_html__('Elated Post Layout 3', 'newsroom');

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
     * function gets $base for each shortcode
     *
     * @see newsroom_elated_get_shortcode_params()
     */

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     *
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',

            'display_post_type_icon' => 'no',
            'post_type_icon_size' => 'small',

            'display_category' => 'yes',

            'title_length' => '',

            'display_date' => 'yes',
            'date_format' => 'F d',

            'display_comments' => 'no',
            'display_count' => 'no',
            'display_like' => 'no',
            'display_author' => 'no',

            'display_excerpt' => 'no',
            'excerpt_length' => '20',

            'display_share' => 'yes',
            'display_read_more' => 'no',

            'display_background_pattern' => 'yes',
            'display_featured_image' => 'no',

            'layout_bottom_padding_1280_1600' => '',
            'layout_bottom_padding_1024_1280' => '',
            'layout_bottom_padding_768_1024' => '',
            'layout_bottom_padding_600_768' => '',
            'layout_bottom_padding_480_600' => '',
            'layout_bottom_padding_480' => ''
        );

        $params = shortcode_atts($args, $atts);

        $params['excerpt_length'] = esc_attr($params['excerpt_length']);
        $params['layout_style'] = $this->getLayoutStyle($atts);
        $params['title_style'] = $this->getTitleStyle($atts);
        $params['layout_custom_class'] = 'eltd-custom-' . mt_rand(100000, 1000000);
        $params['layout_responsive_style'] = $this->getLayoutResponsiveStyle($params);

        $html = '';

        if ($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-three', 'templates', '', $params);

            endwhile;
        else:
            $html .= $this->errorMessage();

        endif;
        wp_reset_postdata();

        return $html;
    }

    /**
     * Function that returns list of inline styles for layout/block
     *
     * @param $atts
     *
     * @return string
     *
     */
    private function getLayoutStyle($atts) {
        $style = array();

        if (isset($atts['padding_bottom']) && $atts['padding_bottom'] !== '') {
            $style[] = 'padding-bottom: ' . newsroom_elated_filter_px($atts['padding_bottom']) . 'px';
        }
        return implode(';', $style);
    }

    /**
     * Function that returns list of inline styles for layout three title
     *
     * @param $atts
     *
     * @return string
     */
    private function getTitleStyle($atts) {
        $style = array();

        if (isset($atts['title_font_size']) && $atts['title_font_size'] !== '') {
            $style[] = 'font-size: ' . newsroom_elated_filter_px($atts['title_font_size']) . 'px';
        }

        if (isset($atts['title_width']) && $atts['title_width'] !== '') {
            $style[] = 'width: ' . newsroom_elated_filter_px($atts['title_width']) . '%';
        }

        return implode(';', $style);
    }


    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-layout-holder';

        return $holder_classes;
    }

    /**
     * Overwrite setting in inner class.
     *
     * @param $params
     *
     * @return array
     */
    protected function overwriteSettings(&$params) {
        $params['display_featured_image'] = 'no';
    }

    /**
     * Return Elements Holder Item Content Responssive style
     *
     * @param $params
     * @return array
     */
    private function getLayoutResponsiveStyle($params) {

        $layout_responsive_style = array();

        if ($params['layout_bottom_padding_1280_1600'] !== '') {
            $layout_responsive_style['layout_bottom_padding_1280_1600'] = $params['layout_bottom_padding_1280_1600'] . 'px';
        }
        if ($params['layout_bottom_padding_1024_1280'] !== '') {
            $layout_responsive_style['layout_bottom_padding_1024_1280'] = $params['layout_bottom_padding_1024_1280'] . 'px';
        }
        if ($params['layout_bottom_padding_768_1024'] !== '') {
            $layout_responsive_style['layout_bottom_padding_768_1024'] = $params['layout_bottom_padding_768_1024'] . 'px';
        }
        if ($params['layout_bottom_padding_600_768'] !== '') {
            $layout_responsive_style['layout_bottom_padding_600_768'] = $params['layout_bottom_padding_600_768'] . 'px';
        }
        if ($params['layout_bottom_padding_480_600'] !== '') {
            $layout_responsive_style['layout_bottom_padding_480_600'] = $params['layout_bottom_padding_480_600'] . 'px';
        }
        if ($params['layout_bottom_padding_480'] !== '') {
            $layout_responsive_style['layout_bottom_padding_480'] = $params['layout_bottom_padding_480'] . 'px';
        }

        return $layout_responsive_style;
    }
}