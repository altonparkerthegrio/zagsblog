<?php

require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.kses.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.layout.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.optionsapi.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/google-fonts.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.framework.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.functions.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.common.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.icons.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/admin/options/eltd-options-setup.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/eltd-meta-boxes-setup.php";
require_once ELATED_FRAMEWORK_ROOT_DIR . "/modules/eltd-modules-loader.php";

if (!function_exists('newsroom_elated_admin_scripts_init')) {
    /**
     * Function that registers all scripts that are necessary for our back-end
     */
    function newsroom_elated_admin_scripts_init() {

        /**
         * @see ElatedSkinAbstract::registerScripts - hooked with 10
         * @see ElatedSkinAbstract::registerStyles - hooked with 10
         */
        do_action('newsroom_elated_admin_scripts_init');
    }

    add_action('admin_init', 'newsroom_elated_admin_scripts_init');
}

if (!function_exists('newsroom_elated_enqueue_admin_styles')) {
    /**
     * Function that enqueues styles for options page
     */
    function newsroom_elated_enqueue_admin_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see ElatedSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('newsroom_elated_enqueue_admin_styles');
    }
}

if (!function_exists('newsroom_elated_enqueue_admin_scripts')) {
    /**
     * Function that enqueues styles for options page
     */
    function newsroom_elated_enqueue_admin_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script("eltd-dependence", get_template_directory_uri() . '/framework/admin/assets/js/eltd-ui/eltd-dependence.js', array(), false, true);
        wp_enqueue_script("eltd-twitter-connect", get_template_directory_uri() . '/framework/admin/assets/js/eltd-twitter-connect.js', array(), false, true);

        /**
         * @see ElatedSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('newsroom_elated_enqueue_admin_scripts');
    }
}

if (!function_exists('newsroom_elated_enqueue_meta_box_styles')) {
    /**
     * Function that enqueues styles for meta boxes
     */
    function newsroom_elated_enqueue_meta_box_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see ElatedSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('newsroom_elated_enqueue_meta_box_styles');
    }
}

if (!function_exists('newsroom_elated_enqueue_meta_box_scripts')) {
    /**
     * Function that enqueues scripts for meta boxes
     */
    function newsroom_elated_enqueue_meta_box_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script('eltd-dependence');

        /**
         * @see ElatedSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('newsroom_elated_enqueue_meta_box_scripts');
    }
}

if (!function_exists('newsroom_elated_enqueue_nav_menu_script')) {
    /**
     * Function that enqueues styles and scripts necessary for menu administration page.
     * It checks $hook variable
     * @param $hook string current page hook to check
     */
    function newsroom_elated_enqueue_nav_menu_script($hook) {
        if ($hook == 'nav-menus.php') {
            wp_enqueue_script('eltd-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/eltd-nav-menu.js');
            wp_enqueue_style('eltd-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/eltd-nav-menu.css');
        }
    }

    add_action('admin_enqueue_scripts', 'newsroom_elated_enqueue_nav_menu_script');
}


if (!function_exists('newsroom_elated_enqueue_widgets_admin_script')) {
    /**
     * Function that enqueues styles and scripts for admin widgets page.
     * @param $hook string current page hook to check
     */
    function newsroom_elated_enqueue_widgets_admin_script($hook) {
        if ($hook == 'widgets.php') {
            wp_enqueue_script('eltd-dependence');
        }
    }

    add_action('admin_enqueue_scripts', 'newsroom_elated_enqueue_widgets_admin_script');
}

if (!function_exists('newsroom_elated_init_theme_options_array')) {
    /**
     * Function that merges $newsroom_options and default options array into one array.
     *
     * @see array_merge()
     */
    function newsroom_elated_init_theme_options_array() {
        global $newsroom_options, $newsroom_Framework;

        $db_options = get_option('eltd_options_news');

        //does eltd_options exists in db?
        if (is_array($db_options)) {
            //merge with default options
            $newsroom_options = array_merge($newsroom_Framework->eltdOptions->options, get_option('eltd_options_news'));
        } else {
            //options don't exists in db, take default ones
            $newsroom_options = $newsroom_Framework->eltdOptions->options;
        }
    }

    add_action('newsroom_elated_after_options_map', 'newsroom_elated_init_theme_options_array', 0);
}

