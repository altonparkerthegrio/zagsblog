<?php

if (!function_exists('newsroom_elated_fonts_options_map')) {
    /**
     * Font options page
     */
    function newsroom_elated_fonts_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_fonts_page',
                'title' => esc_html__('Fonts', 'newsroom'),
                'icon' => 'fa fa-font'
            )
        );

        /**
         * Headings
         */
        $panel_headings = newsroom_elated_add_admin_panel(
            array(
                'page' => '_fonts_page',
                'name' => 'panel_headings',
                'title' => esc_html__('Headings', 'newsroom')
            )
        );

        //H1
        $group_heading_h1 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h1',
            'title' => esc_html__('H1 Style', 'newsroom'),
            'description' => esc_html__('Define styles for H1 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h1_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h1_1',
            'parent' => $group_heading_h1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h1_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h1_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h1_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h1_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h1_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h1_1
        ));

        $row_heading_h1_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h1_2',
            'parent' => $group_heading_h1,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h1_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h1_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h1_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h1_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h1_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h1_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h1_2
        ));

        //H2
        $group_heading_h2 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h2',
            'title' => esc_html__('H2 Style', 'newsroom'),
            'description' => esc_html__('Define styles for H2 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h2_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h2_1',
            'parent' => $group_heading_h2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h2_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h2_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h2_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h2_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h2_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h2_1
        ));

        $row_heading_h2_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h2_2',
            'parent' => $group_heading_h2,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h2_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h2_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h2_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h2_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h2_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h2_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h2_2
        ));

        //H3
        $group_heading_h3 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h3',
            'title' => esc_html__('H3 Style', 'newsroom'),
            'description' => esc_html__('Define styles for H3 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h3_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h3_1',
            'parent' => $group_heading_h3
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h3_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h3_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h3_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h3_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h3_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h3_1
        ));

        $row_heading_h3_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h3_2',
            'parent' => $group_heading_h3,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h3_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h3_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h3_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h3_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h3_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h3_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h3_2
        ));

        //H4
        $group_heading_h4 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h4',
            'title' => esc_html__('H4 Style', 'newsroom'),
            'description' => esc_html__('Define styles for H4 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h4_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h4_1',
            'parent' => $group_heading_h4
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h4_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h4_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h4_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h4_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h4_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h4_1
        ));

        $row_heading_h4_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h4_2',
            'parent' => $group_heading_h4,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h4_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h4_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h4_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h4_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h4_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h4_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h4_2
        ));

        //H5
        $group_heading_h5 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h5',
            'title' => esc_html__('H5 Style', 'newsroom'),
            'description' => esc_html__('Define styles for H5 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h5_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h5_1',
            'parent' => $group_heading_h5
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h5_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h5_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h5_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h5_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h5_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h5_1
        ));

        $row_heading_h5_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h5_2',
            'parent' => $group_heading_h5,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h5_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h5_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h5_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h5_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h5_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h5_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h5_2
        ));

        //H6
        $group_heading_h6 = newsroom_elated_add_admin_group(array(
            'name' => 'group_heading_h6',
            'title' => esc_html__('H6 Style', 'newsroom'),
            'description' => esc_html__('Define styles for h6 heading', 'newsroom'),
            'parent' => $panel_headings
        ));

        $row_heading_h6_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h6_1',
            'parent' => $group_heading_h6
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'h6_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_heading_h6_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h6_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h6_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h6_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_heading_h6_1
        ));

        $row_heading_h6_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_heading_h6_2',
            'parent' => $group_heading_h6,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'h6_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_heading_h6_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h6_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_heading_h6_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'h6_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_heading_h6_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_heading_h6_2
        ));

        /**
         * Headings Responsive (Tablet Portrait View)
         */
        $panel_responsive_headings = newsroom_elated_add_admin_panel(
            array(
                'page' => '_fonts_page',
                'name' => 'panel_responsive_headings',
                'title' => esc_html__('Headings Responsive (Tablet Portrait View)', 'newsroom')
            )
        );

        //H1
        $group_responsive_heading_h1 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h1',
            'title' => esc_html__('H1 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H1 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h1_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h1_1',
            'parent' => $group_responsive_heading_h1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h1_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h1_1
        ));

        //H2
        $group_responsive_heading_h2 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h2',
            'title' => esc_html__('H2 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H2 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h2_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h2_1',
            'parent' => $group_responsive_heading_h2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h2_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h2_1
        ));

        //H3
        $group_responsive_heading_h3 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h3',
            'title' => esc_html__('H3 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H3 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h3_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h3_1',
            'parent' => $group_responsive_heading_h3
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h3_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h3_1
        ));

        //H4
        $group_responsive_heading_h4 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h4',
            'title' => esc_html__('H4 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H4 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h4_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h4_1',
            'parent' => $group_responsive_heading_h4
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h4_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h4_1
        ));

        //H5
        $group_responsive_heading_h5 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h5',
            'title' => esc_html__('H5 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H5 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h5_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h5_1',
            'parent' => $group_responsive_heading_h5
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h5_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h5_1
        ));

        //H6
        $group_responsive_heading_h6 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive_heading_h6',
            'title' => esc_html__('H6 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for h6 heading', 'newsroom'),
            'parent' => $panel_responsive_headings
        ));

        $row_responsive_heading_h6_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive_heading_h6_1',
            'parent' => $group_responsive_heading_h6
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_responsive_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h6_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_responsive_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive_heading_h6_1
        ));

        /**
         * Headings Responsive (Mobile Devices)
         */
        $panel_responsive_headings2 = newsroom_elated_add_admin_panel(
            array(
                'page' => '_fonts_page',
                'name' => 'panel_responsive_headings2',
                'title' => esc_html__('Headings Responsive (Mobile Devices)', 'newsroom')
            )
        );

        //H1
        $group_responsive2_heading_h1 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h1',
            'title' => esc_html__('H1 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H1 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h1_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h1_1',
            'parent' => $group_responsive2_heading_h1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h1_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h1_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h1_1
        ));

        //H2
        $group_responsive2_heading_h2 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h2',
            'title' => esc_html__('H2 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H2 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h2_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h2_1',
            'parent' => $group_responsive2_heading_h2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h2_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h2_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h2_1
        ));

        //H3
        $group_responsive2_heading_h3 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h3',
            'title' => esc_html__('H3 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H3 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h3_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h3_1',
            'parent' => $group_responsive2_heading_h3
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h3_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h3_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h3_1
        ));

        //H4
        $group_responsive2_heading_h4 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h4',
            'title' => esc_html__('H4 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H4 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h4_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h4_1',
            'parent' => $group_responsive2_heading_h4
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h4_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h4_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h4_1
        ));

        //H5
        $group_responsive2_heading_h5 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h5',
            'title' => esc_html__('H5 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for H5 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h5_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h5_1',
            'parent' => $group_responsive2_heading_h5
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h5_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h5_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h5_1
        ));

        //H6
        $group_responsive2_heading_h6 = newsroom_elated_add_admin_group(array(
            'name' => 'group_responsive2_heading_h6',
            'title' => esc_html__('H6 Responsive Style', 'newsroom'),
            'description' => esc_html__('Define responsive styles for h6 heading', 'newsroom'),
            'parent' => $panel_responsive_headings2
        ));

        $row_responsive2_heading_h6_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_responsive2_heading_h6_1',
            'parent' => $group_responsive2_heading_h6
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_responsive_fontsize2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h6_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'h6_responsive_lineheight2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_responsive2_heading_h6_1
        ));

        /**
         * Text
         */
        $panel_text = newsroom_elated_add_admin_panel(
            array(
                'page' => '_fonts_page',
                'name' => 'panel_text',
                'title' => esc_html__('Text', 'newsroom')
            )
        );

        $group_text = newsroom_elated_add_admin_group(array(
            'name' => 'group_text',
            'title' => esc_html__('Paragraph', 'newsroom'),
            'description' => esc_html__('Define styles for paragraph text', 'newsroom'),
            'parent' => $panel_text
        ));

        $row_text_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_text_1',
            'parent' => $group_text
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'text_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'newsroom'),
            'parent' => $row_text_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_text_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_text_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'text_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'newsroom'),
            'options' => newsroom_elated_get_text_transform_array(),
            'parent' => $row_text_1
        ));

        $group_text_res1 = newsroom_elated_add_admin_group(array(
            'name' => 'group_text_res1',
            'title' => esc_html__('Paragraph Responsive (Table Portrait View)', 'newsroom'),
            'description' => esc_html__('Define responsive styles for paragraph text for table devices - portrait view', 'newsroom'),
            'parent' => $panel_text
        ));

        $row_res_text_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_text_1',
            'parent' => $group_text_res1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_fontsize_res1',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_res_text_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_lineheight_res1',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_res_text_1
        ));

        $group_text_res2 = newsroom_elated_add_admin_group(array(
            'name' => 'group_text_res2',
            'title' => esc_html__('Paragraph Responsive (Mobile Devices)', 'newsroom'),
            'description' => esc_html__('Define responsive styles for paragraph text for mobile devices', 'newsroom'),
            'parent' => $panel_text
        ));

        $row_res_text_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_res_text_2',
            'parent' => $group_text_res2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_fontsize_res2',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_res_text_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_lineheight_res2',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_res_text_2
        ));

        $row_text_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_text_2',
            'parent' => $group_text,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'text_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'newsroom'),
            'parent' => $row_text_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'text_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_text_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'text_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_text_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'text_letterspacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_text_2
        ));

        $group_link = newsroom_elated_add_admin_group(array(
            'name' => 'group_link',
            'title' => esc_html__('Links', 'newsroom'),
            'description' => esc_html__('Define styles for link text', 'newsroom'),
            'parent' => $panel_text
        ));

        $row_link_1 = newsroom_elated_add_admin_row(array(
            'name' => 'row_link_1',
            'parent' => $group_link
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'link_color',
            'default_value' => '',
            'label' => esc_html__('Link Color', 'newsroom'),
            'parent' => $row_link_1
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'link_hovercolor',
            'default_value' => '',
            'label' => esc_html__('Hover Link Color', 'newsroom'),
            'parent' => $row_link_1
        ));

        $row_link_2 = newsroom_elated_add_admin_row(array(
            'name' => 'row_link_2',
            'parent' => $group_link,
            'next' => true
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'link_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'newsroom'),
            'options' => newsroom_elated_get_font_style_array(),
            'parent' => $row_link_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'link_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'newsroom'),
            'options' => newsroom_elated_get_font_weight_array(),
            'parent' => $row_link_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'link_fontdecoration',
            'default_value' => '',
            'label' => esc_html__('Link Decoration', 'newsroom'),
            'options' => newsroom_elated_get_text_decorations(),
            'parent' => $row_link_2
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'link_hover_fontdecoration',
            'default_value' => '',
            'label' => esc_html__('Hovel Link Decoration', 'newsroom'),
            'options' => newsroom_elated_get_text_decorations(),
            'parent' => $row_link_2
        ));
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_fonts_options_map', 12);
}