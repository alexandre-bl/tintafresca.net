<?php

    $title = get_bloginfo( 'name' );
    $desc = get_bloginfo( 'description' );
    $meta_desc = get_post_meta( get_post()->ID, "Description", TRUE );

    if( is_singular() ) {

        $title .= " - " . get_the_title();

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
        <link rel="icon" href="<?php echo get_site_icon_url(); ?>">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/style.css"; ?>">
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

            if( is_singular() ) {

                require_once "site_front/comments.php";
            
            }

        ?>

        <script src="<?php echo get_template_directory_uri()."/style.js"; ?>"></script>

    </body>

</html>
