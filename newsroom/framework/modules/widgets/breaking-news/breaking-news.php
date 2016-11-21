<?php

/**
 * Widget that adds breaking news shortcode
 *
 * Class Breaking_News
 */
class NewsroomElatedBreakingNews extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_breaking_news', // Base ID
            esc_html__('Elated Breaking News', 'newsroom') // Name
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
                'title' => esc_html__('Number of Posts', 'newsroom'),
                'name' => 'number_of_posts',
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Order By', 'newsroom'),
                'name' => 'order_by',
                'options' => array(
                    'title' => esc_html__('Title', 'newsroom'),
                    'date' => esc_html__('Date', 'newsroom'),
                    'author' => esc_html__('Author', 'newsroom'),
                    'rand' => esc_html__('Random', 'newsroom')
                ),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Order', 'newsroom'),
                'name' => 'order',
                'options' => array(
                    'ASC' => esc_html__('ASC', 'newsroom'),
                    'DESC' => esc_html__('DESC', 'newsroom'),
                ),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Category Slug', 'newsroom'),
                'name' => 'category_slug',
                'description' => esc_html__('Leave empty for all or use comma for list', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Author ID', 'newsroom'),
                'name' => 'author_id',
                'description' => esc_html__('Leave empty for all or use comma for list', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Tag Slug', 'newsroom'),
                'name' => 'tag_slug',
                'description' => esc_html__('Leave empty for all or use comma for list', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Include Posts', 'newsroom'),
                'name' => 'post_in',
                'description' => esc_html__('Enter the IDs of the posts you want to display', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Exclude Posts', 'newsroom'),
                'name' => 'post_not_in',
                'description' => esc_html__('Enter the IDs of the posts you want to exclude', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Slideshow Speed', 'newsroom'),
                'name' => 'slideshowspeed',
                'description' => esc_html__('Set the speed of the slideshow cycling, in milliseconds. Default value is 4000.', 'newsroom')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Slide Animation Speed', 'newsroom'),
                'name' => 'animationspeed',
                'description' => esc_html__('Set the speed of animations, in milliseconds. Default value is 400.', 'newsroom')
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

        $queryArray = array();

        if (!empty($instance['number_of_posts']) && $instance['number_of_posts'] !== '') {
            $queryArray['posts_per_page'] = $instance['number_of_posts'];
        }

        if (!empty($instance['order_by']) && $instance['order_by'] !== '') {
            $queryArray['orderby'] = $instance['order_by'];
        }

        if (!empty($instance['order']) && $instance['order'] !== '') {
            $queryArray['order'] = $instance['order'];
        }

        if (!empty($instance['category_slug']) && $instance['category_slug'] !== '') {
            $queryArray['category_name'] = $instance['category_slug'];
        }

        if (!empty($instance['author_id']) && $instance['author_id'] !== '') {
            $queryArray['author'] = $instance['author_id'];
        }

        if (!empty($instance['tag_slug']) && $instance['tag_slug'] !== '') {
            $queryArray['tag'] = str_replace(' ', '-', $instance['tag_slug']);
        }

        if (!empty($instance['post_in']) && $instance['post_in'] !== '') {
            $queryArray['post__in'] = explode(",", $instance['post_in']);
        }

        if (!empty($instance['post_not_in']) && $instance['post_not_in'] !== '') {
            $queryArray['post__not_in'] = $instance['post_not_in'];
        }

        $queryArray['post_status'] = 'publish'; //to ensure that ajax call will not return 'private' posts

        $queryResult = new \WP_Query($queryArray);

        $data = array();

        if (!empty($instance['slideshowspeed']) && $instance['slideshowspeed'] !== '') {
            $data['slideshowspeed'] = $instance['slideshowspeed'];
        }

        if (!empty($instance['animationspeed']) && $instance['animationspeed'] !== '') {
            $data['animationspeed'] = $instance['animationspeed'];
        }

        echo ''

        ?>
        <div class="widget eltd-bn-holder" <?php echo newsroom_elated_get_inline_attrs($data); ?>>
            <?php if ($queryResult->have_posts()): ?>
                <div class="eltd-bn-title"><?php esc_html_e('Trending News', 'newsroom'); ?>
                    <span class="eltd-bn-icon ion-arrow-right-b"></span></div>
                <ul class="eltd-bn-slide">
                    <?php while ($queryResult->have_posts()) : $queryResult->the_post(); ?>
                        <li class="eltd-bn-text">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>

                <div class="eltd-bn-messsage">
                    <p><?php esc_html_e('No posts were found.', 'newsroom'); ?></p>
                </div>

            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }
}