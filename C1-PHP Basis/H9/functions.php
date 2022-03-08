<?php
include("config.php");



class Brood{
    private $broodnummer;
    private $meel;
    private $vorm;
    private $gewicht;
  
    function __construct($broodnummer,$meel,$vorm,$gewicht){
      $this->broodnummer = $broodnummer;
      $this->meel = $meel;
      $this->vorm = $vorm;
      $this->gewicht = $gewicht;
      
    }

    function getNummer(){
        return $this->broodnummer;
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
        global $table;
        $result = $GLOBALS['dbh']->query("SELECT * FROM $table");

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $newBrood =  new Brood($row ["broodnummer"],$row["meel"],$row["vorm"],$row["gewicht"]); 
            
            $this->broodjes[] = $newBrood;
        }
        
      }

      function voegBroodToe($meel,$vorm,$gewicht){
        global $table;
        
        $result = $GLOBALS['dbh']->query("SELECT MAX(broodnummer)+1 as newnummer FROM $table");
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
           $newnumber= $row ["newnummer"];   
        }
        
        $query = $GLOBALS['dbh']->prepare("INSERT IGNORE INTO $table (broodnummer, meel, vorm, gewicht) VALUES
          ($newnumber,'$meel','$vorm',$gewicht)");
          
          $query->execute();
      }

      function getBroodList(){
        return $this->broodjes;
      }  
  }