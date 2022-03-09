<?php
if (!isset($_SESSION)) {
    session_start();
}

include("config.php");
require("functions.php");

$broodjes = new Broodoverzicht();

if (isset($_POST['idValue'])) {
    $_SESSION['broodnummer'] = $_POST['idValue'];
}

foreach($broodjes->getBroodList() as $brood){
    if ($_SESSION['broodnummer'] == $brood->getNummer()){
      $oudmeel = $brood->getMeel();
      $oudvorm = $brood->getVorm();
      $oudgewicht = $brood->getGewicht();
    }
}
?>
<html>
    <body>
    <h3>verander brood</h3>
        <form method="POST">
             <label>Soort meel:</label><br>
             <input type="text" id="newmeel" name="newmeel" value="<?php echo $oudmeel ?>"><br>
             <label>Vorm:</label><br>
             <input type="text" id="newvorm" name="newvorm" value="<?php echo $oudvorm ?>"><br>
             <label>Gewicht in gram:</label><br>
             <input type="text" id="newgewicht" name="newgewicht" value="<?php echo $oudgewicht ?>"><br><br>
             <input type="submit" value="submit" name="submit">
        </form>
        <form method="POST">
            <input type="submit" value="delete" name="delete">
        </form>
    </body>
</html>
<?php

if(isset($_POST['submit'])) {
    $broodjes->veranderBrood($_SESSION['broodnummer'],$_POST["newmeel"],$_POST["newvorm"],(float)$_POST["newgewicht"]); 
    
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: index.php");
    exit;
 }

 if(isset($_POST['delete'])) {
    $broodjes->deleteBrood($_SESSION['broodnummer']);

    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: index.php");
    exit;
 }