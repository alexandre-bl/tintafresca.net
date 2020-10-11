<?php

function create_table($name, $columns) {

    global $wpdb;
    $name = $wpdb->prefix . $name;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $name ( $columns ) $charset_collate ; ";

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);

}

function get_table($name, $row=null, $line=null) {

    global $wpdb;
    $name = $wpdb->prefix . $name;

    $o = $wpdb->get_results( "SELECT * FROM $name" );

    return $o;

}

function set_table($value, $name, $row=null, $line=null) {

}

?>