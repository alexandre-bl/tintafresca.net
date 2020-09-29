<?php

/*

Copyright (C) 2020 Mário Américo Gaspar Lopes

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

/*
function install_forms() {
	global $wpdb;
	$table_name = $wpdb->prefix . "forms"; 
	$charset_collate = $wpdb->get_charset_collate();
	$sql = 
	"CREATE TABLE $table_name (
			int n_opts,
			text names,
			text votes
		) $charset_collate;";
	$wpdb->insert( 
		$table_name, 
		array( 
			'n_opts' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	); 
}
register_activation_hook( __FILE__, 'install_forms' );
*/