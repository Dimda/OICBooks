
<?php
//画像以外の項目
include("includes/admin_top.html");
include("includes/connect_DB.php");
$formOk = 1;
$productName = mysqli_real_escape_string($conn, $_POST["productName"]);
$productDescription = mysqli_real_escape_string($conn, $_POST["productDescription"]);
$productPrice = mysqli_real_escape_string($conn, $_POST["productPrice"]);
if(!is_numeric($productPrice)){
  $formOk = 0;
}
if($formOk == 0){
  header('Location: product_edit.php?ID=' . $_GET["ID"] . '&errNum=1');
}
//画像

$target_dir = "product_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "追加したファイルは画像ではありません。<br>";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "画像ファイルは大きすぎます。<br>";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "対応するのはJPG, JPEG, PNG, GIFファイルのみです。<br>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "画像ファイルを追加できませんでした。";
    } else {
        $matches = glob('./product_image/' . $_GET["ID"] . "*");
        !unlink($matches[0]);
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "product_image/" . $_GET["ID"] . "." . $imageFileType)) {
          echo "画像ファイルを追加できませんでした。<br>";
        }else{
          echo $_GET["ID"] . $imageFileType . "アップされた";
        }
    }
}else if($_FILES["fileToUpload"]["size"] == 0){
  /*echo "ファイルサイズ=0mb";*/
}else{
  echo "画像ファイルは大きすぎますまたは、画像ではありません。";
  echo $_FILES["fileToUpload"]["size"];
}


include("includes/admin_bottom.html");
?>
