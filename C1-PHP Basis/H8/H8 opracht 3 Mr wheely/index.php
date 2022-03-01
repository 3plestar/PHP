<?php
require("functions.php");

$autoos = new Autooverzicht();

$filterminprijs = isset($_GET['minprijs']) && !empty($_GET['minprijs']) ? $_GET['minprijs'] : 0;
$filtermaxprijs = isset($_GET['maxprijs']) && !empty($_GET['maxprijs']) ? $_GET['maxprijs'] : 99999;
?>
<html>
<div class="min-max">
  <div class="min">
     <label>Min</label><span id="min-value"></span>
  </div>
  <div class="max">
      <label>Max</label><span id="max-value"></span>
  </div>     
</div> 
    
<div class="min-max-range">
  <input type="range" min="0" max="50000" step="100" value="<?php echo $filterminprijs ?>" class="range" id="min">
  <input type="range" min="0" max="50000" step="100" value="<?php echo $filtermaxprijs ?>" class="range" id="max"> 
  <input type="button" value="submit" id="submitFilter">     
</div>    
    
<div style="clear: both;"></div>    
</div> 
<script src="slider.js"></script>
<?php
foreach ($autoos->getFilteredList($filterminprijs,$filtermaxprijs) as $auto){
    echo '<img src="'.$auto->getUrl().'">';
    echo "<div>€".$auto->getPrijs()."</div>";
    echo "<div>".$auto->getMerk()." ".$auto->getType()."</div><br>";
}
?>
</html>