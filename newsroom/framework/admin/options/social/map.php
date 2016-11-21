<?php

if (!function_exists('newsroom_elated_social_options_map')) {

    function newsroom_elated_social_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_social_page',
                'title' => 'Social Network',
                'icon' => 'fa fa-share-alt'
            )
        );

        /**
         * Enable Social Share
         */
        $panel_social_share = newsroom_elated_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_social_share',
            'title' => esc_html__('Enable Social Share', 'newsroom'),
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Social Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow social share on networks of your choice', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_panel_social_networks, #eltd_panel_show_social_share_on'
            ),
            'parent' => $panel_social_share
        ));

        $panel_show_social_share_on = newsroom_elated_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_show_social_share_on',
            'title' => esc_html__('Show Social Share On', 'newsroom'),
            'hidden_property' => 'enable_social_share',
            'hidden_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share_on_post',
            'default_value' => 'no',
            'label' => esc_html__('Posts', 'newsroom'),
            'description' => esc_html__('Show Social Share on Blog Posts', 'newsroom'),
            'parent' => $panel_show_social_share_on
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share_on_page',
            'default_value' => 'no',
            'label' => esc_html__('Pages', 'newsroom'),
            'description' => esc_html__('Show Social Share on Pages', 'newsroom'),
            'parent' => $panel_show_social_share_on
        ));

        if (newsroom_elated_is_woocommerce_installed()) {
            newsroom_elated_add_admin_field(array(
                'type' => 'yesno',
                'name' => 'enable_social_share_on_product',
                'default_value' => 'no',
                'label' => esc_html__('Product', 'newsroom'),
                'description' => esc_html__('Show Social Share for Product Items', 'newsroom'),
                'parent' => $panel_show_social_share_on
            ));
        }

        /**
         * Social Share Networks
         */
        $panel_social_networks = newsroom_elated_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_social_networks',
            'title' => esc_html__('Social Networks', 'newsroom'),
            'hidden_property' => 'enable_social_share',
            'hidden_value' => 'no'
        ));

        /**
         * Facebook
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'facebook_title',
            'title' => esc_html__('Share on Facebook', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_facebook_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via Facebook', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_facebook_share_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_facebook_share_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_facebook_share_container',
            'hidden_property' => 'enable_facebook_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'facebook_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_facebook_share_container
        ));

        /**
         * Twitter
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'twitter_title',
            'title' => esc_html__('Share on Twitter', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_twitter_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via Twitter', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_twitter_share_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_twitter_share_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_twitter_share_container',
            'hidden_property' => 'enable_twitter_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'twitter_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_twitter_share_container
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'text',
            'name' => 'twitter_via',
            'default_value' => '',
            'label' => esc_html__('Via', 'newsroom'),
            'parent' => $enable_twitter_share_container
        ));

        /**
         * Google Plus
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'google_plus_title',
            'title' => esc_html__('Share on Google Plus', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_google_plus_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via Google Plus', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_google_plus_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_google_plus_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_google_plus_container',
            'hidden_property' => 'enable_google_plus_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'google_plus_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_google_plus_container
        ));

        /**
         * Linked In
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'linkedin_title',
            'title' => esc_html__('Share on LinkedIn', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_linkedin_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via LinkedIn', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_linkedin_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_linkedin_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_linkedin_container',
            'hidden_property' => 'enable_linkedin_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'linkedin_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_linkedin_container
        ));

        /**
         * Tumblr
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'tumblr_title',
            'title' => esc_html__('Share on Tumblr', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_tumblr_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via Tumblr', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_tumblr_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_tumblr_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_tumblr_container',
            'hidden_property' => 'enable_tumblr_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'tumblr_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_tumblr_container
        ));

        /**
         * Pinterest
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'pinterest_title',
            'title' => esc_html__('Share on Pinterest', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_pinterest_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via Pinterest', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_pinterest_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_pinterest_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_pinterest_container',
            'hidden_property' => 'enable_pinterest_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'pinterest_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_pinterest_container
        ));

        /**
         * VK
         */
        newsroom_elated_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'vk_title',
            'title' => esc_html__('Share on VK', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_vk_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow sharing via VK', 'newsroom'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#eltd_enable_vk_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_vk_container = newsroom_elated_add_admin_container(array(
            'name' => 'enable_vk_container',
            'hidden_property' => 'enable_vk_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'image',
            'name' => 'vk_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'newsroom'),
            'parent' => $enable_vk_container
        ));

        if (defined('ELATEDF_TWITTER_FEED_VERSION')) {
            $twitter_panel = newsroom_elated_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'newsroom'),
                'name' => 'panel_twitter',
                'page' => '_social_page'
            ));

            newsroom_elated_add_admin_twitter_button(array(
                'name' => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if (defined('ELATEDF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = newsroom_elated_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'newsroom'),
                'name' => 'panel_instagram',
                'page' => '_social_page'
            ));

            newsroom_elated_add_admin_instagram_button(array(
                'name' => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_social_options_map', 16);

}