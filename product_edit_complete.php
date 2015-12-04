<?php

include("includes/admin_top.html");
include("includes/connect_DB.php");
$productID = $_GET["ID"];
$productName = mysqli_real_escape_string($conn, $_POST["productName"]);
$productDescription = mysqli_real_escape_string($conn, $_POST["productDescription"]);
$productPrice = $_POST["productPrice"];

$sql = "UPDATE PRODUCT SET PRODUCT_NAME='$productName', PRODUCT_DESCRIPTION='$productDescription',
PRODUCT_PRICE=$productPrice WHERE PRODUCT_ID=$productID";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//画像

$target_dir = "product_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageErrNum = array();


if(isset($_POST["submit"]) && is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        array_push($imageErrNum, 1);
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        array_push($imageErrNum, 2);
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      array_push($imageErrNum, 3);
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      array_push($imageErrNum, 4);
      header('Location: product_edit.php?ID=' . $_GET["ID"] . '&imageErrNum=' . implode(",", $imageErrNum));
    } else {
        $matches = glob('./product_image/' . $_GET["ID"] . "*");
        !unlink($matches[0]);
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "product_image/" . $_GET["ID"] . "." . $imageFileType)) {
          array_push($imageErrNum, 4);
        }else{
          header('Location: product_edit.php?ID=' . $_GET["ID"] . '&success=true');
        }
    }
}else{
  header('Location: product_edit.php?ID=' . $_GET["ID"] . '&success=true');
}
$conn->close();
include("includes/admin_bottom.html");
?>
