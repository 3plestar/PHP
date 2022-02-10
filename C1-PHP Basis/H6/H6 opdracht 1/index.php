<?php
$host = 'localhost';
$db = 'phpschool';
$username = "root";
$password = "root";

$dbh = new mysqli($host, $username, $password, $db);
if ($dbh->connect_error) {
    die("Connection failed: " . $dbh->connect_error);
}

  $sql = "SELECT * FROM cursist";

  $result = $dbh->query($sql);
  
  while ($row = $result->fetch_assoc()) {
    echo "<div style = 'display:grid; grid-template-columns: repeat(".mysqli_num_fields($result).",1fr);'>";
    
        echo "<div>" .$row['cursistnr'] . "</div>";
        echo "<div>" .$row['naam'] . "</div>";
        echo "<div>" .$row['roepnaam'] . "</div>";
        echo "<div>" .$row['straat'] . "</div>";
        echo "<div>" .$row['postcode']. "</div>";
        echo "<div>" .$row['plaats']. "</div>";
        echo "<div>" .$row['geslacht']. "</div>";
        echo "<div>" .$row['geb_datum']. "</div>";
    echo "</div>";  
    
  }  