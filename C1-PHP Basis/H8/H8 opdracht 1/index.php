<?php
class Radioprogramma {
    private $programmanaam = "Pilk 3";
    private $omschrijving = "Episch programma over epische liedjes";
    private $liedjes = array("wow","epic");
	public function getLiedjes(){
        return $this->liedjes;
    }
	
}