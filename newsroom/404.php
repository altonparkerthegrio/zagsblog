<?php

/***** Set params for posts on 404 page *****/

$params = '';

$number_of_posts = 6;
$params .= ' number_of_posts="'.$number_of_posts.'"';	

$column_number = 3;
$params .= ' column_number="'.$column_number.'"';

$display_excerpt = 'no';
$params .= ' display_excerpt="'.$display_excerpt.'"';

$title_length = '55';
$params .= ' title_length="'.$title_length.'"';
?>
<?php get_header(); ?>

<?php newsroom_elated_get_title(); ?>

	<div class="eltd-container eltd-404-page">
	<?php do_action('newsroom_elated_after_container_open'); ?>
        <div class="eltd-page-not-found">
            <h1>
                <?php if(newsroom_elated_options()->getOptionValue('404_title')){
                    echo esc_html(newsroom_elated_options()->getOptionValue('404_title'));
                } else {
                    esc_html_e('Sorry...404 Error Page', 'newsroom');
                } ?>
            </h1>
            <h5>
                <?php if(newsroom_elated_options()->getOptionValue('404_text')){
                    echo esc_html(newsroom_elated_options()->getOptionValue('404_text'));
                } else {
                    esc_html_e("Sorry, but the page you are looking for doesn't exist.", "newsroom");
                } ?>
            </h5>
            <?php
                $button_params = array();
                if (newsroom_elated_options()->getOptionValue('404_back_to_home')){
                    $button_params['text'] = newsroom_elated_options()->getOptionValue('404_back_to_home');
                } else {
                    $button_params['text'] = esc_html__('Home Page', 'newsroom');
                }
                $button_params['type'] = 'outline';
                $button_params['link'] = esc_url(home_url('/'));
                $button_params['target'] = '_self';
                $button_params['icon_pack'] = 'ion_icons';
                $button_params['ion_icon'] = 'ion-android-arrow-forward';
            echo newsroom_elated_execute_shortcode('eltd_button', $button_params);?>


        </div>
        <div class="eltd-container-inner">
            <?php echo do_shortcode("[eltd_post_layout_one $params]"); ?>
        </div>


		<?php do_action('newsroom_elated_before_container_close'); ?>
	</div>
<?php get_footer(); ?>