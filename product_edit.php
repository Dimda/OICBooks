
<?php
  $ID = $_GET["ID"];
  include("includes/connect_DB.php");
  $sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION FROM PRODUCT WHERE PRODUCT_ID = $ID";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $productName = $row["PRODUCT_NAME"];
    $productDescription = $row["PRODUCT_DESCRIPTION"];
    $productPrice = $row["PRODUCT_PRICE"];
  }
 ?>
<?php include("includes/admin_top.html") ?>
<form>
  <label for="productName">商品名</label>
  <input type="text" name="productName" value="<?php echo "$productName"; ?>"><br>
  <label for="productDescription">商品明細</label>
  <input type="text" name="productDescription" value="<?php echo "$productDescription"; ?>"><br>
  <label for="productPrice">価格</label>
  <input type="text" name="productPrice" value="<?php echo "$productPrice"; ?>"><br>
  <input type="submit" value="登録" class="button">
  <a href="#" class="button">キャンセル</a>
</form>

<?php include("includes/admin_bottom.html") ?>
