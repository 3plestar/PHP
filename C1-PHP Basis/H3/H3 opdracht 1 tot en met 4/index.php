<?php
// tussen opdrachten een enter
$enter = "<br><br>";

//opdracht 1 a
for($images = 1; $images <= 10; $images++) {
    $randomAap = round(rand(1, 9));
	echo "<img src='apen/aap".$randomAap.".jpg'>";
}

echo $enter;

//opdracht 1 b
$bomen = array("bomen/img_0050.jpg","bomen/lillypilly1.jpg","bomen/Maranchery_Biyyam_Kayal_kandal.jpg","bomen/weeping-elm.jpg","bomen/weeping-elm0091.jpg");
for($images = 0; $images < 5; $images++) {
	echo "<img src='".$bomen[$images]."'>";
}

echo $enter;

//opdracht 2
for ($i=1; $i<10; $i++) { 
    echo "<p style='text-align: center; margin: 0px'>";
	for($j=0; $j<$i; $j++) {
		echo "*";		
	}	  
}
echo "</p>";

echo $enter;

//opdracht 3
for($x = 35; $x >= 25; $x--) {
echo "hoppelepee";
}

echo $enter;

//opdracht 4
echo "<div style='text-align: center'>";
for($images = 1; $images < 10; $images++) {
    echo "<img src='apen/aap".$images.".jpg' style='width:17%; border:4px solid ";
    if($images%2==0){
       echo "red'>";
    } else{
       echo "green'>";
    }
	
}
echo "</div>";