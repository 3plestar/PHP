<?php
  session_start();
?>
<html>
  <head>
    <title>home</title>
    <link rel="stylesheet" href="adminbutton.css">
  </head>
  <body>
      <?php if(isset($_SESSION['email'])){?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="submit" name="logout" value="uitloggen">
        </form>
        <div>Username: <?php echo $_SESSION['username'];?></div>
        <div>Role: <?php echo $_SESSION['role'];?></div>
      <?php }else{?>
        <a href="inlog.php"><button>log in</button></a>
      <?php }?>
      <a href="admin.php" class="admin"><button class="adminbutton">to the admin zone</button></a>
  </body>
</html>
<?php 
if(isset($_POST['login'])) {
    session_destroy();
    header("Location: inlog.php");
    exit();
}
if(isset($_POST['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}
