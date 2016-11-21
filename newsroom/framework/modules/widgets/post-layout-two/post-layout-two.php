<?php

/**
 * Widget that adds post layout two
 *
 * Class PostLayoutTwo
 */
class NewsroomElatedPostLayoutTwo extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_post_layout_two_widget', // Base ID
            esc_html__('Elated Post Layout Two Widget','newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'title' => esc_html__('Widget Title','newsroom'),
                'name' => 'widget_title'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Number of Posts','newsroom'),
                'name' => 'number_of_posts'
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Number of Columns','newsroom'),
                'name' => 'column_number',
                'options' => array(
                    '' => esc_html__('Default','newsroom'),
                    1 => esc_html__('One Column','newsroom'),
                    2 => esc_html__('Two Columns','newsroom'),
                    3 => esc_html__('Three Columns','newsroom'),
                    4 => esc_html__('Four Columns','newsroom'),
                    5 => esc_html__('Five Columns','newsroom')
                ),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Category','newsroom'),
                'name' => 'category_id',
                'options' => array_flip(newsroom_elated_get_post_categories_VC()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Category Slug','newsroom'),
                'name' => 'category_slug',
                'description' => esc_html__('Leave empty for all or use comma for list','newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Choose Author','newsroom'),
                'name' => 'author_id',
                'options' => array_flip(newsroom_elated_get_authors_VC()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Tag Slug','newsroom'),
                'name' => 'tag_slug',
                'description' => esc_html__('Leave empty for all or use comma for list','newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Include Posts','newsroom'),
                'name' => 'post_in',
                'description' => esc_html__('Enter the IDs of the posts you want to display','newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Exclude Posts','newsroom'),
                'name' => 'post_not_in',
                'description' => esc_html__('Enter the IDs of the posts you want to exclude','newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Sort','newsroom'),
                'name' => 'sort',
                'options' => array_flip(newsroom_elated_get_sort_array()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Width (px)','newsroom'),
                'name' => 'custom_thumb_image_width',
                'description' => esc_html__('Set custom image width (px)','newsroom'),
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Height (px)','newsroom'),
                'name' => 'custom_thumb_image_height',
                'description' => esc_html__('Set custom image height (px)','newsroom'),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Title Tag','newsroom'),
                'name' => 'title_tag',
                'options' => array(
                    'h6' => 'h6',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5'
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Title Max Words','newsroom'),
                'name' => 'title_length',
                'description' => esc_html__('Enter max words of title post list that you want to display','newsroom'),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Date','newsroom'),
                'name' => 'display_date',
                'options' => array(
                    'yes' => esc_html__('Yes','newsroom'),
                    'no' => esc_html__('No','newsroom')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Date Format','newsroom'),
                'name' => 'date_format',
                'description' => esc_html__('Enter the date format that you want to display','newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Category','newsroom'),
                'name' => 'display_category',
                'options' => array(
                    'yes' => esc_html__('Yes','newsroom'),
                    'no' => esc_html__('No','newsroom'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Author','newsroom'),
                'name' => 'display_author',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Comments','newsroom'),
                'name' => 'display_comments',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Like','newsroom'),
                'name' => 'display_like',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Count','newsroom'),
                'name' => 'display_count',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Excerpt','newsroom'),
                'name' => 'display_excerpt',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Max. Excerpt Length','newsroom'),
                'name' => 'excerpt_length',
                'description' => esc_html__('Enter max of words that can be shown for excerpt','newsroom')
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Post Type Icon','newsroom'),
                'name' => 'display_post_type_icon',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Share Links','newsroom'),
                'name' => 'display_share',
                'options' => array(
                    'no' => esc_html__('No','newsroom'),
                    'yes' => esc_html__('Yes','newsroom')
                )
            ),
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
        $params = '';

        $instance['custom_thumb_image_width'] = $instance['custom_thumb_image_width'] != '' ? $instance['custom_thumb_image_width'] : '120';
        $instance['custom_thumb_image_height'] = $instance['custom_thumb_image_height'] != '' ? $instance['custom_thumb_image_height'] : '120';

        //is instance empty?
        if (is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach ($instance as $key => $value) {
                $params .= " $key = '$value' ";
            }
        }

        echo '<div class="widget eltd-plw-two">';

        if (!empty($instance['widget_title']) && $instance['widget_title'] !== '') {
            print $args['before_title'] . $instance['widget_title'] . $args['after_title'];
        }

        //finally call the shortcode
        echo do_shortcode("[eltd_post_layout_two $params]"); // XSS OK

        echo '</div>'; //close div.eltd-plw-seven
    }
}