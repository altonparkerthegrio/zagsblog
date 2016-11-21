<?php

if (!function_exists('newsroom_elated_blog_options_map')) {

    function newsroom_elated_blog_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_blog_page',
                'title' => esc_html__('Blog', 'newsroom'),
                'icon' => 'fa fa-files-o'
            )
        );

        /**
         * Blog Lists
         */

        $custom_sidebars = newsroom_elated_get_custom_sidebars();

        $panel_blog_lists = newsroom_elated_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_lists',
                'title' => esc_html__('Blog Lists', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_type',
            'type' => 'select',
            'label' => esc_html__('Blog Layout for Archive Pages', 'newsroom'),
            'description' => esc_html__('Choose a default blog layout', 'newsroom'),
            'default_value' => 'standard',
            'parent' => $panel_blog_lists,
            'options' => array(
                'standard' => esc_html__('Blog: Standard', 'newsroom'),
                'standard-whole-post' => esc_html__('Blog: Standard Whole Post', 'newsroom'),
                'type1' => esc_html__('Template 1', 'newsroom'),
                'type2' => esc_html__('Template 2', 'newsroom'),
                'type3' => esc_html__('Template 3', 'newsroom'),
            )
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'archive_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Archive Sidebar', 'newsroom'),
            'description' => esc_html__('Choose a sidebar layout for Archive Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            )
        ));

        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'blog_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Archive Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on Blog Post Lists. Default sidebar is "Sidebar Page"', 'newsroom'),
                'parent' => $panel_blog_lists,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

        newsroom_elated_add_admin_field(array(
            'name' => 'unique_category_layout',
            'type' => 'yesno',
            'default_value' => 'yes',
            'label' => esc_html__('Enable Unique Category Layout', 'newsroom'),
            'description' => esc_html__('Enable unique layout for Category Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_eltd_category_unique_layout_container'
            )
        ));

        $category_unique_layout_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_category_unique_layout_container',
                'hidden_property' => 'unique_category_layout',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $category_unique_layout_container,
                'type' => 'select',
                'name' => 'category_unique_layout',
                'default_value' => 'type1',
                'label' => esc_html__('Category Layout', 'newsroom'),
                'description' => esc_html__('Choose unique layout for Category Blog Post Lists', 'newsroom'),
                'options' => array(
                    'type_standard' => esc_html__('Template Standard', 'newsroom'),
                    'type1' => esc_html__('Template 1', 'newsroom'),
                    'type2' => esc_html__('Template 2', 'newsroom'),
                    'type3' => esc_html__('Template 3', 'newsroom'),
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'category_sidebar_layout',
            'type' => esc_html__('select', 'newsroom'),
            'label' => esc_html__('Category Sidebar', 'newsroom'),
            'default_value' => 'default',
            'description' => esc_html__('Choose a sidebar layout for Category Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'options' => array(
                'default' => esc_html__('Default', 'newsroom'),
                'no-sidebar' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            )
        ));

        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'blog_custom_category_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Category Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on Category Blog Lists. Default sidebar is "Sidebar Page"', 'newsroom'),
                'parent' => $panel_blog_lists,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

        newsroom_elated_add_admin_field(array(
            'name' => 'unique_author_layout',
            'type' => 'yesno',
            'default_value' => 'yes',
            'label' => esc_html__('Enable Unique Author Layout', 'newsroom'),
            'description' => esc_html__('Enable unique layout for Author Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_eltd_author_unique_layout_container'
            )
        ));

        $author_unique_layout_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_author_unique_layout_container',
                'hidden_property' => 'unique_author_layout',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $author_unique_layout_container,
                'type' => 'select',
                'name' => 'author_unique_layout',
                'default_value' => 'type1',
                'label' => esc_html__('Author Layout', 'newsroom'),
                'description' => esc_html('Choose unique layout for Author Blog Post Lists', 'newsroom'),
                'options' => array(
                    'type1' => esc_html__('Template 1', 'newsroom'),
                    'type2' => esc_html__('Template 2', 'newsroom'),
                    'type3' => esc_html__('Template 3', 'newsroom'),
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'author_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Author Sidebar', 'newsroom'),
            'default_value' => 'default',
            'description' => esc_html__('Choose a sidebar layout for Author Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'options' => array(
                'default' => esc_html__('Default', 'newsroom'),
                'no-sidebar' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            )
        ));

        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'blog_custom_author_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Author Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on Author Blog Lists. Default sidebar is "Sidebar Page"', 'newsroom'),
                'parent' => $panel_blog_lists,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

        newsroom_elated_add_admin_field(array(
            'name' => 'unique_tag_layout',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Enable Unique Tag Layout', 'newsroom'),
            'description' => esc_html__('Enable unique layout for Tag Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_eltd_tag_unique_layout_container'
            )
        ));

        $tag_unique_layout_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_tag_unique_layout_container',
                'hidden_property' => 'unique_tag_layout',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $tag_unique_layout_container,
                'type' => 'select',
                'name' => 'tag_unique_layout',
                'default_value' => 'type2',
                'label' => esc_html__('Tag Layout', 'newsroom'),
                'description' => esc_html__('Choose unique layout for Tag Blog Post Lists', 'newsroom'),
                'options' => array(
                    'type1' => esc_html__('Template 1', 'newsroom'),
                    'type2' => esc_html__('Template 2', 'newsroom'),
                    'type3' => esc_html__('Template 3', 'newsroom'),
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'tag_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Tag Sidebar', 'newsroom'),
            'default_value' => 'default',
            'description' => esc_html__('Choose a sidebar layout for Tag Blog Post Lists', 'newsroom'),
            'parent' => $panel_blog_lists,
            'options' => array(
                'default' => esc_html__('Default', 'newsroom'),
                'no-sidebar' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            )
        ));

        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'blog_custom_tag_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Tag Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on Tag Blog Lists. Default sidebar is "Sidebar Page"', 'newsroom'),
                'parent' => $panel_blog_lists,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'pagination',
                'default_value' => 'yes',
                'label' => esc_html__('Pagination', 'newsroom'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'newsroom'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltd_eltd_pagination_container'
                )
            )
        );

        $pagination_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_pagination_container',
                'hidden_property' => 'pagination',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $pagination_container,
                'type' => 'text',
                'name' => 'blog_page_range',
                'default_value' => '',
                'label' => esc_html__('Pagination Range limit', 'newsroom'),
                'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'number_of_chars',
                'default_value' => '45',
                'label' => esc_html__('Number of Words in Excerpt', 'newsroom'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_feature_image',
            'type' => 'yesno',
            'label' => esc_html__('Show Feature Image', 'newsroom'),
            'description' => esc_html__('Enabling this option will show feature image for your posts on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'yes',
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_blog_list_feature_image_container'
            )
        ));

        $blog_list_feature_image_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'blog_list_feature_image_container',
                'hidden_property' => 'blog_list_feature_image',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_list_feature_image_max_width',
                'default_value' => '',
                'label' => esc_html__('Featured Image Max Width', 'newsroom'),
                'parent' => $blog_list_feature_image_container,
                'description' => esc_html__('Define maximum width for featured images on your blog page. Default value is 1200', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_category',
            'type' => 'yesno',
            'label' => esc_html__('Show Category', 'newsroom'),
            'description' => esc_html__('Enabling this option will show category post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_date',
            'type' => 'yesno',
            'label' => esc_html__('Show Date', 'newsroom'),
            'description' => esc_html__('Enabling this option will show date post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_author',
            'type' => 'yesno',
            'label' => esc_html__('Show Author', 'newsroom'),
            'description' => esc_html__('Enabling this option will show author post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_comment',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'newsroom'),
            'description' => esc_html__('Enabling this option will show comments post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_like',
            'type' => 'yesno',
            'label' => esc_html__('Show Like', 'newsroom'),
            'description' => esc_html__('Enabling this option will show like post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_share',
            'type' => 'yesno',
            'label' => esc_html__('Show Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will show share post info on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_list_read_more',
            'type' => 'yesno',
            'label' => esc_html__('Show Read More', 'newsroom'),
            'description' => esc_html__('Enabling this option will show read more button on your blog page.', 'newsroom'),
            'parent' => $panel_blog_lists,
            'default_value' => 'yes'
        ));

        /**
         * Blog Single
         */
        $panel_blog_single = newsroom_elated_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_single',
                'title' => esc_html__('Blog Single', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'newsroom'),
            'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'newsroom'),
            'parent' => $panel_blog_single,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            ),
            'default_value' => 'default'
        ));


        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'blog_single_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'newsroom'),
                'parent' => $panel_blog_single,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

        newsroom_elated_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_single_feature_image_max_width',
                'default_value' => '',
                'label' => esc_html__('Featured Image Max Width', 'newsroom'),
                'parent' => $panel_blog_single,
                'description' => esc_html__('Define maximum width for featured image on single post pages. Default value is 1200', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_title_in_title_area',
            'type' => 'yesno',
            'label' => esc_html__('Show Post Title in Title Area', 'newsroom'),
            'description' => esc_html__('Enabling this option will show post title in title area on single post pages', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_category',
            'type' => 'yesno',
            'label' => esc_html__('Show Category', 'newsroom'),
            'description' => esc_html__('Enabling this option will show category post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_date',
            'type' => 'yesno',
            'label' => esc_html__('Show Date', 'newsroom'),
            'description' => esc_html__('Enabling this option will show date post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_author',
            'type' => 'yesno',
            'label' => esc_html__('Show Author', 'newsroom'),
            'description' => esc_html__('Enabling this option will show author post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_comment',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'newsroom'),
            'description' => esc_html__('Enabling this option will show comments post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_like',
            'type' => 'yesno',
            'label' => esc_html__('Show Like', 'newsroom'),
            'description' => esc_html__('Enabling this option will show like post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_count',
            'type' => 'yesno',
            'label' => esc_html__('Show Post Count', 'newsroom'),
            'description' => esc_html__('Enabling this option will show count post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_share',
            'type' => 'yesno',
            'label' => esc_html__('Show Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will show share post info on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_tags',
            'type' => 'yesno',
            'label' => esc_html__('Show Tags', 'newsroom'),
            'description' => esc_html__('Enabling this option will show post tags on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'blog_single_related_posts',
            'type' => 'yesno',
            'label' => esc_html__('Show Related Posts', 'newsroom'),
            'description' => esc_html__('Enabling this option will show related posts on your single post page.', 'newsroom'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes',
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_related_image_container'
            )
        ));

        $related_image_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'related_image_container',
                'hidden_property' => 'blog_single_related_posts',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_single_related_image_size',
                'default_value' => '',
                'label' => esc_html__('Related Posts Image Max Width', 'newsroom'),
                'parent' => $related_image_container,
                'description' => esc_html__('Define maximum width for related posts images on your single post pages. Default value is 1200', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_single_related_title_size',
                'default_value' => '10',
                'label' => esc_html__('Title Max Words', 'newsroom'),
                'parent' => $related_image_container,
                'description' => esc_html__('Enter max words of title post list that you want to display', 'newsroom'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_single_navigation',
                'default_value' => 'yes',
                'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'newsroom'),
                'parent' => $panel_blog_single,
                'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'newsroom'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltd_eltd_blog_single_navigation_container'
                )
            )
        );

        $blog_single_navigation_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_blog_single_navigation_container',
                'hidden_property' => 'blog_single_navigation',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_navigation_through_same_category',
                'default_value' => 'no',
                'label' => esc_html__('Enable Navigation Only in Current Category', 'newsroom'),
                'description' => esc_html__('Limit your navigation only through current category', 'newsroom'),
                'parent' => $blog_single_navigation_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info',
                'default_value' => 'yes',
                'label' => esc_html__('Show Author Info Box', 'newsroom'),
                'parent' => $panel_blog_single,
                'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'newsroom'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltd_eltd_blog_single_author_info_container'
                )
            )
        );

        $blog_single_author_info_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'eltd_blog_single_author_info_container',
                'hidden_property' => 'blog_author_info',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info_email',
                'default_value' => 'no',
                'label' => esc_html__('Show Author Email', 'newsroom'),
                'description' => esc_html__('Enabling this option will show author email', 'newsroom'),
                'parent' => $blog_single_author_info_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_blog_options_map', 15);
}