<?php
namespace Newsroom\Modules\Blog\Shortcodes\SliderPostFour;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class SliderPostFour
 */
class SliderPostFour extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_slider_post_four';
        $this->css_class = 'eltd-sp-four';
        $this->shortcode_title = esc_html__('Elated Post Slider 4', 'newsroom');

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

            'featured_title_tag' => 'h3',
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

            'title_tag' => 'h6',
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

        $html = '';
        $html .= '<div class="eltd-slider-navigation-holder"></div>';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-post-slider-primary">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-four', 'templates', '', $params_featured_filtered);

            endwhile;

            $html .= '</div>'; // close eltd-post-slider
            $html .= '<div class="eltd-post-slider-secondary">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-seven', 'templates', '', $params);

            endwhile;

            $html .= '</div>'; // close eltd-post-slider-secondary

        else:
            $html .= $this->errorMessage();
        endif;

        wp_reset_postdata();

        return $html;
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
            $data_classes['data-slider_slides_to_show'] = $params['number_of_posts'];
        }

        $data_classes['data-slider_slides_to_scroll'] = '1';

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

        $data_classes['data-slider_arrows'] = 'false';
        $data_classes['data-slider_dots'] = 'false';

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

        $params['title'] = $params['carousel_title'];
    }


}