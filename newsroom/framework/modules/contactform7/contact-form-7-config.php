<?php
if (!function_exists('newsroom_elated_contact_form_map')) {
    /**
     * Map Contact Form 7 shortcode
     * Hooks on vc_after_init action
     */
    function newsroom_elated_contact_form_map() {

        vc_add_param('contact-form-7', array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'newsroom'),
            'param_name' => 'html_class',
            'value' => array(
                esc_html__('Default', 'newsroom') => 'default',
                esc_html__('Custom Style 1', 'newsroom') => 'cf7_custom_style_1',
                esc_html__('Custom Style 2', 'newsroom') => 'cf7_custom_style_2'
            ),
            'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'newsroom')
        ));

    }

    add_action('vc_after_init', 'newsroom_elated_contact_form_map');
}
?>