<?php

function create_table($name, $columns) {

    global $wpdb;
    $name = $wpdb->prefix . $name;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $name ( $columns ) $charset_collate ; ";

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);

}

function get_table($name, $column=null, $row=null) {

    global $wpdb;
    $name = $wpdb->prefix . $name;

    $o = $wpdb->get_results( "SELECT img FROM $name" );

    return $o;

}

function set_table($value, $name, $column, $row) {

    global $wpdb;
    $name = $wpdb->prefix . $name;

    $row_data = $wpdb->get_results("SELECT * from $name WHERE ID=$row");
    $row_data[$column] = $value;

    $wpdb->update( $name, $row_data, "ID=$row");

}

?>