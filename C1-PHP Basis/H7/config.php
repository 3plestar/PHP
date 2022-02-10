<?php
$host = 'localhost';
$db = 'phpschool';
$dbUserName = "root";
$dbPassword = "root";

$table = 'accounts';

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
    username varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    admin tinyint(1),
    PRIMARY KEY(email),
    UNIQUE(username)
    ) engine =innodb;");
$query->execute();


$query = $dbh->prepare("INSERT IGNORE INTO $table (username, password, email, admin) VALUES
('epicboy420','123','a@a.nl',1),
('jeroen','123','a@b.nl',0)");
$query->execute();
