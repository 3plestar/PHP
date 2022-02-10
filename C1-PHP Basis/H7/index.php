<?php
include('config.php');
?>

<html>
   <body>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         Email <input type="text" name="email" value="" required>
         Wachtwoord <input type="password" name="wachtwoord" value="" required>
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
    session_start();
    $_SESSION['username'] = $row['username'];
    
    if($row['admin']==1){
      $_SESSION['role']="admin";
    }else{
      $_SESSION['role']="user"; 
    }
  } else{
    echo "sorry, geen toegang";
  }
}?>