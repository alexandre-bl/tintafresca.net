<?php

    $title = get_bloginfo( 'name' );
    $meta_img = get_site_icon_url();
    if( is_single() ) {
        if( !empty(wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]) ) {
            $meta_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
        }
    }
    $desc = get_bloginfo( 'description' );
    $meta_desc = get_post_meta( get_post()->ID, "Description", TRUE );

    if( is_singular() ) {

        $title = get_the_title();

        if( !empty( $meta_desc ) ) {

            $desc = $meta_desc;

        }

    }

?>

<!DOCTYPE html>
<html>
 
    <head>

        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $desc; ?>">
        <meta name="og:image" content="<?php echo $meta_img; ?>">
        <link rel="icon" href="<?php echo get_site_icon_url(); ?>">

        <?php
            echo "<link rel='stylesheet' href='";
            echo get_template_directory_uri();

            if( wp_is_mobile() ) { 
                echo "/mobile.css";
            } else {
                echo "/style.css";
            }
            
            echo "'>";
        ?>

        <meta charset="utf-8">

        <!-- Makes it so some CSS features I need that aren't on IE work on IE -->
        <script>window.MSInputMethodContext && document.documentMode && document.write('<script src="https://cdn.jsdelivr.net/gh/nuxodin/ie11CustomProperties@4.1.0/ie11CustomProperties.min.js"><\/script>');</script>

    </head>

    <body> 
    
        <?php
            
            require_once "site_front/header.php"; 
            require_once "site_front/sub_header.php";
            require_once "site_front/left_bar.php";
            require_once "site_front/right_bar.php";
            require_once "site_front/center.php";

        ?>

        <script src="<?php echo get_template_directory_uri()."/style.js"; ?>"></script>

    </body>

</html>
