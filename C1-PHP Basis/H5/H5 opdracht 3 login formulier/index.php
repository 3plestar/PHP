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
      $mail = $_POST['email'];
      $password = $_POST['wachtwoord'];
			if(($mail == "piet@worldonline.nl" && $password == "doetje123")||($mail == "klaas@carpets.nl" && $password == "snoepje777")||($mail == "truushendriks@wegweg.nl" && $password == "arkiearkie201")){?>
        Welkom
      <?php } else{
        echo "Sorry, geen toegang!";
      }
		}
    ?>
  </body>
</html>