<?php

$edition = 123;
$editor  = "Mario Lopes";
$date    =  getdate();
$date    =  $date["mday"] . "/" . $date()["month"] . "/" . $date()["year"];

?>

<div id="sub-header">

    <p id="edition"><?php echo $edition; ?></p>
    <p id="editor"><?php echo $editor; ?></p>
    <p id="date"><?php echo $date; ?></p>

</div>