<?php
if (!isset($_SESSION)) {
    session_start();
}

include("config.php");
require("functions.php");

$broodjes = new Broodoverzicht();
?>
<html>
    <body>
        <div>
           <h3>voeg brood toe</h3>
           <form method="POST">
                <label>Soort meel:</label><br>
                <input type="text" id="meel" name="meel" value=""><br>
                <label>Vorm:</label><br>
                <input type="text" id="vorm" name="vorm" value=""><br>
                <label>Gewicht in gram:</label><br>
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
                
                echo "<form action='edit.php' method='POST''>";
                echo "<input type='submit' name='edit' value='Edit'>";
                echo "</submit><input type='number' name='idValue' value='".$brood->getNummer()."' style='visibility:hidden;'></input>";
                echo "</form>";
            }
          ?>
        </div>
    </body>
</html>
<?php
if(isset($_POST['meel'])) {
   $broodjes->voegBroodToe($_POST["meel"],$_POST["vorm"],(float)$_POST["gewicht"]); 
   
   $_SESSION['postdata'] = $_POST;
   unset($_POST);
   header("Location: ".$_SERVER['PHP_SELF']);
   exit;
}
