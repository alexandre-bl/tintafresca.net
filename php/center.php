<div id="center"

<?php

function get_post_content($post) {

    if( !empty($post->ID) ) {

        return "<img class='post_img' src='" . wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0] . "'>
                <h1 class='post_title'>$post->post_title</h1>
                <div class='post_desc'>$post->post_content</div>";

    }

}
}

if( is_singular() ) {

	echo ' class="singular">';

	echo get_post_content( get_post() )

} else {

	echo '>';

	$destaques = $posts = get_posts( array(
	    'numberposts' => 3,
	    "category" =>  get_cat_ID("Destaques")
	  )
	);

	for( $i = 0; $i < 3; $i += 1 ) {

	    if( empty( $destaques[$i] ) ) {

	        $destaques[$i] = null;

	    }

	}

	$posts = get_posts( array(
	    'numberposts' => -1
	  )
	);
	
	$posts_markup = array(  "st"    => get_post_content($destaques[0]),
	                        "nd"    => get_post_content($destaques[1]),
	                        "trd"   => get_post_content($destaques[2]),
	                        "left"  => "",
	                        "right" => ""
	                    );
	
	$destaques_n = 0;
	
	for( $i = 0; $i < count($posts); $i += 1 ) {
	
	    if( $posts[$i] != $destaques[0] and
	        $posts[$i] != $destaques[1] and
	        $posts[$i] != $destaques[2] )   {
	
	        $thumbnail = "<div class='post'>". get_post_content($posts[$i]) ."</div>";
	
	        if( ( $i - $destaques_n ) % 2 == 0 ) {
	
	            $posts_markup["left"] .= $thumbnail;
	
	        } else {
	
	            $posts_markup["right"] .= $thumbnail;
	
	        }
	
	    } else {
	
	        $destaques_n += 1;
	
	    }
	
	}	

	?>

	    <div class="post main" id="st_post">
	        <?php echo $posts_markup["st"]; ?>
	    </div>

	    <div class="post main" id="nd_post">
	        <?php echo $posts_markup["nd"]; ?>
	    </div>
	
	    <div class="post main" id="trd_post">
	        <?php echo $posts_markup["trd"]; ?>
	    </div>

	    <div id="sec_posts">
	        <div id="left_posts">
	            <?php echo $posts_markup["left"]; ?>
	        </div>
	        <div id="right_posts">
	            <?php echo $posts_markup["right"]; ?>
	        </div>
	    </div>

	<?php } ?>

</div>
