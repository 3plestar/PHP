<?php 
//this is the admin only page
session_start();
?>
<html>
   <body>
    <?php if($_SESSION['role']=="Admin"){ ?>
      <iframe width="640" height="360"
        src="https://www.youtube.com/embed/YJRnUyW-CfE?&autoplay=1" allow="autoplay" frameborder="0" allowfullscreen></iframe>
        <br><br>
        <a href="index.php"><button>Back to home</button></a>
      </iframe>
      <?php } else if($_SESSION['role']=="User"){ ?>
         <div>You do not have the neccesary permissions to see the contents of this page</div>
         <a href="index.php"><button>Back to home</button></a>
      <?php } else{
          header("Location: inlog.php");
          exit();
      }?>
    </body>
</html>
