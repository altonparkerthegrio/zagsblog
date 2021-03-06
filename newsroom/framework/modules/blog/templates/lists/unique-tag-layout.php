<?php

/***** Get current tag page ID*****/

$tag = get_queried_object();
$current_tag_slug = $tag->slug;

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

/***** Get unique category template layout *****/

$template = 'type1';

if (newsroom_elated_options()->getOptionValue('tag_unique_layout') !== ''){
	$template = newsroom_elated_options()->getOptionValue('tag_unique_layout');
}

/***** Set params for posts on tag page *****/


$chars_array = newsroom_elated_blog_lists_number_of_chars();
if (isset($chars_array) && $chars_array !== '') {
	$params['excerpt_length'] = $chars_array;
}

$params['archive_type'] = 'tag';
$params['tag_slug'] = $current_tag_slug;
$params['template_type'] = $template;
$params['thumb_image_width'] = '';
$params['thumb_image_height'] = '';
$params['excerpt_length'] = '';
$params['display_category'] = 'yes';
$params['posts_per_page'] = 0;
$params['pagination_type'] = 'infinite';

newsroom_elated_get_module_template_part('templates/lists/unique-layouts', 'blog','',$params);