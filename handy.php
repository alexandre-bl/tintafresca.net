<?php

function get_post_content( $post, $singular=FALSE, $opinion=FALSE ) {

    if( !empty($post->ID) ) {

        $pre_ttl = get_post_meta( $post->ID, "Pre-Title", TRUE );

		$o = "";

        if( !empty($pre_ttl) ) {

            $o .= "<h3 class='post_pretitle'>$pre_ttl</h3>";

        }

        $o .= "<h1 class='post_title'><a href='". get_post_permalink( $post->ID ) ."'>$post->post_title</a></h1>";
        
        if( !$singular ) {

        	$o .= "<img class='post_img' src='" . wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0] . "'>";
			
		}

        if( !$opinion ) {

            $desc = get_post_meta( $post->ID, "Description", TRUE );

            if( empty( $desc ) or $singular ) {

                $o .= "<div class='post_desc'>". apply_filters( 'the_content',  $post->post_content ) ."</div>";

            } else {

                $o .= "<div class='post_desc'>". apply_filters( 'the_content',  $desc ) ."</div>";

            }

        } elseif( !empty(wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ) )) ) {

            $o .= "<div class='post_author'>". wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ) ) ."</div>";

        }

		return str_replace( "http://tintafresca.net", "https://tintafresca.net", $o );

    }

}

function get_edition() {

    $date    = getdate();
    $edition = $date["year"]*12 + $date["mon"] - 24011;

    return $edition;

}