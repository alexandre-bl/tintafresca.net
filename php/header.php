<?php

$logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $logo_id , 'full' )[0];

global $wpdb;
$table_name = "adds";
$table_name = $wpdb->prefix . $table_name;
$charset_collate = $wpdb->get_charset_collate();
require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta(" CREATE TABLE IF NOT EXISTS $table_name ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT, url TEXT ) $charset_collate; ");

$add = array( 
    "img" => $wpdb->get_results(" SELECT `img` FROM $table_name WHERE `id` = 0; "),
    "url" => $wpdb->get_results(" SELECT `url` FROM $table_name WHERE `id` = 0; ")
);

?>

<div id="header">

    <!--<img id="logo" src="<?php //echo $logo; ?>">-->
    <div class="add"> <a href="<?php echo $add["url"]; ?>"> <img src="<?php echo $add["img"]; ?>"> </a> </div>

</div>