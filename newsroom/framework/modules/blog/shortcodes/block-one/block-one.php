<?php
namespace Newsroom\Modules\Blog\Shortcodes\BlockOne;

use Newsroom\Modules\Blog\Shortcodes\Lib\ListShortcode;

/**
 * Class BlockOne
 */
class BlockOne extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltd_block_one';
        $this->css_class = 'eltd-pb-one';
        $this->shortcode_title = esc_html__('Elated Block 1','newsroom');

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

            'featured_display_excerpt' => 'yes',
            'featured_excerpt_length' => '20',

            'featured_display_share' => 'yes',
            'featured_display_read_more' => 'yes'
        );

        $params_featured = shortcode_atts($args_featured, $atts);
        $params_featured_filtered = newsroom_elated_get_filtered_params($params_featured, 'featured');

        $params['featured_excerpt_length'] = esc_attr($params_featured['featured_excerpt_length']);
        $params_featured_filtered['title_style'] = array();

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltd-bnl-inner">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();


                $html .= '<div class="eltd-post-block-part eltd-post-block-featured eltd-pb-one-featured">';
                //Get HTML from template
                $html .= newsroom_elated_get_list_shortcode_module_template_part('post-template-one', 'templates', '', $params_featured_filtered);
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

    protected function getAdditionalClasses($params) {
        $holder_classes = array();

        $holder_classes[] = 'eltd-block-holder';

        if ($params['display_pagination'] == 'yes' || $params['title'] != '')
            $holder_classes[] = 'eltd-thick-border';

        if ($params['featured_display_post_type_icon'] == 'yes') {
            $holder_classes[] = 'eltd-icon-' . $params['featured_post_type_icon_size'];
        }

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