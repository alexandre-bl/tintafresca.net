<?php

function create_database($name, $columns) {

    global $wpdb;
    $name = $wpdb->prefix . $name;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $name ( $columns ) $charset_collate ; ";

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);

}

?>