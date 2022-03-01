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
              new Auto("Toyota","Corolla AE86",29900," "),
              new Auto("Skoda","Fabia",23000," ")
          ];
      }

      function voegAutoToe($merk,$type,$prijs,$url){
        $newAuto = new Auto($merk,$type,$prijs,$url);
      }

      function getAutoList(){
          return $this->autoos;
      }  
  }
