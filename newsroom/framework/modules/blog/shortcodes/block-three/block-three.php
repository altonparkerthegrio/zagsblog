<?php
namespace Newsroom\Modules\Blog\Shortcodes\BlockThree;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class BlockThree
 */
class BlockThree extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_block_three';
        $this->css_class = 'eltd-pb-three';
        $this->shortcode_title = 'Elated Block 3';

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

            'featured_title_length' => '',

            'featured_display_date' => 'yes',
            'featured_date_format' => 'F d',

            'featured_display_comments' => 'no',
            'featured_display_count' => 'no',
            'featured_display_like' => 'no',
            'featured_display_author' => 'no',

            'featured_display_excerpt' => 'no',
            'featured_excerpt_length' => '20',

            'featured_display_share' => 'yes',
            'featured_display_read_more' => 'no',

            'featured_display_background_pattern' => 'yes',
            'featured_display_featured_image' => 'yes',
        );

        $params_featured = shortcode_atts($args_featured, $atts);
        $params_featured_filtered = newsroom_elated_get_filtered_params($params_featured, 'featured');

        $params['excerpt_length'] = esc_attr($params_featured['featured_excerpt_length']);
        $params_featured_filtered['layout_style'] = $this->getLayoutStyle($atts);
        $params_featured_filtered['title_style'] = $this->getTitleStyle($atts);

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-bnl-inner">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                $html .= '<div class="eltd-post-block-part eltd-post-block-featured eltd-pb-three-featured">';
                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-three', 'templates', '', $params_featured_filtered);
                $html .= '</div>';

            endwhile;

            $html .= '</div>'; // close eltd-bnl-inner

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

        if (isset($atts['featured_title_font_size']) && $atts['featured_title_font_size'] !== '') {
            $style[] = 'font-size: ' . newsroom_elated_filter_px($atts['featured_title_font_size']) . 'px';
        }

        return implode(';', $style);
    }

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-block-holder';

        if ($params['display_pagination'] == 'yes' || $params['title'] != '')
            $holder_classes[] = 'eltd-thick-border';

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
        $params['number_of_posts'] = 1;
    }
}