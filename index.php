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

        <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/style.css" ?>">
        <meta charset="utf-8">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-QRE6N0L516"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-QRE6N0L516');
        </script>

    </head>

    <body> <?php
            
        require_once "site_front/header.php"; 
        require_once "site_front/left_bar.php";
        require_once "site_front/right_bar.php";
        require_once "site_front/center.php";
            
    ?> </body>

</html>