<?php
session_start();
include('config.php');
?>

<html>
   <body>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         Email <input type="text" name="email" value="" required>
         Password <input type="password" name="wachtwoord" value="" required>
         <input type="submit" name="knop" value="Submit">
       </form>
   </body>
</html>
<?php 
if(isset($_POST['knop'])) {
  $query = $dbh->prepare("SELECT * FROM $table WHERE email = :email and password = :password");
  $query->execute([ ":email" => $_POST["email"],":password" => $_POST["wachtwoord"] ]);

  $row = $query->fetch(PDO::FETCH_ASSOC);

  if($query->rowCount() > 0){
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['email']=$row['email'];

    if($row['admin']==1){
      $_SESSION['role']="Admin";
    }else{
      $_SESSION['role']="User"; 
    }
    
    header("Location: index.php");
    exit();
  } else{
    echo "Sorry, your login information was incorrect.";
  }
}?>