<?php
include('config.php');

$dbh = new mysqli($host, $username, $password, $db);
if ($dbh->connect_error) {
    die("Connection failed: " . $dbh->connect_error);
}

//create de table die mij niet was gegeven
$sql = "CREATE TABLE IF NOT EXISTS $table (
  email varchar(25),
  wachtwoord varchar(25),
  primary key(email)
  ) engine = innodb;";

  if ($dbh->query($sql) === TRUE) {
    echo "<script>console.log('Table $table created successfully');</script>";
  } else {
    echo $dbh->error;
  }

$sql = "INSERT INTO $table (email, wachtwoord) VALUES
('piet@worldonline.nl', 'doetje123'),
('klaas@carpets.nl', 'snoepje777'),
('truushendriks@wegweg.nl', 'arkiearkie201')";

if ($dbh->query($sql) === TRUE) {
  echo "<script>console.log('Successfully inserted into $table');</script>";
} else {
  echo '<script>console.log("'.$dbh->error.'");</script>';
}


//back to regularly scheduled programming?>

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
      $username = $_POST['email'];
      $password = $_POST['wachtwoord']; 
      
      $sql = "SELECT email FROM $table WHERE email = '$username' and wachtwoord = '$password'";
      $result = mysqli_query($dbh,$sql);
      
      $count = mysqli_num_rows($result);

      if($count == 1){
        echo "welkom";
      } else{
        echo "sorry, geen toegang";
      }
  }
  ?>
</body>
</html>