if (!function_exists('newsroom_elated_init_theme_options')) {
    /**
     * Function that sets $newsroom_options variable if it does'nt exists
     */
    function newsroom_elated_init_theme_options() {
        global $newsroom_options;
        global $newsroom_Framework;
        if (isset($newsroom_options['reset_to_defaults'])) {
            if ($newsroom_options['reset_to_defaults'] == 'yes') delete_option("eltd_options_news");
        }

        if (!get_option("eltd_options_news")) {
            add_option("eltd_options_news",
                $newsroom_Framework->eltdOptions->options
            );

            $newsroom_options = $newsroom_Framework->eltdOptions->options;
        }
    }
}

if (!function_exists('newsroom_elated_register_theme_settings')) {
    /**
     * Function that registers setting that will be used to store theme options
     */
    function newsroom_elated_register_theme_settings() {
        register_setting('newsroom_elated_theme_menu', 'eltd_options');
    }

    add_action('admin_init', 'newsroom_elated_register_theme_settings');
}

if (!function_exists('newsroom_elated_get_admin_tab')) {
    /**
     * Helper function that returns current tab from url.
     * @return null
     */
    function newsroom_elated_get_admin_tab() {
        return isset($_GET['page']) ? newsroom_elated_strafter($_GET['page'], 'tab') : NULL;
    }
}

if (!function_exists('newsroom_elated_strafter')) {
    /**
     * Function that returns string that comes after found string
     * @param $string string where to search
     * @param $substring string what to search for
     * @return null|string string that comes after found string
     */
    function newsroom_elated_strafter($string, $substring) {
        $pos = strpos($string, $substring);
        if ($pos === false) {
            return NULL;
        }

        return (substr($string, $pos + strlen($substring)));
    }
}

if (!function_exists('newsroom_elated_save_options')) {
    /**
     * Function that saves theme options to db.
     * It hooks to ajax wp_ajax_eltd_save_options action.
     */
    function newsroom_elated_save_options() {
        global $newsroom_options;

        $_REQUEST = stripslashes_deep($_REQUEST);

        unset($_REQUEST['action']);

        $newsroom_options = array_merge($newsroom_options, $_REQUEST);

        update_option('eltd_options_news', $newsroom_options);

        do_action('newsroom_elated_after_theme_option_save');
        echo esc_html__('Saved', 'newsroom');

        die();
    }

    add_action('wp_ajax_newsroom_elated_save_options', 'newsroom_elated_save_options');
}

if (!function_exists('newsroom_elated_meta_box_add')) {
    /**
     * Function that adds all defined meta boxes.
     * It loops through array of created meta boxes and adds them
     */
    function newsroom_elated_meta_box_add() {
        global $newsroom_Framework;


        foreach ($newsroom_Framework->eltdMetaBoxes->metaBoxes as $key => $box) {
            $hidden = false;
            if (!empty($box->hidden_property)) {
                foreach ($box->hidden_values as $value) {
                    if (newsroom_elated_option_get_value($box->hidden_property) == $value)
                        $hidden = true;

                }
            }

            if (is_string($box->scope)) {
                $box->scope = array($box->scope);
            }

            if (is_array($box->scope) && count($box->scope)) {
                foreach ($box->scope as $screen) {
                    add_meta_box(
                        'eltd-meta-box-' . $key,
                        $box->title,
                        'newsroom_elated_render_meta_box',
                        $screen,
                        'advanced',
                        'high',
                        array('box' => $box)
                    );

                    if ($hidden) {
                        add_filter('postbox_classes_' . $screen . '_eltd-meta-box-' . $key, 'newsroom_elated_meta_box_add_hidden_class');
                    }
                }
            }

        }

        add_action('admin_enqueue_scripts', 'newsroom_elated_enqueue_meta_box_styles');
        add_action('admin_enqueue_scripts', 'newsroom_elated_enqueue_meta_box_scripts');
    }

    add_action('add_meta_boxes', 'newsroom_elated_meta_box_add');
}

