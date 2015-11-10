
<?php
include("includes/admin_top.html");
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
    // Check file size
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
    // if everything is ok, try to upload file
    } else {
        $matches = glob('./product_image/' . $_GET["ID"] . "*");
        !unlink($matches[0]);
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "product_image/" . $_GET["ID"] . "." . $imageFileType)) {
          echo "画像ファイルを追加できませんでした。<br>";
        }else{
          echo $_GET["ID"] . $imageFileType . "アップされた";
        }
    }
}else{
  echo "画像ファイルは大きすぎますまたは、画像ではありません。";
}
include("includes/admin_bottom.html");
?>
