<?php

global $wpdb;
$table_name = "adds";
$table_name = $wpdb->prefix . $table_name;
$charset_collate = $wpdb->get_charset_collate();
require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta(" CREATE TABLE IF NOT EXISTS $table_name ( img TEXT, link TEXT ) $charset_collate; ");

$add = array( 
    "img" => $wpdb->get_results(" SELECT * FROM $table_name ")[1]->img,
    "url" => $wpdb->get_results(" SELECT * FROM $table_name ")[1]->link
);

?>

<div id="right_bar">
    
    <a class="add" href="<?php echo $add["url"]; ?>"> <img src="<?php echo $add["img"]; ?>"> </a>

</div>