if (!function_exists('newsroom_elated_meta_box_save')) {
    /**
     * Function that saves meta box to postmeta table
     * @param $post_id int id of post that meta box is being saved
     * @param $post WP_Post current post object
     */
    function newsroom_elated_meta_box_save($post_id, $post) {
        global $newsroom_Framework;

        $nonces_array = array();
        $meta_boxes = newsroom_elated_framework()->eltdMetaBoxes->getMetaBoxesByScope($post->post_type);

        if (is_array($meta_boxes) && count($meta_boxes)) {
            foreach ($meta_boxes as $meta_box) {
                $nonces_array[] = 'eltd_themename_meta_box_' . $meta_box->name . '_save';
            }
        }

        if (is_array($nonces_array) && count($nonces_array)) {
            foreach ($nonces_array as $nonce) {
                if (!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
                    return;
                }
            }
        }

        $postTypes = array("page", "post", "forum", "topic");

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['_wpnonce'])) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (!in_array($post->post_type, $postTypes)) {
            return;
        }

        foreach ($newsroom_Framework->eltdMetaBoxes->options as $key => $box) {

            if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

                $value = $_POST[$key];

                update_post_meta($post_id, $key, $value);
            } else {
                delete_post_meta($post_id, $key);
            }
        }
    }

    add_action('save_post', 'newsroom_elated_meta_box_save', 1, 2);
}

if (!function_exists('newsroom_elated_render_meta_box')) {
    /**
     * Function that renders meta box
     * @param $post WP_Post post object
     * @param $metabox array array of current meta box parameters
     */
    function newsroom_elated_render_meta_box($post, $metabox) { ?>
        <div class="eltd-meta-box eltd-page">
            <div class="eltd-meta-box-holder">
                <?php $metabox['args']['box']->render(); ?>
                <?php wp_nonce_field('eltd_themename_meta_box_' . $metabox['args']['box']->name . '_save', 'eltd_themename_meta_box_' . $metabox['args']['box']->name . '_save'); ?>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('newsroom_elated_meta_box_add_hidden_class')) {
    /**
     * Function that adds class that will initially hide meta box
     * @param array $classes array of classes
     * @return array modified array of classes
     */
    function newsroom_elated_meta_box_add_hidden_class($classes = array()) {
        if (!in_array('eltd-meta-box-hidden', $classes))
            $classes[] = 'eltd-meta-box-hidden';

        return $classes;
    }

}

if (!function_exists('newsroom_elated_remove_default_custom_fields')) {
    /**
     * Function that removes default WordPress custom fields interface
     */
    function newsroom_elated_remove_default_custom_fields() {
        foreach (array('normal', 'advanced', 'side') as $context) {
            foreach (array("page", "post") as $postType) {
                remove_meta_box('postcustom', $postType, $context);
            }
        }
    }

    add_action('do_meta_boxes', 'newsroom_elated_remove_default_custom_fields');
}


if (!function_exists('newsroom_elated_get_custom_sidebars')) {
    /**
     * Function that returns all custom made sidebars.
     *
     * @uses get_option()
     * @return array array of custom made sidebars where key and value are sidebar name
     */
    function newsroom_elated_get_custom_sidebars() {
        $custom_sidebars = get_option('eltd_sidebars');
        $formatted_array = array();

        if (is_array($custom_sidebars) && count($custom_sidebars)) {
            foreach ($custom_sidebars as $custom_sidebar) {
                $formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
            }
        }

        return $formatted_array;
    }
}

if (!function_exists('newsroom_elated_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function newsroom_elated_generate_icon_pack_options() {
        global $newsroom_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $newsroom_IconCollections->getIconCollection($icon_pack);

        if ($collections_object) {
            $icons = $collections_object->getIconsArray();
            if (is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="' . esc_attr($key) . '">' . esc_html($key) . '</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'newsroom_elated_generate_icon_pack_options');
}

if (!function_exists('newsroom_elated_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function newsroom_elated_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_' . $id);

        //if notice isn't dismissed
        if (!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="' . esc_attr($class) . ' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if ($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="' . esc_url(add_query_arg('eltd_dismis_notice', $id)) . '">' . esc_html__('Dismiss this notice', 'newsroom') . '</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }
    }
}

if (!function_exists('newsroom_elated_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function newsroom_elated_save_dismisable_notice() {
        if (is_admin() && !empty($_GET['eltd_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['eltd_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_' . $notice_id, 1);
        }
    }

    add_action('admin_init', 'newsroom_elated_save_dismisable_notice');
}

if (!function_exists('newsroom_elated_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_eltd_twitter_obtain_request_token ajax action
     *
     * @see ElatedTwitterApi::obtainRequestToken()
     */
    function newsroom_elated_hook_twitter_request_ajax() {
        ElatedfTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_eltd_twitter_obtain_request_token', 'newsroom_elated_hook_twitter_request_ajax');
}
?>