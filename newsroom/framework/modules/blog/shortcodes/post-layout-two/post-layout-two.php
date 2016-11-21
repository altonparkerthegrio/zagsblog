<?php
namespace Newsroom\Modules\Blog\Shortcodes\PostLayoutTwo;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class PostLayoutOne
 */
class PostLayoutTwo extends ListShortcode
{

    /**
     * @var string
     */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_post_layout_two';
        $this->css_class = 'eltd-pl-two';
        $this->shortcode_title = esc_html__('Elated Post Layout 2', 'newsroom');

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
            'custom_thumb_image_height' => '120',
            'custom_thumb_image_width' => '150',

            'display_post_type_icon' => 'no',
            'post_type_icon_size' => 'small',

            'display_category' => 'yes',

            'title_tag' => 'h5',
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
        $params['image_style'] = $this->getImageStyle($params);

        $html = '';

        if ($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-two', 'templates', '', $params);

            endwhile;
        else:
            $html .= $this->errorMessage();

        endif;
        wp_reset_postdata();

        return $html;
    }

    private function getImageStyle($params) {
        $style = array();

        if (isset($params['custom_thumb_image_width']) && $params['custom_thumb_image_width'] !== '') {
            $style[] = 'width: ' . newsroom_elated_filter_px($params['custom_thumb_image_width']) . 'px';
        }

        return implode(';', $style);
    }

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-layout-holder';

        return $holder_classes;
    }
}