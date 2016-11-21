<?php

/*** Child Theme Function  ***/

function newsroom_elated_child_theme_enqueue_scripts() {

    $parent_style = 'newsroom_elated_default_style';

    wp_enqueue_style('newsroom_elated_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action( 'wp_enqueue_scripts', 'newsroom_elated_child_theme_enqueue_scripts' );

require( __DIR__ . '/functions/class-zagnet-ads-ZAGNET.php' );

function zagnet_singleton( $class ) {
	if( !class_exists( $class ) )
		wp_die( "Singleton class '$class' does not exist. Sanity not found." );

	if( !isset( $GLOBALS[$class] ) )
		$GLOBALS[$class] = new $class;

	if( !is_a( $GLOBALS[$class], $class ) )
		wp_die( "Singleton assertion for '$class' failed. Sanity not found." );

	return $GLOBALS[$class];
}

zagnet_singleton( 'zagnet_Ads_ZAGNET' );

add_theme_support( 'infinite-transporter', array( 'container' => 'infinity-river-single' ) );