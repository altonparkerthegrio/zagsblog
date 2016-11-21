<?php

/**
 * Widget that adds search form
 *
 * Class NewsroomElatedSearchForm
 */
class NewsroomElatedSearchForm extends NewsroomElatedWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_search_form', // Base ID
            esc_html__('Elated Search Form', 'newsroom') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array();
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        if (is_search())
            $placeholder = get_query_var('s');
        else
            $placeholder = esc_html__('SEARCH', 'newsroom'); ?>

        <form class="eltd-search-menu-holder" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <div class="eltd-form-holder-close-btn"><span class="ion-android-close"></span></div>
            <div class="eltd-form-holder">
                <div class="eltd-column-left">
                    <input type="text" placeholder="<?php echo esc_attr($placeholder); ?>" name="s" class="eltd-search-field" autocomplete="off"/>
                </div>
                <div class="eltd-column-right">
                    <button class="eltd-search-submit" type="submit" value="Search">
                        <span class="ion-android-search"></span>
                    </button>
                </div>
            </div>
        </form>

    <?php }
}