<?php
class Brood{
    private $meel;
    private $vorm;
    private $gewicht;
  
    function __construct($meel,$vorm,$gewicht){
      $this->meel = $meel;
      $this->vorm = $vorm;
      $this->gewicht = $gewicht;
    }
  
    function getMeel(){
      return $this->meel;
    }
  
    function getVorm(){
      return $this->vorm;
    }
  
    function getGewicht(){
      return $this->gewicht;
    }
  }

class Broodoverzicht{
      private $broodjes;

      function __construct(){
          $this->broodjes= [
              new Brood("Tarwe","vierkant",5)
          ];
      }

      function voegBroodToe($meel,$vorm,$gewicht){
        $newBrood = new Brood($meel,$vorm,$gewicht);
        $this->broodjes[] = $newBrood;
      }

      function getBroodList(){
        return $this->broodjes;
      }  
  }