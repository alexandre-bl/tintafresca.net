<?php

$editor  = "Mario Lopes";
$date    = getdate();
$edition = 2022*12 + 1 - 24011; # 242
$date    = $date["mday"] . "/" . $date["mon"] . "/" . $date["year"];

?>

<div id="sub-header">

    <p id="edition"><?php echo $edition; ?></p>
    <p id="editor"><?php echo $editor; ?></p>
    <p id="date"><?php echo $date; ?></p> 

</div>