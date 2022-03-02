<?php
require("functions.php");

$autoos = new Autooverzicht();

$filterminprijs = isset($_GET['minprijs']) && !empty($_GET['minprijs']) ? $_GET['minprijs'] : 0;
$filtermaxprijs = isset($_GET['maxprijs']) && !empty($_GET['maxprijs']) ? $_GET['maxprijs'] : 99999;
$filtermerk = isset($_GET['merk']) && !empty($_GET['merk']) ? $_GET['merk'] : 'unset';
foreach ($autoos->getAutoList() as $auto){
   $merkList[]= $auto->getMerk();
   sort($merkList);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="sliderStyle.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="filterContainer">
            <div>Merk:</div>
            <select name="selectEenMerk" id="merkselect">
                <option value="kies">Alle merken</option>
                <?php
                    foreach(array_unique($merkList) as $merk){
                      echo '<option ';
                      if($_GET["merk"] == $merk){
                         echo 'selected="true"'; //keep selected merk upon filtering
                      }
                      echo' value="'.$merk.'">'.$merk.'</option>';
                    }
                ?>
            </select><br><br>
            
            <div>Prijs:</div>
            <div class="sliderValues">
                <span id="min-value"></span>
                <label>-</label>
                <span id="max-value"></span>  
            </div> 
                
            <div class="price-range">
                <input type="range" min="0" max="50000" step="100" value="<?php echo $filterminprijs ?>" class="slider" id="min">
                <input type="range" min="0" max="50000" step="100" value="<?php echo $filtermaxprijs ?>" class="slider" id="max">      
            </div>    
    
            <input type="button" value="submit" id="submitFilter">
        </div>  
        <div class="carContainer">
            <?php
            foreach ($autoos->getFilteredList($filterminprijs,$filtermaxprijs,$filtermerk) as $auto){
                echo "<div class='carItem'>";
                echo '<img src="img/'.$auto->getUrl().'" class="carImg">';
                echo "<div>".$auto->getMerk()." ".$auto->getType()."</div>";
                echo "<div>€".$auto->getPrijs()."</div><br>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
    <script src="filter.js"></script>
</html>