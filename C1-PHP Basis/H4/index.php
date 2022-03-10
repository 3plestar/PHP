<?php
//Schrijf een functie die als argument een waarde in Celsius accepteert en de temperatuur in Fahrenheit weergeeft.
function cToF($celcius) {
    $fahrenheit = $celcius*1.8000+32.00;
    echo $fahrenheit;
}

//Schrijf een functie die bepaalt of een getal deelbaar is door 3. De functie accepteert een getal als argument en als retour-waarde wordt een boolean teruggegeven.
function deelbaarDoorDrie($getal) {
    if($getal%3==0){
      return true;
    } else{
      return false; 
    }   
}

//Schrijf een functie die een string accepteert als argument en als return-waarde een string geeft met de letters in omgekeerde volgorde.
function reverseString($string){
    return strrev ($string);
}