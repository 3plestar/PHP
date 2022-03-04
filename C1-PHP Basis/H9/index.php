<?php
require("functions.php");

$broodjes = new Broodoverzicht();
?>
<html>
    <body>
        <div>
           <h3>voeg brood toe</h3>
           <form action="">
                <label for="meel">Soort meel:</label><br>
                <input type="text" id="meel" name="meel" value=""><br>
                <label for="meel">Vorm:</label><br>
                <input type="text" id="vorm" name="vorm" value=""><br>
                <label for="meel">Gewicht in gram:</label><br>
                <input type="text" id="gewicht" name="gewicht" value=""><br><br>
                <input type="submit" value="submit">
           </form>
        </div>
        <br>
        <div>
          <?php
            foreach($broodjes->getBroodList() as $brood){
                echo "<div>".$brood->getMeel()." ".$brood->getVorm()."</div>";
                echo "<div>".$brood->getGewicht()." gram</div>";
            }
          ?>
        </div>
    </body>
</html>