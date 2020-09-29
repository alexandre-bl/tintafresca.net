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

add_action('admin_menu', 'adds');

function adds() {

	$titulo = "Anúncios";

    add_menu_page(
        $titulo,
        $titulo,
        "manage_options",
        strtolower($titulo),
        "add_content",
        "",
        6
    );

}

function add_content() {

    $dir = dirname(__FILE__).'/imgs/';
    $indexs = [
        "top_add",
        "left_add",
        "right_add"
    ];

    $i = 0;

    $adds = [];

    foreach( $indexs as $index ) {

        $i += 1;

        if(!empty($_FILES[$index]["name"])) {
        
            $img_path = $dir.basename($_FILES[$index]["name"]);

            move_uploaded_file( $_FILES[$index]["tmp_name"], $img_path );

            $wpdb->insert( 
                $add_table, 
                array( 
                    $index => "'".get_home_url().str_replace('\\', '/', str_replace(str_replace("\\", "/", ABSPATH), "/", $adds[$i])."',")
                ) 
            );

        }

    }

	?>

        <div class="wrap">

	 	    <h1 class="wp-heading-inline"> Anúncios </h1>

            <form action="#" method="post" enctype="multipart/form-data">

                <br>
                <label for="top_add">Topo_____</label>
                <input name="top_add" type="file">

                <br>
                <label for="left_add">Esquerda_</label>
                <input name="left_add" type="file">

                <br>
                <label for="right_add">Direita____</label>
                <input name="right_add" type="file">

                <br><br>
                <input type="submit" value="Guardar">

            </form>

        </div>

	<?php
	 
}
