<?php
class Radioprogramma {
    private $programmanaam = "programmanaam";
    private $omschrijving = "een omschrijving die onschrijft wat het programma doet en zo";
    private $liedjes = array("song one","song two","song three");
	public function getLiedjes(){
        return $this->liedjes;
    }
	public function getProgramma(){
        return array($this->programmanaam, $this->omschrijving);
    }
}
$radioprogramma = new Radioprogramma();
?>
<html>
    <body>
        <?php 
        foreach($radioprogramma->getProgramma() as $programma){
            echo "<h1>".$programma."</h1>";
        }
        ?>
        <?php 
        foreach($radioprogramma->getLiedjes() as $liedje){
            echo "<div>".$liedje."</div>";
        }
        ?>
    </body>
</html>