<?php
$servername = "127.0.0.1";
$username = "oi1";
$password = "cocacola";
$dbname = "oicbooks";


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("接続失敗" . $conn->connect_error);
}
if (!$conn->set_charset("utf8")) {
    exit();
}
?>
