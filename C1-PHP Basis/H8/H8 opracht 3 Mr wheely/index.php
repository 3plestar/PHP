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
        <link rel="stylesheet" href="style.css">
    </head>
    <div class="min-max">
        <div class="min">
           <label>Min</label><span id="min-value"></span>
        </div>
        <div class="max">
            <label>Max</label><span id="max-value"></span>
        </div>     
    </div> 
        
    <div class="price-range">
        <input type="range" min="0" max="50000" step="100" value="<?php echo $filterminprijs ?>" class="slider" id="min">
        <input type="range" min="0" max="50000" step="100" value="<?php echo $filtermaxprijs ?>" class="slider" id="max">      
    </div>    

    <select name="selectEenMerk" id="merkselect">
        <option value="kies">Kies een merk</option>
        <?php
            foreach(array_unique($merkList) as $merk){
              echo '<option value="'.$merk.'">'.$merk.'</option>';
            }
        ?>
    </select>
    <br>
    <input type="button" value="submit" id="submitFilter">
    
    
    <div>
        <?php
        foreach ($autoos->getFilteredList($filterminprijs,$filtermaxprijs,$filtermerk) as $auto){
            echo '<img src="'.$auto->getUrl().'">';
            echo "<div>€".$auto->getPrijs()."</div>";
            echo "<div>".$auto->getMerk()." ".$auto->getType()."</div><br>";
        }
        ?>
    </div>

    <script src="filter.js"></script>
</html>