<?php

/**
 * Widget that adds post layout tabs
 *
 * Class PostLayoutTabs
 */
class NewsroomElatedPostLayoutTabs extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_post_layout_tabs_widget', // Base ID
            esc_html__('Elated Post Layout Tabs Widget', 'newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $categories = array(-1 => 'None') + array_flip(newsroom_elated_get_post_categories_VC());
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Layout', 'newsroom'),
                'name' => 'layout',
                'options' => array(
                    'one' => esc_html__('Layout 1', 'newsroom'),
                    'two' => esc_html__('Layout 2', 'newsroom')
                ),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Number of Columns', 'newsroom'),
                'name' => 'column_number',
                'options' => array(
                    3 => esc_html__('Three Columns', 'newsroom'),
                    1 => esc_html__('One Column', 'newsroom'),
                    2 => esc_html__('Two Columns', 'newsroom'),
                    4 => esc_html__('Four Columns', 'newsroom'),
                    5 => esc_html__('Five Columns', 'newsroom')
                ),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('First Category', 'newsroom'),
                'name' => 'category_id_1',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Second Category', 'newsroom'),
                'name' => 'category_id_2',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Third Category', 'newsroom'),
                'name' => 'category_id_3',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Fourth Category', 'newsroom'),
                'name' => 'category_id_4',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Fifth Category', 'newsroom'),
                'name' => 'category_id_5',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Sixth Category', 'newsroom'),
                'name' => 'category_id_6',
                'options' => $categories,
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Sort', 'newsroom'),
                'name' => 'sort',
                'options' => array_flip(newsroom_elated_get_sort_array()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Width (px)', 'newsroom'),
                'name' => 'thumb_image_width',
                'description' => esc_html__('Set custom image width (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Height (px)', 'newsroom'),
                'name' => 'thumb_image_height',
                'description' => esc_html__('Set custom image height (px)', 'newsroom'),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Title Tag', 'newsroom'),
                'name' => 'title_tag',
                'options' => array(
                    'h5' => 'h5',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h6' => 'h6',
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Title Max Words', 'newsroom'),
                'name' => 'title_length',
                'description' => esc_html__('Enter max words of title post list that you want to display', 'newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Date', 'newsroom'),
                'name' => 'display_date',
                'options' => array(
                    'no' => esc_html__('No', 'newsroom'),
                    'yes' => esc_html__('Yes', 'newsroom'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Date Format', 'newsroom'),
                'name' => 'date_format',
                'description' => esc_html__('Enter the date format that you want to display', 'newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Excerpt', 'newsroom'),
                'name' => 'display_excerpt',
                'options' => array(
                    'no' => esc_html__('No', 'newsroom'),
                    'yes' => esc_html__('Yes', 'newsroom'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Max. Excerpt Length', 'newsroom'),
                'name' => 'excerpt_length',
                'description' => esc_html__('Enter max of words that can be shown for excerpt', 'newsroom'),
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        if (is_array($instance) && count($instance)) {
            $params_label = 'params';
            $categories = array();
            $layout = 'five';

            if (isset($instance['layout']) && $instance['layout'] !== '') {
                $layout = $instance['layout'];
            }

            if ($layout == 'one') {
                $instance['number_of_posts'] = $instance['column_number'];
                $instance['display_category'] = 'no';
                $instance['display_comments'] = 'no';
                $instance['display_share'] = 'no';
                $instance['display_count'] = 'no';
                $instance['thumb_image_size'] = 'custom_size';
                $instance['thumb_image_width'] = $instance['thumb_image_width'] != '' ? $instance['thumb_image_width'] : '247';
                $instance['thumb_image_height'] = $instance['thumb_image_height'] != '' ? $instance['thumb_image_height'] : '173';
                $instance['excerpt_length'] = $instance['excerpt_length'] != '' ? $instance['excerpt_length'] : '5';
            } else {
                $instance['number_of_posts'] = $instance['column_number'] * $instance['column_number'];
                $instance['custom_thumb_image_width'] = $instance['thumb_image_width'] != '' ? $instance['thumb_image_width'] : '80';
                $instance['custom_thumb_image_height'] = $instance['thumb_image_height'] != '' ? $instance['thumb_image_height'] : '80';
            }


            //check how menu category fields we have
            $count = 0;
            foreach ($instance as $key => $value) {
                if (strpos($key, 'category_id') !== false) {
                    $count++;
                }
            }

            //create category array of each category field
            for ($i = 1; $i <= $count; $i++) {
                //${$params_label.$i} = '';
                if ($instance['category_id_' . $i] !== '-1') { //don't render 'all categories' item
                    $categories[$i] = $instance['category_id_' . $i];
                }
                unset($instance['category_id_' . $i]);
            }

            //generate shortcode params
            foreach ($categories as $key => $value) {

                ${$params_label . $key} = '';
                foreach ($instance as $id => $val) {
                    ${$params_label . $key} .= " " . $id . " = '" . $val . "' ";
                }
                ${$params_label . $key} .= " category_id = '" . $value . "' ";
            }

        }

        echo '<div class="widget eltd-plw-tabs">';
        echo '<div class="eltd-plw-tabs-inner">';
        echo '<div class="eltd-plw-tabs-tabs-holder">';
        foreach ($categories as $key => $value) {
            $category_name = $value != 0 ? get_the_category_by_ID($value) : esc_html__('All', 'newsroom');
            echo '<div class="eltd-plw-tabs-tab"><a href="#"><span class="item_text">' . esc_attr($category_name) . '</span></a></div>';
        }
        echo '</div>'; //close div.eltd-plw-tabs-tabs-holder

        echo '<div class="eltd-plw-tabs-content-holder">';
        foreach ($categories as $key => $value) {
            echo '<div class="eltd-plw-tabs-content">';
            echo do_shortcode('[eltd_post_layout_' . esc_attr($layout) . ' ' . ${$params_label . $key} . ']'); // XSS OK
            echo '</div>';
        }
        echo '</div>'; //close div.eltd-plw-tabs-content-holder
        echo '</div>'; //close div.eltd-plw-tabs-inner
        echo '</div>'; //close div.eltd-plw-tabs
    }
}