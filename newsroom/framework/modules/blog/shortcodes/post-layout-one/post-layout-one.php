<?php
namespace Newsroom\Modules\Blog\Shortcodes\PostLayoutOne;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class PostLayoutOne
 */
class PostLayoutOne extends ListShortcode
{

    /**
     * @var string
     */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_post_layout_one';
        $this->css_class = 'eltd-pl-one';
        $this->shortcode_title = esc_html__('Elated Post Layout 1', 'newsroom');

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

            'title_tag' => 'h4',
            'title_length' => '',
            'title_font_size' => '',

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
        $params['title_style'] = $this->getTitleStyle($atts);

        $html = '';

        if ($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-one', 'templates', '', $params);

            endwhile;
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

        if (isset($atts['title_font_size']) && $atts['title_font_size'] !== '') {
            $style[] = 'font-size: ' . newsroom_elated_filter_px($atts['title_font_size']) . 'px';
        }

        return implode(';', $style);
    }

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-layout-holder';

        return $holder_classes;
    }
}