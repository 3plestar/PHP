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
                echo "<button class='change' id='".$brood->getNummer()."'>verander</button>";
            }
          ?>
        </div>
        <form method="POST">
             <label>Soort meel:</label><br>
             <input type="text" id="newmeel" name="newmeel" value=""><br>
             <label>Vorm:</label><br>
             <input type="text" id="newvorm" name="newvorm" value=""><br>
             <label>Gewicht in gram:</label><br>
             <input type="text" id="newgewicht" name="newgewicht" value=""><br><br>
             <input type="submit" value="submit">
        </form>
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