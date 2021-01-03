<?php

$edition = 123;
$editor  = "Mario Lopes";
$date    =  get_date();
$date    =  get_date()["mday"] . "/" . get_date()["month"] . "/" . get_date()["year"];

?>

<div id="sub-header">

    <p id="edition"><?php echo $edition; ?></p>
    <p id="editor"><?php echo $editor; ?></p>
    <p id="date"><?php echo $date; ?></p>

</div>