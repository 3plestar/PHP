<?php
$host = 'localhost';
$db = 'phpschool';
$dbUserName = "root";
$dbPassword = "root";

$table = 'brood';


//database
try {
    $dbh = new PDO("mysql:host=$host;dbname=$db", $dbUserName, $dbPassword, array(
        PDO::ATTR_PERSISTENT => true
    ));

    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $exception) {
    echo "Connection failed: " . $exception->getMessage();
}


//create tables
$query = $dbh->prepare("CREATE TABLE IF NOT EXISTS $table (
    broodnummer int(11) NOT NULL AUTO_INCREMENT,
    meel varchar(50) NOT NULL,
    vorm varchar(255) NOT NULL,
    gewicht decimal(50, 2) NOT NULL,
    PRIMARY KEY(broodnummer)
    ) engine =innodb;");
$query->execute();