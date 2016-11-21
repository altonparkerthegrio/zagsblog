<?php

$custom_sidebars = newsroom_elated_get_custom_sidebars();

$sidebar_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('page', 'post', 'forum', 'topic'),
        'title' => esc_html__('Sidebar', 'newsroom'),
        'name' => 'sidebar_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_sidebar_meta',
        'type' => 'select',
        'label' => esc_html__('Layout', 'newsroom'),
        'description' => esc_html__('Choose the sidebar layout', 'newsroom'),
        'parent' => $sidebar_meta_box,
        'options' => array(
            '' => esc_html__('Default', 'newsroom'),
            'no-sidebar' => esc_html__('No Sidebar', 'newsroom'),
            'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
            'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
            'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
            'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
        )
    )
);

if (count($custom_sidebars) > 0) {
    newsroom_elated_add_meta_box_field(array(
        'name' => 'eltd_custom_sidebar_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Choose Widget Area in Sidebar', 'newsroom'),
        'description' => esc_html__('Choose Custom Widget area to display in Sidebar', 'newsroom'),
        'parent' => $sidebar_meta_box,
        'options' => $custom_sidebars
    ));
}
