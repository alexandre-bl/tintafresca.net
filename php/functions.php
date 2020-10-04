<?php

function create_database($name, $columns) {

    global $wpdb;
    $name = $wpdb->prefix . $name;

    $columns_str = "";
    foreach( $columns as $column ) { $columns_str .= "$column,"; }

    $sql = "CREATE TABLE IF NOT EXISTS $name ( $columns_str ) ; ";

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);

}

?>