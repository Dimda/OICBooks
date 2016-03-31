<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "oicbooks";


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("接続失敗" . $conn->connect_error);
}
if (!$conn->set_charset("utf8")) {
    exit();
}
?>
