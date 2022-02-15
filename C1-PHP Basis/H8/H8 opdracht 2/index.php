<?php 
include "aapOverzicht.php";

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
  <body>
      <H1 class="topText">Select your monkey!</H1>
    <?php 
        foreach($apen as $aap){
            echo "<a href='https://www.google.nl/search?q=".$aap."&tbm=isch' class='aapLink'>".$aap."</a>";
        }
    ?>
  </body>
</html>

