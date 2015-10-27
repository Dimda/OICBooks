<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = 'hide';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$name = $_GET['name'];

$dbh = new PDO($dsn, $username, $password, $options);
$sql="SELECT * FROM hidehidetable
							where name = '" . $name . "';";

echo $sql;

$stmt = $dbh->prepare("SELECT * FROM hidehidetable
							where name = :name;");
$stmt->bindParam(':name', $name);
$stmt->execute();
//$stmt = $dbh->query($sql);
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
 $tr = $row["id"];
 $tk = $row["name"];
 echo $tk;
 echo "<br>";

}
$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);