<?php

$editor  = "Mario Lopes";
$date    = getdate();
$edition = $date["year"]*12 + $date["mon"] - 24011;
$date    = $date["mday"] . "/" . $date["mon"] . "/" . $date["year"];

?>

<div id="sub-header">

    <p id="edition"><?php echo $edition; ?></p>
    <p id="editor"><?php echo $editor; ?></p>
    <p id="date"><?php echo $date; ?></p> 

</div>