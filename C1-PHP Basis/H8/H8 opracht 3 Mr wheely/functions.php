<?php
  class Auto{
    private $merk;
    private $type;
    private $prijs;
    private $url;
  
    function __construct($merk,$type,$prijs,$url){
      $this->merk = $merk;
      $this->type = $type;
      $this->prijs = $prijs;
      $this->url = $url;
    }
  
    function getMerk(){
      return $this->merk;
    }
  
    function getType(){
      return $this->type;
    }
  
    function getPrijs(){
      return $this->prijs;
    }

    function getUrl(){
      return $this->url;
    }
  }
  

  class Autooverzicht{
      private $autoos;

      function __construct(){
          $this->autoos= [
              new Auto("Toyota","Corolla AE86 Trueno",29900,"trueno.jpeg"),
              new Auto("Toyota","Corolla AE86 Levin",28800,"levin.jpeg"),
              new Auto("Skoda","Fabia",23000,"fabia.jpg"),
              new Auto("Ferrari","F12",40200,"f12.jpeg"),
              new Auto("Ford","Focus",10200,"focus.jpeg"),
              new Auto("Reliant","Robin",10,"robin.jpeg")
          ];
      }

      function voegAutoToe($merk,$type,$prijs,$url){
        $newAuto = new Auto($merk,$type,$prijs,$url);
        $this->autoos[] = $newAuto;
      }

      function getAutoList(){
        return $this->autoos;
      }  

      function getFilteredList($minprijs,$maxprijs,$merk){
        $filteredList = [];
        foreach($this->autoos as $auto){
            if($auto->getPrijs() > $minprijs && $auto->getPrijs() < $maxprijs && ($merk == $auto->getMerk() || $merk == 'unset')){
                $filteredList[] = $auto;
            }
        }
        return $filteredList;
      } 
  }