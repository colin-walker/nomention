<?php

	if( !defined('ABSPATH') ) exit; //Don't run if accessed directly

/**
 *  Nomentions
 *
 *  @package Nomentions
 *
 *  Plugin Name: Nomentions
 *
 *
 *  Description: Exclude links from sending webmentions
 *
 *  Requires: Webmention
 *
 *  Version: 0.1
 *
 *  Author: Colin Walker
 *
*/

	function nomention_links( $links, $post_id ) {
		$post = get_post( $post_id );
		preg_match_all('/<a[^>]+>/i',$post->post_content, $results);
    		$mentions = '';
		foreach ($results[0] as $link) {
  			if (!strpos($link, 'class="nomention')) {
    			$mentions .= $link;
  			}
		}
		$links = wp_extract_urls($mentions);
		return $links;
	}

	add_filter( 'webmention_links', 'nomention_links', 10, 2 );

?>
