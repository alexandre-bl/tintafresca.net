<?php

function get_post_content($post, $singular=FALSE) {

    if( !empty($post->ID) ) {

		$o = "";

		if( !$singular ) {

        	$o .= "<img class='post_img' src='" . wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0] . "'>";
			
		}

		$o .= "<h1 class='post_title'><a href='". get_post_permalink( $post->ID ) ."'>$post->post_title</a></h1>
                <div class='post_desc'>". apply_filters( 'the_content',  $post->post_content ) ."</div>";

		return $o;

    }

}