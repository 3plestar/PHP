<?php
require("functions.php");

$autoos = new Autooverzicht();

foreach ($autoos->getAutoList() as $auto){
    echo '<img src="'.$auto->getUrl().'">';
    echo "<div>€".$auto->getPrijs()."</div>";
    echo "<div>".$auto->getMerk()." ".$auto->getType()."</div><br>";
}
?>
