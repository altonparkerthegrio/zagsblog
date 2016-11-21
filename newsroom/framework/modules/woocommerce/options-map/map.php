<?php

if (!function_exists('newsroom_elated_woocommerce_options_map')) {

    /**
     * Add Woocommerce options page
     */
    function newsroom_elated_woocommerce_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_woocommerce_page',
                'title' => esc_html__('Woocommerce', 'newsroom'),
                'icon' => 'fa fa-shopping-cart'
            )
        );

        /**
         * Product List Settings
         */
        $panel_product_list = newsroom_elated_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_product_list',
                'title' => esc_html__('Product List', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'eltd_woo_product_list_columns',
            'type' => 'select',
            'label' => esc_html__('Product List Columns', 'newsroom'),
            'default_value' => 'eltd-woocommerce-columns-3',
            'description' => esc_html__('Choose number of columns for product listing and related products on single product', 'newsroom'),
            'options' => array(
                'eltd-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'newsroom'),
                'eltd-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'newsroom')
            ),
            'parent' => $panel_product_list,
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'eltd_woo_products_per_page',
            'type' => 'text',
            'label' => esc_html__('Number of products per page', 'newsroom'),
            'default_value' => '',
            'description' => esc_html__('Set number of products on shop page', 'newsroom'),
            'parent' => $panel_product_list,
            'args' => array(
                'col_width' => 3
            )
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'eltd_products_list_title_tag',
            'type' => 'select',
            'label' => esc_html__('Products Title Tag', 'newsroom'),
            'default_value' => 'h4',
            'description' => '',
            'options' => array(
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'parent' => $panel_product_list,
        ));

        /**
         * Single Product Settings
         */
        $panel_single_product = newsroom_elated_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_single_product',
                'title' => esc_html__('Single Product', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'eltd_single_product_title_tag',
            'type' => 'select',
            'label' => esc_html__('Single Product Title Tag', 'newsroom'),
            'default_value' => 'h1',
            'description' => '',
            'options' => array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'parent' => $panel_single_product,
        ));
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_woocommerce_options_map', 22);
}