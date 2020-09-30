<?php

global $wpdb;

$add_table = $wpdb->prefix . "adds";
$charset_collate = $wpdb->get_charset_collate();
$sql = 
"CREATE TABLE IF NOT EXISTS $add_table (
        id TEXT,
        img TEXT,
        link TEXT
        ) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

$request = $wpdb->get_results ( "SELECT * FROM $add_table" );
$add_js = "<script>

adds(
    '',
    '',
    ''
);

</script>";
