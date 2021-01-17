<?php

global $wpdb;
$table_name = "adds";
$table_name = $wpdb->prefix . $table_name;
$charset_collate = $wpdb->get_charset_collate();
require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta(" CREATE TABLE IF NOT EXISTS $table_name ( img TEXT, link TEXT ) $charset_collate; ");

$query = $wpdb->get_results(" SELECT * FROM $table_name ");

$add = array( "img" => "", "url" => "" );

if( !empty( $query[2] ) ) { $add["img"]  = $query[2]->img;
                            $add["link"] = $query[2]->link; }

?>

<div id="right_bar">
    
    <a class="add" href="<?php echo $add["url"]; ?>"> <img src="<?php echo $add["img"]; ?>"> </a>

    <?php if( !is_singular() or !empty($_GET["category"]) ) { ?>

        <div id="opinion"> <?php

            require_once __DIR__ . "/../handy.php";

            $opinion = get_posts( array(
                'numberposts' => 5,
                "category" =>  get_cat_ID("Opinião")
            )
            );
            
            for( $i = 0; $i < 5; $i += 1 ) {

                if( empty( $opinion[$i] ) ) {

                    $opinion[$i] = null;

                } else {

                    echo "<div class='post'>". get_post_content($opinion[$i], FALSE, TRUE) ."</div>";
        
                }

            }

        ?> </div>

    <?php } ?>

</div>