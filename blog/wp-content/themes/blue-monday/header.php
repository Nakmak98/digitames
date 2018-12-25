<?php
/**
 * The header for our theme.
 *
 *
 * @package blue-monday
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> >
			
		<?php 
		/**
         * Functions hooked in to blue_monday_header action.
         *
         * @hooked blue_monday_template_header 
         */
		do_action('blue_monday_header'); ?>

		<div id="content-area">