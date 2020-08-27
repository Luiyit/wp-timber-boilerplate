<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::query_post();

$context['instagram'] = get_fields_by_page_id(38);
$context['contact'] = get_fields_by_page_id(30);
$context['page'] = get_fields_by_page_id($timber_post->ID);
$context['post'] = $timber_post;

// print_r("<pre>");
// print_r($context['page']);
// print_r("</pre>");

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
