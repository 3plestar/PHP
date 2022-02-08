<?php
$leeftijd =array(10,2,65,12);
$kosten = 10;
foreach ($leeftijd as $label => $waarde) {
    if($waarde < 3){
        echo $waarde." = 0";
        echo "<br>";
    } else if ($waarde > 65 || $waarde <= 12){
        echo $waarde." = ".$kosten/2;
        echo "<br>";
    } else {
        echo $waarde." = ".$kosten;
        echo "<br>";
    }
}