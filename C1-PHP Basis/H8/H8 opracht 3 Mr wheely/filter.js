let filter = document.getElementById('submitFilter');

let minSlider = document.getElementById('min');
let maxSlider = document.getElementById('max');

let outputMin = document.getElementById('min-value');
let outputMax = document.getElementById('max-value');

let merk = document.getElementById('merkselect');

outputMin.innerHTML = "€"+ minSlider.value;
outputMax.innerHTML = "€"+maxSlider.value;

let priceGap = 4000;

//code om de sliders te laten werken
minSlider.oninput = function(){
    if((maxSlider.value - minSlider.value) < priceGap){
      minSlider.value = parseInt(maxSlider.value) - priceGap; 
    }
    outputMin.innerHTML="€"+minSlider.value;
}

maxSlider.oninput = function(){
    if((maxSlider.value - minSlider.value) < priceGap){
      maxSlider.value = parseInt(minSlider.value) + priceGap; 
    }
    outputMax.innerHTML="€"+maxSlider.value;
}

//de submit knop
filter.onclick = function(){
  let selectedmerk = merk.options[merk.selectedIndex].value;
  if(selectedmerk != "kies"){
    window.location.href="index.php?minprijs="+minSlider.value+"&maxprijs="+maxSlider.value+"&merk="+selectedmerk;
  } else{
    window.location.href="index.php?minprijs="+minSlider.value+"&maxprijs="+maxSlider.value;
  }
}