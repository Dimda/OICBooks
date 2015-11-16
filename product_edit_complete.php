<?php
//画像以外の項目

include("includes/admin_top.html");
include("includes/connect_DB.php");
/*
$formOk = 1;
$productName = mysqli_real_escape_string($conn, $_POST["productName"]);
$productDescription = mysqli_real_escape_string($conn, $_POST["productDescription"]);
$productPrice = mysqli_real_escape_string($conn, $_POST["productPrice"]);
$formErrNum = array();
$formOk = 1;

if(!is_numeric($productPrice)){
  $formOk = 0;
  array_push($formErrNum, 1);
}
if($formOk == 0){
  header('Location: product_edit.php?ID=' . $_GET["ID"] . '&formErrNum=' . );
}

if($formOk == 1){
  header('Location: product_edit.php?ID=' . $_GET["ID"] . '&formOk=1');
}
*/
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

}else if($_FILES["fileToUpload"]["size"] == 0){
  echo "ファイルサイズ=0mb";

}else{
  echo "画像ファイルは大きすぎますまたは、画像ではありません。";
  echo $_FILES["fileToUpload"]["size"];
}

include("includes/admin_bottom.html");
?>
