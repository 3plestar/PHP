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

        $sth = $GLOBALS['dbh']->prepare("INSERT IGNORE INTO $table ( meel, vorm, gewicht) VALUES
        (?,?,?)");
        $sth->execute(array($meel,$vorm,$gewicht));

      }

      function veranderBrood($broodnummer,$meel,$vorm,$gewicht){
        global $table;

        $sth = $GLOBALS['dbh']->prepare(" UPDATE $table SET
        meel = ?, vorm = ?, gewicht = ?
        WHERE broodnummer = ?
         ");
        $sth->execute(array($meel,$vorm,$gewicht,$broodnummer));
      }

      function getBroodList(){
        return $this->broodjes;
      }  
  }