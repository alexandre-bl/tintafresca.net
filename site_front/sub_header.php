<?php

require_once __DIR__ . "/../handy.php";

$editor  = get_users( [ 'role__in' => [ 'editor' ] ] )[0]->display_name;
$date    = getdate();
$edition = get_edition();
$date    = $date["mday"] . "/" . $date["mon"] . "/" . $date["year"];

?> 

<div id="sub-header">

    <p id="edition"> Edição: <?php echo $edition;   ?></p>
    <p id="editor">  Editor: <?php echo $editor;    ?></p>
    <p id="date">    Data:   <?php echo $date;      ?></p> 

</div>