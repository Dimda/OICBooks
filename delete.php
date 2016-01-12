<?php
include("includes/connect_DB.php");
$ID = $_GET["ID"];
$sql = "DELETE FROM product WHERE PRODUCT_ID='$ID'";
$matches = glob('./product_image/' . $ID . "*");
//レコード削除
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
}else{
    echo "Error deleting record: " . $conn->error;
}
//画像削除
if (!unlink($matches[0])){
  echo ("Error deleting $file");
}else{
  echo ("Deleted $file");
}
$conn->close();
header('Location: admin_product_manager.php');
?>
