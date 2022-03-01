<?php 
include "aapOverzicht.php";

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
  <body>
      <img src="img/monkey-business.jpg" alt="">
      <H1 class="topText">Select your monkey!</H1>
      <img src="img/monkey_swings.png" alt="">
    <?php 
        foreach($apen as $aap){
            echo "<a href='https://www.google.nl/search?q=".$aap."&tbm=isch' class='aapLink'>".$aap."</a>";
        }
    ?>
  </body>
</html>

