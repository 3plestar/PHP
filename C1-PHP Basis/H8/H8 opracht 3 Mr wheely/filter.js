let filter = document.getElementById('submitFilter');

let minSlider = document.getElementById('min');
let maxSlider = document.getElementById('max');

let outputMin = document.getElementById('min-value');
let outputMax = document.getElementById('max-value');

let e = document.getElementById('merkselect');


outputMin.innerHTML = minSlider.value;
outputMax.innerHTML = maxSlider.value;

let priceGap = 1000;

//code om de sliders te laten werken
minSlider.oninput = function(){
    if((maxSlider.value - this.value) < priceGap){
      minSlider.value = parseInt(maxSlider.value) - priceGap;
    }
    outputMin.innerHTML=this.value;
}

maxSlider.oninput = function(){
    if((this.value - minSlider.value) < priceGap){
      maxSlider.value = parseInt(minSlider.value) + priceGap;
    }
    outputMax.innerHTML=this.value;
}

//de submit knop
filter.onclick = function(){
  let merk = e.options[e.selectedIndex].value;
  if(merk != "kies"){
    window.location.href="index.php?minprijs="+minSlider.value+"&maxprijs="+maxSlider.value+"&merk="+merk;
  } else{
    window.location.href="index.php?minprijs="+minSlider.value+"&maxprijs="+maxSlider.value;
  }
}