<?php

$title              = '商品管理';
$subtitle           = '商品編集';

$sideElement[0]     = '商品の編入、削除';
$sideElementLink[0] = 'admin_product_manager.php';
$sideElement[1]     = '商品追加';
$sideElementLink[1] = 'product_add.php';

$cssLink[0]         = 'admin.css';
$cssLink[1]         = 'product_edit.css';
$cssLink[2]         = 'admin_product_manager.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';


include("includes/admin_top.php");

$ID = $_GET["ID"];
$imageErrNum = array();
if(isset($_GET["imageErrNum"])){
  $imageErrNum = explode(",", $_GET["imageErrNum"]);
}


include("includes/connect_DB.php");
$sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION FROM PRODUCT WHERE PRODUCT_ID = $ID";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  $productName = $row["PRODUCT_NAME"];
  $productDescription = $row["PRODUCT_DESCRIPTION"];
  $productPrice = $row["PRODUCT_PRICE"];
}
?>
<form id="edit-form" action="product_edit_complete.php?ID=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
  <div class="form-contents">
    <?php
    include("includes/error_messages.php");

    if(isset($_GET["imageErrNum"])){
      echo '<div class="error-log">';
        foreach($imageErrNum as $num){
          if($num == 1){
            echo $imageErrMessages[0] . "<br>";
          }else if ($num == 2){
            echo $imageErrMessages[1] . "<br>";
          }else if ($num == 3){
            echo $imageErrMessages[2] . "<br>";
          }else if ($num == 4){
            echo $imageErrMessages[3] . "<br>";
          }
        }
      echo '</div>';
    }
    if(isset($_GET["success"])){
      echo
      '<div class="success-log">
        更新しました。
      </div>';
    }

    ?>
    <label for="productName">商品名</label>
    <input id="product-name" type="text" name="productName" value="<?php echo "$productName"; ?>"><br>
    <label for="productDescription">商品明細</label>
    <textarea id="product-description" type="text" cols="30" rows="15" name="productDescription"><?php echo "$productDescription"; ?></textarea><br>
    <label for="productPrice">価格</label>
    <input id="product-price" type="number"  name="productPrice" data-validation="number" data-validation-error-msg="数字ではありません。" value='<?php echo "$productPrice";?>'><br>
    <label id="file-upload" for="fileToUpload">画像ファイル</label>
    <input type="file" name="fileToUpload">
    <label for="fileToUpload" id="file-description">jpg, jpeg, png, gif　ファイル 5mb まで</label><br>
  </div>
  <div id="bott-buttons">
    <input type="submit" value="登録" class="button" name="submit" >
    <a href="./admin_product_manager.php" class="button">キャンセル</a>
  <div>
</form>

<?php include("includes/admin_bottom.html") ?>
<script>
  $.validate({
  form : '#edit-form'
  });
</script>
