<?php
$title              = '発注確認';
$subtitle           = '発注確認';

$sideElement[0]     = '在庫情報の編集';
$sideElementLink[0] = 'admin_stock_manager.php';
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
  <ul class="search-results">
    <?php
    include("includes/connect_DB.php");
    echo '<table>
              <form action="send_publisher.php" method="post">
             <th>商品名</th><th>価格</th><th>数量</th>';
    foreach ($_POST["check"] as $key => $value) {
      $keyword = $value;
      $keyword = mysqli_real_escape_string($conn, $keyword);
      $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE,STOCK FROM PRODUCT WHERE PRODUCT_ID = '{$keyword}'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
        echo   '<tr>
                  <td style="display:none"><input type="checkbox" class = "check" name="check[]" width = "10%" checked="checked" value=' . $row["PRODUCT_ID"] . '></td>
                  <td class = "product-name" width = "70%"><a class = "product-name" href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></td>
                  <td class = "product-price" width = "10%">' . $row["PRODUCT_PRICE"] .'円</td>
                  <td class = "product-stock" width = "10%">'.$row["STOCK"].''."冊".'</td>
                  <td><input type="number" class = "product-stock" name="QUANTITY[]" width = "10%" value= "0" min= "0"></td>
                </tr>
                ';
             }
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