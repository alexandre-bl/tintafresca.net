<!DOCTYPE html>
<html>
 
    <head>

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