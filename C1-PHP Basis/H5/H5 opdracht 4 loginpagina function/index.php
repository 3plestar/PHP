<html>
  <body>
    <?php if(!isset($_POST['knop'])) { ?>
	    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Email <input type="text" name="email" value="" required>
        Wachtwoord <input type="password" name="wachtwoord" value="" required>
        <input type="submit" name="knop" value="Submit">
      </form>
    <?php 
		} else{
      function entryFields($mail, $password){
        if(($mail == "piet@worldonline.nl" && $password == "doetje123")||($mail == "klaas@carpets.nl" && $password == "snoepje777")||($mail == "truushendriks@wegweg.nl" && $password == "arkiearkie201")){
          return true;
         } else{
          return false;
        }
      }
		}
    if (entryFields($_POST['email'],$_POST['wachtwoord'])){
      echo "welkom";
    } else{
      echo "sorry, geen toegang";
    }
    ?>
  </body>
</html>