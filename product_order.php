<?php
$title              = '商品の発注';
$subtitle           = '商品の発注';

$sideElement[0]     = '在庫情報の編集';
$sideElementLink[0] = 'admin_stocknoaaa_manager.php';
$sideElement[1]     = '商品の発注';
$sideElementLink[1] = 'product_order.php';

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
      $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE,stocknoaaa FROM product WHERE PRODUCT_NAME LIKE '%{$keyword}%'";
    }else{
      $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE,stocknoaaa FROM product";
    }
    $result = $conn->query($sql);
    echo '<table>
              <form action="order_check.php" method="post">
             <th></th><th>商品名</th><th>価格</th><th>数量</th>';
    while($row = $result->fetch_assoc()){
        echo   '<tr>
                  <td><input type="checkbox" class = "check" name="check[]" width = "10%" value=' . $row["PRODUCT_ID"] . '></td>
                  <td class = "product-name" width = "70%"><a class = "product-name" href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></td>
                  <td class = "product-price" width = "10%">' . $row["PRODUCT_PRICE"] .'円</td>
                  <td class = "product-stocknoaaa" width = "10%">'.$row["stocknoaaa"].''."冊".'</td>
                  <td class = "edit" width = "10%"><a href="order_check_individual.php?ID=' . $row["PRODUCT_ID"] . '">個別発注</a></td>
                </tr>
                ';
           }
           echo '</table>';
           echo '<input type="submit" value="まとめて発注" width="100%" style="margin-left: 40%;
                    font-size: 1.4em;">';
           echo '</form>';
        
        $conn->close();
    ?>
  </ul> 
</div>


<?php include("includes/admin_bottom.html");?>