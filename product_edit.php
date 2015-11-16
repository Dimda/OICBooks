
<?php
$ID = $_GET["ID"];
$imageErrNum = array();
$imageErrNum = explode(",", $_GET["imageErrNum"]);

include("includes/connect_DB.php");
$sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION FROM PRODUCT WHERE PRODUCT_ID = $ID";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  $productName = $row["PRODUCT_NAME"];
  $productDescription = $row["PRODUCT_DESCRIPTION"];
  $productPrice = $row["PRODUCT_PRICE"];
}
 ?>
<?php
include("includes/admin_top.html");
include("includes/error_messages.php");
?>

<div class="error_log">
  <?php
  foreach($imageErrNum as $num){
    if($num == 1){
      echo $imageErrMessages[1] . "<br>";
    }else if ($num == 2){
      echo $imageErrMessages[2] . "<br>";
    }else if ($num == 3){
      echo $imageErrMessages[3] . "<br>";
    }else if ($num == 4){
      echo $imageErrMessages[4] . "<br>";
    }
  }
  ?>
</div>

<form action="product_edit_complete.php?ID=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
  <label for="productName">商品名</label>
  <input type="text" name="productName" value="<?php echo "$productName"; ?>"><br>
  <label for="productDescription">商品明細</label>
  <input type="text" name="productDescription" value="<?php echo "$productDescription"; ?>"><br>
  <label for="productPrice">価格</label>
  <input type="number" id="productPrice" name="productPrice" min="1" max="1000000" value="<?php echo "$productPrice"; ?>"><br>
  <input type="file" name="fileToUpload">
  <label for="fileToUpload">jpg, jpeg, png, gif　ファイル２mbまで</label><br>
  <input type="submit" value="登録" class="button" name="submit" >
  <a href="./admin_product_manager.php" class="button">キャンセル</a>
</form>

<?php include("includes/admin_bottom.html") ?>
