<?php
namespace Newsroom\Modules\Blog\Shortcodes\SliderPostThree;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class SliderPostThree
 */
class SliderPostThree extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_slider_post_three';
        $this->css_class = 'eltd-sp-three';
        $this->shortcode_title = esc_html__('Elated Post Slider 3', 'newsroom');

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

        $args_featured = array(
            'featured_thumb_image_size' => '',
            'featured_thumb_image_width' => '',
            'featured_thumb_image_height' => '',

            'featured_display_post_type_icon' => 'no',
            'featured_post_type_icon_size' => 'small',

            'featured_display_category' => 'yes',

            'featured_title_tag' => 'h4',
            'featured_title_length' => '',

            'featured_display_date' => 'yes',
            'featured_date_format' => 'F d',

            'featured_display_comments' => 'no',
            'featured_display_count' => 'no',
            'featured_display_like' => 'no',
            'featured_display_author' => 'no',

            'featured_display_excerpt' => 'no',
            'featured_excerpt_length' => '20',

            'featured_display_share' => 'no',
            'featured_display_read_more' => 'no'
        );

        $args = array(
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',

            'display_post_type_icon' => 'no',
            'post_type_icon_size' => 'small',

            'display_category' => 'yes',

            'title_tag' => 'h5',
            'title_length' => '',

            'display_date' => 'no',
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
        $params_featured = shortcode_atts($args_featured, $atts);

        $params_featured_filtered = newsroom_elated_get_filtered_params($params_featured, 'featured');

        $params_featured_filtered['title_style'] = $this->getTitleStyle($atts);

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-post-slider-primary">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-five', 'templates', '', $params_featured_filtered);

            endwhile;

            $html .= '</div>'; // close eltd-post-slider
            $html .= '<div class="eltd-grid eltd-post-slider-secondary-outer">';
            $html .= '<div class="eltd-post-slider-secondary">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-six', 'templates', '', $params);

            endwhile;

            $html .= '</div>'; // close eltd-post-slider-secondary
            $html .= '</div>'; // close eltd-post-slider-secondary-outer

        else:
            $html .= $this->errorMessage();
        endif;

        wp_reset_postdata();

        return $html;
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

        if ($atts['featured_title_font_size'] !== '') {
            $style[] = 'font-size: ' . newsroom_elated_filter_px($atts['featured_title_font_size']) . 'px';
        }

        return implode(';', $style);
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

        return $data_classes;
    }

    /**
     * Overwrite setting in inner class.
     *
     * @param $params
     *
     * @return array
     */
    protected function overwriteSettings(&$params) {
        $params['number_of_posts'] = $params['number_of_posts_dropdown'];
    }
}