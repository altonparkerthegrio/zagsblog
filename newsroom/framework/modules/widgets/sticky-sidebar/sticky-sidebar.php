<?php

class NewsroomElatedStickySidebar extends NewsroomElatedWidget
{
    protected $params;

    public function __construct() {
        parent::__construct(
            'eltd_sticky_sidebar', // Base ID
            esc_html__('Elated Sticky Sidebar', 'newsroom'), // Name
            array('description' => esc_html__('Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'newsroom'),) // Args
        );
        $this->setParams();
    }

    protected function setParams() {

    }

    public function widget($args, $instance) {
        echo '<div class="widget eltd-widget-sticky-sidebar"></div>';
    }

}

add_action('widgets_init', create_function('', 'register_widget( "NewsroomElatedStickySidebar" );'));
