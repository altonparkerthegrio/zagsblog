<?php

class NewsroomElatedSideAreaOpener extends NewsroomElatedWidget
{
    public function __construct() {
        parent::__construct(
            'eltd_side_area_opener', // Base ID
            esc_html__('Elated Side Area Opener', 'newsroom') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

        $this->params = array(
            array(
                'name' => 'side_area_opener_icon_color',
                'type' => 'textfield',
                'title' => esc_html__('Icon Color', 'newsroom'),
                'description' => esc_html__('Define color for Side Area opener icon', 'newsroom')
            ),
            array(
                'name' => 'side_area_opener_label',
                'type' => 'textfield',
                'title' => esc_html__('Icon Label', 'newsroom'),
                'description' => esc_html__('Define color for Side Area opener icon', 'newsroom')
            )
        );
    }

    public function widget($args, $instance) {

        $sidearea_icon_styles = array();

        if (!empty($instance['side_area_opener_icon_color'])) {
            $sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
        }

        $icon_size = '';
        if (newsroom_elated_options()->getOptionValue('side_area_predefined_icon_size')) {
            $icon_size = newsroom_elated_options()->getOptionValue('side_area_predefined_icon_size');
        }
        ?>
        <a class="eltd-side-menu-button-opener <?php echo esc_attr($icon_size); ?>" <?php newsroom_elated_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo newsroom_elated_get_side_menu_icon_html(); ?>
            <?php if (!empty($instance['side_area_opener_label'])) {
                echo '<span>' . esc_html($instance['side_area_opener_label']) . '</span>';
            } ?>
        </a>

    <?php }

}