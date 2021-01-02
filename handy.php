<?php

function get_post_content($post, $singular=FALSE, $opinion=FALSE ) {

    if( !empty($post->ID) ) {

		$o = "";

        $o .= "<h1 class='post_title'><a href='". get_post_permalink( $post->ID ) ."'>$post->post_title</a></h1>";
        
        if( !$singular ) {

        	$o .= "<img class='post_img' src='" . wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0] . "'>";
			
		}

        if( !$opinion ) {

            $desc = get_post_meta( $post->ID, "Description" );

            if( empty( $desc ) ) {

                $o .= "<div class='post_desc'>". apply_filters( 'the_content',  $post->post_content ) ."</div>";

            } else {

                $o .= "<div class='post_desc'>". apply_filters( 'the_content',  $desc ) ."</div>";

            }

        } else {

            $o .= "<div class='post_desc'>". wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ) ) ."</div>";

        }

		return $o;

    }

}