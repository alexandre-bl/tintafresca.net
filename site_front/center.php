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

			$posts = get_posts( array(
				'numberposts' => -1 
				)
			);
			
			$posts_markup = array(  "st"    => get_post_content($posts[0]),
									"nd"    => get_post_content($posts[1]),
									"trd"   => get_post_content($posts[2]),
									"left"  => "",
									"right" => ""
								);

			if( empty( $_GET["category"] ) ) {

				for( $i = 3; $i < count($posts); $i += 1 ) {
				
					if( !in_array( $posts[$i], $opinion ) ) {
				
						$thumbnail = "<div class='post'>". get_post_content($posts[$i]) ."</div>";
				
						if( ( $i ) % 2 == 0 ) {
				
							$posts_markup["left"] .= $thumbnail;
				
						} else {
				
							$posts_markup["right"] .= $thumbnail;
				
						}
				
					}
				
				}	

				if( !empty( $posts_markup["st"] ) ) { ?>
					
					<div class="post main" id="st_post">

						<?php echo $posts_markup["st"]; ?>

					</div> 
					
				<?php }
					
				if( !empty( $posts_markup["nd"] ) ) { ?>
					
					<div class="post main" id="nd_post">

						<?php echo $posts_markup["nd"]; ?>

					</div> 
					
				<?php }

				if( !empty( $posts_markup["trd"] ) ) { ?>
					
					<div class="post main" id="trd_post">

						<?php echo $posts_markup["trd"]; ?>

					</div> 
					
				<?php }

			} else {

				$posts = get_posts( array(
					'numberposts' => -1,
					'category'	  => get_cat_ID( $_GET["category"] )
					)
				);

				for( $i = 0; $i < count($posts); $i += 1 ) {
				
					$thumbnail = "<div class='post'>". get_post_content($posts[$i]) ."</div>";
			
					if( ( $i ) % 2 == 0 ) {
			
						$posts_markup["left"] .= $thumbnail;
			
					} else {
			
						$posts_markup["right"] .= $thumbnail;
			
					}
				
				}
				
			} ?>

			<div id="sec_posts"
			
				<?php if( !empty( $_GET["category"] ) ) { echo "class='category'"; } ?>
			
			>
				<div id="left_posts">
					<?php echo $posts_markup["left"]; ?>
				</div>
				<div id="right_posts">
					<?php echo $posts_markup["right"]; ?>
				</div>
			</div>

		<?php } ?>

</div>