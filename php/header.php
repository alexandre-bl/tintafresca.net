<?php

$logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $logo_id , 'full' );

?>

<div id="header">

    <img id="logo" href="<?php echo $logo; ?>">
    <div class="add"></div>

</div>