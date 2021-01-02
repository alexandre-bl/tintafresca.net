<div id="center"

<?php

require_once __DIR__ . "/../handy.php";

if( is_singular() ) {

	echo ' class="singular">';

	echo get_post_content( get_post(), TRUE );

} else {

	echo ' class="not_singular">';

	$opinion = get_posts( array(
	    'numberposts' => 5,
	    "category" =>  get_cat_ID("Opinião")
	  )
    );

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
	
	    if( !in_array( $posts[$i], $destaques ) and
			!in_array( $posts[$i], $opinion ) ) {
	
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
