<?php
  include("includes/connect_DB.php");
  $ID = $_GET["ID"];
  $sql = "DELETE FROM PRODUCT WHERE PRODUCT_ID='$ID'";
  $file =  "product_image/" . $ID . ".jpg";
  //レコード削除
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }else{
      echo "Error deleting record: " . $conn->error;
  }
  //画像削除
  if (!unlink($file)){
    echo ("Error deleting $file");
  }else{
    echo ("Deleted $file");
  }
  $conn->close();
?>
