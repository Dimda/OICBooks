<?php
$title              = '在庫情報';
$subtitle           = '在庫情報編集';

$sideElement[0]     = '在庫情報の編集';
$sideElementLink[0] = 'admin_stock_manager.php';
$sideElement[1]     = 'ざいこ';
$sideElementLink[1] = '#';

$cssLink[0]         = 'admin.css';
$cssLink[1]         = 'admin_product_manager.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';
$scriptSource[2]    = 'js/admin_product_manager.js';

include("includes/admin_top.php");
?>
<div id="product-manager">
  <form action="admin_product_manager.php" method="post">
    <!--searchClickedで検索したってことを伝える-->
    <input id="search-db" placeholder="データベースを検索する" name="keyword" value = "<?php if(isset($_POST["keyword"])){ echo $_POST["keyword"];}?>">
    <input id="search-btn" type="submit" value="検索">
  </form>
  <ul class="search-results">
    <?php
    include("includes/connect_DB.php");
    if(isset($_POST["keyword"])){

      $keyword = $_POST["keyword"];
      $keyword = mysqli_real_escape_string($conn, $keyword);
      echo $keyword . "の検索結果";
      $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_NAME LIKE '%{$keyword}%'";
    }else{
      $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE,STOCK FROM PRODUCT";
    }
    $result = $conn->query($sql);
    echo '<table>
            <th>商品名</th><th>価格</th><th>在庫数</th><th>  </th>';
    while($row = $result->fetch_assoc()){
        echo   '<tr>
                  <td class = "product-name" width = "70%"><a class = "product-name" href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></td>
                  <td class = "product-price" width = "10%">' . $row["PRODUCT_PRICE"] .'円</td>
                  <form method="POST" action="product_change.php?ID='.$row["PRODUCT_ID"].'">
                  <td><input type="number" class = "product-stock" name="QUANTITY" width = "10%" value='.$row["STOCK"].'></td>
                  <td width = "10%"><input type="submit" value="編集"></td>
                  </form>
                </tr>
                ';
           }
        echo '</table>';
        $conn->close();
        echo '<form method="POST" action="cart_change.php?ID='.$id.'">';
                echo '<input type="number" min="0" name="QUANTITY" value="0">';
                echo '<input type="submit" name="add-cart" value="数量変更">';
    ?>
  </ul>
</div>

<?php include("includes/admin_bottom.html");?>
<script>
  function deleteCheck() {
    return confirm("本当に削除しますか。");
  }
</script>
