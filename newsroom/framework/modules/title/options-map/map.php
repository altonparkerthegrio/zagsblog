<?php

if (!function_exists('newsroom_elated_title_options_map')) {

    function newsroom_elated_title_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_title_page',
                'title' => esc_html__('Title','newsroom'),
                    'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = newsroom_elated_add_admin_panel(
            array(
                'page' => '_title_page',
                'name' => 'panel_title',
                'title' => esc_html__('Title Settings', 'newsroom')
            )
        );

		newsroom_elated_add_admin_field(
            array(
                'name' => 'show_title_area',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Show Title Area', 'newsroom'),
                'description' => esc_html__('This option will enable/disable Title Area', 'newsroom'),
                'parent' => $panel_title,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_show_title_area_container"
                )
            )
        );

		$show_title_area_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $panel_title,
                'name' => 'show_title_area_container',
                'hidden_property' => 'show_title_area',
                'hidden_value' => 'no'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_type',
                'type' => 'select',
                'default_value' => 'breadcrumb',
                'label' => esc_html__('Title Area Type', 'newsroom'),
                'description' => esc_html__('Choose title type', 'newsroom'),
                'parent' => $show_title_area_container,
                'options' => array(
                    'standard' => esc_html__('Standard', 'newsroom'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'newsroom')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "breadcrumb" => "#eltd_title_area_type_container"
                    ),
                    "show" => array(
                        "standard" => "#eltd_title_area_type_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $show_title_area_container,
                'name' => 'title_area_type_container',
                'hidden_property' => 'title_area_type',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_enable_breadcrumbs',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Breadcrumbs', 'newsroom'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'newsroom'),
                'parent' => $title_area_type_container,
            )
        );

		newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_content_alignment',
                'type' => 'select',
                'default_value' => 'left',
                'label' => esc_html__('Content Alignment', 'newsroom'),
                'description' => esc_html__('Specify title content alignment', 'newsroom'),
                'parent' => $show_title_area_container,
                'options' => array(
                    'left' => esc_html__('Left', 'newsroom'),
                    'center' => esc_html__('Center', 'newsroom'),
                    'right' => esc_html__('Right', 'newsroom')
                )
            )
        );

		newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'newsroom'),
                'description' => esc_html__('Choose a background color for Title Area', 'newsroom'),
                'parent' => $show_title_area_container
            )
        );

		newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'newsroom'),
                'description' => esc_html__('Choose an Image for Title Area', 'newsroom'),
                'parent' => $show_title_area_container
            )
        );

		newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_background_image_responsive',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Background Responsive Image', 'newsroom'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'newsroom'),
                'parent' => $show_title_area_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltd_title_area_background_image_responsive_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

		$title_area_background_image_responsive_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $show_title_area_container,
                'name' => 'title_area_background_image_responsive_container',
                'hidden_property' => 'title_area_background_image_responsive',
                'hidden_value' => 'yes'
            )
        );

		newsroom_elated_add_admin_field(array(
            'name' => 'title_area_height',
            'type' => 'text',
            'label' => esc_html__('Height', 'newsroom'),
            'description' => esc_html__('Set a height for Title Area', 'newsroom'),
            'parent' => $title_area_background_image_responsive_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        newsroom_elated_add_admin_field(
            array(
                'name' => 'title_area_border_color',
                'type' => 'color',
                'label' => esc_html__('Bottom Border Color', 'newsroom'),
                'description' => esc_html__('Choose a bottom border color for Title Area', 'newsroom'),
                'parent' => $show_title_area_container
            )
        );


		$panel_typography = newsroom_elated_add_admin_panel(
            array(
                'page' => '_title_page',
                'name' => 'panel_title_typography',
                'title' => esc_html__('Typography', 'newsroom')
            )
        );

		$group_page_title_styles = newsroom_elated_add_admin_group(array(
            'name' => 'group_page_title_styles',
            'title' => esc_html__('Title', 'newsroom'),
            'description' => esc_html__('Define styles for page title', 'newsroom'),
            'parent' => $panel_typography
        ));

		$page_title_row_1 = newsroom_elated_add_admin_row(array(
            'name' => 'page_title_row_1',
            'parent' => $group_page_title_styles
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_title_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $page_title_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $page_title_row_1
        ));

		$page_title_row_2 = newsroom_elated_add_admin_row(array(
            'name' => 'page_title_row_2',
            'parent' => $group_page_title_styles,
            'next' => true
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'page_title_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $page_title_row_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $page_title_row_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight','newsroom'),
                'options'		=> newsroom_elated_get_font_weight_array(),
			'parent'		=> $page_title_row_2
		));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_row_2
        ));

		$group_page_breadcrumbs_styles = newsroom_elated_add_admin_group(array(
            'name' => 'group_page_breadcrumbs_styles',
            'title' => esc_html__('Title Breadcrumbs', 'newsroom'),
            'description' => esc_html__('Define styles for page title breadcrumbs', 'newsroom'),
            'parent' => $panel_typography
        ));

		$row_page_breadcrumbs_styles_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_page_breadcrumbs_styles_1',
            'parent' => $group_page_breadcrumbs_styles
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_breadcrumb_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_page_breadcrumbs_styles_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_breadcrumb_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_page_breadcrumbs_styles_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_breadcrumb_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_page_breadcrumbs_styles_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_breadcrumb_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_page_breadcrumbs_styles_1
        ));

		$row_page_breadcrumbs_styles_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_page_breadcrumbs_styles_2',
            'parent' => $group_page_breadcrumbs_styles,
            'next' => true
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'page_breadcrumb_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_page_breadcrumbs_styles_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_breadcrumb_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_page_breadcrumbs_styles_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_breadcrumb_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_page_breadcrumbs_styles_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_breadcrumb_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_page_breadcrumbs_styles_2
        ));

		$row_page_breadcrumbs_styles_3 = newsroom_elated_add_admin_row(array(
            'name' => 'row_page_breadcrumbs_styles_3',
            'parent' => $group_page_breadcrumbs_styles,
            'next' => true
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_breadcrumb_hovercolor',
            'default_value' => '',
            'label' => esc_html__('Hover Color', 'newsroom'),
            'parent' => $row_page_breadcrumbs_styles_3
        ));

		$group_page_title_info_styles = newsroom_elated_add_admin_group(array(
            'name' => 'group_page_title_info_styles',
            'title' => esc_html__('Title Info', 'newsroom'),
            'description' => esc_html__('Define styles for post title info', 'newsroom'),
            'parent' => $panel_typography
        ));

		$page_title_info_row_1 = newsroom_elated_add_admin_row(array(
            'name' => 'page_title_info_row_1',
            'parent' => $group_page_title_info_styles
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_title_info_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $page_title_info_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_info_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_info_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_info_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_info_row_1
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_info_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $page_title_info_row_1
        ));

		$page_title_info_row_2 = newsroom_elated_add_admin_row(array(
            'name' => 'page_title_info_row_2',
            'parent' => $group_page_title_info_styles,
            'next' => true
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'page_title_info_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $page_title_info_row_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_info_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $page_title_info_row_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'page_title_info_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $page_title_info_row_2
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'page_title_info_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $page_title_info_row_2
        ));

		$page_title_info_row_3 = newsroom_elated_add_admin_row(array(
            'name' => 'page_title_info_row_3',
            'parent' => $group_page_title_info_styles
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_title_info_hover_color',
            'default_value' => '',
            'label' => esc_html__('Text Hover Color', 'newsroom'),
            'parent' => $page_title_info_row_3
        ));

		newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'page_title_info_author_color',
            'default_value' => '',
            'label' => esc_html__('Author Separated Color', 'newsroom'),
            'parent' => $page_title_info_row_3
        ));

	}

    add_action('newsroom_elated_options_map', 'newsroom_elated_title_options_map', 4);
}