<?php

require_once get_template_directory()."/php/helpers.php";

set_table("test", "adds", "img", 1);
print_r(get_table("adds"));

$logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $logo_id , 'full' )[0];

$add = "";

create_table("adds", "img TEXT, url TEXT");

?>

<div id="header">

    <img id="logo" src="<?php echo $logo; ?>">
    <div class="add"><img src="<?php echo $add; ?>"></div>

</div>