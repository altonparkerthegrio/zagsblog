<?php
namespace Newsroom\Modules\Blog\Shortcodes\SliderPostTwo;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class SliderPostTwo
 */
class SliderPostTwo extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_slider_post_two';
        $this->css_class = 'eltd-sp-two';
        $this->shortcode_title = esc_html__('Elated Post Slider 2', 'newsroom');

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

            'title_tag' => 'h3',
            'title_length' => '',

            'display_date' => 'yes',
            'date_format' => 'F d',

            'display_comments' => 'no',
            'display_count' => 'no',
            'display_like' => 'no',
            'display_author' => 'no',

            'display_excerpt' => 'no',
            'excerpt_length' => '20',

            'display_share' => 'no',
            'display_read_more' => 'no'
        );

        $params = shortcode_atts($args, $atts);

        $params['excerpt_length'] = esc_attr($params['excerpt_length']);

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-bnl-inner eltd-post-slider">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-four', 'templates', '', $params);
            endwhile;

            $html .= '</div>'; // post-slider

        else:
            $html .= $this->errorMessage();
        endif;

        wp_reset_postdata();

        return $html;
    }

    /**
     * Enabling inner holder in shortcode if layout is used,
     * because block has its own inner holder
     *
     * @return boolean
     */
    protected function isBlockElement() {
        return true;
    }

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-slider-holder';

        return $holder_classes;
    }

    /**
     * Generates posts additional data array.
     *
     * @param $params
     *
     * @return array
     */
    protected function getAdditionalData($params) {
        $data_classes = array();

        if (!isset($params['slider_slides_to_show']) || $params['slider_slides_to_show'] == '') {
            $data_classes['data-slider_slides_to_show'] = '1';
        }

        if (!isset($params['slider_slides_to_scroll']) || $params['slider_slides_to_scroll'] == '') {
            $data_classes['data-slider_slides_to_scroll'] = '1';
        }

        if (!isset($params['slider_autoplay']) || $params['slider_autoplay'] !== 'true') {
            $data_classes['data-slider_autoplay'] = 'false';
        }

        if (!isset($params['slider_autoplay_speed']) || $params['slider_autoplay_speed'] == '') {
            $data_classes['data-slider_autoplay_speed'] = '3000';
        }

        if (!isset($params['slider_autoplay_pause']) || $params['slider_autoplay_pause'] !== 'true') {
            $data_classes['data-slider_autoplay_pause'] = 'false';
        }

        if (!isset($params['slider_speed']) || $params['slider_speed'] == '') {
            $data_classes['data-slider_speed'] = '300';
        }

        if (!isset($params['slider_arrows']) || $params['slider_arrows'] !== 'true') {
            $data_classes['data-slider_arrows'] = 'false';
        }

        if (!isset($params['slider_dots']) || $params['slider_dots'] !== 'true') {
            $data_classes['data-slider_dots'] = 'false';
        }
        return $data_classes;
    }
}