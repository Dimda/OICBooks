<?php
include("includes/connect_DB.php");
$ID = $_GET["ID"];
$quantity = $_POST["QUANTITY"];
$sql =  "UPDATE product SET stocknoaaa = '$quantity' WHERE PRODUCT_ID = '$ID'";
$conn->query($sql);
$conn->close();

header('Location: admin_stocknoaaa_manager.php');
?>
