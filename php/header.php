<?php

$logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $logo_id , 'full' )[0];

global $wpdb;
$table_name = "adds";
$table_name = $wpdb->prefix . $table_name;
$charset_collate = $wpdb->get_charset_collate();
require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta(" CREATE TABLE IF NOT EXISTS $table_name ( img TEXT, link TEXT ) $charset_collate; ");

$add = array( 
    "img" => $wpdb->get_results(" SELECT * FROM $table_name ")[0]->img or "",
    "url" => $wpdb->get_results(" SELECT * FROM $table_name ")[0]->link or ""
);

?>

<div id="header">

    <a href="<?php echo get_site_url(); ?>"><img id="logo" src="<?php echo $logo; ?>"></a>
    <a class="add" href="<?php echo $add["url"]; ?>"> <img src="<?php echo $add["img"]; ?>"> </a>

</div>