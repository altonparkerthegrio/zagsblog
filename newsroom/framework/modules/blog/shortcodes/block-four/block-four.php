<?php
namespace Newsroom\Modules\Blog\Shortcodes\BlockFour;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class BlockFour
 */
class BlockFour extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_block_four';
        $this->css_class = 'eltd-pb-four';
        $this->shortcode_title = esc_html__('Elated Block 4','newsroom');

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

            'featured_display_post_type_icon' => 'yes',
            'featured_post_type_icon_size' => 'large',

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
            'custom_thumb_image_height' => '120',
            'custom_thumb_image_width' => '150',

            'display_post_type_icon' => 'no',
            'post_type_icon_size' => 'small',

            'display_category' => 'no',

            'title_tag' => 'h6',
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
        $params_featured = shortcode_atts($args_featured, $atts);
        $params_featured_filtered = newsroom_elated_get_filtered_params($params_featured, 'featured');

        $params['excerpt_length'] = esc_attr($params_featured['featured_excerpt_length']);
        $params['image_style'] = $this->getImageStyle($params);
        $params_featured_filtered['title_style'] = array();

        $html = '';

        $loop_counter = 0;
        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-bnl-inner">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
                $loop_counter++;

                if ($loop_counter == 1) {
                    $html .= '<div class="eltd-post-block-part eltd-post-block-featured eltd-pb-four-featured">';
                    //Get HTML from template
                    $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-one', 'templates', '', $params_featured_filtered);
                    $html .= '</div>';
                    $html .= '<div class="eltd-post-block-part eltd-post-block-non-featured eltd-pb-four-non-featured">';
                } else {
                    //Get HTML from template
                    $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-two', 'templates', '', $params);
                }

            endwhile;

            $html .= '</div>'; // close eltd-pb-four-non-featured
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

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-block-holder';

        if ($params['display_pagination'] == 'yes' || $params['title'] != '')
            $holder_classes[] = 'eltd-thick-border';

        if ($params['featured_display_share'] == 'yes') {
            $holder_classes[] = 'eltd-show-more';
        }

        return $holder_classes;
    }

    private function getImageStyle($params) {
        $style = array();

        if ($params['custom_thumb_image_width'] !== '') {
            $style[] = 'width: ' . newsroom_elated_filter_px($params['custom_thumb_image_width']) . 'px';
        }

        return implode(';', $style);
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