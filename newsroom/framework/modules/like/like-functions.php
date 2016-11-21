<?php

if ( ! function_exists('newsroom_elated_like') ) {
	/**
	 * Returns NewsroomElatedLike instance
	 *
	 * @return NewsroomElatedLike
	 */
	function newsroom_elated_like() {
		return NewsroomElatedLike::get_instance();
	}

}

function newsroom_elated_get_like() {

	echo wp_kses(newsroom_elated_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('newsroom_elated_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function newsroom_elated_like_latest_posts() {
		return newsroom_elated_like()->add_like();
	}

}

if ( ! function_exists('newsroom_elated_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function newsroom_elated_like_portfolio_list($portfolio_project_id) {
		return newsroom_elated_like()->add_like_portfolio_list($portfolio_project_id);
	}

}