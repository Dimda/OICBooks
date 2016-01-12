<?php

include("includes/connect_DB.php");
$productID = $_GET["ID"];
$productName = mysqli_real_escape_string($conn, $_POST["productName"]);
$productDescription = mysqli_real_escape_string($conn, $_POST["productDescription"]);
$productPrice = $_POST["productPrice"];

$sql = "UPDATE product SET PRODUCT_NAME='$productName', PRODUCT_DESCRIPTION='$productDescription',
PRODUCT_PRICE=$productPrice WHERE PRODUCT_ID=$productID";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//new
include("includes/connect_DB.php");
date_default_timezone_set('Asia/Tokyo');
$date = date('Y-d-m h:i:s', time());
$product = array(
  "isbn" =>                $_POST["productISBN"],
  "name" =>                $_POST["productName"],
  "author" =>              $_POST["productAuthor"],
  "price" =>               $_POST["productPrice"],
  "description" =>         $_POST["productDescription"],
  "dateAvailabe" =>        $_POST["productDateAvailable"],
  "changeDate" =>          $date,
  "category" =>            $_POST["productCategory"],
  "tax" =>                 $_POST["productTax"],
  "publisher" =>           $_POST["productPublisher"],
  "stock" =>               $_POST["productStock"],
  "keyword" =>             $_POST["productKeyword"]
);
echo $date . '<br>';
$sql = "UPDATE product SET (PRODUCT_NAME, STOCK, PRODUCT_AUTHOR, PRODUCT_PRICE,
PRODUCT_DESCRIPTION, PRODUCT_DATE_AVAILABLE, PRODUCT_CHANGE_DATE, CATEGORY_ID, TAX_RATE_CODE,
PUBLISHER_ID, PRODUCT_ISBN, KEYWORD)
VALUES ('{$product["name"]}', '{$product["stock"]}', '{$product["author"]}', '{$product["price"]}', '{$product["description"]}',
'{$product["dateAvailabe"]}', '{$product["changeDate"]}', '{$product["category"]}', '{$product["tax"]}', '{$product["publisher"]}',
'{$product["isbn"]}', '{$product["keyword"]}') WHERE PRODUCT_ID=$productID";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
?>
